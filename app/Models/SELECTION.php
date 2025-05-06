<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SELECTION
 * 
 * @property int $IDFORMULE
 * @property int $IDPLAT
 * 
 * @property FORMULE $formule
 * @property CARTE $carte
 *
 * @package App\Models
 */
class SELECTION extends Model
{
	protected $table = 'SELECTION';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IDFORMULE' => 'int',
		'IDPLAT' => 'int'
	];

	public function formule()
	{
		return $this->belongsTo(FORMULE::class, 'IDFORMULE');
	}

	public function carte()
	{
		return $this->belongsTo(CARTE::class, 'IDPLAT');
	}
}
