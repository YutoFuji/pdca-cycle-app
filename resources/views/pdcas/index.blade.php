@extends('layouts.app')
@section('content')
    <a href="{{ route('goals.index') }}">戻る</a>
    <a href="{{ route('pdcas.create', $goal_id) }}">作成</a>
    
    <div class="wrapper">
        @foreach($pdcas as $pdca) 
        @if($pdca->pdca_elem == "Act")
        <div class="box">{{ $pdca->content }}</div>
        @elseif($pdca->pdca_elem == "Plan")
        <div class="box">{{ $pdca->content }}</div>
        @elseif($pdca->pdca_elem == "Check")
        <div class="box">{{ $pdca->content }}</div>
        @elseif($pdca->pdca_elem == "Do")
        <div class="box">{{ $pdca->content }}</div>
        @endif
        @endforeach
    </div>
@endsection