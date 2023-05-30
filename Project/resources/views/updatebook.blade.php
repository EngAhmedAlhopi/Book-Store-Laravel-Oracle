@extends('layouts.masterapex')


@section('title')
    تعديل الكتاب
@endsection

@section('style')
    <style>
        .row2 {
            margin: 10px;
        }
    </style>
@endsection

@section('content')
    <div class="row match-height">
        <div class="col-xl-12 col-lg-12 col-12">
            <div class="card shopping-cart">
                <div class="card-header pb-2">
                    <h4 class="card-title mb-1">تعديل كتاب</h4>
                </div>
                <div class="card-content">
                    <div class="card-body p-0">
                        <div class="table-responsive">




                            @while ($data = oci_fetch_array($p_out, OCI_ASSOC + OCI_RETURN_NULLS))
                                <form class="row2 row" method="POST" action="{{ route('storeUpdateBook') }}">
                                    @csrf
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">عنوان الكتاب</label>
                                        <input type="text" class="form-control" id="validationCustom01"
                                            value="{{ $data['TITLE'] }}" name="title" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom02" class="form-label">لغة الكتاب</label>
                                        <select class="form-select form-control" id="validationTooltip04" required
                                            name="lang">
                                            @while ($row = oci_fetch_array($p_out_lang, OCI_ASSOC + OCI_RETURN_NULLS))
                                                @if ($row['ID'] == $data['LANG_ID'])
                                                    <option selected value="{{ $row['ID'] }}">{{ $row['NAME'] }}
                                                    </option>
                                                @else
                                                    <option value="{{ $row['ID'] }}">{{ $row['NAME'] }}
                                                    </option>
                                                @endif
                                            @endwhile
                                        </select>
                                    </div>
                                    <input type="number" value="{{ $data['AUTH_ID'] }}" name="auth_id2" hidden>
                                    <input type="number" value="{{ $data['ID'] }}" name="id" hidden>
                                    <div class="col-md-4">
                                        <label for="validationCustom02" class="form-label">مؤلف الكتاب</label>
                                        <select class="form-select form-control" id="validationTooltip04" required
                                            name="auth_id">
                                            @while ($row = oci_fetch_array($p_out_auth, OCI_ASSOC + OCI_RETURN_NULLS))
                                                @if ($row['ID'] == $data['AUTH_ID'])
                                                    <option selected value="{{ $row['ID'] }}">{{ $row['NAME'] }}
                                                    </option>
                                                @else
                                                    <option value="{{ $row['ID'] }}">{{ $row['NAME'] }}
                                                    </option>
                                                @endif
                                            @endwhile
                                        </select>
                                    </div>
                                    <div class="col-12 h-10"><br><br>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom02" class="form-label">دار النشر</label>
                                        <select class="form-select form-control" id="validationTooltip04" required
                                            name="publ_id">
                                            @while ($row = oci_fetch_array($p_out_publ, OCI_ASSOC + OCI_RETURN_NULLS))
                                                @if ($row['ID'] == $data['PUBL_ID'])
                                                    <option selected value="{{ $row['ID'] }}">{{ $row['NAME'] }}
                                                    </option>
                                                @else
                                                    <option value="{{ $row['ID'] }}">{{ $row['NAME'] }}
                                                    </option>
                                                @endif
                                            @endwhile
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="validationCustom02" class="form-label">تاريخ النشر</label>
                                        <input type="date" class="form-control" id="validationCustom01"
                                            value="{{ $data['DATE2'] }}" name="date" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="validationCustom05" class="form-label">عدد صفحات الكتاب</label>
                                        <input type="number" class="form-control" id="validationCustom05" required
                                            value="{{ $data['NUM_PAGES'] }}" name="num">
                                        <div class="invalid-feedback">
                                            Please provide a valid zip.
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="validationCustom05" class="form-label">السعر بالشيكل</label>
                                        <input type="number" class="form-control" id="validationCustom05" required
                                            value="{{ $data['PRICE'] }}" name="price" step="any">
                                        <div class="invalid-feedback">
                                            Please provide a valid zip.
                                        </div>
                                    </div>

                                    <div class="col-12 h-10"><br><br>
                                    </div>
                                    <div class="col-12">
                                        <input type="submit" class="btn btn-primary" value="تعديل">
                                    </div>
                                </form>
                            @endwhile




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
