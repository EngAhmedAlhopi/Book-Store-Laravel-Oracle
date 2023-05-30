<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>رمز التاكيد</title>
</head>

<body>
    <h1>
        متجر اقرأ للكتب
    </h1>
    <h2>
        الكود الخاص بك لتأكيد البريد الالكتروني </h2>
    <h3>
        رمز التاكيد هو : {{ Session::get('code') }}
    </h3>
</body>

</html>
