<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 23 Jul 2017 04:23:30 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class MediaFile
 * 
 * @property int $file_id
 * @property string $file_path
 * @property int $file_type
 * @property string $file_caption
 * @property int $media_group_id
 * 
 *
 * @package App\Models
 */
class MediaFile extends Eloquent
{
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'file_id' => 'int',
		'file_type' => 'int',
		'media_group_id' => 'int'
	];

	protected $fillable = [
		'file_id',
		'file_path',
		'file_type',
		'file_caption',
		'media_group_id'
	];

	public function file_type()
	{
		return $this->belongsTo(\App\Models\FileType::class, 'file_type');
	}
}
