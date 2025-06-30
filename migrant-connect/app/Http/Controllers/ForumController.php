<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    /**
     * Display a listing of all forums.
     */
    public function index()
    {
        $forums = Forum::orderBy('created_at', 'desc')->get();
        return view('forums.index', compact('forums'));
    }

    /**
     * Show the form for creating a new forum.
     */
    public function create()
    {
        return view('forums.create');
    }

    /**
     * Store a newly created forum in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $forum = Forum::create([
            'title' => $request->title,
            'description' => $request->description,
            'created_by' => Auth::id(),
        ]);
        return redirect()->route('forums.show', $forum->id)->with('success', 'Forum created!');
    }

    /**
     * Display the specified forum.
     */
    public function show($id)
    {
        $forum = Forum::with('posts.user')->findOrFail($id);
        return view('forums.show', compact('forum'));
    }

    /**
     * Show the form for editing the specified forum.
     */
    public function edit($id)
    {
        $forum = Forum::findOrFail($id);
        if ($forum->created_by !== Auth::id()) {
            abort(403);
        }
        return view('forums.edit', compact('forum'));
    }

    /**
     * Update the specified forum in storage.
     */
    public function update(Request $request, $id)
    {
        $forum = Forum::findOrFail($id);
        if ($forum->created_by !== Auth::id()) {
            abort(403);
        }
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $forum->update($request->only(['title', 'description']));
        return redirect()->route('forums.show', $forum->id)->with('success', 'Forum updated!');
    }

    /**
     * Remove the specified forum from storage.
     */
    public function destroy($id)
    {
        $forum = Forum::findOrFail($id);
        if ($forum->created_by !== Auth::id()) {
            abort(403);
        }
        $forum->delete();
        return redirect()->route('forums.index')->with('success', 'Forum deleted.');
    }
}
