<div class="row row-sm overflow-auto cell-table position-relative" style="max-height: 430px;">
  @foreach ($projects as $project)
  <div class="cell-element col-xl-3 col-lg-6 col-md-4 col-sm-4" data-value="{{ $project['id'] }}">
      <div class="card rounded-7">
          <div class="ms-auto">
              <div class="mt-2 file-dropdown me-2">
                  <a href="javascript:void(0);" class="text-muted" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fe fe-more-vertical fs-18"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-start">
                      @if (Session::get('user_role') =='ADMIN')
                      <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#project_form1" onclick="updateForm(event)"> <i class="fe fe-edit me-2"></i> Edit </a>
                      <a class="dropdown-item" href="javascript:void(0);"> <i class="fe fe-share me-2"></i> Share Link </a>
                      <a class="dropdown-item" href="javascript:void(0);" onclick="openDeleteBasicForm(event)"> <i class="fe fe-trash me-2"></i> Delete </a>
                      @else
                      <a class="dropdown-item" href="javascript:void(0);"> <i class="fe fe-share me-2"></i> Share Link </a>
                      @endif
                  </div>
              </div>
          </div>
          <a href="{{route('projectDetail', ['projectID' => $project['id']])}}" class="mx-auto" style="max-width: 50%;">
              <img src="../assets/images/media/files/13.png" alt="img" />
          </a>
          <h5 class="mb-0 mx-auto w-100 p-2 pt-1 text-center fs-15 text-nowrap overflow-hidden text-truncate">{{ $project['name'] }}</h5>
          <div class="card-footer">
              <div class="d-flex fs-14">
                  <span class="text-muted mb-0 fs-14 created_at">{{ \Carbon\Carbon::parse($project['created_at'])->format('l, F j, Y') }}</span>
                  <div class="ms-auto my-auto">
                      <span class="text-muted mb-0 fs-14 number_member">
                          <i class="fa-solid fa-user-group"></i>
                          {{count($project['members'])}}
                      </span>
                  </div>
                  <ul class="ms-auto my-auto d-none">
                      <li class="text-muted mb-0 fs-14 description">{{ $project['description'] }}</li>
                      <li class="text-muted mb-0 fs-14 created_by" data-value="{{ $project['admin_id'] }}">{{ $project['admin_id'] }}</li>
                      <li class="text-muted mb-0 fs-14 update_at">{{ $project['updated_at'] }}</li>
                      <li class="text-muted mb-0 fs-14 status" data-value="{{ $project['is_complete'] }}">{{ $project['is_complete'] }}</li>
                  </ul>
              </div>
              <div class="member d-none">
                  <ul class="managers">
                      @foreach ($project['members'] as $member) 
                      @if ($member['role_in_project'] == 'MANAGER')
                      <li data-value="{{ $member['user_id'] }}">{{ $member['user']['email'] }}</li>
                      @endif 
                      @endforeach
                  </ul>
                  <ul class="testers">
                      @foreach ($project['members'] as $member) 
                      @if ($member['role_in_project'] == 'TESTER')
                      <li data-value="{{ $member['user_id'] }}">{{ $member['user']['email'] }}</li>
                      @endif 
                      @endforeach
                  </ul>
                  <ul class="developers">
                      @foreach ($project['members'] as $member) 
                      @if ($member['role_in_project'] == 'DEVELOPER')
                      <li data-value="{{ $member['user_id'] }}">{{ $member['user']['email'] }}</li>
                      @endif 
                      @endforeach
                  </ul>
              </div>
          </div>
      </div>
  </div>
  @endforeach
</div>

<!-- Pagination -->
<div class="d-flex justify-content-between mt-3">
  <div>
      <nav>
          <ul class="pagination">
              @if ($pagination['current_page'] > 1)
              <li class="page-item">
                  <a class="page-link" href="{{ url()->current() }}?page={{ $pagination['current_page'] - 1 }}" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                  </a>
              </li>
              @endif
              @for ($i = 1; $i <= $pagination['last_page']; $i++)
              <li class="page-item {{ $pagination['current_page'] == $i ? 'active' : '' }}">
                  <a class="page-link" href="{{ url()->current() }}?page={{ $i }}">{{ $i }}</a>
              </li>
              @endfor
              @if ($pagination['current_page'] < $pagination['last_page'])
              <li class="page-item">
                  <a class="page-link" href="{{ url()->current() }}?page={{ $pagination['current_page'] + 1 }}" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                  </a>
              </li>
              @endif
          </ul>
      </nav>
  </div>
</div>
