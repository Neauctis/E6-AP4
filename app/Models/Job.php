<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Job
 * 
 * @property int $id
 * @property string $queue
 * @property string $payload
 * @property int $attempts
 * @property int|null $reservedat
 * @property int $availableat
 * @property int $createdat
 *
 * @package App\Models
 */
class Job extends Model
{
	protected $table = 'jobs';
	public $timestamps = false;

	protected $casts = [
		'attempts' => 'int',
		'reservedat' => 'int',
		'availableat' => 'int'
	];

	protected $fillable = [
		'queue',
		'payload',
		'attempts',
		'reservedat',
		'availableat'
	];
}
