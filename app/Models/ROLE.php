<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ROLE
 * 
 * @property int $IDROLE
 * @property string $LIBELLEROLE
 * 
 * @property Collection|PERSONNEL[] $personnels
 *
 * @package App\Models
 */
class ROLE extends Model
{
	protected $table = 'ROLE';
	protected $primaryKey = 'IDROLE';
	public $timestamps = false;

	protected $fillable = [
		'LIBELLEROLE'
	];

	public function personnels()
	{
		return $this->hasMany(PERSONNEL::class, 'IDROLE');
	}
}
