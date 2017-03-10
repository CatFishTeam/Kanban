<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 09 Mar 2017 14:08:55 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class State
 * 
 * @property int $id
 * @property string $title
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class State extends Eloquent
{
	protected $fillable = [
		'title'
	];

    /**
     * Get the tasks for the blog post.
     */
    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }
}
