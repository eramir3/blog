
@extends('layouts.home-master')


@section('content')

<section class="section-title">
    <h2 class="entry-author">Posts by {{$user->username}}</h2>
</section>
<br>
<div class="user-posts">
    <main class="user-entries">
        <h1>Entries</h1>
        <section class="entries">
            @foreach($entries as $entry)
            <div class="card entry-card">
                <div class="card-body">
                    <h2 class="card-title">{{$entry->title}}</h2>
                    <p class="card-text">{{$entry->content}}</p>
                    <div class="card-options">
                        <a href="{{route('entries.show', $entry->id)}}" class="btn btn-primary">Read More</a>
                        @can('view', $entry)
                            <a href="{{route('entries.edit', $entry->id)}}" class="btn btn-primary">Edit Entry</a>
                        @endcan
                    </div>
                </div>
                <div class="card-footer">
                    <div>
                        Posted {{ $entry->created_at}}
                    </div>
                </div>
            </div>
            <br>
            <br>
            @endforeach
        </section>
    </main>
    <aside class="user-tweets">
        <h1>Tweets</h1>

        @foreach($tweets as $tweet)
            @if(!$tweet->hidden)
            <div class="card tweet-card">
                <div class="card-body">
                    <p class="card-text">{{$tweet->content}}</p>
                    <div class="card-options">
                        <form action="{{route('tweets.hide', $tweet->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            @if(Auth::user() && $tweet->user_id === Auth::user()->id)
                            <button id="tweet_{{$tweet->id}}" type="submit" class="tweet-btn">
                                @if($tweet->hidden)
                                    Unhide
                                @else
                                    Hide
                                @endif
                            </button>
                            @endif
                        </form>
                    </div>
                </div>
                <div class="card-footer">
                    <div>
                        Posted {{ $tweet->created_at}}
                    </div>
                </div>
            </div>
            @elseif(Auth::user() && $tweet->user_id === Auth::user()->id)
            <div class="card tweet-card">
                <div class="card-body">
                    <p class="card-text">{{$tweet->content}}</p>
                    <div class="card-options">
                        <form action="{{route('tweets.hide', $tweet->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <button  id="tweet_{{$tweet->id}}" type="submit" class="tweet-btn">
                                @if($tweet->hidden)
                                    Unhide
                                @else
                                    Hide
                                @endif
                            </button>
                        </form>
                    </div>
                </div>
                <div class="card-footer">
                    <div>
                        Posted {{ $tweet->created_at}}
                    </div>
                </div>
            </div>
            @endif
            <br>
        @endforeach
    </aside>
</div>

@endsection

@section('scripts')
    <script src="{{ asset('js/home/tweets/hide-tweet.js') }}" type="text/javascript"></script>
@endsection