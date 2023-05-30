<!DOCTYPE html>
<html>

<head>
    <style>
        /* Set the text direction to RTL */
        body {
            direction: rtl;
        }

        /* Style the form container */
        .form-container {
            width: 600px;
            height: 380px;
            margin: 0 auto;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            margin: 120px auto;
        }

        /* Style the form fields */
        .form-field {
            display: flex;
            align-items: center;
            margin: 20px;
        }

        .form-label {
            width: 150px;
            font-weight: bold;
        }

        .form-input {
            width: 300px;
            height: 35px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 0 10px;
        }

        /* Style the submit button */
        .form-button {
            width: 25%;
            margin: 0 auto;
            height: 40px;
            background-color: #00b8d4;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
        }
    </style>

    {{--  <style>
        body {
            direction: rtl;
        }

        /* Style the form container */
        .form-container {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            grid-gap: 20px;
            margin: 0 auto;
            max-width: 800px;
            padding: 20px;
        }

        /* Style the form fields */
        .form-field {
            display: flex;
            align-items: center;
        }

        .form-label {
            width: 150px;
            font-weight: bold;
        }

        .form-input {
            flex: 1;
            height: 35px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 0 10px;
        }

        /* Style the submit button */
        .form-button {
            grid-column: span 12;
            height: 40px;
            background-color: #00b8d4;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
        }

        /* Responsive design */
        @media (max-width: 600px) {
            .form-container {
                grid-template-columns: repeat(6, 1fr);
            }
        }

        @media (max-width: 400px) {
            .form-container {
                grid-template-columns: repeat(4, 1fr);
            }
        }
    </style>  --}}
</head>

<body>
    <div class="form-container">

        <form method="POST" action="{{ route('sendCode') }}" id="form">
            @csrf
            <div class="form-field">
                <!-- First name field -->
                <label class="form-label" for="firstname">الاسم الأول:</label>
                <input type="text" id="firstname" name="fname" required class="form-input">
            </div>
            <div class="form-field">
                <!-- Last name field -->
                <label class="form-label" for="lastname">الاسم الأخير:</label>
                <input type="text" id="lastname" name="lname" required class="form-input">
            </div>
            <div class="form-field">
                <!-- Email field -->
                <label class="form-label" for="email">البريد الالكتروني
                </label>
                <input type="email" id="email" name="email" required class="form-input">
            </div>
            <div class="form-field">
                <!-- Password field -->
                <label class="form-label" for="password">كلمة المرور:</label>
                <input type="password" id="password" name="password" required class="form-input">
            </div>
            <div class="form-field">
                <!-- Confirm password field -->
                <label class="form-label" for="conf-password">تأكيد كلمة المرور:</label>
                <input type="password" id="conf-password" name="conf-password" required class="form-input">
            </div>
            <div class="form-field">
                <!-- Submit button -->
                <input type="submit" value="انشاء حساب" class="form-button" onclick="cheackPass()">
                {{--  <button class="form-button" id="send" type="button" onclick="cheackPass()">انشاء حساب</button>  --}}
            </div>
        </form>
        <script>
            function cheackPass() {
                var pass1 = document.getElementById("password");
                var pass2 = document.getElementById("conf-password");
                if (pass1.value != pass2.value) {
                    alert('كلمات المرور غير متطابقة');
                    event.preventDefault();
                }
            }
        </script>

    </div>

</body>


</html>
