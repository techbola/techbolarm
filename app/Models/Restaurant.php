<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{

    protected $guarded = [];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

}
