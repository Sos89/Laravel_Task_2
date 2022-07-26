<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Image;
use App\Models\Article;
use App\Services\Article\ArticleService;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ArticleController extends BaseController
{
    public function create()
    {
        return view('/admin/create');
    }

    public function store(ArticleService $service, ArticleRequest $request)
    {
        $stor = $service->store($request);
        return $stor;

    }

    public function show(ArticleService $service, $id)
    {
        $articles = $service->show($id);
        return $articles;
    }

    public function edit(ArticleService $service, $id)
    {
        $articles = $service->edit($id);
        return $articles;
    }

    public function update(ArticleService $service, Request $request, $id)
    {
        $update = $service->update($request, $id);
        return $update;
    }

    public function destroy(ArticleService $services, $id)
    {
        $delete = $services->destroy($id);
        return $delete;
    }

    public function destroyImage(ArticleService $services, $id){
        $deleteImage = $services->destroyImage($id);
        return $deleteImage;
    }
    public function destroyCover(ArticleService $services, $id){
       $deleteCover = $services->destroyCover($id);
       return $deleteCover;
    }
}
