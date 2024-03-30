<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProdutoRequest;
use App\Http\Requests\UpdateProdutoRequest;
use App\Http\Requests\FiltrarProdutoRequest;
use App\Models\Produto;
use App\Services\ProdutoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ProdutoController extends Controller
{
    protected ProdutoService $produtoService;

    public function __construct(
        ProdutoService $produtoService
    ) {
        $this->produtoService = $produtoService;
    }

    public function all(): JsonResponse
    {
        Log::info("Iniciando o processo de listagem de todos os produto");
        $allProduto = Produto::all();
        return \response()->json($allProduto, Response::HTTP_OK);
    }

    public function index(FiltrarProdutoRequest $request)
    {
        Log::debug("Listando produto de acordo com parâmetros" , $request->all());

        $input = $request->all();
        $defaultParams = [
            'perPage' => 10,
            'page'    => 1,
            'sort'    => 'created_at',
            'order'   => 'desc',
        ];
        $params = array_merge($defaultParams, $input);
        Log::info("Buscando produto através dos parâmetros", compact('params'));
        $produtos = $this->produtoService->getAll($params);
        Log::debug("produto encontradas", compact('produtos'));

        return response()->json($produtos, Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param Produto $produto
     * @return JsonResponse
     */
    public function show(Produto $produto): JsonResponse
    {
        return response()->json($produto, Response::HTTP_OK);
    }

    public function store(StoreProdutoRequest $request){
        Log::info("Cadastrar produto de acordo com parâmetros" , $request->all());
        $data = $request->validated();

        return DB::transaction(function () use ($data) {
            $produto = $this->produtoService->create($data);
            Log::debug("produto inserida com sucesso", compact('produto'));

            return \response()->json($produto, Response::HTTP_CREATED);
        });
    }

    public function update(UpdateProdutoRequest $request, Produto $produto)
    {
        Log::info("Iniciando o processo de atualização de um produto", [
            'data' =>  $request->all(),
            'id' => $produto->id
        ]);
        $data = $request->validated();

        return DB::transaction(function () use ($data, $produto) {
            $produto = $this->produtoService->update(
                $produto->id,
                $data
            );

            Log::debug("produto atualizada com sucesso", compact('produto'));

            return \response()->json($produto, Response::HTTP_OK);
        });
    }

    public function destroy(int $id){
        Log::info("Iniciando o processo de deletar um produto", [
            'id' => $id
        ]);
        $produto = Produto::find($id);
        $produto->delete($id);
        return \response()->json([], Response::HTTP_OK);
    }
}
