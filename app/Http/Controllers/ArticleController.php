<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Article;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('/admin/admin')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile("cover")) {
            $file = $request->file("cover");
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path("cover/"), $imageName);

            $article = new Article([
                'title' => $request->title,
                'description' => $request->description,
                'text' => $request->text,
                'cover' => $imageName,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]);
            $article->save();
        }
        if ($request->hasFile("images")) {
            $files = $request->file("images");
            foreach ($files as $file) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $request['article_id'] = $article->id;
                $request['image'] = $imageName;
                $file->move(\public_path("/images"), $imageName);
                Image::create($request->all());
            }
        }
        return redirect()->route('article.create')->with('success', 'Row successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $articles = Article::findOrFail($id);
        return view('show')->with('articles', $articles);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articles = Article::findOrFail($id);
        return view('edit')->with('articles', $articles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        if ($request->hasFile("cover")){
            if (File::exists("cover/".$article->cover)){
                File::delete("cover/".$article->cover);
            }
            $file = $request->file("cover");
            $article->cover= time().'_'.$file->getClientOriginalName();
            $file->move(\public_path("cover"), $article->cover);
            $request['cover'] = $article->cover;
        }
        $article->update([
            'title' => $request->title,
            'description' => $request->description,
            'text' => $request->text,
            'cover' => $article->cover,
            'updated_at' => NOW()
        ]);
        if ($request->hasFile("images")){
            $files=$request->file("images");
            foreach($files as $file){
                $imageName = time().'_'.$file->getClientOriginalName();
                $request['article_id']= $id;
                $request['image']= $imageName;
                $file->move(\public_path("images"), $imageName);
                Image::create($request->all());
            }
        }
        return redirect('/article');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articles = Article::findOrFail($id);
        if (File::exists("cover/" . $articles->cover)) {
            File::delete("cover/" . $articles->cover);
        }
        $images = Image::where("article_id", $articles->id)->get();
        foreach ($images as $image) {
            if (File::exists("images/" . $image->image)) {
                File::delete("images/" . $image->image);
            }
        }
        $articles->delete();
        return back();
    }

    public function destroyImage($id){
        $image = Image::findOrFail($id);
        if (File::exists("images/" . $image->image)) {
            File::delete("images/" . $image->image);
        }
        Image::find($id)->delete();
        return back();
    }
    public function destroyCover($id){
        $cover = Article::findOrFail($id)->cover;
        if (File::exists("cover/" . $cover)) {
            File::delete("cover/" . $cover);
        }
        return back();
    }


}
