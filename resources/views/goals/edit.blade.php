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
    
    <!--目標編集キャンセルのモーダル-->
    @include('modals.goal_update_cancel')

    <div class="d-flex mb-3">
        <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#goal_update_cancel">
            戻る
        </a>          
    </div>

    <h2 class="text-center navigate mb-3">目標の編集</h2>
    <div>
        <p>目標を入力してください</p>
        <div>
            <img src="{{ asset('/img/auto_awesome.png') }}" alt="目標のマーク">
            <form action="{{ route('goals.update', $goal) }}" method="post" class="d-inline">
                @method('patch')
                @csrf
                <input type="text" name="content">
                <button type="submit">作成(仮)</button>
            </form>
        </div>
    </div>        

@endsection