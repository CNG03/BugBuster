<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Dashboard | Buster')</title>
    <script src="{{ asset('assets') }}/js/home/choice.min.js"></script>
    <script src="{{ asset('assets') }}/js/home/main.js"></script>
    <link rel="stylesheet" href="{{ asset('assets') }}/css/home/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/home/style.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/home/simplebar.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/home/choice.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="{{ asset('assets') }}/img/logo2.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    @yield('custom-css')
</head>

<body>
    {{-- --}}

    <div class="offcanvas offcanvas-end" tabindex="-1" id="rightsidebar-canvas" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom bg-light">
            <h5 class="offcanvas-title text-default fw-semibold" id="offcanvasRightLabel1">NOTIFICATIONS</h5>
            <button type="button" class="btn-close text-primary" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0">
            <div class="tabs-menu">
                <!-- Tabs -->
                <ul style="padding-left: 32px;" class="nav panel-tabs" role="tablist">
                    <li class=""><a href="#tab" class="active show" data-bs-toggle="tab" aria-selected="true" role="tab">Profile</a></li>
                    <li><a href="#tab2" data-bs-toggle="tab" class="" aria-selected="false" tabindex="-1" role="tab">Activity</a></li>
                    <li><a href="#tab3" data-bs-toggle="tab" class="" aria-selected="false" tabindex="-1" role="tab">Todo</a></li>
                </ul>
            </div>
            <div class="panel-body tabs-menu-body side-tab-body p-0 border-0">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab" role="tabpanel">
                        <div class="card-body p-0">
                            <div class="header-user text-center mt-3">
                                <span class="avatar avatar-xxl rounded-circle mx-auto"><img
                                        src="{{Session::get('user_avatar')}}"
                                        alt="Profile-img" class="avatar avatar-xxl rounded-circle" /></span>
                                <div class="text-center fw-semibold user mt-2 h6 mb-0">{{Session::get('user_name')}}</div>
                                <span class="text-muted">{{Session::get('role')}} System</span>
                            </div>
                            <div class="card-body p-3">
                                <p class="fw-semibold mb-1">Offline/Online</p>
                                <div class="choices" data-type="select-one" tabindex="0" role="listbox"
                                    aria-haspopup="true" aria-expanded="false">
                                    <div class="choices__inner">
                                        <select class="form-control choices__input" data-trigger=""
                                            name="choices-single-default" id="choices-single-default1" hidden=""
                                            tabindex="-1" data-choice="active">
                                            <option value="Choice 1" data-custom-properties="[object Object]">Online
                                            </option>
                                        </select>
                                        <div class="choices__list choices__list--single">
                                            <div class="choices__item choices__item--selectable" data-item=""
                                                data-id="1" data-value="Choice 1"
                                                data-custom-properties="[object Object]" aria-selected="true">Online
                                            </div>
                                        </div>
                                    </div>
                                    <div class="choices__list choices__list--dropdown" aria-expanded="false">
                                        <div class="choices__list" role="listbox">
                                            <div id="choices--choices-single-default1-item-choice-1"
                                                class="choices__item choices__item--choice choices__item--selectable is-highlighted"
                                                role="option" data-choice="" data-id="1" data-value="Choice 2"
                                                data-select-text="Press to select" data-choice-selectable=""
                                                aria-selected="true">
                                                Offline
                                            </div>
                                            <div id="choices--choices-single-default1-item-choice-2"
                                                class="choices__item choices__item--choice is-selected choices__item--selectable"
                                                role="option" data-choice="" data-id="2" data-value="Choice 1"
                                                data-select-text="Press to select" data-choice-selectable="">
                                                Online
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="dropdown-item border-top" href="faq.html"> <i class="dropdown-icon fa-regular fa-circle-question"></i> Need Help? </a>
                            <div class="card-body border-top border-bottom p-3 mt-5">
                                <div class="row">
                                    <div class="col-4 text-center">
                                        <a class="" href="#"><i style="font-size: 30px; color:rgb(13 110 253);" class="fa-regular fa-message"></i></a>
                                        <div>Inbox</div>
                                    </div>
                                    <div class="col-4 text-center">
                                        <a class="" href="#"><i style="font-size: 30px; color:rgb(13 110 253);" class="fa-solid fa-sliders"></i></a>
                                        <div>Settings</div>
                                    </div>
                                    <div class="col-4 text-center">
                                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form1').submit();">
                                            <i style="font-size: 30px; color:rgb(13 110 253);" class="fa-solid fa-arrow-right-from-bracket"></i>
                                        </a>
                                        <div>Sign out</div>
                                    </div>
                                    <form id="logout-form1" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab2" role="tabpanel">
                        <div class="list d-flex align-items-center border-bottom p-3 mt-3">
                            <div class=""><span class="avatar bg-primary rounded-circle avatar-md">CH</span>
                            </div>
                            <div class="wrapper w-100 ms-3">
                                <p class="mb-0 d-flex"><b>New Websites is Created</b></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-clock text-muted me-1"></i> <small
                                            class="text-muted ms-auto">30 mins ago</small>
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
                                        <i class="mdi mdi-clock text-muted me-1"></i> <small
                                            class="text-muted ms-auto">2 hours ago</small>
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
                                        <i class="mdi mdi-clock text-muted me-1"></i> <small
                                            class="text-muted ms-auto">3 hours ago</small>
                                        <p class="mb-0"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list d-flex align-items-center border-bottom p-3">
                            <div class=""><span class="avatar bg-warning rounded-circle avatar-md">K</span>
                            </div>
                            <div class="wrapper w-100 ms-3">
                                <p class="mb-0 d-flex"><b>Team Review meeting</b></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-clock text-muted me-1"></i> <small
                                            class="text-muted ms-auto">4 hours ago</small>
                                        <p class="mb-0"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list d-flex align-items-center border-bottom p-3">
                            <div class=""><span class="avatar bg-success rounded-circle avatar-md">R</span>
                            </div>
                            <div class="wrapper w-100 ms-3">
                                <p class="mb-0 d-flex"><b>Prepare for Presentation</b></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-clock text-muted me-1"></i> <small
                                            class="text-muted ms-auto">1 days ago</small>
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
                                        <i class="mdi mdi-clock text-muted me-1"></i> <small
                                            class="text-muted ms-auto">1 days ago</small>
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
                                        <i class="mdi mdi-clock text-muted me-1"></i> <small
                                            class="text-muted ms-auto">45 mintues ago</small>
                                        <p class="mb-0"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list d-flex align-items-center border-bottom p-3">
                            <div class=""><span class="avatar bg-primary rounded-circle avatar-md">CH</span>
                            </div>
                            <div class="wrapper w-100 ms-3">
                                <p class="mb-0 d-flex"><b>New Websites is Created</b></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-clock text-muted me-1"></i> <small
                                            class="text-muted ms-auto">30 mins ago</small>
                                        <p class="mb-0"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list d-flex align-items-center p-3">
                            <div class=""><span class="avatar bg-secondary rounded-circle avatar-md">U</span>
                            </div>
                            <div class="wrapper w-100 ms-3">
                                <p class="mb-0 d-flex"><b>Prepare for Presentation</b></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-clock text-muted me-1"></i> <small
                                            class="text-muted ms-auto">2 days ago</small>
                                        <p class="mb-0"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab3" role="tabpanel">
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
                    <div class="header-element">
                        <!-- Start::header-link -->
                        <a aria-label="Hide Sidebar"
                            class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle"
                            data-bs-toggle="sidebar" href="javascript:void(0);"><span></span></a>
                        <!-- End::header-link -->
                    </div>
                    <!-- End::header-element -->
                    <div class="main-header-center ms-3 my-auto d-none d-xl-block">
                        <input type="search" class="form-control" placeholder="Search..." /> <button
                            class="btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </div>
                <div class="header-content-right">
                    <div class="header-element header-messages-dropdown d-sm-flex d-none">
                        <!-- Start::header-link|dropdown-toggle -->
                        <a href="javascript:void(0);" class="header-link dropdown-toggle"
                            data-bs-auto-close="outside" data-bs-toggle="dropdown"> <i
                                class="fa-regular fa-envelope header-link-icon"></i> <span
                                class="pulse-danger"></span> </a>
                        <!-- End::header-link|dropdown-toggle -->
                        <!-- Start::main-header-dropdown -->
                        <div class="main-header-dropdown dropdown-menu dropdown-menu-end border-0 dropdown-menu-arrow"
                            data-popper-placement="none">
                            <div class="p-3 menu-header-content text-fixed-white rounded-top">
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="mb-0 fs-17 fw-semibold">5 New messages</p>
                                    <span class="badge bg-warning rounded-pill">Mark All Read</span>
                                </div>
                            </div>
                            <div>
                                <hr class="dropdown-divider" />
                            </div>
                            <ul class="list-unstyled mb-0" id="header-messages-scroll" data-simplebar="init">
                                <div class="simplebar-wrapper" style="margin: 0px;">
                                    <div class="simplebar-height-auto-observer-wrapper">
                                        <div class="simplebar-height-auto-observer"></div>
                                    </div>
                                    <div class="simplebar-mask">
                                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                            <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                                aria-label="scrollable content"
                                                style="height: auto; overflow: hidden;">
                                                <div class="simplebar-content" style="padding: 0px;">
                                                    <li class="dropdown-item">
                                                        <div class="d-flex align-items-start">
                                                            <img src="{{asset('assets')}}/img/us1.jpeg" alt="img" class="avatar avatar-md rounded-5 me-2" />
                                                            <div class="flex-grow-1">
                                                                <div
                                                                    class="d-flex align-items-start justify-content-between mb-0">
                                                                    <div class="mb-0 fs-14 text-dark"><a
                                                                            href="#">Paul Molive</a></div>
                                                                    <div>
                                                                        <p class="fs-11 mb-0 text-muted">10 min ago</p>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="min-w-fit-content d-flex align-items-start justify-content-between">
                                                                    <p class="mb-0 fs-12 text-muted">I'm sorry but i'm
                                                                        not sure how...</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <div class="d-flex align-items-start">
                                                            <img src="{{asset('assets')}}/img/us1.jpeg" alt="img"
                                                                class="avatar avatar-md rounded-5 me-2" />
                                                            <div class="flex-grow-1">
                                                                <div
                                                                    class="d-flex align-items-start justify-content-between mb-0">
                                                                    <div class="mb-0 fs-14 text-dark"><a
                                                                            href="#">Sahar Dary</a></div>
                                                                    <div>
                                                                        <p class="fs-11 mb-0 text-muted">13 min ago</p>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="min-w-fit-content d-flex align-items-start justify-content-between">
                                                                    <p class="mb-0 fs-12 text-muted">All set ! Now,
                                                                        time to get to you now......</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <div class="d-flex align-items-start">
                                                            <img src="{{asset('assets')}}/img/us1.jpeg" alt="img"
                                                                class="avatar avatar-md rounded-5 me-2" />
                                                            <div class="flex-grow-1">
                                                                <div
                                                                    class="d-flex align-items-start justify-content-between mb-0">
                                                                    <div class="mb-0 fs-14 text-dark"><a
                                                                            href="#">Khadija Mehr</a></div>
                                                                    <div>
                                                                        <p class="fs-11 mb-0 text-muted">20 min ago</p>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="min-w-fit-content d-flex align-items-start justify-content-between">
                                                                    <p class="mb-0 fs-12 text-muted">Are you ready to
                                                                        pickup your Delivery...</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <div class="d-flex align-items-start">
                                                            <img src="{{asset('assets')}}/img/us1.jpeg" alt="img"
                                                                class="avatar avatar-md rounded-5 me-2" />
                                                            <div class="flex-grow-1">
                                                                <div
                                                                    class="d-flex align-items-start justify-content-between mb-0">
                                                                    <div class="mb-0 fs-14 text-dark"><a
                                                                            href="#">Barney Cull</a></div>
                                                                    <div>
                                                                        <p class="fs-11 mb-0 text-muted">30 min ago</p>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="min-w-fit-content d-flex align-items-start justify-content-between">
                                                                    <p class="mb-0 fs-12 text-muted">Here are some
                                                                        products ...</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="dropdown-item">
                                                        <div class="d-flex align-items-start">
                                                            <img src="{{asset('assets')}}/img/us1.jpeg"
                                                                alt="img"
                                                                class="avatar avatar-md rounded-5 me-2" />
                                                            <div class="flex-grow-1">
                                                                <div
                                                                    class="d-flex align-items-start justify-content-between mb-0">
                                                                    <div class="mb-0 fs-14 text-dark"><a
                                                                            href="#">Petey Cruiser</a></div>
                                                                    <div>
                                                                        <p class="fs-11 mb-0 text-muted">35 min ago</p>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="d-flex align-items-start justify-content-between">
                                                                    <div
                                                                        class="min-w-fit-content d-flex align-items-start justify-content-between">
                                                                        <p class="mb-0 fs-12 text-muted">I'm sorry but
                                                                            i'm not sure how...</p>
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
                                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                    <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                                </div>
                                <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                                    <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
                                </div>
                            </ul>
                            <div class="p-2 empty-header-item border-top bg-primary-transparent">
                                <div class="d-grid text-center"><a href="#" class="text-primary">VIEW ALL</a>
                                </div>
                            </div>
                        </div>
                        <!-- End::main-header-dropdown -->
                    </div>
                    <!-- End::header-element -->
                    <!-- Start::header-element -->
                    <div class="header-element notifications-dropdown">
                        <!-- Start::header-link|dropdown-toggle -->
                        <a href="javascript:void(0);" class="header-link dropdown-toggle" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" id="messageDropdown" aria-expanded="false">
                            <i class="fa-regular fa-bell header-link-icon"></i> <span class="pulse"></span>
                        </a>
                        <!-- End::header-link|dropdown-toggle -->
                        <!-- Start::main-header-dropdown -->
                        <div class="main-header-dropdown dropdown-menu dropdown-menu-end border-0 dropdown-menu-arrow"
                            data-popper-placement="none">
                            <div class="p-3 menu-header-content rounded-top">
                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="mb-0 fs-17 text-fixed-white fw-semibold">7 Notifications</p>
                                    <span class="badge bg-warning rounded-pill" id="notifiation-data">Mark All
                                        Aead</span>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <ul class="list-unstyled mb-0" id="header-notification-scroll" data-simplebar="init">
                                <div class="simplebar-wrapper" style="margin: 0px;">
                                    <div class="simplebar-height-auto-observer-wrapper">
                                        <div class="simplebar-height-auto-observer"></div>
                                    </div>
                                    <div class="simplebar-mask">
                                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                            <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                                aria-label="scrollable content"
                                                style="height: auto; overflow: hidden;">
                                                <div class="simplebar-content" style="padding: 0px;">
                                                    <li class="dropdown-item p-3">
                                                        <div class="d-flex align-items-start">
                                                            <div class="pe-2">
                                                                <span
                                                                    class="avatar avatar-md bg-success-transparent avatar-rounded"><i
                                                                        class="la la-shopping-basket text-success fs-21"></i></span>
                                                            </div>
                                                            <div
                                                                class="flex-grow-1 d-flex align-items-center justify-content-between">
                                                                <div>
                                                                    <p class="mb-0 fs-14 fw-semibold"><a
                                                                            href="notifications.html">New Order
                                                                            Received</a></p>
                                                                    <span
                                                                        class="text-muted fw-normal fs-12 header-notification-text">1
                                                                        hour ago</span>
                                                                </div>
                                                                <div>
                                                                    <a href="javascript:void(0);"
                                                                        class="min-w-fit-content text-muted me-1"><i
                                                                            class="las la-angle-right fs-13"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="dropdown-item p-3">
                                                        <div class="d-flex align-items-start">
                                                            <div class="pe-2">
                                                                <span
                                                                    class="avatar avatar-md bg-danger-transparent avatar-rounded"><i
                                                                        class="la la-user-check text-danger fs-21"></i></span>
                                                            </div>
                                                            <div
                                                                class="flex-grow-1 d-flex align-items-center justify-content-between">
                                                                <div>
                                                                    <p class="mb-0 fs-14 fw-semibold"><a
                                                                            href="notifications.html">22 Verified
                                                                            registrations</a></p>
                                                                    <span
                                                                        class="text-muted fw-normal fs-12 header-notification-text">2
                                                                        hours ago</span>
                                                                </div>
                                                                <div>
                                                                    <a href="javascript:void(0);"
                                                                        class="min-w-fit-content text-muted me-1"><i
                                                                            class="las la-angle-right fs-13"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="dropdown-item p-3">
                                                        <div class="d-flex align-items-start">
                                                            <div class="pe-2">
                                                                <span
                                                                    class="avatar avatar-md bg-primary-transparent avatar-rounded"><i
                                                                        class="la la-check-circle text-primary fs-21"></i></span>
                                                            </div>
                                                            <div
                                                                class="flex-grow-1 d-flex align-items-center justify-content-between">
                                                                <div>
                                                                    <p class="mb-0 fs-14 fw-semibold"><a
                                                                            href="notifications.html">Project has been
                                                                            approved</a></p>
                                                                    <span
                                                                        class="text-muted fw-normal fs-12 header-notification-text">4
                                                                        hours ago</span>
                                                                </div>
                                                                <div>
                                                                    <a href="javascript:void(0);"
                                                                        class="min-w-fit-content text-muted me-1"><i
                                                                            class="las la-angle-right fs-13"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="dropdown-item p-3">
                                                        <div class="d-flex align-items-start">
                                                            <div class="pe-2">
                                                                <span
                                                                    class="avatar avatar-md bg-pink-transparent avatar-rounded"><i
                                                                        class="la la-file-alt text-pink fs-21"></i></span>
                                                            </div>
                                                            <div
                                                                class="flex-grow-1 d-flex align-items-center justify-content-between">
                                                                <div>
                                                                    <p class="mb-0 fs-14 fw-semibold"><a
                                                                            href="notifications.html">New files
                                                                            available</a></p>
                                                                    <span
                                                                        class="text-muted fw-normal fs-12 header-notification-text">10
                                                                        hours ago</span>
                                                                </div>
                                                                <div>
                                                                    <a href="javascript:void(0);"
                                                                        class="min-w-fit-content text-muted me-1"><i
                                                                            class="las la-angle-right fs-13"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="dropdown-item p-3">
                                                        <div class="d-flex align-items-start">
                                                            <div class="pe-2">
                                                                <span
                                                                    class="avatar avatar-md bg-warning-transparent avatar-rounded"><i
                                                                        class="la la-envelope-open text-warning fs-21"></i></span>
                                                            </div>
                                                            <div
                                                                class="flex-grow-1 d-flex align-items-center justify-content-between">
                                                                <div>
                                                                    <p class="mb-0 fs-14 fw-semibold"><a
                                                                            href="notifications.html">New review
                                                                            received</a></p>
                                                                    <span
                                                                        class="text-muted fw-normal fs-12 header-notification-text">1
                                                                        day ago</span>
                                                                </div>
                                                                <div>
                                                                    <a href="javascript:void(0);"
                                                                        class="min-w-fit-content text-muted me-1"><i
                                                                            class="las la-angle-right fs-13"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="dropdown-item p-3">
                                                        <div class="d-flex align-items-start">
                                                            <div class="pe-2">
                                                                <span
                                                                    class="avatar avatar-md bg-purple-transparent avatar-rounded"><i
                                                                        class="la la-gem text-purple fs-21"></i></span>
                                                            </div>
                                                            <div
                                                                class="flex-grow-1 d-flex align-items-center justify-content-between">
                                                                <div>
                                                                    <p class="mb-0 fs-14 fw-semibold"><a
                                                                            href="notifications.html">Updates
                                                                            available</a></p>
                                                                    <span
                                                                        class="text-muted fw-normal fs-12 header-notification-text">2
                                                                        days ago</span>
                                                                </div>
                                                                <div>
                                                                    <a href="javascript:void(0);"
                                                                        class="min-w-fit-content text-muted me-1"><i
                                                                            class="las la-angle-right fs-13"></i></a>
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
                                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                    <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                                </div>
                                <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                                    <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
                                </div>
                            </ul>
                            <div class="p-2 empty-header-item border-top bg-primary-transparent">
                                <div class="d-grid text-center"><a href="#"
                                        class="text-primary">VIEW ALL</a></div>
                            </div>
                        </div>
                        <!-- End::main-header-dropdown -->
                    </div>
                    <div class="header-element">
                        <a href="javascript:void(0);" class="header-link" data-bs-toggle="offcanvas"
                            data-bs-target="#rightsidebar-canvas"> <i
                                class="fa-solid fa-align-right header-link-icon"></i> </a>
                    </div>
                    <!-- End::header-element -->
                    <!-- Start::header-element -->
                    <div class="header-element profile-dropdown">
                        <!-- Start::header-link|dropdown-toggle -->
                        <a href="javascript:void(0);" class="header-link dropdown-toggle" id="mainHeaderProfile"
                            data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div class="me-sm-2 me-0"><img
                                        src="{{Session::get('user_avatar')}}"
                                        alt="img" width="32" height="32" class="rounded-circle" />
                                </div>
                                <div class="d-sm-block d-none">
                                    <p class="fw-semibold mb-0">{{Session::get('user_name')}}</p>
                                    <span class="op-7 fw-normal d-block fs-11 lh-1">{{Session::get('user_role')}} System</span>
                                </div>
                            </div>
                        </a>
                        <!-- End::header-link|dropdown-toggle -->
                        <div class="main-header-dropdown dropdown-menu pt-0 border-0 header-profile-dropdown dropdown-menu-end dropdown-menu-arrow"
                            aria-labelledby="mainHeaderProfile">
                            <div class="p-3 menu-header-content text-fixed-white rounded-top text-center">
                                <div class="">
                                    <div class="avatar avatar-xl rounded-circle"><img alt=""
                                            class="rounded-circle"
                                            src="{{Session::get('user_avatar')}}" />
                                    </div>
                                    <p class="text-fixed-white fs-18 fw-semibold mb-0">{{Session::get('user_name')}}</p>
                                    <span class="fs-13 text-fixed-white">{{Session::get('user_role')}} System</span>
                                </div>
                            </div>
                            <div>
                                <a class="dropdown-item" href="{{route('myProfile')}}"><i class="fa fa-user me-1"></i> My Profile</a> <a class="dropdown-item" href="{{route('myProfile')}}"><i class="fa fa-edit me-1"></i> Edit Profile</a>
                                <a class="dropdown-item" href="{{route('myProfile')}}"><i class="fa fa-sliders-h me-1"></i> Account Settings</a>
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
                    <img src="{{ asset('assets') }}/img/logo2.png" alt="logo" /> <span id="brand-title">Bug
                        Buster</span>
                </a>
            </div>
            <!-- End::main-sidebar-header -->
            <!-- Start::main-sidebar -->
            <div class="main-sidebar" id="sidebar-scroll" data-simplebar="init">
                <div class="simplebar-wrapper" style="margin: -8px 0px -80px;">
                    <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask">
                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                            <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                aria-label="scrollable content" style="height: 100%; overflow: auto;">
                                <div class="simplebar-content" style="padding: 8px 0px 80px;">
                                    <!-- Start::nav -->
                                    <nav class="main-menu-container nav nav-pills flex-column sub-open active">
                                        {{-- <div class="slide-left active d-none" id="slide-left">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path></svg>
                                        </div> --}}
                                        <ul class="main-menu active" style="margin-left: 0px; margin-right: 0px;">
                                            <!-- Start::slide__category -->
                                            <li class="slide__category"><span class="category-name">Dashboard</span>
                                            </li>
                                            <!-- End::slide__category -->
                                            <!-- Start::slide -->
                                            <li class="slide active">
                                                <a style="background-color: rgba(255, 255, 255, .05);color: #fff !important;"
                                                    href="{{route('dashboard')}}" class="side-menu__item active"><i
                                                        style="color: #fff !important; fill: #fff !important;"
                                                        class=" side-menu__icon fa-solid fa-gauge"></i><span
                                                        style="color: #fff !important; fill: #fff !important;"
                                                        class="side-menu__label">Dashboard</span> </a>
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
                                            <!-- Start::slide__category -->
                                            <li class="slide__category"><span class="category-name">Project</span></li>
                                            <li class="slide">
                                                <a style="background-color: rgba(255, 255, 255, .05);color: #fff !important;"
                                                    href="{{route('dashboard')}}" class="side-menu__item active"><i
                                                        style="color: #fff !important; fill: #fff !important;"
                                                        class=" side-menu__icon fa-solid fa-briefcase"></i><span
                                                        style="color: #fff !important; fill: #fff !important;"
                                                        class="side-menu__label">Project</span> </a>
                                            </li>
                                            @if (Session::get('user_role') == 'ADMIN')
                                                <li class="slide__category">
                                                    <span class="category-name">Managements</span>
                                                </li>
                                                <li class="slide has-sub">
                                                    <a href="javascript:void(0);" class="side-menu__item">
                                                        <i class="side-menu__icon fa-solid fa-clipboard-list"></i>
                                                        <span class="side-menu__label">Managements</span>
                                                        <i class="fa fa-chevron-right side-menu__angle"></i>
                                                    </a>
                                                    <ul class="slide-menu child1" style="position: relative; left: 0px; top: 0px; margin: 0px; transform: translate(120px, 772px);" data-popper-placement="bottom">
                                                        <li class="slide has-sub">
                                                            <a href="javascript:void(0);" class="side-menu__item">
                                                                Test and Bug Type
                                                                <i class="fe fe-chevron-right side-menu__angle"></i>
                                                            </a>
                                                            <ul class="slide-menu child2">
                                                                <li class="slide"><a href="{{route('testType')}}" class="side-menu__item">Test Type</a></li>
                                                                <li class="slide"><a href="{{route('entities')}}" class="side-menu__item">Bug Type</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                            @endif
                                        </ul>
                                        <div class="slide-right d-none" id="slide-right">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24"
                                                height="24" viewBox="0 0 24 24">
                                                <path
                                                    d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z">
                                                </path>
                                            </svg>
                                        </div>
                                    </nav>
                                    <!-- End::nav -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="simplebar-placeholder" style="width: auto; height: 1006px;"></div>
                </div>
                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                    <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                </div>
                <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                    <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
                </div>
            </div>
            <!-- End::main-sidebar -->
        </aside>
        <!-- End::app-sidebar -->
        <!-- Start::app-content -->
        <div style="background-color: white;" class="main-content app-content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <footer class="footer mt-auto py-3 bg-white text-center">
            <div class="container">
                <span class="text-muted">
                    Copyright © <span id="year">2024</span> <a href="javascript:void(0);" class="text-primary fw-semibold">Bug Buster</a>. Designed with <span class="fa-solid fa-heart text-danger"></span> by
                    <a href="javascript:void(0);"> <span class="fw-semibold text-primary text-decoration-underline">Chill Developer</span> </a> All rights reserved
                </span>
            </div>
        </footer>
        <!-- Footer End -->
    </div>

    <script src="{{ asset('assets') }}/js/home/choice.min.js"></script>
    <script src="{{ asset('assets') }}/js/home/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets') }}/js/home/defaultmenu.min.js"></script>
    <script src="{{ asset('assets') }}/js/home/simplebar.min.js"></script>
    @yield('custom-js')
</body>

</html>
