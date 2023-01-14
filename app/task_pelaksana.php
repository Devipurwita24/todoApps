<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class task_pelaksana extends Model
{
    public function relation()
    {
        return $this->morphTo();
    }
}
