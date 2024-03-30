<?php

namespace App\Services;

use App\Repositories\ProdutoRepository;
use App\Services\Abstracts\BaseService;

class ProdutoService extends BaseService
{
    protected $repository;

    public function __construct(ProdutoRepository $produtoRepository)
    {
        $this->repository = $produtoRepository;
    }

    protected function repository()
    {
        return $this->repository;
    }
}