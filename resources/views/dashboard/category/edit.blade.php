@extends('layouts.dashboard')

@section('content')
    <form method="post" action="{{route('categories.update', ['category' => $category->id])}}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input name="name" type="text" class="form-control" id="name" value="{{$category->name}}"
                   placeholder="Enter category name">
            @error('name')<span style="color:red">{{$message}}</span><br/>@enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
