@extends('layouts.masterapex')


@section('title')
    طرق الشحن
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
                    <h4 class="card-title mb-1">طرق الشحن</h4>
                </div>
                <div class="card-content">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <form class="row2 row" method="POST" action="{{ route('storeShippingMethod') }}">
                                @csrf
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">طريقة الشحن</label>
                                    <input type="text" class="form-control" id="validationCustom01" value=""
                                        name="name" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">تكلفة الشحن</label>
                                    <input type="number" class="form-control" id="validationCustom01" value=""
                                        name="cost" required>
                                </div>
                                <div class="col-4">
                                    <input type="submit" class="btn btn-primary btn2" value="اضافة">
                                </div>
                            </form>
                            <div class="col-4">
                                <br>
                            </div>
                            <table class="table text-center m-0 table3">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>الطريقة</th>
                                        <th>التكلفة</th>
                                        <th>تعديل</th>
                                        <th>حذف</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @while ($row = oci_fetch_array($p_out, OCI_ASSOC + OCI_RETURN_NULLS))
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            {{--  <td>{{ $row['NAME'] }}</td>  --}}

                                            <td>
                                                <form class="row2 row" method="POST"
                                                    action="{{ route('editShippingMethod', $row['ID']) }}">
                                                    @csrf
                                                    {{--  <div class="col-md-2">  --}}
                                                    <input type="text" class="form-control inname"
                                                        id="validationCustom01" value="{{ $row['NAME'] }}" name="name"
                                                        required>
                                                    {{--  </div>  --}}
                                            </td>
                                            <td>
                                                <input type="number" class="form-control inname" id="validationCustom01"
                                                    value="{{ $row['COST'] }}" name="cost" required>
                                            </td>
                                            <td>
                                                {{--  <div class="col-4">  --}}
                                                <input type="submit" class="btn btn-primary " value="تعديل">
                                                {{--  </div>  --}}
                                                </form>
                                            </td>
                                            <td>
                                                <a href="{{ route('deleteShippingMethod', $row['ID']) }}"><i
                                                        class="ft-trash-2"></i></a>
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
