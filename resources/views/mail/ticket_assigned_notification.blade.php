<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Assigned</title>
</head>

<body>
    <h2>Ticket Assigned</h2>
    <p>Dear <strong>{{ $user_name }}</strong>,</p>
    <p>A new ticket has been assigned to you in project:<strong>{{ $project_name }} </strong> </p>
    <ul>
        <li><strong>Subject:</strong> {{ $ticket->name }}</li>
        <li><strong>Description:</strong> {{ $ticket->description }}</li>
        <li><strong>Priority:</strong> {{ $ticket->priority }}</li>
        <li><strong>Estimated_hours:</strong> {{ $ticket->estimated_hours }}</li>
    </ul>
    <p>Thank you!</p>
</body>

</html>
