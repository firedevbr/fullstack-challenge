<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    protected $fillable = [
        'nome',
        'categorias_id'
    ];

    protected $with = [
        'categoria'
    ];

    public function categoria()
    {
        return $this->belongsTo(ProdutoCategoria::class, 'categoria_id');
    }


}
