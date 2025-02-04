@extends('layouts.app')

@section('content')
    <h1>This is page's edit food have id: {{$food->id}}</h1>

    <form action='/foods/{{$food->id}}' method='post'>
        @csrf
        @method('put')
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input name='name' value="{{$food->name}}" type="text" class="form-control" id="name" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <input name='description' value='{{$food->description}}' type="text" class="form-control" id="description">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection