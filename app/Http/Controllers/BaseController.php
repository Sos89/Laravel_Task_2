<?php

namespace App\Http\Controllers;

use App\Services\Article\ArticleService;

class BaseController extends Controller
{
    public $service;

    public function __construct(ArticleService $service)
    {
        $this->service = $service;
    }


}
