@extends('layouts.masterapex')


@section('title')
    الرئيسية
@endsection


@section('style')
    <style>
        .row2 {
            margin: 10px;
        }

        .btn2 {
            margin-top: 24px !important;
        }

        .inname {
            width: 250px !important;
            margin-right: 100px !important;
        }

        .table3 {
            width: 60% !important;

            margin: 10px auto !important;

        }
    </style>
@endsection

@section('content')
    <div class="row match-height">
        <div class="col-xl-12 col-lg-12 col-12">
            <div class="card shopping-cart">
                <div class="card-header pb-2">
                    <h4 class="card-title mb-1">المؤلفون وعدد الكتب</h4>
                </div>
                <div class="card-content">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <div class="col-4">
                                <br>
                            </div>
                            <table class="table text-center m-0 table3">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>المؤلف</th>
                                        <th>عدد الكتب</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @while ($row = oci_fetch_array($p_out, OCI_ASSOC + OCI_RETURN_NULLS))
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>
                                                {{ $row['NAME'] }}
                                            </td>
                                            <td>
                                                {{ $row['COUNT'] }}
                                            </td>
                                        </tr>
                                    @endwhile
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
