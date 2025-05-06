<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ALLERGENE
 * 
 * @property int $IDALLERGENE
 * @property string $LIBELLE
 * 
 * @property Collection|CONTIENTALLERGENE[] $contientallergenes
 *
 * @package App\Models
 */
class ALLERGENE extends Model
{
	protected $table = 'ALLERGENE';
	protected $primaryKey = 'IDALLERGENE';
	public $timestamps = false;

	protected $fillable = [
		'LIBELLE'
	];

	public function contientallergenes()
	{
		return $this->hasMany(CONTIENTALLERGENE::class, 'IDALLERGENE');
	}
}
