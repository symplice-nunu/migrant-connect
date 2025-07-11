<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class MessageController extends Controller
{
    /**
     * Display a listing of the user's conversations.
     */
    public function index()
    {
        $user = Auth::user();
        $conversations = Message::getConversationsForUser($user->id);
        
        // Get conversation details with user info and last message
        $conversationDetails = [];
        foreach ($conversations as $otherUserId => $messages) {
            $otherUser = User::find($otherUserId);
            $lastMessage = $messages->first();
            $unreadCount = $messages->where('receiver_id', $user->id)
                                   ->whereNull('read_at')
                                   ->count();
            
            $conversationDetails[] = [
                'user' => $otherUser,
                'lastMessage' => $lastMessage,
                'unreadCount' => $unreadCount,
                'messageCount' => $messages->count()
            ];
        }
        
        // Sort by last message time
        usort($conversationDetails, function ($a, $b) {
            return $b['lastMessage']->created_at <=> $a['lastMessage']->created_at;
        });
        
        return view('messages.index', compact('conversationDetails'));
    }

    /**
     * Show the conversation with a specific user.
     */
    public function show($userId)
    {
        $user = Auth::user();
        $otherUser = User::findOrFail($userId);
        
        // Get messages
        $messages = Message::getConversation($user->id, $userId)->get();
        
        // Mark messages as read
        $messages->where('receiver_id', $user->id)
                 ->whereNull('read_at')
                 ->each(function ($message) {
                     $message->markAsRead();
                 });
        
        return view('messages.show', compact('messages', 'otherUser'));
    }

    /**
     * Show the form for creating a new message (user search).
     */
    public function create(Request $request)
    {
        $currentUserId = Auth::id();
        
        // Build query for users
        $query = User::query();
        if ($currentUserId) {
            $query->where('id', '!=', $currentUserId);
        }
        
        // Filter by location if provided
        if ($request->has('location') && $request->location !== '') {
            $query->where('location', $request->location);
        } else {
            // When "All Locations" is selected, show all users (including those without location)
            // No additional filter needed
        }
        
        $users = $query->orderBy('name')->get();
        
        // Get unique locations for filter dropdown
        $locationsQuery = User::query();
        if ($currentUserId) {
            $locationsQuery->where('id', '!=', $currentUserId);
        }
        
        $locations = $locationsQuery->whereNotNull('location')
                                   ->distinct()
                                   ->pluck('location')
                                   ->sort()
                                   ->values();
        
        // Get total count of users for display
        $totalUsersQuery = User::query();
        if ($currentUserId) {
            $totalUsersQuery->where('id', '!=', $currentUserId);
        }
        $totalUsers = $totalUsersQuery->count();
        
        return view('messages.create', compact('users', 'locations', 'totalUsers'));
    }

    /**
     * Store a newly created message in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'content' => 'required|string|max:2000',
        ]);

        // Prevent sending message to self
        if ($request->receiver_id == Auth::id()) {
            return back()->withErrors(['content' => 'You cannot send a message to yourself.']);
        }

        // Check for duplicate messages (same sender, receiver, content within last 5 seconds)
        $recentMessage = Message::where('sender_id', Auth::id())
            ->where('receiver_id', $request->receiver_id)
            ->where('content', $request->content)
            ->where('created_at', '>=', now()->subSeconds(5))
            ->first();

        if ($recentMessage) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => $recentMessage,
                    'sender' => $recentMessage->sender,
                    'receiver' => $recentMessage->receiver,
                ]);
            }
            return redirect()->route('messages.show', $request->receiver_id)
                            ->with('success', 'Message sent successfully!');
        }

        $message = Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'content' => $request->content,
        ]);

        // Load relationships for the response
        $message->load(['sender', 'receiver']);

        // Return JSON response for AJAX requests
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'sender' => $message->sender,
                'receiver' => $message->receiver,
            ]);
        }

        return redirect()->route('messages.show', $request->receiver_id)
                        ->with('success', 'Message sent successfully!');
    }

    /**
     * Get new messages for a conversation (AJAX endpoint).
     */
    public function getNewMessages(Request $request, $userId)
    {
        $user = Auth::user();
        $lastMessageId = $request->get('last_message_id', 0);
        
        $newMessages = Message::getConversation($user->id, $userId)
            ->where('id', '>', $lastMessageId)
            ->with(['sender', 'receiver'])
            ->get();
        
        // Mark messages as read
        $newMessages->where('receiver_id', $user->id)
                   ->whereNull('read_at')
                   ->each(function ($message) {
                       $message->markAsRead();
                   });
        
        return response()->json([
            'messages' => $newMessages,
            'unread_count' => MessageController::getUnreadCount($user->id)
        ]);
    }

    /**
     * Remove the specified message from storage.
     */
    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $user = Auth::user();
        
        if ($message->sender_id !== $user->id && $message->receiver_id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }
        
        $message->delete();
        return back()->with('success', 'Message deleted successfully.');
    }

    /**
     * Search for users to message
     */
    public function searchUsers(Request $request)
    {
        $query = $request->get('q');
        
        $users = User::where('id', '!=', Auth::id())
                     ->where(function ($q) use ($query) {
                         $q->where('name', 'like', "%{$query}%")
                           ->orWhere('email', 'like', "%{$query}%");
                     })
                     ->limit(10)
                     ->get(['id', 'name', 'email']);
        
        return response()->json($users);
    }

    /**
     * Get unread message count for the current user
     */
    public static function getUnreadCount($userId)
    {
        return Message::where('receiver_id', $userId)
                     ->whereNull('read_at')
                     ->count();
    }

    /**
     * Mark messages as read for a conversation
     */
    public function markAsRead(Request $request, $userId)
    {
        $user = Auth::user();
        
        Message::where('sender_id', $userId)
               ->where('receiver_id', $user->id)
               ->whereNull('read_at')
               ->update(['read_at' => now()]);
        
        return response()->json([
            'success' => true,
            'unread_count' => MessageController::getUnreadCount($user->id)
        ]);
    }
}
