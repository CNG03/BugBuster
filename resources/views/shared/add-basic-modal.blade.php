<div class="modal fade position-absolute" id="add-basic-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="">New Test Type</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-0">
                <span class="d-none id" data-value="id"></span>
                <div class="mb-3">
                    <label for="recipient-name" id="name-title" class="col-form-label">Name Test:</label>
                    <input type="text" class="form-control name">
                </div>
                <div class="mb-2">
                    <label for="message-text" class="col-form-label">Description:</label>
                    <textarea class="form-control description"></textarea>
                </div>
                <div class="d-none messege-error-area">
                    <label id="message-error" class=" text-danger mb-1">Input all field before submit</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary submit-btn" id="handleSubmitBtn" data-value="id" onclick="handleSubmit(event.target.getAttribute('data-value'))">Create</button>
            </div>
            </div>
        </div>
    </div>