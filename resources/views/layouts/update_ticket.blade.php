<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Ticket</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <p> Username:: {{ Session::get('user_name') }} </p>
    <p> Access token:: {{ Session::get('accessToken') }}</p>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update Ticket</div>

                    <div class="card-body">
                        <form id="updateTicketForm" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="ticket_id" value="{{ $ticket['id'] ?? '' }}">

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    value="{{ $ticket['name'] ?? '' }}">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" name="description" class="form-control">{{ $ticket['description'] ?? '' }}</textarea>
                            </div>

                            <!-- Thêm các trường thông tin khác của ticket -->

                            <div class="form-group">
                                <label for="illustration">Illustration</label>
                                <input type="file" id="illustration" name="illustration" class="form-control-file">
                            </div>

                            <button type="submit" class="btn btn-primary">Update Ticket</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to fetch ticket details from API
            function fetchTicketDetails(ticketId) {
                var token = '{{ Session::get('accessToken') }}'; // Replace with your JWT token
                var apiUrl = 'http://127.0.0.1:8000/api/v1/tickets/' + ticketId;

                $.ajax({
                    url: apiUrl,
                    method: 'GET',
                    headers: {
                        'Authorization': 'Bearer ' + token
                    },
                    success: function(response) {
                        // Populate form fields with ticket details
                        $('#name').val(response.data.name);
                        $('#description').val(response.data.description);
                        // Populate other fields as needed

                        // Optional: Populate illustration preview if needed
                    },
                    error: function(response) {
                        // Handle error fetching ticket details
                        console.error('Error fetching ticket details:', response);
                        // Optionally show an alert or message
                    }
                });
            }

            // On document ready, fetch ticket details if ticket ID is available
            var ticketId = 10; // Get ticket ID from Blade template
            if (ticketId) {
                fetchTicketDetails(ticketId);
            }

            // Submit form handler
            $('#updateTicketForm').on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);
                var token = '{{ Session::get('accessToken') }}'; // Replace with your JWT token

                $.ajax({
                    url: 'http://127.0.0.1:8000/api/v1/tickets/' + ticketId,
                    method: 'PATCH',
                    headers: {
                        'Authorization': 'Bearer ' + token
                    },
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#responseMessage').html(
                            '<div class="alert alert-success">Ticket updated successfully!</div>'
                        );
                    },
                    error: function(response) {
                        var errorMessage = 'Error updating ticket!';
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
