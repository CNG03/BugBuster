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

        @include('shared.basic-table')
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
    </script>
</div>





@include('layouts.manageRole')

@endsection

@section('custom-js')
<script src="{{ asset('assets') }}/css/project_management/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets') }}/css/project_management/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/js/test_management/test-management.js"></script>
    
@endsection
