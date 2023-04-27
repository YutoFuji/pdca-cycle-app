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

    <!--PC用の戻るタグ-->
    <div class="d-none d-md-block">
        <a href="{{ route('pdcas.index', $goal_id) }}" style="font-size: 1rem;"  class="text-decoration-none mainred-a">サイクル一覧に戻る</a>
    </div>

    <!--スマートフォン用の戻るタグ-->
    <div class="d-block d-md-none">
        <a href="{{ route('pdcas.index', $goal_id) }}" style="font-size: 1rem;"  class="text-decoration-none mainred-a"><</a>
    </div>
    
    <h2 class="text-center mainred" style="margin-bottom: 20px">のサイクル</h2>

    <div class="container">
        <div class="bg-light shadow rounded col-lg-8 col-md-10 mx-auto" style="margin-bottom: 30px; height: 300px; padding: 30px;">
            <form action="{{ route('pdcas.store', $goal_id) }}" method="post">
                @csrf
                <div class="text-center">
                    <p class="mainred" style="font-size: 20px">作成する要素を１つ選択してください</p>
                </div>

                <div class="form-group d-flex justify-content-center">
                    <div class="form-check form-check-inline" style="margin-left: 20px">
                        <input class="form-check-input" type="radio" name="pdca_elem" value="Plan" id="plan">
                        <label class="form-check-label" for="plan"><p>Plan</p></label>
                    </div>
                    <div class="form-check form-check-inline" style="margin-left: 30px">
                        <input class="form-check-input" type="radio" name="pdca_elem" value="Do" id="do">
                        <label class="form-check-label" for="do"><p>Do</p></label>
                    </div>
                    <div class="form-check form-check-inline" style="margin-left: 30px">
                        <input class="form-check-input" type="radio" name="pdca_elem" value="Check" id="check">
                        <label class="form-check-label" for="check"><p>Check</p></label>
                    </div>
                    <div class="form-check form-check-inline" style="margin-left: 30px">
                        <input class="form-check-input" type="radio" name="pdca_elem" value="Act" id="act">
                        <label class="form-check-label" for="act"><p>Act</p></label>
                    </div>
                    <button type="button" style="display: none;" id="resetButton" class="btn btn-secondary">選択を解除</button>
                </div>

                <div class="text-center">
                    <div>
                        <p class="mainred" style="font-size: 20px;">内容を入力してください</p>
                    </div>

                    <div class="form-group" style="margin-bottom: 15px;">
                        <input type="text" name="content" class="form-control" id="pdca_content">

                        <input type="hidden" id="goal_id" value={{$goal_id}}>

                        <input type="hidden" name="plan" value={{$plan}} id="pdca_plan">
                        <input type="hidden" name="do" value={{$do}} id="pdca_do">
                        <input type="hidden" name="check" value={{$check}} id="pdca_check">
                        <input type="hidden" name="act" value={{$act}} id="pdca_act">
                    </div>
                    
                    <div>
                        <button type="submit" class="btn btn-secondary btn-lg">作成</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



    <script>
        const radio = document.querySelectorAll("input[type='radio']");
        const goal_id_element = document.getElementById('goal_id');
        const goal_id = goal_id_element.value;
        const inputField = document.getElementById('pdca_content');
        const resetButton = document.getElementById('resetButton');
        
        //いずれかのラジオボタンがクリックされたときそれ以外のラジオボタンがnoneになる
        function hideRadioButtons() {
            for (let i = 0; i < radio.length; i++) {
                const target = radio[i].closest('.form-check');
                if(radio[i].checked) {
                    target.style.display = 'inline-block';
                    resetButton.style.display ='inline-block';
                    get_data(i);
                }else {
                    target.style.display = 'none';
                }
            }
        }
        
        for(let i = 0; i < radio.length; i++) {
            radio[i].addEventListener("click", hideRadioButtons);
        }

        //テキストボックスに現在の要素をデータを非同期で取得し、挿入
        function get_data(i) {
            const pdca_elem = [
                'Plan', 'Do', 'Check', 'Act'
            ];
                
            fetch(`/pdca-cycle-app/public/api/goals/${goal_id}/pdcas?pdca_elem=${pdca_elem[i]}`)
            .then(response => response.json())
            .then(data => {
                if(data.hasOwnProperty('content')) {
                    inputField.value = data.content
                }else {
                    inputField.value = '';
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
        
        //resetButtonがクリックされたときラジオボタンがinline-blockになり、それ自身はnoneになる
        resetButton.addEventListener("click", function() {
        const formChecks = document.querySelectorAll('.form-check');
            for (let i = 0; i < formChecks.length; i++) {
                formChecks[i].style.display = 'inline-block';
                resetButton.style.display = 'none';
            }
        });
    </script>
    
@endsection