<?php

namespace App\Services\Search;

use App\Models\Article;
use Illuminate\Http\Request;

class SearchServices
{
    public function searchPost(Request $request)
    {
        if ($request->has('search' )){
            $articles = Article::query()->where('title', 'LIKE', "%{$request->search}%")
                ->orWhere('description', 'LIKE', "%{$request->search}%")
                ->orWhere('text', 'LIKE', "%{$request->search}%")
                ->get();
            $title = [];
            $text= [];
            $desc = [];
            foreach ($articles as $art){
                if($art != ""){
                    if($art->title == $request['search']){
                        $title[]= $art;
                    }
                    elseif($art->description == $request['search']){
                        $desc[]= $art;
                    }
                    elseif($art->text == $request['search']){
                        $text[]= $art;
                    }
                }
            }
            $result = array_merge($title, $desc, $text);
            return view('home', ['articles' => $result]);
        }else{
            return back();
        }

    }
}
