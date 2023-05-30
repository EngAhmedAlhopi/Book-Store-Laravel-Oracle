<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use const OCI_BIND_BLOB;



class Book extends Controller
{
    public function index()
    {
        if (Session::get('userid') && Session::get('admin') == 1) {

            // $connection = DataBaseConnection::db_connect();
            // $p_out =  oci_new_cursor($connection);
            // $query = 'BEGIN admin_operation_pkg.get_all_books(:coursor); END;';
            // $stmt = oci_parse($connection, $query);
            // oci_bind_by_name($stmt, ':coursor', $p_out, -1, OCI_B_CURSOR);
            // oci_execute($stmt);
            // oci_execute($p_out);
            $response = Http::get('http://localhost/laravel-projects/MyAPIs/public/get_all_books');
            // dd($response->json());
            if ($response->ok()) {
                $p_out = $response->json();
            } else {
                $p_out = null;
            }
            $i = 0;
            return view('getbooks', compact('p_out', 'i'));
            // return $p_out;
        } else {
            return redirect()->back();
        }
    }

    public function create()
    {
        if (Session::get('userid') && Session::get('admin') == 1) {
            $connection = DataBaseConnection::db_connect();
            $p_out_lang =  oci_new_cursor($connection);
            $p_out_publ =  oci_new_cursor($connection);
            $p_out_auth =  oci_new_cursor($connection);
            $query_lang = 'BEGIN constants_pkg.get_book_language(:coursor); END;';
            $query_publ = 'BEGIN constants_pkg.get_publisher(:coursor); END;';
            $query_auth = 'BEGIN constants_pkg.get_author(:coursor); END;';
            $stmt_lang = oci_parse($connection, $query_lang);
            $stmt_publ = oci_parse($connection, $query_publ);
            $stmt_auth = oci_parse($connection, $query_auth);
            oci_bind_by_name($stmt_lang, ':coursor', $p_out_lang, -1, OCI_B_CURSOR);
            oci_bind_by_name($stmt_publ, ':coursor', $p_out_publ, -1, OCI_B_CURSOR);
            oci_bind_by_name($stmt_auth, ':coursor', $p_out_auth, -1, OCI_B_CURSOR);
            oci_execute($stmt_lang);
            oci_execute($stmt_publ);
            oci_execute($stmt_auth);
            oci_execute($p_out_lang);
            oci_execute($p_out_publ);
            oci_execute($p_out_auth);
            return view('addbook', compact('p_out_lang', 'p_out_publ', 'p_out_auth'));
        } else {
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        if (Session::get('userid') && Session::get('admin') == 1) {
            $title   =   $request->input('title');
            $language_id  = intval($request->input('lang'));
            $num_pages    = intval($request->input('num'));
            $publication_date = $request->date;
            $publisher_id   = intval($request->input('publ_id'));
            // $image = 'storage/app\public\pictures\\';


            $fileName = time() . '-' . $request->file('image')->getClientOriginalName();
            $image = $request->image;
            $destination = 'pictures/';

            // $fileName = time() . '-' . $request->file('image')->getClientOriginalName();
            // $path = $request->file('image')->storeAs('pictures', $fileName);
            // $image = $path;

            $image->move($destination, $fileName);
            $image = $destination . $fileName;




            $price        = floatval($request->input('price'));
            $auther_id     = intval($request->input('auth_id'));
            $code = 0;
            $connection = DataBaseConnection::db_connect();
            $query = 'BEGIN admin_operation_pkg.insert_book(:title,:lang,:nump,:publ_date,:publ_id,:img,:price,:auth_id,:code); END;';
            $stmt = oci_parse($connection, $query);
            oci_bind_by_name($stmt, ':title', $title);
            oci_bind_by_name($stmt, ':lang', $language_id);
            oci_bind_by_name($stmt, ':nump', $num_pages);
            oci_bind_by_name($stmt, ':publ_date', $publication_date);
            oci_bind_by_name($stmt, ':publ_id', $publisher_id);
            oci_bind_by_name($stmt, ':img', $image);
            oci_bind_by_name($stmt, ':price', $price);
            oci_bind_by_name($stmt, ':auth_id', $auther_id);
            oci_bind_by_name($stmt, ':code', $code, 100);
            oci_execute($stmt);
            // dd($image);
            return redirect()->route('indexBooks');
        } else {
            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        if (Session::get('userid') && Session::get('admin') == 1) {

            $id = intval($request->id);
            $connection = DataBaseConnection::db_connect();
            $p_out_lang =  oci_new_cursor($connection);
            $p_out_publ =  oci_new_cursor($connection);
            $p_out_auth =  oci_new_cursor($connection);
            $p_out =  oci_new_cursor($connection);
            $query_lang = 'BEGIN constants_pkg.get_book_language(:coursor); END;';
            $query_publ = 'BEGIN constants_pkg.get_publisher(:coursor); END;';
            $query_auth = 'BEGIN constants_pkg.get_author(:coursor); END;';
            $query = 'BEGIN admin_operation_pkg.get_book_by_id(:id,:coursor); END;';
            $stmt_lang = oci_parse($connection, $query_lang);
            $stmt_publ = oci_parse($connection, $query_publ);
            $stmt_auth = oci_parse($connection, $query_auth);
            $stmt = oci_parse($connection, $query);
            oci_bind_by_name($stmt_lang, ':coursor', $p_out_lang, -1, OCI_B_CURSOR);
            oci_bind_by_name($stmt_publ, ':coursor', $p_out_publ, -1, OCI_B_CURSOR);
            oci_bind_by_name($stmt_auth, ':coursor', $p_out_auth, -1, OCI_B_CURSOR);
            oci_bind_by_name($stmt, ':id', $id);
            oci_bind_by_name($stmt, ':coursor', $p_out, -1, OCI_B_CURSOR);
            oci_execute($stmt_lang);
            oci_execute($stmt_publ);
            oci_execute($stmt_auth);
            oci_execute($stmt);
            oci_execute($p_out_lang);
            oci_execute($p_out_publ);
            oci_execute($p_out_auth);
            oci_execute($p_out);
            return view('updatebook', compact('p_out', 'p_out_lang', 'p_out_publ', 'p_out_auth'));
        } else {
            return redirect()->back();
        }
    }

    public function save(Request $request)
    {
        if (Session::get('userid') && Session::get('admin') == 1) {
            $id = intval($request->input('id'));
            $title   =   $request->input('title');
            $language_id  = intval($request->input('lang'));
            $num_pages    = intval($request->input('num'));
            $publication_date = $request->date;
            $publisher_id   = intval($request->input('publ_id'));
            $image        = null;
            // $request->img;
            $price        = floatval($request->input('price'));
            $auther_id     = intval($request->input('auth_id'));
            $auther_id2     = intval($request->input('auth_id2'));
            $code = 0;
            $connection = DataBaseConnection::db_connect();
            $query = 'BEGIN admin_operation_pkg.update_book(:id,:title,:lang,:nump,:publ_date,:publ_id,:price,:auth_id1,:auth_id2,:code); END;';
            $stmt = oci_parse($connection, $query);
            oci_bind_by_name($stmt, ':id', $id);
            oci_bind_by_name($stmt, ':title', $title);
            oci_bind_by_name($stmt, ':lang', $language_id);
            oci_bind_by_name($stmt, ':nump', $num_pages);
            oci_bind_by_name($stmt, ':publ_date', $publication_date);
            oci_bind_by_name($stmt, ':publ_id', $publisher_id);
            // oci_bind_by_name($stmt, ':img', $image);
            oci_bind_by_name($stmt, ':price', $price);
            oci_bind_by_name($stmt, ':auth_id1', $auther_id);
            oci_bind_by_name($stmt, ':auth_id2', $auther_id2);
            oci_bind_by_name($stmt, ':code', $code, 100);
            oci_execute($stmt);
            return redirect()->route('indexBooks');
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
            $query = 'BEGIN admin_operation_pkg.delete_book(:id,:code); END;';
            $stmt = oci_parse($connection, $query);
            oci_bind_by_name($stmt, ':id', $id);
            oci_bind_by_name($stmt, ':code', $code, 100);
            oci_execute($stmt);
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function allBooks()
    {
        if (Session::get('userid') && Session::get('admin') == 0) {
            $connection = DataBaseConnection::db_connect();
            $p_out =  oci_new_cursor($connection);
            $query = 'BEGIN admin_operation_pkg.get_all_books(:coursor); END;';
            $stmt = oci_parse($connection, $query);
            oci_bind_by_name($stmt, ':coursor', $p_out, -1, OCI_B_CURSOR);
            oci_execute($stmt);
            oci_execute($p_out);
            return view('getbooksuser', compact('p_out'));
        } else {
            return redirect()->back();
        }
    }

    public function addBookToOrder($id)
    {
        if (Session::get('userid') && Session::get('admin') == 0) {
            $connection = DataBaseConnection::db_connect();
            $book_id = intval($id);
            $order_id   =   intval(Session::get('orderId'));
            $code = 0;
            $query = 'BEGIN user_oprations_pkg.add_book_to_order(:order_id,:book_id,:code); END;';
            $stmt = oci_parse($connection, $query);
            oci_bind_by_name($stmt, ':order_id', $order_id);
            oci_bind_by_name($stmt, ':book_id', $book_id);
            oci_bind_by_name($stmt, ':code', $code, 100);
            oci_execute($stmt);
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function searchBookPage()
    {
        if (Session::get('userid') && Session::get('admin') == 0) {
            $connection = DataBaseConnection::db_connect();
            $p_out_lang =  oci_new_cursor($connection);
            $p_out_publ =  oci_new_cursor($connection);
            $p_out_auth =  oci_new_cursor($connection);
            $query_lang = 'BEGIN constants_pkg.get_book_language(:coursor); END;';
            $query_publ = 'BEGIN constants_pkg.get_publisher(:coursor); END;';
            $query_auth = 'BEGIN constants_pkg.get_author(:coursor); END;';
            $stmt_lang = oci_parse($connection, $query_lang);
            $stmt_publ = oci_parse($connection, $query_publ);
            $stmt_auth = oci_parse($connection, $query_auth);
            oci_bind_by_name($stmt_lang, ':coursor', $p_out_lang, -1, OCI_B_CURSOR);
            oci_bind_by_name($stmt_publ, ':coursor', $p_out_publ, -1, OCI_B_CURSOR);
            oci_bind_by_name($stmt_auth, ':coursor', $p_out_auth, -1, OCI_B_CURSOR);
            oci_execute($stmt_lang);
            oci_execute($stmt_publ);
            oci_execute($stmt_auth);
            oci_execute($p_out_lang);
            oci_execute($p_out_publ);
            oci_execute($p_out_auth);


            return view('searchbook', compact('p_out_lang', 'p_out_publ', 'p_out_auth'));
        } else {
            return redirect()->back();
        }
    }

    public function searchBook(Request $request)
    {
        if (Session::get('userid') && Session::get('admin') == 0) {
            $connection = DataBaseConnection::db_connect();
            $title = $request->input('title');
            $lang_id = intval($request->input('lang_id'));
            $publ_id = intval($request->input('publ_id'));
            $auth_id = intval($request->input('auth_id'));
            $count = 0;
            $p_out =  oci_new_cursor($connection);
            $connection = DataBaseConnection::db_connect();
            $p_out_lang =  oci_new_cursor($connection);
            $p_out_publ =  oci_new_cursor($connection);
            $p_out_auth =  oci_new_cursor($connection);
            $query_lang = 'BEGIN constants_pkg.get_book_language(:coursor); END;';
            $query_publ = 'BEGIN constants_pkg.get_publisher(:coursor); END;';
            $query_auth = 'BEGIN constants_pkg.get_author(:coursor); END;';
            $stmt_lang = oci_parse($connection, $query_lang);
            $stmt_publ = oci_parse($connection, $query_publ);
            $stmt_auth = oci_parse($connection, $query_auth);
            oci_bind_by_name($stmt_lang, ':coursor', $p_out_lang, -1, OCI_B_CURSOR);
            oci_bind_by_name($stmt_publ, ':coursor', $p_out_publ, -1, OCI_B_CURSOR);
            oci_bind_by_name($stmt_auth, ':coursor', $p_out_auth, -1, OCI_B_CURSOR);
            oci_execute($stmt_lang);
            oci_execute($stmt_publ);
            oci_execute($stmt_auth);
            oci_execute($p_out_lang);
            oci_execute($p_out_publ);
            oci_execute($p_out_auth);
            $query = 'BEGIN user_oprations_pkg.shearch_book(:title,:lang_id,:publ_id,:auth_id,:count,:coursor); END;';
            $stmt = oci_parse($connection, $query);
            oci_bind_by_name($stmt, ':title', $title);
            oci_bind_by_name($stmt, ':lang_id', $lang_id);
            oci_bind_by_name($stmt, ':publ_id', $publ_id);
            oci_bind_by_name($stmt, ':auth_id', $auth_id);
            oci_bind_by_name($stmt, ':count', $count, 100);
            oci_bind_by_name($stmt, ':coursor', $p_out, -1, OCI_B_CURSOR);
            oci_execute($stmt);
            oci_execute($p_out);


            return view('searchresult', compact('p_out', 'p_out_auth', 'p_out_publ', 'p_out_lang', 'title', 'lang_id', 'publ_id', 'auth_id', 'count'));
        } else {
            return redirect()->back();
        }
    }
}
