@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="form-grup">
                        <input type="text" class="form-control" name="username" id="username"
                            placeholder="please enter a username...">
                    </div><br>
                    <div id="messages"></div>

                    <form id="message_form">
                        <div class="form-group">
                            <input type="text" class="form-control" type="message" id="message_input"
                                placeholder="Write a message....">
                        </div>
                        <button type="submit" id="message_send" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection