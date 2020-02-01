<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedule';

    public function assignees()
    {
        return $this->hasMany('App\User');
    }
}
