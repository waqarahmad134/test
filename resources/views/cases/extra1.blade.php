
<!DOCTYPE html>
<html>
<head>
    <title>Laravel 6 Ajax CRUD tutorial using Datatable - ItSolutionStuff.com</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Fontfaces CSS-->
    <!-- <link href="css/font-face.css" rel="stylesheet" media="all"> -->
    {!! Html::style('css/font-face.css') !!}
    <!-- <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all"> -->

    {!! Html::style('vendor/font-awesome-4.7/css/font-awesome.min.css') !!}
    {!! Html::style('vendor/font-awesome-5/css/fontawesome-all.min.css') !!}
    {!! Html::style('vendor/mdi-font/css/material-design-iconic-font.min.css') !!}

    <!-- Bootstrap CSS-->
    <!-- <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all"> -->

    {!! Html::style('vendor/bootstrap-4.1/bootstrap.min.css') !!}

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
  
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
   
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
  
    <!-- Main CSS-->
    <!-- <link href="css/theme.css" rel="stylesheet" media="all"> -->
    {!! Html::style('css/theme.css') !!}
    
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
<div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="home">
                          
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                          
                        </li>
                        <li>
                            <a href="{{ route('cases.index') }}">
                                <i class="fas fa-chart-bar"></i>Cases</a>
                        </li>
                       
                       
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                   
                    {!! Html::image('images/icon/logo.png') !!}
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="home">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                           
                        </li>
                        
                        <li>
                            <a href="{{ route('cases.index') }}">
                                <i class="fas fa-chart-bar"></i>Cases</a>
                        </li>
                        @role('Admin')
                        <li><a class="nav-link" href="{{ route('users.index') }}">Manage Users</a></li>
                        <li><a class="nav-link" href="{{ route('roles.index') }}">Manage Role</a></li>
                       @endrole
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="find" method="POST">
                            @csrf
                                <input class="au-input au-input--xl" type="text" name="file_number" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                               
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <!-- <img src="images/icon/avatar-01.jpg" alt="John Doe" /> -->
                                            {!! Html::image('images/icon/avatar-01.jpg') !!}
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">john doe</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <!-- <img src="images/icon/avatar-01.jpg" alt="John Doe" /> -->
                                                        {!! Html::image('images/icon/avatar-01.jpg') !!}
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">john doe</a>
                                                    </h5>
                                                    <span class="email">johndoe@example.com</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
   
<div class="container">
    <h1>Laravel 6 Ajax CRUD tutorial using Datatable - ItSolutionStuff.com</h1>
    <a class="btn btn-success" href="javascript:void(0)" id="createNewProduct"> Create New Case</a>
    <table class="table table-bordered table-responsive  m-b-40 data-table">
        <thead>
            <tr>
                   <th>Action</th>
                                                <th>ریک نمبر</th>
                                                <th>فیصلہ سال</th>
                                                <th>نام عدالت </th>
                                                <th>قطعات</th>
                                                <th>تاریخ فیصلہ</th>
                                                <th>عنوان مقدمہ</th>
                                                <th>عنوان مقدمہ</th>
                                                <th>تھانہ </th>
                                                <th>بجرم</th>
                                                <th>مقدمہ نمبر</th>
                                                <th>قسم مقدمہ</th>
                                                <th>مرجوعہ</th>
                                                <th>مثل 
نمبر</th>                                           
                                                <th>نمبر
 شمار</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
   
<div class="modal fade" id="ajaxModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
      <div class="card">
                                  
                                    <div class="card-body card-block">
                                    <form id="productForm" name="productForm" class="form-horizontal">
                                            <div class="row form-group">
                                            <div class="col-6">
                                                <label for="nf-file_number" class=" form-control-label">مثل نمبر</label>
                                                <input type="text" id="file_number" name="file_number" placeholder="مثل نمبر" class="form-control">
                                            </div>
                                            
                                            <div class="col-6">
                                                <label for="nf-reference" class=" form-control-label">مرجوعہ</label>
                                                <input type="text" id="reference" name="reference" placeholder="مرجوعہ" class="form-control">
                                            </div>
                                            </div>
                                           
                                            <div class="row form-group">
                                            <div class="col-6">
                                               
                                                <div class="col-12 col-md-9">
                                                <label for="nf-case_type" class=" form-control-label">قسم مقدمہ</label>
                                                    <select name="case_type" id="case_type" class="form-control">
                                                        <option value="0" Disabled>Select</option>
                                                        <option value="1">Option #1</option>
                                                        <option value="2">Option #2</option>
                                                        <option value="3">Option #3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-6">
                                                <label for="nf-case_number" class=" form-control-label">مقدمہ نمبر</label>
                                                <input type="text" id="case_number" name="case_number" placeholder="مقدمہ نمبر" class="form-control">
                                            </div>
                                            </div>
                                            <div class="row form-group">
                                            <div class="col-6">
                                                <label for="nf-offence" class=" form-control-label">بجرم</label>
                                                <input type="text" id="offence" name="offence" placeholder="بجرم" class="form-control">
                                            </div>
                                            
                                            <div class="col-6">
                                                <label for="nf-police_station" class=" form-control-label">تھانہ</label>
                                                <input type="text" id="police_station" name="police_station" placeholder="تھانہ" class="form-control">
                                            </div>
                                            </div>
                                            <div class="row form-group">
                                            <div class="col-6">
                                                <label for="nf-email" class=" form-control-label">عنوان مقدمہ</label>
                                                <input type="text" id="defendant" name="defendant" placeholder="" class="form-control">
                                            </div>
                                            
                                            <div class="col-6">
                                                <label for="nf-email" class=" form-control-label"></label>
                                                <input type="text" id="plaintiff" name="plaintiff" placeholder="" class="form-control">
                                            </div>
                                            </div>
                                            <div class="row form-group">
                                            <div class="col-6">
                                                <label for="nf-decision_date" class=" form-control-label">تاریخ فیصلہ</label>
                                                <input type="date" id="decision_date" name="decision_date" placeholder="تاریخ فیصلہ" class="form-control">
                                            </div>
                                            
                                            <div class="col-6">
                                                <label for="nf-decision" class=" form-control-label">قطعات</label>
                                                <input type="text" id="decision" name="decision" placeholder="قطعات" class="form-control">
                                            </div>
                                            </div>
                                            <div class="row form-group">
                                            <div class="col-12 md-9">
                                                <label for="nf-court_name" class=" form-control-label">نام عدالت</label>
                                                <input type="text" id="court_name" name="court_name" placeholder="نام عدالت" class="form-control">
                                            </div>
                                          
                                            </div>
                                            <div class="row form-group">
                                            <div class="col-6">
                                                <label for="nf-decision_year" class=" form-control-label">فیصلہ سال</label>
                                                <input type="text" id="decision_year" name="decision_year" placeholder="فیصلہ سال" class="form-control">
                                            </div>
                                            
                                            <div class="col-6">
                                                <label for="nf-rack_number" class=" form-control-label">ریک نمبر</label>
                                                <input type="text" id="rack_number" name="rack_number" placeholder="ریک نمبر" class="form-control">
                                            </div>
                                            </div>
                                            </div>

                                          
                                        
                                    </div>
                                    <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save
                     </button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                    </form>
                                </div>
      </div>
     
    </div>
  </div>
</div>

 
</div>
<div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
    
    <!-- Jquery JS-->
  
    

    <!-- Main JS-->
    <script src="js/main.js"></script>
   


    
</body>
    
<script type="text/javascript">
  $(function () {
     
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('cases.index') }}",
        columns: [
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'rack_number', name: 'rack_number'},
            {data: 'decision_year', name: 'decision_year'},
            {data: 'court_name', name: 'court_name'},
            {data: 'decision', name: 'decision'},
            {data: 'decision_date', name: 'decision_date'},
            {data: 'defendant', name: 'defendant'},
            {data: 'plaintiff', name: 'plaintiff'},
            {data: 'police_station', name: 'police_station'},
            {data: 'offence', name: 'offence'},
            {data: 'case_number', name: 'case_number'},
            {data: 'case_type', name: 'case_type'},
            {data: 'reference', name: 'reference'},
            {data: 'file_number', name: 'file_number'},
            
          
        ]
    });
     
    $('#createNewProduct').click(function () {
        $('#saveBtn').val("create-product");
        $('#product_id').val('');
        $('#productForm').trigger("reset");
        $('#modelHeading').html("Create New Product");
        $('#ajaxModel').modal('show');
    });
    
    $('body').on('click', '.editProduct', function () {
      var product_id = $(this).data('id');
      $.get("{{ route('cases.index') }}" +'/' + product_id +'/edit', function (data) {
          console.log(data);
          $('#modelHeading').html("Edit Product");
          $('#saveBtn').val("edit-user");
          $('#ajaxModel').modal('show');
          $('#file_number').val(data.file_number);
          $('#reference').val(data.reference);
          $('#case_type').val(data.case_type);
          $('#case_number').val(data.case_number);
          $('#offence').val(data.offence);
          $('#police_station').val(data.police_station);
          $('#defendant').val(data.defendant);
          $('#plaintiff').val(data.plaintiff);
          $('#decision_date').val(data.decision_date);
          $('#decision').val(data.decision);
          $('#court_name').val(data.court_name);
          $('#decision_year').val(data.decision_year);
          $('#rack_number').val(data.rack_number);
      })
   });
    
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Save');
    
        $.ajax({
          data: $('#productForm').serialize(),
          url: "{{ route('cases.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
     
              $('#productForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();
         
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
      });
    });
    
    $('body').on('click', '.deleteProduct', function () {
     
        var product_id = $(this).data("id");
        confirm("Are You sure want to delete !");
      
        $.ajax({
            type: "DELETE",
            url: "{{ route('cases.store') }}"+'/'+product_id,
            success: function (data) {
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
     
  });
</script>
</html>