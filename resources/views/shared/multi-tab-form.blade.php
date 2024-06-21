<!-- Modal -->
<div class="modal fade position-fixed" style="left: 3%; top: 3%" id="project_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header p-0 border-0  d-flex flex-column">
        <div class="d-flex w-100 align-items-center justify-content-between py-3 px-2">
            <h3 class="modal-title fw-normal pt-2 pb-1" id="exampleModalLongTitle">Create Project</h3>
            <button type="button" class="close border-0 bg-white" data-dismiss="modal" aria-label="Close">
                <img style="width: 14px; height: 18x" src="{{ asset('assets') }}/img/xmark-solid.svg" alt="X icon">
            </button>
        </div>
        <ul class="nav w-100 pl-2 nav-tabs project-tabs">
            <li class="nav-item project-details-tab">
                <a class="nav-link active" data-target="project-detail" href="#">Details</a>
            </li>
            <li class="nav-item project-organization-tab">
                <a class="nav-link" data-target="project-organization" href="#">Organization</a>
            </li>
        </ul>
      </div>
      
      <form class="modal-body" action="{{ route('createProject') }}" method="POST" >
      @csrf
        <div  id="project-team">
          <input type="text" name="id" class="d-none id">
          <div class="col-12 content" id="project-detail">
                <div class="form-group sub-edit-content d-flex justify-content-between">
                    <label for="name" class="col-form-label fw-normal created_by">Created by: Admin<span class="fs-15 fst-italic ps-1 text-green created_at">(12-11-2023 11:56)</span></label>
                    <label for="name" class="col-form-label fw-normal">Status: <span class="status text-danger">Progress</span></label>
              </div>
              <div class="form-group">
                <label for="name" class="col-form-label fw-normal">Name project:</label>
                <input type="text" class="form-control name" name="name">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label fw-normal description">Description:</label>
                <textarea class="form-control description" name="description"></textarea>
              </div>
              <div class="d-none messege-error-area">
                    <label id="message-error" class=" text-danger mb-1">Input all field before submit</label>
                </div>
          </div>
          <div class="col-12 content" id="project-organization">

                      <div class="p-2">
                      <div class="d-flex justify-content-between">
                                <label class="col-form-label">Project Manager</label>
                                <div class="position-relative" style="bottom: -4px">
                                <div class="search-container">
                                    <input type="search" spellcheck="false" class="form-control px-2 py-1 fs-14" placeholder="Search..." style="max-height: 30px;">
                                    <button class="btn btn-primary position-absolute end-0 top-40 translate-middle-y" style="max-height: 30px; top: 48%" onclick="searchList('manager-list', 'searchManagerBtn');" id="searchManagerBtn">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                    <ul class="position-absolute d-none border-0 fs-14 start-0 bot-0 translate-middle-y rounded custom-list" id="manager-list">
                                       
                                        </ul>
                                    <i class="fa-solid fa-xmark d-none close-icon " onclick="hideList(this, 'manager-list')"></i>
                                </div>
                                </div>

                                </div>
                                <!-- <div class="ml-auto d-flex justify-content-center align-items-center flex-wrap-reverse">
                                    <input type="button" class="x-btn text-white py-1 px-2 rounded border-0 custom-purple small select-cleaner" value="Clear" />
                                </div> -->
                                <ul class="form-control overflow-auto" id="manager-select" style="height: 95px;" name="manager-list">
                                
                                    
                                
                            </ul>
                            <span asp-validation-for="Command.Team" class="text-danger"></span>
                        </div>
                        <div class="p-2">
                            <div class="d-flex justify-content-between">

                                <label class="col-form-label">Developers</label>
                                <div class="position-relative" style="bottom: -4px">
                                <div class="search-container">
                                    <input type="search" spellcheck="false" class="form-control px-2 py-1 fs-14" placeholder="Search..." style="max-height: 30px;">
                                    <button class="btn btn-primary position-absolute end-0 top-40 translate-middle-y" style="max-height: 30px; top: 48%" onclick="searchList('dev-list', 'searchDevBtn');" id="searchDevBtn">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                    <ul class="position-absolute d-none border-0 fs-14 start-0 bot-0 translate-middle-y rounded custom-list" id="dev-list">
                                 
                                    </ul>
                                    <i class="fa-solid fa-xmark close-icon d-none" onclick="hideList(this, 'dev-list')"></i>
                                </div>
                                </div>
                              
                            </div>
                            <ul class="form-control overflow-auto" id="dev-select" style="height: 95px;" name="dev-list">
                                
                                    
                                
                            </ul>
                            <span asp-validation-for="Command.Team" class="text-danger"></span>
                        </div>

                        <div class="p-2">
                            <div class="d-flex justify-content-between">

                                <label class="col-form-label">Testers</label>
                                <div class="position-relative" style="bottom: -4px">
                                <div class="search-container">
                                    <input type="search" spellcheck="false" class="form-control px-2 py-1 fs-14" placeholder="Search..." style="max-height: 30px;">
                                    <button class="btn btn-primary position-absolute end-0 top-40 translate-middle-y" style="max-height: 30px; top: 48%" onclick="searchList('tester-list', 'searchTesterBtn');" id="searchTesterBtn">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                    <ul class="position-absolute d-none border-0 fs-14 start-0 bot-0 translate-middle-y rounded custom-list" id="tester-list">
                      
                                    </ul>
                                    <i class="fa-solid fa-xmark close-icon d-none" onclick="hideList(this, 'tester-list')"></i>
                                </div>
                                </div>
                              
                            </div>
                            <ul class="form-control overflow-auto" id="tester-select" style="height: 95px;" name="tester-list">
                                
                                    
                                
                            </ul>
                            <span asp-validation-for="Command.Team" class="text-danger"></span>
                        </div>
                        
          </div>
          <div class="modal-footer">
            <div type="button" class="btn btn-secondary" id="close-btn" data-dismiss="modal">Close</div>
            <button type="submit" id="submit_project_Btn" data-value="null" onclick="handleSubmit(event.target.getAttribute('data-value'))" class="btn btn-primary green">Create</button>
    
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
