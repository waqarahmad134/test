
@extends('welcome')


@section('content')

<div class="section__content section__content--p30">
<div class="main-content">
            <div class="dsjmessagediv">
            <img id="dsjImage" class="dsjimages" src="images/judge.png">
            <h3 class="dsjmessageheading">
                Message from District and Sessions Judge</h3>
            
    <p id="MainContent_lblDsjMsg" style="
    text-align: justify;
">Justice denotes placing things in their rightful place. Allah SWT Says in the Holy Quran, “.......... And that when you judge amongst people, judge with justice. Undoubtedly how well Allah admonishes you, verily Allah SWT hears, sees” (4:58). At another place Allah SWT says, “O believers! Stand firmly for justice, giving witness for Allah, may be therein your own loss, or of your parents or of your relations. Against whom you be a witness, he be a rich or be a poor, in any case Allah has more power than anyone over them, therefore follow not passion lest you may be far away from justice; and if you distort or turn your face, then Allah is aware of your doings”. (4:135). A society of injustice is a danger to the whole mankind as injustice anywhere is a threat to justice everywhere. District Judiciary Nankana Sahib, as a team is trying its best to provide justice to the people without any discrimination of gender, religion, race, caste, creed, rich or poor. Our goal is to establish a just society in our domain by providing justice without any delay, fear.</p>

        </div>

<div class="s007">
      <form class="searchForm">
        <div class="inner-form">
          <div class="basic-search" onclick="myFunction()">
            <div class="input-field">
              <div class="icon-wrap">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20">
                  <path d="M18.869 19.162l-5.943-6.484c1.339-1.401 2.075-3.233 2.075-5.178 0-2.003-0.78-3.887-2.197-5.303s-3.3-2.197-5.303-2.197-3.887 0.78-5.303 2.197-2.197 3.3-2.197 5.303 0.78 3.887 2.197 5.303 3.3 2.197 5.303 2.197c1.726 0 3.362-0.579 4.688-1.645l5.943 6.483c0.099 0.108 0.233 0.162 0.369 0.162 0.121 0 0.242-0.043 0.338-0.131 0.204-0.187 0.217-0.503 0.031-0.706zM1 7.5c0-3.584 2.916-6.5 6.5-6.5s6.5 2.916 6.5 6.5-2.916 6.5-6.5 6.5-6.5-2.916-6.5-6.5z"></path>
                </svg>
              </div>
              <input id="search" type="text" value="Case Search..." style="font-weight: 600" disabled/>
              <div class="result-count">
              <i class="fa fa-caret-down"></i></div>
            </div>
          </div>
          <div class="advance-search" id="advance-search" style="display:none">
            
            <div class="row">
              <div class="input-field">
              <input type="text" id="file_number" name="file_number" placeholder="مثل نمبر" class="form-control">
              </div>
              <div class="input-field">
              <input type="text" id="reference" name="reference" placeholder="مرجوعہ" class="form-control">
              </div>
              <div class="input-field">
              <select name="case_type" id="case_type" class="form-control form-select">
                                                      <option value=""  >: قسم مقدمہ</option>
                                                        @foreach($types as $t)
                    
                                                        <option value="{{$t->name}}">{{$t->name}}</option>
                                                      @endforeach
                                                      
                                                    </select>
              </div>
            </div>
            <div class="row">
              <div class="input-field">
              <input type="text" id="case_number" name="case_number" placeholder="مقدمہ نمبر" class="form-control">
              
              </div>
              <div class="input-field">
              <input type="text" id="offence" name="offence" placeholder="بجرم" class="form-control">
              </div>
              <div class="input-field">
              <input type="text" id="police_station" name="police_station" placeholder="تھانہ" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="input-field">
              <input type="text" id="plaintiff" name="plaintiff" placeholder="مدعی" class="form-control">
              </div>
              <div class="input-field">
              <input type="text" id="defendant" name="defendant" placeholder="مدعا علیہ" class="form-control">
              </div>
              <div class="input-field">
              <input type="date" id="decision_date" name="decision_date" placeholder="تاریخ فیصلہ" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="input-field">
              <input type="text" id="decision" name="decision" placeholder="قطعات" class="form-control">
              </div>
              <div class="input-field">
              
              <input type="text" name="court_name" id="court_name" class="form-control" placeholder="نام عدالت" />
           <div id="courtList"></div>
              </div>
              <div class="input-field">
              <select name="decision_year" name="decision_year" class="form-control form-select" id="dropdownYear" onchange="getProjectReportFunc()"></select>
              </div>
            </div>
            <div class="row">
              <div class="input-field">
              <input type="text" id="rack_number" name="rack_number" placeholder="ریک نمبر" class="form-control">
              </div>
              <div class="input-field">
              <button id="btn-search" class="btn-search">Search</button>
              <button id="btn-delete" class="btn-delete">Refresh</button>
              </div>
      
            </div>
           
          </div>
        </div>
      </form>
    </div>

                    <div class="container-fluid">
                    <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                             
                               
                                <div class="table-data__tool">
                               
                                <div class="panel-heading">
        <button class="btn-print" id="print" type="submit">Print</button>
    </div>
                                    
                                </div>
                 
                                <div class="table table-bordered ">
                                <table id="example" class="table table-bordered table--no-card m-b-40 data-table" style="width:100%; font-family: jameel noori nastaleeq;">
                                        <thead>
                                        <tr>
                                          
                                                <th>بیگ نمبر/ریک نمبر</th>
                                                <th>فیصلہ سال</th>
                                                <th>نام عدالت </th>
                                                <th>قطعات</th>
                                                <th>تاریخ فیصلہ</th>
                                                 <th>مدعا علیہ </th>
                                                 <th>مدعی</th>
                                                <th>تھانہ </th>
                                                <th>نوعیت مقدمہ</th>
                                                <th>مقدمہ نمبر</th>
                                                <th>قسم مقدمہ</th>
                                                <th>مرجوعہ</th>
                                                <th>مثل 
نمبر/گوشوارا</th>                                           
                                                <th>نمبر
 شمار</th>
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
                         
      

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    

    <script>
$(document).ready(function(){

 $('#court_name').keyup(function(){ 
        var query = $(this).val();
        if(query != '')
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('autocomplete.fetch') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $('#courtList').fadeIn();  
                    $('#courtList').html(data);
          }
         });
        }
        else{
          $('#courtList').fadeOut();  
        }
    });

    $(document).on('click', 'p', function(e){
      e.preventDefault();  
      console.log($(this).text());
        $('#court_name').val($(this).text());  
        $('#courtList').fadeOut();  
    });  

});
</script>
<script type="text/javascript">
$(function () {
    $('#print').click(function () {
        var pageTitle = 'Page Title',
           win = window.open('', 'Print', 'width=500,height=300');
        win.document.write('<html><head><title>' + pageTitle + '</title>' +
            '<style>table,th,td{ border: 1px solid grey; border-collapse: collapse; padding:5px !important; text-align:center}</style>' +
         
            '</head><body>' + $('#example')[0].outerHTML + '</body></html>');
        win.document.close();
        win.print();
        win.close();
        return false;
    });
});
function addBodyClass(){
	if($(window).width() <= 750){
		$('#example').addClass('table-responsive');
	} else {
		$('#example').removeClass('table-responsive');
	}
}

$(window).on('load resize', function(){addBodyClass()})

function myFunction() {
  
  $('#advance-search').toggle('1000');
    $("i").toggleClass("fa fa-caret-down fa fa-caret-up");
}

$('#dropdownYear').each(function() {

var year = (new Date()).getFullYear();
var current = year;
var till = current-2000;
$(this).append('<option value="" >فیصلہ سال</option>');
for (var i = 0; i < till; i++) {
 
    $(this).append('<option value="' + (year - i) + '">' + (year - i) + '</option>');
}
});


  $(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    
 
     
    $('#btn-delete').click(function (e) {
        e.preventDefault();
       console.log('abc');

        $("#file_number").val('');
    $('#reference').val('');
    $('#case_number').val('');
    $('#offence').val('');
   $('#police_station').val('');
    $('#plaintiff').val('');
    $('#defendant').val('');
     $('#decision_date').val('');
     $('#decision').val('');
    $('#rack_number').val('');
    $('.data-table').DataTable({
        destroy:true,
        processing: true,
        serverSide: true,
        "bFilter": false,
        ajax: "{{ route('main') }}",
        columns: [
        
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
            {data: 'DT_RowIndex', name: 'index'},
          
        ]
    });
       
    });
   
   $('#btn-search').click(function (e) {
        e.preventDefault();
        $(this).html('Search');
    var fnum = $("#file_number").val();
    var ref = $('#reference').val();
    var ctype = $('#case_type').val();
    var cnum = $('#case_number').val();
    var o = $('#offence').val();
    var ps = $('#police_station').val();
    var pf = $('#plaintiff').val();
    var def = $('#defendant').val();
    var dd = $('#decision_date').val();
    var dec = $('#decision').val();
    var cname = $('#court_name').val();
    var dy = $('#dropdownYear').val();
    var rnum = $('#rack_number').val();

        $.ajax({
            
          data: $('#searchForm').serialize(),
          url: "{{ url('searching') }}",
          type: "GET",
          dataType: 'json',
          success: function (data) {
            $('.data-table').DataTable({
                destroy: true,
        processing: true,
        serverSide: true,
        "bFilter": false,
        ajax: "{{ url('searching?file_number=') }}"+fnum+'&reference='+ref+'&case_type='+ctype+'&case_number='+cnum+
        '&offence='+o+'&police_station='+ps+'&plaintiff='+pf+'&defendant='+def+'&decision_date='+dd+'&decision='+dec+'&court_name='+cname+
        '&decision_year='+dy+'&rack_number='+rnum,

        columns: [
        
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
            {data: 'DT_RowIndex', name: 'index'},
          
        ]
        
    });
    
         
          },
          error: function (data) {
              console.log('Error:', data);
              $('#searchBtn').html('Save Changes');
              var err = jQuery.parseJSON(data.responseText);
              console.log(err.message);
              alert(err.message);

          }
          
      });
    }
    );

    
     
  });

 
</script>

    
@endsection