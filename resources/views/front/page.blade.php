@extends('front.layouts.master')
@section('title',$page->title)
@section('bg',$page->image)
@section('content')
              <div class="col-md-10">
                {!!$page->content!!}
                <br>
              </div>
@endsection
