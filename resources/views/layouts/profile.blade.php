@extends('layouts.app')

@section('title', 'My Profile | Bug Buster')

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
<div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
    <nav>
        <ol class="breadcrumb mb-0 align-items-center">
            <li class="breadcrumb-item"><a href="javascript:void(0);" class="text-dark h4">Pages</a></li>
            <li class="breadcrumb-item active text-muted fs-13 fw-normal" aria-current="page">Profile</li>
        </ol>
    </nav>
</div>
<div class="row row-sm">
    <div class="col-lg-12 col-xl-4">
        <div class="card mg-b-20">
            <div class="card-body p-0">
                <div class="p-3">
                    <div class="avatar avatar-xxl mb-3"><img alt="" class="rounded-circle" src="{{Session::get('user_avatar')}}"></a></div>
                    <div class="d-flex justify-content-between mg-b-20">
                        <div class="">
                            <h5 class="main-profile-name">{{Session::get('user_name')}}</h5>
                            <p class="main-profile-name-text">Web Designer</p>
                        </div>
                        <div class="btn-list">
                            <button type="button" class="btn btn-primary btn-sm mg-sm-b-0-f mb-xl-2"><i class="fa fa-rss me-2"></i> Follow</button>
                            <button type="button" class="btn btn-primary btn-sm mg-sm-b-0-f mb-xl-2"><i class="fa fa-envelope me-2"></i> E-mail</button>
                        </div>
                    </div>
                    <h6>Bio</h6>
                    <div class="main-profile-bio">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor <a href="" class="text-primary">More</a>
                    </div>
                    <!-- main-profile-bio -->
                    <div class="main-profile-work-list">
                        <div class="media">
                            <div class="media-logo bg-success-transparent text-success"><i class="fa-brands fa-whatsapp"></i></div>
                            <div class="media-body">
                                <h6>Web Designer at <a href="">Bug Buster</a></h6>
                                <span>2018 - present</span>
                                <p>Past Work: Phenikaa, Inc.</p>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-logo bg-primary-transparent text-primary"><i class="fa-brands fa-buffer"></i></div>
                            <div class="media-body">
                                <h6>Studied at <a href="">Phenikaa University</a></h6>
                                <span>2018-2022</span>
                                <p>Graduation: Bachelor of Science in Computer Science</p>
                            </div>
                        </div>
                    </div>
                    <!-- main-profile-work-list -->
                    <hr class="mg-y-30" />
                    <label class="main-content-label fs-13 mg-b-20">Social</label>
                    <div class="main-profile-social-list">
                        <div class="media">
                            <div class="media-icon bg-primary-transparent text-primary"><i class="fa-brands fa-github"></i></div>
                            <div class="media-body">
                                <h6 class="mb-0 text-dark">Github</h6>
                                <a href="https://github.com/CNG03/BugBuster" class="text-primary">github.com/bugbuster</a>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-icon bg-success-transparent text-success"><i class="fa-brands fa-x-twitter"></i></div>
                            <div class="media-body">
                                <h6 class="mb-0 text-dark">Twitter</h6>
                                <a href="" class="text-primary">twitter.com/bugbuster.me</a>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-icon bg-info-transparent text-info"><i class="fa-brands fa-linkedin"></i></div>
                            <div class="media-body">
                                <h6 class="mb-0 text-dark">Linkedin</h6>
                                <a href="" class="text-primary">linkedin.com/in/bugbuster</a>
                            </div>
                        </div>
                    </div>
                    <!-- main-profile-social-list -->
                </div>
            </div>
        </div>
        <div class="card mg-b-20">
            <div class="card-body">
                <div class="main-content-label fs-13 mg-b-25">Conatct</div>
                <div class="main-profile-contact-list">
                    <div class="media align-items-center">
                        <div class="media-icon bg-primary-transparent text-primary"><i class="fa-solid fa-phone"></i></div>
                        <div class="media-body">
                            <h6 class="mb-1">Mobile</h6>
                            <span> +84 56 909 2745</span>
                        </div>
                    </div>
                    <div class="media align-items-center">
                        <div class="media-icon bg-success-transparent text-success"><i class="fa-brands fa-slack"></i></div>
                        <div class="media-body">
                            <h6 class="mb-1">Slack</h6>
                            <span> @bugbuster.w </span>
                        </div>
                    </div>
                    <div class="media align-items-center">
                        <div class="media-icon bg-info-transparent text-info"><i class="fa-solid fa-location-dot"></i></div>
                        <div class="media-body">
                            <h6 class="mb-1">Current Address</h6>
                            <span>Ha Dong, Ha Noi</span>
                        </div>
                    </div>
                </div>
                <!-- main-profile-contact-list -->
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-xl-8">
        <div class="main-content-body main-content-body-profile">
            <nav class="nav main-nav-line card mb-4 flex-nowrap" role="tablist">
                <a class="nav-link active" data-bs-toggle="tab" aria-selected="true" role="tab" href="#tab12">Edit Profile</a>
                <a class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab" href="#tab15" tabindex="-1">Account Settings</a>
            </nav>
            <!-- main-profile-body -->
            <div class="main-profile-body p-0">
                <div class="tab-content">
                    <div class="tab-pane border-0 active show" role="tabpanel" id="tab12">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-4 main-content-label">Personal Information</div>
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label class="form-label">Language</label></div>
                                            <div class="col-md-9">
                                                <select class="form-control select2">
                                                    <option>Vietnam</option>
                                                    <option>Japan</option>
                                                    <option>English</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2 main-content-label">Name</div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label class="form-label">User Name</label></div>
                                            <div class="col-md-9"><input type="text" class="form-control" placeholder="User Name" value="Elizabeth Jane" /></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label class="form-label">First Name</label></div>
                                            <div class="col-md-9"><input type="text" class="form-control" placeholder="First Name" value="Elizabeth" /></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label class="form-label">last Name</label></div>
                                            <div class="col-md-9"><input type="text" class="form-control" placeholder="Last Name" value="Jane" /></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label class="form-label">Nick Name</label></div>
                                            <div class="col-md-9"><input type="text" class="form-control" placeholder="Nick Name" value="Mít" /></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label class="form-label">Designation</label></div>
                                            <div class="col-md-9"><input type="text" class="form-control" placeholder="Designation" value="Web Designer" /></div>
                                        </div>
                                    </div>
                                    <div class="mb-2 main-content-label">Contact Info</div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label">Email<i>(required)</i></label>
                                            </div>
                                            <div class="col-md-9"><input type="text" class="form-control" placeholder="Email" value="info@redash.in" /></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label class="form-label">Phone</label></div>
                                            <div class="col-md-9"><input type="text" class="form-control" placeholder="phone number" value="+84 56 909 2745" /></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label class="form-label">Address</label></div>
                                            <div class="col-md-9"><textarea class="form-control" name="example-textarea-input" rows="2" placeholder="Address">Ha Dong, Ha Noi, Viet Nam</textarea></div>
                                        </div>
                                    </div>
                                    <div class="mb-2 main-content-label">Social Info</div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label class="form-label">Twitter</label></div>
                                            <div class="col-md-9"><input type="text" class="form-control" placeholder="twitter" value="twitter.com/bugbuster.me" /></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label class="form-label">Facebook</label></div>
                                            <div class="col-md-9"><input type="text" class="form-control" placeholder="facebook" value="https://www.facebook.com/bugbuster" /></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label class="form-label">Google+</label></div>
                                            <div class="col-md-9"><input type="text" class="form-control" placeholder="google" value="bugbuster.com" /></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label class="form-label">Linked in</label></div>
                                            <div class="col-md-9"><input type="text" class="form-control" placeholder="linkedin" value="linkedin.com/in/bugbuster" /></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label class="form-label">Github</label></div>
                                            <div class="col-md-9"><input type="text" class="form-control" placeholder="github" value="github.com/bugbusters" /></div>
                                        </div>
                                    </div>
                                    <div class="mb-2 main-content-label">About Yourself</div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3"><label class="form-label">Biographical Info</label></div>
                                            <div class="col-md-9">
                                                <textarea class="form-control" name="example-textarea-input" rows="4" placeholder="">Who I am
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer"><button class="btn btn-primary waves-effect waves-light">Update Profile</button></div>
                        </div>
                    </div>
                    <div class="tab-pane border-0" role="tabpanel" id="tab15">
                        <div class="card">
                            <div class="card-body">
                                <div class="main-content-label mg-b-5">Account</div>
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                        <!-- <div class="pd-md-20 border d-block"> -->
                                        <div class="form-group"><label class="main-content-label fs-11 fw-semibold text-muted">User Name</label> <input class="form-control" required="" type="text" /></div>
                                        <div class="mb-3 main-content-label">Secuirity Settings</div>
                                        <div class="form-group mb-0">
                                            <div class="row row-sm align-items-center">
                                                <div class="col-md-3"><label class="form-label my-0 text-muted">Login Verification</label></div>
                                                <div class="col-md-9"><a class="text-muted" href="javascript:void(0);">Settup Verification</a></div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <div class="row row-sm align-items-center">
                                                <div class="col-md-3"><label class="form-label text-muted">Password Verification</label></div>
                                                <div class="col-md-9">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault16" checked="" />
                                                        <label class="form-check-label text-muted" for="flexCheckDefault16"> Require Personal Details </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="mb-3 main-content-label">Notifications</div>
                                            <div class="form-group mb-0">
                                                <div class="row row-sm">
                                                    <div class="col-md-3"><label class="form-label">Configure Notifications</label></div>
                                                    <div class="col-md-9">
                                                        <div class="form-check form-check-md form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="switch-md" checked="" /> <label class="form-check-label" for="switch-md">Allow all notifications</label>
                                                        </div>
                                                        <div class="form-check form-check-md form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="switch-md1" /> <label class="form-check-label" for="switch-md1">Disable all notifications</label>
                                                        </div>
                                                        <div class="form-check form-check-md form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="switch-md2" checked="" /> <label class="form-check-label" for="switch-md2">Notification Sounds</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn-list"><button class="btn btn-primary">Deactivate Account</button> <button class="btn btn-danger">Change password</button></div>
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main-profile-body -->
        </div>
    </div>
</div>
@endsection

@section('custom-js')
    <script src="{{ asset('js/home.js') }}"></script>
@endsection
