<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CLIENT
 * 
 * @property int $IDCLIENT
 * @property string $NOM
 * @property string $PRENOM
 * @property string $EMAIL
 * @property string $PASSWORD
 * @property bool $VALIDER
 * 
 * @property Collection|RESERVER[] $reservers
 *
 * @package App\Models
 */
class CLIENT extends Model
{
	protected $table = 'CLIENT';
	protected $primaryKey = 'IDCLIENT';
	public $timestamps = false;

	protected $casts = [
		'VALIDER' => 'bool'
	];

	protected $fillable = [
		'NOM',
		'PRENOM',
		'EMAIL',
		'PASSWORD',
		'VALIDER'
	];

	public function reservers()
	{
		return $this->hasMany(RESERVER::class, 'IDCLIENT');
	}
}
