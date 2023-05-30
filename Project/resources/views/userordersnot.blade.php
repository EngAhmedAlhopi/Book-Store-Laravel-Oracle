@extends('layouts.master')
@section('title')
    الطلبات الغير مكتملة
@endsection

@section('title_page')
    الطلبات الغير مكتملة
@endsection
@section('style')
    <style>
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
    <table>
        <tr>
            <th>#</th>
            <th>
                رقم الطلب
            </th>
            <th>تاريخ الطلب</th>

            <th>تفاصيل الطلب</th>
            <th>تاكيد الطلب</th>
            <th>حذف الطلب</th>
        </tr>
        @while ($row = oci_fetch_array($p_out, OCI_ASSOC + OCI_RETURN_NULLS))
            <tr class="top-border">
                <td>{{ ++$i }}</td>
                <td>{{ $row['ID'] }}</td>
                <td>
                    {{ $row['ORDER_DATE'] }}
                </td>

                <td><a href="{{ route('orderDetails', $row['ID']) }}" class="btn btn-det ">التفاصيل</a></td>
                <td><a href="{{ route('confOrder', $row['ID']) }}" class="btn btn-conf ">التاكيد</a></td>
                <td><a href="{{ route('deleteOrder', $row['ID']) }}" class="btn btn-del ">حذف</a></td>
            </tr>
        @endwhile




    </table>
@endsection
