<?php

namespace App\Repositories;

use App\Models\ProdutoCategoria;
use App\Repositories\Abstracts\BaseRepository;

class ProdutoCategoriaRepository extends BaseRepository
{
    public function __construct(ProdutoCategoria $produtoCategoria)
    {
        parent::__construct($produtoCategoria);
    }
}