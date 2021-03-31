<?php

namespace App\Services;

use App\Utils\Utils;
use App\Models\Tweet;
use Illuminate\Support\Facades\Auth;

class TweetService
{
    public function allByUserId(int $id)
    {
        $entries = Tweet::where('user_id', $id)->orderBy('created_at', 'desc')->paginate(3);
        return $entries;
    }

    public function store(Array $input) : void
    {
        $tweet = new Tweet;
        $input['user_id'] = Auth::id();
        $tweet = $tweet->create($input);
    }

    public function hide(int $id)
    {
        $tweet = Tweet::findOrFail($id);
        $tweet->hidden = !$tweet->hidden;
        $tweet->update();
        return $tweet;
    }

    public function hiddenMessage(bool $isHidden) 
    {
        if($isHidden) {
            return "Tweet Hidden Succesfully";
        }
        else {
            return "Tweet is now visible";
        }
    }
}