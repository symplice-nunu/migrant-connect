<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the user's conversations.
     */
    public function index()
    {
        $user = Auth::user();
        $conversations = Message::where('sender_id', $user->id)
            ->orWhere('receiver_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy(function ($msg) use ($user) {
                return $msg->sender_id == $user->id ? $msg->receiver_id : $msg->sender_id;
            });
        return view('messages.index', compact('conversations'));
    }

    /**
     * Show the conversation with a specific user.
     */
    public function show($userId)
    {
        $user = Auth::user();
        $messages = Message::where(function ($q) use ($user, $userId) {
                $q->where('sender_id', $user->id)->where('receiver_id', $userId);
            })->orWhere(function ($q) use ($user, $userId) {
                $q->where('sender_id', $userId)->where('receiver_id', $user->id);
            })->orderBy('created_at')->get();
        return view('messages.show', compact('messages', 'userId'));
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
        $message = Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'content' => $request->content,
        ]);
        return redirect()->route('messages.show', $request->receiver_id)->with('success', 'Message sent!');
    }

    /**
     * Remove the specified message from storage.
     */
    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $user = Auth::user();
        if ($message->sender_id !== $user->id && $message->receiver_id !== $user->id) {
            abort(403);
        }
        $message->delete();
        return back()->with('success', 'Message deleted.');
    }
}
