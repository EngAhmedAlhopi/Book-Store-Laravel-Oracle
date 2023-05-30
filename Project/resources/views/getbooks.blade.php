@extends('layouts.masterapex')

@section('title')
    الكتب
@endsection



@section('content')
    <div class="row match-height">
        <div class="col-xl-12 col-lg-12 col-12">
            <div class="card shopping-cart">
                <div class="card-header pb-2">
                    <h4 class="card-title mb-1">جميع الكتب</h4>
                </div>
                <div class="card-content">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table text-center m-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>كود الكتاب</th>
                                        <th>العنوان</th>
                                        <th>عدد الصفحات</th>
                                        <th>المؤلفون</th>
                                        <th>دار النشر</th>
                                        <th>تاريخ النشر</th>
                                        <th> لغة الكتاب</th>
                                        <th>السعر</th>
                                        <th>الصورة</th>
                                        <th>الاجرائات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($p_out as $row)
                                        {{--  @while ($row = oci_fetch_array($p_out, OCI_ASSOC + OCI_RETURN_NULLS))  --}}
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $row['ID'] }}</td>
                                            <td>
                                                {{ $row['TITLE'] }}
                                            </td>
                                            <td>{{ $row['NUM_PAGES'] }}</td>
                                            <td>
                                                {{ $row['AUTHERS'] }}
                                            </td>
                                            <td>
                                                {{ $row['PUBLISHER'] }}
                                            </td>
                                            <td>
                                                {{ $row['PUBLICATION_DATE'] }}
                                            </td>
                                            <td>
                                                {{ $row['LANGUAGE'] }}
                                            </td>
                                            <td>
                                                {{ $row['PRICE'] }}شيكل
                                            </td>
                                            {{--  <td><img class="height-50" src="public/pictures/1672773433-download.jpg"  --}}
                                            <td><img class="height-50" src="{{ $row['PATH'] }}"
                                                    alt="Generic placeholder image" /></td>
                                            <td>
                                                <a href="{{ route('deleteBook', $row['ID']) }}"><i {{--  <a href="{{ route('books/destroy', $row['ID']) }}"><i  --}}
                                                        class="ft-trash-2"></i></a>
                                                <a href="{{ route('updateBook', $row['ID']) }}"><i
                                                        class="ft-edit-1"></i></a>
                                            </td>
                                        </tr>
                                        {{--  @endwhile  --}}
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
