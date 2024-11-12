<!-- resources/views/email/birthday.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joyeux Anniversaire</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .content {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }
        .greeting {
            font-size: 24px;
            font-weight: bold;
            color: #333333;
        }
        .message {
            font-size: 18px;
            color: #555555;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #888888;
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="greeting">
            Joyeux Anniversaire, {{ $user->name }} !
        </div>
        <div class="message">
            Nous vous souhaitons une merveilleuse journée et une année remplie de bonheur et de réussite.
        </div>
        <div class="footer">
            Merci d'utiliser notre application highday application. 
        </div>
    </div>
</body>
</html>
