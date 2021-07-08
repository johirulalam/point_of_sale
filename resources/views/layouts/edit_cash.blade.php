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
                                    <div class="panel-heading"><h3 class="panel-title">Cash Add Or Out</h3></div>
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
                                        <form action="{{ route('edit.cash', $cash->id)}}" method="post" class="form-horizontal" role="form">
                                        	@csrf
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Cash</label>
                                                <div class="col-sm-9">
                                                    <select name="cash" class="form-control">
                                                        <option value="">Select Cash </option>
                                                        <option value="cash_in"<?php if($cash->cash_in_out == "cash_in") {echo "selected";} ?> >Cash In </option>
                                                        <option value="cash_out" <?php if($cash->cash_in_out == "cash_out") {echo "selected";} ?> >Cash Out</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Cash Amount</label>
                                                <div class="col-sm-9">
                                                  <input type="number" value="{{$cash->cash_amount}}" name="cash_amount" class="form-control" id="inputEmail3" placeholder="Cash Amount">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-3 control-label">Cash Source</label>
                                                <div class="col-sm-9">
                                                  <input type="text" value="{{$cash->cash_source}}" name="cash_source" class="form-control" id="inputEmail3" placeholder="Where You Expense">
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