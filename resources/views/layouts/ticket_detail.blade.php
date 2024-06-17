@extends('layouts.app')

@section('title', 'Tickets Detail | Bug Buster')

@section('custom-css')
    {{-- <link rel="stylesheet" href="{{ asset('assets') }}/css/tickets/main.css"> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/tickets/ticket-detail.css">
@endsection

@section('content')
<div style="margin-top: 2rem; margin-left: 1rem;" >
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Bug Buster</a></li>
            <li class="breadcrumb-item"><a href="#">Ticket</a></li>
            <li class="breadcrumb-item active" aria-current="page">Details</li>
        </ol>
    </nav>
</div>
    <div class="container mt-2">
        <div class="card">
            <div class="card-header">
                <h5 style="font-size: 20px;" class="card-title animate-charcter">Ticket Details</h5>
                <button type="button" class="btn-back" onclick="window.history.back();">
                    <i style="font-size: 14px;" class="fas fa-arrow-left"></i> 
                    <span style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-weight: 700; font-size: 14px;">Back</span>
                </button>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="ticketDetailsTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active " id="description-tab" data-bs-toggle="tab" href="#description" role="tab" aria-controls="description"  aria-selected="true">Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " id="comments-tab" data-bs-toggle="tab" href="#comments" role="tab" aria-controls="comments"  aria-selected="false">Comments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " id="team-tab" data-bs-toggle="tab" href="#team" role="tab" aria-controls="team"  aria-selected="false">Assigned to</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " id="history-tab" data-bs-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="false">History</a>
                    </li>
                </ul>
                <div class="tab-content" id="ticketDetailsTabContent">
                    <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                        <div class="ticket-detail">
                            <div class="ticket-detail-title ">Name:</div>
                            <div class="ticket-detail-value" id="ticketName">Create a notification system</div>
                        </div>
                        <div class="ticket-detail">
                            <div class="ticket-detail-title">Priority:</div>
                            <div class="ticket-detail-value " id="ticketPriority"><span class="priority-high">High</span></div>
                        </div>
                        <div class="ticket-detail">
                            <div class="ticket-detail-title">Estimated hours:</div>
                            <div class="ticket-detail-value" id="estimatedHours">4</div>
                        </div>
                        <div class="ticket-detail">
                            <div class="ticket-detail-title">Bug Type:</div>
                            <div class="ticket-detail-value" id="bugType">Feature request</div>
                        </div>
                        <div class="ticket-detail">
                            <div class="ticket-detail-title">Test Type:</div>
                            <div class="ticket-detail-value" id="testType">New</div>
                        </div>
                        <div class="ticket-detail">
                            <div class="ticket-detail-title">Description:</div>
                            <div class="ticket-detail-value" id="ticketDescription">User should receive a notification when an action related to them occurs in the application.</div>
                        </div>
                        <div class="ticket-detail">
                            <div class="ticket-detail-title">Steps to reproduce:</div>
                            <div class="ticket-detail-value" id="ticketSTR">User should receive a notification when an action related to them occurs in the application.</div>
                        </div>
                        <div class="ticket-detail">
                            <div class="ticket-detail-title">Expected Result:</div>
                            <div class="ticket-detail-value" id="ticketER">User should receive a notification when an action related to them occurs in the application.</div>
                        </div>
                        <div class="ticket-detail">
                            <div class="ticket-detail-title">Actual Result:</div>
                            <div class="ticket-detail-value" id="ticketAR">User should receive a notification when an action related to them occurs in the application.</div>
                        </div>
                        <div class="ticket-detail">
                            <div class="ticket-detail-title">Image Detail:</div>
                            <a href="https://cdn-media.sforum.vn/storage/app/media/THANHAN/avatar-vo-tri-99.jpg" data-lightbox="ticket-image">
                                <img src="https://cdn-media.sforum.vn/storage/app/media/THANHAN/avatar-vo-tri-99.jpg" alt="Ticket Image" class="img-thumbnail ticket-image">
                            </a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="comments-tab">
                        <div class="comment-box">
                            <div style="overflow-y: auto; height: 300px;">
                                <div class="comment">
                                    <div class="comment-author">Admin</div>
                                    <div class="comment-time">4/14/2022 7:30:57 AM</div>
                                    <p class="comment-text">Welcome to the team John, same for you Jane.</p>
                                </div>
                                <div class="comment">
                                    <div class="comment-author">Admin</div>
                                    <div class="comment-time">4/14/2022 7:31:10 AM</div>
                                    <p class="comment-text">Feel free to ask any question. :)</p>
                                </div>
                                <div class="comment">
                                    <div class="comment-author">John Doe</div>
                                    <div class="comment-time">4/14/2022 7:48:48 AM</div>
                                    <p class="comment-text">Will do thank you!</p>
                                </div>
                                <div class="comment">
                                    <div class="comment-author">John Doe</div>
                                    <div class="comment-time">4/14/2022 7:48:48 AM</div>
                                    <p class="comment-text">Will do thank you!</p>
                                </div>
                            </div>
                            <div class="comment-input mt-3">
                                <input type="text" class="form-control" placeholder="Type Comment">
                                <button class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="team" role="tabpanel" aria-labelledby="team-tab">
                        <ul class="list-group mt-3">
                            <li class="list-group-item animate-charcter">John Doe - Developer</li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
                        <div class="history-item">
                            <div class="history-time">4/8/2022 12:01:45 PM</div>
                            <span class="history-status status-error">ERROR</span>
                        </div>
                        <div class="history-item">
                            <div class="history-time">4/8/2022 12:21:35 PM</div>
                            <span class="history-status status-pending">PENDING</span>
                        </div>
                        <div class="history-item">
                            <div class="history-time">4/8/2022 12:21:35 PM</div>
                            <span class="history-status status-cancel">CANCEL</span>
                        </div>
                        <div class="history-item">
                            <div class="history-time">4/8/2022 12:21:35 PM</div>
                            <span class="history-status status-close">CLOSE</span>
                        </div>
                        <div class="history-item">
                            <div class="history-time">4/14/2022 7:30:05 AM</div>
                            <span class="history-status status-tested">TESTED</span>
                            <p>Ticket updated by Admin</p>
                            <p><strong>User added</strong></p>
                            <ul>
                                <li>John Doe - Developer</li>
                                <li>Jane Doe - Developer</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-secondary" onclick="window.history.back();">Back</button>
            </div>
        </div>
    </div>

@endsection

@section('custom-js')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
@endsection
