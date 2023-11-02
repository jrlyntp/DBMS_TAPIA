@extends('layouts.app') 

 

@section('content') 

 

<div class="row justify-content-center mt-3"> 

    <div class="col-md-12"> 
        @if ($message = Session::get('success')) 
            <div class="alert alert-success" role="alert"> 
                {{ $message }} 
            </div> 
        @endif 

        <div class="card"> 
            <div class="card-header">Product List</div> 
            <div class="card-body"> 
                <a href="{{ route('products.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Product</a> 
                <table class="table table-striped table-bordered" id="table_products"> 
                    <thead> 
                      <tr>  
                        <th scope="col">S#</th> 
                        <th scope="col">Code</th> 
                        <th scope="col">Name</th> 
                        <th scope="col">Quantity</th> 
                        <th scope="col">Price</th> 
                        <th scope="col">Action</th> 
                      </tr> 
                    </thead> 
                    <tbody> 
                        @foreach ($products as $product) 
                        <tr> 
                            <th scope="row">{{ $loop->iteration }}</th> 
                            <td>{{ $product->Code }}</td> 
                            <td>{{ $product->Name }}</td> 
                            <td>{{ $product->Quantity }}</td> 
                            <td>{{ $product->Price }}</td> 
                            <td> 
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a> 
                                <button class="btn btn-primary btn-sm edit" data-id="{{ $product->id}}"><i class="bi bi-pencil-square"></i> Edit</button>    
                                <button class="btn btn-danger btn-sm delete" data-id="{{ $product->id }}"><i class="bi bi-trash"></i> Delete</button> 
                            </td> 
                        </tr> 
                        @endforeach
                    </tbody> 
                  </table> 

            </div> 

        </div> 

    </div>     

</div> 

{{-- Include edit.blade.php (modal) --}}
@include('products.delete')
@include('products.edit')

@endsection
@once
    @push('scripts')
    <script>

        $("#table_products").DataTable();

        $("#table_products").on("click", ".edit", function(e) {
            var id = $(this).data("id");
          
            $.get("{{ route('products.edit') }}", {id:id}, function(data) {
                
                $("#edit-modal").modal("show");

                $("#edit_id").val(data.data.id);
                $("#edit_code").val(data.data.Code);
                $("#edit_name").val(data.data.Name);
                $("#edit_quantity").val(data.data.Quantity);
                $("#edit_price").val(data.data.Price);
                $("#edit_description").val(data.data.Description);

            }).fail(function() {
                alert("error");
            });
        });

        $("#table_products").on("click", ".delete", function(e) {
            var id = $(this).data("id");
            $("#delete-product").modal("show");
            
            $("#delete_id").val(id);

        });

        $("#confirm-delete-item").click(function(e){
            e.preventDefault();
            var id = $("#delete_id").val();
            $.ajax({
                type: "DELETE",
                url: "{{ route('products.destroy') }}",
                data: {
                    id:id,
                    _token: "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function (data,response,status) {
                    if(status.status === 201) {
                        alert("Product deleted successfully");
                        $("#delete-modal").modal("hide");
                        location.reload();
                    }
                   
                }
            });
        });

        $("#update-product").click(function(e){
            e.preventDefault();

            var id = $("#edit_id").val();
            var code = $("#edit_code").val();
            var name = $("#edit_name").val();
            var quantity = $("#edit_quantity").val();
            var price = $("#edit_price").val();
            var description = $("#edit_description").val();

            $.ajax({
                type: "PUT",
                url: "{{ route('products.update') }}",
                data: {
                    id:id,
                    code:code,
                    name:name,
                    quantity:quantity,
                    price:price,
                    description:description,
                    _token: "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function (data,response,status) {
                    if(status.status === 201) {
                        alert("Product updated successfully");
                        $("#edit-modal").modal("hide");
                        location.reload();
                    }
                   
                }
            });
        });
    </script>
    @endpush
@endonce
