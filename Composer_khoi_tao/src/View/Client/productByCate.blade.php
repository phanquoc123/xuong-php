@extends('layouts.master')
@section('title')
    Product 
@endsection


@section('content')
    @foreach ($proByCate as $item)
         <h1>{{ $item['name'] }}</h1>
    @endforeach
  
   
@endsection
