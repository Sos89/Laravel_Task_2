<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articles = Article::all();
        return view('home', ['articles' => $articles]);
    }

    public function adminView(){
        $articles = Article::all();
        return view('/admin/admin')->with('articles', $articles);
    }
    public function searchPost(Request $request)
    {
        if ($request->has('search' )== $request['search']){
            $articles = Article::query()
                ->where('title', 'LIKE', "%{$request->search}%")
                ->orWhere('description', 'LIKE', "%{$request->search}%")
                ->orWhere('text', 'LIKE', "%{$request->search}%")
                ->get();
            return view('search.index', ['articles' => $articles]);
        }else{
            return redirect('/');
        }

    }


}
