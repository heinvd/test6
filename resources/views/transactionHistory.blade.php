@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Manage Users</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (Auth::guest())
                            Please login to proceed
                        @else
                            @if(Auth::user())
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-hover table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>
                                                            Transaction Date
                                                        </th>
                                                        <th>
                                                            Transaction Description
                                                        </th>
                                                        <th align="right">
                                                            Transaction Value
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                        @foreach($transactions as $transaction)


                                                        <tr>
                                                            <td>
                                                                {{$transaction->created_at}}
                                                            </td>
                                                            <td>
                                                                {{$transaction->trans_description}}
                                                            </td>
                                                            <td align="right">
                                                               R {{ number_format($transaction->trans_value,2)}}
                                                            </td>
                                                        </tr>

                                    @endforeach
                                                        </tbody>
                                                </table>
                                            </div>
                                        </div>



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

