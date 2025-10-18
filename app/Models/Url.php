<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'destination_url',
        'domain',
        'back_half',
        'user_id',
        'clicks',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
