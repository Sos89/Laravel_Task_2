<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchPost(Request $request)
    {
        if ($request->has('search' )){

            $articles = Article::query()
                ->where('title', 'LIKE', "%{$request->search}%")
                ->orWhere('description', 'LIKE', "%{$request->search}%")
                ->orWhere('text', 'LIKE', "%{$request->search}%")
                ->get();
            $title = [];
            $text= [];
            $desc = [];
            foreach ($articles as $art){
                if($art->title == $request['search']){
                    $title[]= $art;
                }
                if($art->description == $request['search']){
                    $desc[]= $art;
                }
                if($art->text == $request['search']){
                    $text[]= $art;
                }
            }
            $result = array_merge($title, $desc,$text);

            return view('home', ['articles' => $result]);
        }else{
            return back();
        }

    }
}
