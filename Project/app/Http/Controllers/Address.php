<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Address extends Controller
{
    public function index()
    {
        if (Session::get('userid') && Session::get('admin') == 1) {
            $connection = DataBaseConnection::db_connect();
            $p_out =  oci_new_cursor($connection);
            $query = 'BEGIN constants_pkg.get_address(:coursor); END;';
            $stmt = oci_parse($connection, $query);
            oci_bind_by_name($stmt, ':coursor', $p_out, -1, OCI_B_CURSOR);
            oci_execute($stmt);
            oci_execute($p_out);

            $p_out_country =  oci_new_cursor($connection);
            $query_country = 'BEGIN constants_pkg.get_country(:coursor); END;';
            $stmt_country = oci_parse($connection, $query_country);
            oci_bind_by_name($stmt_country, ':coursor', $p_out_country, -1, OCI_B_CURSOR);
            oci_execute($stmt_country);
            oci_execute($p_out_country);

            $i = 0;
            return view('getaddress', compact('p_out', 'p_out_country', 'connection', 'i'));
        } else {
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        if (Session::get('userid') && Session::get('admin') == 1) {

            $country = intval($request->country);
            $city = $request->city;
            $street = $request->street;
            $code = 0;
            $connection = DataBaseConnection::db_connect();
            $query = 'BEGIN constants_pkg.insert_address(:street,:city,:country,:code); END;';
            $stmt = oci_parse($connection, $query);
            oci_bind_by_name($stmt, ':street', $street);
            oci_bind_by_name($stmt, ':city', $city);
            oci_bind_by_name($stmt, ':country', $country);
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
            $country = $request->country;
            $city = $request->city;
            $street = $request->street;
            $code = 0;
            $connection = DataBaseConnection::db_connect();
            $query = 'BEGIN constants_pkg.update_address(:id,:street,:city,:country,:code); END;';
            $stmt = oci_parse($connection, $query);
            oci_bind_by_name($stmt, ':id', $id);
            oci_bind_by_name($stmt, ':street', $street);
            oci_bind_by_name($stmt, ':city', $city);
            oci_bind_by_name($stmt, ':country', $country);
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
            $query = 'BEGIN constants_pkg.delete_address(:id,:code); END;';
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