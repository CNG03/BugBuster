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
                    <a onclick="openEditForm(event);" href="javascript:void(0);" class="m-2 btn btn-sm btn-success d-flex align-items-center justify-content-center w-40" style="float: left;">
                        <i class="fa-regular fa-pen-to-square pe-1"></i>
                        Edit
                    </a>
                    <a onclick="openDeleteForm(event)" href="javascript:void(0);" class="m-2 btn btn-sm btn-danger d-flex align-items-center justify-content-center w-40" style="float: left;">
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
