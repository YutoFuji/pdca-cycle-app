@extends('layouts.app')
@section('content')

    <form action="{{ route('pdcas.update', [$goal_id, $pdca]) }}" method="post">
    @method('patch')
    @csrf
    <div class="form-group">
        <label for="content">title:</label>
        <input type="text" class="form-control" id="content" name="content">
    </div>
      
     
    <button type="submit" class="btn btn-primary">Submit</button>
@endsection