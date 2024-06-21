<div class="table-responsive w-100 fs-16 overflow-auto" style="height: 400px;">
            <table class="table ticket-list-table table-hover " >
            <thead>
                <tr>
                <th scope="col" class="text-center" style="max-width: 80px">#</th>
                <th scope="col" colspan="2"  style="width: 80px">Name</th>
                <th scope="col" colspan="3">Description</th>
                <th scope="col"  style="width: 250px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entities['data'] as $entity)
                <tr data-value="{{ $entity['id']}}">
                    <th scope="row"  class="text-center id">1</th>
                    <td  colspan="2" class="fw-normal name" style="width: 100px">{{ $entity['name']}}</td>
                    <td colspan="3" class="fw-normal description" style="max-width: 200px">{{ $entity['created_at']}}</td>
                    <td colspan="3" class="fw-normal d-none created_at">{{ $entity['created_at']}}</td>
                    <td colspan="3" class="fw-normal d-none updated_at">{{ $entity['updated_at']}}</td>
                    <td colspan="1" class="d-float " style="width: 250px;display: float;">
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