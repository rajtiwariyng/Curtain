<!DOCTYPE html>
<html>
<head>
    <title>Appointment Confirmation</title>
</head>
<body>
    <h1>Appointment @if($appointment->appointment_date) Scheduled @else Request Received @endif Successfully</h1>
    <p>Dear {{ $appointment->name }},</p>
    <p>Thank you for scheduling an appointment with us.</p>
    <p><strong>Details:</strong></p>
    <ul>
        <li><strong>Name:</strong> {{ $appointment->name }}</li>
        <li><strong>Email:</strong> {{ $appointment->email }}</li>
        <li><strong>Mobile:</strong> {{ $appointment->mobile }}</li>
        <li><strong>Date:</strong> {{ $appointment->created_at->format('d-m-Y H:i') }}</li>
        <li><strong>Appointment Scheduled Date:</strong> 
            @if($appointment->appointment_date)
                {{ $appointment->appointment_date->format('d-m-Y H:i') }}
            @else
                Not Scheduled
            @endif
        </li>
    </ul>
    <p>We look forward to seeing you!</p>
    <p>Best Regards,<br>Your Company</p>
</body>
</html>

