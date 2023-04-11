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

    <form action="{{ route('pdcas.store', $goal_id) }}" method="post">
        @csrf

        <div class="form-group">
            <label>PDCA:</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="pdca_elem" value="Plan" data-target="plan">
                <label class="form-check-label" for="plan">Plan</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="pdca_elem" value="Do" data-target="do">
                <label class="form-check-label" for="do">Do</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="pdca_elem" value="Check" data-target="check">
                <label class="form-check-label" for="check">Check</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="pdca_elem" value="Act" data-target="act">
                <label class="form-check-label" for="act">Act</label>
            </div>
        </div>
        
        <div class="form-group pdca_content">    
            @if(!empty($plan))
                <input type="text" class="form-control" id="plan" name="content" placeholder="plan" value="{{ $plan->content }}">
            @else
                <input type="text" class="form-control" id="plan" name="content" placeholder="plan">
            @endif

            @if(!empty($do))
                <input type="text" class="form-control" id="do" name="content" placeholder="do" value="{{ $do->content }}">
            @else
                <input type="text" class="form-control" id="do" name="content" placeholder="do">
            @endif

            @if(!empty($check))
                <input type="text" class="form-control" id="check" name="content" placeholder="check" value="{{ $check->content }}">
            @else
                <input type="text" class="form-control" id="check" name="content" placeholder="check">
            @endif

            @if(!empty($act))
                <input type="text" class="form-control" id="act" name="content" placeholder="act" value="{{ $act->content }}">
            @else
                <input type="text" class="form-control" id="act" name="content" placeholder="act">
            @endif
      
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

    <script>
        function displayTextBox() {
            const radio = document.querySelectorAll("input[type='radio']");
            for (let i = 0; i < radio.length; i++) {
                if(radio[i].checked) {
                const target = radio[i].getAttribute("data-target");
                document.getElementById(target).style.display = 'block';
            }else {
                const target = radio[i].getAttribute("data-target");
                document.getElementById(target).style.display = 'none';
                }
            }
        }

        const radio = document.querySelectorAll("input[type='radio']");
        for(let i = 0; i < radio.length; i++) {
            radio[i].addEventListener("click", displayTextBox);
        }
    </script>
@endsection