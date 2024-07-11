<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >


    <title>Laravel Ajax Crud</title>
  </head>
  <body>

    <div class="container mt-5">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <h2 class="my-5 text-center">Laravel Ajax Crud</h2>
          <div class="d-flex">
            <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">Add Product</a>
           
           <a href="javascript:void(0)" id="exportData" class="btn btn-primary ms-auto">Export Data</a>
          </div>
          <div class="table-data mt-3">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Price</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $key => $item)
                <tr>
                  <th scope="row">{{$key+1}}</th>
                  <td>{{$item->name}}</td>
                  <td>{{$item->price}}</td>
                  <td>
                    <a href=""
                     class="btn btn-success btn-sm update_product_data"
                      data-bs-toggle="modal"
                      data-bs-target="#updateModal"
                      data-id="{{$item->id}}"
                      data-name="{{$item->name}}"
                      data-price="{{$item->price}}"
                       ><i class="las la-edit"></i></a>


                    <a href=""
                     class="btn btn-danger btn-sm delete_product"
                     data-id="{{$item->id}}"

                     ><i class="las la-times"></i></a>
                  </td>
                </tr>
                @endforeach
               
              </tbody>
            </table>
            {!! $products->links() !!}
          </div>
        </div>
      </div>
    </div>
  
  @include('create')
  @include('edit')
  @include('scripts')

  </body>
</html>