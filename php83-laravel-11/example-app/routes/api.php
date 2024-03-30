<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login', [LoginController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', [UserController::class, 'user']);

Route::get("/produtos/all", [\App\Http\Controllers\ProdutoController::class, 'all']);
Route::get("/produtos", [\App\Http\Controllers\ProdutoController::class, 'index']);
Route::post("/produtos", [\App\Http\Controllers\ProdutoController::class, 'store']);
Route::get("/produtos/{produto}", [\App\Http\Controllers\ProdutoController::class, 'show']);
Route::put("/produtos/{produto}", [\App\Http\Controllers\ProdutoController::class, 'update']);
Route::delete("/produtos/{produto}", [\App\Http\Controllers\ProdutoController::class, 'destroy']);

Route::get("/produtos-categorias/all", [\App\Http\Controllers\ProdutoCategoriaController::class, 'all']);
Route::get("/produtos-categorias", [\App\Http\Controllers\ProdutoCategoriaController::class, 'index']);
Route::post("/produtos-categorias", [\App\Http\Controllers\ProdutoCategoriaController::class, 'store']);
Route::get("/produtos-categorias/{produtoCategoria}", [\App\Http\Controllers\ProdutoCategoriaController::class, 'show']);
Route::put("/produtos-categorias/{produtoCategoria}", [\App\Http\Controllers\ProdutoCategoriaController::class, 'update']);
Route::delete("/produtos-categorias/{produtoCategoria}", [\App\Http\Controllers\ProdutoCategoriaController::class, 'destroy']);
