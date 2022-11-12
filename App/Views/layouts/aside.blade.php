<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
  <div class="profile-sidebar">
    <div class="profile-userpic">
      <img src="{{BASE_URL}}public/img/z3623928566759_6e27ad5665ff6eb801cc4d69ffb1a2a1.jpg" class="img-responsive" alt="">
    </div>
    <div class="profile-usertitle">
      <div class="profile-usertitle-name">Đinh Quang Trung</div>
      <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="divider"></div>
  <form role="search">
    <div class="form-group">
      <input type="text" class="form-control" placeholder="Search">
    </div>
  </form>
  <ul class="nav menu">
    <li><a href="{{BASE_URL}}"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
    {{-- 
    
    <li ><a href="elements.html"><em class="fa fa-toggle-off">&nbsp;</em> UI Elements</a></li>
    <li><a href="panels.html"><em class="fa fa-clone">&nbsp;</em> Alerts &amp; Panels</a></li> --}}
    <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
      <em class="fa fa-navicon">&nbsp;</em> Products <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
      </a>
      <ul class="children collapse" id="sub-item-1">
        <li><a class="" href="{{BASE_URL}}products">
          <span class="fa fa-arrow-right">&nbsp;</span>Danh sách sản phẩm
        </a></li>
        <li><a class="" href="{{BASE_URL}}/products/create">
          <span class="fa fa-arrow-right">&nbsp;</span> Thêm sản phẩm
        </a></li>
        
      </ul>
    </li>
    <li><a href="{{BASE_URL}}users"><em class="fa fa-calendar">&nbsp;</em> Users</a></li>
    <li><a href="{{BASE_URL}}bills/bill"><em class="fa fa-calendar">&nbsp;</em> Danh sách đơn hàng</a></li>
    <li><a href="{{BASE_URL}}categories"><em class="fa fa-calendar">&nbsp;</em> Danh mục</a></li>
    <li><a href="{{BASE_URL}}thongke"><em class="fa fa-bar-chart">&nbsp;</em> Thống kê</a></li>
    <li><a href="login.html"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
  </ul>
</div><!--/.sidebar-->