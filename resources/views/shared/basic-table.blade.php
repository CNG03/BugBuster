<div class="table-responsive w-100 fs-16 overflow-auto" style="height: 400px;">
    <table class="table ticket-list-table table-hover">
        <caption class="caption-table">
            Showing {{ $entities['meta']['from'] }} to {{ $entities['meta']['to'] }} of {{ $entities['meta']['total'] }} entries
        </caption>
        <thead>
            <tr>
                <th scope="col" class="text-center" style="max-width: 80px">#</th>
                <th scope="col" colspan="2" style="width: 80px">Name</th>
                <th scope="col" colspan="3">Description</th>
                <th scope="col" style="width: 250px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($entities['data'] as $index => $entity)
            <tr data-value="{{ $entity['id']}}">
                <th scope="row" class="text-center id">{{ ($entities['meta']['current_page'] - 1) * $entities['meta']['per_page'] + $index + 1 }}</th>
                <td colspan="2" class="fw-normal name" style="width: 100px">{{ $entity['name']}}</td>
                <td colspan="3" class="fw-normal description" style="max-width: 200px">{{ $entity['description']}}</td>
                <td colspan="1" class="d-float" style="width: 250px;display: float;">
                    <a onclick="openEditForm(event, {{ json_encode($entity) }});" href="javascript:void(0);" class="m-2 btn btn-sm btn-success d-flex align-items-center justify-content-center w-40" style="float: left;">
                        <i class="fa-regular fa-pen-to-square pe-1"></i>
                        Edit
                    </a>
                    <a onclick="openDeleteForm(event, {{ $entity['id'] }});" href="javascript:void(0);" class="m-2 btn btn-sm btn-danger d-flex align-items-center justify-content-center w-40" style="float: left;">
                        <i class="fa-solid fa-delete-left pe-1"></i>
                        Delete
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-between">
    <div>
        <nav>
            <ul class="pagination">
                @if ($entities['links']['prev'])
                <li class="page-item">
                    <a class="page-link" href="{{ url()->current() }}?page={{ $entities['meta']['current_page'] - 1 }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                @endif
                @for ($i = 1; $i <= $entities['meta']['last_page']; $i++)
                <li class="page-item {{ $entities['meta']['current_page'] == $i ? 'active' : '' }}">
                    <a class="page-link" href="{{ url()->current() }}?page={{ $i }}">{{ $i }}</a>
                </li>
                @endfor
                @if ($entities['links']['next'])
                <li class="page-item">
                    <a class="page-link" href="{{ url()->current() }}?page={{ $entities['meta']['current_page'] + 1 }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
                @endif
            </ul>
        </nav>
    </div>
</div>

<!-- Add Bug Type Modal -->
<div class="modal fade" id="addBugTypeModal" tabindex="-1" aria-labelledby="addBugTypeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBugTypeModalLabel">New Bug Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addBugTypeForm" action="{{ route('addBugType') }}" method="POST">
                    @csrf
                    <input type="hidden" name="current_page" value="{{ request()->get('page', 1) }}">
                    <input type="hidden" name="per_page" value="{{ request()->get('per_page', 10) }}">
                    <div class="mb-3">
                        <label for="bugTypeName" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" id="bugTypeName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="bugTypeDescription" class="col-form-label">Description:</label>
                        <textarea class="form-control" id="bugTypeDescription" name="description" required></textarea>
                    </div>
                    <div class="d-none messege-error-area">
                        <label id="message-error" class="text-danger mb-1">Please fill in all fields before submitting.</label>
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


<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel">Edit Bug Type</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" action="{{ route('editBugType') }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="id" id="editEntityId">
                    <input type="hidden" name="current_page" id="editCurrentPage" value="{{ request()->query('page', 1) }}">
                    <div class="mb-3">
                        <label for="editName" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" id="editName" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="editDescription" class="col-form-label">Description:</label>
                        <textarea class="form-control" id="editDescription" name="description" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Delete Bug Type</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this bug type?
                <form id="deleteForm" action="{{ route('deleteBugType') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" id="deleteEntityId">
                    <input type="hidden" name="current_page" id="deleteCurrentPage" value="{{ request()->query('page', 1) }}">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
