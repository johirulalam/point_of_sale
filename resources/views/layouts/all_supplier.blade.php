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
                                                            <th>Supplier Name</th>
                                                            <th>Supplier Address</th>
                                                            <th>Contact 1</th>
                                                            <th>Contact 2</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
<?php $id=0; ?>
                                                    @foreach($suppliers as $supplier)	
<?php $id++; ?>
                                                        <tr>
                                                            <td>{{$id}}</td>
                                                            <td>{{$supplier->supplier_name}}</td>
                                                            <td>{{$supplier->supplier_address}}</td>
                                                            <td>{{$supplier->supplier_contact_one}}</td>
                                                            <td>{{$supplier->supplier_contact_two}}</td>
                                                            <td>
                                                                <a href="{{ route('view.supplier', $supplier->supplier_name)}}" class="btn btn-sm btn-primary">View</a>
                                                                <a href="{{ route('edit.supplier', $supplier->id)}}" class="btn btn-sm btn-info">Edit</a>
                                                                <a href="{{ route('delete.supplier', $supplier->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger" id="delete">Delete</a>
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