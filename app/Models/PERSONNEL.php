<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PERSONNEL
 * 
 * @property int $IDPERSONNEL
 * @property int $IDROLE
 * @property string $NOM
 * @property string $PRENOM
 * @property int $TELEPHONE
 * @property string $EMAIL
 * @property string $PASSWORD
 * 
 * @property ROLE $role
 * @property Collection|AJETER[] $ajeters
 * @property Collection|COMMANDE[] $commandes
 *
 * @package App\Models
 */
class PERSONNEL extends Model
{
	protected $table = 'PERSONNEL';
	protected $primaryKey = 'IDPERSONNEL';
	public $timestamps = false;

	protected $casts = [
		'IDROLE' => 'int',
		'TELEPHONE' => 'int'
	];

	protected $fillable = [
		'IDROLE',
		'NOM',
		'PRENOM',
		'TELEPHONE',
		'EMAIL',
		'PASSWORD'
	];

	public function role()
	{
		return $this->belongsTo(ROLE::class, 'IDROLE');
	}

	public function ajeters()
	{
		return $this->hasMany(AJETER::class, 'IDPERSONNEL');
	}

	public function commandes()
	{
		return $this->hasMany(COMMANDE::class, 'IDPERSONNEL');
	}
}
