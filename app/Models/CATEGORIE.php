<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CATEGORIE
 * 
 * @property int $IDCATEGORIE
 * @property string $LIBELLE
 * 
 * @property Collection|CARTE[] $cartes
 * @property Collection|ESTUN[] $estuns
 *
 * @package App\Models
 */
class CATEGORIE extends Model
{
	protected $table = 'CATEGORIE';
	protected $primaryKey = 'IDCATEGORIE';
	public $timestamps = false;

	protected $fillable = [
		'LIBELLE'
	];

	public function cartes()
	{
		return $this->hasMany(CARTE::class, 'IDCATEGORIE');
	}

	public function estuns()
	{
		return $this->hasMany(ESTUN::class, 'IDCATEGORIE');
	}
}
