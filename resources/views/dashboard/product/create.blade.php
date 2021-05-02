@extends('layouts.dashboard')

@section('content')
    <form method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input required name="name" type="text" class="form-control" id="name"
                   placeholder="Enter category name">
            @error('name')<span style="color:red">{{$message}}</span><br/>@enderror
            <label for="description">Description</label>
            <textarea class="form-control" name="description" placeholder="Product description"></textarea>
            @error('description')<span style="color:red">{{$message}}</span><br/>@enderror
            <div class="form-group">
                <h1>Network</h1>
                <label for="network_technology">Technology</label>
                <input name="network_technology" type="text" class="form-control">
                @error('network_technology')<span style="color:red">{{$message}}</span><br/>@enderror
            </div>
            <div class="form-group">
                <h1>Launch</h1>
                <label for="launch_announced">Announced</label>
                <input name="launch_announced" type="text" class="form-control">
                @error('launch_announced')<span style="color:red">{{$message}}</span><br/>@enderror
                <label for="launch_status">Status</label>
                <input name="launch_status" type="text" class="form-control">
                @error('launch_status')<span style="color:red">{{$message}}</span><br/>@enderror
            </div>
            <div class="form-group">
                <h1>Body</h1>
                <label for="body_dimensions">Dimensions</label>
                <input name="body_dimensions" type="text" class="form-control">
                @error('body_dimensions')<span style="color:red">{{$message}}</span><br/>@enderror
                <label for="body_weight">Weight</label>
                <input name="body_weight" type="text" class="form-control">
                @error('body_weight')<span style="color:red">{{$message}}</span><br/>@enderror
                <label for="body_build">Build</label>
                <input name="body_build" type="text" class="form-control">
                @error('body_build')<span style="color:red">{{$message}}</span><br/>@enderror
                <label for="body_sim">SIM</label>
                <input name="body_sim" type="text" class="form-control">
                @error('body_sim')<span style="color:red">{{$message}}</span><br/>@enderror
            </div>
            <div class="form-group">
                <h1>Memory</h1>
                <label for="memory_card_slot">Card slot</label>
                <input name="memory_card_slot" type="text" class="form-control">
                @error('memory_card_slot')<span style="color:red">{{$message}}</span><br/>@enderror
                <label for="memory_internal">Internal</label>
                <input name="memory_internal" type="text" class="form-control">
                @error('memory_internal')<span style="color:red">{{$message}}</span><br/>@enderror
            </div>
            <div class="form-group">
                <h1>Battery</h1>
                <label for="battery_type">Type</label>
                <input name="battery_type" type="text" class="form-control">
                @error('battery_type')<span style="color:red">{{$message}}</span><br/>@enderror
                <label for="battery_charging">Charging</label>
                <input name="battery_charging" type="text" class="form-control">
                @error('battery_charging')<span style="color:red">{{$message}}</span><br/>@enderror
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category" id="category">
                @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input name="image" type="file" class="form-control">
                @error('image')<span style="color:red">{{$message}}</span><br/>@enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
