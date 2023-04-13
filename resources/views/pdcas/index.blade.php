@extends('layouts.app')
@section('content')
    <div>
        @if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	    @endif
    </div>
    <div>
        <a href="{{ route('goals.index') }}">戻る</a>
    </div>

    <a href="{{ route('pdcas.create', $goal_id) }}">作成</a>
    
    <div>
        @foreach($pdcas as $pdca)
        
        @if($pdca->pdca_elem == 'Plan')
        <h1>Plan</h1>
        <h2>{{ $pdca->content }}</h2>

        @elseif($pdca->pdca_elem == 'Do')
        <h1>Do</h1>
        <h2>{{ $pdca->content }}</h2>
            
        @elseif($pdca->pdca_elem == 'Check')
        <h1>Check</h1>
        <h2>{{ $pdca->content }}</h2>

        @elseif($pdca->pdca_elem == 'Act')
        <h1>Act</h1>
        <h2>{{ $pdca->content }}</h2>
        @endif

        
        @endforeach
    </div>
@endsection