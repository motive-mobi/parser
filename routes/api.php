<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\VerifyApiAccessKey;

use App\Http\Controllers\API\FileProcessController;
use App\Http\Controllers\API\ProductsController;
use App\Http\Controllers\API\ApiResourcesController;

Route::middleware([VerifyApiAccessKey::class])->group(function () {
    Route::group(['prefix' => 'v1'], function () {

        // Detalhes da API, se conexão leitura e escritura com a base de dados está OK, horário da última vez que o CRON foi executado, tempo online e uso de memória.
        Route::get('/', [ApiResourcesController::class, 'resources']);

        Route::group(['prefix' => 'products'], function () {

            // Será responsável por receber atualizações do Projeto Web
            Route::put('/{code}', [ProductsController::class, 'update']);  

            // Mudar o status do produto para trash
            Route::delete('/{code}', [ProductsController::class, 'destroy']);

            // Obter a informação somente de um produto da base de dados
            Route::get('/{code}', [ProductsController::class, 'show']);

            // Listar todos os produtos da base de dados, adicionar sistema de paginação para não sobrecarregar o REQUEST
            Route::get('/', [ProductsController::class, 'index']);
        });

    });
});