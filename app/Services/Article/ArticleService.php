<?php

namespace App\Services\Article;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ArticleService
{
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
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
        return redirect('/admin');
    }
    public function show($id)
    {
        $articles = Article::find($id);
        return view('show')->with('articles', $articles);
    }
    public function store(ArticleRequest $request)
    {
        if ($request->validated()){
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
            return redirect('admin');

        }
    }
    public function edit($id)
    {
        $articles = Article::find($id);
        return view('edit')->with('articles', $articles);
    }
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
