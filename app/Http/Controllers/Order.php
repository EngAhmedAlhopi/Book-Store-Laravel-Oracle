<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class Order extends Controller
{


    public function orderDet(Request $request)
    {
        if (Session::get('userid') && Session::get('admin') == 1) {


            $connection = DataBaseConnection::db_connect();


            $p_out_status =  oci_new_cursor($connection);
            $query_status = 'BEGIN constants_pkg.get_order_status(:coursor); END;';
            $stmt_status = oci_parse($connection, $query_status);
            oci_bind_by_name($stmt_status, ':coursor', $p_out_status, -1, OCI_B_CURSOR);
            oci_execute($stmt_status);
            oci_execute($p_out_status);


            $id = intval($request->id);
            $p_out_data =  oci_new_cursor($connection);
            $p_out =  oci_new_cursor($connection);
            $query = 'BEGIN admin_operation_pkg.get_custmer_order_det(:id,:p_out1,:p_out2); END;';
            $stmt = oci_parse($connection, $query);
            oci_bind_by_name($stmt, ':id', $id);
            oci_bind_by_name($stmt, ':p_out1', $p_out_data, -1, OCI_B_CURSOR);
            oci_bind_by_name($stmt, ':p_out2', $p_out, -1, OCI_B_CURSOR);
            oci_execute($stmt);
            oci_execute($p_out_data);
            oci_execute($p_out);
            $i = 0;
            return view('orderdat', compact('p_out_data', 'p_out', 'i', 'p_out_status'));
        } else {
            return redirect()->back();
        }
    }
    public function index()
    {
        if (Session::get('userid') && Session::get('admin') == 1) {


            $connection = DataBaseConnection::db_connect();
            $p_out =  oci_new_cursor($connection);
            $query = 'BEGIN admin_operation_pkg.get_custmer_orders(:p_out); END;';
            $stmt = oci_parse($connection, $query);
            oci_bind_by_name($stmt, ':p_out', $p_out, -1, OCI_B_CURSOR);
            oci_execute($stmt);
            oci_execute($p_out);
            $i = 0;
            return view('getorders', compact('p_out', 'i'));



            // return view('getorders');
        } else {
            return redirect()->back();
        }
    }

    public function updateOrderStatus(Request $request)
    {
        if (Session::get('userid') && Session::get('admin') == 1) {
            $orderId = intval($request->orderID);
            $statusId = intval($request->status_id);
            $code = 0;

            $connection = DataBaseConnection::db_connect();
            $p_out =  oci_new_cursor($connection);
            $query = 'BEGIN admin_operation_pkg.update_order_status(:p_order_id,:p_status,:code); END;';
            $stmt = oci_parse($connection, $query);
            oci_bind_by_name($stmt, ':p_order_id', $orderId);
            oci_bind_by_name($stmt, ':p_status', $statusId);
            oci_bind_by_name($stmt, ':code', $code, 100);
            oci_execute($stmt);

            return redirect()->back();



            // return view('getorders');
        } else {
            return redirect()->back();
        }
    }

    public function userOrdersDone(Request $request)
    {
        if (Session::get('userid') && Session::get('admin') == 0) {

            $connection = DataBaseConnection::db_connect();
            $id = $request->id;
            // dd($request->id);
            $p_out_data =  oci_new_cursor($connection);
            $p_out =  oci_new_cursor($connection);
            $query = 'BEGIN user_oprations_pkg.get_orders_by_custmer_id_done(:id,:p_out); END;';
            $stmt = oci_parse($connection, $query);
            oci_bind_by_name($stmt, ':id', $id);
            oci_bind_by_name($stmt, ':p_out', $p_out, -1, OCI_B_CURSOR);
            oci_execute($stmt);
            oci_execute($p_out);
            $i = 0;
            $status = 1;
            return view('userordersdone', compact('p_out', 'i', 'status'));
        } else {
            return redirect()->back();
        }
    }

    public function userOrdersNote(Request $request)
    {
        if (Session::get('userid') && Session::get('admin') == 0) {

            $connection = DataBaseConnection::db_connect();
            $id = $request->id;
            // dd($request->id);
            $p_out_data =  oci_new_cursor($connection);
            $p_out =  oci_new_cursor($connection);
            $query = 'BEGIN user_oprations_pkg.get_orders_by_custmer_id_not(:id,:p_out); END;';
            $stmt = oci_parse($connection, $query);
            oci_bind_by_name($stmt, ':id', $id);
            oci_bind_by_name($stmt, ':p_out', $p_out, -1, OCI_B_CURSOR);
            oci_execute($stmt);
            oci_execute($p_out);
            $i = 0;
            $status = 2;
            return view('userordersnot', compact('p_out', 'i', 'status'));
        } else {
            return redirect()->back();
        }
    }

    public function orderDetails(Request $request)
    {
        if (Session::get('userid') && Session::get('admin') == 0) {
            $connection = DataBaseConnection::db_connect();
            $id = $request->id;
            $p_out_data =  oci_new_cursor($connection);
            $p_out =  oci_new_cursor($connection);
            $status = 0;
            $query = 'BEGIN user_oprations_pkg.get_order_details(:id,:status,:p_out_data,:p_out); END;';
            $stmt = oci_parse($connection, $query);
            oci_bind_by_name($stmt, ':id', $id);
            oci_bind_by_name($stmt, ':status', $status, 100);
            oci_bind_by_name($stmt, ':p_out_data', $p_out_data, -1, OCI_B_CURSOR);
            oci_bind_by_name($stmt, ':p_out', $p_out, -1, OCI_B_CURSOR);
            oci_execute($stmt);
            oci_execute($p_out_data);
            oci_execute($p_out);
            $i = 0;
            return view('orderdetails', compact('p_out_data', 'p_out', 'i', 'status', 'id'));
        } else {
            return redirect()->back();
        }
    }

    public function deleteBook(Request $request)
    {
        if (Session::get('userid') && Session::get('admin') == 0) {
            $connection = DataBaseConnection::db_connect();
            $id = $request->id;
            $code = 0;
            $query = 'BEGIN user_oprations_pkg.delete_book_from_order(:id,:code); END;';
            $stmt = oci_parse($connection, $query);
            oci_bind_by_name($stmt, ':id', $id);
            oci_bind_by_name($stmt, ':code', $code, 100);
            oci_execute($stmt);
            $i = 0;
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function deleteOrder(Request $request)
    {
        if (Session::get('userid') && Session::get('admin') == 0) {
            $connection = DataBaseConnection::db_connect();
            $id = $request->id;
            $code = 0;
            $query = 'BEGIN user_oprations_pkg.delete_order(:id,:code); END;';
            $stmt = oci_parse($connection, $query);
            oci_bind_by_name($stmt, ':id', $id);
            oci_bind_by_name($stmt, ':code', $code, 100);
            oci_execute($stmt);
            Session::forget('orderId');
            Session::forget('addBook');
            return redirect()->route('userOrdersNote', Session::get('userid'));
        } else {
            return redirect()->back();
        }
    }

    public function confOrder(Request $request)
    {
        if (Session::get('userid') && Session::get('admin') == 0) {
            $connection = DataBaseConnection::db_connect();
            $id = $request->id;
            $p_out_data =  oci_new_cursor($connection);
            $p_out =  oci_new_cursor($connection);
            $status = 0;
            $query = 'BEGIN user_oprations_pkg.get_order_details(:id,:status,:p_out_data,:p_out); END;';
            $stmt = oci_parse($connection, $query);
            oci_bind_by_name($stmt, ':id', $id);
            oci_bind_by_name($stmt, ':status', $status, 100);
            oci_bind_by_name($stmt, ':p_out_data', $p_out_data, -1, OCI_B_CURSOR);
            oci_bind_by_name($stmt, ':p_out', $p_out, -1, OCI_B_CURSOR);
            oci_execute($stmt);
            oci_execute($p_out_data);
            oci_execute($p_out);
            $i = 0;

            $p_out_address =  oci_new_cursor($connection);
            $query_address = 'BEGIN constants_pkg.get_address(:coursor); END;';
            $stmt_address = oci_parse($connection, $query_address);
            oci_bind_by_name($stmt_address, ':coursor', $p_out_address, -1, OCI_B_CURSOR);
            oci_execute($stmt_address);
            oci_execute($p_out_address);

            $p_out_method =  oci_new_cursor($connection);
            $query_method = 'BEGIN constants_pkg.get_shipping_method(:coursor); END;';
            $stmt_method = oci_parse($connection, $query_method);
            oci_bind_by_name($stmt_method, ':coursor', $p_out_method, -1, OCI_B_CURSOR);
            oci_execute($stmt_method);
            oci_execute($p_out_method);

            $code = 0;


            return view('orderconf', compact('p_out_data', 'p_out', 'p_out_address', 'p_out_method', 'i', 'status', 'id', 'code'));
        } else {
            return redirect()->back();
        }
    }

    public function saveOrder(Request $request)
    {
        if (Session::get('userid') && Session::get('admin') == 0) {
            $connection = DataBaseConnection::db_connect();
            $id = intval($request->id);
            $method = intval($request->method);
            $address = intval($request->address);
            $code = 0;
            $query = 'BEGIN user_oprations_pkg.save_order(:id,:method,:address,:code); END;';
            $stmt = oci_parse($connection, $query);
            oci_bind_by_name($stmt, ':id', $id);
            oci_bind_by_name($stmt, ':method', $method);
            oci_bind_by_name($stmt, ':address', $address);
            oci_bind_by_name($stmt, ':code', $code, 100);
            oci_execute($stmt);
            if ($code == 3) {
                return redirect()->back()->with('code', $code);
            } else {
                Session::forget('orderId');
                Session::forget('addBook');
                return redirect()->route('userOrdersDone', Session::get('userid'));
            }
            // return view('orderdetails', compact('p_out_data', 'p_out', 'i', 'status', 'id'));
        } else {
            return redirect()->back();
        }
    }
    public function addBook(Request $request)
    {
        if (Session::get('userid') && Session::get('admin') == 0) {
            $id = intval($request->id);
            Session::put('orderId', $id);
            Session::put('addBook', 1);
            return redirect()->route('allBooks');
        } else {
            return redirect()->back();
        }
    }

    public function createOrder()
    {
        if (Session::get('userid') && Session::get('admin') == 0) {
            $connection = DataBaseConnection::db_connect();
            $id = Session::get('userid');
            $code = 0;
            $order_id = 0;
            $query = 'BEGIN user_oprations_pkg.add_order(:id,:order_id,:code); END;';
            $stmt = oci_parse($connection, $query);
            oci_bind_by_name($stmt, ':id', $id);
            oci_bind_by_name($stmt, ':order_id', $order_id, 100);
            oci_bind_by_name($stmt, ':code', $code, 100);
            oci_execute($stmt);
            Session::put('orderId', $order_id);
            Session::put('addBook', 1);
            return redirect()->back();
            // return redirect()->route('allBooks');
        } else {
            return redirect()->back();
        }
    }
}