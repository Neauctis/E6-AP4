<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class JobBatch
 * 
 * @property string $id
 * @property string $name
 * @property int $totaljobs
 * @property int $pendingjobs
 * @property int $failedjobs
 * @property string $failedjobids
 * @property string|null $options
 * @property int|null $cancelledat
 * @property int $createdat
 * @property int|null $finishedat
 *
 * @package App\Models
 */
class JobBatch extends Model
{
	protected $table = 'jobbatches';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'totaljobs' => 'int',
		'pendingjobs' => 'int',
		'failedjobs' => 'int',
		'cancelledat' => 'int',
		'finishedat' => 'int'
	];

	protected $fillable = [
		'name',
		'totaljobs',
		'pendingjobs',
		'failedjobs',
		'failedjobids',
		'options',
		'cancelledat',
		'finishedat'
	];
}
