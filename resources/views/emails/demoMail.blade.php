<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Submission</title>
</head>
<body>
    <h1>{{ $mailData['subject'] }}</h1>
    <p>From: {{ $mailData['name'] }} ({{ $mailData['email'] }})</p>
    <p>{{ $mailData['message'] }}</p>
</body>
</html>
