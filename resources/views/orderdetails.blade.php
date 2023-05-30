@extends('layouts.master')
@section('title')
    تفاصيل الطلب
@endsection

@section('title_page')
    <table>
        <tr>
            <td>تفاصيل الطلب</td>
            @if ($status == 2)
                <td><a href="{{ route('confOrder', $id) }}" class="btn btn-conf ">تأكيد الطلب</a></td>
                <td><a href="{{ route('deleteOrder', $id) }}" class="btn btn-del ">حذف الطلب</a></td>
            @endif

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
    <table>

        @while ($row = oci_fetch_array($p_out_data, OCI_ASSOC + OCI_RETURN_NULLS))
            <tr>
                <td>
                    رقم الطلب : {{ $row['ID'] }}
                </td>
                <td>
                    ترايخ الطلب : {{ $row['ORDER_DATE'] }}
                </td>
                <td>
                    العنوان : {{ $row['ADDRESS'] }}
                </td>
            </tr>
            <tr>
                <td>
                    السعر الاجمالي : {{ $row['COST'] }}
                </td>
                <td>
                    حالة الطلب : {{ $row['STATUS'] }}
                </td>
                <td>
                    تاريخ تحديث الطلب : {{ $row['LASTDATE'] }}
                </td>
            </tr>
            <tr>
                <td>
                    طريقة الشحن : {{ $row['SHIPPING_METHOD'] }}
                </td>
                <td>
                    تكلفة الشحن : {{ $row['SHIPPINGCOST'] }}
                </td>
            </tr>
        @endwhile
    </table>
    <table class="tbl">
        <tr>
            <th>#</th>
            <th>
                الكتاب
            </th>
            <th>السعر</th>
            @if ($status == 2)
                <th>حذف الكتاب</th>
            @endif
        </tr>
        @while ($row = oci_fetch_array($p_out, OCI_ASSOC + OCI_RETURN_NULLS))
            <tr class="top-border">
                <td>{{ ++$i }}</td>
                <td>{{ $row['TITLE'] }}</td>
                <td>
                    {{ $row['PRICE'] }}
                </td>
                @if ($status == 2)
                    <td><a href="{{ route('deleteBook', $row['ID']) }}" class="btn btn-del ">حذف</a></td>
                @endif
            </tr>
        @endwhile




    </table>
@endsection
