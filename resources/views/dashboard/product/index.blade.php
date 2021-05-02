@extends('layouts.dashboard')

@section('content')
    <a href="{{route('products.create')}}" class="btn btn-primary">Create product</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Handle</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <th scope="row">{{$product->id}}</th>
                <td>{{$product->name}}</td>
                <td>
                    <form method="post" action="{{route('products.destroy', ['product' => $product->id])}}">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                    <a href="{{route('products.edit', ['product' => $product->id])}}" class="btn btn-primary" type="submit">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
