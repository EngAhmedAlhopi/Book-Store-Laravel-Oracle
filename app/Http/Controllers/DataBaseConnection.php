<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;


class DataBaseConnection extends Controller
{
    public $ip   = '127.0.0.1';
    public $user = 'ahmed';
    public $pass = 'a123';
    public $instance = 'ORCL';
    public $encode =  'AL32UTF8';
    public $conn = '';

    static function db_connect()
    {
        $conn = oci_connect('bookstore', 'b123', "127.0.0.1/ORCL", 'AL32UTF8');
        return $conn;
    }

    static function execute_procedure($pkg, $proc, $params, $in_num, $out_num, $cursor)
    {
        $connection = DataBaseConnection::db_connect();
        $result = [];
        $array = [];
        $key = 1;
        foreach ($params as $param) {
            $array['a' . $key] = $param;
            $key += 1;
        }
        if ($cursor) {
            $p_out = oci_new_cursor($connection);
        } else {
            $sql = "BEGIN $pkg.$proc(";
            foreach ($array as $k => $arr) {
                $sql .= ":a$k,";
            }
            $sql = trim($sql, ",") . "); END;";
            $stmt = oci_parse($connection, $sql);
            for ($i = 1; $i <= $in_num; $i++) {
                oci_bind_by_name($stmt, ':a' . $i, $array[$i], -1, OCI_B_CURSOR);
            }
            for ($i = $in_num + 1; $i <= $out_num + $in_num; $i++) {
                oci_bind_by_name($stmt, ':a' . $i, $result[$i], -1, OCI_B_CURSOR);
            }
            oci_execute($stmt);
        }
        return $result;
    }
}