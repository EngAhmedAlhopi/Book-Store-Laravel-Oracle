@extends('layouts.master')
@section('title')
    تأكيد الطلب
@endsection

@section('title_page')
    تأكيد الطلب
@endsection

@section('style')
    <style>
        .alert2 {
            width: 350px;
            margin-top: 5px;
        }

        .table-data {
            width: 40%;
            margin-right: 30px;
        }

        .table-form {
            width: 80%;
            margin-right: 30px;
        }

        .tbl {
            width: 50%;
            margin: 30px auto;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);

        }

        table {
            width: 100%;
            text-align: center;
            margin-bottom: 30px;

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

        .btn,
        input {
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

        .btn-conf,
        input {
            background-color: rgb(36, 185, 19);
        }

        .btn-del {
            background-color: rgb(185, 19, 19);
        }

        input {
            width: 170px;
            font-size: medium;
            height: 35px;
        }

        select {
            width: 250px;
        }
    </style>
@endsection

@section('content')
    <table class="table-data">
        @while ($row = oci_fetch_array($p_out_data, OCI_ASSOC + OCI_RETURN_NULLS))
            <tr>
                <td>
                    رقم الطلب : {{ $row['ID'] }}
                </td>
                <td>
                    ترايخ الطلب : {{ $row['ORDER_DATE'] }}
                </td>
            </tr>
        @endwhile
    </table>


    <form action="{{ route('saveOrder', $id) }}" method="POST">
        @csrf
        <table class="table-form">
            <tr>
                <td>
                    طريقة الشحن <select name="method" id="">
                        @while ($row = oci_fetch_array($p_out_method, OCI_ASSOC + OCI_RETURN_NULLS))
                            <option value="{{ $row['ID'] }}">{{ $row['NAME'] . ':' . $row['COST'] . 'شيكل' }}</option>
                        @endwhile
                    </select>
                </td>
                <td>
                    العنوان <select name="address" id="">
                        @while ($row = oci_fetch_array($p_out_address, OCI_ASSOC + OCI_RETURN_NULLS))
                            <option value="{{ $row['ID'] }}">{{ $row['FULL_ADDRESS'] }}</option>
                        @endwhile
                    </select>
                </td>
                <td>
                    <input type="submit" value="تأكيد" name="conf">
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <a href="{{ route('addBookToOrder', $id) }}" class="btn btn-del ">اضافة كتب للطلب</a>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    @if (session('code'))
                        @if (session('code') == 3)
                            <div class="alert alert-danger alert2" role="alert">
                                يجب ان يحتوي الطلب على الاقل كتاب واحد
                            </div>
                        @endif
                    @endif
                </td>
            </tr>
        </table>
    </form>



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
