<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name', 'description', 'sistem', 'is_completed'];

    public function sistems()
    {
        return $this->belongsToMany(sistem::class, 'task_pelaksana', 'id_task', 'id_pelaksana');
    }

    public function morph()
    {
        return $this->morphMany('App\task_pelaksana', 'relation');
    }
}
