@extends('layouts.masterapex')

@section('title')
    الزبائن
@endsection



@section('content')
    <div class="row match-height">
        <div class="col-xl-12 col-lg-12 col-12">
            <div class="card shopping-cart">
                <div class="card-header pb-2">
                    <h4 class="card-title mb-1">الزبائن</h4>
                </div>
                <div class="card-content">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table text-center m-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>رقم الزبون</th>
                                        <th>الايميل</th>
                                        <th>الاسم</th>
                                        <th>اسم العائلة</th>
                                        <th>موظف\زبون</th>
                                        <th>الصورة</th>
                                        <th>العناوين</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @while ($row = oci_fetch_array($p_out, OCI_ASSOC + OCI_RETURN_NULLS))
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $row['ID'] }}</td>
                                            <td>
                                                {{ $row['EMAIL'] }}
                                            </td>
                                            <td>{{ $row['FNAME'] }}</td>
                                            <td>
                                                {{ $row['LNAME'] }}
                                            </td>
                                            <td>
                                                {{ $row['IS_ADMIN'] }}
                                            </td>
                                            <td><img class="height-50" src="{{ asset('app-assets2/img/elements/01.png') }}"
                                                    alt="Generic placeholder image" />
                                            </td>
                                            <td>
                                                <a href="{{ route('showAddress', $row['ID']) }}"
                                                    class="btn btn-primary">العناوين</a>
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
