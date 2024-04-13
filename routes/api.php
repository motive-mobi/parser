<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::middleware('auth:sanctum')->group(function () {
    Route::group(['prefix' => 'v1'], function () {

        Route::get('/', function () {
            return 'Detalhes da API, se conexão leitura e escritura com a base de dados está OK, horário da última vez que o CRON foi executado, tempo online e uso de memória.';
        });

        Route::put('/products/{code}', function (Request $request) {
            return 'Será responsável por receber atualizações do Projeto Web';
        });

        Route::delete('/products/{code}', function (Request $request) {
            return 'Mudar o status do produto para trash';
        });

        Route::get('/products/{code}', function (Request $request) {
            return 'Obter a informação somente de um produto da base de dados';
        });

        Route::get('/products', function (Request $request) {
            return 'Listar todos os produtos da base de dados, adicionar sistema de paginação para não sobrecarregar o REQUEST';
        });

    });
//});