<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 23 Jul 2017 04:23:30 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class VideoCategory
 * 
 * @property int $category_id
 * @property string $category_name
 * @property string $category_icon_path
 * 
 * @property \Illuminate\Database\Eloquent\Collection $videos
 *
 * @package App\Models
 */
class VideoCategory extends Eloquent
{
	protected $primaryKey = 'category_id';
	public $timestamps = false;

	protected $fillable = [
		'category_name',
		'category_icon_path'
	];

	public function videos()
	{
		return $this->hasMany(\App\Models\Video::class, 'video_category');
	}
}
