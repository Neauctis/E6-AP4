<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TYPECATEGORIE
 * 
 * @property int $idtype
 * @property string $libelletype
 * 
 * @property Collection|ESTUN[] $estuns
 *
 * @package App\Models
 */
class TYPECATEGORIE extends Model
{
	protected $table = 'TYPECATEGORIE';
	protected $primaryKey = 'idtype';
	public $timestamps = false;

	protected $fillable = [
		'libelletype'
	];

	public function estuns()
	{
		return $this->hasMany(ESTUN::class, 'IDTYPE');
	}
}
