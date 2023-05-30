@extends('layouts.master')
@section('title')
    لوحة التحكم -فواتير
@endsection

@section('title_page')
    الاقسام  - فواتير
@endsection

@section('head')

 

 @endsection

@section('content')


@if (session()->has('Add'))
  

    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">{{ session()->get('Add') }}</h4>
        <div class="alert-body">
            تم تنفيذ العملية بنجاح
        </div>
    </div>
@endif
@if (session()->has('edit'))
  
<div class="alert alert-primary" role="alert">
    <h4 class="alert-heading">{{ session()->get('edit') }}</h4>
    <div class="alert-body">
        تم تنفيذ العملية بنجاح
    </div>
</div>
   
@endif


@if (session()->has('delete'))
  
<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">{{ session()->get('delete') }}</h4>
    <div class="alert-body">
        تم تنفيذ العملية بنجاح
    </div>
</div>
   
@endif


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
                                        <th  >اسم القسم</th>
                                          <th  >الوصف</th>
                                          <th  >المستخدم</th>
                                          <th  >العمليات</th>
                                     </tr>
                                </thead>
                                <tbody>
                                    <?php $i=0?>
                                    @foreach ($section as $sections)
                                    <?php $i++;?>

                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $sections->section_name }}</td>
                                        <td>{{ $sections->description }}</td>
                                        <td><div class="badge badge-glow badge-success">{{ $sections->created_by }}</div></td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="javascript:void(0);" data-id="{{ $sections->id }}" data-section_name="{{ $sections->section_name }}"
                                                        data-description="{{ $sections->description }}"   data-toggle="modal"
                                                        data-target="#modals-update">
                                                        <i data-feather="edit-2" class="mr-50"></i>
                                                        <span>تعديل</span>
                                                    </a>
                                                    <a class="dropdown-item"   data-toggle="modal" data-section_name="{{ $sections->section_name }}" data-id="{{ $sections->id }}" href="javascript:void(0);" data-target="#danger">
                                                        <i data-feather="trash" class="mr-50"></i>
                                                        <span>حذف</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    @endforeach

                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Modal to add new record -->
                <div class="modal modal-slide-in fade" id="modals-slide-in">
                    <div class="modal-dialog sidebar-sm">
                             <form action="{{ route('sections.store') }}" method="post" class="add-new-record modal-content pt-0">
                                {{ csrf_field() }}
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                            <div class="modal-header mb-1">
                                <h5 class="modal-title" id="exampleModalLabel">اضافة قسم </h5>
                            </div>
                            <div class="modal-body flex-grow-1">
                                <div class="form-group">
                                    <label class="form-label" for="basic-icon-default-fullname"> اسم القسم</label>
                                    <input type="text" class="form-control dt-full-name" id="section_name" name="section_name" placeholder="اسم القسم " aria-label="John Doe" />
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label" for="basic-icon-default-post">الوصف</label>
                                    <textarea data-length="20" class="form-control char-textarea active" id="description" name="description"  rows="3" placeholder="الوصف" style="color: rgb(78, 81, 84);"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary  mr-1">اضافة</button>
                                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">اغلاق</button>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="modal modal-slide-in fade" id="modals-update">
                    <div class="modal-dialog sidebar-sm">
                       
                                <form action="sections/update" method="post" autocomplete="off" class="add-new-record modal-content pt-0">
                                    {{ method_field('patch') }}
                                    {{ csrf_field() }}
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                            <div class="modal-header mb-1">
                                <h5 class="modal-title" id="exampleModalLabel">تعديل قسم </h5>
                            </div>
                            <div class="modal-body flex-grow-1">
                                <div class="form-group">
                                    <input type="hidden" name="id" id="id" value="">

                                    <label class="form-label" for="basic-icon-default-fullname"> اسم القسم</label>
                                    <input type="text" class="form-control dt-full-name" id="section_name" name="section_name" placeholder="اسم القسم" aria-label="John Doe" />
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label" for="basic-icon-default-post">الوصف</label>
                                    <textarea data-length="20" class="form-control char-textarea active" id="description" name="description"  rows="3" placeholder="الوصف" style="color: rgb(78, 81, 84);"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary  mr-1">تعديل</button>
                                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">اغلاق</button>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="modal fade modal-danger text-left" id="danger" tabindex="-1" aria-labelledby="myModalLabel120" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel120"> هل انت ماكد من حذف هذا القسم</h5>
                                <form action="sections/destroy" method="post">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id" id="id" value="">

                                <div class="form-group">

                                    <label class="form-label" for="basic-icon-default-fullname"> اسم القسم</label>
                                    <input type="text" class="form-control dt-full-name" id="section_name" name="section_name" placeholder="اسم القسم " aria-label="John Doe" />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger waves-effect waves-float waves-light"  >تاكيد</button>
                                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">اغلاق</button>

                            </div>
                            </form>
                        </div>
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
  
    
    <!-- END: Page Vendor JS-->

    <script>
        $('#modals-update').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var section_name = button.data('section_name')
            var description = button.data('description')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #section_name').val(section_name);
            modal.find('.modal-body #description').val(description);
        })
    
    </script>

<script>
    $('#danger').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var section_name = button.data('section_name')
         var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #section_name').val(section_name);
     })

</script>
   
 
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