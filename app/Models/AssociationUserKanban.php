<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 09 Mar 2017 15:53:14 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AssociationUserKanban
 * 
 * @property int $id
 * @property int $user_id
 * @property int $kanban_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class AssociationUserKanban extends Eloquent
{
	protected $table = 'association_user_kanban';

	protected $casts = [
		'user_id' => 'int',
		'kanban_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'kanban_id'
	];

    /**
     * Get the users for the blog post.
     */
    public function users()
    {
        return $this->hasMany('App\User','user','user_id','kanban_id');
    }

    /**
     * Get the kanbans for the blog post.
     */
    public function kanbans()
    {
        return $this->hasMany('App\Models\Kanban');
    }
}

return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');

return $this->belongsToMany('App\Autre_Modele', 'nom_table_liaison', 'id_1_table_liaison', 'id_2_table_liaison');