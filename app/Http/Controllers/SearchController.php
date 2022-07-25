<?php

namespace App\Http\Controllers;

use App\Services\Search\SearchServices;
use Illuminate\Http\Request;

class SearchController extends BaseController
{
    public function searchPost(SearchServices $services, Request $request)
    {
        $search = $services->searchPost($request);
        return $search;
    }
}
