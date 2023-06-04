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

    <form method="GET">
        <input type="search" placeholder="目標を検索" name="keyword" value="@isset($keyword){{ $keyword }}@endisset" style="margin: none;">
        <input type="submit" value="検索" class="btn btn-secondary">
        <button class="btn btn-secondary">
            <a href="{{ route('goals.index') }}" style="text-decoration: none; color: #ffffff">クリア</a>
        </button>
    </form>
    
    <h2 class="text-center mainred" style="margin-bottom: 40px; margin-top: 26px">確認したい目標をクリック</h2>
    
    <div class="container">
        <div class="row">
            @foreach($goals as $goal)
            @if($goal->done == false)
            <div class="col-12 col-md-6" style="margin-bottom: 20px;">
                <div class="bg-light d-flex align-items-center shadow rounded" style="height: 80px;">

                    <img src="{{ asset('/img/auto_awesome.png') }}" alt="目標のマーク" style="padding: 16px;">
                    <a href="{{ route('pdcas.index', $goal->id) }}" class="text-decoration-none mainred-a" style="font-size: 1.5rem;">{{ $goal->content }}</a>
                    
                </div>

                <div class="d-flex justify-content-end" style="font-size: 1rem;">
                    
                    <!--目標完了のモーダル-->
                    @include('modals.goal_done')
                    
                    <a href="#" class="text-decoration-none mainred-a" data-bs-toggle="modal" data-bs-target="#goal_doneModal{{ $goal->id }}" style="padding-left: 10px;">完了</a>

                    <a href="{{ route('goals.edit', $goal) }}" class="text-decoration-none mainblue" style="padding-left: 10px">編集</a>

                    <!--目標削除のモーダル-->
                    @include('modals.goal_delete')

                    <a href="#" class="text-decoration-none mainblue" data-bs-toggle="modal" data-bs-target="#goal_deleteModal{{ $goal->id }}" style="padding-left: 10px;">
                    削除
                    </a>
                    
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>

    <div style="margin-top:20px;" class="d-flex justify-content-center">
        <button type="button" onclick="location.href='{{ route('goals.create') }}'" class="btn btn-secondary w-75" >新しい目標を作成</button>
    </div>
    
    <div style="margin-top: 20px; margin-right: 20px; text-align: right;">
        <a href="{{ route('to_done_list') }}" class="text-decoration-none mainred-a" style="font-size: 1rem;">これまでの目標一覧</a>
    </div>
@endsection