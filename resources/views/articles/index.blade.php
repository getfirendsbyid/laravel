@extends('app')

@section('content')
<h1>Articles</h1>
    <hr>
@foreach($data as $article)
<h2><a href="{{ url('articles',$article->id) }}}">{{$article->title}}</a></h2>
    <article>
        <div class="body">
            {{$article->content}}
        </div>
    </article>
    @endforeach
@stop

