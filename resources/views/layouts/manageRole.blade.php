<!-- Modal -->
<div class="modal fade" id="manage_role" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header p-2  d-flex flex-column">
        <div class="d-flex w-100 align-items-center justify-content-between py-3 px-2">
            <h3 class="modal-title fw-normal pt-2 pb-1" id="exampleModalLongTitle">Manage roles</h3>
            <button type="button" class="close border-0 bg-white" data-dismiss="modal" aria-label="Close">
                <img style="width: 14px; height: 18x" src="{{ asset('assets') }}/img/xmark-solid.svg" alt="X icon">
            </button>
        </div>
      </div>
      
      <form asp-controller="User" asp-action="ManageUserRoles" asp-route-page="@Model.Page"  class="py-5">
        <div class="modal-body">
            <p>User: <span class="text-purple">@Model.UserWithRoles.UserName</span></p>
            <input type="hidden" asp-for="UserWithRoles.UserId" />
            <div class="form-group">
                <label class="font-weight-bold">Assign or modify role linked to this user.</label>
                <select asp-for="UserWithRoles.SelectedRoles" class="form-control h-100" id="role-mgmt-select" multiple>
                   
                            <option value="@role.Id" selected="selected">@role.Name</option>
                       
                            <option value="@role.Id">@role.Name</option>
                    
                </select>
            </div>
        </div>

        <div class="modal-footer">
            <input type="submit" class="x-btn green px-4" value="Update" />
        </div>
    </form>

    </div>
  </div>
</div>
