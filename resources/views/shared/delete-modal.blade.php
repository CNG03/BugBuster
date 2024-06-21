<div class="modal fade position-fixed delete-modal" style="left: 5%; top: -2%" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLongTitle">Delete <span class="type">test</span> <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                    <div class="modal-body text-center">
                        <span class="id" data-value="id"></span>
                        <p>Are you sure you want to delete the <span class="type">test</span> <span class="text-purple font-weight-bold name">John Doe</span> ?</p>
                        <p>The deletion of this information is irreversible, and will delete every accesses for this <span class="type">user</span>.</p>
                        <p >Type <span class="text-green" style="user-select:none;">Synchronize</span> to authorize the operation:</p>
                        <input type="text" spellcheck="false" class="table-sorter-input pl-2" id="text-confirm">
                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" id="delete-btn" disabled class="px-2 rounded border-0 custom-disabled text-white" data-value="id" onclick="deleteConfirm(event.target.getAttribute('data-value'))">Delete <span class="type text-capitalize">test</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>