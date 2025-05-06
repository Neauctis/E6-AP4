<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class STOCK
 * 
 * @property int $IDSTOCK
 * @property string $PRODUIT
 * @property int $QUANTITE
 * @property float $PRIXUNITAIRE
 * 
 * @property Collection|INGREDIENT[] $ingredients
 * @property Collection|REAPPROVISIONNEMENT[] $reapprovisionnements
 *
 * @package App\Models
 */
class STOCK extends Model
{
	protected $table = 'STOCK';
	protected $primaryKey = 'IDSTOCK';
	public $timestamps = false;

	protected $casts = [
		'QUANTITE' => 'int',
		'PRIXUNITAIRE' => 'float'
	];

	protected $fillable = [
		'PRODUIT',
		'QUANTITE',
		'PRIXUNITAIRE'
	];

	public function ingredients()
	{
		return $this->hasMany(INGREDIENT::class, 'IDSTOCK');
	}

	public function reapprovisionnements()
	{
		return $this->hasMany(REAPPROVISIONNEMENT::class, 'IDSTOCK');
	}
}
