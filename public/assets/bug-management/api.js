function createBugType(name, description) {
  const url = '/api/v1/bugtypes';
  const accessToken = 'eyJpdiI6ImVCTy9hYmZCdytqWHRkcE9yMk9FRWc9PSIsInZhbHVlIjoiL1hpLy9xb3MwUFJMUHB1Tk5EdlhQU2VvYmJsQnlQUUF0T1EzSy82eXlqNHplUjFwQlhBRDkzUjAvYmx6N2RBOERSWFNSYnhBbTVwUnFpUSszSk81US84Qjg1VncwSVdJNVZkSHI2cWdKTXZhT0Z2SVlDTFFBZzQycTdTWFgzNFIiLCJtYWMiOiJmNGMxM2IzMDc0NTg0NmM3NDA1MGU4ZjBkOGU2NTFkMzMyNzBlNDZmZmZjY2RjOWY1ZmRhMDI2OGU0ZTJhMTVkIiwidGFnIjoiIn0%3D'; // Thay thế 'your_access_token' bằng token truy cập thực tế của bạn
  const requestData = {
    name: name,
    description: description,
    accessToken: 'eyJpdiI6ImVCTy9hYmZCdytqWHRkcE9yMk9FRWc9PSIsInZhbHVlIjoiL1hpLy9xb3MwUFJMUHB1Tk5EdlhQU2VvYmJsQnlQUUF0T1EzSy82eXlqNHplUjFwQlhBRDkzUjAvYmx6N2RBOERSWFNSYnhBbTVwUnFpUSszSk81US84Qjg1VncwSVdJNVZkSHI2cWdKTXZhT0Z2SVlDTFFBZzQycTdTWFgzNFIiLCJtYWMiOiJmNGMxM2IzMDc0NTg0NmM3NDA1MGU4ZjBkOGU2NTFkMzMyNzBlNDZmZmZjY2RjOWY1ZmRhMDI2OGU0ZTJhMTVkIiwidGFnIjoiIn0'
  };

  fetch(url, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'Authorization': 'Bearer ' + accessToken
    },
    body: JSON.stringify(requestData)
  })
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.json();
    })
    .then(newBugType => {
      // Xử lý dữ liệu của BugType mới được tạo
      console.log('New BugType:', newBugType);

      // Thực hiện các câu lệnh trong hàm updateBug để cập nhật giao diện
      updateBug(newBugType.id, newBugType.name, newBugType.description);
    })
    .catch(error => {
      console.error('There has been a problem with your fetch operation:', error);
    });
}