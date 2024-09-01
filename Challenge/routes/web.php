<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DiscussionController::class, 'index'])->name('homepage');
Route::get('/discussion/{id}', [DiscussionController::class, 'show'])->name('showDiscussion');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/create/discussion', [DiscussionController::class, 'create'])->name('createDiscussion');
    Route::post('/store/discussion', [DiscussionController::class, 'store'])->name('storeDiscussion');

    Route::delete('/discussion/{id}/delete', [DiscussionController::class, 'destroy'])->name('deleteDiscussion');
    Route::get('/discussion/{id}/edit', [DiscussionController::class, 'edit'])->name('editDiscussion');
    Route::put('/discussion/{id}/edit', [DiscussionController::class, 'update'])->name('updateDiscussion');
    Route::get('/approve/discussion', [DiscussionController::class, 'showApprove'])->name('approveDiscussion')->middleware('role:Admin');
    Route::put('/discussion/{id}/approve', [DiscussionController::class, 'approve'])->name('approve')->middleware('role:Admin');

    Route::get('/comment/{discussion_id}', [CommentController::class, 'index'])->name('addComment');
    Route::post('/comment', [CommentController::class, 'store'])->name('storeComment');
    Route::delete('/comment/{id}/delete', [CommentController::class, 'destroy'])->name('deleteComment');
    Route::get('/comment/{comment_id}/edit', [CommentController::class, 'edit'])->name('editComment');
    Route::put('/comment/{comment_id}/edit', [CommentController::class, 'update'])->name('updateComment');



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
