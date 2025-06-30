<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Forum;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of posts in a forum.
     */
    public function index(Request $request)
    {
        $forumId = $request->query('forum_id');
        
        if (!$forumId) {
            return redirect()->route('forums.index')->with('info', 'Please select a forum to view posts.');
        }
        
        $forum = Forum::findOrFail($forumId);
        $posts = Post::where('forum_id', $forumId)->with('user')->orderBy('created_at', 'desc')->get();
        return view('posts.index', compact('posts', 'forum'));
    }

    /**
     * Show the form for creating a new post in a forum.
     */
    public function create(Request $request)
    {
        $forumId = $request->query('forum_id');
        
        if (!$forumId) {
            return redirect()->route('forums.index')->with('info', 'Please select a forum to create a post.');
        }
        
        return view('posts.create', compact('forumId'));
    }

    /**
     * Store a newly created post in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'forum_id' => 'required|exists:forums,id',
            'content' => 'required|string',
        ]);
        $post = Post::create([
            'forum_id' => $request->forum_id,
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);
        return redirect()->route('posts.show', $post->id)->with('success', 'Post created!');
    }

    /**
     * Display the specified post.
     */
    public function show($id)
    {
        $post = Post::with('user', 'comments.user')->findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified post.
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified post in storage.
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }
        $request->validate([
            'content' => 'required|string',
        ]);
        $post->update($request->only(['content']));
        return redirect()->route('posts.show', $post->id)->with('success', 'Post updated!');
    }

    /**
     * Remove the specified post from storage.
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }
        $post->delete();
        return redirect()->route('posts.index', ['forum_id' => $post->forum_id])->with('success', 'Post deleted.');
    }
}
