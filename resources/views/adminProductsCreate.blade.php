@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Manage Products - Create</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (Auth::guest())
                            Please login to proceed
                        @else
                            @if(Auth::user()->is_admin)

                                    <form role="form" method="POST" action="{{ url('adminProductsCreate') }}">
                                        {{ csrf_field() }}


                                        <div class="form-group">

                                            <label for="product_name">
                                                Product Name
                                            </label>
                                            <input type="text" class="form-control" name="product_name" id="product_name" />
                                        </div>
                                        <div class="form-group">

                                            <label for="product_price">
                                                Price
                                            </label>
                                            <input type="text" class="form-control" name="product_price" id="product_price" />
                                        </div>
                                        <div class="checkbox">

                                            <label>
                                                <input type="checkbox"  checked /> Active
                                            </label>
                                        </div>
                                        <button type="submit" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </form>

                            @else
                                You are not authorised to view this page
                            @endif
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

