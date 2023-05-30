@extends('layouts.masterapex')

@section('title')
    الطلبات
@endsection



@section('content')
    <div class="row match-height">
        <div class="col-xl-12 col-lg-12 col-12">
            <div class="card shopping-cart">
                <div class="card-header pb-2">
                    <h4 class="card-title mb-1">تفاصيل الطلب <br><br><a href="{{ route('custmorOrders') }}">جميع
                            الطلبات</a></h4>

                </div>
                <div class="card-content">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table text-center m-0">
                                <thead>
                                    <tr>

                                        <th>رقم الطلب</th>
                                        <th>رقم الزبون</th>
                                        <th>الاسم</th>
                                        <th>الايميل</th>
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
                                    @while ($row = oci_fetch_array($p_out_data, OCI_ASSOC + OCI_RETURN_NULLS))
                                        <tr>
                                            <td>{{ $row['OID'] }}</td>
                                            <td>
                                                {{ $row['CID'] }}
                                            </td>
                                            <td>
                                                {{ $row['FNAME'] . ' ' . $row['LNAME'] }}
                                            </td>
                                            <td>
                                                {{ $row['EMAIL'] }}
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
                                                <form action="{{ route('updateOrderStatus', $row['OID']) }}" method="POST">
                                                    @csrf
                                                    <select class="form-select form-control" id="validationTooltip04"
                                                        required name="status_id" style="width: 170px">
                                                        @while ($row1 = oci_fetch_array($p_out_status, OCI_ASSOC + OCI_RETURN_NULLS))
                                                            @if ($row1['ID'] == $row['STATUSNUM'])
                                                                <option selected value="{{ $row1['ID'] }}">
                                                                    {{ $row1['NAME'] }}
                                                                </option>
                                                            @else
                                                                <option value="{{ $row1['ID'] }}">{{ $row1['NAME'] }}
                                                                </option>
                                                            @endif
                                                        @endwhile
                                                    </select>
                                                    <input type="number" hidden value="{{ $row['OID'] }}"
                                                        name="orderID">

                                            </td>
                                            <td>
                                                {{ $row['LASTDATE'] }}
                                            </td>
                                            <td>
                                                {{--  <a href="{{ route('updateOrderStatus', $row['OID']) }}"><i
                                                        class="ft-edit-1"></i></a>  --}}
                                                <input type="submit" class="btn btn-primary" value="تعديل">

                                            </td>

                                            </form>
                                        </tr>
                                    @endwhile


                                </tbody>
                            </table>

                            <br><br>
                            <table class="table text-center m-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>العنوان</th>
                                        <th>السعر</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @while ($row = oci_fetch_array($p_out, OCI_ASSOC + OCI_RETURN_NULLS))
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $row['TITLE'] }}</td>
                                            <td>
                                                {{ $row['PRICE'] }}
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
