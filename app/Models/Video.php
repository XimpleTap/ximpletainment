<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 23 Jul 2017 04:23:30 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Video
 * 
 * @property int $video_id
 * @property string $video_name
 * @property string $video_path
 * @property string $poster_path
 * @property int $video_category
 * @property string $video_description
 * 
 *
 * @package App\Models
 */
class Video extends Eloquent
{
	protected $primaryKey = 'video_id';
	public $timestamps = false;

	protected $casts = [
		'video_category' => 'int'
	];

	protected $fillable = [
		'video_name',
		'video_path',
		'poster_path',
		'video_category',
		'video_description'
	];

	public function video_category()
	{
		return $this->belongsTo(\App\Models\VideoCategory::class, 'video_category');
	}
}
