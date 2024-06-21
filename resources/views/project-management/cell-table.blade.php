                <div class="row row-sm overflow-auto cell-table postition-relative" style="max-height: 430px;">                
                    @foreach ($projects as $project)
                    <div class="cell-element col-xl-3 col-lg-6 col-md-4 col-sm-4" data-value="{{ $project->id }}">
                      <div class="card rounded-7">
                        <div class="ms-auto">
                          <div class="mt-2 file-dropdown me-2">
                            <a href="javascript:void(0);" class="text-muted" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fe fe-more-vertical fs-18"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-start" style="">
                              <a class="dropdown-item" href="javascript:void(0);" onclick="updateForm(event)">
                                <i class="fe fe-edit me-2"></i> Edit </a>
                              <a class="dropdown-item" href="javascript:void(0);">
                                <i class="fe fe-share me-2"></i> Share Link </a>
                              <a class="dropdown-item" href="javascript:void(0);" onclick="openDeleteBasicForm(event)">
                                <i class="fe fe-trash me-2"></i> Delete </a>
                            </div>
                          </div>
                        </div>
                        <a href="filemanager-details.html" class="mx-auto" style="max-width: 50%;">
                          <img src="../assets/images/media/files/13.png" alt="img">
                        </a>
                        <h5 class="mb-0 mx-auto w-100 p-2 pt-1 text-center fs-15 text-nowrap overflow-hidden text-truncate ">{{ $project->name }}</h5>
                        <div class="card-footer">
                        <div class="d-flex fs-14">
                            <span class="text-muted mb-0 fs-14 created_at">{{ $project->created_at->format('Y-m-d') }}</span>
                            <div class="ms-auto my-auto">
                              <span class="text-muted mb-0 fs-14 number_member">
                                <i class="fa-solid fa-user-group"></i>
                                {{count($project->projectMembers)}}
                              </span>
                           
                               </div>
                            <ul class="ms-auto my-auto d-none">
                              <li class="text-muted mb-0 fs-14 description">{{ $project->description }}</li>
                              <li class="text-muted mb-0 fs-14 created_by" data-value="{{ $project->admin_id }}">{{ $project->admin_id }}</li>
                              <li class="text-muted mb-0 fs-14 update_at">{{ $project->updated_at }}</li>
                              <li class="text-muted mb-0 fs-14 status" data-value="{{ $project->status }}">{{ $project->status }}</li>
                            </ul>
                          </div>
                          <div class="member d-none">
                            <ul class="managers">
                              @foreach ($project->projectMembers as $member)
                                @if ($member->role_in_project == 'MANAGER')
                                  <li data-value="{{ $member->user->id }}">{{ $member->user->email }}</li>
                                @endif
                              @endforeach
                            </ul>
                            <ul class="testers">
                              @foreach ($project->projectMembers as $member)
                                @if ($member->role_in_project == 'TESTER')
                                  <li data-value="{{ $member->user->id }}">{{ $member->user->email }}</li>
                                @endif
                              @endforeach
                            </ul>
                            <ul class="developers">
                              @foreach ($project->projectMembers as $member)
                                @if ($member->role_in_project == 'DEVELOPER')
                                  <li data-value="{{ $member->user->id }}">{{ $member->user->email }}</li>
                                @endif
                              @endforeach
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                        </div>