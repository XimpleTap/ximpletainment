<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 23 Jul 2017 04:23:30 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class FileType
 * 
 * @property int $type_id
 * @property string $type_name
 * 
 * @property \App\Models\MediaFile $media_file
 *
 * @package App\Models
 */
class FileType extends Eloquent
{
	protected $primaryKey = 'type_id';
	public $timestamps = false;

	protected $fillable = [
		'type_name'
	];

	public function media_file()
	{
		return $this->hasOne(\App\Models\MediaFile::class, 'file_type');
	}
}
