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

    <div class="d-flex" style="flex-wrap: wrap;">
        @foreach($goals as $goal)
        <div class="w-50">
            <div>
                <img src="{{ asset('/img/auto_awesome.png') }}" alt="目標のマーク">
                <a href="#">{{ $goal->content }}</a>
            </div>
            <div>
                <a href="{{ route('goals.edit', $goal) }}">編集</a>
                <a href="#">削除</a>
            </div>
        </div>
        @endforeach
    </div>

    <div>
        <a href="{{ route('goals.create') }}"><img src="{{ asset('/img/作成ボタン.png') }}" alt="作成"></a>
    </div>

    <a href="#">これまでの目標一覧</a>
@endsection