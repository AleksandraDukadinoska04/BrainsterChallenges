<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;




class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $discussion_id)
    {
        return view('forum.createComment', compact('discussion_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {
        $data = $request->except('_token');

        try {
            $comment = Comment::create([
                'discussion_id' => $data['discussion_id'],
                'user_id' => Auth::id(),
                'comment' => $data['comment']
            ]);
        } catch (\Exception $exception) {
            throw $exception;
        }

        return redirect()->route('showDiscussion', $data['discussion_id'])->with('success', 'Comment successfully added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $comment_id)
    {
        $comment = Comment::find($comment_id);
        if (!$comment) {
            return redirect()->back();
        }
        if ($comment->user_id !== Auth::id()) {
            return redirect()->back();
        }

        return view('forum.editComment', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequest $request, string $id)
    {
        $data = $request->except('_token');

        $comment = Comment::find($id);

        if ($comment) {
            $comment->update([
                'discussion_id' => $data['discussion_id'],
                'user_id' => Auth::id(),
                'comment' => $data['comment']
            ]);
            return redirect()->route('showDiscussion', $data['discussion_id'])->with('success', "Comment with ID $id is successfully updated!");
        } else {
            return redirect()->route('showDiscussion', $data['discussion_id'])->with('error', "Comment with ID $id doesnt exist!");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::find($id);

        if ($comment->user_id !== Auth::id()) {
            return redirect()->back();
        }

        $discussion_id = $comment->discussion_id;

        if ($comment) {
            $comment->delete();
            return redirect()->route('showDiscussion', $discussion_id)->with('success', "Comment with ID $id is successfully deleted!");
        } else {
            return redirect()->route('showDiscussion', $discussion_id)->with('error', "Comment with ID $id doesnt exist!");
        }
    }
}
