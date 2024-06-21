<!-- Modal -->
<div class="modal fade position-fixed" style="left: 3%; top: 3%" id="user-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header p-0 border-0  d-flex flex-column">
        <div class="d-flex w-100 align-items-center justify-content-between py-3 px-2 position-relative">
            <h3 class="modal-title fw-normal pt-2 pb-1" id="exampleModalLongTitle">Create Project</h3>
            <button data-dismiss="modal" type="button" style="right: 12px; top: 8px;" class="position-absolute close border-0 bg-white" data-dismiss="modal" aria-label="Close">
                <img style="width: 14px; height: 18x" src="{{ asset('assets') }}/img/xmark-solid.svg" alt="X icon">
            </button>
        </div>
        <ul class="nav w-100 pl-2 nav-tabs infomation-tabs">
            <li class="nav-item account-details-tab" onclick="toggleBtn('account')">
                <a class="nav-link active" data-target="account-detail" href="#">Account</a>
            </li>
            <li class="nav-item image-tab" onclick="toggleBtn('avatar')">
                <a class="nav-link" data-target="avatar-detail" href="#" >Profile Picture</a>
            </li>
        </ul>
      </div>
      
      <div class="modal-body">
        <div  id="project-team">
          <div class="col-12 content" id="account-detail">
              <div class="form-group">
                            <label for="name" class="col-form-label fw-normal">Permission:</label>
                        <select asp-for="Command.Team" class="form-control" id="pm-team-select">
                                  
                                  <option value="@demo.Id">Admin </option>
                                  <option value="@demo.Id">User </option>
                 
                          </select>
              </div>
              <div class="form-group">
                <label for="name" class="col-form-label fw-normal">Username:</label>
                <input type="text" class="form-control" id="username">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label fw-normal">Password:</label>
                <input type="password" class="form-control" id="password">
              </div>
              <div class="form-group">
                            <label for="name" class="col-form-label fw-normal">Email:</label>
                            <input type="email" class="form-control" id="email">
              </div>

          </div>

          <div class="col-12 content d-none align-items-center justify-content-center row" id="avatar-detail">
                    <div class="image-container">
                    <img id="preview" class="image-preview" src="assets\images\users\1.jpg">
                </div>
                <input type="file" id="image-upload" style="display: none;">
                <button class="upload-button border-0 btn-primary rounded mb-2" onclick="openFilePicker()" style="width: 100px;">Upload</button>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" id="submit_project_Btn" class="btn btn-primary green">Create</button>
    
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
