@extends('layouts.masterapex')

@section('title')
    الملف الشخصي
@endsection



@section('style')
    <style>
        .row2 {
            margin: 10px;
        }
    </style>
@endsection

@section('content')
    <div class="row match-height">
        <div class="col-xl-12 col-lg-12 col-12">
            <div class="card shopping-cart">
                <div class="card-header pb-2">
                    <h4 class="card-title mb-1">الملف الشخصي</h4>
                </div>
                <div class="card-content">
                    <div class="card-body p-0">
                        <div class="table-responsive">






                            <form class="row2 row" method="POST" action="{{ route('updateProfile') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-2">
                                    <label for="validationCustom01" class="form-label">رقم المستخدم</label>
                                    <input type="text" class="form-control" disabled id="validationCustom01"
                                        value="{{ Session::get('userid') }}" name="userid" required>
                                </div>

                                <div class="col-md-2">
                                    <label for="validationCustom01" class="form-label">الايميل</label>
                                    <input type="text" class="form-control" disabled id="validationCustom01"
                                        value="{{ Session::get('email') }}" name="email" required>
                                </div>

                                <div class="col-md-2">
                                    <label for="validationCustom01" class="form-label"> الاسم</label>
                                    <input type="text" class="form-control" id="validationCustom01"
                                        value="{{ Session::get('fname') }}" name="fname" required>
                                </div>

                                <div class="col-md-2">
                                    <label for="validationCustom01" class="form-label"> العائلة</label>
                                    <input type="text" class="form-control" id="validationCustom01"
                                        value="{{ Session::get('lname') }}" name="lname" required>
                                </div>

                                <div class="col-md-4">

                                </div>
                                <div class="col-12 h-10"><br>
                                </div>

                                <div class="col-md-12">
                                    <label for="checkbox" class="form-label"> تعديل كلمة المرور</label>
                                    <input type="checkbox" value="1" name="checkbox" id="checkbox"
                                        onclick="myFunction1()">
                                </div>
                                <input type="text" name="" id="oldpass1" hidden
                                    value="{{ Session::get('password') }}" disabled>

                                <script>
                                    function myFunction1() {
                                        var checkBox = document.getElementById("checkbox");
                                        var oldPass = document.getElementById("oldPass");
                                        var newPass1 = document.getElementById("newPass1");
                                        var newPass2 = document.getElementById("newPass2");
                                        var oldPassIn = document.getElementById("oldPassIn");
                                        var newPass1In = document.getElementById("newPass1In");
                                        var newPass2In = document.getElementById("newPass2In");
                                        if (checkBox.checked == true) {
                                            oldPass.style.display = "block";
                                            oldPassIn.required = true;
                                            newPass1.style.display = "block";
                                            newPass1In.required = true;
                                            newPass2.style.display = "block";
                                            newPass2In.required = true;

                                        } else {
                                            oldPass.style.display = "none";
                                            newPass1.style.display = "none";
                                            newPass2.style.display = "none";
                                            oldPassIn.required = false;
                                            newPass1In.required = false;
                                            newPass2In.required = false;
                                        }
                                    }

                                    function myFunction2() {
                                        var checkBox = document.getElementById("checkbox");
                                        var oldPassIn = document.getElementById("oldPassIn");
                                        var newPass1In = document.getElementById("newPass1In");
                                        var newPass2In = document.getElementById("newPass2In");
                                        var oldpass1In = document.getElementById("oldpass1");
                                        if (checkBox.checked == true) {
                                            let oldpass = oldPassIn.value;
                                            let oldpass1 = oldpass1In.value;
                                            let pass1 = newPass1In.value;
                                            let pass2 = newPass2In.value;
                                            if (pass1 != pass2) {
                                                var divMsg = document.getElementById("div-msg");
                                                var msg = document.getElementById("msg");
                                                divMsg.style.display = "block";
                                                msg.textContent = "كلمات المرور غير متطابقة";
                                                event.preventDefault();
                                            } else {
                                                if (oldpass != oldpass1) {
                                                    var divMsg = document.getElementById("div-msg");
                                                    var msg = document.getElementById("msg");
                                                    divMsg.style.display = "block";
                                                    msg.textContent = "كلمة المرور القديمة غير صحيحة";
                                                    event.preventDefault();
                                                }
                                            }
                                        }
                                    }
                                </script>

                                <div class="col-md-2" id="oldPass" style="display: none;">
                                    <label for="validationCustom01" class="form-label"> كلمة المرور القديمة </label>
                                    <input type="text" class="form-control" id="oldPassIn" value="" name="oldPass">
                                </div>
                                <div class="col-md-2" id="newPass1" style="display: none;">
                                    <label for="validationCustom01" class="form-label"> الكلمة الجديدة </label>
                                    <input type="text" class="form-control" id="newPass1In" value=""
                                        name="newPass1">
                                </div>
                                <div class="col-md-2" id="newPass2" style="display: none;">
                                    <label for="validationCustom01" class="form-label"> تاكيد الكلمة الجديدة </label>
                                    <input type="text" class="form-control" id="newPass2In" value=""
                                        name="newPass2">
                                </div>







                                <div class="col-12 h-10"><br>
                                </div>
                                <div class="col-12 h-10" id="div-msg" style="display: none">
                                    <h5 id="msg" style="color: red;"></h5>
                                </div>
                                <div class="col-12 h-10"><br>
                                </div>
                                <div class="col-12">
                                    <input type="submit" onclick="myFunction2()" class="btn btn-primary" value="تعديل"
                                        id="send">
                                </div>
                            </form>





                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
