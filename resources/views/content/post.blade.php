@extends('master')



@section('content')

<h1 class="page-header">
    Welcome to our blog
    <small>the post you choosed</small>
</h1>

<!-- First Blog Post -->



<h2>
    <a href="#">{{ $post->title }}</a>
</h2>

<p><span class="glyphicon glyphicon-time"></span> Posted on {{ $post->created_at->toDayDateTimeString() }}</p>
<hr>
@if($post->url)
  <img class="img-responsive" src=" ../upload/{{ $post->url }}" alt="">
@endif
<hr>

<p>{{ $post->body }}</p>
<a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
<br>
<div class="comments">
    
    @foreach($post->comments as $comment)    

           <p class="comment"> {{ $comment->body  }} </p>

    @endforeach
</div>

<br>

@if($stop_comment == 1)
  
  <h3>Comments Are Currently Closed !</h3>


@else
<form method="POST" action="/posts/{{ $post->id }}/store">

    {{ csrf_field() }}

  
  <div class="form-group">
    <label for="body">Comment</label>
    <textarea name="body" id="body" class="form-control"></textarea>
  </div>
  <div class="form-group">
     <button type="submit" class="btn btn-primary">Add Comment</button>
  </div>
 
</form>

@endif
<hr>






@stop