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
    <!--PC用の戻るタグ-->
    <div class="d-none d-md-block">
        <a href="#" style="font-size: 20px;" class="text-decoration-none mainred-a" data-bs-toggle="modal" data-bs-target="#goal_update_cancel">
            目標一覧に戻る
        </a>          
    </div>
    <!--スマートフォン用の戻るタグ-->
    <div class="d-block d-md-none">
        <a href="#" style="font-size: 20px;" class="text-decoration-none mainred-a" data-bs-toggle="modal" data-bs-target="#goal_update_cancel">
            <
        </a>          
    </div>

    <h2 class="text-center mainred" style="margin-bottom: 40px">目標の編集</h2>

    <div class="container">
        <div class="row">
            <div class="bg-light shadow col-lg-8 col-md-10 mx-auto" style="padding: 30px;"> 
                <h3 class="mainred mb-0 text-center">目標を入力してください</h3>
                <div style="margin-top: 20px;" class="text-center">
                    <form action="{{ route('goals.update', $goal) }}" method="post" class="d-inline">
                        @method('patch')
                        @csrf
                        <input type="text" name="content" class="form-control" value="{{ $goal->content }}">
                        <div>
                            <button type="submit" class="btn btn-secondary btn-lg" style="margin-top: 20px;">作成</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>        

@endsection