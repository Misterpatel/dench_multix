<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            background: #007bff;
            color: #ffffff;
            text-align: center;
            padding: 15px;
            font-size: 20px;
            border-radius: 8px 8px 0 0;
        }
        .email-body {
            padding: 20px;
            color: #333;
            font-size: 16px;
        }
        .email-body ul {
            list-style: none;
            padding: 0;
        }
        .email-body li {
            margin: 10px 0;
        }
        .email-footer {
            text-align: center;
            padding: 15px;
            font-size: 14px;
            color: #666;
            border-top: 1px solid #ddd;
        }
    </style>
</head>
<body>
  @php
      $formdata=$data['data'];
  @endphp
    <div class="email-container">
        <div class="email-header">
            {{ $data['subject'] }}
        </div>
        <div class="email-body">
            <p>Hello,</p>
            <p>Below are the details submitted:</p>
            <ul>
                <li><strong>Name :</strong> {{ $formdata['name'] }}</li>
                <li><strong>Phone :</strong> {{ $formdata['phone'] ?? 'N/A' }}</li>
                <li><strong>Subject :</strong> {{ $formdata['subject'] ?? 'N/A' }}</li>
                <li><strong>Message :</strong> {{ $formdata['message'] }}</li>
                <li><strong>Address :</strong> {{ $formdata['address'] ?? 'N/A' }}</li>
            </ul>
        </div>
        <div class="email-footer">
            &copy; {{ date('Y') }} Aspire Automation. All rights reserved.
        </div>
    </div>
</body> 
</html>

