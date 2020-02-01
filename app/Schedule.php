<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public function assignees()
    {
        return $this->hasMany('App\User');
    }
}
