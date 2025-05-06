<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class REAPPROVISIONNEMENT
 * 
 * @property int $IDREAPPRO
 * @property int $IDSTOCK
 * @property Carbon $DATEREAPPRO
 * @property int $QUANTITE
 * 
 * @property STOCK $stock
 *
 * @package App\Models
 */
class REAPPROVISIONNEMENT extends Model
{
	protected $table = 'REAPPROVISIONNEMENT';
	protected $primaryKey = 'IDREAPPRO';
	public $timestamps = false;

	protected $casts = [
		'IDSTOCK' => 'int',
		'DATEREAPPRO' => 'datetime',
		'QUANTITE' => 'int'
	];

	protected $fillable = [
		'IDSTOCK',
		'DATEREAPPRO',
		'QUANTITE'
	];

	public function stock()
	{
		return $this->belongsTo(STOCK::class, 'IDSTOCK');
	}
}
