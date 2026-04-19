<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventParticipant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of all events.
     */
    public function index()
    {
        $events = Event::orderBy('date', 'asc')->get();
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new event.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created event in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:4096',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('events', 'public');
        }

        $event = Event::create([
            'creator_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'date' => $request->date,
            'time' => $request->time,
            'image' => $imagePath,
        ]);
        return redirect()->route('events.show', $event->id)->with('success', 'Event created!');
    }

    /**
     * Display the specified event.
     */
    public function show($id)
    {
        $event = Event::with('participants.user')->findOrFail($id);
        $isParticipant = $event->participants->where('user_id', Auth::id())->isNotEmpty();
        return view('events.show', compact('event', 'isParticipant'));
    }

    /**
     * Show the form for editing the specified event.
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        if ($event->creator_id !== Auth::id()) {
            abort(403);
        }
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified event in storage.
     */
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        if ($event->creator_id !== Auth::id()) {
            abort(403);
        }
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:4096',
        ]);

        $data = $request->only(['title', 'description', 'location', 'date', 'time']);
        if ($request->hasFile('image')) {
            if ($event->image) {
                Storage::disk('public')->delete($event->image);
            }
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        $event->update($data);
        return redirect()->route('events.show', $event->id)->with('success', 'Event updated!');
    }

    /**
     * Remove the specified event from storage.
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        if ($event->creator_id !== Auth::id()) {
            abort(403);
        }
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted.');
    }

    /**
     * Join an event.
     */
    public function join($id)
    {
        $event = Event::findOrFail($id);
        EventParticipant::firstOrCreate([
            'event_id' => $event->id,
            'user_id' => Auth::id(),
        ], [
            'status' => 'accepted',
        ]);
        return back()->with('success', 'You have joined the event.');
    }

    /**
     * Leave an event.
     */
    public function leave($id)
    {
        $event = Event::findOrFail($id);
        EventParticipant::where('event_id', $event->id)->where('user_id', Auth::id())->delete();
        return back()->with('success', 'You have left the event.');
    }
}
