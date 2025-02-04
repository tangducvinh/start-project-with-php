@extends('layouts.app')

@section('content')
    <h1>This is page about</h1>

    @for($i = 0; $i < count($names); $i++) 
        <h1>{{$names[$i]}}</h1>
    @endfor
@endsection
