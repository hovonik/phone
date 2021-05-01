@extends('layouts.blank')

@section('content')
    <form action="{{route('admin.login')}}" method="post">
        @csrf
        <div class="container">
            @if(session()->has('error'))
                <span style="color:red">
                    {{session()->get('error')}}
                </span><br />
            @endif
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Username" name="email" required>
            @error('email')<span style="color:red">{{$message}}</span><br/>@enderror
            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
            @error('password')<span style="color:red">{{$message}}</span><br/>@enderror
            <button type="submit">Login</button>
        </div>
    </form>
@endsection
