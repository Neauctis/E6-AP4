<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DECHET
 * 
 * @property int $IDDECHET
 * @property int $QUANTITE
 * @property Carbon $DATEDECHET
 * 
 * @property Collection|AJETER[] $ajeters
 *
 * @package App\Models
 */
class DECHET extends Model
{
	protected $table = 'DECHET';
	protected $primaryKey = 'IDDECHET';
	public $timestamps = false;

	protected $casts = [
		'QUANTITE' => 'int',
		'DATEDECHET' => 'datetime'
	];

	protected $fillable = [
		'QUANTITE',
		'DATEDECHET'
	];

	public function ajeters()
	{
		return $this->hasMany(AJETER::class, 'IDDECHET');
	}
}
