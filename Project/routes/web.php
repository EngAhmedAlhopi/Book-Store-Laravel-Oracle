<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Book;
use App\Http\Controllers\Customer;
use App\Http\Controllers\Order;
use App\Http\Controllers\OrderStatus;
use App\Http\Controllers\Author;
use App\Http\Controllers\Address;
use App\Http\Controllers\AddressStatus;
use App\Http\Controllers\BookLanguge;
use App\Http\Controllers\Publisher;
use App\Http\Controllers\ShippingMethod;
use App\Http\Controllers\Country;
use App\Http\Controllers\DataBaseConnection;
use App\Http\Controllers\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
/*-----------------------------------------------------------------------*/
//عمليتي تسجيل الدخول والخروج
/*-----------------------------------------------------------------------*/

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('index', [Author::class, 'get_count'])->name('indexAdmin');

Route::post('login', function (Request $request) {
    csrf_token();
    $connection = DataBaseConnection::db_connect();
    $query = 'BEGIN permission_pkg.login(:email,:pass,:id,:admin,:fname,:lname,:img,:code); END;';
    $stmt = oci_parse($connection, $query);
    $username = $request->username;
    $password = $request->password;
    $id = 0;
    $admin = 0;
    $fname = '';
    $lname = '';
    $img = '';
    $code = 0;
    oci_bind_by_name($stmt, ':email', $username);
    oci_bind_by_name($stmt, ':pass', $password);
    oci_bind_by_name($stmt, ':id', $id, 100);
    oci_bind_by_name($stmt, ':admin', $admin, 100);
    oci_bind_by_name($stmt, ':fname', $fname, 100);
    oci_bind_by_name($stmt, ':lname', $lname, 100);
    oci_bind_by_name($stmt, ':img', $img, 100);
    oci_bind_by_name($stmt, ':code', $code, 100);
    oci_execute($stmt);
    if ($code == 1) {
        Session::put('userid', $id);
        Session::put('fname', $fname);
        Session::put('lname', $lname);
        Session::put('img', $img);
        Session::put('admin', $admin);
        Session::put('email', $username);
        Session::put('password', $password);
        // dd(Session::get('password'));
        if ($admin == 1) {
            $connection = DataBaseConnection::db_connect();
            $p_out =  oci_new_cursor($connection);
            $query = 'BEGIN admin_operation_pkg.get_auther_and_books_number(:coursor); END;';
            $stmt = oci_parse($connection, $query);
            oci_bind_by_name($stmt, ':coursor', $p_out, -1, OCI_B_CURSOR);
            oci_execute($stmt);
            oci_execute($p_out);
            $i = 0;
            // return redirect()->route('indexAdmin', 'p_out', 'i');
            return view('apex', compact('p_out', 'i'));
        }
        return redirect()->route('indexUser',  $id);
    } elseif ($code == 3) {
        return view('login');
    } else {
        return view('login');
    }
})->name('singin');

Route::get('home', function (Request $request) {
    return view('index');
})->name('indexUser');

Route::get('logout', function () {
    Session::forget('userid');
    Session::forget('admin');
    Session::forget('fname');
    Session::forget('lname');
    Session::forget('img');
    Session::forget('orderId');
    Session::forget('addBook');
    return view('login');
})->name('logout');

Route::get('create-account', function () {
    return view('createaccount');
})->name('creatAccount');

Route::post('send-code', function (Request $request) {
    Session::put('newUserFname', $request->fname);
    Session::put('newUserLname', $request->lname);
    Session::put('newUserEmail', $request->email);
    Session::put('newUserPassword', $request->password);
    $connection = DataBaseConnection::db_connect();
    $query = 'BEGIN permission_pkg.send_code(:email,:code); END;';
    $stmt = oci_parse($connection, $query);
    $email = $request->email;
    $code = 0;
    oci_bind_by_name($stmt, ':email', $email);
    oci_bind_by_name($stmt, ':code', $code, 100);
    oci_execute($stmt);
    // dd($code);

    Session::put('code', $code);

    Email::sendCode($email, $code);
    return view('verifyemail');
})->name('sendCode');

Route::post('verify-email', function (Request $request) {
    $code = $request->code;
    $error = 0;
    if ($code == Session::get('code')) {
        $connection = DataBaseConnection::db_connect();
        $query = 'BEGIN permission_pkg.create_account(:fname,:lname,:email,:pass,:id,:code); END;';
        $stmt = oci_parse($connection, $query);
        $code = 0;
        $id = 0;
        $fname = Session::get('newUserFname');
        $lname = Session::get('newUserLname');
        $email = Session::get('newUserEmail');
        $pass = Session::get('newUserPassword');
        oci_bind_by_name($stmt, ':fname', $fname);
        oci_bind_by_name($stmt, ':lname', $lname);
        oci_bind_by_name($stmt, ':email', $email);
        oci_bind_by_name($stmt, ':pass', $pass);
        oci_bind_by_name($stmt, ':id', $id, 100);
        oci_bind_by_name($stmt, ':code', $code, 100);
        oci_execute($stmt);
        Session::put('userid', $id);
        Session::put('fname', Session::get('newUserFname'));
        Session::put('lname', Session::get('newUserLname'));
        Session::put('admin', 0);
        Session::put('email', Session::get('newUserEmail'));
        return redirect()->route('indexUser', compact('id'));
    } else {
        $error = 1;
        return view('verifyemail', compact('error'));
    }
})->name('verifyEmail');





/*-----------------------------------------------------------------------*/
//العمليات الخاصة بالكتاب
/*-----------------------------------------------------------------------*/

Route::get('books', [Book::class, 'index'])->name('indexBooks');
Route::get('book/add', [Book::class, 'create'])->name('addBook');
Route::post('book/store', [Book::class, 'store'])->name('storeBook');
Route::get('book/edit/{id}', [Book::class, 'update'])->name('updateBook');
Route::post('book/store-edit', [Book::class, 'save'])->name('storeUpdateBook');
Route::get('books/destroy/{id}', [Book::class, 'destroy'])->name('deleteBook');

/*-----------------------------------------------------------------------*/
//  العمليات الخاصة بالزبائن
/*-----------------------------------------------------------------------*/
// عمليات الادمن
Route::get('customer', [Customer::class, 'index'])->name('indexCustomer');
Route::get('customer/address/{id}', [Customer::class, 'show'])->name('showAddress');
Route::get('customer/orders', [Order::class, 'index'])->name('custmorOrders');
Route::get('customer/orders/{id}', [Order::class, 'orderDet'])->name('orderDet');
Route::post('customer/orders/update-status/{id}', [Order::class, 'updateOrderStatus'])->name('updateOrderStatus');
//عمليات الزبون
Route::get('orders/done/{id}', [Order::class, 'userOrdersDone'])->name('userOrdersDone');
Route::get('orders/not/{id}', [Order::class, 'userOrdersNote'])->name('userOrdersNote');
Route::get('order/details/{id}', [Order::class, 'orderDetails'])->name('orderDetails');
Route::get('order/details/delete-book/{id}', [Order::class, 'deleteBook'])->name('deleteBook');
Route::get('order/delete-order/{id}', [Order::class, 'deleteOrder'])->name('deleteOrder');
Route::get('order/confirm-order/{id}', [Order::class, 'confOrder'])->name('confOrder');
Route::post('order/save-order/{id}', [Order::class, 'saveOrder'])->name('saveOrder');
Route::get('order/add-book/{id}', [Order::class, 'addBook'])->name('addBookToOrder');
Route::get('order/books/create-order', [Order::class, 'createOrder'])->name('createOrder');
Route::get('all-books', [Book::class, 'allBooks'])->name('allBooks');
Route::get('add-book/{id}', [Book::class, 'addBookToOrder'])->name('insertBook');
Route::get('search-book-page', [Book::class, 'searchBookPage'])->name('searchBookPage');
Route::post('search-book', [Book::class, 'searchBook'])->name('searchBook');
Route::get('author-books', [Author::class, 'get_count_for_user'])->name('authorBooks');
Route::get('publisher-books', [Publisher::class, 'get_count_for_user'])->name('publisherBooks');
Route::get('profile', [Customer::class, 'get_profile'])->name('profile');
Route::post('update-profile', [Customer::class, 'update_profile'])->name('updateProfile');




/*-----------------------------------------------------------------------*/
//                             الثوابت
/*-----------------------------------------------------------------------*/
// المؤلفون
Route::get('auther', [Author::class, 'index'])->name('indexAuther');
Route::post('auther/add', [Author::class, 'store'])->name('storeAuther');
Route::post('auther/edit/{id}', [Author::class, 'update'])->name('editAuther');
Route::get('auther/delete/{id}', [Author::class, 'destroy'])->name('deleteAuther');
//---------------------
// دور النشر
Route::get('publisher', [Publisher::class, 'index'])->name('indexPublisher');
Route::post('publisher/add', [Publisher::class, 'store'])->name('storePublisher');
Route::post('publisher/edit/{id}', [Publisher::class, 'update'])->name('editPublisher');
Route::get('publisher/delete/{id}', [Publisher::class, 'destroy'])->name('deletePublisher');
//---------------------
// الدول
Route::get('country', [Country::class, 'index'])->name('indexCountry');
Route::post('country/add', [Country::class, 'store'])->name('storeCountry');
Route::post('country/edit/{id}', [Country::class, 'update'])->name('editCountry');
Route::get('country/delete/{id}', [Country::class, 'destroy'])->name('deleteCountry');
//---------------------
// العناوين
Route::get('address', [Address::class, 'index'])->name('indexAddress');
Route::post('address/add', [Address::class, 'store'])->name('storeAddress');
Route::post('address/edit/{id}', [Address::class, 'update'])->name('editAddress');
Route::get('address/delete/{id}', [Address::class, 'destroy'])->name('deleteAddress');
//---------------------
// حالات الطلب
Route::get('orderstatus', [OrderStatus::class, 'index'])->name('indexOrderStatus');
Route::post('orderstatus/add', [OrderStatus::class, 'store'])->name('storeOrderStatus');
Route::post('orderstatus/edit/{id}', [OrderStatus::class, 'update'])->name('editOrderStatus');
Route::get('orderstatus/delete/{id}', [OrderStatus::class, 'destroy'])->name('deleteOrderStatus');
//---------------------
// لغات الكتب
Route::get('booklanguge', [BookLanguge::class, 'index'])->name('indexBookLanguge');
Route::post('booklanguge/add', [BookLanguge::class, 'store'])->name('storeBookLanguge');
Route::post('booklanguge/edit/{id}', [BookLanguge::class, 'update'])->name('editBookLanguge');
Route::get('booklanguge/delete/{id}', [BookLanguge::class, 'destroy'])->name('deleteBookLanguge');
//---------------------
// حالات العنواين
Route::get('addressstatus', [AddressStatus::class, 'index'])->name('indexAddressStatus');
Route::post('addressstatus/add', [AddressStatus::class, 'store'])->name('storeAddressStatus');
Route::post('addressstatus/edit/{id}', [AddressStatus::class, 'update'])->name('editAddressStatus');
Route::get('addressstatus/delete/{id}', [AddressStatus::class, 'destroy'])->name('deleteAddressStatus');
//---------------------
// طرق الشحن
Route::get('shippingmethod', [ShippingMethod::class, 'index'])->name('indexShippingMethod');
Route::post('shippingmethod/add', [ShippingMethod::class, 'store'])->name('storeShippingMethod');
Route::post('shippingmethod/edit/{id}', [ShippingMethod::class, 'update'])->name('editShippingMethod');
Route::get('shippingmethod/delete/{id}', [ShippingMethod::class, 'destroy'])->name('deleteShippingMethod');

/*-----------------------------------------------------------------------*/