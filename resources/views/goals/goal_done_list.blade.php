@extends('layouts.app')
@section('content')
<h2 class="text-center navigate mb-3">確認したい目標をクリック</h2>
<a href="{{ route('goals.index') }}">戻る</a>

    <div>
        @foreach($goals as $goal)
        @if($goal->done == true)
        <div>
            <div>
                <img src="{{ asset('/img/auto_awesome.png') }}" alt="目標のマーク">
                <h2 class="d-inline">{{ $goal->content }}</h2>
            </div>
            <div>
                <!--目標削除のモーダル-->
                @include('modals.goal_not_done')

                <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#goal_not_doneModal{{ $goal->id }}">
                未完了にする
                </a>
            </div>
        </div>
        @endif
        @endforeach
    </div>
@endsection