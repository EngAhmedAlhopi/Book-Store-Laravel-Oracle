<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class Author extends Controller
{
    public function index()
    {
        if (Session::get('userid') && Session::get('admin') == 1) {
            $connection = DataBaseConnection::db_connect();
            $p_out =  oci_new_cursor($connection);
            $query = 'BEGIN constants_pkg.get_author(:coursor); END;';
            $stmt = oci_parse($connection, $query);
            oci_bind_by_name($stmt, ':coursor', $p_out, -1, OCI_B_CURSOR);
            oci_execute($stmt);
            oci_execute($p_out);
            $i = 0;
            return view('getauthor', compact('p_out', 'i'));
        } else {
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        if (Session::get('userid') && Session::get('admin') == 1) {

            $name = $request->name;
            $code = 0;
            $connection = DataBaseConnection::db_connect();
            $query = 'BEGIN constants_pkg.insert_author(:name,:code); END;';
            $stmt = oci_parse($connection, $query);
            oci_bind_by_name($stmt, ':name', $name);
            oci_bind_by_name($stmt, ':code', $code, 100);
            oci_execute($stmt);

            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        if (Session::get('userid') && Session::get('admin') == 1) {

            $id = $request->id;
            $name = $request->name;
            $code = 0;
            $connection = DataBaseConnection::db_connect();
            $query = 'BEGIN constants_pkg.update_author(:id,:name,:code); END;';
            $stmt = oci_parse($connection, $query);
            oci_bind_by_name($stmt, ':id', $id);
            oci_bind_by_name($stmt, ':name', $name);
            oci_bind_by_name($stmt, ':code', $code, 100);
            oci_execute($stmt);

            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }


    public function destroy(Request $request)
    {
        if (Session::get('userid') && Session::get('admin') == 1) {

            $id = $request->id;
            $code = 0;
            $connection = DataBaseConnection::db_connect();
            $query = 'BEGIN constants_pkg.delete_author(:id,:code); END;';
            $stmt = oci_parse($connection, $query);
            oci_bind_by_name($stmt, ':id', $id);
            oci_bind_by_name($stmt, ':code', $code, 100);
            oci_execute($stmt);

            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function get_count()
    {
        if (Session::get('userid') && Session::get('admin') == 1) {
            $connection = DataBaseConnection::db_connect();
            $p_out =  oci_new_cursor($connection);
            $query = 'BEGIN admin_operation_pkg.get_auther_and_books_number(:coursor); END;';
            $stmt = oci_parse($connection, $query);
            oci_bind_by_name($stmt, ':coursor', $p_out, -1, OCI_B_CURSOR);
            oci_execute($stmt);
            oci_execute($p_out);
            $i = 0;
            return view('apex', compact('p_out', 'i'));
        } else {
            return redirect()->back();
        }
    }

    public function get_count_for_user()
    {
        if (Session::get('userid') && Session::get('admin') == 0) {
            $connection = DataBaseConnection::db_connect();
            $p_out =  oci_new_cursor($connection);
            $query = 'BEGIN user_oprations_pkg.get_auther_and_books_number(:coursor); END;';
            $stmt = oci_parse($connection, $query);
            oci_bind_by_name($stmt, ':coursor', $p_out, -1, OCI_B_CURSOR);
            oci_execute($stmt);
            oci_execute($p_out);
            $i = 0;
            return view('authorbooksnumber', compact('p_out', 'i'));
        } else {
            return redirect()->back();
        }
    }
}