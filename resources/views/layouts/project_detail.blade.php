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
                    <h2 class="animate-charcter" id="project-name">{{$project['name']}}</h2>
                    @if (Session::get('user_role') == 'ADMIN' || $role['role'] == 'MANAGER')
                        <div>
                            <button class="btn btn-primary float-right" data-toggle="modal" data-target="#closeProjectModal"><i class="fa-solid fa-folder-closed"></i> Close Project</button>
                        </div>                     
                    @endif
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <h5 class="card-title" style="text-transform: unset"><i class="fa-solid fa-book"></i>  Description:</h5>
                        <p class="card-text description-text" id="project-description">{{$project['description']}}</p>
                    </div>
                    <div class="mb-3">
                        <h5 class="card-title text-tran-unset"><i class="fa-solid fa-user-tie"></i>  Author:</h5>
                        <p class="card-text" id="project-author">{{$project['admin']}}</p>
                    </div>
                    <div class="mb-3">
                        <h5 class="card-title text-tran-unset"><i class="fa-solid fa-check"></i>  Is Completed:</h5>
                        @if ($project['is_complete'] == 0)
                            <p class="card-text" id="project-status">No</p>
                        @else
                            <p class="card-text" id="project-status">Yes</p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <h5 class="card-title text-tran-unset"><i class="fa-regular fa-calendar-days"></i>  Created at:</h5>
                        <p class="card-text" id="project-author">{{ \Carbon\Carbon::parse($project['created_at'])->format('l, F j, Y') }}</p>
                    </div>
                    <div class="mb-3">
                        <h5 class="card-title text-tran-unset"> <i class="fa-regular fa-calendar-days"></i>  Updated at:</h5>
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
                    <h3><span class="animate-charcter">Project Members </span><span class="icon">+</span></h3>
                </div>
                <div id="projectMembers" class="collapse">
                    <div class="card-body">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action" id="memberListLink"><i class="fa-solid fa-users"></i> Member List</a>
                            <div id="memberListContent" class="hidden-section sub-section">
                                <ul class="list-group mt-2">
                                    @foreach ($project['members'] as $member)
                                        <li class="animate-charcter1 list-group-item">{{$member['user']['name']}} - {{$member['role_in_project']}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @if (Session::get('user_role') == 'ADMIN' || $role['role'] == 'MANAGER')
                                <a href="#" class="list-group-item list-group-item-action" id="addMemberLink"><i class="fa-solid fa-user-plus"></i> Add Member</a>
                                <div id="addMemberContent" class="hidden-section sub-section">
                                    <form class="mt-2" id="addMemberForm" action="{{ route('addMember', ['projectID' => $project['id'], 'isCompleted' => $project['is_complete']]) }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="searchUser">Search User</label>
                                            <input type="text" class="form-control" id="searchUser" placeholder="Enter username or email">
                                            <div id="searchResults" class="search-results list-group"></div>
                                        </div>
                                        <div id="memberContainer"></div>
                                        <button type="submit" class="btn btn-success mt-2">Add Members</button>
                                    </form>
                                </div>   
                                <a href="#" class="list-group-item list-group-item-action" id="updateMemberRoleLink"><i class="fa-solid fa-user-tag"></i> Update Member Role</a>
                                <div id="updateMemberRoleContent" class="hidden-section sub-section">
                                    <form action="{{route('updateRole', ['projectID' => $project['id'], 'isCompleted' => $project['is_complete']])}}" method="POST" class="mt-2">
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
                                <a href="#" class="list-group-item list-group-item-action" id="deleteMemberLink"><i class="fa-solid fa-user-minus"></i> Remove users from the project</a>
                                <div id="deleteMemberContent" class="hidden-section sub-section">
                                    <form action="{{ route('removeMember', ['projectID' => $project['id'], 'isCompleted' => $project['is_complete']]) }}" method="POST" class="mt-2">
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
                    <h3> <span class="animate-charcter">Tickets</span> <span class="icon">+</span></h3>
                </div>
                <div id="tickets" class="collapse">
                    <div class="card-body">
                        <div class="list-group">
                            @if ($project['is_complete'] == 0)
                                @if ($role['role'] == 'TESTER')
                                    <a href="{{route('allTickets', ['projectID' => $project['id'], 'isCompleted' => $project['is_complete'], 'isCompleted' => $project['is_complete']])}}" class="list-group-item " id="allTicketsLink"><i class="fa-solid fa-list"></i> All Tickets</a>
                                    <a href="{{route('createdTickets', ['projectID' => $project['id'], 'isCompleted' => $project['is_complete']])}}" class="list-group-item " id="createdTicketsLink"><i class="fa-solid fa-ticket-simple"></i> Created Tickets</a>
                                @endif

                                @if ($role['role'] == 'DEVELOPER')
                                    <a href="{{route('allTickets', ['projectID' => $project['id'], 'isCompleted' => $project['is_complete']])}}" class="list-group-item " id="allTicketsLink"><i class="fa-solid fa-list"></i> All Tickets</a>
                                    <a href="{{route('assignedTickets', ['projectID' => $project['id'], 'isCompleted' => $project['is_complete']])}}" class="list-group-item " id="assignedTicketsLink"><i class="fa-solid fa-file"></i> Assigned Tickets</a>
                                    <a href="{{route('createdTickets', ['projectID' => $project['id'], 'isCompleted' => $project['is_complete']])}}" class="list-group-item " id="createdTicketsLink"><i class="fa-solid fa-ticket-simple"></i> Created Tickets</a>
                                @endif

                                @if ($role['role'] == 'MANAGER')
                                    <a href="{{route('allTickets', ['projectID' => $project['id'], 'isCompleted' => $project['is_complete']])}}" class="list-group-item " id="allTicketsLink"><i class="fa-solid fa-list"></i> All Tickets</a>
                                @endif

                                @if ($role['role'] == 'READER')
                                    <a href="{{route('allTickets', ['projectID' => $project['id'], 'isCompleted' => $project['is_complete']])}}" class="list-group-item " id="allTicketsLink"><i class="fa-solid fa-list"></i> All Tickets</a>
                                @endif

                                @if (Session::get('user_role') == 'ADMIN')
                                    <a href="{{route('allTickets', ['projectID' => $project['id'], 'isCompleted' => $project['is_complete']])}}" class="list-group-item " id="allTicketsLink"><i class="fa-solid fa-list"></i> All Tickets</a>
                                @endif
                            @else
                                <a href="{{route('allTickets', ['projectID' => $project['id'], 'isCompleted' => $project['is_complete']])}}" class="list-group-item " id="allTicketsLink"><i class="fa-solid fa-list"></i> All Tickets</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="closeProjectModal" tabindex="-1" role="dialog" aria-labelledby="closeProjectModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="closeProjectModalLabel">Confirm Close Project</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to close this project?</p>
                            <p>Please type <strong style="color: red;">CLOSE</strong> to confirm.</p>
                            <input type="text" id="closeConfirmationInput" class="form-control" placeholder="Type CLOSE to confirm">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <form action="{{ route('closeProject', ['projectID' => $project['id'], 'isCompleted' => $project['is_complete']]) }}" method="POST" id="closeProjectForm">
                                @csrf
                                <button type="submit" class="btn btn-primary" id="confirmCloseProjectButton" disabled>Close</button>
                            </form>
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

            let usersNotInProject = @json($userNotInProject);

            // Handle search user
            $('#searchUser').on('input', function() {
                let query = $(this).val();
                if (query.length > 2) {
                    let filteredUsers = usersNotInProject.filter(user => 
                        user.name.toLowerCase().includes(query.toLowerCase()) ||
                        user.email.toLowerCase().includes(query.toLowerCase())
                    );
                    let resultsHtml = '';
                    filteredUsers.forEach(user => {
                        resultsHtml += `
                            <a href="#" class="list-group-item list-group-item-action search-result" data-user-id="${user.id}">
                                <div class="search-result-item">
                                    <img src="${user.avatar}" alt="${user.name}">
                                    <div class="user-info">
                                        <div class="user-name">${user.name}</div>
                                        <div class="user-email">${user.email}</div>
                                    </div>
                                </div>
                            </a>`;
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
                let userName = $(this).find('.user-name').text().trim();
                let userEmail = $(this).find('.user-email').text().trim();
                let memberCount = $('.member-item').length + 1;

                let memberItem = `
                    <div class="form-group member-item">
                        <label>Member Name</label>
                        <input type="text" class="form-control member-name" value="${userName}" readonly>
                        <input type="hidden" name="user_id" class="form-control member-id" value="${userId}">
                        <label for="role${memberCount}">Role</label>
                        <select name="role_in_project" class="form-control member-role" id="role${memberCount}">
                            <option value="READER">Reader</option>
                            <option value="TESTER">Tester</option>
                            <option value="DEVELOPER">Developer</option>
                            <option value="MANAGER">Manager</option>
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

            // Handle form submission
           // Handle form submission
           $('#addMemberForm').submit(function(e) {
                // Xóa các trường ẩn cũ nếu có
                $('.hidden-member-input').remove();

                // Thêm các trường ẩn mới cho từng thành viên
                let members = [];
                $('.member-item').each(function(index) {
                    let memberId = $(this).find('.member-id').val() || null;
                    let memberName = $(this).find('.member-name').val();
                    let memberRole = $(this).find('.member-role').val();

                    if (memberId || memberName) {
                        members.push({
                            user_id: memberId,
                            name: memberName,
                            role_in_project: memberRole
                        });

                        // Thêm các trường ẩn vào form
                        $('#addMemberForm').append(`
                            <input type="hidden" name="members[${index}][user_id]" value="${memberId}" class="hidden-member-input">
                            <input type="hidden" name="members[${index}][name]" value="${memberName}" class="hidden-member-input">
                            <input type="hidden" name="members[${index}][role_in_project]" value="${memberRole}" class="hidden-member-input">
                        `);
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
    <script>
        $(document).ready(function() {
            $('#closeConfirmationInput').on('input', function() {
                let inputValue = $(this).val();
                let confirmButton = $('#confirmCloseProjectButton');
                
                if (inputValue === 'CLOSE') {
                    confirmButton.prop('disabled', false);
                } else {
                    confirmButton.prop('disabled', true);
                }
            });

            $('#closeProjectForm').submit(function(e) {
                let inputValue = $('#closeConfirmationInput').val();
                
                if (inputValue !== 'CLOSE') {
                    e.preventDefault();
                    alert('Please type CLOSE to confirm.');
                }
            });
        });
    </script>
@endsection
