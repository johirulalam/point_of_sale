@extends('master')

@section('body-content')
 

 <div class="content-page">
    <!-- Start content -->
    <div class="content">
      <div class="container">
                        <!-- Page-Title -->
        <div class="row">
          <div class="col-sm-12 bg-info">
            <h4 class="pull-left page-title text-white">POS (Point Of Sale ) </h4>
            <ol class="breadcrumb pull-right">
               <li><a class="text-white" href="#">Moltran</a></li>
               <li class="text-white">{{date('d/m/y')}}</li>
            </ol>
          </div>
        </div>

        <div class="row">
        	<div class="col-lg-6">
        		<div class="price_card text-center">
        			@if(session()->has('msg'))
                    <div class="alert alert-success">
                        {{ session()->get('msg') }}
                    </div>
                    @endif
        			<ul class="price-features" style="border 1px solid grey;">
        				<table class="table">
        					<thead>
        						@php
        						$cartProducts = Cart::content()
        						@endphp
        						<tr>
        							<th>Name</th>
        							<th>Qty</th>
        							<th>Price</th>
        							<th>Sub Total</th>
        							<th>Action</th>
        						</tr>
        					</thead>

        					<tbody>
        						@foreach($cartProducts as $cartProduct)
        						<tr>
        							<th>{{ $cartProduct->name}}</th>
        							<th>
        								<form action="{{ route('update.cart', $cartProduct->rowId)}}" method="post">
        									@csrf
        								<input type="number" name="qty" style="width: 50px;" value="{{ $cartProduct->qty}}">
        								<button type="submit" style="margin-top: -2px;" class="btn btn-sm btn-success"><i class="fas fa-check"></i></button>
        								</form> 
        							</th>
        							<th>{{ $cartProduct->price}}</th>
        							<th>{{ $cartProduct->price * $cartProduct->qty}}</th>
        							<th><a href="{{ route('remove.cart', $cartProduct->rowId)}}"><i class="fas fa-trash"></i></a></th>
        						</tr>
        						@endforeach
        					</tbody>
        				</table>
        			</ul>

        			<div class="pricing-footer bg-primary">
        				<p style="font-size: 19px;">Quantity: {{Cart::count()}}</p>
        				<p style="font-size: 19px;">Sub Total: {{Cart::subtotal()}}</p>
        				<p style="font-size: 19px;">vat: 0.00</p>
        				<hr>
        				<p><h2 class="text-white">Total:</h2> <h1 class="text-white">{{Cart::total()}}</h1></p>

        				<form action="{{ route('create.sale')}}" method="post">
        		        @csrf
        			</div>
        			<button type="submit" class="btn btn-success"> Submit </button>
        			
        		  </div>
        	  </div>
        	</form>
        	<div class="col-lg-6">
        		<br><br>
        	  <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Product Name</th>
                        <th>Product Code</th>
                        <th>Product Price</th>
                        <th>Add</th>
                    </tr>
                </thead>

         
	                <tbody>
	<?php $id=0; ?>
	                @foreach($products as $product)	
	<?php $id++; ?>
	                    <tr>
	                    	<form action="{{ route('add.cart')}}" method="post">
	                    		@csrf
	                    	<input type="hidden" name="id" value="{{ $product->id}}">
	                    	<input type="hidden" name="name" value="{{ $product->product_name}}">
	                    	<input type="hidden" name="qty" value="1">
	                    	<input type="hidden" name="price" value="{{ $product->product_price}}">
	                        <td>{{$id}}</td>
	                        <td>{{$product->product_name}}</td>
	                        <td>{{$product->product_code}}</td>                                                 
	                        <td>{{$product->product_price}}</td>
	                        <td>
	                        	<button type="submit" class="btn btn-info btn-sm"><i class="fas fa-plus-square"></i></button>
	                        </td>
	                        
	                        </form>
	                    </tr>
	                 @endforeach
	                </tbody>
              </table>
        	</div>
        	
        </div>


        
      </div> <!-- container -->                              
    </div> <!-- content -->

   @include('partials.__footer')
 </div>
 <script src="https://kit.fontawesome.com/f1cdd46680.js" crossorigin="anonymous"></script>

@endsection
