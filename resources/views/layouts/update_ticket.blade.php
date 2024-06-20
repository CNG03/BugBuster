@extends('layouts.app')

@section('title', 'Update Tickets| Bug Buster')

@section('custom-css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/tickets/main.css">
@endsection

@section('content')
<div style="margin-top: 2rem;" >
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Bug Buster</a></li>
            <li class="breadcrumb-item"><a href="#">Tickets</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Tickets</li>
        </ol>
    </nav>
</div>
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if(session('success'))
    <div class="alert2 fixed-top-right" id="errorAlert">
        <i class="fa-solid fa-circle-check"></i>
        <span style="font-size: 30px;order: 3;" class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <strong>{{  session('success')  }}!</strong>
    </div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header fw-bold fs-5">Update Ticket</div>
                <div class="card-body">
                    <form action="{{ route('updateTicket', ['ticketID' => $ticket['id']]) }}" id="ticketForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="" id="ticket">
                            <input type="hidden" name="page" value="{{$page}}">
                            <input name="project_id" hidden type="text" value="{{ $ticket['project_id'] }}">
                            <div class="form-group mt-3">
                                <label class="label-new-ticket" for="ticketName">Name:</label>
                                <input type="text" value="{{$ticket['name']}}" required class="form-control" id="ticketName" name="name" placeholder="Enter the name of the ticket">
                            </div>
                            <div class="label-new-ticket form-group">
                                <label for="estimatedDate">Estimated date:</label>
                                <input type="text" required name="estimated_hours" class="form-control" id="estimatedDate" placeholder="{{$ticket['estimated_hours']}}">
                            </div>
                            <div class="form-group">
                                <label class="label-new-ticket" for="ticketDescription">Description:</label>
                                <textarea class="form-control" required name="description" id="ticketDescription" rows="3" placeholder="User should receive a notification when an action related to them occurs in the application.">{{$ticket['description']}}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="label-new-ticket" for="ticketSTR">Steps to reproduce:</label>
                                <textarea class="form-control" required name="steps_to_reproduce" id="ticketSTR" rows="3" placeholder="User should receive a notification when an action related to them occurs in the application.">{{$ticket['steps_to_reproduce']}}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="label-new-ticket" for="illustration">Image Detail:</label>
                                <input type="file" required name="illustration" class="form-control" id="illustration" accept="image/*">
                            </div>
                            <div id="fileList"></div>
                            <div class="form-group">
                                <label class="label-new-ticket" for="ticketER">Expected Result:</label>
                                <textarea class="form-control" required name="expected_result" id="ticketER" rows="3" placeholder="User should receive a notification when an action related to them occurs in the application.">{{$ticket['expected_result']}}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="label-new-ticket" for="ticketAR">Actual Result :</label>
                                <textarea class="form-control" required name="actual_result" id="ticketAR" rows="3" placeholder="User should receive a notification when an action related to them occurs in the application.">{{$ticket['actual_result']}}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="label-new-ticket" for="ticketPriority">Priority:</label>
                                <select class="form-control" name="priority" id="ticketPriority">
                                    <option value="LOW">LOW</option>
                                    <option value="MEDIUM">MEDIUM</option>
                                    <option value="HIGH">HIGH</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="label-new-ticket" for="bugType">Bug Type:</label>
                                <select name='bug_type_id' class="form-control" id="bugType">
                                    @foreach($bugTypes as $bug)
                                        <option value="{{ $bug['id'] }}">{{ $bug['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="label-new-ticket" for="testType">Test Type:</label>
                                <select name='test_type_id' class="form-control" id="testType">
                                    @foreach($testTypes as $test)
                                        <option value="{{ $test['id'] }}">{{ $test['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" style="display:none;">Submit</button>
                    </form>
                    <button type="button" id="createTicketBtn" class="btn btn-primary">Update Ticket</button>
                    <button type="button" class="btn btn-secondary" onclick="window.history.back();">Back</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-js')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#estimatedDate').datepicker({
                format: 'dd/mm/yyyy',
                autoclose: true,
                todayHighlight: true
            });
        });
    </script>
    <script>
        document.getElementById('createTicketBtn').addEventListener('click', function() {
            var form = document.getElementById('ticketForm');
            if (form.checkValidity()) {
                form.submit();
            } else {
                form.reportValidity(); // This will trigger the browser to display validation errors
            }
        });
    </script>
    <script>
        // Tự động ẩn thông báo sau 5 giây
        $(document).ready(function() {
            setTimeout(function() {
                $(".alert").alert('close');
            }, 5000);
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var errorAlert = document.getElementById('errorAlert');
            if (errorAlert) {
                // Set a timeout to hide the alert after 15 seconds (15000 milliseconds)
                setTimeout(function() {
                    errorAlert.style.display = 'none';
                }, 15000);
            }
        });
    </script>
@endsection
