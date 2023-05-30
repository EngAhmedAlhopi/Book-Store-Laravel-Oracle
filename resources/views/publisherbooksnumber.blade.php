@extends('layouts.master')
@section('title')
    دور النشر وعدد الكتب
@endsection

@section('title_page')
    <table>
        <tr>
            <td>دور النشر وعدد الكتب</td>
        </tr>
    </table>
@endsection
@section('style')
    <style>
        .tbl {
            width: 50%;
            margin: 30px auto;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);

        }

        table {
            {{--  border-collapse: collapse;  --}} width: 100%;
            text-align: center;
        }

        .top-border {
            border-top: 1px solid rgb(148, 148, 148);
        }

        th,
        td {
            padding: 8px;
        }

        th {
            font-size: larger;
        }

        td {
            text-align: center;
            font-size: large;
        }

        .btn {
            display: block;
            color: rgb(255, 255, 255);
            border: none;
            padding: 8px 16px;
            cursor: pointer;
            text-decoration: none;
            width: 100px;
        }

        .btn-det {
            background-color: rgb(102, 19, 185);
        }

        .btn-conf {
            background-color: rgb(36, 185, 19);
        }

        .btn-del {
            background-color: rgb(185, 19, 19);
        }
    </style>
@endsection

@section('content')
    <table class="tbl">
        <tr>
            <th>#</th>
            <th>
                دار النشر
            </th>
            <th>عدد الكتب</th>
        </tr>
        @while ($row = oci_fetch_array($p_out, OCI_ASSOC + OCI_RETURN_NULLS))
            <tr class="top-border">
                <td>{{ ++$i }}</td>
                <td>{{ $row['NAME'] }}</td>
                <td>
                    {{ $row['COUNT'] }}
                </td>
            </tr>
        @endwhile




    </table>
@endsection
