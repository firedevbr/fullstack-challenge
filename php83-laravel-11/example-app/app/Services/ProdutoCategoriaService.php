<?php

namespace App\Services;

use App\Repositories\ProdutoCategoriaRepository;
use App\Services\Abstracts\BaseService;

class ProdutoCategoriaService extends BaseService
{
    protected $repository;

    public function __construct(ProdutoCategoriaRepository $produtoCategoriaRepository)
    {
        $this->repository = $produtoCategoriaRepository;
    }

    protected function repository()
    {
        return $this->repository;
    }
}