@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Manage Products</div>

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
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-hover table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>
                                                            Product Name
                                                        </th>
                                                        <th>
                                                            Product Price
                                                        </th>
                                                        <th>
                                                            Date Registered
                                                        </th>
                                                        <th>
                                                            Is Active
                                                        </th>
                                                        <th>
                                                            Action
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                        @foreach($products as $product)


                                                        <tr>
                                                            <td>
                                                                {{$product->product_name}}
                                                            </td>
                                                            <td>
                                                                {{$product->product_price}}
                                                            </td>
                                                            <td>
                                                               {{$product->created_at}}
                                                            </td>
                                                            <td>
                                                                <?php if($product->valid) { echo 'Yes'; } else { echo 'No'; } ?>
                                                            </td>
                                                            <td>
                                                                <a href="{{action('ProductsController@edit',$product->id_product)}}" class="btn btn-primary">Edit</a>
                                                            </td>
                                                        </tr>

                                    @endforeach
                                                        </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link" href="adminProductsCreate">Add New</a>
                                        </li>
                                    </ul>

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

