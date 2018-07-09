@extends('layouts.app')
@section('content')

    <div class="container-fluid">
    <div class="row">

        @foreach($products as $product)
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">Are you sure you want to purchase this item?</div>

                            <div class="panel-body">
                         <h2>
                    {{$product->product_name}}
                </h2>
                <p>
                    R {{number_format($product->product_price,2)}}  (discount)
                </p>
                <p>
                                <form role="form" method="POST" action="{{ action('TransactionsController@purchase',$product->id_product) }}">
                                    {{ csrf_field() }}

                                    <input type="hidden" class="form-control" name="trans_type" value="-1" />
                                    <input type="hidden" class="form-control" name="purchase_amount" value="{{$product->product_price}}"  />
                                    <input type="hidden" class="form-control" name="trans_description" value="Purchase of {{$product->product_name}}" />

                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </form>                </p>
            </div>
                    </div>
                @endforeach
                    </div>
                </div>


    </div>
</div>
    </div>

    @endsection
