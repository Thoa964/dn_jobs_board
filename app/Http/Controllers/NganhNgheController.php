<?php

namespace App\Http\Controllers;

use App\Http\Requests\InsertNganhNgheRequest;
use App\Services\NganhNgheService;
use Illuminate\Http\Request;

class NganhNgheController extends Controller
{
    private NganhNgheService $nganhNgheService;

    public function __construct(NganhNgheService $nganhNgheService)
    {
        $this->nganhNgheService = $nganhNgheService;
    }

    public function store(InsertNganhNgheRequest $request)
    {
        $data = $request->validated();
        return $this->nganhNgheService->store($data);
    }
}
