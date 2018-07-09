<div class="container-fluid">
    <div class="row">


            <?php  $products = DB::table('products')->get(); ?>

        @foreach($products as $product)
                    <div class="col-md-4">
            <div class="jumbotron">
                <h2>
                    {{$product->product_name}}
                </h2>
                <p>
                    R {{number_format($product->product_price,2)}}
                </p>
                <p>
                    <a class="btn btn-primary btn-large" href="{{action('TransactionsController@buynow',$product->id_product)}}">Buy Now</a>
                </p>
            </div>
                    </div>
                @endforeach


    </div>
</div>