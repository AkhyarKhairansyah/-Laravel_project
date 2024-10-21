<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #F7F8F9;
            font-family: Arial, sans-serif;
            color: #000;
            text-align: center;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 40px 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #333;
        }

        p {
            font-size: 16px;
            margin-bottom: 30px;
            color: #555;
        }

        .button-container {
            text-align: center;
            margin-bottom: 30px;
        }

        .button {
            display: inline-block;
            padding: 15px 30px;
            background-color: #3a5de0;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 18px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #2e47b9;
        }

        .small-text {
            font-size: 14px;
            color: #696868;
            word-wrap: break-word;
            overflow-wrap: break-word;
        }

        .small-text a {
            color: #3a5de0;
            text-decoration: none;
        }

        .small-text a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Hello</h1>
        <p>Please verify your email by clicking on the button below 👇</p>
        <div class="button-container">
            <a href="{{ $url }}" class="button">Verify Email</a>
        </div>
        <p class="small-text">In case the button does not work, please copy the following link and paste it into your browser's address bar: <a href="{{ $url }}">{{ $url }}</a></p>
    </div>
</body>

</html>
