<div class="table-responsive w-100">
<div class="container mt-1 mb-1">
<div class=" mt-4 mt-lg-0">
    <div class="row">
      <div class="col-md-12"  style="height: 400px; overflow: auto;">
        <div class="user-dashboard-info-box pt-2 table-responsive mb-0 bg-white p-4 pb-0 shadow-sm rounded">
          <table class="table manage-candidates-top mb-0 h-50 ">
            <thead>
              <tr>
                <th style="width: 300px">Candidate Name</th>
                <th class="text-center">ID</th>
                <th class="text-center">Role</th>
                <th class="text-center">Create At</th>
                <th class="text-center">Update At</th>
                <th class="action text-right">Action</th>
                </tr>
                </thead>
            <tbody>
                  
            @foreach ($users['data'] as $user)
              <tr class="candidates-list element" data-value="{{ $user['id']}}">
                <td class="title">
                  <div class="thumb">
                    <img class="img-fluid avatar" src="{{ $user['avatar'] }}" alt="">
                  </div>
                  <div class="candidate-list-details">
                    <div class="candidate-list-info">
                      <div class="">
                            <a href="#" class="fs-13-5 name">{{ $user['name'] }}</a>
                      </div>
                      <div class="candidate-list-option">
                        <ul class="list-unstyled">
                          <li><i class="fa-regular fa-envelope pe-1 email"></i>{{ $user['email'] }}</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </td>
                <td class="text-center">
                    <span>{{ $user['id'] }}</span>
                </td>

                @if($user['role'] == "ADMIN")
                    <td class="candidate-list-favourite-time text-center">
                        <div class="d-flex justify-content-center align-items-center">
                            <a class="text-black" href="#"><i class="fa-solid fa-user-tie pe-1 text-danger"></i></a>
                            <span class="candidate-list-time order-1 fw-normal fw-medium role ">Admin</span>
                        </div>
                    </td>
                @endif

                @if($user['role'] == "USER")
                    <td class="candidate-list-favourite-time text-center">
                        <div class="d-flex justify-content-center align-items-center">
                            <a class="text-black" href="#"><i class="fa-regular fa-user pe-1"></i></a>
                            <span class="candidate-list-time order-1 fw-normal role">User</span>
                        </div>
                    </td>
                @endif
                <td class="text-center">
                    <p class="mb-0 fw-normal created_at">noti</p>
                </td> 
                <td class="text-center">
                    <p class="mb-0 fw-normal updated_at">nh</p>
                </td>
                <td>
                  <ul class="list-unstyled mb-0 d-flex ">
                    <li><a href="#" class="text-info" onclick="openEditUserForm(id)" Edit"><i class="fas fa-pencil-alt ps-2"></i></a></li>
                    <li><a href="#" class="text-danger" onclick="openDeleteBasicForm(event)" Delete"><i class="far fa-trash-alt ps-4"></i></a></li>
                  </ul>
                </td>
              </tr>
              @endforeach


            </tbody>
          </table>

          <div class="text-center mt-2 d-none">
            <ul class="pagination justify-content-center mb-0">
              <li class="page-item disabled"> <span class="page-link">Prev</span> </li>
              <li class="page-item active" aria-current="page"><span class="page-link">1 </span> <span class="sr-only">(current)</span></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">...</a></li>
              <li class="page-item"><a class="page-link" href="#">25</a></li>
              <li class="page-item"> <a class="page-link" href="#">Next</a> </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
      
        </div>