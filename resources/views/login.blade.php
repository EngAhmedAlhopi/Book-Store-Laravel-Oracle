<!-- HTML code for the login page -->
<html dir="rtl">

<head>
    <title>Login</title>
    <!-- Link to the CSS stylesheet -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        /* CSS code for styling the login page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 30%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            direction: rtl;
            margin-top: 100px;
        }

        label {
            font-weight: bold;
            margin-bottom: 10px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px 20px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin-bottom: 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .register-link {
            display: block;
            width: 100%;
            font-size: 16px;
            text-align: center;
            color: #888;
            direction: rtl;
        }

        .register-link:hover {
            color: #444;
        }
    </style>
</head>

<body>
    <!-- Login form -->
    <form action="{{ route('singin') }}" method="POST">
        {{--  @csrf  --}}
        <label for="username">البريد الالكتروني :</label><br>
        <input type="email" id="username" name="username" placeholder="البريد الالكتروني"><br>
        <label for="password">كلمة المرور:</label><br>
        <input type="password" id="password" name="password" placeholder="كلمة المرور"><br><br>
        <input type="submit" value="تسجيل الدخول">
    </form>
    <!-- Register link or button -->
    <a href="{{ route('creatAccount') }}" class="register-link">انشاء حساب</a>
</body>

</html>
