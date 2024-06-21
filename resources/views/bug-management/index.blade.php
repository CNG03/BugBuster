@extends('layouts.app')

@section('title', 'User Management | Bug Buster')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('assets') }}/css/home/all.css" >
    <link rel="stylesheet" href="{{ asset('assets') }}/css/home/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/home/tracker.css" >
    <link rel="manifest" href="{{ asset('assets') }}/site.webmanifest">
@endsection

@section('content')

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

                    <button class="x-btn blue fs-15" onclick="openAddBasicForm(event);">
                        <span class="pe-1 green-btn"> <i class="fa-solid fa-square-plus"></i></span>
                        <span class="locked-user-text"> Add Bug Type </span>
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
    <script src="{{ asset('assets') }}/css/project_management/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets') }}/css/project_management/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/js/bug-management/bug-management.js"></script>
    <!-- <script src="{{ asset('assets') }}/js/bug-management/api.js" type="module"></script> -->
    
@endsection
