<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 23 Jul 2017 04:23:30 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AudioGenre
 * 
 * @property int $genre_id
 * @property string $genre_name
 * @property string $genre_icon_path
 * 
 * @property \Illuminate\Database\Eloquent\Collection $audio
 *
 * @package App\Models
 */
class AudioGenre extends Eloquent
{
	protected $primaryKey = 'genre_id';
	public $timestamps = false;

	protected $fillable = [
		'genre_name',
		'genre_icon_path'
	];

	public function audio()
	{
		return $this->hasMany(\App\Models\Audio::class, 'audio_genre');
	}
}
