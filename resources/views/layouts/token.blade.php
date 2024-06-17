<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <title>Home</title>
</head>

<body>
    <p> Username:: {{ Session::get('user_name') }} </p>
    <p> Access token:: {{ Session::get('accessToken') }}</p>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Ticket</div>
                    <div class="card-body">
                        <form id="createTicketForm" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="project_id">Project ID:</label>
                                <input type="text" name="project_id" id="project_id" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" id="description" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="assigned_to">Assigned To:</label>
                                <input type="text" name="assigned_to" id="assigned_to" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="estimated_hours">Estimated Hours:</label>
                                <input type="date" name="estimated_hours" id="estimated_hours" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="illustration">Illustration:</label>
                                <input type="file" name="illustration" id="illustration" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="steps_to_reproduce">Steps to Reproduce:</label>
                                <textarea name="steps_to_reproduce" id="steps_to_reproduce" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="expected_result">Expected Result:</label>
                                <textarea name="expected_result" id="expected_result" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="actual_result">Actual Result:</label>
                                <textarea name="actual_result" id="actual_result" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="priority">Priority:</label>
                                <select name="priority" id="priority" class="form-control" required>
                                    <option value="HIGH">HIGH</option>
                                    <option value="MEDIUM">MEDIUM</option>
                                    <option value="LOW">LOW</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="bug_type_id">Bug Type ID:</label>
                                <input type="text" name="bug_type_id" id="bug_type_id" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="test_type_id">Test Type ID:</label>
                                <input type="text" name="test_type_id" id="test_type_id" class="form-control"
                                    required>
                            </div>
                            <button type="submit" class="btn btn-primary">Create Ticket</button>
                        </form>
                        <div id="responseMessage" class="mt-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#createTicketForm').on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);
                var token =
                    '{{ Session::get('accessToken') }}';
                $.ajax({
                    url: 'http://127.0.0.1:8000/api/v1/tickets',
                    method: 'POST',
                    headers: {
                        'Authorization': token
                    },
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#responseMessage').html(
                            '<div class="alert alert-success">Ticket created successfully!</div>'
                        );
                    },
                    error: function(response) {
                        var errorMessage = 'Error creating ticket!';
                        if (response.responseJSON && response.responseJSON.errors) {
                            errorMessage += '<ul>';
                            $.each(response.responseJSON.errors, function(key, value) {
                                errorMessage += '<li>' + value[0] + '</li>';
                            });
                            errorMessage += '</ul>';
                        }
                        $('#responseMessage').html(
                            '<div class="alert alert-danger">' + errorMessage + '</div>'
                        );
                    }
                });
            });
        });
    </script>

</body>

</html>
