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
                                    <div class="panel-heading"><h3 class="panel-title">Edit sale</h3></div>
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
                                        <form action="{{ route('edit.sale', $sale->id)}}" method="post" class="form-horizontal" role="form">
                                        	@csrf
                                           
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Product Name</label>
                                                <div class="col-sm-9">
                                                    <select name="product_id" class="form-control">
                                                        <option value="">Select Product</option>
                                                        @foreach($products as $product)
                                                        <option <?php if($sale->product_id == $product->id) {echo "selected";} ?> value="{{$product->id}}">{{$product->product_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Sell Price</label>
                                                <div class="col-sm-9">
                                                  <input type="number" value="{{$sale->sale_price}}" name="sale_price" class="form-control" id="inputEmail3" placeholder="Selling Price">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Quantity</label>
                                                <div class="col-sm-9">
                                                  <input type="number" value="{{$sale->sale_quantity}}" name="sale_quantity" class="form-control" id="inputEmail3" placeholder="Sale Product Quantity">
                                                </div>
                                            </div>                               
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Payment</label>
                                                <div class="col-sm-9">
                                                  <input type="number" value="{{$sale->sale_payment}}" name="sale_payment" class="form-control" id="inputEmail3" placeholder="Sale Payment">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Sale Description</label>
                                                <div class="col-sm-9">
                                                  <input type="text" value="{{$sale->sale_desc}}" name="sale_desc" class="form-control" id="inputEmail3" placeholder="Sale Product Description">
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