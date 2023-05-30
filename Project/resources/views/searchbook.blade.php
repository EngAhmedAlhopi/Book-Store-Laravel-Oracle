@extends('layouts.master')
@section('title')
    البحث عن كناب
@endsection

@section('title_page')
    <table style="margin: 10px 0;">
        <tr>
            <td>البحث عن كتاب</td>
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
            display: block;
            color: rgb(255, 255, 255);
            border: none;
            padding: 8px 16px;
            cursor: pointer;
            text-decoration: none;
            width: 100px;
        }

        .btn-conf {
            background-color: rgb(36, 185, 19);
        }

        .btn-del {
            background-color: rgb(185, 19, 19);
        }

        select {
            width: 200px;
        }
    </style>
@endsection

@section('content')
    <form action="{{ route('searchBook') }}" method="POST" id="form">
        @csrf
        <table class="table-form">
            <tr>
                <td>
                    عنوان الكتاب <input type="text" name="title" id="title">
                </td>
                <td>
                    لغة الكتاب <select name="lang_id" id="lang">
                        @while ($row = oci_fetch_array($p_out_lang, OCI_ASSOC + OCI_RETURN_NULLS))
                            @if ($row['NAME'] == '0')
                                <option value="{{ $row['ID'] }}"></option>
                            @else
                                <option value="{{ $row['ID'] }}">{{ $row['NAME'] }}</option>
                            @endif
                        @endwhile
                    </select>
                </td>
                <td>
                    المؤلف <select name="auth_id" id="auth">
                        @while ($row = oci_fetch_array($p_out_auth, OCI_ASSOC + OCI_RETURN_NULLS))
                            @if ($row['NAME'] == '0')
                                <option value="{{ $row['ID'] }}"></option>
                            @else
                                <option value="{{ $row['ID'] }}">{{ $row['NAME'] }}</option>
                            @endif
                        @endwhile
                    </select>
                </td>
                <td>
                    دار النشر <select name="publ_id" id="publ">
                        @while ($row = oci_fetch_array($p_out_publ, OCI_ASSOC + OCI_RETURN_NULLS))
                            @if ($row['NAME'] == '0')
                                <option value="{{ $row['ID'] }}"></option>
                            @else
                                <option value="{{ $row['ID'] }}">{{ $row['NAME'] }}</option>
                            @endif
                        @endwhile
                    </select>
                </td>
                <td>
                    <input id="" type="submit" value="بحث" name="search" class="btn-det">
                </td>
            </tr>
        </table>
    </form>
@endsection
