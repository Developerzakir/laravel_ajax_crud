
  
  <!-- Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="" method="POST" id="storeProduct">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="errMsg mb-3">

                </div>

               <div class="form-group">
                <label for=""><b>Product Name</b></label>
                <input type="text" name="name" class="form-control" id="name" placeholder="product name">
               </div>
               <div class="form-group mt-3">
                <label for=""><b>Product Price</b></label>
                <input type="text" name="price" class="form-control" id="price" placeholder="product price">
               </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add_product">Save Product</button>
              </div>
            </div>
          </div>
    </form>
  </div>