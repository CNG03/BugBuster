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
            <li class="breadcrumb-item"><a href="#">Project</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail</li>
        </ol>
    </nav>
</div>
<div class="container mt-2">
    <div class="row">
        <!-- Left Sidebar: Project Details -->
        <div class="col-md-4 sidebar">
            <div class="card mb-4">
                <div class="card-header">
                    <h2>Project Detail</h2>
                    <button class="btn btn-primary float-right">Edit Project</button>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <h5 class="card-title">Name:</h5>
                        <p class="card-text" id="project-name">Project Name</p>
                    </div>
                    <div class="mb-3">
                        <h5 class="card-title">Description:</h5>
                        <p class="card-text" id="project-description">This is a detailed description of the project.</p>
                    </div>
                    <div class="mb-3">
                        <h5 class="card-title">Author:</h5>
                        <p class="card-text" id="project-author">Author Name</p>
                    </div>
                    <div class="mb-3">
                        <h5 class="card-title">Create at:</h5>
                        <p class="card-text" id="project-author">Author Name</p>
                    </div>
                    <div class="mb-3">
                        <h5 class="card-title">Is Completed:</h5>
                        <p class="card-text" id="project-status">No</p>
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
                                    <li class="list-group-item">Member 1</li>
                                    <li class="list-group-item">Member 2</li>
                                    <li class="list-group-item">Member 3</li>
                                </ul>
                            </div>
                            <a href="#" class="list-group-item list-group-item-action" id="addMemberLink">Add Member</a>
                            <div id="addMemberContent" class="hidden-section sub-section">
                                <form class="mt-2">
                                    <div class="form-group">
                                        <label for="newMember">Member Name</label>
                                        <input type="text" class="form-control" id="newMember">
                                    </div>
                                    <button type="submit" class="btn btn-success">Add Member</button>
                                </form>
                            </div>
                            <a href="#" class="list-group-item list-group-item-action" id="updateMemberRoleLink">Update Member Role</a>
                            <div id="updateMemberRoleContent" class="hidden-section sub-section">
                                <form class="mt-2">
                                    <div class="form-group">
                                        <label for="memberSelect">Select Member</label>
                                        <select class="form-control" id="memberSelect">
                                            <option>Member 1</option>
                                            <option>Member 2</option>
                                            <option>Member 3</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="roleSelect">Select Role</label>
                                        <select class="form-control" id="roleSelect">
                                            <option>Developer</option>
                                            <option>Tester</option>
                                            <option>Manager</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Role</button>
                                </form>
                            </div>
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
                            <a href="#" class="list-group-item list-group-item-action" id="allTicketsLink">All Tickets</a>
                            <div id="allTicketsContent" class="hidden-section sub-section">
                                <p>All Tickets Content</p>
                            </div>
                            <a href="#" class="list-group-item list-group-item-action" id="assignedTicketsLink">Assigned Tickets</a>
                            <div id="assignedTicketsContent" class="hidden-section sub-section">
                                <p>Assigned Tickets Content</p>
                            </div>
                            <a href="#" class="list-group-item list-group-item-action" id="createdTicketsLink">Created Tickets</a>
                            <div id="createdTicketsContent" class="hidden-section sub-section">
                                <p>Created Tickets Content</p>
                            </div>
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
        });
    </script>
@endsection
