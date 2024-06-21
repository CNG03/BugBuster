@extends('layouts.app')

@section('title', 'User Management | Bug Buster')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('assets') }}/css/home/all.css" >
    <link rel="stylesheet" href="{{ asset('assets') }}/css/home/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/home/tracker.css" >
    <link rel="stylesheet" href="{{ asset('assets') }}/css/user_management/user-management.css" >

    <link rel="manifest" href="{{ asset('assets') }}/site.webmanifest">
@endsection

@section('content')

<div class="py-4 row d-flex justify-content-around h-50">

    <div class="first-row col-11 p-0">
        <div class="px-3 pt-2 w-100">
            <h4>User Management</h4>
        </div>
        <div class=" d-flex px-3 w-100 justify-content-between align-items-center">
   

            <form asp-controller="user" asp-route-showNoRole="@true" class="mr-2 d-flex align-items-center" >
                <div>
                    <span class="fw-medium pe-2">Sort by</span>
                </div>
                <select name="filter by" id="filter-select" class="rounded ">
                    <option value="">All</option>
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                </select>
            </form>

            <div class="research-input-wrapper d-flex justify-content-center align-items-center">
                <div class=" d-flex align-items-center align-items-center">
                    <input type="text" name="searchString" spellcheck="false" class="table-sorter-input pl-2 ml-1" placeholder="Reseach..." />
                    <button type="submit" class="x-btn blue mx-1" >
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
            <div class="ml-auto d-flex">
                    <button type="submit" data-toggle="modal" data-target="#user-form"  id="createUserBtn" class="x-btn green px-2" onclick="openAddUserForm()">
                        <span class="locked-btn-icon"> <i class="fa-solid fa-user-plus"></i></span>
                        <span class="locked-user-text"> Add a user </span>
                    </button>
            </div>
        </div>

        @include('shared.user-table')
        @include('shared.delete-modal')



    </div>

@include('user-management.user-form')
@include('user-management.modal-delete')

</div>




@include('layouts.manageRole')
@endsection

@section('custom-js')
    <script src="{{ asset('assets') }}/css/project_management/jquery.min.js"></script>
  <script src="{{ asset('assets') }}/css/project_management/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('assets') }}/js/user_management/user-management.js"></script>
@endsection
