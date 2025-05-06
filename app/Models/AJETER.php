<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AJETER
 * 
 * @property int $IDDECHET
 * @property int $IDPERSONNEL
 * 
 * @property DECHET $dechet
 * @property PERSONNEL $personnel
 *
 * @package App\Models
 */
class AJETER extends Model
{
	protected $table = 'AJETER';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IDDECHET' => 'int',
		'IDPERSONNEL' => 'int'
	];

	public function dechet()
	{
		return $this->belongsTo(DECHET::class, 'IDDECHET');
	}

	public function personnel()
	{
		return $this->belongsTo(PERSONNEL::class, 'IDPERSONNEL');
	}
}
