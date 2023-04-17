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
            <div>
                <!--PC用の戻るタグ-->
            <div class="d-none d-md-block">
                <a href="{{ route('goals.index') }}" style="font-size: 20px;"  class="text-decoration-none mainred-a">目標一覧に戻る</a>
            </div>
        
            <!--スマートフォン用の戻るタグ-->
            <div class="d-block d-md-none">
                <a href="{{ route('goals.index') }}" style="font-size: 20px;"  class="text-decoration-none mainred-a"><</a>
            </div>
        </div>

        <h2 class="text-center mainred" style="margin-bottom: 20px;">のサイクル</h2>

        <div style="text-align: right; margin-right:30px; margin-bottom:20px">
            <button type="button" onclick="location.href='{{ route('pdcas.create', $goal_id) }}'" class="btn btn-secondary btn-lg">作成・編集</button>
        </div>

    @php
        $sections =[
            ['title' => 'Plan', 'content' => $plan],
            ['title' => 'Do', 'content' => $do],
            ['title' => 'Check', 'content' => $check],
            ['title' => 'Act', 'content' => $act],
        ]
    @endphp

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-12 mx-auto" style="margin-bottom: 20px;">

                @foreach($sections as $section)
                <div class="bg-light d-flex align-items-center shadow rounded" style="height: 80px; margin-bottom: 30px;">
                    <p class="text-secondary mb-0 mx-3" style="font-size: 1.5rem;">{{ $section['title'] }}:</p>
                    @if ($section['content'])
                        <p class="mainred mb-0" style="font-size: 1.5rem">{{ $section['content']->content }}</p>
                    @endif
                </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection