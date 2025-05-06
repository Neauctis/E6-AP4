<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EMPLACEMENT
 * 
 * @property int $IDEMPLACEMENT
 * @property string $LIBELLEEMPLACEMENT
 * 
 * @property Collection|TABLE[] $tables
 *
 * @package App\Models
 */
class EMPLACEMENT extends Model
{
	protected $table = 'EMPLACEMENT';
	protected $primaryKey = 'IDEMPLACEMENT';
	public $timestamps = false;

	protected $fillable = [
		'LIBELLEEMPLACEMENT'
	];

	public function tables()
	{
		return $this->hasMany(TABLE::class, 'IDEMPLACEMENT');
	}
}
