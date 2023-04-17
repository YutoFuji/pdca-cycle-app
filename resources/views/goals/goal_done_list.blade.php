@extends('layouts.app')
@section('content')
    <div class="h-100">
        @if($errors->any())
            <div class="text-secondary">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <!--PC用の戻るタグ-->
    <div class="d-none d-md-block">
        <a href="{{ route('goals.index') }}" style="font-size: 1rem;"  class="text-decoration-none mainred-a">目標一覧に戻る</a>
    </div>

    <!--スマートフォン用の戻るタグ-->
    <div class="d-block d-md-none">
        <a href="{{ route('goals.index') }}" style="font-size: 1rem;"  class="text-decoration-none mainred-a"><</a>
    </div>
        
    <p class="text-center mainred" style="margin-bottom: 40px; font-size: 1.5rem;">確認したい目標をクリック</p>

    <div class="container">
        <div class="row">
            @foreach($goals as $goal)
            @if($goal->done == true)
            <div class="col-12 col-md-6" style="margin-bottom: 20px;">
                <div class="bg-light d-flex align-items-center shadow rounded" style="height: 100px;">
                    
                    <img src="{{ asset('/img/auto_awesome.png') }}" alt="目標のマーク"  style="padding: 20px;">
                    <p class="d-inline mainred mb-0" style="font-size: 1.5rem;">{{ $goal->content }}</p>
                    <div style="margin-left: auto; margin-bottom: auto; padding-right: 10px;">
                        <p class="mb-0 d-none d-md-block" style="font-size: 0.8rem">作成日時:<span>{{ $goal->created_at }}</span></p>
                        <p class="mb-0 d-none d-md-block" style="font-size: 0.8rem">完了日時:<span >{{ $goal->updated_at }}</span></p>
                    </div>  
                </div>

                <div class="d-flex justify-content-end" style="font-size: 1rem;">
                    
                    <!--未完了のモーダル-->
                    @include('modals.goal_not_done')

                    <a href="#" class="text-decoration-none mainblue" data-bs-toggle="modal" data-bs-target="#goal_not_doneModal{{ $goal->id }}">
                    未完了にする
                    </a>

                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
@endsection