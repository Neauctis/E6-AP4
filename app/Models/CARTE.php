<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CARTE
 * 
 * @property int $IDPLAT
 * @property int $IDCATEGORIE
 * @property string $TITRE
 * @property int $PRIX
 * @property string|null $IMAGE
 * 
 * @property CATEGORIE $categorie
 * @property Collection|CONTIENTALLERGENE[] $contientallergenes
 * @property Collection|INGREDIENT[] $ingredients
 * @property Collection|LIGNECOMMANDE[] $lignecommandes
 * @property Collection|SELECTION[] $selections
 *
 * @package App\Models
 */
class CARTE extends Model
{
	protected $table = 'CARTE';
	protected $primaryKey = 'IDPLAT';
	public $timestamps = false;

	protected $casts = [
		'IDCATEGORIE' => 'int',
		'PRIX' => 'int'
	];

	protected $fillable = [
		'IDCATEGORIE',
		'TITRE',
		'PRIX',
		'IMAGE'
	];

	public function categorie()
	{
		return $this->belongsTo(CATEGORIE::class, 'IDCATEGORIE');
	}

	public function contientallergenes()
	{
		return $this->hasMany(CONTIENTALLERGENE::class, 'IDPLAT');
	}

	public function ingredients()
	{
		return $this->hasMany(INGREDIENT::class, 'IDPLAT');
	}

	public function lignecommandes()
	{
		return $this->hasMany(LIGNECOMMANDE::class, 'IDPLAT');
	}

	public function selections()
	{
		return $this->hasMany(SELECTION::class, 'IDPLAT');
	}
}
