@extends('layouts.app')

@section('title', $category->title . " - Slava")
@section('content')
  <div class="container">
    @forelse ($articles as $article)
        <div class="row">
          <div class="col-sm-12">
            <h2>
              <a href="{{route('article', $article->slug)}}">
                {{$article->title}}
              </a>
              <p>{!!$article->description_short!!}</p>
            </h2>
          </div>
        </div>
      @empty
        <h2 class='text-center'>Пусто</h2>
      @endforelse
        {{$articles->links()}}
  </div>
@endsection
