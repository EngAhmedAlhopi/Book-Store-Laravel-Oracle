<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-category">Main</li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('dashboard') }}">
        <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
        <span class="menu-title">الرئيسية</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
        <span class="menu-title">الفواتير</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
 
          <li class="nav-item"> <a class="nav-link" href="{{ route('invoices.index') }}">قائمة الفواتير</a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">الفواتير المدفوعة</a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">الفواتير الغير مدفوعة</a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">الفواتير المدفوعة جزئيا </a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic">
        <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
        <span class="menu-title">التقارير</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic2">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">تقارير الفواتير</a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">تقارير العملاء</a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic3" aria-expanded="false" aria-controls="ui-basic">
        <span class="icon-bg"><i class="mdi mdi-lock menu-icon"></i></span>
        <span class="menu-title">المستخدمين</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic3">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">قائمة المستخدمين</a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">صلاحيات المستخدمين</a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic4" aria-expanded="false" aria-controls="ui-basic">
        <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
        <span class="menu-title">الاعدادات</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic4">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ route('section.index') }}">اضافة قسم</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ route('Product.index') }}">اضافة منتج</a></li>
        </ul>
      </div>
    </li>



    <li class="nav-item sidebar-user-actions">
      <div class="user-details">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <div class="d-flex align-items-center">
              <div class="sidebar-profile-img">
                <img src="assets/images/faces/face28.png" alt="image">
              </div>
              <div class="sidebar-profile-text">
                <p class="mb-1">{{ Auth::user()->name }}</p>
              </div>
            </div>
          </div>
          <div class="badge badge-danger">3</div>
        </div>
      </div>
    </li>
    <li class="nav-item sidebar-user-actions">
      <div class="sidebar-user-menu">
        <a href="#" class="nav-link"><i class="mdi mdi-settings menu-icon"></i>
          <span class="menu-title">Settings</span>
        </a>
      </div>
    </li>
    <li class="nav-item sidebar-user-actions">
      <div class="sidebar-user-menu">
        <a href="#" class="nav-link"><i class="mdi mdi-speedometer menu-icon"></i>
          <span class="menu-title">Take Tour</span></a>
      </div>
    </li>
    <li class="nav-item sidebar-user-actions">
      <div class="sidebar-user-menu">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <a href="#" class="nav-link" onclick="event.preventDefault();      this.closest('form').submit();"><i class="mdi mdi-logout menu-icon"></i>
            <span class="menu-title">Log Out</span></a>

          
      </form>
      
        
      </div>
    </li>
  </ul>
</nav>