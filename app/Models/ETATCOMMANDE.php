<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ETATCOMMANDE
 * 
 * @property int $IDETAT
 * @property int $IDCOMMANDE
 * 
 * @property ETAT $etat
 * @property COMMANDE $commande
 *
 * @package App\Models
 */
class ETATCOMMANDE extends Model
{
	protected $table = 'ETATCOMMANDE';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IDETAT' => 'int',
		'IDCOMMANDE' => 'int'
	];

	public function etat()
	{
		return $this->belongsTo(ETAT::class, 'IDETAT');
	}

	public function commande()
	{
		return $this->belongsTo(COMMANDE::class, 'IDCOMMANDE');
	}
}
