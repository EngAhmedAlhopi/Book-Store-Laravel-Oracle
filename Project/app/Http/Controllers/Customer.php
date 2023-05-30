<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class Customer extends Controller
{
    public function index()
    {
        if (Session::get('userid') && Session::get('admin') == 1) {
            $connection = DataBaseConnection::db_connect();
            $p_out =  oci_new_cursor($connection);
            $query = 'BEGIN admin_operation_pkg.get_custmers(:coursor); END;';
            $stmt = oci_parse($connection, $query);
            oci_bind_by_name($stmt, ':coursor', $p_out, -1, OCI_B_CURSOR);
            oci_execute($stmt);
            oci_execute($p_out);
            $i = 0;
            return view('getcustomer', compact('p_out', 'i'));
        } else {
            return redirect()->back();
        }
    }

    public function show(Request $request)
    {
        if (Session::get('userid') && Session::get('admin') == 1) {
            $connection = DataBaseConnection::db_connect();
            $id = $request->id;
            // dd($request->id);
            $p_out_data =  oci_new_cursor($connection);
            $p_out =  oci_new_cursor($connection);
            $query = 'BEGIN admin_operation_pkg.get_custmer_address(:id,:p_out_data,:p_out); END;';
            $stmt = oci_parse($connection, $query);
            oci_bind_by_name($stmt, ':id', $id);
            oci_bind_by_name($stmt, ':p_out_data', $p_out_data, -1, OCI_B_CURSOR);
            oci_bind_by_name($stmt, ':p_out', $p_out, -1, OCI_B_CURSOR);
            oci_execute($stmt);
            oci_execute($p_out_data);
            oci_execute($p_out);
            $i = 0;
            return view('getcustomeraddress', compact('p_out_data', 'p_out', 'i'));
        } else {
            return redirect()->back();
        }
    }

    public function get_profile()
    {
        if (Session::get('userid') && Session::get('admin') == 1) {
            return view('profileadmin');
        } elseif (Session::get('userid') && Session::get('admin') == 0) {
            return view('profileuser');
        } else {
            return redirect()->back();
        }
    }

    public function update_profile(Request $request)
    {
        if (Session::get('userid')) {
            $connection = DataBaseConnection::db_connect();
            Session::put('fname', $request->fname);
            Session::put('lname', $request->lname);
            $fname = Session::get('fname');
            $lname = Session::get('lname');
            if ($request->newPass1 == '') {
                $password = Session::get('password');
            } else {
                $password = $request->newPass1;
                Session::put('password', $password);
            }
            $code = 0;
            $id = Session::get('userid');
            $data = [
                'id' => $id,
                'fname' => $fname,
                'lname' => $lname,
                'pass' => $password
            ];

            // dd($data);
            $query = 'BEGIN permission_pkg.update_custmer(:id,:fname,:lname,:password,:code); END;';
            $stmt = oci_parse($connection, $query);
            oci_bind_by_name($stmt, ':id', $id);
            oci_bind_by_name($stmt, ':fname', $fname);
            oci_bind_by_name($stmt, ':lname', $lname);
            oci_bind_by_name($stmt, ':password', $password);
            // oci_bind_by_name($stmt, ':img', '');
            oci_bind_by_name($stmt, ':code', $code, 100);
            oci_execute($stmt);






            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}