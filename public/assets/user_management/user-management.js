
function toggleBtn(type){
  var account_content = document.getElementById('account-detail');
  var avatar_content = document.getElementById('avatar-detail');
  var form = document.querySelector('#user-form');
  if(type == 'avatar'){
      avatar_content.classList.remove('d-none');
      avatar_content.classList.add('d-flex');
      account_content.classList.add('d-none');
      form.querySelector('.account-details-tab a').classList.remove('active');
      form.querySelector('.image-tab a').classList.add('active');
    } else{
      account_content.classList.remove('d-none');
      avatar_content.classList.add('d-none');
      avatar_content.classList.remove('d-flex');
      form.querySelector('.account-details-tab a').classList.add('active');
      form.querySelector('.image-tab a').classList.remove('active');
  }
}
function openEditTestForm(event) {
    var row = event.target.closest('tr'); // Lấy phần tử cha là hàng (row)
    var id = row.querySelector('th').innerText; // Lấy giá trị id từ cột đầu tiên (th)
    var name = row.querySelector('td:nth-child(2)').innerText; // Lấy giá trị tên từ cột thứ hai (td)
    var description = row.querySelector('td:nth-child(3)').innerText; // Lấy giá trị mô tả từ cột thứ tư (td)
  
    // Gán các giá trị vào form
    var modalBody = document.querySelector('.modal.fade.position-absolute .modal-content');
    var title = modalBody.querySelector('h1');
    var idElement = modalBody.querySelector('.id');
    var nameInput = modalBody.querySelector('.name');
    var descriptionTextarea = modalBody.querySelector('.description');
    var submitBtn = modalBody.querySelector('.submit-btn');
  
      // Gán giá trị cho các thành phần con
    title.innerHTML="Update Test Type"
    idElement.setAttribute('data-value', id);
    nameInput.value = name;
    descriptionTextarea.value = description;
    submitBtn.innerHTML="Update";
    submitBtn.classList.add('btn-success');
    // Mở modal
    $('#exampleModal').modal('show');

  }

  function openAddUserForm() {
    // Reset Input
    var form = document.getElementById('user-form');
    form.querySelector('h3').textContent="Create User";
    form.querySelector('.account-details-tab').click();
    form.querySelector('.image-preview').setAttribute('src', 'assets/images/users/1.jpg');
    var allInputs = Array.from(form.querySelectorAll('input'));
    allInputs.forEach(function(input) {
      input.value = ''; 
      });

      document.getElementById('user-form').classList.remove('d-none');
  }

  // Đóng form 
function closedUserForm(){
  document.getElementById('user-form').classList.add('d-none');
}

function handleSubmit(id){
  console.log(id);
  if(id=="id"){
    var tableBody = document.querySelector('.table-responsive .table tbody');
    var modalBody = document.querySelector('.modal.fade.position-absolute .modal-content');
    var nameInput = modalBody.querySelector('.name');
    var descriptionTextarea = modalBody.querySelector('.description');
    console.log('dgfdg');
    var newRowHtml = `
          <tr>
            <th scope="row" class="text-center">${tableBody.children.length + 1}</th>
            <td colspan="2" class="fw-normal">${nameInput.value}</td>
            <td colspan="3" class="fw-normal">${descriptionTextarea.value}</td>
            <td colspan="1" class="d-float " style="width: 250px;display: float;">
                        <a href="javascript:void(0);" class="m-2 btn btn-sm btn-success d-flex align-items-center justify-content-center w-40" style="float: left;">
                            <i class="fa-regular fa-pen-to-square pe-1"></i>
                            Edit 
                        </a>
                        <a href="javascript:void(0);" class="m-2 btn btn-sm btn-danger d-flex align-items-center justify-content-center w-40" style="float: left;">
                            <i class="fa-solid fa-delete-left pe-1"></i>
                            Delete
                        </a>
                    </td>
          </tr>
        `;
      
        // Thêm chuỗi HTML vào cuối phần tử tbody của bảng
        tableBody.innerHTML += newRowHtml;

  }
  else(
    console.log('dggge')

  )
}

 

//upload avatar
function openFilePicker() {
    var fileInput = document.getElementById('image-upload');
    fileInput.click();
    fileInput.onchange = function() {
        var file = fileInput.files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
            var imagePreview = document.getElementById('preview');
            imagePreview.src = e.target.result;
        };
        reader.readAsDataURL(file);
    };
}

// Hàm lọc theo role
document.getElementById("filter-select").addEventListener("change", function() {
  var filterValue = this.value.toLowerCase();
  console.log(filterValue)
  var rows = document.querySelectorAll(".candidates-list");

  rows.forEach(function(row) {
    var role = row.querySelector(".candidate-list-time").innerText.toLowerCase();
    console.log(row)
    if (filterValue == "" || role.includes(filterValue)) {
      console.log(1)
      row.classList.remove('d-none');
      } else {
        console.log(2)
      row.classList.add('d-none');
    }
  });
});

// Hàm tìm kiếm
function searchCandidates() {
  var searchStringInput = document.querySelector('.table-sorter-input');
  var filterSelect = document.getElementById('filter-select');
  var searchString = searchStringInput.value.trim().toLowerCase();
  var filterValue = filterSelect.value.toLowerCase();
  var candidateRows = document.querySelectorAll('.candidates-list');
  
  candidateRows.forEach(function(row) {
    var candidateName = row.querySelector('.candidate-list-info a').textContent.toLowerCase();
    var candidateEmail = row.querySelector('.candidate-list-option li').textContent.toLowerCase();
    var candidateRole = row.querySelector('.candidate-list-time').textContent.toLowerCase();
    
    var nameMatch = candidateName.includes(searchString);
    var emailMatch = candidateEmail.includes(searchString);
    var roleMatch = (filterValue == '' || candidateRole == filterValue);

    if ((nameMatch || emailMatch) && roleMatch) {
      row.classList.remove('d-none');
      } else {
      row.classList.add('d-none');
    }
  });
}

var searchInput = document.querySelector('.table-sorter-input');
searchInput.addEventListener('keydown', function(event) {
  if (event.keyCode === 13) {
    event.preventDefault();
    searchCandidates();
  }
});

var filterSelect = document.getElementById('filter-select');
filterSelect.addEventListener('change', function() {
  searchCandidates();
});

var searchButton = document.querySelector('.x-btn');
searchButton.addEventListener('click', function() {
  searchCandidates();
});

window.addEventListener('DOMContentLoaded', function() {
  var searchStringInput = document.querySelector('.table-sorter-input');
  searchStringInput.value = ''; // Xóa giá trị trong input tìm kiếm khi tải lại trang
});

// Mở Modal Delete Project
function openDeleteBasicForm(event) {
  // Khóa button delete khi chưa nhập mã
  deleteBtn = document.getElementById('delete-btn');
  deleteBtn.classList.remove('bg-danger');
  deleteBtn.disabled = true;
  deleteBtn.style.cursor = 'default';
  deleteBtn.style.fontWeight = 'normal';

  // Lấy thông tin Project
  var row = event.target.closest('tr'); // Lấy phần tử cha là hàng (row)
  var id = row.getAttribute('data-value'); // Lấy giá trị id 
  var name = row.querySelector('.name').innerText; // Lấy giá trị tên 

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
    element.textContent = 'user';
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
}

function deleteUserFromDB(id){
const url = `http://127.0.0.1:8000/api/v1/users/${id}`;
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
      } else{
      throw new Error('Network response was not ok');

    }
    return response;
  })
  .catch(error => {
    console.error('There has been a problem with your fetch operation:', error);
  });
}
