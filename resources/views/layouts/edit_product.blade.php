@extends('master')

@section('body-content')


<!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">General elements</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Moltran</a></li>
                                    <li><a href="#">Forms</a></li>
                                    <li class="active">General elements</li>
                                </ol>
                            </div>
                        </div>


                        <div class="row">
                            
                            <!-- Horizontal form -->
                            <div class="col-md-10">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Add Product</h3></div>
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif

                                    @if(session()->has('msg'))
                                        <div class="alert alert-success">
                                            {{ session()->get('msg') }}
                                        </div>
                                        @endif
                                    <div class="panel-body">
                                        <form action="{{ route('edit.product', $product->id)}}" method="post" class="form-horizontal" role="form">
                                        	@csrf
                                          
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Product Name</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="product_name" value="{{$product->product_name}}" class="form-control" id="inputEmail3" placeholder="Product Name">
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Product Code</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="product_code" value="{{$product->product_code}}" class="form-control" id="inputEmail3" placeholder="Product Code">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Product Price</label>
                                                <div class="col-sm-9">
                                                  <input type="number" name="product_price" value="{{$product->product_price}}" class="form-control" id="inputEmail3" placeholder="Update Product Price">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Product Description</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="product_desc" value="{{$product->product_desc}}" class="form-control" id="inputEmail3" placeholder="Product Description">
                                                </div>
                                            </div>
                                            
                                           
                                            <div class="form-group m-b-0">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                  <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->




                        

                    </div> <!-- container -->
                               
                </div> <!-- content -->

                

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


@endsection