<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SERVICE
 * 
 * @property int $IDSERVICE
 * @property Carbon $HEUREDEBUT
 * @property Carbon $HEUREFIN
 * 
 * @property Collection|RESERVER[] $reservers
 *
 * @package App\Models
 */
class SERVICE extends Model
{
	protected $table = 'SERVICE';
	protected $primaryKey = 'IDSERVICE';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IDSERVICE' => 'int',
		'HEUREDEBUT' => 'datetime',
		'HEUREFIN' => 'datetime'
	];

	protected $fillable = [
		'HEUREDEBUT',
		'HEUREFIN'
	];

	public function reservers()
	{
		return $this->hasMany(RESERVER::class, 'IDSERVICE');
	}
}
