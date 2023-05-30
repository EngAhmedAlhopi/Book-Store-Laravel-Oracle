<!DOCTYPE html>
<html>

<head>
    <style>
        /* Set the text direction to RTL */
        body {
            direction: rtl;
            font-size: x-large;
        }

        /* Style the form container */
        .form-container {
            width: 400px;
            height: 280px;
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

</head>

<body>
    <div class="form-container">

        <form method="POST" action="{{ route('verifyEmail') }}">
            @csrf
            <br>
            <br>
            <div class="form-field">
                <!-- First name field -->
                <label class="form-label" for="firstname">رمز التأكيد</label>
                <input type="text" id="firstname" name="code" required class="form-input">
            </div>
            <div class="form-field">
                <!-- Submit button -->
                <input type="submit" value="ارسال الرمز" class="form-button">
            </div>
            @if (isset($error))
                <div class="form-field" style="color: red">
                    الرمز المدخل غير صحيح
                </div>
            @endif

        </form>
    </div>

</body>

</html>
