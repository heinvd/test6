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
                            @if(Auth::user()->is_admin)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-hover table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>
                                                            User Name
                                                        </th>
                                                        <th>
                                                            Email
                                                        </th>
                                                        <th>
                                                            Date Registered
                                                        </th>
                                                        <th>
                                                            Is Admin
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                        @foreach($userss as $user)


                                                        <tr>
                                                            <td>
                                                                {{$user->name}}
                                                            </td>
                                                            <td>
                                                                {{$user->email}}
                                                            </td>
                                                            <td>
                                                               {{$user->created_at}}
                                                            </td>
                                                            <td>
                                                                <?php if($user->is_admin) { echo 'Yes'; } else { echo 'No'; } ?>
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

