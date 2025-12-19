@extends('layout.layout')

@php
$title = 'Dashboard';
$subTitle = '';
@endphp


@section('content')
                    <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">data</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2" name="property">
                                                <option selected="selected">All Courts</option>
                                                <option value="">Option 1</option>
                                                <option value="">Option 2</option>
                                            </select>
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
                                    @role('user|author')
                                    <div class="table-data__tool-right">
                                    
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#yourModal" >
                                            <i class="zmdi zmdi-plus" ></i>add item</button>
                                       
                                    </div>
                                    @endrole
                                </div>
                                <div class="table table-bordered ">
                                    <table class="table table-bordered table-responsive table--no-card m-b-40">
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
                                        @foreach ($cases as $case)
                                            <tr class="tr-shadow">
                                                
                                            <tr class="spacer"></tr>
                                            <tr class="tr-shadow">
                                            <td>
       
       <a class="btn btn-primary" href="{{ route('cases.edit',$case->id) }}">Edit</a>
        {!! Form::open(['method' => 'DELETE','route' => ['cases.destroy', $case->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </td>
                                                <td>{{ $case->rack_number }}</td>
                                                <td>
                                                    <span class="block-email">{{ $case->decision_year }}</span>
                                                </td>
                                                <td>
                                                    <span class="block-email">{{ $case->court_name }}</span>
                                                </td>
                                                <td>
                                                    <span class="block-email">{{ $case->decision }}</span>
                                                </td>
                                                <td>
                                                    <span class="block-email">{{ $case->decision_date }}</span>
                                                </td>
                                                <td>
                                                    <span class="block-email">{{ $case->defendant }}</span>
                                                </td>
                                                <td>
                                                    <span class="block-email">{{ $case->plaintiff }}</span>
                                                </td>
                                                <td>
                                                    <span class="block-email">{{ $case->police_station }}</span>
                                                </td>
                                                <td>
                                                    <span class="block-email">{{ $case->offence }}</span>
                                                </td>
                                                <td>
                                                    <span class="block-email">{{ $case->case_number }}</span>
                                                </td>
                                                <td>
                                                    <span class="block-email">{{ $case->case_type }}</span>
                                                </td>
                                                <td>
                                                    <span class="block-email">{{ $case->reference }}</span>
                                                </td>
                                                <td>
                                                    <span class="block-email">{{ $case->file_number }}</span>
                                                </td>
                                                <td>{{ ++$i }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                                <br>
                                {!! $cases->links() !!}

<p class="text-center text-primary"><small> </small></p>
                            </div>
                        </div>
                                            </div>
                            </div>
                            </div>
                         
                            <div class="modal fade" id="yourModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
      <div class="card">
                                  
                                    <div class="card-body card-block">
                                        <form action="{{ route('cases.store') }}" method="POST">
                                        @csrf
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
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                    </form>
                                </div>
      </div>
     
    </div>
  </div>
</div>

    
@endsection