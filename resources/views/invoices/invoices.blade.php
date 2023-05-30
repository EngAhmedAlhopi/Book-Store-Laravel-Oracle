@extends('layouts.master')
@section('title')
    لوحة التحكم -فواتير
@endsection

@section('title_page')
    لوحة التحكم - فواتير
@endsection

@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/core/menu/menu-types/horizontal-menu.css')}}">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors-rtl.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">

<link rel="stylesheet" type="text/css" href="app-assets/css-rtl/bootstrap.css">
<link rel="stylesheet" type="text/css" href="app-assets/css-rtl/bootstrap-extended.css">
<link rel="stylesheet" type="text/css" href="app-assets/css-rtl/colors.css">
<link rel="stylesheet" type="text/css" href="app-assets/css-rtl/components.css">
<link rel="stylesheet" type="text/css" href="app-assets/css-rtl/themes/dark-layout.css">
<link rel="stylesheet" type="text/css" href="app-assets/css-rtl/themes/bordered-layout.css">
<link rel="stylesheet" type="text/css" href="app-assets/css-rtl/themes/semi-dark-layout.css">

<link rel="stylesheet" type="text/css" href="app-assets/css-rtl/custom-rtl.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style-rtl.css">
@endsection

@section('content')



    <!-- BEGIN: Content-->
 
            <!-- Basic table -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <table class="datatables-basic table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                         <th>رقم الفاتورة</th>
                                        <th>تاريخ الفاتورة</th>
                                        <th>تاريخ الاستحقاق</th>
                                        <th>المنتج</th>
                                        <th>القسم</th>
                                        <th>الخصم</th>
                                        <th>نسبة الضريبة</th>
                                        <th>قيمة الضريبة  </th>
                                        <th> الاجمالي  </th>
                                        <th> الحالة  </th>
                                        <th> ملاحظات  </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>3213</td>
                                        <td>20/04/2000</td>
                                        <td>ahmedemad@gmail.com</td>
                                        <td>البنك الاسلامي</td>
                                        <td>20%</td>
                                        <td>10%</td>
                                        <td>5%</td>
                                        <td>2500</td>
                                        <td>22</td>
                                        <td>مدفوع</td>
                                        <td>لا يوجد</td>
                                    </tr>
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Modal to add new record -->
                <div class="modal modal-slide-in fade" id="modals-slide-in">
                    <div class="modal-dialog sidebar-sm">
                        <form class="add-new-record modal-content pt-0">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                            <div class="modal-header mb-1">
                                <h5 class="modal-title" id="exampleModalLabel">New Record</h5>
                            </div>
                            <div class="modal-body flex-grow-1">
                                <div class="form-group">
                                    <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
                                    <input type="text" class="form-control dt-full-name" id="basic-icon-default-fullname" placeholder="John Doe" aria-label="John Doe" />
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="basic-icon-default-post">Post</label>
                                    <input type="text" id="basic-icon-default-post" class="form-control dt-post" placeholder="Web Developer" aria-label="Web Developer" />
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="basic-icon-default-email">Email</label>
                                    <input type="text" id="basic-icon-default-email" class="form-control dt-email" placeholder="john.doe@example.com" aria-label="john.doe@example.com" />
                                    <small class="form-text text-muted"> You can use letters, numbers & periods </small>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="basic-icon-default-date">Joining Date</label>
                                    <input type="text" class="form-control dt-date" id="basic-icon-default-date" placeholder="MM/DD/YYYY" aria-label="MM/DD/YYYY" />
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label" for="basic-icon-default-salary">Salary</label>
                                    <input type="text" id="basic-icon-default-salary" class="form-control dt-salary" placeholder="$12000" aria-label="$12000" />
                                </div>
                                <button type="button" class="btn btn-primary data-submit mr-1">Submit</button>
                                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <!--/ Basic table -->
     <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>


@endsection
@section('script')

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/ui/jquery.sticky.js')}}"></script>
     <script src="{{ asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap4.min.js')}}"></script>



     <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js')}}"></script>
     <script src="{{ asset('app-assets/vendors/js/tables/datatable/jszip.min.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>


    <script src="{{ asset('app-assets/js/scripts/tables/table-datatables-basic.js')}}"></script>

    <!-- END: Page Vendor JS-->
   
 
       <script>
           $(window).on('load', function() {
               if (feather) {
                   feather.replace({
                       width: 14,
                       height: 14
                   });
               }
           })
       </script>
@endsection