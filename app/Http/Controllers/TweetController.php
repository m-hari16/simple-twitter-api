<?php

namespace App\Http\Controllers;

use App\Http\Builder\ResponseBuilder;
use App\Http\Requests\CreateTweetRequest;
use App\Http\Resources\TweetDataResponse;
use Illuminate\Http\Request;
use App\Models\Tweet;

class TweetController extends Controller
{
    public function addTweet(CreateTweetRequest $req)
    {
        $user = auth()->user();

        $requestData = [
            'content' => $req->input('content'),
            'user_id' => $user->id,
        ];

        if ($req->hasFile('attachFile')) {
            $image = $req->file('attachFile');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('attachedFile'), $imageName);
            $requestData['fileName'] = $imageName;
        }
        
        $tweet = Tweet::create($requestData);

        return response()->json(ResponseBuilder::build(201, true, "Data created successfully", new TweetDataResponse($tweet)), 201);
        
    }

    public function listTweet()
    {

    }

    public function deleteTweet(Request $req)
    {
        
    }
}
