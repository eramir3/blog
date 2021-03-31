<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entry extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        return  Carbon::parse($value)->diffForHumans();
    }
}
