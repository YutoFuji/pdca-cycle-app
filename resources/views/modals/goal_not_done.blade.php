<div class="modal fade" id="goal_not_doneModal{{ $goal->id }}" tabindex="-1" aria-labelledby="goal_not_doneModalLabel{{ $goal->id }}" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header justify-content-center">
            <h5 class="modal-title" id="goal_not_doneLabel{{ $goal->id }}">「{{ $goal->content }}」を未完了にしてもよろしいですか？</h5> 
        </div>
        <div class="modal-footer justify-content-around">
            <button type="button" data-bs-dismiss="modal" class="btn btn-primary">未完了にしない</button>
            <form action="{{ route('goals.update_boolean', $goal) }}" method="post">
                @method('put')
                @csrf
                <button type="submit" class="btn btn-danger">未完了にする</button>
            </form>
        </div>
        </div>
    </div>
</div>