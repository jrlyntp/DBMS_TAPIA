@extends('layouts.app') 

 

@section('content') 

 

<div class="row justify-content-center mt-3"> 

    <div class="col-md-8"> 

 

        <div class="card"> 

            <div class="card-header"> 

                <div class="float-start"> 

                    Product Information 

                </div> 

                <div class="float-end"> 

                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">&larr; Back</a> 

                </div> 

            </div> 

            <div class="card-body"> 

 

                    <div class="row"> 

                        <label for="code" class="col-md-4 col-form-label text-md-end text-start"><strong>Code:</strong></label> 

                        <div class="col-md-6" style="line-height: 35px;"> 

                            {{ $product->Code }} 

                        </div> 

                    </div> 

 

                    <div class="row"> 

                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Name:</strong></label> 

                        <div class="col-md-6" style="line-height: 35px;"> 

                            {{ $product->Name }} 

                        </div> 

                    </div> 

 

                    <div class="row"> 

                        <label for="quantity" class="col-md-4 col-form-label text-md-end text-start"><strong>Quantity:</strong></label> 

                        <div class="col-md-6" style="line-height: 35px;"> 

                            {{ $product->Quantity }} 

                        </div> 

                    </div> 

 

                    <div class="row"> 

                        <label for="price" class="col-md-4 col-form-label text-md-end text-start"><strong>Price:</strong></label> 

                        <div class="col-md-6" style="line-height: 35px;"> 

                            {{ $product->Price }} 

                        </div> 

                    </div> 

 

                    <div class="row"> 

                        <label for="description" class="col-md-4 col-form-label text-md-end text-start"><strong>Description:</strong></label> 

                        <div class="col-md-6" style="line-height: 35px;"> 

                            {{ $product->Description }} 

                        </div> 

                    </div> 

         

            </div> 

        </div> 

    </div>     

</div> 

     

@endsection
