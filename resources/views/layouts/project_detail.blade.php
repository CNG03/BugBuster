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
<div class="container mt-5">
    <div class="card">
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
                <h5 class="card-title">Members:</h5>
                <ul class="list-group" id="project-members">
                    <li class="list-group-item">Member 1</li>
                    <li class="list-group-item">Member 2</li>
                    <li class="list-group-item">Member 3</li>
                </ul>
            </div>
            <div class="mb-3">
                <h5 class="card-title">Is Completed:</h5>
                <p class="card-text" id="project-status">No</p>
            </div>
            <div class="mb-3">
                <h5 class="card-title">Tickets:</h5>
                <div class="list-group">
                    <a href="#allTickets" class="list-group-item list-group-item-action" data-toggle="collapse" aria-expanded="false" aria-controls="allTickets">All Tickets</a>
                    <div class="collapse" id="allTickets">
                        <a href="#" class="list-group-item list-group-item-action">View All Tickets</a>
                    </div>
                    <a href="#assignedTickets" class="list-group-item list-group-item-action" data-toggle="collapse" aria-expanded="false" aria-controls="assignedTickets">Assigned Tickets</a>
                    <div class="collapse" id="assignedTickets">
                        <a href="#" class="list-group-item list-group-item-action">View Assigned Tickets</a>
                    </div>
                    <a href="#createdTickets" class="list-group-item list-group-item-action" data-toggle="collapse" aria-expanded="false" aria-controls="createdTickets">Created Tickets</a>
                    <div class="collapse" id="createdTickets">
                        <a href="#" class="list-group-item list-group-item-action">View Created Tickets</a>
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
@endsection
