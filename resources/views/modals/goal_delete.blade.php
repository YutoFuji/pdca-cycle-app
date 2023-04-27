<div class="modal fade" id="goal_deleteModal{{ $goal->id }}" tabindex="-1" aria-labelledby="goal_deleteModalLabel{{ $goal->id }}" data-bs-backdrop="static">
     <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 class="modal-title" id="goal_deleteLabel{{ $goal->id }}">「{{ $goal->content }}」を削除してもよろしいですか？</h5> 
            </div>
            <div class="modal-footer justify-content-around">
                <button type="button" data-bs-dismiss="modal" class="btn btn-primary">削除しない</button>
                <form action="{{ route('goals.destroy', $goal) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger">削除する</button>
                </form>
            </div>
         </div>
     </div>
 </div>