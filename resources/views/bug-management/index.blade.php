@extends('layouts.app')

@section('title', 'User Management | Bug Buster')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('assets') }}/css/home/all.css" >
    <link rel="stylesheet" href="{{ asset('assets') }}/css/home/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/home/tracker.css" >
    <link rel="manifest" href="{{ asset('assets') }}/site.webmanifest">
@endsection

@section('content')

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="p-4 pb-0 row d-flex justify-content-around h-50 position-relative ">
    <div class="first-row col-11 p-0">
        <div class=" d-flex px-3 py-3 w-100 justify-content-between align-items-center">
            <div>
                <h4>Bug Management</h4>
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
                <button id="addBugTypeBtn" class="btn btn-primary">
                    <i class="fa-solid fa-square-plus"></i> Add Bug Type
                </button>
            </div>
        </div>
        @include('shared.basic-table')
        <!-- @include('shared.pagination') -->
        @include('shared.add-basic-modal')
        @include('shared.delete-modal')
        

    </div>


    </div>
    
    
    @include('layouts.manageRole')




@endsection

@section('custom-js')
    {{-- <script src="{{ asset('assets') }}/css/project_management/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets') }}/css/project_management/jquery.min.js"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    {{-- <script src="{{ asset('assets') }}/js/bug-management/bug-management.js"></script> --}}
    {{-- <!-- <script src="{{ asset('assets') }}/js/bug-management/api.js" type="module"></script> --> --}}
    <script>
        function openEditForm(event, entity) {
            event.preventDefault();
            $('#editEntityId').val(entity.id);
            $('#editName').val(entity.name);
            $('#editDescription').val(entity.description);
            $('#editCurrentPage').val(new URLSearchParams(window.location.search).get('page') || 1);
            $('#editModal').modal('show');
        }

        function openDeleteForm(event, entityId) {
            event.preventDefault();
            $('#deleteEntityId').val(entityId);
            $('#deleteCurrentPage').val(new URLSearchParams(window.location.search).get('page') || 1);
            $('#deleteModal').modal('show');
        }

    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('addBugTypeBtn').addEventListener('click', function() {
                var addBugTypeModal = new bootstrap.Modal(document.getElementById('addBugTypeModal'));
                addBugTypeModal.show();
            });
        });
    </script>

    
@endsection
