<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Bug Buster')</title>
    <script src="{{asset('assets')}}/js/home/choice.min.js"></script>
    <script src="{{asset('assets')}}/js/home/main.js"></script>
    <link rel="stylesheet" href="{{asset('assets')}}/css/home/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/home/style.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/home/simplebar.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/home/choice.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="{{asset('assets')}}/img/logo2.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    {{-- Start RightSlidebar --}}
    <div class="offcanvas offcanvas-end" tabindex="-1" id="rightsidebar-canvas" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom bg-light">
            <h5 class="offcanvas-title text-default fw-semibold" id="offcanvasRightLabel1">NOTIFICATIONS</h5>
            <button type="button" class="btn-close text-primary" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0">
            <div class="tabs-menu">
                <!-- Tabs -->
                <ul class="nav panel-tabs" role="tablist">
                    <li class=""><a href="#tab" class="active show" data-bs-toggle="tab" aria-selected="true" role="tab">Profile</a></li>
                    <li class=""><a href="#tab1" data-bs-toggle="tab" class="" aria-selected="false" tabindex="-1" role="tab">Friends</a></li>
                    <li><a href="#tab2" data-bs-toggle="tab" class="" aria-selected="false" tabindex="-1" role="tab">Activity</a></li>
                    <li><a href="#tab3" data-bs-toggle="tab" class="" aria-selected="false" tabindex="-1" role="tab">Todo</a></li>
                </ul>
            </div>
            <div class="panel-body tabs-menu-body side-tab-body p-0 border-0">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab" role="tabpanel">
                        <div class="card-body p-0">
                            <div class="header-user text-center mt-3">
                                <span class="avatar avatar-xxl rounded-circle mx-auto"><img src="https://cdn.24h.com.vn/upload/3-2022/images/2022-08-19/Gai-xinh-ngay-tho-lo-qua-khu-277585438_4600347833405176_193249803126218059_n-1660905398-70-width1754height2048.jpg" alt="Profile-img" class="avatar avatar-xxl rounded-circle" /></span>
                                <div class="text-center fw-semibold user mt-2 h6 mb-0">Elizabeth Jane</div>
                                <span class="text-muted">App Developer</span>
                            </div>
                            <div class="card-body p-3">
                                <p class="fw-semibold mb-1">Offline/Online</p>
                                <div class="choices" data-type="select-one" tabindex="0" role="listbox" aria-haspopup="true" aria-expanded="false">
                                    <div class="choices__inner">
                                        <select class="form-control choices__input" data-trigger="" name="choices-single-default" id="choices-single-default1" hidden="" tabindex="-1" data-choice="active">
                                            <option value="Choice 1" data-custom-properties="[object Object]">Online</option>
                                        </select>
                                        <div class="choices__list choices__list--single">
                                            <div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="Choice 1" data-custom-properties="[object Object]" aria-selected="true">Online</div>
                                        </div>
                                    </div>
                                    <div class="choices__list choices__list--dropdown" aria-expanded="false">
                                        <div class="choices__list" role="listbox">
                                            <div
                                                id="choices--choices-single-default1-item-choice-1"
                                                class="choices__item choices__item--choice choices__item--selectable is-highlighted"
                                                role="option"
                                                data-choice=""
                                                data-id="1"
                                                data-value="Choice 2"
                                                data-select-text="Press to select"
                                                data-choice-selectable=""
                                                aria-selected="true"
                                            >
                                                Offline
                                            </div>
                                            <div
                                                id="choices--choices-single-default1-item-choice-2"
                                                class="choices__item choices__item--choice is-selected choices__item--selectable"
                                                role="option"
                                                data-choice=""
                                                data-id="2"
                                                data-value="Choice 1"
                                                data-select-text="Press to select"
                                                data-choice-selectable=""
                                            >
                                                Online
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="fw-semibold mb-1">Website</p>
                                <div class="choices" data-type="select-one" tabindex="0" role="listbox" aria-haspopup="true" aria-expanded="false">
                                    <div class="choices__inner">
                                        <select class="form-control choices__input" data-trigger="" name="choices-single-default" id="choices-single-default2" hidden="" tabindex="-1" data-choice="active">
                                            <option value="Choice 1" data-custom-properties="[object Object]">Spruko.com</option>
                                        </select>
                                        <div class="choices__list choices__list--single">
                                            <div class="choices__item choices__item--selectable" data-item="" data-id="1" data-value="Choice 1" data-custom-properties="[object Object]" aria-selected="true">Spruko.com</div>
                                        </div>
                                    </div>
                                    <div class="choices__list choices__list--dropdown" aria-expanded="false">
                                        <div class="choices__list" role="listbox">
                                            <div
                                                id="choices--choices-single-default2-item-choice-1"
                                                class="choices__item choices__item--choice is-selected choices__item--selectable is-highlighted"
                                                role="option"
                                                data-choice=""
                                                data-id="1"
                                                data-value="Choice 1"
                                                data-select-text="Press to select"
                                                data-choice-selectable=""
                                                aria-selected="true"
                                            >
                                                Spruko.com
                                            </div>
                                            <div
                                                id="choices--choices-single-default2-item-choice-2"
                                                class="choices__item choices__item--choice choices__item--selectable"
                                                role="option"
                                                data-choice=""
                                                data-id="2"
                                                data-value="Choice 4"
                                                data-select-text="Press to select"
                                                data-choice-selectable=""
                                            >
                                                sprukoinfo.com
                                            </div>
                                            <div
                                                id="choices--choices-single-default2-item-choice-3"
                                                class="choices__item choices__item--choice choices__item--selectable"
                                                role="option"
                                                data-choice=""
                                                data-id="3"
                                                data-value="Choice 2"
                                                data-select-text="Press to select"
                                                data-choice-selectable=""
                                            >
                                                sprukosoft.com
                                            </div>
                                            <div
                                                id="choices--choices-single-default2-item-choice-4"
                                                class="choices__item choices__item--choice choices__item--selectable"
                                                role="option"
                                                data-choice=""
                                                data-id="4"
                                                data-value="Choice 5"
                                                data-select-text="Press to select"
                                                data-choice-selectable=""
                                            >
                                                sprukotech.com
                                            </div>
                                            <div
                                                id="choices--choices-single-default2-item-choice-5"
                                                class="choices__item choices__item--choice choices__item--selectable"
                                                role="option"
                                                data-choice=""
                                                data-id="5"
                                                data-value="Choice 3"
                                                data-select-text="Press to select"
                                                data-choice-selectable=""
                                            >
                                                sprukotechnologies.com
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="dropdown-item border-top" href="profile.html"> <i class="dropdown-icon fe fe-edit me-2 float-start"></i> Edit Profile </a>
                            <a class="dropdown-item border-top" href="about.html"> <i class="dropdown-icon fe fe-user me-2 float-start"></i> Spruko technologies </a>
                            <a class="dropdown-item border-top" href="settings.html"> <i class="dropdown-icon fe fe-unlock me-2 float-start"></i> Add Another Account </a>
                            <a class="dropdown-item border-top" href="chat.html"> <i class="dropdown-icon fe fe-mail me-2 float-start"></i> Message </a>
                            <a class="dropdown-item border-top" href="faq.html"> <i class="dropdown-icon fe fe-help-circle me-2 float-start"></i> Need Help? </a>
                            <div class="card-body border-top p-3">
                                <h6 class="mb-0">Followers</h6>
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <div class="avatar-list-stacked">
                                            <span class="avatar avatar-rounded"> <img src="../assets/images/users/3.jpg" alt="img" /> </span> <span class="avatar avatar-rounded"> <img src="../assets/images/users/6.jpg" alt="img" /> </span>
                                            <span class="avatar avatar-rounded"> <img src="../assets/images/users/3.jpg" alt="img" /> </span> <span class="avatar avatar-rounded"> <img src="../assets/images/users/4.jpg" alt="img" /> </span>
                                            <span class="avatar avatar-rounded"> <img src="../assets/images/users/9.jpg" alt="img" /> </span> <a class="avatar bg-primary avatar-rounded text-fixed-white" href="javascript:void(0);"> +34 </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border-top border-bottom p-3 mt-5">
                                <div class="row">
                                    <div class="col-4 text-center">
                                        <a class="" href="mail.html"><i class="dropdown-icon mdi mdi-message-outline fs-20 m-0 leading-tight text-primary"></i></a>
                                        <div>Inbox</div>
                                    </div>
                                    <div class="col-4 text-center">
                                        <a class="" href="settings.html"><i class="dropdown-icon mdi mdi-tune fs-20 m-0 leading-tight text-primary"></i></a>
                                        <div>Settings</div>
                                    </div>
                                    <div class="col-4 text-center">
                                        <a class="" href="signin.html"><i class="dropdown-icon mdi mdi-logout-variant fs-20 m-0 leading-tight text-primary"></i></a>
                                        <div>Sign out</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab1" role="tabpanel">
                        <div class="chat">
                            <div class="contacts_card">
                                <div class="input-group mb-0 p-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control text-truncate" placeholder="Search ..." aria-label="Search ..." />
                                        <button class="btn btn-primary" type="button"><i class="fe fe-search" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                                <ul class="contacts mb-0 list-unstyled">
                                    <li class="active">
                                        <div class="d-flex bd-highlight w-100">
                                            <div class="img_cont"><img src="../assets/images/users/12.jpg" class="rounded-circle user_img" alt="img" /> <span class="online_icon"></span></div>
                                            <div class="user_info">
                                                <h5 class="my-1">Maryam Naz</h5>
                                                <small class="text-muted">is online</small>
                                            </div>
                                            <div class="ms-auto my-auto"><small>01-02-2019</small></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex bd-highlight w-100">
                                            <div class="img_cont"><img src="../assets/images/users/2.jpg" class="rounded-circle user_img" alt="img" /> <span class="online_icon"></span></div>
                                            <div class="user_info">
                                                <h5 class="my-1">Sahar Darya</h5>
                                                <small class="text-muted">left 7 mins ago</small>
                                            </div>
                                            <div class="ms-auto my-auto"><small>01-02-2019</small></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex bd-highlight w-100">
                                            <div class="img_cont"><img src="https://cdn.24h.com.vn/upload/3-2022/images/2022-08-19/Gai-xinh-ngay-tho-lo-qua-khu-277585438_4600347833405176_193249803126218059_n-1660905398-70-width1754height2048.jpg" class="rounded-circle user_img" alt="img" /> <span class="online_icon"></span></div>
                                            <div class="user_info">
                                                <h5 class="my-1">Maryam Naz</h5>
                                                <small class="text-muted">online</small>
                                            </div>
                                            <div class="ms-auto my-auto"><small>01-02-2019</small></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex bd-highlight w-100">
                                            <div class="img_cont"><img src="../assets/images/users/7.jpg" class="rounded-circle user_img" alt="img" /> <span class="online_icon"></span></div>
                                            <div class="user_info">
                                                <h5 class="my-1">Yolduz Rafi</h5>
                                                <small class="text-muted">online</small>
                                            </div>
                                            <div class="ms-auto my-auto"><small>02-02-2019</small></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex bd-highlight w-100">
                                            <div class="img_cont"><img src="../assets/images/users/8.jpg" class="rounded-circle user_img" alt="img" /> <span class="online_icon"></span></div>
                                            <div class="user_info">
                                                <h5 class="my-1">Nargis Hawa</h5>
                                                <small class="text-muted">30 mins ago</small>
                                            </div>
                                            <div class="ms-auto my-auto"><small>02-02-2019</small></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex bd-highlight w-100">
                                            <div class="img_cont"><img src="../assets/images/users/3.jpg" class="rounded-circle user_img" alt="img" /> <span class="online_icon"></span></div>
                                            <div class="user_info">
                                                <h5 class="my-1">Khadija Mehr</h5>
                                                <small class="text-muted">50 mins ago</small>
                                            </div>
                                            <div class="ms-auto my-auto"><small>03-02-2019</small></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex bd-highlight w-100">
                                            <div class="img_cont"><img src="../assets/images/users/14.jpg" class="rounded-circle user_img" alt="img" /> <span class="online_icon"></span></div>
                                            <div class="user_info">
                                                <h5 class="my-1">Petey Cruiser</h5>
                                                <small class="text-muted">1hr ago</small>
                                            </div>
                                            <div class="ms-auto my-auto"><small>03-02-2019</small></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex bd-highlight w-100">
                                            <div class="img_cont"><img src="../assets/images/users/11.jpg" class="rounded-circle user_img" alt="img" /></div>
                                            <div class="user_info">
                                                <h5 class="my-1">Khadija Mehr</h5>
                                                <small class="text-muted">2hr ago</small>
                                            </div>
                                            <div class="ms-auto my-auto"><small>03-02-2019</small></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab2" role="tabpanel">
                        <div class="list d-flex align-items-center border-bottom p-3 mt-3">
                            <div class=""><span class="avatar bg-primary rounded-circle avatar-md">CH</span></div>
                            <div class="wrapper w-100 ms-3">
                                <p class="mb-0 d-flex"><b>New Websites is Created</b></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-clock text-muted me-1"></i> <small class="text-muted ms-auto">30 mins ago</small>
                                        <p class="mb-0"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list d-flex align-items-center border-bottom p-3">
                            <div class=""><span class="avatar bg-danger rounded-circle avatar-md">N</span></div>
                            <div class="wrapper w-100 ms-3">
                                <p class="mb-0 d-flex"><b>Prepare For the Next Project</b></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-clock text-muted me-1"></i> <small class="text-muted ms-auto">2 hours ago</small>
                                        <p class="mb-0"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list d-flex align-items-center border-bottom p-3">
                            <div class=""><span class="avatar bg-info rounded-circle avatar-md">S</span></div>
                            <div class="wrapper w-100 ms-3">
                                <p class="mb-0 d-flex"><b>Decide the live Discussion Time</b></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-clock text-muted me-1"></i> <small class="text-muted ms-auto">3 hours ago</small>
                                        <p class="mb-0"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list d-flex align-items-center border-bottom p-3">
                            <div class=""><span class="avatar bg-warning rounded-circle avatar-md">K</span></div>
                            <div class="wrapper w-100 ms-3">
                                <p class="mb-0 d-flex"><b>Team Review meeting</b></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-clock text-muted me-1"></i> <small class="text-muted ms-auto">4 hours ago</small>
                                        <p class="mb-0"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list d-flex align-items-center border-bottom p-3">
                            <div class=""><span class="avatar bg-success rounded-circle avatar-md">R</span></div>
                            <div class="wrapper w-100 ms-3">
                                <p class="mb-0 d-flex"><b>Prepare for Presentation</b></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-clock text-muted me-1"></i> <small class="text-muted ms-auto">1 days ago</small>
                                        <p class="mb-0"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list d-flex align-items-center border-bottom p-3">
                            <div class=""><span class="avatar bg-pink rounded-circle avatar-md">MS</span></div>
                            <div class="wrapper w-100 ms-3">
                                <p class="mb-0 d-flex"><b>Prepare for Presentation</b></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-clock text-muted me-1"></i> <small class="text-muted ms-auto">1 days ago</small>
                                        <p class="mb-0"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list d-flex align-items-center border-bottom p-3">
                            <div class=""><span class="avatar bg-purple rounded-circle avatar-md">L</span></div>
                            <div class="wrapper w-100 ms-3">
                                <p class="mb-0 d-flex"><b>Prepare for Presentation</b></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-clock text-muted me-1"></i> <small class="text-muted ms-auto">45 mintues ago</small>
                                        <p class="mb-0"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list d-flex align-items-center border-bottom p-3">
                            <div class=""><span class="avatar bg-primary rounded-circle avatar-md">CH</span></div>
                            <div class="wrapper w-100 ms-3">
                                <p class="mb-0 d-flex"><b>New Websites is Created</b></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-clock text-muted me-1"></i> <small class="text-muted ms-auto">30 mins ago</small>
                                        <p class="mb-0"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list d-flex align-items-center p-3">
                            <div class=""><span class="avatar bg-secondary rounded-circle avatar-md">U</span></div>
                            <div class="wrapper w-100 ms-3">
                                <p class="mb-0 d-flex"><b>Prepare for Presentation</b></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-clock text-muted me-1"></i> <small class="text-muted ms-auto">2 days ago</small>
                                        <p class="mb-0"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab3" role="tabpanel">
                        <div class="mt-3">
                            <div class="d-flex p-3">
                                <div class="form-check"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1" checked="" /> <label class="form-check-label" for="flexCheckDefault1"> Do Even More... </label></div>
                                <span class="ms-auto">
                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-title="Edit" data-bs-placement="top"><i class="si si-pencil text-primary me-2"></i></a>
                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-title="Delete" data-bs-placement="top"><i class="si si-trash text-danger me-2"></i></a>
                                </span>
                            </div>
                            <div class="d-flex p-3 border-top">
                                <div class="form-check"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2" checked="" /> <label class="form-check-label" for="flexCheckDefault2"> Find an idea. </label></div>
                                <span class="ms-auto">
                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit" data-bs-original-title="Edit"><i class="si si-pencil text-primary me-2"></i></a>
                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete"><i class="si si-trash text-danger me-2"></i></a>
                                </span>
                            </div>
                            <div class="d-flex p-3 border-top">
                                <div class="form-check"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3" checked="" /> <label class="form-check-label" for="flexCheckDefault3"> Hangout with friends </label></div>
                                <span class="ms-auto">
                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit" data-bs-original-title="Edit"><i class="si si-pencil text-primary me-2"></i></a>
                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete"><i class="si si-trash text-danger me-2"></i></a>
                                </span>
                            </div>
                            <div class="d-flex p-3 border-top">
                                <div class="form-check"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault4" /> <label class="form-check-label" for="flexCheckDefault4"> Do Something else </label></div>
                                <span class="ms-auto">
                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit" data-bs-original-title="Edit"><i class="si si-pencil text-primary me-2"></i></a>
                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete"><i class="si si-trash text-danger me-2"></i></a>
                                </span>
                            </div>
                            <div class="d-flex p-3 border-top">
                                <div class="form-check"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault5" /> <label class="form-check-label" for="flexCheckDefault5"> Eat healthy, Eat Fresh.. </label></div>
                                <span class="ms-auto">
                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit" data-bs-original-title="Edit"><i class="si si-pencil text-primary me-2"></i></a>
                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete"><i class="si si-trash text-danger me-2"></i></a>
                                </span>
                            </div>
                            <div class="d-flex p-3 border-top">
                                <div class="form-check"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault6" checked="" /> <label class="form-check-label" for="flexCheckDefault6"> Finsh something more.. </label></div>
                                <span class="ms-auto">
                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit" data-bs-original-title="Edit"><i class="si si-pencil text-primary me-2"></i></a>
                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete"><i class="si si-trash text-danger me-2"></i></a>
                                </span>
                            </div>
                            <div class="d-flex p-3 border-top">
                                <div class="form-check"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault7" checked="" /> <label class="form-check-label" for="flexCheckDefault7"> Do something more </label></div>
                                <span class="ms-auto">
                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit" data-bs-original-title="Edit"><i class="si si-pencil text-primary me-2"></i></a>
                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete"><i class="si si-trash text-danger me-2"></i></a>
                                </span>
                            </div>
                            <div class="d-flex p-3 border-top">
                                <div class="form-check"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault8" /> <label class="form-check-label" for="flexCheckDefault8"> Updated more files </label></div>
                                <span class="ms-auto">
                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit" data-bs-original-title="Edit"><i class="si si-pencil text-primary me-2"></i></a>
                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete"><i class="si si-trash text-danger me-2"></i></a>
                                </span>
                            </div>
                            <div class="d-flex p-3 border-top">
                                <div class="form-check"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault9" /> <label class="form-check-label" for="flexCheckDefault9"> System updated </label></div>
                                <span class="ms-auto">
                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit" data-bs-original-title="Edit"><i class="si si-pencil text-primary me-2"></i></a>
                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete"><i class="si si-trash text-danger me-2"></i></a>
                                </span>
                            </div>
                            <div class="d-flex p-3 border-top border-bottom">
                                <div class="form-check"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault10" /> <label class="form-check-label" for="flexCheckDefault10"> Settings Changings... </label></div>
                                <span class="ms-auto">
                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit" data-bs-original-title="Edit"><i class="si si-pencil text-primary me-2"></i></a>
                                    <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete" data-bs-original-title="Delete"><i class="si si-trash text-danger me-2"></i></a>
                                </span>
                            </div>
                            <div class="text-center pt-5"><a href="javascript:void(0);" class="btn btn-primary">Add more</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <div class="page">
        <!-- app-header -->
        <header class="app-header">
            <!-- Start::main-header-container -->
            <div class="main-header-container container-fluid">
                <!-- Start::header-content-left -->
                <div class="header-content-left">
                    <!-- Start::header-element -->
                    <div class="header-element">
                        <div class="horizontal-logo">
                            <a href="index.html" class="header-logo">
                                <img src="../assets/images/brand-logos/desktop-logo.png" alt="logo" class="desktop-logo" /> <img src="../assets/images/brand-logos/toggle-logo.png" alt="logo" class="toggle-logo" />
                                <img src="../assets/images/brand-logos/desktop-dark.png" alt="logo" class="desktop-dark" /> <img src="../assets/images/brand-logos/toggle-dark.png" alt="logo" class="toggle-dark" />
                                <img src="../assets/images/brand-logos/desktop-white.png" alt="logo" class="desktop-white" /> <img src="../assets/images/brand-logos/toggle-white.png" alt="logo" class="toggle-white" />
                            </a>
                        </div>
                    </div>
                    <!-- End::header-element -->
                    <!-- Start::header-element -->
                    <div class="header-element">
                        <!-- Start::header-link -->
                        <a aria-label="Hide Sidebar" class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle" data-bs-toggle="sidebar" href="javascript:void(0);"><span></span></a>
                        <!-- End::header-link -->
                    </div>
                    <!-- End::header-element -->
                    <div class="main-header-center ms-3 my-auto d-none d-xl-block">
                        <input type="search" class="form-control" placeholder="Search..." /> <button class="btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </div>
                <!-- End::header-content-left -->
                <!-- Start::header-content-right -->
                <div class="header-content-right">
                    <!-- Start::header-element -->
                    <div class="header-element country-selector">
                        <!-- Start::header-link|dropdown-toggle -->
                        <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-auto-close="outside" data-bs-toggle="dropdown">
                            <img src="https://www.spruko.com/demo/xino/dist/assets/images/flags/us_flag.jpg" alt="img" class="rounded-circle header-link-icon" />
                        </a>
                        <!-- End::header-link|dropdown-toggle -->
                        <ul class="main-header-dropdown dropdown-menu dropdown-menu-end" data-popper-placement="none">
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                                    <span class="avatar avatar-xs lh-1 me-2"> <img src="https://www.spruko.com/demo/xino/dist/assets/images/flags/us_flag.jpg" alt="img" /> </span> English
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                                    <span class="avatar avatar-xs lh-1 me-2"> <img src="https://www.spruko.com/demo/xino/dist/assets/images/flags/us_flag.jpg" alt="img" /> </span> Spanish
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                                    <span class="avatar avatar-xs lh-1 me-2"> <img src="https://www.spruko.com/demo/xino/dist/assets/images/flags/us_flag.jpg" alt="img" /> </span> French
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                                    <span class="avatar avatar-xs lh-1 me-2"> <img src="https://www.spruko.com/demo/xino/dist/assets/images/flags/us_flag.jpg" alt="img" /> </span> German
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                                    <span class="avatar avatar-xs lh-1 me-2"> <img src="https://www.spruko.com/demo/xino/dist/assets/images/flags/us_flag.jpg" alt="img" /> </span> Italian
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                                    <span class="avatar avatar-xs lh-1 me-2"> <img src="https://www.spruko.com/demo/xino/dist/assets/images/flags/us_flag.jpg" alt="img" /> </span> Russian
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End::header-element -->
                    <!-- Start::header-element -->
                    {{-- <div class="header-element header-theme-mode">
                        <!-- Start::header-link|layout-setting -->
                        <a href="javascript:void(0);" class="header-link layout-setting">
                            <span class="light-layout lh-1">
                                <!-- Start::header-link-icon -->
                                <i class="fe fe-moon header-link-icon"></i>
                                <!-- End::header-link-icon -->
                            </span>
                            <span class="dark-layout lh-1">
                                <!-- Start::header-link-icon -->
                                <i class="fe fe-sun header-link-icon"></i>
                                <!-- End::header-link-icon -->
                            </span>
                        </a>
                        <!-- End::header-link|layout-setting -->
                    </div> --}}
                    <!-- End::header-element -->
                    <!-- Start::header-element -->
                    <div class="header-element cart-dropdown">
                        <!-- Start::header-link|dropdown-toggle -->
                        <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-auto-close="outside" data-bs-toggle="dropdown">
                            <i class="fa fa-shopping-cart header-link-icon"></i> <span class="badge bg-primary rounded-pill header-icon-badge" id="cart-icon-badge">5</span>
                        </a>
                        <!-- End::header-link|dropdown-toggle -->
                        <!-- Start::main-header-dropdown -->
                        <div class="main-header-dropdown dropdown-menu dropdown-menu-end border-0 dropdown-menu-arrow" data-popper-placement="none">
                            <div class="p-3 menu-header-content text-fixed-white rounded-top">
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="mb-0 fs-17 fw-semibold">Shopping cart</p>
                                    <span class="badge bg-success" id="cart-data">5 Items</span>
                                </div>
                            </div>
                            <div><hr class="dropdown-divider" /></div>
                            <ul class="list-unstyled mb-0" id="header-cart-items-scroll" data-simplebar="init">
                                <div class="simplebar-wrapper" style="margin: 0px;">
                                    <div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div>
                                    <div class="simplebar-mask">
                                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                            <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden;">
                                                <div class="simplebar-content" style="padding: 0px;">
                                                    <li class="dropdown-item">
                                                        <div class="d-flex align-items-start cart-dropdown-item">
                                                            <img src="../assets/images/ecommerce/cart/1.jpg" alt="img" class="avatar avatar-md rounded-3 me-3" />
                                                            <div class="flex-grow-1">
                                                                <div class="d-flex align-items-start justify-content-between mb-0">
                                                                    <div class="mb-0 fs-14 text-dark fw-semibold"><a href="product-cart.html">Wall Photo Frame</a></div>
                                                                    <div>
                                                                        <a href="javascript:void(0);" class="header-cart-remove float-end dropdown-item-close"><i class="bi bi-trash3"></i></a>
                                                                    </div>
                                                                </div>
                                                                <div class="min-w-fit-content d-flex align-items-start justify-content-between">
                                                                    <ul class="header-product-item d-flex">
                                                                        <li>Quantity: 2</li>
                                                                        <li>Price: $921</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <div class="d-flex align-items-start cart-dropdown-item">
                                                            <img src="../assets/images/ecommerce/cart/3.jpg" alt="img" class="avatar avatar-md rounded-3 me-3" />
                                                            <div class="flex-grow-1">
                                                                <div class="d-flex align-items-start justify-content-between mb-0">
                                                                    <div class="mb-0 fs-14 text-dark fw-semibold"><a href="product-cart.html">Designed Chair</a></div>
                                                                    <div>
                                                                        <a href="javascript:void(0);" class="header-cart-remove float-end dropdown-item-close"><i class="bi bi-trash3"></i></a>
                                                                    </div>
                                                                </div>
                                                                <div class="min-w-fit-content d-flex align-items-start justify-content-between">
                                                                    <div class="min-w-fit-content d-flex align-items-start justify-content-between">
                                                                        <ul class="header-product-item d-flex">
                                                                            <li>Quantity: 1</li>
                                                                            <li>Price: $770</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <div class="d-flex align-items-start cart-dropdown-item">
                                                            <img src="../assets/images/ecommerce/cart/5.jpg" alt="img" class="avatar avatar-md rounded-3 me-3" />
                                                            <div class="flex-grow-1">
                                                                <div class="d-flex align-items-start justify-content-between mb-0">
                                                                    <div class="mb-0 fs-14 text-dark fw-semibold"><a href="product-cart.html">Loot Headphones</a></div>
                                                                    <div>
                                                                        <a href="javascript:void(0);" class="header-cart-remove float-end dropdown-item-close"><i class="bi bi-trash3"></i></a>
                                                                    </div>
                                                                </div>
                                                                <div class="min-w-fit-content d-flex align-items-start justify-content-between">
                                                                    <div class="header-product-item d-flex">
                                                                        <div class="min-w-fit-content d-flex align-items-start justify-content-between">
                                                                            <ul class="header-product-item d-flex">
                                                                                <li>Quantity: 2</li>
                                                                                <li>Price: $290.02</li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <div class="d-flex align-items-start cart-dropdown-item">
                                                            <img src="../assets/images/ecommerce/cart/4.jpg" alt="img" class="avatar avatar-md rounded-3 me-3" />
                                                            <div class="flex-grow-1">
                                                                <div class="d-flex align-items-start justify-content-between mb-0">
                                                                    <div class="mb-0 fs-14 text-dark fw-semibold"><a href="product-cart.html">Ultra Camera Lens</a></div>
                                                                    <div>
                                                                        <a href="javascript:void(0);" class="header-cart-remove float-end dropdown-item-close"><i class="bi bi-trash3"></i></a>
                                                                    </div>
                                                                </div>
                                                                <div class="min-w-fit-content d-flex align-items-start justify-content-between">
                                                                    <ul class="header-product-item d-flex">
                                                                        <li>Quantity: 3</li>
                                                                        <li>Price: $250.12</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <div class="d-flex align-items-start cart-dropdown-item">
                                                            <img src="../assets/images/ecommerce/cart/6.jpg" alt="img" class="avatar avatar-md rounded-3 me-3" />
                                                            <div class="flex-grow-1">
                                                                <div class="d-flex align-items-start justify-content-between mb-0">
                                                                    <div class="mb-0 fs-14 text-dark fw-semibold"><a href="product-cart.html">Stylish Coffee Cup</a></div>
                                                                    <div>
                                                                        <a href="javascript:void(0);" class="header-cart-remove float-end dropdown-item-close"><i class="bi bi-trash3"></i></a>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex align-items-start justify-content-between">
                                                                    <div class="min-w-fit-content d-flex align-items-start justify-content-between">
                                                                        <ul class="header-product-item d-flex">
                                                                            <li>Quantity: 1</li>
                                                                            <li>Price: $80.78</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div>
                                </div>
                                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div>
                                <div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="height: 0px; display: none;"></div></div>
                            </ul>
                            <div class="p-2 empty-header-item border-top">
                                <div class="d-grid"><a href="checkout.html" class="btn btn-primary">Proceed to checkout</a></div>
                            </div>
                            <div class="p-5 empty-item d-none">
                                <div class="text-center">
                                    <span class="avatar avatar-xl avatar-rounded bg-warning-transparent"> <i class="ri-shopping-cart-2-line fs-2"></i> </span>
                                    <h6 class="fw-bold mb-1 mt-3">Your Cart is Empty</h6>
                                    <span class="mb-3 fw-normal fs-13 d-block">Add some items to make me happy :)</span>
                                    <a href="products.html" class="btn btn-primary btn-wave btn-sm m-1 waves-effect waves-light" data-abc="true">continue shopping <i class="bi bi-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- End::main-header-dropdown -->
                    </div>
                    <!-- End::header-element -->
                    <!-- Start::header-element -->
                    <div class="header-element header-messages-dropdown d-sm-flex d-none">
                        <!-- Start::header-link|dropdown-toggle -->
                        <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-auto-close="outside" data-bs-toggle="dropdown"> <i class="fa-regular fa-envelope header-link-icon"></i> <span class="pulse-danger"></span> </a>
                        <!-- End::header-link|dropdown-toggle -->
                        <!-- Start::main-header-dropdown -->
                        <div class="main-header-dropdown dropdown-menu dropdown-menu-end border-0 dropdown-menu-arrow" data-popper-placement="none">
                            <div class="p-3 menu-header-content text-fixed-white rounded-top">
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="mb-0 fs-17 fw-semibold">5 New messages</p>
                                    <span class="badge bg-warning rounded-pill">Mark All Read</span>
                                </div>
                            </div>
                            <div><hr class="dropdown-divider" /></div>
                            <ul class="list-unstyled mb-0" id="header-messages-scroll" data-simplebar="init">
                                <div class="simplebar-wrapper" style="margin: 0px;">
                                    <div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div>
                                    <div class="simplebar-mask">
                                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                            <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden;">
                                                <div class="simplebar-content" style="padding: 0px;">
                                                    <li class="dropdown-item">
                                                        <div class="d-flex align-items-start">
                                                            <img src="../assets/images/users/3.jpg" alt="img" class="avatar avatar-md rounded-5 me-2" />
                                                            <div class="flex-grow-1">
                                                                <div class="d-flex align-items-start justify-content-between mb-0">
                                                                    <div class="mb-0 fs-14 text-dark"><a href="mail.html">Paul Molive</a></div>
                                                                    <div><p class="fs-11 mb-0 text-muted">10 min ago</p></div>
                                                                </div>
                                                                <div class="min-w-fit-content d-flex align-items-start justify-content-between"><p class="mb-0 fs-12 text-muted">I'm sorry but i'm not sure how...</p></div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <div class="d-flex align-items-start">
                                                            <img src="../assets/images/users/2.jpg" alt="img" class="avatar avatar-md rounded-5 me-2" />
                                                            <div class="flex-grow-1">
                                                                <div class="d-flex align-items-start justify-content-between mb-0">
                                                                    <div class="mb-0 fs-14 text-dark"><a href="mail.html">Sahar Dary</a></div>
                                                                    <div><p class="fs-11 mb-0 text-muted">13 min ago</p></div>
                                                                </div>
                                                                <div class="min-w-fit-content d-flex align-items-start justify-content-between"><p class="mb-0 fs-12 text-muted">All set ! Now, time to get to you now......</p></div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <div class="d-flex align-items-start">
                                                            <img src="../assets/images/users/9.jpg" alt="img" class="avatar avatar-md rounded-5 me-2" />
                                                            <div class="flex-grow-1">
                                                                <div class="d-flex align-items-start justify-content-between mb-0">
                                                                    <div class="mb-0 fs-14 text-dark"><a href="mail.html">Khadija Mehr</a></div>
                                                                    <div><p class="fs-11 mb-0 text-muted">20 min ago</p></div>
                                                                </div>
                                                                <div class="min-w-fit-content d-flex align-items-start justify-content-between"><p class="mb-0 fs-12 text-muted">Are you ready to pickup your Delivery...</p></div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <div class="d-flex align-items-start">
                                                            <img src="../assets/images/users/12.jpg" alt="img" class="avatar avatar-md rounded-5 me-2" />
                                                            <div class="flex-grow-1">
                                                                <div class="d-flex align-items-start justify-content-between mb-0">
                                                                    <div class="mb-0 fs-14 text-dark"><a href="mail.html">Barney Cull</a></div>
                                                                    <div><p class="fs-11 mb-0 text-muted">30 min ago</p></div>
                                                                </div>
                                                                <div class="min-w-fit-content d-flex align-items-start justify-content-between"><p class="mb-0 fs-12 text-muted">Here are some products ...</p></div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <div class="d-flex align-items-start">
                                                            <img src="https://cdn.24h.com.vn/upload/3-2022/images/2022-08-19/Gai-xinh-ngay-tho-lo-qua-khu-277585438_4600347833405176_193249803126218059_n-1660905398-70-width1754height2048.jpg" alt="img" class="avatar avatar-md rounded-5 me-2" />
                                                            <div class="flex-grow-1">
                                                                <div class="d-flex align-items-start justify-content-between mb-0">
                                                                    <div class="mb-0 fs-14 text-dark"><a href="mail.html">Petey Cruiser</a></div>
                                                                    <div><p class="fs-11 mb-0 text-muted">35 min ago</p></div>
                                                                </div>
                                                                <div class="d-flex align-items-start justify-content-between">
                                                                    <div class="min-w-fit-content d-flex align-items-start justify-content-between"><p class="mb-0 fs-12 text-muted">I'm sorry but i'm not sure how...</p></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div>
                                </div>
                                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div>
                                <div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="height: 0px; display: none;"></div></div>
                            </ul>
                            <div class="p-2 empty-header-item border-top bg-primary-transparent">
                                <div class="d-grid text-center"><a href="mail.html" class="text-primary">VIEW ALL</a></div>
                            </div>
                        </div>
                        <!-- End::main-header-dropdown -->
                    </div>
                    <!-- End::header-element -->
                    <!-- Start::header-element -->
                    <div class="header-element notifications-dropdown">
                        <!-- Start::header-link|dropdown-toggle -->
                        <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" id="messageDropdown" aria-expanded="false">
                            <i class="fa-regular fa-bell header-link-icon"></i> <span class="pulse"></span>
                        </a>
                        <!-- End::header-link|dropdown-toggle -->
                        <!-- Start::main-header-dropdown -->
                        <div class="main-header-dropdown dropdown-menu dropdown-menu-end border-0 dropdown-menu-arrow" data-popper-placement="none">
                            <div class="p-3 menu-header-content rounded-top">
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="mb-0 fs-17 text-fixed-white fw-semibold">7 Notifications</p>
                                    <span class="badge bg-warning rounded-pill" id="notifiation-data">Mark All Aead</span>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <ul class="list-unstyled mb-0" id="header-notification-scroll" data-simplebar="init">
                                <div class="simplebar-wrapper" style="margin: 0px;">
                                    <div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div>
                                    <div class="simplebar-mask">
                                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                            <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden;">
                                                <div class="simplebar-content" style="padding: 0px;">
                                                    <li class="dropdown-item p-3">
                                                        <div class="d-flex align-items-start">
                                                            <div class="pe-2">
                                                                <span class="avatar avatar-md bg-success-transparent avatar-rounded"><i class="la la-shopping-basket text-success fs-21"></i></span>
                                                            </div>
                                                            <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                                                <div>
                                                                    <p class="mb-0 fs-14 fw-semibold"><a href="notifications.html">New Order Received</a></p>
                                                                    <span class="text-muted fw-normal fs-12 header-notification-text">1 hour ago</span>
                                                                </div>
                                                                <div>
                                                                    <a href="javascript:void(0);" class="min-w-fit-content text-muted me-1"><i class="las la-angle-right fs-13"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="dropdown-item p-3">
                                                        <div class="d-flex align-items-start">
                                                            <div class="pe-2">
                                                                <span class="avatar avatar-md bg-danger-transparent avatar-rounded"><i class="la la-user-check text-danger fs-21"></i></span>
                                                            </div>
                                                            <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                                                <div>
                                                                    <p class="mb-0 fs-14 fw-semibold"><a href="notifications.html">22 Verified registrations</a></p>
                                                                    <span class="text-muted fw-normal fs-12 header-notification-text">2 hours ago</span>
                                                                </div>
                                                                <div>
                                                                    <a href="javascript:void(0);" class="min-w-fit-content text-muted me-1"><i class="las la-angle-right fs-13"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="dropdown-item p-3">
                                                        <div class="d-flex align-items-start">
                                                            <div class="pe-2">
                                                                <span class="avatar avatar-md bg-primary-transparent avatar-rounded"><i class="la la-check-circle text-primary fs-21"></i></span>
                                                            </div>
                                                            <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                                                <div>
                                                                    <p class="mb-0 fs-14 fw-semibold"><a href="notifications.html">Project has been approved</a></p>
                                                                    <span class="text-muted fw-normal fs-12 header-notification-text">4 hours ago</span>
                                                                </div>
                                                                <div>
                                                                    <a href="javascript:void(0);" class="min-w-fit-content text-muted me-1"><i class="las la-angle-right fs-13"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="dropdown-item p-3">
                                                        <div class="d-flex align-items-start">
                                                            <div class="pe-2">
                                                                <span class="avatar avatar-md bg-pink-transparent avatar-rounded"><i class="la la-file-alt text-pink fs-21"></i></span>
                                                            </div>
                                                            <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                                                <div>
                                                                    <p class="mb-0 fs-14 fw-semibold"><a href="notifications.html">New files available</a></p>
                                                                    <span class="text-muted fw-normal fs-12 header-notification-text">10 hours ago</span>
                                                                </div>
                                                                <div>
                                                                    <a href="javascript:void(0);" class="min-w-fit-content text-muted me-1"><i class="las la-angle-right fs-13"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="dropdown-item p-3">
                                                        <div class="d-flex align-items-start">
                                                            <div class="pe-2">
                                                                <span class="avatar avatar-md bg-warning-transparent avatar-rounded"><i class="la la-envelope-open text-warning fs-21"></i></span>
                                                            </div>
                                                            <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                                                <div>
                                                                    <p class="mb-0 fs-14 fw-semibold"><a href="notifications.html">New review received</a></p>
                                                                    <span class="text-muted fw-normal fs-12 header-notification-text">1 day ago</span>
                                                                </div>
                                                                <div>
                                                                    <a href="javascript:void(0);" class="min-w-fit-content text-muted me-1"><i class="las la-angle-right fs-13"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="dropdown-item p-3">
                                                        <div class="d-flex align-items-start">
                                                            <div class="pe-2">
                                                                <span class="avatar avatar-md bg-purple-transparent avatar-rounded"><i class="la la-gem text-purple fs-21"></i></span>
                                                            </div>
                                                            <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                                                <div>
                                                                    <p class="mb-0 fs-14 fw-semibold"><a href="notifications.html">Updates available</a></p>
                                                                    <span class="text-muted fw-normal fs-12 header-notification-text">2 days ago</span>
                                                                </div>
                                                                <div>
                                                                    <a href="javascript:void(0);" class="min-w-fit-content text-muted me-1"><i class="las la-angle-right fs-13"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div>
                                </div>
                                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div>
                                <div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="height: 0px; display: none;"></div></div>
                            </ul>
                            <div class="p-2 empty-header-item border-top bg-primary-transparent">
                                <div class="d-grid text-center"><a href="notifications.html" class="text-primary">VIEW ALL</a></div>
                            </div>
                        </div>
                        <!-- End::main-header-dropdown -->
                    </div>
                    <!-- End::header-element -->
                    <!-- Start::header-element -->
                    {{-- <div class="header-element header-fullscreen">
                        <!-- Start::header-link -->
                        <a onclick="openFullscreen();" href="javascript:void(0);" class="header-link">
                            <i class="fe fe-maximize full-screen-open header-link-icon"></i> <i class="fe fe-minimize full-screen-close header-link-icon d-none"></i>
                        </a>
                        <!-- End::header-link -->
                    </div> --}}
                    <!-- End::header-element -->
                    <!-- Start::header-element -->
                    <div class="header-element">
                        <a href="javascript:void(0);" class="header-link" data-bs-toggle="offcanvas" data-bs-target="#rightsidebar-canvas"> <i class="fa-solid fa-align-right header-link-icon"></i> </a>
                    </div>
                    <!-- End::header-element -->
                    <!-- Start::header-element -->
                    <div class="header-element profile-dropdown">
                        <!-- Start::header-link|dropdown-toggle -->
                        <a href="javascript:void(0);" class="header-link dropdown-toggle" id="mainHeaderProfile" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div class="me-sm-2 me-0"><img src="https://cdn.24h.com.vn/upload/3-2022/images/2022-08-19/Gai-xinh-ngay-tho-lo-qua-khu-277585438_4600347833405176_193249803126218059_n-1660905398-70-width1754height2048.jpg" alt="img" width="32" height="32" class="rounded-circle" /></div>
                                <div class="d-sm-block d-none">
                                    <p class="fw-semibold mb-0">Elizabeth Zane</p>
                                    <span class="op-7 fw-normal d-block fs-11 lh-1">Premium Member</span>
                                </div>
                            </div>
                        </a>
                        <!-- End::header-link|dropdown-toggle -->
                        <div class="main-header-dropdown dropdown-menu pt-0 border-0 header-profile-dropdown dropdown-menu-end dropdown-menu-arrow" aria-labelledby="mainHeaderProfile">
                            <div class="p-3 menu-header-content text-fixed-white rounded-top text-center">
                                <div class="">
                                    <div class="avatar avatar-xl rounded-circle"><img alt="" class="rounded-circle" src="https://cdn.24h.com.vn/upload/3-2022/images/2022-08-19/Gai-xinh-ngay-tho-lo-qua-khu-277585438_4600347833405176_193249803126218059_n-1660905398-70-width1754height2048.jpg" /></div>
                                    <p class="text-fixed-white fs-18 fw-semibold mb-0">Elizabeth Jane</p>
                                    <span class="fs-13 text-fixed-white">Premium Member</span>
                                </div>
                            </div>
                            <div><hr class="dropdown-divider" /></div>
                            <div>
                                <a class="dropdown-item" href="profile.html"><i class="fa fa-user me-1"></i> My Profile</a> <a class="dropdown-item" href="profile.html"><i class="fa fa-edit me-1"></i> Edit Profile</a>
                                <a class="dropdown-item" href="notifications.html"><i class="fa fa-clock me-1"></i> Activity Logs</a> <a class="dropdown-item" href="settings.html"><i class="fa fa-sliders-h me-1"></i> Account Settings</a>
                                <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{route('logout')}}"><i class="fa fa-sign-out-alt me-1"></i> Sign Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End::header-element -->
                </div>
                <!-- End::header-content-right -->
            </div>
            <!-- End::main-header-container -->
        </header>
        <!-- /app-header -->
        <!-- Start::app-sidebar -->
        <aside class="app-sidebar sticky" id="sidebar">
            <!-- Start::main-sidebar-header -->
            <div class="main-sidebar-header">
                <a href="index.html" class="header-logo">
                    <img src="{{asset("assets")}}/img/logo2.png" alt="logo" /> <span id="brand-title">Bug Buster</span>
                </a>
            </div>
            <!-- End::main-sidebar-header -->
            <!-- Start::main-sidebar -->
            <div class="main-sidebar" id="sidebar-scroll" data-simplebar="init">
                <div class="simplebar-wrapper" style="margin: -8px 0px -80px;">
                    <div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div>
                    <div class="simplebar-mask">
                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                            <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: auto;">
                                <div class="simplebar-content" style="padding: 8px 0px 80px;">
                                    <!-- Start::nav -->
                                    <nav class="main-menu-container nav nav-pills flex-column sub-open active">
                                        {{-- <div class="slide-left active d-none" id="slide-left">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path></svg>
                                        </div> --}}
                                        <ul class="main-menu active" style="margin-left: 0px; margin-right: 0px;">
                                            <!-- Start::slide__category -->
                                            <li class="slide__category"><span class="category-name">Dashboard</span></li>
                                            <!-- End::slide__category -->
                                            <!-- Start::slide -->
                                            <li class="slide active">
                                                <a style="background-color: rgba(255, 255, 255, .05);color: #fff !important;" href="" class="side-menu__item active"><i style="color: #fff !important; fill: #fff !important;" class=" side-menu__icon fa-solid fa-desktop"></i><span style="color: #fff !important; fill: #fff !important;" class="side-menu__label">Dashboard</span> </a>
                                            </li>
                                            <!-- End::slide -->
                                            <!-- Start::slide__category -->
                                            <li class="slide__category"><span class="category-name">widgets &amp; maps</span></li>
                                            <!-- End::slide__category -->
                                            <!-- Start::slide -->
                                            <li class="slide">
                                                <a href="" class="side-menu__item"> <i class="side-menu__icon fa-solid fa-cube"></i> <span class="side-menu__label">Widgets</span> </a>
                                            </li>
                                            <!-- End::slide -->
                                            <!-- Start::slide -->
                                            <li class="slide has-sub ">
                                                <a href="javascript:void(0);" class="side-menu__item">
                                                    <i class="side-menu__icon fa-solid fa-briefcase"></i> <span class="side-menu__label">Apps</span> <i class="fa-solid fa-chevron-right side-menu__angle"></i>
                                                </a>
                                                <ul class="slide-menu child1" style="position: relative; left: 0px; top: 0px; margin: 0px; transform: translate(120px, 300px);" data-popper-placement="bottom">
                                                    <li class="slide side-menu__label1"><a href="javascript:void(0)">Apps</a></li>
                                                    <li class="slide"><a href="cards.html" class="side-menu__item">Cards</a></li>
                                                    <li class="slide"><a href="draggable-cards.html" class="side-menu__item">Draggable Cards</a></li>
                                                    <li class="slide"><a href="full-calendar.html" class="side-menu__item">Full Calendar</a></li>
                                                    <li class="slide"><a href="contacts.html" class="side-menu__item">Contacts</a></li>
                                                    <li class="slide"><a href="notifications.html" class="side-menu__item">Notifications</a></li>
                                                    <li class="slide"><a href="widget-notification.html" class="side-menu__item">Widget Notification</a></li>
                                                    <li class="slide"><a href="treeview.html" class="side-menu__item">Treeview</a></li>
                                                    <li class="slide has-sub">
                                                        <a href="javascript:void(0);" class="side-menu__item">File Manager <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                                        <ul class="slide-menu child2">
                                                            <li class="slide"><a href="filemanager.html" class="side-menu__item">File Manager</a></li>
                                                            <li class="slide"><a href="filemanager-list.html" class="side-menu__item">File Manager List</a></li>
                                                            <li class="slide"><a href="filemanager-details.html" class="side-menu__item">File Details</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <script>
                                                document.addEventListener('DOMContentLoaded', function() {
                                                  // Lấy tất cả các thẻ <a> có class "side-menu__item" trong các thẻ <li> có class "has-sub"
                                                  document.querySelectorAll('.slide.has-sub > a').forEach((element) => {
                                                    element.addEventListener('click', function(event) {
                                                      // Ngăn chặn hành vi mặc định của thẻ <a>
                                                      event.preventDefault();
                                              
                                                      // Lấy thẻ <li> cha
                                                      const parentLi = this.parentElement;
                                                      
                                                      // Lấy thẻ <ul> con
                                                      const subMenu = this.nextElementSibling;
                                              
                                                      // Kiểm tra xem thẻ <li> có chứa lớp "open" không
                                                      if (parentLi.classList.contains('open')) {
                                                        // Nếu có, loại bỏ lớp "open" và ẩn thẻ <ul>
                                                        parentLi.classList.remove('open');
                                                        subMenu.style.display = 'none';
                                                      } else {
                                                        // Nếu không, thêm lớp "open" và hiển thị thẻ <ul>
                                                        parentLi.classList.add('open');
                                                        subMenu.style.display = 'block';
                                                      }
                                                    });
                                                  });
                                                });
                                              </script>
                                              
                                            <!-- End::slide -->
                                            <!-- Start::slide -->
                                            <li class="slide">
                                                <a href="icons.html" class="side-menu__item"> <i class="side-menu__icon fa-regular fa-face-smile menu-icon"></i> <span class="side-menu__label">Icons</span> </a>
                                            </li>
                                            <!-- End::slide -->
                                            <!-- Start::slide -->
                                            <li class="slide has-sub">
                                                <a href="javascript:void(0);" class="side-menu__item">
                                                    <i class="side-menu__icon fa-solid fa-map menu-icon"></i> <span class="side-menu__label">Maps</span> <i class="fa-solid fa-chevron-right side-menu__angle"></i>
                                                </a>
                                                <ul class="slide-menu child1" style="position: relative; left: 0px; top: 0px; margin: 0px; transform: translate(120px, 392px);" data-popper-placement="bottom">
                                                    <li class="slide side-menu__label1"><a href="javascript:void(0)">Maps</a></li>
                                                    <li class="slide"><a href="google-maps.html" class="side-menu__item">Google Maps</a></li>
                                                    <li class="slide"><a href="leaflet-maps.html" class="side-menu__item">Leaflet Maps</a></li>
                                                    <li class="slide"><a href="vector-maps.html" class="side-menu__item">Vector Maps</a></li>
                                                </ul>
                                            </li>
                                            <!-- End::slide -->
                                            <!-- Start::slide__category -->
                                            <li class="slide__category"><span class="category-name">componenents</span></li>
                                            <!-- End::slide__category -->
                                            <!-- Start::slide -->
                                            <li class="slide has-sub">
                                                <a href="javascript:void(0);" class="side-menu__item">
                                                    <i class="side-menu__icon fa-solid fa-server"></i> <span class="side-menu__label">Elements</span> <i class="fa fa-chevron-right side-menu__angle"></i>
                                                </a>
                                                <ul class="slide-menu child1 mega-menu" style="position: relative; left: 0px; top: 0px; margin: 0px; transform: translate(120px, 488px);" data-popper-placement="bottom">
                                                    <li class="slide side-menu__label1"><a href="javascript:void(0)">Ui Elements</a></li>
                                                    <li class="slide"><a href="alerts.html" class="side-menu__item">Alerts</a></li>
                                                    <li class="slide"><a href="avatars.html" class="side-menu__item">Avatars</a></li>
                                                    <li class="slide"><a href="breadcrumb.html" class="side-menu__item">Breadcrumbs</a></li>
                                                    <li class="slide"><a href="buttons.html" class="side-menu__item">Buttons</a></li>
                                                    <li class="slide"><a href="dropdowns.html" class="side-menu__item">Dropdowns</a></li>
                                                    <li class="slide"><a href="images_figures.html" class="side-menu__item">Images &amp; Figures</a></li>
                                                    <li class="slide"><a href="listgroup.html" class="side-menu__item">List Group</a></li>
                                                    <li class="slide"><a href="navs_tabs.html" class="side-menu__item">Navs &amp; Tabs</a></li>
                                                    <li class="slide"><a href="pagination.html" class="side-menu__item">Pagination</a></li>
                                                    <li class="slide"><a href="popovers.html" class="side-menu__item">Popovers</a></li>
                                                    <li class="slide"><a href="progress.html" class="side-menu__item">Progress</a></li>
                                                    <li class="slide"><a href="spinners.html" class="side-menu__item">Spinners</a></li>
                                                    <li class="slide"><a href="object-fit.html" class="side-menu__item">Object Fit</a></li>
                                                    <li class="slide"><a href="typography.html" class="side-menu__item">Typography</a></li>
                                                    <li class="slide"><a href="tooltips.html" class="side-menu__item">Tooltips</a></li>
                                                    <li class="slide"><a href="toasts.html" class="side-menu__item">Toasts</a></li>
                                                    <li class="slide"><a href="tags.html" class="side-menu__item">Tags</a></li>
                                                    <li class="slide"><a href="badge.html" class="side-menu__item">Badge</a></li>
                                                    <li class="slide"><a href="buttongroup.html" class="side-menu__item">Button Group</a></li>
                                                </ul>
                                            </li>
                                            <!-- End::slide -->
                                            <!-- Start::slide -->
                                            <li class="slide has-sub">
                                                <a href="javascript:void(0);" class="side-menu__item">
                                                    <i class="side-menu__icon fa-solid fa-server"></i> <span class="side-menu__label">Advanced Ui</span> <i class="fa fa-chevron-right side-menu__angle"></i>
                                                </a>
                                                <ul class="slide-menu child1" style="position: relative; left: 0px; top: 0px; margin: 0px; transform: translate(120px, 534px);" data-popper-placement="bottom">
                                                    <li class="slide side-menu__label1"><a href="javascript:void(0)">Advanced Ui</a></li>
                                                    <li class="slide"><a href="accordions_collpase.html" class="side-menu__item">Accordions &amp; Collapse</a></li>
                                                    <li class="slide"><a href="carousel.html" class="side-menu__item">Carousel</a></li>
                                                    <li class="slide"><a href="modals_closes.html" class="side-menu__item">Modals &amp; Closes</a></li>
                                                    <li class="slide"><a href="timeline.html" class="side-menu__item">Timeline</a></li>
                                                    <li class="slide"><a href="sweet_alerts.html" class="side-menu__item">Sweet Alerts</a></li>
                                                    <li class="slide"><a href="ratings.html" class="side-menu__item">Ratings</a></li>
                                                    <li class="slide"><a href="userlist.html" class="side-menu__item">Userlist</a></li>
                                                    <li class="slide"><a href="navbar.html" class="side-menu__item">Navbar</a></li>
                                                    <li class="slide"><a href="offcanvas.html" class="side-menu__item">Offcanvas</a></li>
                                                    <li class="slide"><a href="placeholders.html" class="side-menu__item">Placeholders</a></li>
                                                    <li class="slide"><a href="scrollspy.html" class="side-menu__item">Scrollspy</a></li>
                                                    <li class="slide"><a href="swiperjs.html" class="side-menu__item">Swiper JS</a></li>
                                                </ul>
                                            </li>
                                            <!-- End::slide -->
                                            <!-- Start::slide__category -->
                                            <li class="slide__category"><span class="category-name">Forms</span></li>
                                            <!-- End::slide__category -->
                                            <!-- Start::slide -->
                                            <li class="slide has-sub">
                                                <a href="javascript:void(0);" class="side-menu__item">
                                                    <i class="side-menu__icon fa-solid fa-server"></i> <span class="side-menu__label">Forms</span> <i class="fa fa-chevron-right side-menu__angle"></i>
                                                </a>
                                                <ul class="slide-menu child1" style="position: relative; left: 0px; top: 0px; margin: 0px; transform: translate(120px, 630px);" data-popper-placement="bottom">
                                                    <li class="slide side-menu__label1"><a href="javascript:void(0)">Forms</a></li>
                                                    <li class="slide has-sub">
                                                        <a href="javascript:void(0);" class="side-menu__item">Form Elements <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                                        <ul class="slide-menu child2">
                                                            <li class="slide"><a href="form_inputs.html" class="side-menu__item">Inputs</a></li>
                                                            <li class="slide"><a href="form_check_radios.html" class="side-menu__item">Checks &amp; Radios</a></li>
                                                            <li class="slide"><a href="form_input_group.html" class="side-menu__item">Input Group</a></li>
                                                            <li class="slide"><a href="form_select.html" class="side-menu__item">Form Select</a></li>
                                                            <li class="slide"><a href="form_range.html" class="side-menu__item">Range Slider</a></li>
                                                            <li class="slide"><a href="form_input_masks.html" class="side-menu__item">Input Masks</a></li>
                                                            <li class="slide"><a href="form_file_uploads.html" class="side-menu__item">File Uploads</a></li>
                                                            <li class="slide"><a href="form_dateTime_pickers.html" class="side-menu__item">Date,Time Picker</a></li>
                                                            <li class="slide"><a href="form_color_pickers.html" class="side-menu__item">Color Pickers</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="slide"><a href="floating_labels.html" class="side-menu__item">Floating Labels</a></li>
                                                    <li class="slide"><a href="form_layout.html" class="side-menu__item">Form Layouts</a></li>
                                                    <li class="slide has-sub">
                                                        <a href="javascript:void(0);" class="side-menu__item">Form Editors <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                                        <ul class="slide-menu child2">
                                                            <li class="slide"><a href="quill_editor.html" class="side-menu__item">Quill Editor</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="slide"><a href="form_validation.html" class="side-menu__item">Validation</a></li>
                                                    <li class="slide"><a href="form_select2.html" class="side-menu__item">Select2</a></li>
                                                </ul>
                                            </li>
                                            <!-- End::slide -->
                                            <!-- Start::slide -->
                                            <li class="slide has-sub">
                                                <a href="javascript:void(0);" class="side-menu__item">
                                                    <i class="side-menu__icon ti-view-grid"></i> <span class="side-menu__label">Sub Menus</span> <i class="fe fe-chevron-right side-menu__angle"></i>
                                                </a>
                                                <ul class="slide-menu child1" style="position: relative; left: 0px; top: 0px; margin: 0px; transform: translate(120px, 676px);" data-popper-placement="bottom">
                                                    <li class="slide side-menu__label1"><a href="javascript:void(0)">Sub Menus</a></li>
                                                    <li class="slide"><a href="javascript:void(0);" class="side-menu__item">Level-1</a></li>
                                                    <li class="slide has-sub">
                                                        <a href="javascript:void(0);" class="side-menu__item">Level-2 <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                                        <ul class="slide-menu child2">
                                                            <li class="slide"><a href="javascript:void(0);" class="side-menu__item">Level-2-1</a></li>
                                                            <li class="slide has-sub">
                                                                <a href="javascript:void(0);" class="side-menu__item">Level-2-2 <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                                                <ul class="slide-menu child3">
                                                                    <li class="slide"><a href="javascript:void(0);" class="side-menu__item">Level-2-2-1</a></li>
                                                                    <li class="slide"><a href="javascript:void(0);" class="side-menu__item">Level-2-2-2</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <!-- End::slide -->
                                            <!-- Start::slide__category -->
                                            <li class="slide__category"><span class="category-name">other pages</span></li>
                                            <!-- End::slide__category -->
                                            <!-- Start::slide -->
                                            <li class="slide has-sub">
                                                <a href="javascript:void(0);" class="side-menu__item">
                                                    <i class="side-menu__icon ti-files"></i> <span class="side-menu__label">Pages</span> <i class="fe fe-chevron-right side-menu__angle"></i>
                                                </a>
                                                <ul class="slide-menu child1" style="position: relative; left: 0px; top: 0px; margin: 0px; transform: translate(120px, 772px);" data-popper-placement="bottom">
                                                    <li class="slide side-menu__label1"><a href="javascript:void(0)">Pages</a></li>
                                                    <li class="slide has-sub">
                                                        <a href="javascript:void(0);" class="side-menu__item">Blog <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                                        <ul class="slide-menu child2">
                                                            <li class="slide"><a href="blog.html" class="side-menu__item">Blog</a></li>
                                                            <li class="slide"><a href="blog-details.html" class="side-menu__item">Blog Details</a></li>
                                                            <li class="slide"><a href="blog-post.html" class="side-menu__item">Blog Post</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="slide"><a href="profile.html" class="side-menu__item">Profile</a></li>
                                                    <li class="slide"><a href="invoice.html" class="side-menu__item">Invoice</a></li>
                                                    <li class="slide"><a href="pricing.html" class="side-menu__item">Pricing</a></li>
                                                    <li class="slide"><a href="gallery.html" class="side-menu__item">Gallery</a></li>
                                                    <li class="slide"><a href="settings.html" class="side-menu__item">Settings</a></li>
                                                    <li class="slide"><a href="services.html" class="side-menu__item">Services</a></li>
                                                    <li class="slide"><a href="terms.html" class="side-menu__item">Terms</a></li>
                                                    <li class="slide"><a href="about.html" class="side-menu__item">About Company</a></li>
                                                    <li class="slide"><a href="todotask.html" class="side-menu__item">TodoTask</a></li>
                                                    <li class="slide"><a href="faq.html" class="side-menu__item">Faqs</a></li>
                                                    <li class="slide"><a href="empty.html" class="side-menu__item">Empty</a></li>
                                                    <li class="slide has-sub">
                                                        <a href="javascript:void(0);" class="side-menu__item">Custom Pages <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                                        <ul class="slide-menu child2">
                                                            <li class="slide"><a href="signin.html" class="side-menu__item">Sign In</a></li>
                                                            <li class="slide"><a href="signup.html" class="side-menu__item">Sign Up</a></li>
                                                            <li class="slide"><a href="forgot.html" class="side-menu__item">Forgot Password</a></li>
                                                            <li class="slide"><a href="reset.html" class="side-menu__item">Reset Password</a></li>
                                                            <li class="slide"><a href="lockscreen.html" class="side-menu__item">Lockscreen</a></li>
                                                            <li class="slide"><a href="underconstruction.html" class="side-menu__item">Under Construction</a></li>
                                                            <li class="slide"><a href="404.html" class="side-menu__item">404 Error</a></li>
                                                            <li class="slide"><a href="500.html" class="side-menu__item">500 Error</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="slide has-sub">
                                                        <a href="javascript:void(0);" class="side-menu__item">Ecommerce <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                                        <ul class="slide-menu child2">
                                                            <li class="slide"><a href="products.html" class="side-menu__item">Products</a></li>
                                                            <li class="slide"><a href="product-details.html" class="side-menu__item">Product Details</a></li>
                                                            <li class="slide"><a href="product-cart.html" class="side-menu__item">Cart</a></li>
                                                            <li class="slide"><a href="checkout.html" class="side-menu__item">Checkout</a></li>
                                                            <li class="slide"><a href="wishlist.html" class="side-menu__item">Wishlist</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="slide has-sub">
                                                        <a href="javascript:void(0);" class="side-menu__item">Mail <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                                        <ul class="slide-menu child2">
                                                            <li class="slide"><a href="mail.html" class="side-menu__item">Mail</a></li>
                                                            <li class="slide"><a href="mail-compose.html" class="side-menu__item">Mail Compose</a></li>
                                                            <li class="slide"><a href="mail-read.html" class="side-menu__item">Read-Mail</a></li>
                                                            <li class="slide"><a href="mail-settings.html" class="side-menu__item">Mail-settings</a></li>
                                                            <li class="slide"><a href="chat.html" class="side-menu__item">Chat</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <!-- End::slide -->
                                            <!-- Start::slide -->
                                            <li class="slide has-sub">
                                                <a href="javascript:void(0);" class="side-menu__item">
                                                    <i class="side-menu__icon ti-layers-alt"></i> <span class="side-menu__label">Utilities</span> <i class="fe fe-chevron-right side-menu__angle"></i>
                                                </a>
                                                <ul class="slide-menu child1" style="position: relative; left: 0px; top: 0px; margin: 0px; transform: translate(120px, 818px);" data-popper-placement="bottom">
                                                    <li class="slide side-menu__label1"><a href="javascript:void(0)">Utilities</a></li>
                                                    <li class="slide"><a href="borders.html" class="side-menu__item">Borders</a></li>
                                                    <li class="slide"><a href="breakpoints.html" class="side-menu__item">Breakpoints</a></li>
                                                    <li class="slide"><a href="colors.html" class="side-menu__item">Colors</a></li>
                                                    <li class="slide"><a href="columns.html" class="side-menu__item">Columns</a></li>
                                                    <li class="slide"><a href="flex.html" class="side-menu__item">Flex</a></li>
                                                    <li class="slide"><a href="gutters.html" class="side-menu__item">Gutters</a></li>
                                                    <li class="slide"><a href="helpers.html" class="side-menu__item">Helpers</a></li>
                                                    <li class="slide"><a href="position.html" class="side-menu__item">Position</a></li>
                                                    <li class="slide"><a href="more.html" class="side-menu__item">Additional Content</a></li>
                                                </ul>
                                            </li>
                                            <!-- End::slide -->
                                            <!-- Start::slide__category -->
                                            <li class="slide__category"><span class="category-name">Tables &amp; Charts</span></li>
                                            <!-- End::slide__category -->
                                            <!-- Start::slide -->
                                            <li class="slide has-sub">
                                                <a href="javascript:void(0);" class="side-menu__item">
                                                    <i class="side-menu__icon ti-bar-chart-alt"></i> <span class="side-menu__label">Charts</span> <i class="fe fe-chevron-right side-menu__angle"></i>
                                                </a>
                                                <ul class="slide-menu child1" style="position: relative; left: 0px; top: 0px; margin: 0px; transform: translate(120px, 914px);" data-popper-placement="bottom">
                                                    <li class="slide side-menu__label1"><a href="javascript:void(0)">Charts</a></li>
                                                    <li class="slide has-sub">
                                                        <a href="javascript:void(0);" class="side-menu__item">Apex Charts <i class="fe fe-chevron-right side-menu__angle"></i></a>
                                                        <ul class="slide-menu child2">
                                                            <li class="slide"><a href="apex-line-charts.html" class="side-menu__item">Line Charts</a></li>
                                                            <li class="slide"><a href="apex-area-charts.html" class="side-menu__item">Area Charts</a></li>
                                                            <li class="slide"><a href="apex-column-charts.html" class="side-menu__item">Column Charts</a></li>
                                                            <li class="slide"><a href="apex-bar-charts.html" class="side-menu__item">Bar Charts</a></li>
                                                            <li class="slide"><a href="apex-mixed-charts.html" class="side-menu__item">Mixed Charts</a></li>
                                                            <li class="slide"><a href="apex-rangearea-charts.html" class="side-menu__item">Range Area Charts</a></li>
                                                            <li class="slide"><a href="apex-timeline-charts.html" class="side-menu__item">Timeline Charts</a></li>
                                                            <li class="slide"><a href="apex-candlestick-charts.html" class="side-menu__item">CandleStick Charts</a></li>
                                                            <li class="slide"><a href="apex-boxplot-charts.html" class="side-menu__item">Boxplot Charts</a></li>
                                                            <li class="slide"><a href="apex-bubble-charts.html" class="side-menu__item">Bubble Charts</a></li>
                                                            <li class="slide"><a href="apex-scatter-charts.html" class="side-menu__item">Scatter Charts</a></li>
                                                            <li class="slide"><a href="apex-heatmap-charts.html" class="side-menu__item">Heatmap Charts</a></li>
                                                            <li class="slide"><a href="apex-treemap-charts.html" class="side-menu__item">Treemap Charts</a></li>
                                                            <li class="slide"><a href="apex-pie-charts.html" class="side-menu__item">Pie Charts</a></li>
                                                            <li class="slide"><a href="apex-radialbar-charts.html" class="side-menu__item">Radialbar Charts</a></li>
                                                            <li class="slide"><a href="apex-radar-charts.html" class="side-menu__item">Radar Charts</a></li>
                                                            <li class="slide"><a href="apex-polararea-charts.html" class="side-menu__item">Polararea Charts</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="slide"><a href="chartjs-charts.html" class="side-menu__item">Chartjs Charts</a></li>
                                                    <li class="slide"><a href="echarts.html" class="side-menu__item">Echart Charts</a></li>
                                                </ul>
                                            </li>
                                            <!-- End::slide -->
                                            <!-- Start::slide -->
                                            <li class="slide has-sub">
                                                <a href="javascript:void(0);" class="side-menu__item">
                                                    <i class="side-menu__icon ti-layout-grid3"></i> <span class="side-menu__label">Tables<span class="badge bg-success-transparent ms-2">3</span></span>
                                                    <i class="fe fe-chevron-right side-menu__angle"></i>
                                                </a>
                                                <ul class="slide-menu child1" style="position: relative; left: 0px; top: 0px; margin: 0px; transform: translate(120px, 962px);" data-popper-placement="bottom">
                                                    <li class="slide side-menu__label1"><a href="javascript:void(0)">Tables</a></li>
                                                    <li class="slide"><a href="tables.html" class="side-menu__item">Tables</a></li>
                                                    <li class="slide"><a href="grid-tables.html" class="side-menu__item">Grid JS Tables</a></li>
                                                    <li class="slide"><a href="data-tables.html" class="side-menu__item">Data Tables</a></li>
                                                </ul>
                                            </li>
                                            <!-- End::slide -->
                                        </ul>
                                        <div class="slide-right d-none" id="slide-right">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path></svg>
                                        </div>
                                    </nav>
                                    <!-- End::nav -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="simplebar-placeholder" style="width: auto; height: 1006px;"></div>
                </div>
                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div>
                <div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="height: 0px; display: none;"></div></div>
            </div>
            <!-- End::main-sidebar -->
        </aside>
        <!-- End::app-sidebar -->
        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <!-- End::app-content -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="input-group">
                            <a href="javascript:void(0);" class="input-group-text" id="Search-Grid"><i class="fe fe-search header-link-icon fs-18"></i></a>
                            <input type="search" class="form-control border-0 px-2" placeholder="Search" aria-label="Username" />
                            <a href="javascript:void(0);" class="input-group-text" id="voice-search"><i class="fe fe-mic header-link-icon"></i></a>
                            <a href="javascript:void(0);" class="btn btn-light btn-icon" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fe fe-more-vertical"></i> </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:void(0);">Action</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">Another action</a></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">Something else here</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="javascript:void(0);">Separated link</a></li>
                            </ul>
                        </div>
                        <div class="mt-4">
                            <p class="fw-semibold text-muted mb-2">Are You Looking For...</p>
                            <span class="search-tags">
                                <i class="fe fe-user me-2"></i>People<a href="javascript:void(0)" class="tag-addon"><i class="fe fe-x"></i></a>
                            </span>
                            <span class="search-tags">
                                <i class="fe fe-file-text me-2"></i>Pages<a href="javascript:void(0)" class="tag-addon"><i class="fe fe-x"></i></a>
                            </span>
                            <span class="search-tags">
                                <i class="fe fe-align-left me-2"></i>Articles<a href="javascript:void(0)" class="tag-addon"><i class="fe fe-x"></i></a>
                            </span>
                            <span class="search-tags">
                                <i class="fe fe-server me-2"></i>Tags<a href="javascript:void(0)" class="tag-addon"><i class="fe fe-x"></i></a>
                            </span>
                        </div>
                        <div class="my-4">
                            <p class="fw-semibold text-muted mb-2">Recent Search :</p>
                            <div class="p-2 border br-5 d-flex align-items-center text-muted mb-2 alert">
                                <a href="notifications.html"><span>Notifications</span></a> <a class="ms-auto lh-1" href="javascript:void(0);" data-bs-dismiss="alert" aria-label="Close"><i class="fe fe-x text-muted"></i></a>
                            </div>
                            <div class="p-2 border br-5 d-flex align-items-center text-muted mb-2 alert">
                                <a href="alerts.html"><span>Alerts</span></a> <a class="ms-auto lh-1" href="javascript:void(0);" data-bs-dismiss="alert" aria-label="Close"><i class="fe fe-x text-muted"></i></a>
                            </div>
                            <div class="p-2 border br-5 d-flex align-items-center text-muted mb-0 alert">
                                <a href="mail.html"><span>Mail</span></a> <a class="ms-auto lh-1" href="javascript:void(0);" data-bs-dismiss="alert" aria-label="Close"><i class="fe fe-x text-muted"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group ms-auto"><button class="btn btn-sm btn-primary-light">Search</button> <button class="btn btn-sm btn-primary">Clear Recents</button></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Start -->
        <footer class="footer mt-auto py-3 bg-white text-center">
            <div class="container">
                <span class="text-muted">
                    Copyright © <span id="year">2024</span> <a href="javascript:void(0);" class="text-primary fw-semibold">Xino</a>. Designed with <span class="bi bi-heart-fill text-danger"></span> by
                    <a href="javascript:void(0);"> <span class="fw-semibold text-primary text-decoration-underline">Spruko</span> </a> All rights reserved
                </span>
            </div>
        </footer>
        <!-- Footer End -->
    </div>
      
    <script src="{{asset('assets')}}/js/home/choice.min.js"></script>
    <script src="{{asset('assets')}}/js/home/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets')}}/js/home/defaultmenu.min.js"></script>
    <script src="{{asset('assets')}}/js/home/simplebar.min.js"></script>
</body>
</html>