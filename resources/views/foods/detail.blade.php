@extends('layouts.app')

@section('content')
    <ul>
        <li>name: {{$food->name}}</li>
        <li>category: {{$food->category->name}}</li>
        <li>description: {{$food->description}}</li>
    </ul>
@endsection