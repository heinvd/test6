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
                                        R {{number_format($product->product_price,2)}} discounted to
                                        R {{ $product->discamount = number_format($product->product_price - (\App\Http\Controllers\TransactionsController::getDiscount($product->product_price)[0]->discount_perc / 100 * $product->product_price),2) }}
                                    </p>
                                    <p>
                                    <form role="form" method="POST"
                                          action="{{ action('TransactionsController@purchase',$product->id_product) }}">
                                        {{ csrf_field() }}

                                        <input type="hidden" class="form-control" name="trans_type" value="-1"/>
                                        <input type="hidden" class="form-control" name="purchase_amount"
                                               value="{{$product->discamount}}"/>
                                        <input type="hidden" class="form-control" name="trans_description"
                                               value="Purchase of {{$product->product_name}}"/>
@if(number_format(\App\Http\Controllers\TransactionsController::getBalance(Auth::user()->id)[0]->totalbalance,2) > $product->discamount)
                                        <button type="submit" class="btn btn-primary">
                                            Buy Now
                                        </button>
    @else
                                        Sorry, you do not have enough funds, please <a href="{{ url('/topup') }}">Topup</a> your account

    @endif
                                    </form>
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>


                </div>
        </div>
    </div>

@endsection
