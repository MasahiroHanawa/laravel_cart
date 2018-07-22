<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Repositories\Category\CategoryRepository;
use Illuminate\Http\Request;

abstract class BaseController extends Controller
{
    abstract public function get(Request $request);

    private $OK = 200;

    private $ERROR = 404;

    public function responseApiOk($data)
    {
        return response()->json(array_merge(['status' => $this->OK], $data));
    }

    public function responseApiError($data)
    {
        return response()->json(array_merge(['status' => $this->ERROR], $data));
    }
}