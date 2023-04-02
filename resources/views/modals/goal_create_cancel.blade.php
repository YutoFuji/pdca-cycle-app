<div class="modal fade" id="goal_create_cancel" tabindex="-1" aria-labelledby="goal_create_cancelLabel" data-bs-backdrop="static">
     <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h5 id="goal_create_cancelLabel" class="text-center navigate">保存せずに移動してもよろしいですか？<br>（入力した内容は破棄されます）</h5>
            </div>
            <div class="modal-footer justify-content-around">
                <a href="{{ route('goals.index') }}" class="modal_true">一覧に戻る</a>
                <a href="#" data-bs-dismiss="modal" class="modal_false">続ける</a>
            </div>
         </div>
     </div>
 </div>