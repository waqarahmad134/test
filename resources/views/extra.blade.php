

                                      @extends('layout.layout')

@php
$title = 'Dashboard';
$subTitle = '';
@endphp

@section('content')
<div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">overview</h2>
                                    <div class="table-data__tool-right">
                                    <form id="productForm" name="productForm" class="form-horizontal">
                                    <input type="date" id="rdate" name="rdate" placeholder="Select" class="form-control">
</form>
                                </div>
                                </div>
                            </div>
                        </div>
                     
                        <div class="row m-t-25">
                        <div class="col-sm-6 col-lg-3" >
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                             
                                            </div>
                                            <div class="text">
                                                <h2>Total</h2>
                                            
                                                <span >{{$total}}</span>
                                                
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div> 
                        @foreach($u as $user)
                        @foreach($user->getRoleNames() as $v)
                        @if($v!="Admin")
                            <div class="col-sm-6 col-lg-3" >
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                            
                                            </div>
                                            <div class="text">
                                                <h2>{{$user->name}}</h2>
                                            
                                                <span>{{$user->counts($user->id)}}</span>
                                                
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div> 
                         @endif
                            @endforeach
                            @endforeach
                        </div>
                      
                        <div class="row">
                        
                            <div class="col-lg-12">
                                <h2 class="title-1 m-b-25">Today Report</h2>
                              
                               
                                <div class="table-responsive table--no-card m-b-40">
                                
                                    <table class="table table-borderless table-striped table-earning data-table">
                                        <thead>
                                            <tr>
                                            
                                                <th>name</th>
                                                <th class="text-right">total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                     
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                          </div>

                          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
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
        ajax: "{{ route('home') }}",
        columns: [
           {data: 'name', name: 'name'},
           {data: 'count', name: 'count'},
          
        ]
    });
     
    $('#rdate').change(function() {
    var date = $(this).val();
    $.ajax({
          data: $('#productForm').serialize(),
          url: "{{ route('search') }}",
          type: "GET",
          dataType: 'json',
          success: function (data) {
              console.log(data);
          $('.data-table').DataTable({
              
        destroy: true,
        processing: true,
        serverSide: true,
        ajax: "{{ route('search') }}",
        columns: [
           {data: 'name', name: 'name'},
           {data: 'count', name: 'count'},
          
        ]
    });
       },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
              var err = jQuery.parseJSON(data.responseText);
              console.log(err.message);
              alert(err.message);

          }
      }); 
});
     
  });
</script>

                                      @endsection

                                      
