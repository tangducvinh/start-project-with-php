@extends('layouts.app')

@section('content')
    <h1>This is form add new food</h1>

    <form action='/foods' method='post'  enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input name='name' type="text" class="form-control" id="name" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label class="form-label">Image</label>
          <input name='image' type="file" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="count" class="form-label">Count</label>
          <input name='count' type="text" class="form-control" id="count" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <input name='description' type="text" class="form-control" id="description">
        </div>
        <div>
          <label>Choose categories: </label>
          <select name="category">
              @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
   
    @if ($errors->any())
      <div>
        @foreach($errors->all() as $error)
          <p class='text-danger'>{{$error}}</p>
        @endforeach
      </div>
    @endif
@endsection