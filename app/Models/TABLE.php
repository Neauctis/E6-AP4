<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TABLE
 * 
 * @property int $IDTABLE
 * @property int $IDEMPLACEMENT
 * @property int $NBPLACE
 * 
 * @property EMPLACEMENT $emplacement
 * @property Collection|COMMANDE[] $commandes
 * @property Collection|RESERVER[] $reservers
 *
 * @package App\Models
 */
class TABLE extends Model
{
	protected $table = 'TABLES';
	protected $primaryKey = 'ID_TABLE';
	public $timestamps = false;

	protected $casts = [
		'ID_EMPLACEMENT' => 'int',
		'NBPLACE' => 'int'
	];

	protected $fillable = [
		'ID_EMPLACEMENT',
		'NBPLACE'
	];

	public function emplacement()
	{
		return $this->belongsTo(EMPLACEMENT::class, 'IDEMPLACEMENT');
	}

	public function commandes()
	{
		return $this->hasMany(COMMANDE::class, 'ID_TABLE');
	}

	public function reservers()
	{
		return $this->hasMany(RESERVER::class, 'ID_TABLE');
	}
}
