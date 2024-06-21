<!-- resources/views/tickets/ticket_status_changed.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Status Changed</title>
</head>

<body>
    <h1>Ticket Status Changed</h1>

    <p>Hello <strong>{{ $user->name }}</strong>,</p>

    <p>Your ticket with ID <strong>{{ $ticket->id }}</strong> and Name <strong>{{ $ticket->name }}</strong> in project
        <strong> {{ $project->name }} </strong> has changed status.
    </p>
    <p>New status:<strong> {{ $status }}</strong></p>

    <p>Thank you!</p>
</body>

</html>
