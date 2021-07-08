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
                                    <div class="panel-heading"><h3 class="panel-title">Sale Product</h3></div>
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
                                    <form action="{{route('add.sale')}}" method="post">
                                        @csrf
                                    <div class="panel-body">
                                        <table class="table table-bordered ">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Product Name</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Sale Desc</th>
                                                    <th>Sale Total</th>
                                                    <th><a href="#" class="btn btn-sm btn-success add"><i class="fa fa-plus"></i></a></th>
                                                </tr>
                                            </thead>
                                            <tbody class="addMoreProduct">
                                                <tr>
                                                    <td>1</td>
                                                    <td>
                                                        <select style="width: 140px;" name="product_id[]" id="product_id" class="form-control product_id">
                                                            <option value="">Select Product</option>
                                                            @foreach($products as $product)

                                                            <option data-price="{{$product->product_price}}" value="{{$product->id}}">{{$product->product_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="number" id="quantity" name="sale_quantity[]" class="form-control quantity">
                                                    </td>
                                                    <td>
                                                        <input type="number" id="price" name="sale_price[]" 
                                                        class="form-control sale_price" readonly>
                                                    </td>
                                                    <td>
                                                        <input type="text" id="desc" name="sale_desc[]" class="form-control desc">
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
                                        <div style="text-align: center;">
                                            <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button>
                                        </div>
                                        </form>
                                    </div> <!-- panel-body -->
                                    
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->

                        <div style="text-align: center;">
                            <h3>Total: <b class="total"> 0.00</b></h3>
                        </div>



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
        var product = $('.product_id').html();
        var numberofrow = ($('.addMoreProduct tr').length - 0) + 1;
        var tr ='<tr>'+
                 '<td class"no"">'+numberofrow+'<td>'+
                 '<select style="width: 140px;"  class="form-control product_id" name="product_id[]">'+product+'</select>' +
                 '<td><input type="number" name="sale_quantity[]" class="form-control quantity"></td>' +
                 '<td><input type="number" name="sale_price[]" class="form-control sale_price" readonly></td>' +
                 '<td><input type="text" name="sale_desc[]" class="form-control"></td>' +
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

    $('.addMoreProduct').delegate('.product_id', 'change', function(){
        var tr = $(this).parent().parent();
        var price = tr.find('.product_id option:selected').attr('data-price');
        tr.find('.sale_price').val(price);
        var qty = tr.find('.quantity').val() - 0;
        var price = tr.find('.sale_price').val() - 0;
        var total_amount = (qty*price);
        tr.find('.total_amount').val(total_amount);
        TotalAmount();
    });



    $('.addMoreProduct').delegate('.quantity', 'keyup', function(){
        var tr = $(this).parent().parent();
        var qty = tr.find('.quantity').val() - 0;
        var price = tr.find('.sale_price').val() - 0;
        var total_amount = (qty*price);
        tr.find('.total_amount').val(total_amount);
        TotalAmount();
    });



</script>
@endsection