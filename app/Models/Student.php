<?php

namespace App\Models;

use App\Models\Account;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function institute()
    {
        return $this->belongsTo(Institute::class);
    }

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class)->withTimestamps();
    }

    public function batches()
    {
        return $this->belongsToMany(Batch::class)->withTimestamps();
    }

}
