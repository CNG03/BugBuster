@extends('layouts.app')

@section('title', 'User Management | Bug Buster')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('assets') }}/css/home/all.css" >
    <!-- <link rel="stylesheet" href="{{ asset('assets') }}/css/project_management/feather.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/project_management/project_management.css"> -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/home/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/home/tracker.css" >

    <link rel="manifest" href="{{ asset('assets') }}/site.webmanifest">
@endsection

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<div class="p-4 pb-0 row d-flex justify-content-around h-50 position-relative ">

    <div class="first-row col-11 p-0">
        <div class=" d-flex px-3 py-3 w-100 justify-content-between align-items-center">
            <div>
                <h4>Test Management</h4>
            </div>
            <div class="research-input-wrapper d-flex justify-content-center align-items-center">
                <div class="d-flex align-items-center align-items-center">
                    <input type="text" id="search-input" name="searchString" spellcheck="false" class="table-sorter-input pl-2 ml-1" placeholder="Reseach..." />
                    <button onclick="searchTable()" type="submit" class="x-btn blue mx-1" >
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>

            <div class="ml-auto d-flex">
                <button class="x-btn blue fs-15" data-bs-toggle="modal" data-bs-target="#add-basic-modal">
                    <span class="pe-1 green-btn"> <i class="fa-solid fa-square-plus"></i></span>
                    <span class="locked-user-text"> Add Test </span>
                </button>
            </div>
        </div>

        <div class="table-responsive w-100 fs-16 overflow-auto" style="height: 400px;">
            <table class="table ticket-list-table table-hover">
                <caption class="caption-table">
                    Showing {{ $entities['meta']['from'] }} to {{ $entities['meta']['to'] }} of {{ $entities['meta']['total'] }} entries
                </caption>
                <thead>
                    <tr>
                        <th scope="col" class="text-center" style="max-width: 80px">#</th>
                        <th scope="col" colspan="2" style="width: 80px">Name</th>
                        <th scope="col" colspan="3">Description</th>
                        <th scope="col" style="width: 250px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($entities['data'] as $index => $entity)
                    <tr data-value="{{ $entity['id']}}">
                        <th scope="row" class="text-center id">{{ ($entities['meta']['current_page'] - 1) * $entities['meta']['per_page'] + $index + 1 }}</th>
                        <td colspan="2" class="fw-normal name" style="width: 100px">{{ $entity['name']}}</td>
                        <td colspan="3" class="fw-normal description" style="max-width: 200px">{{ $entity['description']}}</td>
                        <td colspan="1" class="d-float" style="width: 250px;display: float;">
                            <a onclick="openEditForm(event, {{ json_encode($entity) }});" href="javascript:void(0);" class="m-2 btn btn-sm btn-success d-flex align-items-center justify-content-center w-40" style="float: left;">
                                <i class="fa-regular fa-pen-to-square pe-1"></i>
                                Edit
                            </a>
                            <a onclick="openDeleteForm(event, {{ $entity['id'] }});" href="javascript:void(0);" class="m-2 btn btn-sm btn-danger d-flex align-items-center justify-content-center w-40" style="float: left;">
                                <i class="fa-solid fa-delete-left pe-1"></i>
                                Delete
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="d-flex justify-content-between">
            <div>
                <nav>
                    <ul class="pagination">
                        @if ($entities['links']['prev'])
                        <li class="page-item">
                            <a class="page-link" href="{{ url()->current() }}?page={{ $entities['meta']['current_page'] - 1 }}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        @endif
                        @for ($i = 1; $i <= $entities['meta']['last_page']; $i++)
                        <li class="page-item {{ $entities['meta']['current_page'] == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ url()->current() }}?page={{ $i }}">{{ $i }}</a>
                        </li>
                        @endfor
                        @if ($entities['links']['next'])
                        <li class="page-item">
                            <a class="page-link" href="{{ url()->current() }}?page={{ $entities['meta']['current_page'] + 1 }}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
        
        <!-- Add Test Type Modal -->
        <div class="modal fade" id="addBugTypeModal" tabindex="-1" aria-labelledby="addBugTypeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addBugTypeModalLabel">New Test Type</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addBugTypeForm" action="{{ route('addTestType') }}" method="POST">
                            @csrf
                            <input type="hidden" name="current_page" value="{{ request()->get('page', 1) }}">
                            <input type="hidden" name="per_page" value="{{ request()->get('per_page', 10) }}">
                            <div class="mb-3">
                                <label for="bugTypeName" class="col-form-label">Name:</label>
                                <input type="text" class="form-control" id="bugTypeName" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="bugTypeDescription" class="col-form-label">Description:</label>
                                <textarea class="form-control" id="bugTypeDescription" name="description" required></textarea>
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
        
        
        <!-- Edit Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editModalLabel">Edit Test Type</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editForm" action="{{ route('editEntity') }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="id" id="editEntityId">
                            <input type="hidden" name="current_page" id="editCurrentPage" value="{{ request()->query('page', 1) }}">
                            <div class="mb-3">
                                <label for="editName" class="col-form-label">Name:</label>
                                <input type="text" class="form-control" id="editName" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="editDescription" class="col-form-label">Description:</label>
                                <textarea class="form-control" id="editDescription" name="description" required></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Delete Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deleteModalLabel">Delete Test Type</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this test type?
                        <form id="deleteForm" action="{{ route('deleteEntity') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" id="deleteEntityId">
                            <input type="hidden" name="current_page" id="deleteCurrentPage" value="{{ request()->query('page', 1) }}">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>



    @include('shared.add-basic-modal')
    @include('shared.delete-modal')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('addTestTypeForm').addEventListener('submit', function(event) {
                const name = document.getElementById('testName').value.trim();
                const description = document.getElementById('testDescription').value.trim();

                if (!name || !description) {
                    event.preventDefault();
                    document.querySelector('.messege-error-area').classList.remove('d-none');
                } else {
                    document.querySelector('.messege-error-area').classList.add('d-none');
                }
            });
        });
        function openEditForm(event, entity) {
            event.preventDefault();
            $('#editEntityId').val(entity.id);
            $('#editName').val(entity.name);
            $('#editDescription').val(entity.description);
            $('#editModal').modal('show');
        }

        function openDeleteForm(event, entityId) {
            event.preventDefault();
            $('#deleteEntityId').val(entityId);
            $('#deleteModal').modal('show');
        }

    </script>
</div>





@include('layouts.manageRole')

@endsection

@section('custom-js')
<script src="{{ asset('assets') }}/css/project_management/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets') }}/css/project_management/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/js/test_management/test-management.js"></script>
    
@endsection
