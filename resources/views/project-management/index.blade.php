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
                      <a href="javascript:void(0);" class="text-dark h4">Project Management</a>
                    </li>
                  </ol>
                  <li id="accessToken" class="d-none">{{ $accessToken }}</li>
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
                  @include('shared.edit-multi-tab-form')
                  @include('shared.delete-modal')
                </div>
                <!-- End Row -->
              </div>

@endsection

@section('custom-js')
    <script src="{{ asset('assets') }}/css/project_management/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/css/project_management/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets') }}/js/project_management/project_management.js"></script>
@endsection
