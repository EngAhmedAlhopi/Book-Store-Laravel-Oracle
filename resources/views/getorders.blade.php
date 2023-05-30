@extends('layouts.masterapex')

@section('title')
    الطلبات
@endsection



@section('content')
    <div class="row match-height">
        <div class="col-xl-12 col-lg-12 col-12">
            <div class="card shopping-cart">
                <div class="card-header pb-2">
                    <h4 class="card-title mb-1">الطلبات</h4>
                </div>
                <div class="card-content">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table text-center m-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>رقم الطلب</th>
                                        <th>رقم الزبون</th>
                                        <th>تاريخ الطلب</th>
                                        <th>طريقة الشحن</th>
                                        <th>العنوان</th>
                                        <th>التكلفة الاجمالية</th>
                                        <th>حالة الطلب</th>
                                        <th>تاريخ تحديث الطلب</th>
                                        <th>الاجرائات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @while ($row = oci_fetch_array($p_out, OCI_ASSOC + OCI_RETURN_NULLS))
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $row['OID'] }}</td>
                                            <td>
                                                {{ $row['CID'] }}
                                            </td>
                                            <td>{{ $row['ORDER_DATE2'] }}</td>
                                            <td>
                                                {{ $row['SHIPPING_METHOD'] }}
                                            </td>
                                            <td>
                                                {{ $row['ADDRESS'] }}
                                            </td>
                                            <td>
                                                {{ $row['COST'] }} شيكل
                                            </td>
                                            <td>
                                                {{ $row['STATUS'] }}
                                            </td>
                                            <td>
                                                {{ $row['LASTDATE'] }}
                                            </td>
                                            <td>
                                                <a href="{{ route('orderDet', $row['OID']) }}"><i class="ft-edit-1"></i></a>
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
