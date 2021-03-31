@extends('layouts.home-master')


@section('content')
<main>
    <section class="section-title">
        <h2>Create Post</h2>
    </section>
    <br>
    <section class="select-radio">
        <div class="select-radio__entry">
            <label for="post">Entry</label>
            <input type="radio" name="post" value="entry" checked>&nbsp;&nbsp;
        </div>
        <div class="select-radio__tweet">
            <label for="post">Tweet</label>
            <input type="radio" name="post" value="tweet">
        </div>
    </section>
    <br>
    <section id="form-entry">    
        <form action="{{route('entries.store')}}" method="post">
            @csrf
            <div class="form__group">
                <label for="title">{{ __('Title') }}</label>
                <input id="title" type="text" class="form__group-field" name="title" autofocus>
            </div>
            <div class="form__group">
                <label for="content">Content</label>
                <textarea id="entry-content" class="form__group-field" name="content" rows="10"></textarea>
            </div>               
            <button class="btn btn-primary" type="submit" name="submit">
                {{ __('Submit') }}
            </button>
            <div class="loader"></div>
        </form>
    </section>

    <section id="form-tweet">
        <form action="{{route('tweets.store')}}" method="post">
            @csrf
            <div class="form__group">
                <label for="content">Content</label>
                <textarea id="tweet-content" class="form__group-field" name="content" rows="10"></textarea>
            </div>               
            <button class="btn btn-primary" type="submit" name="submit">
                {{ __('Submit') }}
            </button>
            <div class="loader"></div>
        </form>
    </section>

</main>

@endsection

@section('scripts')
    <script src="{{ asset('js/components/loader.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/components/form-errors.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/home/entries/create.js') }}" type="text/javascript"></script>
@endsection
