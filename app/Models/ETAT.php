<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ETAT
 * 
 * @property int $IDETAT
 * @property string $LIBELLLEETAT
 * 
 * @property Collection|COMMANDE[] $commandes
 *
 * @package App\Models
 */
class ETAT extends Model
{
	protected $table = 'ETAT';
	protected $primaryKey = 'IDETAT';
	public $timestamps = false;

	protected $fillable = [
		'LIBELLLEETAT'
	];

	public function commandes()
	{
		return $this->belongsToMany(COMMANDE::class, 'ETATCOMMANDE', 'IDETAT', 'IDCOMMANDE');
	}
}
