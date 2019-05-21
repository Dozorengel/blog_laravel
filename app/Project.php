<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProjectCreated;

class Project extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($project) {
            Mail::to($project->owner->email)->send(
                new ProjectCreated($project)
            );
        });
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTask($task)
    {
        $this->tasks()->create($task);

        // $this->tasks()->create(compact('description'));

        // return Task::create([
        //     'project_id' => $this->id,
        //     'description' => $description
        // ]);
    }
}

