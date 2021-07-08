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
                                        <form action="{{ route('add.supplier')}}" method="post" class="form-horizontal" role="form">
                                        	@csrf
                                          
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Supplier Name</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="supplier_name" class="form-control" id="inputEmail3" placeholder="Supplier Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Supplier Address</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="supplier_address" class="form-control" id="inputEmail3" placeholder="Supplier Address">
                                                </div>
                                            </div>
                                            
                                             <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Supplier Contact 1</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="supplier_contact_one" class="form-control" id="inputEmail3" placeholder="Supplier Contact Number One">
                                                </div>
                                            </div>
                                           
                                           <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Supplier Contact 2</label>
                                                <div class="col-sm-9">
                                                  <input type="text" name="supplier_contact_two" class="form-control" id="inputEmail3" placeholder="Supplier Contact Number Two">
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