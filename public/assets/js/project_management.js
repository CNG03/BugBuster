document.addEventListener('DOMContentLoaded', function () {
  countProjects();
  updateProgressBar();
});

$(document).ready(function () {
  $(".project-tabs .nav-link").click(function (e) {
    e.preventDefault();
    $(".nav-link").removeClass("active");
    $(this).addClass("active");
    $(".content").hide();
    $("#" + $(this).data("target")).show();
  });

  // Chọn mặc định "Details"
  $("#project-organization").hide(); // Ẩn content2
  $(".project-organization-tab .nav-link").removeClass("active"); // Xóa lớp active khỏi mục "Organization"
});

// Hiển thị số lượng project trong navbar
function countProjects() {
  // Lấy các elements hiển thị 
  var nav_bar = document.getElementById('navbar-project');
  var total_prj = nav_bar.querySelectorAll('.amount-total-project');
  var my_created_prj = nav_bar.querySelector('.amount-my-created');
  var progress_prj = nav_bar.querySelectorAll('.amount-progress');
  var closed_prj = nav_bar.querySelectorAll('.amount-closed');

  // Lấy số lượng từ cell-table
  const cell_table = document.querySelector('.row.row-sm.overflow-auto.cell-table');
  var cellElements = cell_table.querySelectorAll('.cell-element').length;
  var number_progress = document.querySelectorAll('li.status[data-value="progress"]').length;
  var number_closed = document.querySelectorAll('li.status[data-value="closed"]').length;

  // Gán giá trị cho các elements hiển thị
  my_created_prj.textContent = 30;
  total_prj.forEach(function (element) {
    element.textContent = cellElements;
  });

  progress_prj.forEach(function (element) {
    element.textContent = number_progress;
  });

  closed_prj.forEach(function (element) {
    element.textContent = number_closed;
  });
}

// Hiển thị thanh ProgressBar
function updateProgressBar() {
  // Lấy giá trị progress và closed
  var progressValue = parseInt(document.querySelector('.amount-progress').textContent);
  var closedValue = parseInt(document.querySelector('.amount-closed').textContent);

  // Tính toán tỷ lệ
  var totalValue = progressValue + closedValue;
  var progressPercentage = (progressValue / totalValue) * 100;

  // Cập nhật width của progress-bar
  var progressBar = document.querySelector('.progress-bar');
  progressBar.style.width = progressPercentage + '%';
}


function openProjectForm() {
  document.getElementById("createProjectBtn").click();
  var modalTitle = document.querySelector('.modal-title');
  var createButton = document.querySelector('#submit_project_Btn');
  modalTitle.textContent = 'Create Project';
  createButton.textContent = 'Create';
}

function updateForm() {
  document.getElementById("createProjectBtn").click();
  var modalTitle = document.querySelector('.modal-title');
  var createButton = document.querySelector('#submit_project_Btn');
  var form = document.querySelector('#project_form');
  form.action = '/api/projects/{project}'; // sửa id project
  form.method = 'PATCH';
  modalTitle.textContent = 'Update Project';
  createButton.textContent = 'Update';
  // chưa gán data từ form sang


}

// Kiểm tra loại submit (Add/Update)
function handleSubmit(id) {
  var modalBody = document.querySelector('.modal.fade.show .modal-content');
  var name = modalBody.querySelector('.name');
  var description = modalBody.querySelector('.description');
  var pm = Array.from(document.querySelectorAll('#manager-select li p'));
  var developers = Array.from(document.querySelectorAll('#dev-select li p'));
  var testers = Array.from(document.querySelectorAll('#tester-select li p'));

  if (id == 'null' & validateAddProject(name)) {
    var project = getProject();
    getIdMember();
    createProject(project);
    addProjectToTable(project);
  }
  else if (id != 'null' && validateEditBug(id, name, description)) (
    updateBug(id, name, description)
  )
}

// 

// Validate tạo mới BugType
function validateAddProject(name) {
  // Kiểm tra trường "Name Project"  có rỗng hay không
  if (name.value.trim() == '') {
    document.getElementById('message-error').innerHTML = 'Please enter project name!';
    document.querySelector('.messege-error-area').classList.remove('d-none');
    return false;
  }

  return true;
}

// Validate cập nhật BugType
function validateEditBug(id, name_update, description_update) {
  // Kiểm tra trường "Name" và "Description" có rỗng hay không
  if (name_update.value == '' || description_update.value == '') {
    document.getElementById('message-error').innerHTML = 'Cannot update with empty fields!';
    document.querySelector('.messege-error-area').classList.remove('d-none');
    return false;
  }
  // Kiểm tra không cập nhật mới
  var table = document.querySelector('.ticket-list-table');
  var rowOld = table.querySelector(`[data-value="${id}"]`);
  var nameOld = rowOld.querySelector('td:nth-child(2)').innerText.trim();
  var descriptionOld = rowOld.querySelector('td:nth-child(3)').innerText.trim();
  if (name_update.value.trim() == nameOld && description_update.value.trim() == descriptionOld) {
    document.getElementById('message-error').innerHTML = 'No updates have been made!';
    document.querySelector('.messege-error-area').classList.remove('d-none');
    return false;
  }
  // Kiểm tra trùng tên với BugType khác
  var rows = table.querySelectorAll('tbody tr');
  for (var i = 0; i < rows.length; i++) {
    var row = rows[i];
    if (row != rowOld) {
      var nameCell = row.querySelector('td:nth-child(2)');
      console.log(nameCell.innerText)
      console.log(name_update.value.trim())
      if (nameCell.innerText == name_update.value.trim()) {
        document.getElementById('message-error').innerHTML = 'Duplicate name with different test type!';
        document.querySelector('.messege-error-area').classList.remove('d-none');
        return false;
      }
    }
  }
  return true;

}

// Lấy thông tin project trong form
function getProject() {
  var modalBody = document.querySelector('.modal.fade.show .modal-content');
  var name = modalBody.querySelector('.name');
  var description = modalBody.querySelector('.description');
  var is_active = true;
  var manager_list = getMember('manager-select');
  var developers_list = getMember('dev-select');
  var testers_list = getMember('tester-select');
  return {
    name: name,
    description: description,
    managers: manager_list,
    developers: developers_list,
    testers: testers_list
  };
}

// Lấy danh sách thành viên trong form
function getMember(parentId) {
  var parentSelect = document.getElementById(parentId);
  var emailElements = parentSelect.querySelectorAll('p.email');
  var dataList = [];
  emailElements.forEach(function (element) {
    var id = element.getAttribute('data-value');
    var email = element.textContent;
    var member = { id: id, email: email };
    dataList.push(member);
  });
  return dataList;
}

// Lấy id từ form
function getIdMember() {
  // Lấy ID từ danh sách và chuyển đổi thành JSON
  var dataList = []; // Danh sách chứa thông tin thành viên
  var managersList = [];
  var testersList = [];
  var developersList = [];

  var managersElements = document.querySelectorAll('#manager-select p.email');
  var testersElements = document.querySelectorAll('#dev-select p.email');
  var developersElements = document.querySelectorAll('#tester-select p.email');

  managersElements.forEach(function (element) {
    var id = element.getAttribute('data-value');
    managersList.push({ user_id: id, role_in_project: 'MANAGER' });
  });

  testersElements.forEach(function (element) {
    var id = element.getAttribute('data-value');
    testersList.push({ user_id: id, role_in_project: 'TESTER' });
  });

  developersElements.forEach(function (element) {
    var id = element.getAttribute('data-value');
    developersList.push({ user_id: id, role_in_project: 'DEVELOPER' });
  });

  var projectData = {
    members: [...managersList, ...testersList, ...developersList]
  };

  var jsonData = JSON.stringify(projectData);

  console.log(jsonData);
}

let accessToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvbG9naW4iLCJpYXQiOjE3MTg3NzcyMTUsImV4cCI6MTcxODgxMzIxNSwibmJmIjoxNzE4Nzc3MjE1LCJqdGkiOiJFT2dnOTZvYWhKbGFEVzgwIiwic3ViIjoiMSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.k8ggvlL9bJFcTNBrCNhLzp3N5WD85Ep_2f9n88mOEyo'; // Thay thế 'your_access_token' bằng token truy cập thực tế của bạn
// Gọi api thêm project mới
function createProject(project) {
  const { name, description, managers, testers, developers } = project;
  const url = 'http://127.0.0.1:8000/api/v1/projects';
  const requestData = { // Chuyển đối tượng thành chuỗi JSON
    "name": `${name.value}`,
    "description": `${description.value}`
  };
  fetch(url, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvbG9naW4iLCJpYXQiOjE3MTg3NzcyMTUsImV4cCI6MTcxODgxMzIxNSwibmJmIjoxNzE4Nzc3MjE1LCJqdGkiOiJFT2dnOTZvYWhKbGFEVzgwIiwic3ViIjoiMSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.k8ggvlL9bJFcTNBrCNhLzp3N5WD85Ep_2f9n88mOEyo'
    },
    body: JSON.stringify(requestData) // Convert thành JSON.stringify để gửi đi
  })
    .then(response => {
      if (response.status !== 201) {
        throw new Error('Network response was not ok');
      }
      return response.json();
    })
    .then(newProject => {

      addMemberToProject(newProject.data.id, newProject.data.created_at, newProject.data.created_by, project)
    })
    .catch(error => {
      console.error('There has been a problem with your fetch operation:', error);
    });
}

// Thêm thành viên vào Project
function addMemberToProject(project_id, created_at, created_by, project) {
  const { managers, testers, developers } = project;
  const members = [
    ...managers.map(manager => ({ user_id: manager.id, role_in_project: 'MANAGER' })),
    ...testers.map(tester => ({ user_id: tester.id, role_in_project: 'TESTER' })),
    ...developers.map(developer => ({ user_id: developer.id, role_in_project: 'DEVELOPER' }))
  ];
  const addMembersUrl = `http://127.0.0.1:8000/api/v1/projectmembers/${project_id}`; // Sửa thành 'project_id'
  const requestPayload = { members: members };
  console.log('Request Body:', JSON.stringify(requestPayload)); // In ra body của yêu cầu

  fetch(addMembersUrl, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvbG9naW4iLCJpYXQiOjE3MTg3NzcyMTUsImV4cCI6MTcxODgxMzIxNSwibmJmIjoxNzE4Nzc3MjE1LCJqdGkiOiJFT2dnOTZvYWhKbGFEVzgwIiwic3ViIjoiMSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.k8ggvlL9bJFcTNBrCNhLzp3N5WD85Ep_2f9n88mOEyo'
    },
    body: JSON.stringify(requestPayload)

  })
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.json();
    })
    .then(responseData => {
      addProjectToTable(project_id, created_at, created_by, project)
      console.log('Members added:', responseData);
    })
    .catch(error => {
      console.error('There has been a problem with your fetch operation:', error);
    });
}

// Thêm mới BugType vào bảng
function addProjectToTable(project_id, created_at, created_by, project) {
  const { name, description, managers, testers, developers } = project;
  var is_active = "progress";
  var created_by = "";
  var created_at = "";
  var updated_at = "";
  var number_member = managers.length + developers.length + testers.length;
  var managersHtml = managers.map(function (manager) {
    return `<li data-value="${manager.id}">${manager.email}</li>`;
  }).join('');

  var testersHtml = testers.map(function (tester) {
    return `<li data-value="${tester.id}">${tester.email}</li>`;
  }).join('');

  var developersHtml = developers.map(function (developer) {
    return `<li data-value="${developer.id}">${developer.email}</li>`;
  }).join('');
  var tableBody = document.querySelector('.cell-table.row.row-sm');
  // var allCell = modalBody.querySelectorAll('.cell-element');
  var newCellHtml = `
                    <div class="cell-element col-xl-3 col-lg-6 col-md-4 col-sm-4" data-value="${project_id}">
                      <div class="card rounded-7">
                        <div class="ms-auto">
                          <div class="mt-2 file-dropdown me-2">
                            <a href="javascript:void(0);" class="text-muted" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fe fe-more-vertical fs-18"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-start" style="">
                              <a class="dropdown-item" data-value="${project_id}" href="javascript:void(0);" onclick="updateForm(event)">
                                <i class="fe fe-edit me-2"></i> Edit </a>
                              <a class="dropdown-item" href="javascript:void(0);">
                                <i class="fe fe-share me-2"></i> Share </a>
                              <a class="dropdown-item" href="javascript:void(0);">
                                <i class="fe fe-download me-2"></i> Download </a>
                              <a class="dropdown-item" href="javascript:void(0);" onclick="deleteForm(event)" data-value="${project_id}" data-toggle="modal" data-target="#delete_project">
                                <i class="fe fe-trash me-2"></i> Delete </a>
                            </div>
                          </div>
                        </div>
                        <a href="filemanager-details.html" class="mx-auto" style="max-width: 50%;">
                          <img src="../assets/images/media/files/13.png" alt="img">
                        </a>
                        <h5 class="mb-0 mx-auto w-100 p-2 pt-1 text-center fs-15 text-nowrap overflow-hidden text-truncate">${name.value}</h5>
                        <div class="card-footer pe-3" style="height: 46px;">
                          <div class="d-flex fs-14">
                            <span class="text-muted mb-0 fs-14 create_by">${created_at}</span>
                            <div class="ms-auto my-auto">
                                <span class="text-muted mb-0 fs-14"><i class="fa-solid fa-user-group"></i> <span class="number_member">${number_member}</span> </span>
                            </div>
                            <ul class="ms-auto my-auto d-none">
                              <li class="text-muted mb-0 fs-14 description">${description.value}</li>
                              <li class="text-muted mb-0 fs-14 created_by">${created_by}</li>
                              <li class="text-muted mb-0 fs-14 update_at">${updated_at}</li>
                              <li class="text-muted mb-0 fs-14status" data-value="progress">${is_active}</li>
                            </ul>
                          </div>
                          <div class="member d-none">
                              <ul class="managers">
                              ${managersHtml}
                            </ul>
                            <ul class="testers">
                              ${testersHtml}
                            </ul>
                            <ul class="developers">
                              ${developersHtml}
                            </ul>
                        </div>
                      </div>
                    </div>

        `;

  // Thêm chuỗi HTML vào cuối phần tử tbody của bảng
  tableBody.innerHTML += newCellHtml;
  // Ẩn form
  document.getElementById('close-btn').click();

}

// Update BugType
function updateBug(id, nameInput, descriptionTextarea) {
  // Lấy BugType cần update 
  var table = document.querySelector('.ticket-list-table'); // Lấy phần tử bảng
  var row = table.querySelector(`[data-value="${id}"]`);
  var name = row.querySelector('td:nth-child(2)'); // Lấy giá trị tên từ cột thứ hai (td)
  var description = row.querySelector('td:nth-child(3)'); // Lấy giá trị mô tả từ cột thứ ba (td)

  // Gán giá trị từ UpdateTestForm vào BugType
  name.innerText = nameInput.value;
  description.innerText = descriptionTextarea.value;

  // Đóng modal
}

// Mở Modal Delete BugType
function openDeleteBasicForm(event) {
  // Khóa button delete khi chưa nhập mã
  deleteBtn = document.getElementById('delete-btn');
  deleteBtn.classList.remove('bg-danger');
  deleteBtn.disabled = true;
  deleteBtn.style.cursor = 'default';
  deleteBtn.style.fontWeight = 'normal';

  // Lấy thông tin BugType
  var row = event.target.closest('tr'); // Lấy phần tử cha là hàng (row)
  var id = row.querySelector('th').innerText; // Lấy giá trị id từ cột đầu tiên (th)
  var name = row.querySelector('td:nth-child(2)').innerText; // Lấy giá trị tên từ cột thứ hai (td)

  // Chọn các element trong Modal Delete
  var modalBody = document.querySelector('.modal.fade.position-absolute.delete-modal .modal-body');
  var idInput = modalBody.querySelector('.id');
  var nameInput = modalBody.querySelector('.name');

  // Gán giá trị BugType vào Modal 
  idInput.setAttribute('data-value', id);
  nameInput.innerHTML = name;
  deleteBtn.setAttribute('data-value', id) // gán id vào button Delete

  // Mở modal
  $('#delete-modal').modal('show');
}

// Check input unlock button Delete
var textConfirmInput = document.getElementById('text-confirm');
textConfirmInput.addEventListener('input', function () { // gọi function mỗi khi input thay đổi value
  var deleteBtn = document.getElementById('delete-btn');
  var inputValue = textConfirmInput.value.trim();

  if (inputValue === 'Synchronize') { // mở khóa delete khi nhập Synchronize vào input
    deleteBtn.disabled = false;
    deleteBtn.style.cursor = 'pointer';
    deleteBtn.style.fontWeight = 'bold';
    deleteBtn.classList.add('bg-danger');

  } else {
    deleteBtn.disabled = true;
    deleteBtn.style.cursor = 'default';
    deleteBtn.style.fontWeight = 'normal';
  }
});

// Xóa BugType
function deleteConfirm(id) { // id truyền từ data-value của chính nó, được gán từ openDeleteTestForm
  var table = document.querySelector('.ticket-list-table'); // Lấy phần tử bảng
  var row = table.querySelector(`[data-value="${id}"]`); // tìm row chứa data-value = id
  row.remove();
  $('#delete-modal').modal('hide');
  textConfirmInput.value = ""; // reset input confirm 
}

// function showDevList() {
//     var devList = document.getElementById('dev-list');
//     devList.classList.toggle('d-none');
//   }

//   document.addEventListener('click', function(event) {
//     var devList = document.getElementById('dev-list');
//     var searchBtn = document.getElementById('searchDevBtn');

//     var targetElement = event.target; // Phần tử mà người dùng click vào

//     // Kiểm tra xem người dùng đã click vào nút hoặc là trong danh sách dev hay không
//     var isDevList = targetElement === devList || devList.contains(targetElement);
//     var searchClicked = targetElement === searchBtn || searchBtn.contains(targetElement);

//     // Xử lý hiển thị/ẩn danh sách dev dựa trên việc click vào nút hoặc ra khỏi danh sách
//     if (searchClicked) {
//       devList.classList.toggle('d-none');
//     } else if (!isDevList) {
//       devList.classList.add('d-none');
//     }
//   });


function toggleList(listId, buttonId) {
  var list = document.getElementById(listId);
  var button = document.getElementById(buttonId);

  // Xử lý sự kiện click trên phần tử cha bao bọc danh sách
  document.addEventListener('click', function (event) {
    var targetElement = event.target; // Phần tử mà người dùng click vào

    // Kiểm tra xem người dùng đã click vào nút hoặc là trong danh sách hay không
    var isList = targetElement === list || list.contains(targetElement);
    var isButton = targetElement === button || button.contains(targetElement);

    // Xử lý hiển thị/ẩn danh sách dựa trên việc click vào nút hoặc ra khỏi danh sách
    if (isButton) {
      list.classList.remove('d-none');
    } else if (!isList) {
      list.classList.add('d-none');
    }
  });
}

function addUserToList(clickedLi, listId) {
  var email = clickedLi.textContent;
  var id = clickedLi.dataset.value;

  var targetList = document.getElementById(listId);
  var newLi = document.createElement('li');
  newLi.innerHTML = `
      <li class="d-flex justify-content-between">
        <p class="email" data-value="${id}">${email}</p> 
        <button type="button" class="close border-0 bg-white" data-dismiss="modal" aria-label="Close"  onclick="removeUser(this)">
          <img style="width: 14px; height: 18px" src="assets/img/xmark-solid.svg" alt="X icon">
        </button>
      </li>
    `;

  targetList.appendChild(newLi);
  clickedLi.parentNode.removeChild(clickedLi);
}

function removeUser(button) {
  var li = button.parentNode.parentNode;
  li.remove();
}