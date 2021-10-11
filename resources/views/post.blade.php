@extends('layout')

@section()
  <article>
    <h1>
      {{ $post->title }}
    </h1>
    <div>
      {!! $post->body !!}
    </div>
  </article>

  <a href="/" >Go Back</a>
 @endsection