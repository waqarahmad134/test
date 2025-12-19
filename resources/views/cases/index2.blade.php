
@extends('layout.layout')

@php
$title = 'Dashboard';
$subTitle = '';
@endphp


@section('content')
<style>
    @media only screen and (min-width: 760px) {
  table {
    display:table !important;
  }
}

.dtable-container {
    max-width: 100% !important;


    table {
        white-space: nowrap !important;
        width:100%!important;
        border-collapse:collapse!important;
    }
}
    </style>

<div class="section__content section__content--p30">
                    <div class="container-fluid">
                    <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Criminal Institutions</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                            <!-- <select class="js-select2" name="property">
                                                <option selected="selected">All Courts</option>
                                                <option value="">Option 1</option>
                                                <option value="">Option 2</option>
                                            </select> -->
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <!-- <div class="rs-select2--light rs-select2--sm">
                                            <select class="js-select2" name="time">
                                                <option selected="selected">All Users</option>
                                                <option value="">User1</option>
                                                <option value="">User2</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <button class="au-btn-filter">
                                            <i class="zmdi zmdi-filter-list"></i>filters</button> -->
                                    </div>
                              
                                    <div class="table-data__tool-right">
                                    
                                        <!-- <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                            <select class="js-select2" name="type">
                                                <option selected="selected">Export</option>
                                                <option value="">Option 1</option>
                                                <option value="">Option 2</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div> -->
                                    </div>
                                    
                                </div>
                                <div class="table table-bordered dtable-container table-responsive table-striped" style="white-space: nowrap !important;
        width:100%!important;
        border-collapse:collapse!important;" >
                                    <table class="data-table" style="white-space: nowrap !important;
        width:100%!important;
        border-collapse:collapse!important;" >
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                            <th>Action</th> 
                                            <th>CNIC</th>
   <th>Party1</th>
   <th>Party2</th>
   <th> Party1 Father</th>
   <th> Party2 Father </th>
   <th> Party1 Contact No </th>
   <th> Party2 Contact No </th>
   <th>Institution Date</th>
   <th>Institutioin No</th>
   <th>Category</th>
   <th>Subcategory</th>
   <th>Case Type</th>
   <th>FIR No</th>
   <th>FIR Year</th>
   <th>Offence</th>
   <th>Police Station</th>
   <th>Jurisdiction</th>
   <th>Appeal Against</th>
   <th>Order Date</th>
   <th>Order By</th>
   <th>Assigned To</th>
  
                                            </tr>
                                        </thead>
                                        <tbody>
                                  
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                                <br>
                                

<p class="text-center text-primary"><small> </small></p>
                            </div>
                        </div>
                                            </div>
                            </div>
                            </div>
                         
                            <div class="modal fade" id="ajaxModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
      <div class="card">
          
      <div style="text-align:center">
    <p style="font-size:20px"> Basic Info </p>
</div>
                                    <div class="card-body card-block">
                                    <form id="productForm" name="productForm" class="form-horizontal">
                                    <input type="hidden" name="product_id" id="product_id">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
            <strong>Person CNIC:</strong>
            <input type="text" data-inputmask="'mask': '99999-9999999-9'"  placeholder="XXXXX-XXXXXXX-X" id="cnic" name="cnic" placeholder="" class="form-control">
            <p style="color:red" id="check"> CNIC already exists </p>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Case Title:</strong>
            <input type="text" id="c_title" name="c_title" placeholder="" class="form-control">
        </div>
    </div>
    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>Institution Date:</strong>
            <input type="date" id="i_date" name="i_date" placeholder="" class="form-control">
        </div>
    </div>
   
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>Institution No:</strong>
            <input type="text" id="i_no" name="i_no" placeholder="" class="form-control">
        </div>
    </div>
</div>
    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>Category:</strong>
            <select class="form-control form-select sid" type="text" id="cat" name="cat" onchange="change();" >
                    <option value=""  >Select:</option>
                    @foreach($cats as $s)
                                                   
                    <option value="{{$s->id}}">{{$s->name}}</option>
@endforeach
                                                  </select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>Subcategory:</strong>
            <select class="form-control form-select sid" type="text" id="subcat" name="subcat" disabled>
                    <option value=""  >Select:</option>
                    @foreach($subcats as $s)
                                                   
                    <option value="{{$s->id}}" id="c{{$s->cat_id}}">{{$s->name}}</option>
@endforeach
                                                  </select>
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
            <strong>Assigned To:</strong>
            
            <select class="form-control form-select judge_id" type="text" id="judge_id" name="judge_id">
                    <option value=""  >Select:</option>
                    @foreach($judges as $s)
                                                   
                    <option value="{{$s->id}}">{{$s->name}}</option>
@endforeach
                                                  </select>
        </div>
    </div>
    <div style="text-align:center">
    <p style="font-size:20px"> Criminal Detail </p>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>Case Type:</strong>
            <select class="form-control form-select sid" type="text" id="c_type" name="c_type" >
            <option value=""  >Select</option>
                    <option value="NA"  >NA</option>
                    <option value="FIR"  >FIR</option>
                    <option value="Private Complaint"  >Private Complaint</option>
                   
                                                  </select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>FIR No:</strong>
            <input type="text" id="fir_no" name="fir_no" placeholder="" class="form-control">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>FIR Year:</strong>
            <input type="text" id="fir_year" name="fir_year" placeholder="" class="form-control">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>Offence:</strong>
            <input type="text" id="offence" name="offence" placeholder="" class="form-control">
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
            <strong>Police Station:</strong>
            
            <select class="form-control form-select ps_id" type="text" id="ps_id" name="ps_id">
                    <option value=""  >Select:</option>
                    @foreach($pss as $s)
                                                   
                    <option value="{{$s->id}}">{{$s->name}}</option>
@endforeach
                                                  </select>
        </div>
    </div>

    <div style="text-align:center">
    <p style="font-size:20px"> Civil Detail </p>
</div>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>Appellant Jurisdiction:</strong>
            <select class="form-control form-select sid" type="text" id="jur" name="jur" >
                <option value=""> Select </option>
                    <option value="Appellant Jurisdiction (Appeal/Revision)"  >Appellant Jurisdiction (Appeal/Revision)</option>
                   
                                                  </select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>Appeal Against:</strong>
            <input type="text" id="app_against" name="app_against" placeholder="" class="form-control">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>Order Dated:</strong>
            <input type="date" id="o_date" name="o_date" placeholder="" class="form-control">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <strong>Order By:</strong>
            <input type="text" id="court_name" name="court_name" placeholder="" class="form-control">
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


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>

    <script>

$(document).ready(function () {
$('#check').hide();
$('#cnic').on('keyup', function () {
    $('#check').hide();
    var code = $('#cnic').val();
    console.log(code);
    if (code !== '') { 
    $.get("cnic" +'/' + code , function (data) {
         if(data=="found")
         {
         $('#check').show();
         }
      })
}
})

});


       function change(){
        var cat =  document.getElementById("cat").value;
        if(cat=='')
        {
            document.getElementById("subcat").value='';
        document.getElementById("subcat").disabled = true;
        }
        else
        {
            document.getElementById("subcat").disabled = false;
            $('#subcat').children('option').hide();
            $('#subcat #c'+cat).show();
        }
        }
    $(":input").inputmask();

   </script>
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
        responsive: true,
        ajax: "{{ route('cases.criminal') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'index'},
           {data: 'action', name: 'action', orderable: false, searchable: false},
           {data: 'cnic', name: 'cnic'},
           {data: 'p1', name: 'p1'},
           {data: 'p2', name: 'p2'},
           {data: 'so1', name: 'so1'},
           {data: 'so2', name: 'so2'},
           {data: 'm1', name: 'm1'},
           {data: 'm2', name: 'm2'},
           {data: 'i_date', name: 'i_date'},
           {data: 'i_no', name: 'i_no'},
           {data: 'cat', name: 'cat'},
           {data: 'subcat', name: 'subcat'},
           {data: 'c_type', name: 'c_type'},
           {data: 'fir_no', name: 'fir_no'},
           {data: 'fir_year', name: 'fir_year'},
           {data: 'offence', name: 'offence'},
           {data: 'ps', name: 'ps'},
           {data: 'jur', name: 'jur'},
           {data: 'app_against', name: 'app_against'},
           {data: 'o_date', name: 'o_date'},
           {data: 'court_name', name: 'court_name'},
           {data: 'judge_name', name: 'judge_name'},
          
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
      document.getElementById("subcat").disabled = false;
         
      $.get("{{ route('cases.index') }}" +'/' + product_id +'/edit', function (data) {
          $('#modelHeading').html("Edit Product");
          $('#saveBtn').val("edit-user");
          $('#ajaxModel').modal('show');

          $('#product_id').val(data.id);
          console.log(data.id);
          $('#cnic').val(data.cnic);
          $('#c_title').val(data.c_title);
          $('#i_date').val(data.i_date);
          $('#i_no').val(data.i_no);
          $('#cat').val(data.cat);
          $('#subcat').val(data.subcat);
          $('#c_type').val(data.c_type);
          $('#fir_no').val(data.fir_no);
          $('#fir_year').val(data.fir_year);
          $('#offence').val(data.offence);
          $('#jur').val(data.jur);
          $('#app_against').val(data.app_against);
          $('#o_date').val(data.o_date);
          $('#court_name').val(data.court_name);
          $('#judge_id').val(data.judge_id);
          $('#ps_id').val(data.ps_id);
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
              var err = jQuery.parseJSON(data.responseText);
              console.log(err.message);
              alert(err.message);
              $('#saveBtn').html('Save Changes');
          }
      });
    });
    
    $('body').on('click', '.deleteProduct', function () {
     
     var product_id = $(this).data("id");
     if (!confirm('Are You sure want to delete ! ')) 
        {
            return false;
        }
        else
        {
   
     $.ajax({
         type: "DELETE",
         url: "{{ route('cases.store') }}"+'/'+product_id,
         success: function (data) {
             table.draw();
         },
         error: function (data) {
            var err = jQuery.parseJSON(data.responseText);
              console.log(err.message);
              alert(err.errors);
             console.log('Error:', data.responseText);
         }
     });
        }
 });
     
  });
</script>

<!-- end document-->
    
@endsection