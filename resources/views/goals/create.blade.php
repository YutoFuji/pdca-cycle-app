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
    @include('modals.goal_create_cancel')
    <!--PC用の戻るタグ-->
    <div class="d-none d-md-block">
        <a href="#" style="font-size: 20px;" class="text-decoration-none mainred-a" data-bs-toggle="modal" data-bs-target="#goal_create_cancel">
            目標一覧に戻る
        </a>          
    </div>
    <!--スマートフォン用の戻るタグ-->
    <div class="d-block d-md-none">
        <a href="#" style="font-size: 20px;" class="text-decoration-none mainred-a" data-bs-toggle="modal" data-bs-target="#goal_create_cancel">
            <
        </a>          
    </div>

    <h2 class="text-center mainred" style="margin-bottom: 40px">目標の作成</h2>

    <div class="container">
        <div class="row">
            <div class="bg-light shadow col-lg-8 col-md-10 mx-auto" style="padding: 30px;"> 
                <h3 class="mainred text-center" style="margin-bottom: 30px;">目標を入力してください</h3>
                <div class="text-center">
                    <form action="{{ route('goals.store') }}" method="post" class="d-inline">
                        @csrf
                        <input type="text" name="content" class="form-control" style="margin-bottom: 30px">
                        <div>
                            <button type="submit" class="btn btn-secondary" style="width: 120px">作成</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>  
@endsection