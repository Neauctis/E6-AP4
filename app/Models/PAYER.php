<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PAYER
 * 
 * @property int $IDPAIEMENT
 * @property int $IDCOMMANDE
 * @property int $MONTANT
 * 
 * @property MOYENPAIEMENT $moyenpaiement
 * @property COMMANDE $commande
 *
 * @package App\Models
 */
class PAYER extends Model
{
	protected $table = 'PAYER';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IDPAIEMENT' => 'int',
		'IDCOMMANDE' => 'int',
		'MONTANT' => 'int'
	];

	protected $fillable = [
		'MONTANT'
	];

	public function moyenpaiement()
	{
		return $this->belongsTo(MOYENPAIEMENT::class, 'IDPAIEMENT');
	}

	public function commande()
	{
		return $this->belongsTo(COMMANDE::class, 'IDCOMMANDE');
	}
}
