<div class="col-lg-4 col-xl-3 " id="navbar-project">
                  <div class="card rounded-7">
                    <div class="card-body text-center p-0">
                      <div class="p-4 pb-0">
                        <button class="btn btn-primary btn-block text-nowrap" id="createProjectBtn" data-toggle="modal" data-target="#project_form" onclick="openProjectForm()">
                          <i class="fe fe-plus me-1"></i> Create New Project </button>
          
                          
                      </div>
                      <div class="list-group list-group-transparent mb-0 p-4 pt-2">
                        <a href="javascript:void(0);" class="list-group-item justify-content-between d-flex align-items-center px-0 py-2"  onclick="filterElements('none')">
                          <span class="">
                            <i class="fe fe-circle y me-1 fs-12"></i>
                            
                            All Projects 
                          </span>
                          <span class="badge bg-black rounded-pill amount-total-project"></span>
                        </a>
                        <a href="javascript:void(0);" class="list-group-item  d-flex align-items-center justify-content-between px-0 py-2" onclick="filterElements('created')">
                          <span class="text-nowrap">
                            <i class="text-success fe fe-circle  me-1 fs-12"></i>
                            Created Projects
                          </span> 
                          <span class="badge bg-success rounded-pill amount-my-created"></span>
                        </a>
                        <a href="javascript:void(0);" class="list-group-item  d-flex align-items-center justify-content-between px-0 py-2"  onclick="filterElements('active')">
                          <span class="text-nowrap">
                            <i class="fe fe-circle text-info me-1 fs-12"></i>
                            Projects Active
                          </span>
                          <span class="badge bg-info rounded-pill amount-progress"></span>
                        </a>
                        <a href="javascript:void(0);" class="list-group-item  d-flex align-items-center justify-content-between px-0 py-2"  onclick="filterElements('closed')">
                          <span class="">
                            <i class="fe fe-circle text-pink me-1 fs-12"></i>
                            Closed Projects
                          </span>
                          <span class="badge bg-danger rounded-pill amount-closed"></span>
                        </a>

                        <a href="javascript:void(0);" class="list-group-item  d-flex align-items-center justify-content-between px-0 py-2">
                          <span class="">
                            <i class="fe fe-circle text-black me-1 fs-12"></i>
                            Settings
                          </span>
                          </a>
                      </div>
                    </div>
                  </div>
                  <div class="card rounded-7">
                    <div class="card-body">
                      <div class="d-flex align-items-center">
                        <div href="javascript:void(0);" class="file-manager-image mb-0">
                          <img src="../assets/images/media/files/13.png" alt="img">
                        </div>
                        <h6 class="ms-3 mb-0 fw-semibold" style="cursor: pointer;" onclick="filterElements('none')">
                          <span class="total_project amount-total-project" ></span>
                          Projects
                        </h6>
                        <div class="ms-5 ms-auto">
                          <a href="javascript:void(0)" data-bs-toggle="dropdown" aria-expanded="false" class="">
                            <i class="fe fe-more-vertical fs-18"></i>
                          </a>
                          <ul class="dropdown-menu" style="">
                            <li>
                              <a class="dropdown-item" href="javascript:void(0);">Action</a>
                            </li>
                            <li>
                              <a class="dropdown-item" href="javascript:void(0);">Another action</a>
                            </li>
                            <li>
                              <a class="dropdown-item" href="javascript:void(0);">Something else here</a>
                            </li>
                            <li>
                              <a class="dropdown-item" href="javascript:void(0);">Separated link</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="progress progress-xs mb-2 mt-2">
                        <div class="progress-bar bg-warning" style="width: 0%;"></div>
                      </div>
                      <div class="d-flex">
                        <div class="d-flex">
                          <div class="d-flex row align-items-center cursor" style="cursor: pointer;"  onclick="filterElements('active')">
                            <h6 class="mt-2">
                              <i class="fe fe-circle text-success fs-12"></i> Progress
                            </h6>
                            <span class="text-muted ps-4 amount-progress"> </span>
                          </div>
                        </div>
                        <div class="d-flex row align-items-center cursor" style="cursor: pointer;"  onclick="filterElements('closed')">
                          <h6 class="mt-2">
                            <i class="fe fe-circle text-danger fs-12"></i> Closed
                          </h6>
                          <span class="text-muted ps-4 amount-closed"> </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                