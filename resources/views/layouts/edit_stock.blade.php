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
                                    <div class="panel-heading"><h3 class="panel-title">Edit Stock</h3></div>
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
                                        <form action="{{ route('edit.stock', $stock->id)}}" method="post" class="form-horizontal" role="form">
                                        	@csrf
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Supplier Name</label>
                                                <div class="col-sm-9">
                                                    <select name="supplier_id" class="form-control">
                                                        <option value="">Select Supplier</option>
                                                        @foreach($suppliers as $supplier)
                                                        <option value="{{$supplier->id}}" <?php if($stock->supplier_id == $supplier->id) {echo "selected";} ?> >{{$supplier->supplier_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Product Name</label>
                                                <div class="col-sm-9">
                                                    <select name="product_id" class="form-control">
                                                        <option value="">Select Product</option>
                                                        @foreach($products as $product)
                                                        <option  <?php if($stock->product_id == $product->id) {echo "selected";} ?> value="{{$product->id}}">{{$product->product_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Product Description</label>
                                                <div class="col-sm-9">
                                                  <input type="text" value="{{$stock->stock_product_desc}}" name="stock_product_desc" class="form-control" id="inputEmail3" placeholder="Stock Product Description">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Stock Quantity</label>
                                                <div class="col-sm-9">
                                                  <input type="number" value="{{$stock->stock_quantity}}" name="stock_product_quantity" class="form-control" id="inputEmail3" placeholder="Stock Quantity">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Stock Buy Price</label>
                                                <div class="col-sm-9">
                                                  <input type="number" value="{{$stock->stock_buy_price}}" name="stock_buy_price" class="form-control" id="inputEmail3" placeholder="Stock Buying Price">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Stock Sell Price</label>
                                                <div class="col-sm-9">
                                                  <input type="number" value="{{$stock->stock_sell_price}}" name="stock_sell_price" class="form-control" id="inputEmail3" placeholder="Stock Selling Price">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Stock Payment</label>
                                                <div class="col-sm-9">
                                                  <input type="number" value="{{$stock->stock_payment}}" name="stock_payment" class="form-control" id="inputEmail3" placeholder="Stock Payment">
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