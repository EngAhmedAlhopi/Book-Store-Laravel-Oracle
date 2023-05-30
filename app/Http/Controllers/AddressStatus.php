<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class AddressStatus extends Controller
{
    public function index()
    {
        if (Session::get('userid') && Session::get('admin') == 1) {
            $connection = DataBaseConnection::db_connect();
            $p_out =  oci_new_cursor($connection);
            $query = 'BEGIN constants_pkg.get_address_status(:coursor); END;';
            $stmt = oci_parse($connection, $query);
            oci_bind_by_name($stmt, ':coursor', $p_out, -1, OCI_B_CURSOR);
            oci_execute($stmt);
            oci_execute($p_out);
            $i = 0;
            return view('getaddressstatus', compact('p_out', 'i'));
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
            $query = 'BEGIN constants_pkg.insert_address_status(:name,:code); END;';
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
            $query = 'BEGIN constants_pkg.update_address_status(:id,:name,:code); END;';
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
            $query = 'BEGIN constants_pkg.delete_address_status(:id,:code); END;';
            $stmt = oci_parse($connection, $query);
            oci_bind_by_name($stmt, ':id', $id);
            oci_bind_by_name($stmt, ':code', $code, 100);
            oci_execute($stmt);

            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}