@extends('layouts.master')
@section('title')
    الكتب
@endsection

@section('title_page')
    <table style="margin: 10px 0;">
        <tr>
            <td>الكتب</td>
            @if (!Session::get('addBook'))
                <td><a href="{{ route('createOrder') }}" class="btn btn-conf ">انشاء طلب</a></td>
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
    <div class="row row-cols-1 row-cols-md-4" style="font-size: medium; ">

        @while ($row = oci_fetch_array($p_out, OCI_ASSOC + OCI_RETURN_NULLS))
            <div class="row g-0" style="box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); margin: 15px 35px;">
                <div class="col-md-4">
                    <img src="{{ $row['PATH'] }}" class="img-fluid rounded-start" style="height: 250px ;width: 100%"
                        alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h3 class="card-title" style="color:rgb(102, 19, 185)">{{ $row['TITLE'] }}</h3>
                        <p class="card-text">المؤلف : {{ $row['AUTHERS'] }}</p>
                        <p class="card-text">دار النشر : {{ $row['PUBLISHER'] }}</p>
                        <p class="card-text"> السعر : {{ $row['PRICE'] }} شيكل</p>
                        <p class="card-text"> اللغة : {{ $row['LANGUAGE'] }} شيكل</p>
                        <br>
                        @if (Session::get('addBook'))
                            <td><a href="{{ route('insertBook', $row['ID']) }}" class="btn btn-det ">اضف
                                    لطلب
                                </a></td>
                        @endif
                    </div>
                </div>
            </div>
        @endwhile
    </div>
@endsection
