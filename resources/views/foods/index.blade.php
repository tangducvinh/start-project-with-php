@extends('layouts.app')

@section('content')
    <h1>This is food's page</h1>

    <a class="link-offset-2" href="/foods/create">Add new food</a>

    <div>
        <label>Choose categories: </label>
        <select name="category">
            @foreach($categories as $category)
                <option value="{{$category->name}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>

    @foreach($foods as $food) 
    <image src='{{asset('./images/'.$food->image_path)}}' width=300 height=300 style="object-fit: cover;">
        <h1>{{$food->name}}
        <p>{{$food->description}}
        <button><a href="/foods/{{$food->id}}">Detail</a></button>
        <a href="/foods/{{$food->id}}/edit">Edit</a>
        <form action='/foods/{{$food->id}}' method='post'>
            @csrf
            @method('delete')
            <button type='submit'>Delete</button>
        </form>
    @endforeach
@endsection