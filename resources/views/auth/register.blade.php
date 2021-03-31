@extends('layouts.home-master')


@section('content')
<main>
    <form method="post" action="{{route('register')}}">
        @csrf
        <div class="form__group">
            <label for="username">Username</label>
            <input type="username" class="form__group-field" name="username" id="username">
        </div>
        <br>
        <div class="form__group">
            <label for="twitter_username">Twitter Username</label>
            <input type="twitter_username" class="form__group-field" name="twitter_username" id="twitter_username">
        </div>
        <br>
        <div class="form__group">
            <label for="email">Email</label>
            <input type="email" class="form__group-field" name="email" id="email">
        </div>
        <br>
        <div class="form__group">
            <label for="pwd">Password</label>
            <input type="password" class="form__group-field" name="password" id="pwd">
        </div>
        <br>
        <div class="form__group">
            <label for="pwd">Confirm Password</label>
            <input type="password" class="form__group-field" name="password_confirmation" id="password-confirm">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>

@endsection

@section('scripts')
    <script src="{{ asset('js/auth/register.js') }}" type="text/javascript"></script>
@endsection