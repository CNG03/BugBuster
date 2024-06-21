@extends('layouts.app')

@section('title', 'Project Detail | Bug Buster')

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('assets') }}/css/project/main.css">
@endsection

@section('content')
<div style="margin-top: 2rem;" >
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active" aria-current="page">Project Detail</li>
        </ol>
    </nav>
</div>
<div class="container mt-2">
    <!-- Flash Messages -->
    @if(session('success'))
        <div style="align-items: center; display: flex; justify-content: space-between;" class="alert alert-success alert-dismissible fade show" role="alert">
            <p style="margin-top: 0px; margin-bottom: 0px;">{{ session('success') }}</p>
            <button style="background-color: rgb(4 198 144); font-size: 22px; border: none; border-radius: 7px;" type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(session('error'))
        <div style="align-items: center; display: flex; justify-content: space-between;" class="alert alert-danger alert-dismissible fade show" role="alert">
            <p style="margin-top: 0px; margin-bottom: 0px;">{{ session('error') }}</p>
            <button style="background-color: rgb(4 198 144); font-size: 22px; border: none; border-radius: 7px;" type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row">
        <!-- Left Sidebar: Project Details -->
        <div class="col-md-4 sidebar">
            <div class="card mb-4">
                <div class="card-header">
                    <h2>Project Detail</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <h5 class="card-title">Name:</h5>
                        <p class="card-text" id="project-name">{{$project['name']}}</p>
                    </div>
                    <div class="mb-3">
                        <h5 class="card-title">Description:</h5>
                        <p class="card-text" id="project-description">{{$project['description']}}</p>
                    </div>
                    <div class="mb-3">
                        <h5 class="card-title">Author:</h5>
                        <p class="card-text" id="project-author">{{$project['admin']}}</p>
                    </div>
                    <div class="mb-3">
                        <h5 class="card-title">Is Completed:</h5>
                        @if ($project['is_complete'] == 0)
                            <p class="card-text" id="project-status">No</p>
                        @else
                            <p class="card-text" id="project-status">Yes</p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <h5 class="card-title">Created at:</h5>
                        <p class="card-text" id="project-author">{{ \Carbon\Carbon::parse($project['created_at'])->format('l, F j, Y') }}</p>
                    </div>
                    <div class="mb-3">
                        <h5 class="card-title">Updated at:</h5>
                        <p class="card-text" id="project-author">{{ \Carbon\Carbon::parse($project['updated_at'])->format('l, F j, Y') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Content: Project Members and Tickets -->
        <div class="col-md-8 content">
            <!-- Project Members Section -->
            <div class="card mb-4">
                <div class="card-header" data-toggle="collapse" data-target="#projectMembers" aria-expanded="false" aria-controls="projectMembers">
                    <h3>Project Members <span class="icon">+</span></h3>
                </div>
                <div id="projectMembers" class="collapse">
                    <div class="card-body">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action" id="memberListLink">Member List</a>
                            <div id="memberListContent" class="hidden-section sub-section">
                                <ul class="list-group mt-2">
                                    @foreach ($project['members'] as $member)
                                        <li class="list-group-item">{{$member['user']['name']}} - {{$member['role_in_project']}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @if (Session::get('user_role') == 'ADMIN' || $role['role'] == 'MANAGER')
                                <a href="#" class="list-group-item list-group-item-action" id="addMemberLink">Add Member</a>
                                <div id="addMemberContent" class="hidden-section sub-section">
                                    <form class="mt-2" id="addMemberForm">
                                        <div class="form-group">
                                            <label for="searchUser">Search User</label>
                                            <input type="text" class="form-control" id="searchUser" placeholder="Enter username or email">
                                            <div id="searchResults" class="search-results list-group"></div>
                                        </div>
                                        <div id="memberContainer"></div>
                                        <button type="submit" class="btn btn-success mt-2">Add Members</button>
                                    </form>
                                </div>   
                                <a href="#" class="list-group-item list-group-item-action" id="updateMemberRoleLink">Update Member Role</a>
                                <div id="updateMemberRoleContent" class="hidden-section sub-section">
                                    <form action="{{route('updateRole', ['projectID' => $project['id']])}}" method="POST" class="mt-2">
                                        @csrf
                                        <div class="form-group">
                                            <label for="memberSelect">Select Member</label>
                                            <select name="user_id" class="form-control" id="memberSelect">
                                                @foreach ($project['members'] as $member)
                                                    <option value="{{$member['user']['id']}}">{{$member['user']['name']}} - {{$member['role_in_project']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="roleSelect">Select Role</label>
                                            <select name="role_in_project" class="form-control" id="roleSelect">
                                                <option value="READER">Reader</option>
                                                <option value="TESTER">Tester</option>
                                                <option value="DEVELOPER">Developer</option>
                                                <option value="MANAGER">Manager</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update Role</button>
                                    </form>
                                </div>
                                <a href="#" class="list-group-item list-group-item-action" id="deleteMemberLink">Remove users from the project</a>
                                <div id="deleteMemberContent" class="hidden-section sub-section">
                                    <form action="{{ route('removeMember', ['projectID' => $project['id']]) }}" method="POST" class="mt-2">
                                        @csrf
                                        <div class="form-group">
                                            <label for="memberSelect">Select Member</label>
                                            <select name="projectMemberID" class="form-control" id="memberSelect">
                                                @foreach ($project['members'] as $member)
                                                    <option value="{{$member['id']}}">{{$member['user']['name']}} - {{$member['role_in_project']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Remove Member</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tickets Section -->
            <div class="card mb-4">
                <div class="card-header" data-toggle="collapse" data-target="#tickets" aria-expanded="false" aria-controls="tickets">
                    <h3>Tickets <span class="icon">+</span></h3>
                </div>
                <div id="tickets" class="collapse">
                    <div class="card-body">
                        <div class="list-group">
                            @if ($role['role'] == 'TESTER')
                                <a href="{{route('allTickets', ['projectID' => $project['id']])}}" class="list-group-item " id="allTicketsLink">All Tickets</a>
                                <a href="{{route('createdTickets', ['projectID' => $project['id']])}}" class="list-group-item " id="createdTicketsLink">Created Tickets</a>
                            @endif

                            @if ($role['role'] == 'DEVELOPER')
                                <a href="{{route('allTickets', ['projectID' => $project['id']])}}" class="list-group-item " id="allTicketsLink">All Tickets</a>
                                <a href="{{route('assignedTickets', ['projectID' => $project['id']])}}" class="list-group-item " id="assignedTicketsLink">Assigned Tickets</a>
                                <a href="{{route('createdTickets', ['projectID' => $project['id']])}}" class="list-group-item " id="createdTicketsLink">Created Tickets</a>
                            @endif

                            @if ($role['role'] == 'MANAGER')
                                <a href="{{route('allTickets', ['projectID' => $project['id']])}}" class="list-group-item " id="allTicketsLink">All Tickets</a>
                            @endif

                            @if ($role['role'] == 'READER')
                                <a href="{{route('allTickets', ['projectID' => $project['id']])}}" class="list-group-item " id="allTicketsLink">All Tickets</a>
                            @endif

                            @if (Session::get('user_role') == 'ADMIN')
                                <a href="{{route('allTickets', ['projectID' => $project['id']])}}" class="list-group-item " id="allTicketsLink">All Tickets</a>
                                <a href="{{route('assignedTickets', ['projectID' => $project['id']])}}" class="list-group-item " id="assignedTicketsLink">Assigned Tickets</a>
                                <a href="{{route('createdTickets', ['projectID' => $project['id']])}}" class="list-group-item " id="createdTicketsLink">Created Tickets</a>
                            @endif
                        </div>
                    </div>
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
    <script>
        $(document).ready(function() {
            $('.card-header').click(function() {
                let icon = $(this).find('.icon');
                if (icon.text() === '+') {
                    icon.text('-');
                } else {
                    icon.text('+');
                }
            });
    
            $('.list-group-item-action').click(function(e) {
                e.preventDefault();
                let target = $(this).next('.hidden-section');
    
                if (target.is(':visible')) {
                    target.hide();
                } else {
                    $('.hidden-section').hide(); // Ẩn tất cả các phần khác
                    target.show();
                }
            });
            $('#searchUser').on('input', function() {
                let query = $(this).val();
                if (query.length > 2) {
                    // Fake AJAX call to search users
                    let users = [
                        { id: 1, name: 'User 1' },
                        { id: 2, name: 'User 2' },
                        { id: 3, name: 'User 3' },
                        { id: 4, name: 'Huan' },
                        { id: 5, name: 'Lam' },
                        { id: 6, name: 'Cong' }
                    ];

                    let filteredUsers = users.filter(user => user.name.toLowerCase().includes(query.toLowerCase()));
                    let resultsHtml = '';
                    filteredUsers.forEach(user => {
                        resultsHtml += `<a href="#" class="list-group-item list-group-item-action search-result" data-user-id="${user.id}">${user.name}</a>`;
                    });
                    $('#searchResults').html(resultsHtml).show();
                } else {
                    $('#searchResults').hide();
                }
            });

            // Handle add user from search results
            $('#searchResults').on('click', '.search-result', function(e) {
                e.preventDefault();
                let userId = $(this).data('user-id');
                let userName = $(this).text();
                let memberCount = $('.member-item').length + 1;

                let memberItem = `
                    <div class="form-group member-item">
                        <label>Member Name</label>
                        <input type="text" class="form-control member-name" value="${userName}" readonly>
                        <input type="hidden" class="form-control member-id" value="${userId}">
                        <label for="role${memberCount}">Role</label>
                        <select class="form-control member-role" id="role${memberCount}">
                            <option value="MANAGER">MANAGER</option>
                            <option value="DEVELOPER">DEVELOPER</option>
                            <option value="TESTER">TESTER</option>
                        </select>
                        <button type="button" class="btn btn-danger btn-remove-member mt-2">Remove</button>
                    </div>
                `;
                $('#memberContainer').append(memberItem);
                $('#searchResults').hide();
                $('#searchUser').val('');
            });

            // Handle remove member
            $('#memberContainer').on('click', '.btn-remove-member', function() {
                $(this).closest('.member-item').remove();
            });

            // Add another member manually
            $('#addMemberButton').click(function() {
                let memberCount = $('.member-item').length + 1;
                let memberItem = `
                    <div class="form-group member-item">
                        <label for="newMember${memberCount}">Member Name</label>
                        <input type="text" class="form-control member-name" id="newMember${memberCount}">
                        <label for="role${memberCount}">Role</label>
                        <select class="form-control member-role" id="role${memberCount}">
                            <option value="MANAGER">MANAGER</option>
                            <option value="DEVELOPER">DEVELOPER</option>
                            <option value="TESTER">TESTER</option>
                        </select>
                        <button type="button" class="btn btn-danger btn-remove-member mt-2">Remove</button>
                    </div>
                `;
                $('#memberContainer').append(memberItem);
            });

            // Handle form submission
            $('#addMemberForm').submit(function(e) {
                e.preventDefault();
                let members = [];
                $('.member-item').each(function() {
                    let memberId = $(this).find('.member-id').val() || null;
                    let memberName = $(this).find('.member-name').val();
                    let memberRole = $(this).find('.member-role').val();

                    if (memberId || memberName) {
                        members.push({
                            user_id: memberId,
                            name: memberName,
                            role_in_project: memberRole
                        });
                    }
                });

                // Send data to server
                $.ajax({
                    url: '/api/v1/projectmembers/{{ $project['id'] }}',
                    method: 'POST',
                    data: {
                        members: members
                    },
                    success: function(response) {
                        alert('Members added successfully!');
                        // Reload or update the member list
                    },
                    error: function() {
                        alert('Failed to add members.');
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Automatically close the alert after 7 seconds
            setTimeout(function() {
                $(".alert").alert('close');
            }, 7000);
        });
    </script>
@endsection
