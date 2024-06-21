@extends('layouts.app')

@section('title', 'Assigned Tickets| Bug Buster')

@section('custom-css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/tickets/main.css">
@endsection

@section('content')
<div style="margin-top: 2rem;" >
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item"><a href="{{route('projectDetail', [$projectID => $projectID])}}">Project Detail</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tickets - Assigned Tickets</li>
        </ol>
    </nav>
</div>
@if($errors->has('gg_cancel'))
    <div class="alert fixed-top-right" id="errorAlert">
        <i class="fa-solid fa-circle-exclamation"></i>
        <span style="font-size: 30px;order: 3;" class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <strong>{{ $errors->first() }}!</strong>
    </div>
@endif
@if(session('success'))
    <div class="alert2 fixed-top-right" id="errorAlert">
        <i class="fa-solid fa-circle-check"></i>
        <span style="font-size: 30px;order: 3;" class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <strong>{{  session('success')  }}!</strong>
    </div>
@endif

<div class="content-table ">
      <div class="tab-content" id="myTabContent">
            <div class="d-flex justify-content-between align-items-center my-4">
                <div class="d-flex mx-4">
                    <input type="text" class="form-control w-100" placeholder="Search...">
                    <button type="submit" class=" ms-3 custom-rounded btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>              
            </div>
            <table class="table table-hover align-middle text-center">
                <caption class="caption-table">
                    Showing {{ $paginationMeta['from'] }} to {{ $paginationMeta['to'] }} of {{ $paginationMeta['total'] }} Rows.
                </caption>
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>Ticket Title</th>
                        <th>Author</th>
                        <th>Priority</th>
                        <th>Bug Type</th>
                        <th>Test Type</th>
                        <th>Estimated Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $index = $paginationMeta['from'];
                    @endphp
                    @if (empty($dashboard['data']))
                        <tr>
                            <td colspan="8">
                                <p style="font-size: 18px;">You have not been assigned any tickets yet</p>
                            </td>
                        </tr>
                    @endif
                    @foreach($dashboard['data'] as $ticket)
                        <tr>
                            <td>{{$index}}</td>
                            @php
                                $index++;
                            @endphp
                            <td><a class="text" data-text="{{ $ticket['name'] }}" href="{{route('ticketDetail', ['ticketID' => $ticket['id']])}}">{{ $ticket['name'] }}</a></td>
                            <td>{{ $ticket['created_by'] }}</td>
                            @switch($ticket['priority'])
                                @case('HIGH')
                                    <td><span class="priority-high">HIGH</span></td>
                                    @break
                                @case('MEDIUM')
                                    <td><span class="priority-medium">MEDIUM</span></td>
                                    @break
                                @case('LOW')
                                    <td><span class="priority-low">LOW</span></td>
                                    @break
                            @endswitch
                            <td>{{$ticket['bug_type']}}</td>
                            <td>{{$ticket['test_type']}}</td>
                            @php
                                $date = \Carbon\Carbon::parse($ticket['estimated_hours']);
                                $day = $date->format('jS'); // 30th, 21st, 22nd, etc.
                                $month = $date->format('F'); // June
                            @endphp
                            <td>{{ $day }} {{ $month }}</td>
                            @switch($ticket['status'])
                                @case('Error')
                                    <td><span class="status-error">Error</span></td>
                                    @break
                                @case('Cancelled')
                                    <td><span class="status-cancel">Cancel</span></td>
                                    @break
                                @case('Pending')
                                    <td><span class="status-pending">Pending</span></td>
                                    @break
                                @case('Tested')
                                    <td><span class="status-tested">Tested</span></td>
                                    @break
                                @case('Closed')
                                    <td><span class="status-close">Closed</span></td>
                                    @break
                            @endswitch
                            <td>
                                @switch($role['role'])
                                    @case('DEVELOPER')
                                        <div class="dropdown">
                                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                @if ($ticket['status'] == 'Error')
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#changeStatusModal" data-ticket-id="{{$ticket['id']}}">Change Status</a></li>
                                                @elseif($ticket['status'] == 'Pending')
                                                    <li>Waiting for review!!! </li>
                                                @else
                                                    <li>Done, Good job!!! </li>
                                                @endif
                                            </ul>
                                        </div>
                                        @break
                                @endswitch
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    @if($paginationMeta['current_page'] > 1)
                        <li class="page-item">
                            <a class="page-link" href="?page={{ $paginationMeta['current_page'] - 1 }}" aria-label="Previous">
                                &laquo; Previous
                            </a>
                        </li>
                    @endif
            
                    @php
                        $startPage = max(1, $paginationMeta['current_page'] - 2);
                        $endPage = min($paginationMeta['last_page'], $paginationMeta['current_page'] + 2);
                    @endphp
            
                    @if($startPage > 1)
                        <li class="page-item">
                            <a class="page-link" href="?page=1">1</a>
                        </li>
                        @if($startPage > 2)
                            <li class="page-item disabled">
                                <a class="page-link" href="#">...</a>
                            </li>
                        @endif
                    @endif
            
                    @for ($page = $startPage; $page <= $endPage; $page++)
                        <li class="page-item {{ $page == $paginationMeta['current_page'] ? 'active' : '' }}">
                            <a class="page-link" href="?page={{ $page }}">{{ $page }}</a>
                        </li>
                    @endfor
            
                    @if($endPage < $paginationMeta['last_page'])
                        @if($endPage < $paginationMeta['last_page'] - 1)
                            <li class="page-item disabled">
                                <a class="page-link" href="#">...</a>
                            </li>
                        @endif
                        <li class="page-item">
                            <a class="page-link" href="?page={{ $paginationMeta['last_page'] }}">{{ $paginationMeta['last_page'] }}</a>
                        </li>
                    @endif
            
                    @if($paginationMeta['current_page'] < $paginationMeta['last_page'])
                        <li class="page-item">
                            <a class="page-link" href="?page={{ $paginationMeta['current_page'] + 1 }}" aria-label="Next">
                                Next &raquo;
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
      </div>
    <style>
        .file-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .dropdown-toggle::after {
            display: none;
        }
    </style>
</div>
<div class="modal fade" id="changeStatusModal" tabindex="-1" aria-labelledby="changeStatusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changeStatusModalLabel">Change Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('updateStatus')}}" method="POST" id="changeStatusForm">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="ticket_id" id="modalTicketId">
                        <label for="statusSelect">Select New Status</label>
                            <select name="status" class="form-control" id="statusSelect">
                                @switch($role['role'])
                                    @case('DEVELOPER')
                                        <option value="Pending">Pending</option>
                                        @break
                                @endswitch
                            </select>
                    </div>
                    <button type="submit" style="display:none;">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveStatusBtn">Change Status</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('custom-js')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('createTicketBtn').addEventListener('click', function() {
            document.getElementById('ticketForm').submit();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const changeStatusModal = document.getElementById('changeStatusModal');
            changeStatusModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget; // Button that triggered the modal
                const ticketId = button.getAttribute('data-ticket-id'); // Extract info from data-* attributes
                
                // Update the modal's content.
                const modalTicketIdInput = document.getElementById('modalTicketId');
                modalTicketIdInput.value = ticketId;
            });
        });
        document.getElementById('saveStatusBtn').addEventListener('click', function() {
            document.getElementById('changeStatusForm').submit();
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
