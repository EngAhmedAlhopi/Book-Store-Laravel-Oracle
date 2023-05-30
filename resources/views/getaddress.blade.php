@extends('layouts.masterapex')


@section('title')
    العناوين
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
                    <h4 class="card-title mb-1">العناوين</h4>
                </div>
                <div class="card-content">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <form class="row2 row" method="POST" action="{{ route('storeAddress') }}">
                                @csrf
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">الدولة</label>
                                    <select class="form-select form-control" id="validationTooltip04" required
                                        name="country">
                                        @while ($row_country = oci_fetch_array($p_out_country, OCI_ASSOC + OCI_RETURN_NULLS))
                                            <option selected value="{{ $row_country['ID'] }}">
                                                {{ $row_country['NAME'] }}
                                            </option>
                                        @endwhile
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">المدينة</label>
                                    <input type="text" class="form-control" id="validationCustom01" value=""
                                        name="city" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">الشارع</label>
                                    <input type="text" class="form-control" id="validationCustom01" value=""
                                        name="street" required>
                                </div>
                                <div class="col-12">
                                    <input type="submit" class="btn btn-primary btn2" value="اضافة">
                                </div>
                                <div class="col-md-4">
                                    <br>
                                </div>
                            </form>
                            <table class="table text-center m-0 table3">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>العنوان</th>
                                        <th>الدولة</th>
                                        <th>المدينة</th>
                                        <th>الشارع</th>
                                        <th>تعديل</th>
                                        <th>حذف</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @while ($row = oci_fetch_array($p_out, OCI_ASSOC + OCI_RETURN_NULLS))
                                        @php
                                            $p_out_country = oci_new_cursor($connection);
                                            $query_country = 'BEGIN constants_pkg.get_country(:coursor); END;';
                                            $stmt_country = oci_parse($connection, $query_country);
                                            oci_bind_by_name($stmt_country, ':coursor', $p_out_country, -1, OCI_B_CURSOR);
                                            oci_execute($stmt_country);
                                            oci_execute($p_out_country);
                                        @endphp
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>
                                                {{ $row['FULL_ADDRESS'] }}
                                            </td>
                                            <td>
                                                <form class="row2 row" method="POST"
                                                    action="{{ route('editAddress', $row['ID']) }}">
                                                    @csrf
                                                    <select class="form-select form-control inname" id="validationTooltip04"
                                                        required name="country">
                                                        @while ($row_country = oci_fetch_array($p_out_country, OCI_ASSOC + OCI_RETURN_NULLS))
                                                            @if ($row_country['ID'] == $row['CID'])
                                                                <option selected value="{{ $row_country['ID'] }}">
                                                                    {{ $row_country['NAME'] }}
                                                                </option>
                                                            @else
                                                                <option value="{{ $row_country['ID'] }}">
                                                                    {{ $row_country['NAME'] }}
                                                                </option>
                                                            @endif
                                                        @endwhile
                                                    </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control inname" id="validationCustom01"
                                                    value="{{ $row['CITY'] }}" name="city" required>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control inname" id="validationCustom01"
                                                    value="{{ $row['NAME'] }}" name="street" required>
                                            </td>
                                            <td>
                                                <input type="submit" class="btn btn-primary " value="تعديل">
                                                </form>
                                            </td>
                                            <td>
                                                <a href="{{ route('deleteAddress', $row['ID']) }}"><i
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
