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
      @foreach ($products as  $item)
      <tr>
        <th scope="row">{{$item->id}}</th>
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