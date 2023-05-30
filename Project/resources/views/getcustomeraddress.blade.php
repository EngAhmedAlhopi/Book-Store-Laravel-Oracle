@extends('layouts.masterapex')

@section('title')
    عنواين الزبون
@endsection

@section('style')
    <style>
        .table2 {
            width: 60% !important;

            margin: 10px 50px !important;

            font-size: large !important;
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
                    <h4 class="card-title mb-1">عنواين الزبون</h4>
                </div>
                <div class="card-content">
                    <div class="card-body p-0">
                        @while ($row = oci_fetch_array($p_out_data, OCI_ASSOC + OCI_RETURN_NULLS))
                            <table class="table table-white-space table-borderless table2">
                                <thead>
                                    <th>رقم الزبون : {{ $row['ID'] }}</th>
                                    <th> الايميل : {{ $row['EMAIL'] }}</th>
                                    <th>الاسم : {{ $row['NAME'] }}</th>
                                </thead>
                            </table>
                        @endwhile

                        <div class="table-responsive table3">
                            <table class="table text-center m-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>العنوان</th>
                                        <th>حالة العنوان</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @while ($row = oci_fetch_array($p_out, OCI_ASSOC + OCI_RETURN_NULLS))
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $row['ADDRESS'] }}</td>
                                            <td>
                                                {{ $row['STATUS'] }}
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
