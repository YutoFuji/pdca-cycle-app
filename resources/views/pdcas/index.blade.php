@extends('layouts.app')
@section('content')
    <a href="{{ route('pdcas.create', $goal_id) }}">作成</a>
    @foreach($pdcas as $pdca) 
        {{$pdca->pdca}} : {{$pdca->content}}  
    @endforeach
@endsection