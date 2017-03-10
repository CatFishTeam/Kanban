<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The kanbans that belong to the user.
     */
    public function kanbans()
    {
        return $this->belongsToMany('App\Models\Kanban');
    }

    /**
     * Get the tasks record associated with the user.
     */
    public function tasks()
    {
        return $this->belongsToMany('App\Models\Task');
    }
}
