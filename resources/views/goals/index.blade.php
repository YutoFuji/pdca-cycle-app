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
        <table>
            <tbody>
                @foreach($goals as $goal)
                <tr>
                    <td><img src="{{ asset('/img/auto_awesome.png') }}" alt="目標のマーク"></td>
                    <td>
                        <div>
                            <a href="#">{{ $goal->content }}</a>
                        </div>
                    </td>
                    <td><a href="#">編集</a></td>
                    <td><a href="#">削除</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div>
            <a href="{{ route('goals.create') }}"><img src="{{ asset('/img/作成ボタン.png') }}" alt="作成"></a>
        </div>

        <a href="#">これまでの目標一覧</a>
    </div>
@endsection