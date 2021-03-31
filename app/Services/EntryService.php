<?php

namespace App\Services;

use App\Models\Entry;
use App\Models\User;
use App\Utils\Utils;
use Illuminate\Support\Facades\Auth;

class EntryService
{
    public function all() 
    {
        $entries = Entry::orderBy('created_at', 'desc')->paginate(3);
        return $entries;
    }

    public function allByUserId(int $id)
    {
        $entries = Entry::where('user_id', $id)->orderBy('created_at', 'desc')->paginate(3);
        return $entries;
    }

    public function store(Array $input) : void
    {
        $entry = new Entry;
        $input['user_id'] = Auth::id();
        $entry = $entry->create($input);
    }

    public function findById(int $id) : Entry
    {
        $entry = Entry::findOrFail($id);
        return $entry;
    }

    public function update(Array $input, Entry $entry) : void
    {
        $entry->update($input);
    }

}