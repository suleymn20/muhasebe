@extends('front.layouts.master')
@section('title','İletişim')
@section('bg','https://startbootstrap.github.io/startbootstrap-clean-blog/assets/img/contact-bg.jpg')
@section('content')
  <div class="col-md-8">
    @if(session('success'))
    <div class="alert alert-success">
      {{session('success')}}
    </div>
  @endif
  @if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
  @endif
      <p>Bizimle iletişime geçebilirsiniz.</p>
      <div class="my-5">
          <form method="post" action="{{route('contact.post')}}">
            @csrf
              <div class="form-floating">
                  <input class="form-control" name="name" type="text" value="{{old('name')}}" placeholder="Ad Soyadnızı giriniz.." required />
                  <label for="name">Ad Soyad</label>
              </div>
              <div class="form-floating">
                  <input class="form-control" name="email" type="email" value="{{old('email')}}" placeholder="E-Posta adresinizi giriniz..." required />
                  <label for="email">Email address</label>
              </div>
              <div class="">
                  <label>Konu</label>
                <select class="form-control" name="topic">
                  <option @if(old("topic")=="Bilgi") selected @endif>Bilgi</option>
                  <option @if(old("topic")=="Destek") selected @endif>Destek</option>
                  <option @if(old("topic")=="Genel") selected @endif>Genel</option>
                </select>
              </div>
              <div class="form-floating">
                  <textarea class="form-control" name="message" placeholder="Mesajınızı giriniz..." style="height: 12rem" >{{old('message')}}</textarea>
                  <label for="message">Mesajınız</label>
              </div>
              <br />
              <button class="btn btn-primary text-uppercase" id="submitButton" type="submit">Gönder</button>
          </form>
      </div>
  </div>
<div class="col-md-4">
  test
</div>
@endsection
