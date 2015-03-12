@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default">
                    <div class="panel-heading">Opening Times</div>
                    <div class="panel-body">
                        At Raleigh Theatre, we always have the newest performances, therefore we allow for a very wide range of opening times on every day of the week to provide a suitable and comfortable experience for you. However, we are always closed on a Sunday so that our employees take the breaks they need! We also like to look after the venue by allowing deep cleans on Sundays.

                        <br />
                        <br />

                        Be sure to check us out!
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Current Performance Times</div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Day</th>
                                <th>Opening Time</th>
                                <th>Closing Time</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td>Monday</td>
                                <td>9:00 AM</td>
                                <td>11:00 PM</td>
                            </tr>
                            <tr>
                                <td>Tuesday</td>
                                <td>9:00 AM</td>
                                <td>11:00 PM</td>
                            </tr>
                            <tr>
                                <td>Wednesday</td>
                                <td>9:00 AM</td>
                                <td>11:00 PM</td>
                            </tr>
                            <tr>
                                <td>Thursday</td>
                                <td>9:00 AM</td>
                                <td>11:00 PM</td>
                            </tr>
                            <tr>
                                <td>Friday</td>
                                <td>9:00 AM</td>
                                <td>11:00 PM</td>
                            </tr>
                            <tr>
                                <td>Saturday</td>
                                <td>9:00 AM</td>
                                <td>9:00 PM</td>
                            </tr>
                            <tr>
                                <td>Sunday</td>
                                <td>CLOSED</td>
                                <td>CLOSED</td>
                            </tr>
                            </tbody>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
