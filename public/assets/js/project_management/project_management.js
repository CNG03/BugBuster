document.addEventListener('DOMContentLoaded', function() {
  accessToken = document.getElementById('accessToken').getAttribute('data-value');
  countProjects();
  updateProgressBar();
});

$(document).ready(function() {
    $(".project-tabs .nav-link").click(function(e) {
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
  console.log(document.getElementById('user_id'));
  var my_id = document.getElementById('user_id').getAttribute('data-value');
  var nav_bar = document.getElementById('navbar-project');
  var total_prj = nav_bar.querySelectorAll('.amount-total-project');
  var my_created_prj = nav_bar.querySelector('.amount-my-created');
  var progress_prj = nav_bar.querySelectorAll('.amount-progress');
  var closed_prj = nav_bar.querySelectorAll('.amount-closed');

  // Lấy số lượng từ cell-table
  const cell_table = document.querySelector('.row.row-sm.overflow-auto.cell-table');
  var cellElements = cell_table.querySelectorAll('.cell-element').length;
  var number_progress = cell_table.querySelectorAll('li.status[data-value="active"]').length;
  var number_created = cell_table.querySelectorAll(`li.created_by[data-value="${my_id}"]`).length;
  var number_closed = cell_table.querySelectorAll('li.status[data-value="closed"]').length;

  // Gán giá trị cho các elements hiển thị
  my_created_prj.textContent = number_created;
  total_prj.forEach(function(element) {
    element.textContent = cellElements;
  });

  progress_prj.forEach(function(element) {
    element.textContent = number_progress;
  });

  closed_prj.forEach(function(element) {
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

// Lọc 
function filterElements(filterType) {
  const cell_table = document.querySelector('.row.row-sm.overflow-auto.cell-table');
  var cellElements = cell_table.querySelectorAll('.cell-element');
  var my_id = document.getElementById('user_id').getAttribute('data-value');
  var section_title = document.getElementById('section-title');
  // Ẩn tất cả các phần tử
  cellElements.forEach(function(element) {
    element.classList.add('d-none');
  });

  // Hiển thị các phần tử tương ứng với filterType
  if (filterType === 'active') {
    section_title.innerHTML="Projects In Progress";
    var progressElements = cell_table.querySelectorAll('li.status[data-value="active"]');
    progressElements.forEach(function(element) {
      var parentCell = element.closest('.cell-element');
      if (parentCell) {
        parentCell.classList.remove('d-none');
      }
    });
  } else if (filterType === 'created') {
    section_title.innerHTML="My Created Projects";
    var createdElements = cell_table.querySelectorAll(`li.created_by[data-value="${my_id}"]`);
    createdElements.forEach(function(element) {
      var parentCell = element.closest('.cell-element');
      if (parentCell) {
        parentCell.classList.remove('d-none');
      }
    });
  } else if (filterType === 'closed') {
    section_title.innerHTML="Closed Projects";
    var closedElements = cell_table.querySelectorAll('li.status[data-value="closed"]');
    closedElements.forEach(function(element) {
      var parentCell = element.closest('.cell-element');
      if (parentCell) {
        parentCell.classList.remove('d-none');
      }
    });
  } else {
    section_title.innerHTML="All Projects";
    // Hiển thị tất cả các phần tử nếu không có filterType phù hợp
    cellElements.forEach(function(element) {
      element.classList.remove('d-none');
    });
  }
}

// Tìm kiếm
function searchProject() {
  var searchInput = document.getElementById('search-input').value.toLowerCase();
  const cell_table = document.querySelector('.row.row-sm.overflow-auto.cell-table');
  var projects = cell_table.querySelectorAll('.cell-element');
  projects.forEach(function(element) {
    var parentCell = element.closest('.cell-element');
    var projectName = element.querySelector('h5').innerText.toLowerCase();
    if (projectName.includes(searchInput)) {
      parentCell.classList.remove('d-none');
    } else {
      parentCell.classList.add('d-none');
    }
  });
}


// Mở form tạo mới Project
function openProjectForm(){
  var modal = document.getElementById('project-team');
  document.querySelector('.modal-title').textContent = 'Create Project';
  document.querySelector('.form-group.sub-edit-content').classList.add('d-none');
  document.querySelector('#submit_project_Btn').textContent = 'Create';
  document.querySelector('#submit_project_Btn').setAttribute('data-value', 'Create');
    var allInputs = Array.from(modal.querySelectorAll('input'));
    modal.querySelector('textarea').value="";
    var closedAllSearchForm =  Array.from(modal.querySelectorAll('.search-container .close-icon'));
    closedAllSearchForm.forEach(function(form) {
      form.click();
    });
    allInputs.forEach(function(input) {
      input.value = ''; 
    });
      var LiesAll = Array.from(modal.querySelectorAll('ul.form-control li'));

    LiesAll.forEach(function(li) {
      var parentUl = li.parentNode;
      parentUl.removeChild(li);
    });
  document.getElementById("createProjectBtn").click();
}


// Mở form update Project
function updateForm(event) {
    document.getElementById("createProjectBtn").click();
    var modalTitle = document.querySelector('.modal-title');
    var createButton = document.querySelector('#submit_project_Btn');
    modalTitle.textContent = 'Update Project';
    createButton.textContent = 'Update';

    // Lấy thông tin Project
    var cell = event.target.closest('.cell-element'); // Lấy phần tử cha là hàng (row)
    var id = cell.getAttribute('data-value'); // Lấy giá trị id từ cột đầu tiên (th)
    var name = cell.querySelector('h5').innerText; // Lấy giá trị tên từ cột thứ hai (td)
    var description = cell.querySelector('.description').innerText; // Lấy giá trị tên từ cột thứ hai (td)
    var manager_list = Array.from(cell.querySelectorAll('ul.managers li'));
    var tester_list = Array.from(cell.querySelectorAll('ul.testers li'));
    var developer_list = Array.from(cell.querySelectorAll('ul.developers li'));


    createButton.setAttribute('data-value', id);
    var modal_form = document.getElementById('project_form');
     modal_form.querySelector('input.name').value=name;
     modal_form.querySelector('textarea.description').value=description;
    modal.form.querySelector('id').value = id;
    var action = "{{ route('updateProject') }}"; // Lấy URL tương ứng với tên tuyến đường "createProject"

    modal_form.setAttribute('action', action);

     var manager_update = document.getElementById('manager-select');
     var dev_update = document.getElementById('dev-select');
     var tester_update = document.getElementById('tester-select');
     console.log(manager_list);
     manager_list.forEach(function(element) {
      if (element instanceof Element) {
        var id = element.getAttribute('data-value');
        var email = element.textContent;
        var newLi = document.createElement('li');
        newLi.innerHTML = `
          <li class="d-flex justify-content-between">
            <p class="email" data-value="${id}">${email}</p> 
            <button type="button" class="close border-0 bg-white" data-dismiss="modal" aria-label="Close"  onclick="removeUser(this)">
              <img style="width: 14px; height: 18px" src="assets/img/xmark-solid.svg" alt="X icon">
            </button>
          </li>
        `;

        manager_update.appendChild(newLi);
      }
    });

    tester_list.forEach(function(element) {
      if (element instanceof Element) {
        var id = element.getAttribute('data-value');
        var email = element.textContent;
        var newLi = document.createElement('li');
        newLi.innerHTML = `
          <li class="d-flex justify-content-between">
            <p class="email" data-value="${id}">${email}</p> 
            <button type="button" class="close border-0 bg-white" data-dismiss="modal" aria-label="Close"  onclick="removeUser(this)">
              <img style="width: 14px; height: 18px" src="assets/img/xmark-solid.svg" alt="X icon">
            </button>
          </li>
        `;
        tester_update.appendChild(newLi);

      }
    });

    developer_list.forEach(function(element) {
      if (element instanceof Element) {
        var id = element.getAttribute('data-value');
        var email = element.textContent;
        console.log(id, email);
        var newLi = document.createElement('li');
        newLi.innerHTML = `
          <li class="d-flex justify-content-between">
            <p class="email" data-value="${id}">${email}</p> 
            <button type="button" class="close border-0 bg-white" data-dismiss="modal" aria-label="Close"  onclick="removeUser(this)">
              <img style="width: 14px; height: 18px" src="assets/img/xmark-solid.svg" alt="X icon">
            </button>
          </li>
        `;
        dev_update.appendChild(newLi);
      }
    });

}


// Thêm member vào Project lúc tạo mới/update project
  function addUserToList(clickedLi, listId) {
    var email = clickedLi.textContent;
    var id =  clickedLi.dataset.value;
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
    // Xóa member khỏi Project
    function removeUser(button) {
      var li = button.parentNode.parentNode;
      li.remove();
       // Kiểm tra loại submit (Add/Update)
    }


  function handleSubmit(id){
    var modalBody = document.querySelector('.modal.fade.show .modal-content');
    var name = modalBody.querySelector('.name');
    var description = modalBody.querySelector('.description');

    getIdMember();
    var project = getProject();
    if(id == 'Create' & validateAddProject(name)){
        createProject(project);
    } 
    else if (id != 'Create' && validateEditProject(id, name, description)){
        console.log(id);
        updateProject(id, project);
    }

  }

// 

 // Validate tạo mới Project
 function validateAddProject(name) {
  // Kiểm tra trường "Name Project"  có rỗng hay không
  if (name.value.trim() == '') {
    document.querySelector('#project_form .nav-item.project-details-tab a').click();
    document.getElementById('message-error').innerHTML = 'Please enter project name!';
    document.querySelector('.messege-error-area').classList.remove('d-none');
    return false;
  }

  return true;
}
// Validate cập nhật Project
function validateEditProject(id, name_update, description_update) {
  if (name_update.value == '') {
    document.getElementById('message-error').innerHTML = 'Cannot update with empty fields!';
    document.querySelector('.messege-error-area').classList.remove('d-none');
    return false;
  }
  // Kiểm tra không cập nhật mới
    // var table = document.querySelector('.ticket-list-table');
  // var rowOld = table.querySelector(`[data-value="${id}"]`);
  // var nameOld = rowOld.querySelector('td:nth-child(2)').innerText.trim();
  // var descriptionOld = rowOld.querySelector('td:nth-child(3)').innerText.trim();
  // if (name_update.value.trim() == nameOld && description_update.value.trim() == descriptionOld) {
  //   document.getElementById('message-error').innerHTML = 'No updates have been made!';
  //   document.querySelector('.messege-error-area').classList.remove('d-none');
  //   return false;
  // }
  return true;

}

// Lấy thông tin project trong form
function getProject(){
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
  emailElements.forEach(function(element) {
    var id = element.getAttribute('data-value');
    var email = element.textContent;
    var member = { id: id, email: email };
    dataList.push(member);
  });
  return dataList;
}

// Lấy id từ form
function getIdMember(){
  // Lấy ID từ danh sách và chuyển đổi thành JSON
  var dataList = []; // Danh sách chứa thông tin thành viên
  var managersList = [];
  var testersList = [];
  var developersList = [];

  var managersElements = document.querySelectorAll('#manager-select p.email');
  var testersElements = document.querySelectorAll('#dev-select p.email');
  var developersElements = document.querySelectorAll('#tester-select p.email');

  managersElements.forEach(function(element) {
    var id = element.getAttribute('data-value');
    managersList.push({ user_id: id, role_in_project: 'MANAGER' });
  });

  testersElements.forEach(function(element) {
    var id = element.getAttribute('data-value');
    testersList.push({ user_id: id, role_in_project: 'TESTER' });
  });

  developersElements.forEach(function(element) {
    var id = element.getAttribute('data-value');
    developersList.push({ user_id: id, role_in_project: 'DEVELOPER' });
  });

  var projectData = {
    members: [...managersList, ...testersList, ...developersList]
  };

  var jsonData = JSON.stringify(projectData);

}

// Gọi api thêm project mới
function createProject(project){
  const { name, description, managers, testers, developers } = project;
  const totalMembers = managers.length + testers.length + developers.length;
  const url = 'http://127.0.0.1:8000/api/v1/projects';
  console.log(accessToken);
  const requestData = { // Chuyển đối tượng thành chuỗi JSON
    "name": `${name.value}`,
    "description": `${description.value}`
  };
  fetch(url, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'Authorization': 'Bearer ' + accessToken,
      'Accept': 'application/json'
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
      const createdAt = new Date(newProject.data.created_at);
      const formattedCreatedAt = createdAt.toISOString().split('T')[0];
      if(totalMembers != 0){
        addMemberToProject(newProject.data.id, formattedCreatedAt, newProject.data.created_by ,newProject.data.updated_at, project)
      } else {
        addProjectToTable(newProject.data.id, formattedCreatedAt, newProject.data.created_by, newProject.data.updated_at, project);
        countProjects();
        updateProgressBar();
      }
    })
    .catch(error => {
      console.error('There has been a problem with your fetch operation:', error);
    });
}

// Gọi api update project
function updateProject(project_id, project){
  const { name, description, managers, testers, developers } = project;
  const totalMembers = managers.length + testers.length + developers.length;
  const url = `http://127.0.0.1:8000/api/v1/projects/${project_id}`;
  const requestData = { // Chuyển đối tượng thành chuỗi JSON
    "name": `${name.value}`,
    "description": `${description.value}`
  };
  fetch(url, {
    method: 'PATCH',
    headers: {
      'Content-Type': 'application/json',
      'Authorization': 'Bearer ' + accessToken
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
      if(totalMembers != 0){
        updateMemberToProject(newProject.data.id, formattedCreatedAt, newProject.data.created_by ,newProject.data.updated_at, project)
      }
    })
    .catch(error => {
      console.error('There has been a problem with your fetch operation:', error);
    });
}


// Thêm thành viên vào Project
function addMemberToProject(project_id, created_at,created_by,updated_at, project) {
  const { managers, testers, developers } = project;
  var project_member = project;
  const members = [
    ...managers.map(manager => ({ user_id: manager.id, role_in_project: 'MANAGER' })),
    ...testers.map(tester => ({ user_id: tester.id, role_in_project: 'TESTER' })),
    ...developers.map(developer => ({ user_id: developer.id, role_in_project: 'DEVELOPER' }))
  ];
  const addMembersUrl = `http://127.0.0.1:8000/api/v1/projectmembers/${project_id}`; // Sửa thành 'project_id'
  const requestPayload = { members: members };

  fetch(addMembersUrl, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'Authorization': 'Bearer ' + accessToken
    },
    body: JSON.stringify(requestPayload)

  })
    .then(response => {
      if (response.status !== 201) {
        throw new Error('Network response was not ok');
      }
      addProjectToTable(project_id, created_at,created_by,updated_at, project_member)
      countProjects();
      updateProgressBar();
      return response.json();
    })

    .catch(error => {
      console.error('There has been a problem with your fetch operation:', error);
    });
}

// Thêm thành viên vào Project
function updateMemberToProject(project_id, created_at, created_by,updated_at, project) {
  const { managers, testers, developers } = project;
  var project_member = project;
  const members = [
    ...managers.map(manager => ({ user_id: manager.id, role_in_project: 'MANAGER' })),
    ...testers.map(tester => ({ user_id: tester.id, role_in_project: 'TESTER' })),
    ...developers.map(developer => ({ user_id: developer.id, role_in_project: 'DEVELOPER' }))
  ];
  const addMembersUrl = `http://127.0.0.1:8000/api/v1/projectmembers/${project_id}`; // Sửa thành 'project_id'
  const requestPayload = { members: members };

  fetch(addMembersUrl, {
    method: 'PATCH',
    headers: {
      'Content-Type': 'application/json',
      'Authorization': 'Bearer ' + accessToken
    },
    body: JSON.stringify(requestPayload)

  })
    .then(response => {
      if (response.status !== 201) {
        throw new Error('Network response was not ok');
      }
      return response.json();
    })

    .catch(error => {
      console.error('There has been a problem with your fetch operation:', error);
    });
}

// Thêm mới Project vào bảng
function addProjectToTable(project_id, created_at, created_by, updated_at, project_member ) {
  const {name, description, managers, testers, developers } = project_member;
    var is_active = "true";
    var number_member = managers.length + developers.length + testers.length;
    var managersHtml = managers.map(function(manager) {
      return `<li data-value="${manager.id}">${manager.email}</li>`;
    }).join('');

    var testersHtml = testers.map(function(tester) {
      return `<li data-value="${tester.id}">${tester.email}</li>`;
    }).join('');

    var developersHtml = developers.map(function(developer) {
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
                            <span class="text-muted mb-0 fs-14 create_by"> ${created_at} </span>
                            <div class="ms-auto my-auto">
                                <span class="text-muted mb-0 fs-14"><i class="fa-solid fa-user-group"></i> <span class="number_member">${number_member}</span> </span>
                            </div>
                            <ul class="ms-auto my-auto d-none">
                              <li class="text-muted mb-0 fs-14 description">${description.value}</li>
                              <li class="text-muted mb-0 fs-14 created_by">${created_by}</li>
                              <li class="text-muted mb-0 fs-14 update_at">${updated_at}</li>
                              <li class="text-muted mb-0 fs-14 status" data-value="progress">${is_active}</li>
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
function updateBug(id, nameInput, descriptionTextarea){
  // Lấy BugType cần update 
  var table = document.querySelector('.ticket-list-table'); // Lấy phần tử bảng
  var row = table.querySelector(`[data-value="${id}"]`);
  var name = row.querySelector('td:nth-child(2)'); // Lấy giá trị tên từ cột thứ hai (td)
  var description = row.querySelector('td:nth-child(3)'); // Lấy giá trị mô tả từ cột thứ ba (td)

  // Gán giá trị từ UpdateTestForm vào BugType

  

}

// Mở Modal Delete Project
  function openDeleteBasicForm(event) {
    // Khóa button delete khi chưa nhập mã
    deleteBtn = document.getElementById('delete-btn');
    deleteBtn.classList.remove('bg-danger');
    deleteBtn.disabled = true;
    deleteBtn.style.cursor = 'default';
    deleteBtn.style.fontWeight = 'normal';

    // Lấy thông tin Project
    var cell = event.target.closest('.cell-element'); // Lấy phần tử cha là hàng (row)
    var id = cell.getAttribute('data-value'); // Lấy giá trị id từ cột đầu tiên (th)
    var name = cell.querySelector('h5').innerText; // Lấy giá trị tên từ cột thứ hai (td)

    // Chọn các element trong Modal Delete
    var modal = document.querySelector('.delete-modal');
    var modalBody = document.querySelector('.modal.fade.delete-modal .modal-body');
    var idInput = modalBody.querySelector('.id');
    var nameInput = modalBody.querySelector('.name');
    var types = Array.from(modal.querySelectorAll('.type'));

    // Gán giá trị Project vào Modal 
    idInput.setAttribute('data-value', id);
    nameInput.innerHTML = name;
    types.forEach(function(element){
      element.textContent = 'project';
    });
    deleteBtn.setAttribute('data-value', id) // gán id vào button Delete
      // Mở modal
      $('#delete-modal').modal('show');
    }
    
// Check input unlock button Delete
var textConfirmInput = document.getElementById('text-confirm');
textConfirmInput.addEventListener('input', function() { // gọi function mỗi khi input thay đổi value
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

// Button xóa Project
function deleteConfirm(id){ // id truyền từ data-value của chính nó, được gán từ openDeleteBasicForm
  deleteProjectFromDB(id);
  var cell = document.querySelector(`.cell-table .cell-element[data-value="${id}"]`);
    cell.remove();

    $('#delete-modal').modal('hide');
    textConfirmInput.value=""; // reset input confirm 
    countProjects();
    updateProgressBar();
  }
  
function deleteProjectFromDB(id){
  const url = `http://127.0.0.1:8000/api/v1/projects/${id}`;
  fetch(url, {
    method: 'DELETE',
    headers: {
      'Content-Type': 'application/json',
      'Authorization': 'Bearer ' + accessToken,
      'Accept': 'application/json'
    },
  })
    .then(response => {
      if (response.status == 204) {
        countProjects();
        updateProgressBar();
        } else{
        throw new Error('Network response was not ok');
      }
      return response;
    })
    .catch(error => {
      console.error('There has been a problem with your fetch operation:', error);
    });
}

  // Thêm member vào Project lúc tạo mới/update project
  function addUserToList(clickedLi, listId) {
    var email = clickedLi.textContent;
    var id =  clickedLi.dataset.value;
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

  // Xóa member khỏi Project
  function removeUser(button) {
    var li = button.parentNode.parentNode;
    li.remove();
  }


  // Ẩn hiện kết quả search lúc tìm kiếm thành viên
  function searchList(listId, buttonId) {
    var list = document.getElementById(listId);
    var button = document.getElementById(buttonId);
    const searchInput = button.previousElementSibling.value;
    if(searchInput.trim() != ''){
      getUsersByEmail(searchInput, list);
      list.classList.remove('d-none');
      list.nextElementSibling.classList.remove('d-none');
    }
  }

 // Ẩn khung search
 function hideList(closed_btn, list){
  document.getElementById(list).classList.add('d-none');
  closed_btn.classList.add('d-none');
 }


// Lấy danh sách member theo kết quả tìm kiếm
function getUsersByEmail(searchCharacter, list) {
  const url = 'http://127.0.0.1:8000/api/v1/users';
  fetch(url, {
    headers: {
      'Authorization': 'Bearer ' + accessToken,
      'Accept': 'application/json'
    }
  })
    .then(response => response.json())
    .then(data => {
      const users = data.data.filter(user => user.email.includes(searchCharacter));
      insertMemberToList(list, users.map(user => ({ id: user.id, email: user.email })));
    })
    .catch(error => {
      console.error('There has been a problem with your fetch operation:', error);
    });
}

function insertMemberToList(list, users) {
  var type = list.id.split('-')[0];
  users.forEach(user => {
    list.innerHTML += `
      <li data-value="${user.id}" onclick="addUserToList(event.target, '${type}-select')">${user.email}</li>
    `;
  });
}
