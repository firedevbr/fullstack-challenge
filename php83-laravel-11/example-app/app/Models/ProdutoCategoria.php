<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoCategoria extends Model
{
    use HasFactory;

    protected $table = 'produto_categorias';

    protected $fillable = [
        'nome'
    ];

    protected $with = [

    ];

    public function produtos()
    {
        return $this->hasMany(Produto::class, 'categoria_id');
    }


}
