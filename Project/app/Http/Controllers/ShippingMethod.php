<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class ShippingMethod extends Controller
{
    public function index()
    {
        if (Session::get('userid') && Session::get('admin') == 1) {
            $connection = DataBaseConnection::db_connect();
            $p_out =  oci_new_cursor($connection);
            $query = 'BEGIN constants_pkg.get_shipping_method(:coursor); END;';
            $stmt = oci_parse($connection, $query);
            oci_bind_by_name($stmt, ':coursor', $p_out, -1, OCI_B_CURSOR);
            oci_execute($stmt);
            oci_execute($p_out);
            $i = 0;
            return view('getmethod', compact('p_out', 'i'));
        } else {
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        if (Session::get('userid') && Session::get('admin') == 1) {

            $name = $request->name;
            $cost = floatval($request->cost);
            $code = 0;
            $connection = DataBaseConnection::db_connect();
            $query = 'BEGIN constants_pkg.insert_shipping_method(:name,:cost,:code); END;';
            $stmt = oci_parse($connection, $query);
            oci_bind_by_name($stmt, ':name', $name);
            oci_bind_by_name($stmt, ':cost', $cost);
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
            $cost = floatval($request->cost);
            $code = 0;
            $connection = DataBaseConnection::db_connect();
            $query = 'BEGIN constants_pkg.update_shipping_method(:id,:name,:cost,:code); END;';
            $stmt = oci_parse($connection, $query);
            oci_bind_by_name($stmt, ':id', $id);
            oci_bind_by_name($stmt, ':name', $name);
            oci_bind_by_name($stmt, ':cost', $cost);
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
            $query = 'BEGIN constants_pkg.delete_shipping_method(:id,:code); END;';
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