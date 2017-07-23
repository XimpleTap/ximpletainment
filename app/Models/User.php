<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 23 Jul 2017 04:23:30 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 * 
 * @property int $user_id
 * @property string $username
 * @property string $user_password
 *
 * @package App\Models
 */
class User extends Eloquent
{
	protected $primaryKey = 'user_id';
	public $timestamps = false;

	protected $hidden = [
		'user_password'
	];

	protected $fillable = [
		'username',
		'user_password'
	];
}
