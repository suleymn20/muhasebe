<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use App\Models\Page;
use App\Models\Contact;
use Validator;

class Homepage extends Controller
{
    public function __construct(){
      view()->share('pages',Page::orderBy('order','ASC')->get());
      view()->share('categories',Category::inRandomOrder()->get());
    }
    public function index(){
      $articles=Article::orderBy('created_at','DESC')->paginate(2);
      $pages=Page::orderBy('order','ASC')->get();
      return view('front.homepage',compact('articles','pages'));
    }

    public function single($category,$slug){
      $category=Category::whereSlug($category)->first() ?? abort(403,'kategori yok');
      $article=Article::whereSlug($slug)->whereCategoryId($category->id)->first() ?? abort(403,'yazı yok');
      $article->increment('hit');
      return view('front.single',compact('article'));
    }

    public function category($slug){
      $category=Category::whereSlug($slug)->first() ?? abort(403,'kategori yok');
      $articles=Article::where('category_id',$category->id)->orderBy('created_at','DESC')->paginate(2);
      return view('front.category',compact('category','articles'));
    }

    public function page($slug){
      $page=Page::whereSlug($slug)->first() ?? abort(404);
      return view('front.page',compact('page'));
    }

    public function contact(){
      return view('front.contact');
    }
    public function contactpost(Request $request){

      $rules=[
        'name'=>'required|min:5',
        'email'=>'required|email',
        'topic'=>'required',
        'message'=>'required|min:10'
      ];

      $validate=Validator::make($request->post(),$rules);
      if($validate->fails()){
        return redirect()->route('contact')->withErrors($validate)->withInput();
      }

      $contact=new Contact;
      $contact->name=$request->name;
      $contact->email=$request->email;
      $contact->topic=$request->topic;
      $contact->message=$request->message;
      $contact->save();
      return redirect()->route('contact')->with('success','Mesajınız bize iletildi.');
    }
}
