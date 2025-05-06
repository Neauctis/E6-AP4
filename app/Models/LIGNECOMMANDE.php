<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LIGNECOMMANDE
 * 
 * @property int $IDLIGNE
 * @property int $IDCOMMANDE
 * @property int $IDPLAT
 * @property int $QUANTITE
 * 
 * @property COMMANDE $commande
 * @property CARTE $carte
 *
 * @package App\Models
 */
class LIGNECOMMANDE extends Model
{
	protected $table = 'LIGNECOMMANDE';
	protected $primaryKey = 'IDLIGNE';
	public $timestamps = false;

	protected $casts = [
		'IDCOMMANDE' => 'int',
		'IDPLAT' => 'int',
		'QUANTITE' => 'int'
	];

	protected $fillable = [
		'IDCOMMANDE',
		'IDPLAT',
		'QUANTITE'
	];

	public function commande()
	{
		return $this->belongsTo(COMMANDE::class, 'IDCOMMANDE');
	}

	public function carte()
	{
		return $this->belongsTo(CARTE::class, 'IDPLAT');
	}
}
