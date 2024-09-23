<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submission</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .container { padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
        h2 { color: #333; }
        p { margin: 10px 0; }
    </style>
</head>
<body>
    <div class="container">
        <h2>New Contact Form Submission</h2>
        <p><strong>Name:</strong> {{$data ['name']}}</p>
        <p><strong>Email:</strong> {{$data ['email']}}</p>
        <p><strong>Subject:</strong> {{$data ['subject']}}</p>
        <p><strong>Message:</strong></p>
        <p>{{$data ['message']}}</p>
    </div>
</body>
</html>
