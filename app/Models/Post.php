<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 08 Mar 2017 14:23:36 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Post
 * 
 * @property int $id
 * @property string $title
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Post extends Eloquent
{
	protected $fillable = [
		'title',
		'description'
	];
}
