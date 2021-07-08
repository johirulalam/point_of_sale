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
                                <h4 class="pull-left page-title">Datatable</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Moltran</a></li>
                                    <li><a href="#">Tables</a></li>
                                    <li class="active">Datatable</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">All Cash</h3>
                                        @if(session()->has('msg'))
									    <div class="alert alert-danger">
									        {{ session()->get('msg') }}
									    </div>
										@endif

                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Supplier</th>
                                                            <th>Product</th>
                                                            <th>Quantity</th>
                                                            <th>Buy Price</th>
                                                            <th>Sell Price</th>
                                                            <th>Payment</th>
                                                            <th>Due</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
<?php $id=0; ?>
                                                    @foreach($stocks as $stock)	
<?php $id++; 
$due =0;
$total_buy = $stock->stock_buy_price*$stock->stock_quantity;
$due = $total_buy - $stock->stock_payment;

?>
                                                        <tr>
                                                            <td>{{$id}}</td>
                                                            <td>{{$stock->supplier_name}}</td>
                                                            <td>{{$stock->product_name}}</td>
                                                            <td>{{$stock->stock_quantity}}</td>
                                                            <td>{{$stock->stock_buy_price}}</td>
                                                            <td>{{$stock->stock_sell_price}}</td>
                                                            <td>{{$stock->stock_payment}}</td>
                                                            <td>{{$due}}</td>
                                                            <td>
                                                                <a href="{{ route('edit.stock', $stock->id)}}" class="btn btn-sm btn-info">Edit</a>
                                                                <a href="{{ route('delete.stock', $stock->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger" id="delete">Delete</a>
                                                            </td>
                                                        </tr>
                                                     @endforeach
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div> <!-- End Row -->


                    </div> <!-- container -->
                               
                </div> <!-- content -->

               

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

@endsection