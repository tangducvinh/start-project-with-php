@extends('layouts.app')

@section('content')
    <h1>This is form add new food</h1>

    <form action='/foods' method='post'>
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input name='name' type="text" class="form-control" id="name" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <input name='description' type="text" class="form-control" id="description">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection