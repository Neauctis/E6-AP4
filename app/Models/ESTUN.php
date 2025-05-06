<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ESTUN
 * 
 * @property int $IDTYPE
 * @property int $IDCATEGORIE
 * 
 * @property TYPECATEGORIE $typecategorie
 * @property CATEGORIE $categorie
 *
 * @package App\Models
 */
class ESTUN extends Model
{
	protected $table = 'EST_UN';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IDTYPE' => 'int',
		'IDCATEGORIE' => 'int'
	];

	public function typecategorie()
	{
		return $this->belongsTo(TYPECATEGORIE::class, 'IDTYPE');
	}

	public function categorie()
	{
		return $this->belongsTo(CATEGORIE::class, 'IDCATEGORIE');
	}
}
