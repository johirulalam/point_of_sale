




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
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Add Stock Product</h3></div>
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
                                    <form action="{{ route('add.stock')}}" method="post">
                                        @csrf
                                    <div class="panel-body">
                                        <table class="table table-bordered ">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Supplier Name</th>
                                                    <th>Product Name</th>
                                                    <th>Product Description</th>
                                                    <th>Stock Quantity</th>
                                                    <th>Stock Buy Price</th>
                                                    <th>Stock Sell Price</th>
                                                    <th>Sub Total</th>
                                                    <th><a href="#" class="btn btn-sm btn-success add"><i class="fa fa-plus"></i></a></th>
                                                </tr>
                                            </thead>
                                            <tbody class="addMoreProduct">
                                                <tr>
                                                    <td>1</td>
                                                    <td>
                                                        <select style="width: 140px;" name="supplier_id[]" id="supplier_id" class="form-control supplier_id">
                                                            <option value="">Select Supplier</option>
                                                            @foreach($suppliers as $supplier)
                                                            <option value="{{$supplier->id}}">{{$supplier->supplier_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select style="width: 140px;" name="product_id[]" id="product_id" class="form-control product_id">
                                                            <option value="">Select Product</option>
                                                            @foreach($products as $product)
                                                            <option data-price="{{$product->product_price}}" value="{{$product->id}}">{{$product->product_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="stock_product_desc[]" class="form-control stock_desc" id="stock_desc">
                                                    </td>
                                                    <td>
                                                        <input type="number" name="stock_product_quantity[]" class="form-control stock_quantity" id="stock_quantity">
                                                    </td>
                                                    <td>
                                                        <input type="number" name="stock_buy_price[]" class="form-control buy_price" id="buy_price">
                                                    </td>
                                                    <td>
                                                        <input type="number" name="stock_sell_price[]" class="form-control sell_price" id="sell_price">
                                                    </td>         
                                                    <td>
                                                        <input type="text" id="total_amount" name="sale_total[]" class="form-control total_amount" readonly>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="btn btn-sm btn-danger remove"><i class="fas fa-times"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div style="text-align: right; margin-right: 50px;">
                                            <h3>Total: <b class="total"> 0.00</b></h3>
                                        </div>
                                        <div style="text-align: center;">
                                            <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button>
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

@section('script')
<script type="text/javascript">
    $('.add').on('click', function(){
        var supplier = $('.supplier_id').html();
        var product = $('.product_id').html();
        var numberofrow = ($('.addMoreProduct tr').length - 0) + 1;
        var tr ='<tr>'+
                 '<td class"no"">'+numberofrow+'<td>'+
                 '<select style="width: 140px;"  class="form-control supplier_id" name="supplier_id[]">'+supplier+'</select>' +
                 '<td><select style="width: 140px;"  class="form-control product_id" name="product_id[]">'+product+'</select></td>' +
                 '<td><input type="text" name="stock_product_desc[]" class="form-control stock_desc" id="stock_desc"></td>' +
                 '<td><input type="number" name="stock_product_quantity[]" class="form-control stock_quantity" id="stock_quantity"></td>' +
                 '<td><input type="number" name="stock_buy_price[]" class="form-control buy_price" id="buy_price"></td>' +
                 '<td><input type="number" name="stock_sell_price[]" class="form-control sell_price" id="sell_price"></td>' +
                 '<td><input type="number" name="sale_total[]" class="form-control total_amount" readonly></td>' +
                 '<td><a href="#" class="btn btn-sm btn-danger remove rounded-circle"><i class="fas fa-times-circle"></i></a></td>'+
                 '</tr>';

                 $('.addMoreProduct').append(tr);

    });

    $('.addMoreProduct').delegate('.remove', 'click', function(){
        $(this).parent().parent().remove();
    })
    function TotalAmount(){
        var total = 0;
        $('.total_amount').each(function(i, e){
            var amount = $(this).val() -0;
            total += amount;
        });

        $('.total').html(total);

    }

    $('.addMoreProduct').delegate('.buy_price', 'keyup', function(){
        var tr = $(this).parent().parent();
        tr.find('.sale_price').val(price);
        var qty = tr.find('.stock_quantity').val() - 0;
        var price = tr.find('.buy_price').val() - 0;
        var total_amount = (qty*price);
        tr.find('.total_amount').val(total_amount);
        TotalAmount();
    });



    $('.addMoreProduct').delegate('.stock_quantity', 'keyup', function(){
        var tr = $(this).parent().parent();
        var qty = tr.find('.stock_quantity').val() - 0;
        var price = tr.find('.buy_price').val() - 0;
        var total_amount = (qty*price);
        tr.find('.total_amount').val(total_amount);
        TotalAmount();
    });



</script>
@endsection