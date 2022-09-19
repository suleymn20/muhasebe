@if(count($articles)>0)
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
<div class="d-flex justify-content-center">{{ $articles->links() }} </div>
@else
  <div class="alert alert-danger">
    <h1>Böyle bir kategoriye ait yazı bulunamadı.</h1>
  </div>
@endif
