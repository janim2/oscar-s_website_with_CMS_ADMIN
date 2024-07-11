 <!-- Delete Modal 1-->
 <div class="modal fade" id="delete_modal" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modalToggleLabel">Delete</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">Are you sure you want to delete?</div>
             <div class="modal-footer">
                 <button class="btn btn-danger loading" onclick="_delete()">
                     Delete
                 </button>
             </div>
         </div>
     </div>
 </div>