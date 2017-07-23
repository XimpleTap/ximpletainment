<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 23 Jul 2017 04:23:30 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Audio
 * 
 * @property int $audio_id
 * @property string $audio_title
 * @property string $audio_path
 * @property int $audio_genre
 * 
 *
 * @package App\Models
 */
class Audio extends Eloquent
{
	protected $table = 'audios';
	protected $primaryKey = 'audio_id';
	public $timestamps = false;

	protected $casts = [
		'audio_genre' => 'int'
	];

	protected $fillable = [
		'audio_title',
		'audio_path',
		'audio_genre'
	];

	public function audio_genre()
	{
		return $this->belongsTo(\App\Models\AudioGenre::class, 'audio_genre');
	}
}
