<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\FileProcessService;

class FileProcessController extends Controller
{
    protected $fileProcessService;

    public function __construct(FileProcessService $fileProcessService)
    {
        $this->fileProcessService = $fileProcessService;
    }

    public function download()
    {
        return $this->fileProcessService->download();
    }
}
