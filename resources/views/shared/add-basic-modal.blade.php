<div class="modal fade position-absolute" id="add-basic-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">New Test Type</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-0">
                <form id="addTestTypeForm" action="{{ route('addTestType') }}" method="POST">
                    @csrf
                    <input type="hidden" name="current_page" id="current_page" value="{{ request()->query('page', 1) }}">
                    <div class="mb-3">
                        <label for="testName" class="col-form-label">Name Test:</label>
                        <input type="text" class="form-control" id="testName" name="name" required>
                    </div>
                    <div class="mb-2">
                        <label for="testDescription" class="col-form-label">Description:</label>
                        <textarea class="form-control" id="testDescription" name="description" required></textarea>
                    </div>
                    <div class="d-none messege-error-area">
                        <label id="message-error" class="text-danger mb-1">Input all fields before submit</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
