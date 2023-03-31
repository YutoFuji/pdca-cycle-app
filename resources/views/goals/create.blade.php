@extends('layouts.app')
@section('content')
    <div>
        <a href="{{ route('goals.index') }}">戻る</a>
    </div>
    <h2 class="text-center navigate mb-3">目標の作成</h2>
    <div>
        <p>目標を入力してください</p>
        <div>
            <img src="{{ asset('/img/auto_awesome.png') }}" alt="目標のマーク">
            <form action="#" method="post">
                @csrf
                <div>
                    <input type="text" name="goal">
                </div>
                <a href="#"></a>
            </form>
        </div>
    </div>
@endsection