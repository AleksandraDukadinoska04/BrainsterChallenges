<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DiscussionRequest;
use App\Models\Discussion;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $approvedDiscussion = Discussion::where('approved', 1)->get();

        return view('forum.index', compact('approvedDiscussion'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('forum.createDiscussion', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DiscussionRequest $request)
    {
        $data = $request->except('_token');

        try {
            $disscusion = Discussion::create([
                'title' => $data['title'],
                'photo' => $data['photo'],
                'description' => $data['description'],
                'category_id' => $data['category'],
                'user_id' => Auth::id()
            ]);
        } catch (\Exception $exception) {
            throw $exception;
        }

        return redirect()->route('homepage')->with('success', 'Discussion successfully created! It needs to be approved before you dig into it though! :)');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $discussion = Discussion::find($id);

        if (!$discussion) {
            return redirect()->back();
        }

        $comments = Comment::where('discussion_id', $id)->get();
        return view('forum.discussion', compact('discussion', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $discussion = Discussion::find($id);

        if (!$discussion) {
            return redirect()->back();
        }
        if (Auth::user()->role->role !== 'Admin' && $discussion->user_id !== Auth::id()) {
            return redirect()->back();
        }

        $categories = Category::all();
        return view('forum.editDiscussion', compact('discussion',  'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DiscussionRequest $request, string $id)
    {
        $data = $request->except('_token');

        $discussion = Discussion::find($id);

        if ($discussion) {
            $discussion->update([
                'title' => $data['title'],
                'photo' => $data['photo'],
                'description' => $data['description'],
                'category_id' => $data['category']
            ]);
            return redirect()->route('homepage')->with('success', "Discussion with ID $id is successfully updated!");
        } else {
            return redirect()->back()->with('success', "Discussion with $id is doesnt exist!");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $discussion = Discussion::find($id);

        if ($discussion) {
            $discussion->delete();
            return redirect()->route('homepage')->with('success', "Discussion with $id is successfully deleted!");
        } else {
            return redirect()->back()->with('error', "Discussion with $id is doesnt exist!");
        }
    }

    public function showApprove()
    {
        $notApprovedDiscussions = Discussion::where('approved', 0)->get();
        return view('forum.approveDiscussion', compact('notApprovedDiscussions'));
    }


    public function approve(string $id)
    {
        $discussion = Discussion::findOrFail($id);
        $discussion->approved = 1;
        $discussion->save();

        return redirect()->route('approveDiscussion')->with('success', "Discussion with ID $id approved successfully!");
    }
}
