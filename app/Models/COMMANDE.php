<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class COMMANDE
 * 
 * @property int $IDCOMMANDE
 * @property int $IDTABLE
 * @property int $IDPERSONNEL
 * @property Carbon $DATECOMMANDE
 * @property int $MONTANT
 * @property bool $PAYER
 * 
 * @property TABLE $table
 * @property PERSONNEL $personnel
 * @property Collection|LIGNECOMMANDE[] $lignecommandes
 * @property Collection|PAYER[] $payers
 *
 * @package App\Models
 */
class COMMANDE extends Model
{
	protected $table = 'COMMANDE';
	protected $primaryKey = 'IDCOMMANDE';
	public $timestamps = false;

	protected $casts = [
		'IDTABLE' => 'int',
		'IDPERSONNEL' => 'int',
		'DATECOMMANDE' => 'datetime',
		'MONTANT' => 'int',
		'PAYER' => 'bool'
	];

	protected $fillable = [
		'IDTABLE',
		'IDPERSONNEL',
		'DATECOMMANDE',
		'MONTANT',
		'PAYER'
	];

	public function table()
	{
		return $this->belongsTo(TABLE::class, 'IDTABLE');
	}

	public function personnel()
	{
		return $this->belongsTo(PERSONNEL::class, 'IDPERSONNEL');
	}

	public function lignecommandes()
	{
		return $this->hasMany(LIGNECOMMANDE::class, 'IDCOMMANDE');
	}

	public function payers()
	{
		return $this->hasMany(PAYER::class, 'IDCOMMANDE');
	}
}
