<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProdutoCategoriaRequest;
use App\Http\Requests\UpdateProdutoCategoriaRequest;
use App\Http\Requests\FiltrarProdutoCategoriaRequest;
use App\Models\ProdutoCategoria;
use App\Services\ProdutoCategoriaService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ProdutoCategoriaController extends Controller
{
    protected ProdutoCategoriaService $produtoCategoriaService;

    public function __construct(
        ProdutoCategoriaService $produtoCategoriaService
    ) {
        $this->produtoCategoriaService = $produtoCategoriaService;
    }

    public function all(): JsonResponse
    {
        Log::info("Iniciando o processo de listagem de todos os produto categoria");
        $allProdutoCategoria = ProdutoCategoria::all();
        return \response()->json($allProdutoCategoria, Response::HTTP_OK);
    }

    public function index(FiltrarProdutoCategoriaRequest $request)
    {
        Log::debug("Listando produto categoria de acordo com parâmetros" , $request->all());

        $input = $request->all();
        $defaultParams = [
            'perPage' => 10,
            'page'    => 1,
            'sort'    => 'created_at',
            'order'   => 'desc',
        ];
        $params = array_merge($defaultParams, $input);
        Log::info("Buscando produto categoria através dos parâmetros", compact('params'));
        $produtoCategorias = $this->produtoCategoriaService->getAll($params);
        Log::debug("produto categoria encontradas", compact('produtoCategorias'));

        return response()->json($produtoCategorias, Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param ProdutoCategoria $produtoCategoria
     * @return JsonResponse
     */
    public function show(ProdutoCategoria $produtoCategoria): JsonResponse
    {
        return response()->json($produtoCategoria, Response::HTTP_OK);
    }

    public function store(StoreProdutoCategoriaRequest $request){
        Log::info("Cadastrar produto categoria de acordo com parâmetros" , $request->all());
        $data = $request->validated();

        return DB::transaction(function () use ($data) {
            $produtoCategoria = $this->produtoCategoriaService->create($data);
            Log::debug("produto categoria inserida com sucesso", compact('produtoCategoria'));

            return \response()->json($produtoCategoria, Response::HTTP_CREATED);
        });
    }

    public function update(UpdateProdutoCategoriaRequest $request, ProdutoCategoria $produtoCategoria)
    {
        Log::info("Iniciando o processo de atualização de um produto categoria", [
            'data' =>  $request->all(),
            'id' => $produtoCategoria->id
        ]);
        $data = $request->validated();

        return DB::transaction(function () use ($data, $produtoCategoria) {
            $produtoCategoria = $this->produtoCategoriaService->update(
                $produtoCategoria->id,
                $data
            );

            Log::debug("produto categoria atualizada com sucesso", compact('produtoCategoria'));

            return \response()->json($produtoCategoria, Response::HTTP_OK);
        });
    }

    public function destroy(int $id){
        Log::info("Iniciando o processo de deletar um produto categoria", [
            'id' => $id
        ]);
        $produtoCategoria = ProdutoCategoria::find($id);
        $produtoCategoria->delete($id);
        return \response()->json([], Response::HTTP_OK);
    }
}
