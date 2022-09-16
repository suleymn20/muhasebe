@extends('front.layouts.master')
@section('title','Anasayfa')
@section('content')

<div class="col-md-9">
    <!-- Post preview-->
    @foreach($articles as $article)
    <div class="post-preview">
        <a href="{{route('single',[$article->getCategory->slug,$article->slug])}}">
            <h2 class="post-title">{{$article->title}}</h2>
            <img src="{{$article->image}}" alt="">
            <h3 class="post-subtitle">{{str_limit($article->content,80)}}</h3>
        </a>
        <p class="post-meta">
            Kategori:
            <a href="#!">{{$article->getCategory->name}} </a> <span class="float-end">{{$article->created_at->diffForHumans()}}</span>
        </p>
    </div>
      @if(!$loop->last)
        <hr class="my-4" />
      @endif
    @endforeach
</div>
@include('front.widgets.categoryWidget')
@endsection
