@extends('layouts.home-master')


@section('content')
<main>
    <section class="section-title">
        <h2>Edit Entry</h2>
    </section>
    <section>
        <form action="{{route('entries.update', $entry->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form__group">
                <label for="title" class="col-md-3 col-form-label text-md-right">{{ __('Title') }}</label>
                <div class="col-md-6">
                    <input id="title" type="text" class="form__group-field" name="title" value="{{$entry->title}}" autofocus>
                </div>
            </div>
            <div class="form__group">
                <label for="content">Content</label>
                <textarea class="form__group-field" id="content" name="content" rows="10">{{$entry->content}}</textarea>
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
    <script src="{{ asset('js/home/entries/edit.js') }}" type="text/javascript"></script>
@endsection
