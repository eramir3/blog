@extends('layouts.home-master')

@section('content')
<main>
    <form method="post" action="{{route('login')}}">
        @csrf
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
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>

@endsection

@section('scripts')
    <script src="{{ asset('js/auth/login.js') }}" type="text/javascript"></script>
@endsection