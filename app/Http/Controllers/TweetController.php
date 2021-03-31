<?php

namespace App\Http\Controllers;

use App\Services\TweetService;
use App\Http\Requests\TweetRequest;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    private $tweetService;
    
    public function __construct(TweetService $tweetService)
    {
        $this->tweetService = $tweetService;
    }

    public function hide($id)
    {
        try 
        {
            $tweet = $this->tweetService->hide($id);
            $message = $this->tweetService->hiddenMessage($tweet->hidden);
            return $this->successResponseWithData($message, $tweet, 200);
        }
        catch(\Exception $e)
        {
            return $this->errorResponse('Tweet Update Error', 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TweetRequest $request)
    {
        try 
        {
            $this->tweetService->store($request->validated());
            return $this->successResponse('Tweet Created Succesfully', 200);
        }
        catch(\Exception $e)
        {
            return $this->errorResponse('Tweet Create Error', 400);
        }
    }
}
