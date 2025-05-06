<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FORMULE
 * 
 * @property int $IDFORMULE
 * @property string $LIBELLE
 * 
 * @property Collection|SELECTION[] $selections
 *
 * @package App\Models
 */
class FORMULE extends Model
{
	protected $table = 'FORMULE';
	protected $primaryKey = 'IDFORMULE';
	public $timestamps = false;

	protected $fillable = [
		'LIBELLE'
	];

	public function selections()
	{
		return $this->hasMany(SELECTION::class, 'IDFORMULE');
	}
}
