@extends('layouts.app')
@section('content')
    

    <form action="{{ route('pdcas.store', $goal_id) }}" method="post">
        @csrf
        <div class="form-group">
          <label for="content">title:</label>
          <input type="text" class="form-control" id="content" name="content">
        </div>
        
        <div class="form-group">
          <label>PDCA:</label><br>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="pdca" id="plan" value="Plan">
            <label class="form-check-label" for="plan">Plan</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="pdca" id="do" value="Do">
            <label class="form-check-label" for="do">Do</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="pdca" id="check" value="Check">
            <label class="form-check-label" for="check">Check</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="pdca" id="act" value="Act">
            <label class="form-check-label" for="act">Act</label>
          </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
@endsection