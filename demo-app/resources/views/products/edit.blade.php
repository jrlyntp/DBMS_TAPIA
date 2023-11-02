<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="edit-modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <input type="hidden" name="edit_id" id="edit_id">
        <div class="mb-3">
          <label for="" class="form-label">Code</label>
          <input type="text"
            class="form-control" name="edit_code" id="edit_code" aria-describedby="helpId" placeholder="">
          <small id="helpId" class="form-text text-muted">Help text</small>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input type="text"
              class="form-control" name="edit_name" id="edit_name" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">Help text</small>
          </div>
        
          <div class="mb-3">
            <label for="" class="form-label">Quantity</label>
            <input type="number"
              class="form-control" name="edit_quantity" id="edit_quantity" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">Help text</small>
          </div>
        
          <div class="mb-3">
            <label for="" class="form-label">Price</label>
            <input type="number"
              class="form-control" name="edit_price" id="edit_price" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">Help text</small>
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Description</label>
            <textarea class="form-control" name="edit_description" id="edit_description" rows="3"></textarea>
          </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="update-product">Update</button> 
            </div>
        </div>
    </div>
</div>
