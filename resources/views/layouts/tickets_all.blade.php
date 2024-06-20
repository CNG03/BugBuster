@extends('layouts.app')

@section('title', 'Tickets | Bug Buster')

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('assets') }}/css/tickets/main.css">
@endsection

@section('content')
    <div style="margin-top: 2rem;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Bug Buster</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ticket</li>
            </ol>
        </nav>
    </div>


    <div class="content-table ">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="alltickets-tab" data-toggle="tab" href="#alltickets" role="tab"
                    aria-controls="alltickets" aria-selected="true">All Tickets</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="ticketscreated-tab" data-toggle="tab" href="#ticketscreated" role="tab"
                    aria-controls="ticketscreated" aria-selected="false">Tickets Created</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="assignedtickets-tab" data-toggle="tab" href="#assignedtickets" role="tab"
                    aria-controls="assignedtickets" aria-selected="false">Assigned Tickets</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="alltickets" role="tabpanel" aria-labelledby="alltickets-tab">
                <div class="d-flex justify-content-between align-items-center my-4">
                    <div class="d-flex mx-4">
                        <input type="text" class="form-control w-100" placeholder="Search...">
                        <button type="submit" class=" ms-3 custom-rounded btn btn-primary"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                    {{-- <div class="mx-4">
                    <button class=" custom-rounded btn btn-warning mx-2">Edit Project</button>
                    <button class="custom-rounded btn btn-primary" data-bs-toggle="modal" data-bs-target="#newTicketModal">New Ticket</button>
                </div> --}}
                </div>
                <table class="table table-hover align-middle text-center">
                    <caption class="caption-table">
                        Showing {{ $paginationMeta['from'] }} to {{ $paginationMeta['to'] }} of
                        {{ $paginationMeta['total'] }} Rows.
                    </caption>
                    <thead class="table-primary">
                        <tr>
                            <th>Ticket Title</th>
                            <th>Author</th>
                            <th>Priority</th>
                            <th>Bug Type</th>
                            <th>Test Type</th>
                            <th>Estimated hours</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dashboard['data'] as $ticket)
                            <tr>
                                <td><a class="text" data-text="{{ $ticket['name'] }}"
                                        href="#">{{ $ticket['name'] }}</a></td>
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
                                <td>{{ $ticket['bug_type'] }}</td>
                                <td>{{ $ticket['test_type'] }}</td>
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
                                        @case('TESTER')
                                            <div class="dropdown">
                                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#changeStatusModal">Change Status</a></li>
                                                    <li><a class="dropdown-item" href="#">Edit Ticket</a></li>
                                                </ul>
                                            </div>
                                        @break

                                        @case('MANAGER')
                                            <div class="dropdown">
                                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#changeStatusModal">Change Status</a></li>
                                                </ul>
                                            </div>
                                        @break

                                        @case('DEVELOPER')
                                            <div class="dropdown">
                                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#changeStatusModal">Change Status</a></li>
                                                </ul>
                                            </div>
                                        @break

                                        @case('READER')
                                            <div class="fw-bold">
                                                <i class="fa-solid fa-lock"></i>
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
                        @if ($paginationMeta['current_page'] > 1)
                            <li class="page-item">
                                <a class="page-link" href="?page={{ $paginationMeta['current_page'] - 1 }}"
                                    aria-label="Previous">
                                    &laquo; Previous
                                </a>
                            </li>
                        @endif

                        @php
                            $startPage = max(1, $paginationMeta['current_page'] - 2);
                            $endPage = min($paginationMeta['last_page'], $paginationMeta['current_page'] + 2);
                        @endphp

                        @if ($startPage > 1)
                            <li class="page-item">
                                <a class="page-link" href="?page=1">1</a>
                            </li>
                            @if ($startPage > 2)
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

                        @if ($endPage < $paginationMeta['last_page'])
                            @if ($endPage < $paginationMeta['last_page'] - 1)
                                <li class="page-item disabled">
                                    <a class="page-link" href="#">...</a>
                                </li>
                            @endif
                            <li class="page-item">
                                <a class="page-link"
                                    href="?page={{ $paginationMeta['last_page'] }}">{{ $paginationMeta['last_page'] }}</a>
                            </li>
                        @endif

                        @if ($paginationMeta['current_page'] < $paginationMeta['last_page'])
                            <li class="page-item">
                                <a class="page-link" href="?page={{ $paginationMeta['current_page'] + 1 }}"
                                    aria-label="Next">
                                    Next &raquo;
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
            <div class="tab-pane fade" id="ticketscreated" role="tabpanel" aria-labelledby="ticketscreated-tab">
                <div class="d-flex justify-content-between align-items-center my-4">
                    <div class="d-flex mx-4">
                        <input type="text" class="form-control w-100" placeholder="Search...">
                        <button type="submit" class=" ms-3 custom-rounded btn btn-primary"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                    <div class="mx-4">
                        {{-- <button class=" custom-rounded btn btn-warning mx-2">Edit Project</button> --}}
                        <button class="custom-rounded btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#newTicketModal">New Ticket</button>
                    </div>
                </div>
                <table class="table table-hover align-middle text-center">
                    <caption class="caption-table">
                        Showing {{ $paginationMeta['from'] }} to {{ $paginationMeta['to'] }} of
                        {{ $paginationMeta['total'] }} Rows.
                    </caption>
                    <thead class="table-primary">
                        <tr>
                            <th>Ticket Title</th>
                            <th>Author</th>
                            <th>Priority</th>
                            <th>Bug Type</th>
                            <th>Test Type</th>
                            <th>Estimated hours</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dashboard['data'] as $ticket)
                            <tr>
                                <td><a class="text" data-text="{{ $ticket['name'] }}"
                                        href="#">{{ $ticket['name'] }}</a></td>
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
                                <td>{{ $ticket['bug_type'] }}</td>
                                <td>{{ $ticket['test_type'] }}</td>
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
                                        @case('TESTER')
                                            <div class="dropdown">
                                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#changeStatusModal">Change Status</a></li>
                                                    <li><a class="dropdown-item" href="#">Edit Ticket</a></li>
                                                </ul>
                                            </div>
                                        @break

                                        @case('MANAGER')
                                            <div class="dropdown">
                                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#changeStatusModal">Change Status</a></li>
                                                </ul>
                                            </div>
                                        @break

                                        @case('DEVELOPER')
                                            <div class="dropdown">
                                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#changeStatusModal">Change Status</a></li>
                                                </ul>
                                            </div>
                                        @break

                                        @case('READER')
                                            <div class="fw-bold">
                                                <i class="fa-solid fa-lock"></i>
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
                        @if ($paginationMeta['current_page'] > 1)
                            <li class="page-item">
                                <a class="page-link" href="?page={{ $paginationMeta['current_page'] - 1 }}"
                                    aria-label="Previous">
                                    &laquo; Previous
                                </a>
                            </li>
                        @endif

                        @php
                            $startPage = max(1, $paginationMeta['current_page'] - 2);
                            $endPage = min($paginationMeta['last_page'], $paginationMeta['current_page'] + 2);
                        @endphp

                        @if ($startPage > 1)
                            <li class="page-item">
                                <a class="page-link" href="?page=1">1</a>
                            </li>
                            @if ($startPage > 2)
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

                        @if ($endPage < $paginationMeta['last_page'])
                            @if ($endPage < $paginationMeta['last_page'] - 1)
                                <li class="page-item disabled">
                                    <a class="page-link" href="#">...</a>
                                </li>
                            @endif
                            <li class="page-item">
                                <a class="page-link"
                                    href="?page={{ $paginationMeta['last_page'] }}">{{ $paginationMeta['last_page'] }}</a>
                            </li>
                        @endif

                        @if ($paginationMeta['current_page'] < $paginationMeta['last_page'])
                            <li class="page-item">
                                <a class="page-link" href="?page={{ $paginationMeta['current_page'] + 1 }}"
                                    aria-label="Next">
                                    Next &raquo;
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
            <div class="tab-pane fade" id="assignedtickets" role="tabpanel" aria-labelledby="assignedtickets-tab">
                <div class="d-flex justify-content-between align-items-center my-4">
                    <div class="d-flex mx-4">
                        <input type="text" class="form-control w-100" placeholder="Search...">
                        <button type="submit" class=" ms-3 custom-rounded btn btn-primary"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                    {{-- <div class="mx-4">
                    <button class=" custom-rounded btn btn-warning mx-2">Edit Project</button>
                    <button class="custom-rounded btn btn-primary" data-bs-toggle="modal" data-bs-target="#newTicketModal">New Ticket</button>
                </div> --}}
                </div>
                <table class="table table-hover align-middle text-center">
                    <caption class="caption-table">Showing 1 to 6 of 12 Rows.</caption>
                    <thead class="table-primary">
                        <tr>
                            <th>Ticket Title</th>
                            <th>Author</th>
                            <th>Priority</th>
                            <th>Bug Type</th>
                            <th>Test Type</th>
                            <th>Estimated hours</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a class="text" data-text="Ticket update log" href="#">Ticket update log</a></td>
                            <td>Admin</td>
                            <td><span class="priority-medium">Medium</span></td>
                            <td>Bug - Error</td>
                            <td>Bug - Error</td>
                            <td>1</td>
                            <td><span class="status-tested">tested</span></td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                data-bs-target="#changeStatusModal">Change Status</a></li>
                                        <li><a class="dropdown-item" href="#">Edit Ticket</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><a class="text" data-text="Training" href="#">Training</a></td>
                            <td>Admin</td>
                            <td><span class="priority-medium">Medium</span></td>
                            <td>Training</td>
                            <td>Training</td>
                            <td>3</td>
                            <td><span class="status-tested">tested</span></td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                data-bs-target="#changeStatusModal">Change Status</a></li>
                                        <li><a class="dropdown-item" href="#">Edit Ticket</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><a class="text" data-text="Documentation" href="#">Documentation</a></td>
                            <td>Admin</td>
                            <td><span class="priority-high">High</span></td>
                            <td>Documentation</td>
                            <td>Documentation</td>
                            <td>5</td>
                            <td><span class="status-tested">tested</span></td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                data-bs-target="#changeStatusModal">Change Status</a></li>
                                        <li><a class="dropdown-item" href="#">Edit Ticket</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><a class="text" data-text="Comment" href="#">Comment</a></td>
                            <td>Admin</td>
                            <td><span class="priority-low">Low</span></td>
                            <td>Feature request</td>
                            <td>Feature request</td>
                            <td>1</td>
                            <td><span class="status-tested">tested</span></td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                data-bs-target="#changeStatusModal">Change Status</a></li>
                                        <li><a class="dropdown-item" href="#">Edit Ticket</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><a class="text" data-text="Logs" href="#">Logs</a></td>
                            <td>Admin</td>
                            <td><span class="priority-high">High</span></td>
                            <td>Feature request</td>
                            <td>Feature request</td>
                            <td>1</td>
                            <td><span class="status-tested">tested</span></td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                data-bs-target="#changeStatusModal">Change Status</a></li>
                                        <li><a class="dropdown-item" href="#">Edit Ticket</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><a class="text" data-text="Filter" href="#">Filter</a></td>
                            <td>Admin</td>
                            <td><span class="priority-medium">Medium</span></td>
                            <td>Feature request</td>
                            <td>Feature request</td>
                            <td>1</td>
                            <td><span class="status-tested">tested</span></td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                data-bs-target="#changeStatusModal">Change Status</a></li>
                                        <li><a class="dropdown-item" href="#">Edit Ticket</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">»</a></li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="modal fade" id="newTicketModal" tabindex="-1" aria-labelledby="newTicketModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newTicketModalLabel">Create Ticket</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="ticket-tab" data-bs-toggle="tab" href="#ticket"
                                    role="tab" aria-controls="ticket" aria-selected="true">Ticket</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="team-tab" data-bs-toggle="tab" href="#team" role="tab"
                                    aria-controls="team" aria-selected="false">Assigning to</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="ticket" role="tabpanel"
                                aria-labelledby="ticket-tab">
                                <form>
                                    <div class="form-group mt-3">
                                        <label class="label-new-ticket" for="ticketName">Name:</label>
                                        <input type="text" class="form-control" id="ticketName"
                                            placeholder="Enter the name of the ticket">
                                    </div>
                                    <div class="label-new-ticket" class="form-group">
                                        <label for="estimatedHours">Estimated hours:</label>
                                        <input type="number" class="form-control" id="estimatedHours" min="1"
                                            placeholder="4">
                                    </div>
                                    <div class="form-group">
                                        <label class="label-new-ticket" for="ticketDescription">Description:</label>
                                        <textarea class="form-control" id="ticketDescription" rows="3"
                                            placeholder="User should receive a notification when an action related to them occurs in the application."></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-new-ticket" for="ticketSTR">Steps to reproduce:</label>
                                        <textarea class="form-control" id="ticketSTR" rows="3"
                                            placeholder="User should receive a notification when an action related to them occurs in the application."></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-new-ticket" for="imageDetail">Image Detail:</label>
                                        <input type="file" class="form-control" id="imageDetail" multiple>
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
                                    <div id="fileList"></div>
                                    <div class="form-group">
                                        <label class="label-new-ticket" for="ticketER">Expected Result:</label>
                                        <textarea class="form-control" id="ticketER" rows="3"
                                            placeholder="User should receive a notification when an action related to them occurs in the application."></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-new-ticket" for="ticketAR">Actual Result :</label>
                                        <textarea class="form-control" id="ticketAR" rows="3"
                                            placeholder="User should receive a notification when an action related to them occurs in the application."></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-new-ticket" for="ticketPriority">Priority:</label>
                                        <select class="form-control" id="ticketPriority">
                                            <option>Low</option>
                                            <option>Medium</option>
                                            <option>High</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-new-ticket" for="bugType">Bug Type:</label>
                                        <select class="form-control" id="bugType">
                                            <option value="interface-error">Interface error</option>
                                            <option value="business-logic-error">Business logic error</option>
                                            <option value="data-access-error">Data access error</option>
                                            <option value="documentation-review-error">Documentation review error</option>
                                            <option value="code-review-error">Code review error</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="label-new-ticket" for="testType">Test Type:</label>
                                        <select class="form-control" id="testType">
                                            <option>Unit Testing</option>
                                            <option>Integration Testing</option>
                                            <option>System Testing</option>
                                            <option>Acceptance Testing</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="team" role="tabpanel" aria-labelledby="team-tab">
                                <div class="mt-3">
                                    <h6>Assigned Developers</h6>
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            John Doe - Developer
                                            <input type="radio" name="assignedDeveloper" aria-label="Select John Doe">
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Jane Doe - Developer
                                            <input type="radio" name="assignedDeveloper" aria-label="Select Jane Doe">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Create Ticket</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="changeStatusModal" tabindex="-1" aria-labelledby="changeStatusModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changeStatusModalLabel">Change Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="changeStatusForm">
                        <div class="form-group">
                            <label for="statusSelect">Select New Status</label>
                            <select class="form-control" id="statusSelect">
                                <option>Error</option>
                                <option>Pending</option>
                                <option>Tested</option>
                                <option>Cancel</option>
                                <option>Close</option>
                            </select>
                        </div>
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
        // Reset form and checkboxes when modal is hidden
        $('#newTicketModal').on('hidden.bs.modal', function() {
            $(this).find('form')[0].reset();
            $(this).find('input[type="checkbox"]').prop('checked', false);
            $('#myTab a[href="#ticket"]').tab('show');
        });

        // Trigger modal close on save changes
        $('#saveChangesBtn').on('click', function() {
            $('#newTicketModal').modal('hide');
        });
        document.getElementById('imageDetail').addEventListener('change', function(event) {
            const fileList = document.getElementById('fileList');
            fileList.innerHTML = ''; // Clear current file list

            Array.from(event.target.files).forEach((file, index) => {
                const fileItem = document.createElement('div');
                fileItem.classList.add('file-item');

                const fileName = document.createElement('span');
                fileName.textContent = file.name;

                const removeButton = document.createElement('button');
                removeButton.textContent = 'Remove';
                removeButton.classList.add('btn', 'btn-danger', 'btn-sm');
                removeButton.addEventListener('click', () => {
                    const dt = new DataTransfer();
                    const input = document.getElementById('imageDetail');
                    const {
                        files
                    } = input;

                    for (let i = 0; i < files.length; i++) {
                        if (i !== index) {
                            dt.items.add(files[i]); // Add files that are not removed
                        }
                    }
                    input.files = dt.files; // Update input files
                    fileItem.remove(); // Remove file item from list
                });

                fileItem.appendChild(fileName);
                fileItem.appendChild(removeButton);
                fileList.appendChild(fileItem);
            });
        });
    </script>
@endsection
