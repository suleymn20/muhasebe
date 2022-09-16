<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;

class Homepage extends Controller
{
    public function index(){
      $categories=Category::inRandomOrder()->get();
      $articles=Article::orderBy('created_at','DESC')->get();
      return view('front.homepage',compact('categories','articles'));
    }

    public function single($category,$slug){
      $categories=Category::inRandomOrder()->get();
      $category=Category::whereSlug($category)->first() ?? abort(403,'kategori yok');
      $article=Article::whereSlug($slug)->whereCategoryId($category->id)->first() ?? abort(403,'yazı yok');
      $article->increment('hit');
      return view('front.single',compact('categories','article'));
    }

    public function category($slug){
      $category=Category::whereSlug($slug)->first() ?? abort(403,'kategori yok');
      $categories=Category::inRandomOrder()->get();
      $articles=Article::where('category_id',$category->id)->orderBy('created_at','DESC')->get();
      return view('front.category',compact('category','articles','categories'));
    }
}
