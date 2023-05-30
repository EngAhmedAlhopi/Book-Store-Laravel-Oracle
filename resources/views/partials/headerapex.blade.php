<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-light navbar-shadow menu-border navbar-brand-center"
    role="navigation" data-menu="menu-wrapper">
    <!-- Horizontal menu content-->
    <div class="navbar-container main-menu-content center-layout" data-menu="menu-container">
        <!-- include ../../../includes/mixins-->
        <ul class="navigation-main nav navbar-nav" id="main-menu-navigation">
            <li class=" nav-item">
                <a class=" nav-link d-flex align-items-center" href="{{ route('indexAdmin') }}"><i
                        class="ft-home"></i><span data-i18n="Dashboard">الشاشة الرئيسية</span></a>

            </li>
            <li class="dropdown nav-item" data-menu="dropdown"><a
                    class="dropdown-toggle nav-link d-flex align-items-center" href="javascript:;"
                    data-toggle="dropdown"><i class="ft-box"></i><span data-i18n="Apps">الكتب</span></a>
                <ul class="dropdown-menu">
                    <li data-menu=""><a class="dropdown-item d-flex align-items-center"
                            href="{{ route('indexBooks') }}" data-toggle="dropdown"><i
                                class="ft-arrow-right submenu-icon"></i><span data-i18n="Task Board">عرض كافة
                                الكتب</span></a>
                    </li>
                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{ route('addBook') }}"
                            data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span
                                data-i18n="Email">اضافة كتاب
                                جديد</span></a>
                    </li>
                </ul>
            </li>
            <li class="dropdown nav-item" data-menu="dropdown"><a
                    class="dropdown-toggle nav-link d-flex align-items-center" href="javascript:;"
                    data-toggle="dropdown"><i class="ft-aperture"></i><span data-i18n="UI Kit">الزبائن</span></a>
                <ul class="dropdown-menu">
                    <li data-menu=""><a class="dropdown-item d-flex align-items-center"
                            href="{{ route('indexCustomer') }}" data-toggle="dropdown"><i
                                class="ft-arrow-right submenu-icon"></i><span data-i18n="Grid">عرض
                                الزبائن</span></a>
                    </li>
                </ul>
            </li>
            <li class="dropdown nav-item" data-menu="dropdown"><a
                    class="dropdown-toggle nav-link d-flex align-items-center" href="javascript:;"
                    data-toggle="dropdown"><i class="ft-briefcase"></i><span data-i18n="Components">ادارة
                        الطلبات</span></a>
                <ul class="dropdown-menu">
                    <li data-menu=""><a class="dropdown-item d-flex align-items-center"
                            href="{{ route('custmorOrders') }}" data-toggle="dropdown"><i
                                class="ft-arrow-right submenu-icon"></i><span data-i18n="Task Board">عرض
                                الطلبات</span></a>
                    </li>
                    {{--  <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="app-email.html"
                            data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span
                                data-i18n="Email">ادارة الطلبات</span></a>
                    </li>  --}}
                    {{--  <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="javascript:;" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Cards">عرض الطلبات</span></a>
                        <ul class="dropdown-menu">
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="cards-basic.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Basic Cards">Basic Cards</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="cards-advanced.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Advanced Cards">Advanced Cards</span></a>
                            </li>
                        </ul>
                    </li>  --}}
                    {{--  <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="javascript:;" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Bootstrap">اضافة الطلبات</span></a>
                        <ul class="dropdown-menu">
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="components-buttons.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Buttons">Buttons</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="components-alerts.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Alerts">Alerts</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="components-badges.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Badges">Badges</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="components-dropdowns.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Dropdowns">Dropdowns</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="components-media-objects.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Media Objects">Media Objects</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="components-pagination.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Pagination">Pagination</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="components-progress.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Progress Bars">Progress Bars</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="components-modals.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Modals">Modals</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="components-collapse.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Collapse">Collapse</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="components-lists.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="List">List</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="components-carousel.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Carousel">Carousel</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="components-popover.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Popover">Popover</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="components-tabs.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Tabs">Tabs</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="components-tooltip.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Tooltip">Tooltip</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="components-spinner.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Spinner">Spinner</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="components-toast.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Toast">Toast</span></a>
                            </li>
                        </ul>
                    </li>  --}}
                    {{--  <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="javascript:;" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Extra">Extra</span></a>
                        <ul class="dropdown-menu">
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="ex-component-sweet-alerts.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Sweet Alerts">Sweet Alerts</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="ex-component-toastr.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Toastr">Toastr</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="ex-component-nouislider.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="NoUI Slider">NoUI Slider</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="ex-component-upload.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="File Uploader">File Uploader</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="ex-component-dragndrop.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Drag &amp; Drop">Drag &amp; Drop</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="ex-component-tour.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Tour">Tour</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="ex-component-media-player.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Media player">Media player</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="ex-component-treeview.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="TreeView">TreeView</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="ex-component-swiper.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Swiper">Swiper</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="ex-component-miscellaneous.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Miscellaneous">Miscellaneous</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="ex-component-avatar.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Avatar">Avatar</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="ex-component-image-cropper.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Image Cropper">Image Cropper</span></a>
                            </li>
                        </ul>
                    </li>  --}}
                </ul>
            </li>
            {{--  <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="javascript:;" data-toggle="dropdown"><i class="ft-edit"></i><span data-i18n="Forms">الموظفون</span></a>
                <ul class="dropdown-menu">
                    <li class="has-sub dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="javascript:;" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Elements">Elements</span></a>
                        <ul class="dropdown-menu">
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="form-inputs.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Inputs">Inputs</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="form-input-groups.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Input Groups">Input Groups</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="form-radio.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Radio">Radio</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="form-checkbox.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Checkbox">Checkbox</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="form-switch.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Switch">Switch</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="form-select.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Select">Select</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="form-editor.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Editor">Editor</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="form-input-tags.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Input Tag">Input Tag</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="form-datetimepicker.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Datepicker">Datepicker</span></a>
                            </li>
                        </ul>
                    </li>
                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="form-layout.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Layouts">Layouts</span></a>
                    </li>
                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="form-validation.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Validation">Validation</span></a>
                    </li>
                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="form-wizard.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Wizard">Wizard</span></a>
                    </li>
                </ul>
            </li>  --}}
            <li class="dropdown nav-item" data-menu="dropdown"><a
                    class="dropdown-toggle nav-link d-flex align-items-center" href="javascript:;"
                    data-toggle="dropdown"><i class="ft-grid"></i><span data-i18n="Tables">الثوابت</span></a>
                <ul class="dropdown-menu">
                    <li data-menu=""><a class="dropdown-item d-flex align-items-center"
                            href="{{ route('indexAuther') }}" data-toggle="dropdown"><i
                                class="ft-arrow-right submenu-icon"></i><span data-i18n="Task Board">المؤلفون</span></a>
                    </li>
                    <li data-menu=""><a class="dropdown-item d-flex align-items-center"
                            href="{{ route('indexPublisher') }}" data-toggle="dropdown"><i
                                class="ft-arrow-right submenu-icon"></i><span data-i18n="Email">دور النشر</span></a>
                    </li>
                    <li data-menu=""><a class="dropdown-item d-flex align-items-center"
                            href="{{ route('indexCountry') }}" data-toggle="dropdown"><i
                                class="ft-arrow-right submenu-icon"></i><span data-i18n="Chat">الدول</span></a>
                    </li>
                    <li data-menu=""><a class="dropdown-item d-flex align-items-center"
                            href="{{ route('indexAddress') }}" data-toggle="dropdown"><i
                                class="ft-arrow-right submenu-icon"></i><span data-i18n="Chat">العناوين</span></a>
                    </li>
                    <li data-menu=""><a class="dropdown-item d-flex align-items-center"
                            href="{{ route('indexOrderStatus') }}" data-toggle="dropdown"><i
                                class="ft-arrow-right submenu-icon"></i><span data-i18n="Chat">حالات الطلب</span></a>
                    </li>
                    <li data-menu=""><a class="dropdown-item d-flex align-items-center"
                            href="{{ route('indexBookLanguge') }}" data-toggle="dropdown"><i
                                class="ft-arrow-right submenu-icon"></i><span data-i18n="Chat">لغات الكتب</span></a>
                    </li>
                    <li data-menu=""><a class="dropdown-item d-flex align-items-center"
                            href="{{ route('indexAddressStatus') }}" data-toggle="dropdown"><i
                                class="ft-arrow-right submenu-icon"></i><span data-i18n="Chat">حالات
                                العناوين</span></a>
                    </li>
                    <li data-menu=""><a class="dropdown-item d-flex align-items-center"
                            href="{{ route('indexShippingMethod') }}" data-toggle="dropdown"><i
                                class="ft-arrow-right submenu-icon"></i><span data-i18n="Chat">طرق الشحن</span></a>
                    </li>
                    {{--  <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="javascript:;" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Bootstrap Tables">Bootstrap Tables</span></a>
                        <ul class="dropdown-menu">
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="table-basic.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Basic">Basic</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="table-extended.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Extended">Extended</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="javascript:;" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="DataTables">DataTables</span></a>
                        <ul class="dropdown-menu">
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="dt-basic-initialization.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Basic Initialization">Basic Initialization</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="dt-advanced-initialization.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Advanced Initialization">Advanced Initialization</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="dt-data-sources.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Data Sources">Data Sources</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="dt-api.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="API">API</span></a>
                            </li>
                        </ul>
                    </li>  --}}
                </ul>
            </li>
            {{--  <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="javascript:;" data-toggle="dropdown"><i class="ft-bar-chart-2"></i><span data-i18n="Charts &amp; Maps">Charts &amp; Maps</span></a>
                <ul class="dropdown-menu">
                    <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="javascript:;" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Charts">Charts</span></a>
                        <ul class="dropdown-menu">
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="charts-apex.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Apex Charts">Apex Charts</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="charts-chartjs.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="ChartJs">ChartJs</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="charts-chartist.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Chartist">Chartist</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="javascript:;" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Maps">Maps</span></a>
                        <ul class="dropdown-menu">
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="map-leaflet.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Leaflet Maps">Leaflet Maps</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="javascript:;" data-toggle="dropdown"><i class="ft-file-text"></i><span data-i18n="Pages">Pages</span></a>
                <ul class="dropdown-menu">
                    <li class="has-sub dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="javascript:;" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Authentication">Authentication</span></a>
                        <ul class="dropdown-menu">
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="auth-forgot-password.html" data-toggle="dropdown" target="_blank"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Forgot Password">Forgot Password</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="auth-login.html" data-toggle="dropdown" target="_blank"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Login">Login</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="auth-register.html" data-toggle="dropdown" target="_blank"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Register">Register</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="auth-lock-screen.html" data-toggle="dropdown" target="_blank"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Lock Screen">Lock Screen</span></a>
                            </li>
                        </ul>
                    </li>
                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="timeline-horizontal.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Horizontal Timeline">Horizontal Timeline</span></a>
                    </li>
                    <li class="has-sub dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="javascript:;" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Vertical Timeline">Vertical Timeline</span></a>
                        <ul class="dropdown-menu">
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="timeline-vertical-center.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Center">Center</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="timeline-vertical-left.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Left">Left</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="timeline-vertical-right.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Right">Right</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdown-item d-flex align-items-center dropdown-toggle" href="javascript:;" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Users">Users</span></a>
                        <ul class="dropdown-menu">
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="page-users-list.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="List">List</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="page-users-view.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="View">View</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="page-users-edit.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Edit">Edit</span></a>
                            </li>
                        </ul>
                    </li>
                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="page-account-settings.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Account Settings">Account Settings</span></a>
                    </li>
                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="page-user-profile.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="User Profile">User Profile</span></a>
                    </li>
                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="page-invoice.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Invoice">Invoice</span></a>
                    </li>
                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="page-error.html" data-toggle="dropdown" target="_blank"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Error">Error</span></a>
                    </li>
                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="page-coming-soon.html" data-toggle="dropdown" target="_blank"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Coming Soon">Coming Soon</span></a>
                    </li>
                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="page-maintenance.html" data-toggle="dropdown" target="_blank"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Maintenance">Maintenance</span></a>
                    </li>
                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="page-gallery.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Gallery">Gallery</span></a>
                    </li>
                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="page-search.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Search">Search</span></a>
                    </li>
                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="page-faq.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="FAQ">FAQ</span></a>
                    </li>
                    <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="page-knowledge-base.html" data-toggle="dropdown"><i class="ft-arrow-right submenu-icon"></i><span data-i18n="Knowledge Base">Knowledge Base</span></a>
                    </li>
                </ul>
            </li>  --}}
        </ul>
    </div>
</div>
