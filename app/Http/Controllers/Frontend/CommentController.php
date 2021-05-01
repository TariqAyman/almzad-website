<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentCreateRequest;
use App\Models\Comment;
use App\Models\Review;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param CommentCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentCreateRequest $request)
    {

        Comment::query()->create([
            'user_id' => auth('user')->user()->id,
            'auction_id' => $request->auction_id,
            'comment' => $request->comment,
            'status' => true
        ]);

        return redirect()->back()->withSuccess('Saved Comment Successfully');
    }
}
