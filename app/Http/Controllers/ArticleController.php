<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use function PHPUnit\Framework\at;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function apiIndex(){
        $articles=Article::all();
        return response($articles,200);
    }

    public function index()
    {

        $articles=Article::when(isset(request()->search),function ($q){
            $search=request()->search;
            return $q->where("title","like","%$search%")->orwhere("description","like","%$search%");
        })
            ->with('user','category')->latest('id')->paginate(10);
        return view('article.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category'=>'required|exists:categories,id',
            'title'=>'required|min:5,max:100',
            'description'=>'required|min:5'
        ]);

        $article=new Article();
        $article->title=$request->title;
        $article->slug=Str::slug($request->title)."-".uniqid();
        $article->user_id=Auth::id();
        $article->description=$request->description;
        $article->excerpt=Str::words($article->description,50);
        $article->category_id=$request->category;
        $article->save();

        return redirect()->route('article.index')->with('message','New Article Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('article.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('article.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'category'=>'required|exists:categories,id',
            'title'=>'required|min:5,max:100',
            'description'=>'required|min:5'
        ]);

        if($article->title != $request->title){
            $article->slug=Str::slug($request->title)."-".uniqid();
        }
        $article->title=$request->title;
        $article->description=$request->description;
        $article->excerpt=Str::words($article->description,50);
        $article->category_id=$request->category;
        $article->update();

        return redirect()->route('article.index')->with('message','Article Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('article.index',['page'=>request()->page])->with('message','Article Deleted');
    }
}
