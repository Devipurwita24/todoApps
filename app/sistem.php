<?php

namespace App;
use App\Task_pelaksana;

use Illuminate\Database\Eloquent\Model;

class sistem extends Model
{

    protected $fillable = ['sistem'];

    /**
     * Get all of the task for the sistem
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function task1()
    {
        return $this->hasManyThrough(task::class, task_pelaksana::class);
    }

    public function task2()
    {
        return $this->hasManyThrough(
            'App\task', 'App\task_pelaksana',
            'id_task',  
            'id_pelaksana'
        );
    } 

    public function task()
    {
        return $this->belongsToMany(Task::class, 'task_pelaksana', 'id_task', 'id_pelaksana');
    }

    public function morph()
    {
        return $this->morphMany('App\task_pelaksana', 'relation');
    }
}
