
@extends('layouts.home-master')

@section('content')

<main>
    <section>
        @foreach($entries as $entry)
        <article class="card">
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
                    Posted {{ $entry->created_at}} by <a href="{{route('user.entries.index', $entry->user->id)}}" class="entry-author">{{$entry->user->username}}</a>
                </div>
            </div>
        </article>
        <br>
        <br>
        @endforeach
    </section>
    <section class="paginator">
        {{ $entries->links("pagination::bootstrap-4") }}
    </section>
</main>

@endsection