@extends('layouts.app')
@section('content')
    <a href="{{ route('goals.index') }}">戻る</a>
    <h2 class="text-center navigate mb-3">確認したい目標をクリック</h2>

    <div class="d-flex" style="flex-wrap: wrap;">
        @foreach($goals as $goal)
        @if($goal->done == false)
        <div class="w-50">
            <div>
                <img src="{{ asset('/img/auto_awesome.png') }}" alt="目標のマーク">
                <a href="#">{{ $goal['content'] }}</a>
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