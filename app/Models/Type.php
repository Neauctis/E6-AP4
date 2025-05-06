<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'TYPECATEGORIE';
    protected $primaryKey = 'idtype';
    public $timestamps = false;

    protected $fillable = [
        'idtype',
        'libelletype'
    ];

    public function categories()
    {
        return $this->hasMany(Categorie::class, 'idtype');
    }
}
