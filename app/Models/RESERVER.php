<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RESERVER
 * 
 * @property int $IDTABLE
 * @property Carbon $DATERESERVATION
 * @property int $IDSERVICE
 * @property int $IDCLIENT
 * 
 * @property TABLE $table
 * @property CLIENT $client
 * @property SERVICE $service
 *
 * @package App\Models
 */
class RESERVER extends Model
{
	protected $table = 'RESERVER';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IDTABLE' => 'int',
		'DATERESERVATION' => 'datetime',
		'IDSERVICE' => 'int',
		'IDCLIENT' => 'int'
	];

	protected $fillable = [
		'IDCLIENT'
	];

	public function table()
	{
		return $this->belongsTo(TABLE::class, 'IDTABLE');
	}

	public function client()
	{
		return $this->belongsTo(CLIENT::class, 'IDCLIENT');
	}

	public function service()
	{
		return $this->belongsTo(SERVICE::class, 'IDSERVICE');
	}
}
