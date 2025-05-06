<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MOYENPAIEMENT
 * 
 * @property int $IDPAIEMENT
 * @property string $LIBELLE
 * 
 * @property Collection|PAYER[] $payers
 *
 * @package App\Models
 */
class MOYENPAIEMENT extends Model
{
	protected $table = 'MOYENPAIEMENT';
	protected $primaryKey = 'IDPAIEMENT';
	public $timestamps = false;

	protected $fillable = [
		'LIBELLE'
	];

	public function payers()
	{
		return $this->hasMany(PAYER::class, 'IDPAIEMENT');
	}
}
