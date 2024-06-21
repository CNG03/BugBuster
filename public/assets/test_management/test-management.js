document.addEventListener('DOMContentLoaded', function() {
  accessToken = document.getElementById('accessToken').textContent;
});

// Mở form AddTestType
function openAddTestForm() {
  // Chọn các element trong form
  var modalBody = document.querySelector('.modal.fade.position-absolute .modal-content');
  var title = modalBody.querySelector('h1');
  var nameInput = modalBody.querySelector('.name');
  var descriptionTextarea = modalBody.querySelector('.description');
  var submitBtn = modalBody.querySelector('.submit-btn');
  
  // Reset Form
  nameInput.value = '';
  descriptionTextarea.value = '';
  document.querySelector('.messege-error-area').classList.add('d-none'); //clear error message

  // Thay đổi tiêu đề và nút submit
  title.innerHTML="Create Test Type"
  submitBtn.innerHTML="Create";
  submitBtn.setAttribute('data-value', null)
  submitBtn.classList.remove('btn-success');

  // Mở modal
  $('#add-basic-modal').modal('show');
}

// Mở form UpdateTestType
function openEditForm(event) {
    // Lấy TestType cần update
    var row = event.target.closest('tr'); // Lấy phần tử cha là hàng (row)
    var id = row.querySelector('th').innerText; // Lấy giá trị id từ cột đầu tiên (th)
    var name = row.querySelector('td:nth-child(2)').innerText; // Lấy giá trị tên từ cột thứ hai (td)
    var description = row.querySelector('td:nth-child(3)').innerText; // Lấy giá trị mô tả từ cột thứ tư (td)
  
    // Chọn các element trong form update
    var modalBody = document.querySelector('.modal.fade.position-absolute .modal-content');
    var title = modalBody.querySelector('h1');
    var idElement = modalBody.querySelector('.id');
    var nameInput = modalBody.querySelector('.name');
    var descriptionTextarea = modalBody.querySelector('.description');
    var submitBtn = modalBody.querySelector('.submit-btn');
  
    // Gán data TestType vào form update
    title.innerHTML="Update Test Type"
    idElement.setAttribute('data-value', id);
    nameInput.value = name;
    descriptionTextarea.value = description;
    submitBtn.innerHTML="Update";
    submitBtn.setAttribute('data-value', id) //gán id TestType vào button Submit
    submitBtn.classList.add('btn-success');

    // Mở modal
    document.querySelector('.messege-error-area').classList.add('d-none'); //clear error message
    $('#add-basic-modal').modal('show');

  }

// Kiểm tra loại submit (Add/Update)
function handleSubmit(id){
  var modalBody = document.querySelector('.modal.fade.position-absolute .modal-content');
  var name = modalBody.querySelector('.name');
  var description = modalBody.querySelector('.description');
  if(id == 'null' && validateAddTest(name, description)){
    addTestToDB(name, description);
    addRowToTable();
  } 
  else if (id != 'null' && validateEditTest(id, name, description)){
    updateTestInDB(id, name, description);
  }
    
  
}

// Validate tạo mới TestType
function validateAddTest(name, description) {
  // Kiểm tra trường "Name" và "Description" có rỗng hay không
  if (name.value.trim() == '') {
    document.getElementById('message-error').innerHTML = 'Please fill in all fields!';
    document.querySelector('.messege-error-area').classList.remove('d-none');
    return false;
  }
  // Kiểm tra trùng tên
  var table = document.querySelector('.ticket-list-table');
  var rows = table.querySelectorAll('tbody tr');
  for (var i = 0; i < rows.length; i++) {
    var row = rows[i];
    var nameCell = row.querySelector('td:nth-child(2)');
    if (nameCell.innerText.trim() == name.value.trim() ) {
      document.getElementById('message-error').innerHTML = 'The ' + name.value + ' already exists!';
      document.querySelector('.messege-error-area').classList.remove('d-none');
      return false;
    }
  }

  return true;
}

// Validate cập nhật TestType
function validateEditTest(id, name_update, description_update) {
  // Kiểm tra trường "Name" và "Description" có rỗng hay không
  if (name_update.value == '') {
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
    // Kiểm tra trùng tên với TestType khác
    var rows = table.querySelectorAll('tbody tr');
    for (var i = 0; i < rows.length; i++) {
      var row = rows[i];
      if(row != rowOld){ 
        var nameCell = row.querySelector('td:nth-child(2)');
        if (nameCell.innerText == name_update.value.trim() ) {
          document.getElementById('message-error').innerHTML = 'Duplicate name with different test type!';
          document.querySelector('.messege-error-area').classList.remove('d-none');
          return false;
        }
      }
    }
    return true;
  
}

// Gọi api thêm project mới
function addTestToDB(name, description){
  const url = 'http://127.0.0.1:8000/api/v1/testtypes';
  const requestData = { // Chuyển đối tượng thành chuỗi JSON
    "name": `${name.value}`,
  };
  fetch(url, {
    method: 'POST',
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
    .then(newTest => {
      const createdAt = new Date(newTest.data.created_at);
      const updatedAt = new Date(newTest.data.updated_at);
      const formattedCreatedAt = createdAt.toISOString().split('T')[0];
      const formattedUpdateddAt = updatedAt.toISOString().split('T')[0];
      addRowToTable(formattedCreatedAt, formattedUpdateddAt);
    })
    .catch(error => {
      console.error('There has been a problem with your fetch operation:', error);
    });
}

// Gọi api update project
function updateTestInDB(id, name, description){
  const url = `http://127.0.0.1:8000/api/v1/testtypes/${id}`;
  const requestData = { // Chuyển đối tượng thành chuỗi JSON
    "name": `${name.value}`,
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
 
      return response.json();
    })
    .then(newTest => {
      const createdAt = new Date(newTest.data.created_at);
      const updatedAt = new Date(newTest.data.updated_at);
      const formattedCreatedAt = createdAt.toISOString().split('T')[0];
      const formattedUpdateddAt = updatedAt.toISOString().split('T')[0];
      updateTest(id, formattedCreatedAt, formattedUpdateddAt)
    })
    .catch(error => {
      console.error('There has been a problem with your fetch operation:', error);
    });
}

// Thêm mới TestType vào bảng
function addRowToTable(created_at, updated_at) {
    var tableBody = document.querySelector('.table-responsive .table tbody');
    var modalBody = document.querySelector('.modal.fade.position-absolute .modal-content');
    var nameInput = modalBody.querySelector('.name');
    var descriptionTextarea = modalBody.querySelector('.description');
    var newRowHtml = `
          <tr data-value="${tableBody.children.length + 1}">
            <th scope="row" class="text-center">${tableBody.children.length + 1}</th>
            <td colspan="2" class="fw-normal name">${nameInput.value}</td>
            <td colspan="3" class="fw-normal description">${descriptionTextarea.value}</td>
            <td colspan="3" class="fw-normal d-none created_at">${created_at}</td>
            <td colspan="3" class="fw-normal d-none updated_at">${updated_at}</td>
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
        `;
      
        // Thêm chuỗi HTML vào cuối phần tử tbody của bảng
        tableBody.innerHTML += newRowHtml;
        // Ẩn form
        $('#add-basic-modal').modal('hide');
}

// Update TestType
function updateTest(id, nameInput, descriptionTextarea){
  // Lấy TestType cần update 
  var table = document.querySelector('.ticket-list-table'); // Lấy phần tử bảng
  var row = table.querySelector(`[data-value="${id}"]`);
  var name = row.querySelector('td:nth-child(2)'); // Lấy giá trị tên từ cột thứ hai (td)
  var description = row.querySelector('td:nth-child(3)'); // Lấy giá trị mô tả từ cột thứ ba (td)

  // Gán giá trị từ UpdateTestForm vào TestType
  name.innerText = nameInput.value;
  description.innerText = descriptionTextarea.value;

  // Đóng modal
  $('#add-basic-modal').modal('hide');
}

// Mở Modal Delete Project
function openDeleteForm(event) {
  // Khóa button delete khi chưa nhập mã
  deleteBtn = document.getElementById('delete-btn');
  deleteBtn.classList.remove('bg-danger');
  deleteBtn.disabled = true;
  deleteBtn.style.cursor = 'default';
  deleteBtn.style.fontWeight = 'normal';

  // Lấy thông tin Test
  var row = event.target.closest('tr'); // Lấy phần tử cha là hàng (row)
  var id = row.getAttribute('data-value'); // Lấy giá trị id từ cột đầu tiên (th)
  var name = row.querySelector('.name').innerText; // Lấy giá trị tên từ cột thứ hai (td)

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
    element.textContent = 'test';
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
  deleteTestFromDB(id);
  $('#delete-modal').modal('hide');
  textConfirmInput.value=""; // reset input confirm 
}

function deleteTestFromDB(id){
const url = `http://127.0.0.1:8000/api/v1/testtypes/${id}`;
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

      deleteTest(id)
      } else{
      throw new Error('Network response was not ok');
    }
    return response;
  })
  .catch(error => {
    console.error('There has been a problem with your fetch operation:', error);
  });
}

// Xóa TestType
function deleteTest(id){ // id truyền từ data-value của chính nó, được gán từ openDeleteTestForm
    var table = document.querySelector('.ticket-list-table'); // Lấy phần tử bảng
    var row = table.querySelector(`[data-value="${id}"]`); // tìm row chứa data-value = id
    row.remove();
    $('#delete-modal').modal('hide');
    textConfirmInput.value=""; // reset input confirm 
  }
  

  function goToPage(type) {
    var page_number = parseInt(document.getElementById('page-number').value);
    var tableContainer = document.querySelector('.table-responsive');
    var tableRows = tableContainer.querySelectorAll('tbody tr');
    var pageSize = 400;
    switch (type) {
      case 1:
        // Chuyển về trang đầu
        page_number = 1;
        break;
        case 'previous':
          // Chuyển về trang trước
          if (page_number > 1) {
            page_number--;
          } else {
            var tableRows = document.querySelectorAll('tr');
            tableRows.forEach(function(row, index) {
              if (index < 2) {
                var links = row.querySelectorAll('a');
                links.forEach(function(link) {
                  link.style.display = 'none';
                });
              }
            });
          }
          break;
      case 'next':
        // Chuyển về trang sau
        var totalPages = Math.ceil(tableRows.length / pageSize);
        if (page_number < totalPages) {
          page_number++;
        }
        break;
      case 'last':
        // Chuyển về trang cuối
        var totalPages = Math.ceil(tableRows.length / pageSize);
        page_number = totalPages;
        break;
    }
  
    // Hiển thị trang được chọn
    displayPage(page_number);
  
    console.log('Go to page:', page_number);
  }
  
  function displayPage(page_number) {
    var tableContainer = document.querySelector('.table-responsive');
    var tableRows = tableContainer.querySelectorAll('tbody tr');
    var startIndex = (page_number - 1) * pageSize;
    var pageSize = 400;
    var endIndex = startIndex + pageSize;
  
    tableRows.forEach(function (row, index) {
      if (index >= startIndex && index < endIndex) {
        row.style.display = '';
      } else {
        row.style.display = 'none';
      }
    });
  
    // Cập nhật giá trị số trang hiện tại
    document.getElementById('page-number').value = page_number;
  }

// Hàm search theo name và description
  function searchTable() {
    var searchInput = document.getElementById('search-input');
    var searchTerm = searchInput.value.trim().toLowerCase();
    var tableRows = document.querySelectorAll('.ticket-list-table tbody tr');
  
    tableRows.forEach(function(row) {
      var nameCell = row.querySelector('td:nth-child(2)');
      var descriptionCell = row.querySelector('td:nth-child(3)');
      var nameText = nameCell.textContent.trim();
      var descriptionText = descriptionCell.textContent.trim();
  
      if (nameText.toLowerCase().includes(searchTerm) || descriptionText.toLowerCase().includes(searchTerm)) {
        row.style.display = 'table-row';
        highlightText(nameCell, searchTerm);
        highlightText(descriptionCell, searchTerm);
      } else {
        row.style.display = 'none';
      }
    });
  }

// Đánh dấu hightlight text tìm thấy  
function highlightText(cell, searchTerm) {
    var cellText = cell.textContent;
    if (cellText.toLowerCase().includes(searchTerm)) {
      var regex = new RegExp('(' + searchTerm + ')', 'gi');
      cell.innerHTML = cellText.replace(regex, '<span class="highlight">$1</span>');
    }
  }

// Thêm nhấn Enter input search sẽ gọi hàm SearchTable
var searchInput = document.getElementById('search-input');
searchInput.addEventListener('keydown', function(event) {
    // Kiểm tra nếu phím ấn là phím Enter (keyCode = 13)
    if (event.keyCode === 13) {
      // Ngăn chặn hành vi mặc định của phím Enter (submit form)
      event.preventDefault();
      // Gọi hàm searchTable() khi ấn phím Enter
      searchTable();
    }
  });