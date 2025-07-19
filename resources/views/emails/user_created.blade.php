<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Account Created</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333333;
            margin: 0;
            padding: 0;
        }
        .container {
            background-color: #ffffff;
            max-width: 600px;
            margin: 30px auto;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            max-width: 150px;
        }
        h1 {
            color: #4CAF50;
            font-size: 24px;
            margin: 0;
        }
        p {
            font-size: 16px;
            line-height: 1.6;
            margin: 15px 0;
        }
        .link {
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }
        .badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 4px;
            background-color: #28a745;
            color: #ffffff;
            font-size: 14px;
            margin-right: 5px;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #777777;
        }
        .footer a {
            color: #4CAF50;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <!-- You can add your company logo here -->
            <img src="{{ asset('public/front/assets/images/urja_media.jpg') }}" alt="Company Logo" width="100" height="auto">

        </div>
        
<p class="welcome-text">Hi {{ $user->name }},</p>

    <p class="welcome-text">
      Welcome to <strong>Cortra</strong> – the exclusive directory for corporate trainers!
      We're thrilled to have you with us and look forward to helping you connect with the right opportunities.
    </p>


<p>We are excited to inform you that your account has been successfully created. Here are your account details:</p>

 <p><strong>🌐 Website:</strong> <a href="https://cortrahub.com" target="_blank">https://cortrahub.com</a></p>
 <p><strong>👤 Username:</strong> {{ $user->email }}</p>
        <p><strong>🔐 Password:</strong> {{ $user->show_password }}</p><strong class="text-danger">( Please change password after first login)</strong> 
         <p><a href="{{asset('login')}}" class="link">Login to Your Account</a></p>
<p>&nbsp;</p>


 
    <p class="welcome-text">
      If you have any questions or need assistance, just reply to this email. We're here to help!
    </p>

    <div class="footer">
      Warm regards,<br>
      <strong>Cortra Team</strong><br>
      info@cortrahub.com | +91-9619616376
    </div>

  </div>




    </div>
</body>
</html>