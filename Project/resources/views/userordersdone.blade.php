@extends('layouts.master')
@section('title')
    الرئيسية
@endsection

@section('title_page')
    الطلبيات
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
            background-color: rgb(102, 19, 185);
            color: rgb(255, 255, 255);
            border: none;
            padding: 8px 16px;
            cursor: pointer;
            text-decoration: none;
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
            <th>طريقة الشحن</th>
            <th>العنوان</th>
            <th>السعر الاجمالي</th>
            <th>حالة الطلب</th>
            <th>تاريخ تحديث الطلب</th>
            <th>تفاصيل الطلب</th>
        </tr>
        @while ($row = oci_fetch_array($p_out, OCI_ASSOC + OCI_RETURN_NULLS))
            <tr class="top-border">
                <td>{{ ++$i }}</td>
                <td>{{ $row['ID'] }}</td>
                <td>
                    {{ $row['ORDER_DATE2'] }}
                </td>
                <td>{{ $row['SHIPPING_METHOD'] }}</td>
                <td>
                    {{ $row['ADDRESS'] }}
                </td>
                <td>
                    {{ $row['COST'] }}
                </td>
                <td>
                    {{ $row['STATUS'] }}
                </td>
                <td>
                    {{ $row['LASTDATE'] }}
                </td>
                <td><a href="{{ route('orderDetails', $row['ID']) }}" class="btn ">التفاصيل</a></td>
            </tr>
        @endwhile




    </table>
@endsection
