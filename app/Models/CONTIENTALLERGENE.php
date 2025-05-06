<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CONTIENTALLERGENE
 * 
 * @property int $IDALLERGENE
 * @property int $IDPLAT
 * 
 * @property ALLERGENE $allergene
 * @property CARTE $carte
 *
 * @package App\Models
 */
class CONTIENTALLERGENE extends Model
{
	protected $table = 'CONTIENTALLERGENE';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IDALLERGENE' => 'int',
		'IDPLAT' => 'int'
	];

	public function allergene()
	{
		return $this->belongsTo(ALLERGENE::class, 'IDALLERGENE');
	}

	public function carte()
	{
		return $this->belongsTo(CARTE::class, 'IDPLAT');
	}
}
