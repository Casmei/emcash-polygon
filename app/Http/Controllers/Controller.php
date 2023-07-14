<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


/**
 *
 *    @OA\Info(
 *       version="1.0",
 *       title="emCash Polygon Test",
 *       description="Teste emCash | Backend Júnior - Tiago de Castro Lima </br> </br> Esta API permite cadastrar retângulos e triângulos, calcular suas áreas e retornar a soma das áreas de todos os polígonos cadastrados.",
 *   )
 *
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
