<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(){
        $articles=Article::when(isset(request()->search),function ($q){
            $search=request()->search;
            return $q->where("title","like","%$search%")->orwhere("description","like","%$search%");
        })
            ->with('user','category')->latest('id')->paginate(10);
        return view('welcome',compact('articles'));
    }

    public function detail($slug){
        $article=Article::where("slug",$slug)->with('user','category')->first();
        if(!$article){
            return abort(404);
        }
        return view('Blog.detail',compact('article'));
    }

    public function byCategory($slug){
        $cat=Category::where('slug',$slug)->first('id')->id;
        $articles=Article::when(isset(request()->search),function ($q){
            $search=request()->search;
            return $q->where("title","like","%$search%")->orwhere("description","like","%$search%");
        })
            ->where('category_id',$cat)->with('user','category')->latest('id')->paginate(10);
        return view('welcome',compact('articles'));
    }

    public function byUser($slug){
        $user=User::where('slug',$slug)->first('id')->id;
        $articles=Article::when(isset(request()->search),function ($q){
            $search=request()->search;
            return $q->where("title","like","%$search%")->orwhere("description","like","%$search%");
        })
            ->where('user_id',$user)->with('user','category')->latest('id')->paginate(10);
        return view('welcome',compact('articles'));
    }

    public function byDate($date){
        $articles=Article::where('created_at',$date)->when(isset(request()->search),function ($q){
            $search=request()->search;
            return $q->where("title","like","%$search%")->orwhere("description","like","%$search%");
        })
            ->with('user','category')->latest('id')->paginate(10);
        return view('welcome',compact('articles'));
    }
}
