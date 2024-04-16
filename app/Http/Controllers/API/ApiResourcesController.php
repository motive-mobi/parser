<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\ApiResourceService;

class ApiResourcesController extends Controller
{
    protected $apiResourceService;

    public function __construct(ApiResourceService $apiResourceService)
    {
        $this->apiResourceService = $apiResourceService;
    }

    public function resources()
    {
        return $this->apiResourceService->getApiResources();
    }
}
