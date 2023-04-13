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

    <a href="{{ route('pdcas.index', $goal_id) }}">戻る</a>

    <form action="{{ route('pdcas.store', $goal_id) }}" method="post">
        @csrf

        <div class="form-group">
            <label>PDCA:</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="pdca_elem" value="Plan" id="plan" data-target="plan">
                <label class="form-check-label" for="plan">Plan</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="pdca_elem" value="Do" id="do" data-target="do">
                <label class="form-check-label" for="do">Do</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="pdca_elem" value="Check" id="check" data-target="check">
                <label class="form-check-label" for="check">Check</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="pdca_elem" value="Act" id="act" data-target="act">
                <label class="form-check-label" for="act">Act</label>
            </div>
        </div>
        
        <div id="text"></div>

        <div class="form-group">
            <input type="text" class="form-control" name="content">
        </div>

        <button>送信</button>
    </form>

    <script>
        const radio = document.querySelectorAll("input[type='radio']");
        const text = 'を入力してください';
        const textField = document.getElementById('text');

        function displayTextBox() {
            for (let i = 0; i < radio.length; i++) {
                if(radio[i].checked) {
                const target = radio[i].getAttribute("data-target");
                document.getElementById(target).style.display = 'block';

                const label = document.querySelector(`label[for=${radio[i].id}]`);
                label.style.display = 'inline-block';
                
                textField.innerHTML = text;
            }else {
                const target = radio[i].getAttribute("data-target");
                document.getElementById(target).style.display = 'none';
                
                const label = document.querySelector(`label[for=${radio[i].id}]`);
                label.style.display = 'none';
                   }
                }
            }

        for(let i = 0; i < radio.length; i++) {
            radio[i].addEventListener("click", displayTextBox);
        }

    </script>
@endsection