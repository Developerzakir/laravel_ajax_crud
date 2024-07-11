
  
  <!-- Modal -->
  <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <form action="" method="POST" id="updateProductForm">
        @csrf 
        <input type="hidden" id="update_id">

        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="errMsg mb-3">

                </div>

               <div class="form-group">
                <label for=""><b>Product Name</b></label>
                <input type="text" name="name" class="form-control" id="up_name" placeholder="product name">
               </div>
               <div class="form-group mt-3">
                <label for=""><b>Product Price</b></label>
                <input type="text" name="price" class="form-control" id="up_price" placeholder="product price">
               </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary update_product">Update Product</button>
              </div>
            </div>
          </div>
    </form>
  </div>