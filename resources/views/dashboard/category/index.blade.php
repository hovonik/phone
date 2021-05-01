@extends('layouts.dashboard')

@section('content')
    <a href="{{route('categories.create')}}" class="btn btn-primary">Create category</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Handle</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->name}}</td>
                <td>
                    <form method="post" action="{{route('categories.destroy', ['category' => $category->id])}}">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                    <a href="{{route('categories.edit', ['category' => $category->id])}}" class="btn btn-primary" type="submit">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
