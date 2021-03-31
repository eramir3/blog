<?php

namespace App\Http\Controllers;

use App\Utils\Notifier;
use App\Services\UserService;
use App\Services\EntryService;
use App\Services\TweetService;
use App\Enums\NotificationEnum;
use App\Http\Requests\EntryRequest;
use App\Models\Entry;

class EntryController extends Controller
{
    private $entryService;

    private $userService;

    private $tweetService;
    
    public function __construct(EntryService $entryService, UserService $userService, TweetService $tweetService)
    {
        $this->entryService = $entryService;
        $this->userService = $userService;
        $this->tweetService = $tweetService;;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entries = $this->entryService->all();
        return view('home.entries.index', compact('entries'));
    }

    public function indexByUserId(int $id)
    {
        $user = $this->userService->findById($id);
        $tweets = $this->tweetService->allByUserId($user->id);
        $entries = $this->entryService->allByUserId($user->id);
        return view('home.entries.user', compact('entries', 'user', 'tweets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.entries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EntryRequest $request)
    {
        try 
        {
            $this->entryService->store($request->validated());
            return $this->successResponse('Entry Created Successfully', 200);
        }
        catch(\Exception $e)
        {
            return $this->errorResponse('Creation Error', 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entry = $this->entryService->findById($id);
        return view('home.entries.show', compact('entry'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entry = $this->entryService->findById($id);
        $this->authorize('view', $entry);
        return view('home.entries.edit', compact('entry'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(entryRequest $request, $id)
    {
        try 
        {
            $entry = $this->entryService->findById($id);
            $this->authorize('update', $entry);
            $this->entryService->update($request->validated(), $entry);
            return $this->successResponse('Entry Update Successfully', 200);
        }
        catch(\Exception $e)
        {
            return $this->errorResponse('Entry Update Error', 400);
        }
    }
}
