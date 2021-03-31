@extends('layouts.home-master')


@section('content')
<main class="main-entry">
    <section>
        <h1 class="entry-title">{{$entry->title}}</h1>
        <p class="lead">See all posts by <a href="{{route('user.entries.index', $entry->user->id)}}" class="entry-author">{{$entry->user->username}}</a>
        <hr>
        <p>Posted {{$entry->created_at}}</p>
        <hr>
        <p class="lead">
            {{$entry->content}}
        </p>
    </section>
</main>
@endsection