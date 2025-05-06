<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class INGREDIENT
 * 
 * @property int $IDSTOCK
 * @property int $IDPLAT
 * 
 * @property STOCK $stock
 * @property CARTE $carte
 *
 * @package App\Models
 */
class INGREDIENT extends Model
{
	protected $table = 'INGREDIENT';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IDSTOCK' => 'int',
		'IDPLAT' => 'int'
	];

	public function stock()
	{
		return $this->belongsTo(STOCK::class, 'IDSTOCK');
	}

	public function carte()
	{
		return $this->belongsTo(CARTE::class, 'IDPLAT');
	}
}
