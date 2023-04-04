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
    <h2 class="text-center navigate mb-3">確認したい目標をクリック</h2>

    <div>
        @foreach($goals as $goal)
        @if($goal->done == false)
        <div>
            <div>
                <div>
                    <img src="{{ asset('/img/auto_awesome.png') }}" alt="目標のマーク">
                    <a href="{{ route('pdcas.index', $goal->id) }}"><h2 class="d-inline">{{ $goal->content }}</h2></a>
                </div>
                <div>
                    <a href="{{ route('goals.edit', $goal) }}" class="text-decoration-none">編集</a>

                    <!--目標完了のモーダル-->
                    @include('modals.goal_done')

                    <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#goal_doneModal{{ $goal->id }}">完了</a>

                    <!--目標削除のモーダル-->
                    @include('modals.goal_delete')

                    <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#goal_deleteModal{{ $goal->id }}">
                    削除
                    </a>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>

    <div>
        <a href="{{ route('goals.create') }}"><img src="{{ asset('/img/作成ボタン.png') }}" alt="作成"></a>
    </div>

    <a href="{{ route('to_done_list') }}">これまでの目標一覧</a>
@endsection