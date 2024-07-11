<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
  $.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
  });
</script>

<script>
$(document).ready(function(){
  $(document).on('click','.add_product', function(e){
        e.preventDefault();

        let name = $("#name").val();
        let price = $("#price").val();
    
        $.ajax({
            url: "{{route('add.product')}}",
            method:'post',
            data:{name:name, price:price},
            success:function(res){
                if(res.status == 'success'){
                    $("#addModal").modal('hide');
                    $("#storeProduct")[0].reset();
                    $('.table').load(location.href+ ' .table');
                }

            },error:function(err){
                let error = err.responseJSON;
                $.each(error.errors, function(index,value){
                    $('.errMsg').append('<span class="text-danger">'+value+'</span>' + '<br>');
                })
            }

        })
  })

  //show inpu data on update modal
  $(document).on("click",'.update_product_data',function(){
    let id = $(this).data('id');
    let name = $(this).data('name');
    let price = $(this).data('price');

    $("#update_id").val(id);
    $("#up_name").val(name);
    $("#up_price").val(price);
  });


  //update product

  $(document).on('click','.update_product', function(e){
        e.preventDefault();

        let update_id = $("#update_id").val();
        let up_name = $("#up_name").val();
        let up_price = $("#up_price").val();
    
        $.ajax({
            url: "{{route('update.product')}}",
            method:'post',
            data:{update_id:update_id, up_name:up_name, up_price:up_price},
            success:function(res){
                if(res.status == 'success'){
                    $("#updateModal").modal('hide');
                    $("#updateProductForm")[0].reset();
                    $('.table').load(location.href+ ' .table');
                }

            },error:function(err){
                let error = err.responseJSON;
                $.each(error.errors, function(index,value){
                    $('.errMsg').append('<span class="text-danger">'+value+'</span>' + '<br>');
                })
            }

        })
  })


});
</script>