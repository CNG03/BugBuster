@extends('layouts.app')

@section('title', 'Project Management | Bug Buster')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('assets') }}/css/home/bootstrap.min.css">
<!-- <link rel="stylesheet" href="{{ asset('assets') }}/css/home/tracker.css"> -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/project_management/feather.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/project_management/project_management.css">
@endsection

@section('content')

<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between mt-4 mb-3 page-header-breadcrumb">
                <nav>
                  <ol class="breadcrumb mb-0 mt-2 align-items-center">
                    <li class="breadcrumb-item">
                      @if (Session::get('user_role') == 'ADMIN')
                        <a href="javascript:void(0);" class="text-dark h4">Project</a>
                      @endif
                    </li>
                  </ol>
                </nav>
</div>
<div class="row row-sm">
                @include('project-management.navbar')
                <div class="col-lg-8 col-xl-9 position-relative">
                    <div class="d-flex justify-content-between">
                      <div class="fs-18 mb-3" id="section-title">  All Projects  </div>
                      <div class="col-sm-6 col-md-4 mb-3 col-xs-12">
                        <div class="input-group">
                          <input type="text" class="form-control text-truncate" id="search-input" placeholder="Search ..." aria-label="Search ...">
                          <button class="btn btn-primary" type="button" onclick="searchProject()">
                            <i class="fe fe-search" aria-hidden="true"></i>
                          </button>
                        </div>
                      </div>
                    </div>

                  @include('project-management.cell-table')
                  @include('shared.multi-tab-form')
                  <!-- Button to trigger modal -->
<!-- Button to trigger modal -->


<!-- Add Project Modal -->
<div class="modal fade" id="addProjectModal" tabindex="-1" aria-labelledby="addProjectModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="addProjectModalLabel">New Project</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form id="addProjectForm" action="{{ route('addProject') }}" method="POST">
                  @csrf
                  <div class="mb-3">
                      <label for="projectName" class="col-form-label">Name:</label>
                      <input type="text" class="form-control" id="projectName" name="name" required>
                  </div>
                  <div class="mb-3">
                      <label for="projectDescription" class="col-form-label">Description:</label>
                      <textarea class="form-control" id="projectDescription" name="description" required></textarea>
                  </div>
                  <div class="mb-3">
                      <label for="projectManager" class="col-form-label">Project Manager:</label>
                      <input type="search" class="form-control" id="projectManagerSearch" placeholder="Search for manager...">
                      <ul class="list-group" id="projectManagerList" style="max-height: 150px; overflow-y: auto;">
                          <!-- Manager search results will be appended here -->
                      </ul>
                  </div>
                  <div class="mb-3">
                      <label for="projectDevelopers" class="col-form-label">Developers:</label>
                      <input type="search" class="form-control" id="projectDeveloperSearch" placeholder="Search for developers...">
                      <ul class="list-group" id="projectDeveloperList" style="max-height: 150px; overflow-y: auto;">
                          <!-- Developer search results will be appended here -->
                      </ul>
                  </div>
                  <div class="mb-3">
                      <label for="projectTesters" class="col-form-label">Testers:</label>
                      <input type="search" class="form-control" id="projectTesterSearch" placeholder="Search for testers...">
                      <ul class="list-group" id="projectTesterList" style="max-height: 150px; overflow-y: auto;">
                          <!-- Tester search results will be appended here -->
                      </ul>
                  </div>
                  <div class="d-none messege-error-area">
                      <label id="message-error" class="text-danger mb-1">Please fill in all fields before submitting.</label>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Create</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $('#addProjectBtn').on('click', function() {
            var addProjectModal = new bootstrap.Modal(document.getElementById('addProjectModal'));
            addProjectModal.show();
        });

        // Implement search functionality for manager, developers, and testers
        $('#projectManagerSearch').on('input', function() {
            let query = $(this).val().toLowerCase();
            // Fetch and filter the manager list based on the query
        });

        $('#projectDeveloperSearch').on('input', function() {
            let query = $(this).val().toLowerCase();
            // Fetch and filter the developer list based on the query
        });

        $('#projectTesterSearch').on('input', function() {
            let query = $(this).val().toLowerCase();
            // Fetch and filter the tester list based on the query
        });

        // Mockup search results - Replace this part with AJAX request in real implementation
        let mockResults = [
            { id: 1, name: "John Doe" },
            { id: 2, name: "Jane Smith" },
            { id: 3, name: "Michael Johnson" }
        ];

        function populateList(listId, results) {
            let list = $('#' + listId);
            list.empty();
            results.forEach(user => {
                list.append('<li class="list-group-item" data-id="' + user.id + '">' + user.name + '</li>');
            });
        }

        $('#projectManagerSearch').on('input', function() {
            populateList('projectManagerList', mockResults);
        });

        $('#projectDeveloperSearch').on('input', function() {
            populateList('projectDeveloperList', mockResults);
        });

        $('#projectTesterSearch').on('input', function() {
            populateList('projectTesterList', mockResults);
        });

        // Example for handling selection from the search results
        $(document).on('click', '#projectManagerList li', function() {
            let selectedManager = $(this).text();
            $('#projectManagerSearch').val(selectedManager);
            $('#projectManagerList').empty();
        });
    });
</script>

                  @include('shared.delete-modal')
                </div>
                <!-- End Row -->
              </div>

@endsection

@section('custom-js')
    {{-- <script src="{{ asset('assets') }}/css/project_management/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/css/project_management/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets') }}/js/project_management/project_management.js"></script> --}}
@endsection
