@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    @if (!Auth::guest())
                        <div class="panel-heading"><h4>Welcome back <b>{{ Auth::user()->name }}</b></h4></div>
                        <div class="panel-body">
                            <h4>You have successfully logged in.</h4>
                        </div>
                    @endif
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Check out our latest performance!</h4></div>
                    <div class="panel-body">

                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Amend your account credentials!</div>
                    <div class="panel-body">
                        You may view and update your account credentials by clicking on your name on the top right
                        corner, then clicking on "<b>Update Account Details</b>". All of your current details will be
                        filled within the text-boxes, in the case of slight or minor changes.
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Create and amend roles!</div>
                    <div class="panel-body">
                        You may create additional roles along with the option to create new ones, the role named '<u>Root</u>'
                        provides access to all areas of this website. You may do this by clicking on your name on the
                        top right corner, then clicking on "<b>Manage Roles</b>".
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Create, amend and delete users!</div>
                    <div class="panel-body">
                        You may amend the credentials of an already existing user, delete them completely or create a
                        new user by clicking on your name on the top right corner, then clicking on "<b>Manage Users</b>".
                    </div>
                </div>
            </div>

            <div class="col-md-6 .col-md-offset-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Create, amend and delete production types!</div>
                    <div class="panel-body">
                        You may create new production types, along with the option of amending and deleting previously
                        added production types. You may do this by clicking on your name on the top right corner, then
                        clicking on "<b>Manage Production Types</b>".
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Create, amend and delete productions!</div>
                    <div class="panel-body">
                        You may create new productions, along with the option of amending and deleting previously added
                        productions. You may do this by clicking on your name on the top right corner, then clicking on
                        "<b>Manage Productions</b>".
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Create, amend and delete performances!</div>
                    <div class="panel-body">
                        You may create new performances, along with the option of amending and deleting previously added
                        performances. You may do this by clicking on your name on the top right corner, then clicking on
                        "<b>Manage Performances</b>".
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Book tickets and purchase them instantly!</div>
                    <div class="panel-body">
                        You may add the tickets you would like to book/purchase from the "<b>Productions</b>" by
                        clicking on the production you want to attend and then clicking on "<b>Add to Basket</b>" on the
                        specific performance (although you may attend more than one performance).
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div align="center">&copy; <b>Raleigh Theatre Database</b>. 2015.</center>
        <br/>
        <br/>
        <br/>

@endsection
