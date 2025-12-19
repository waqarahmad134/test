@extends('layout.layout')

@php
$title = 'Dashboard';
$subTitle = '';
@endphp


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('cases.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('cases.update',$case->id) }}" method="POST">
    	@csrf
        @method('PUT')
        
                                            <div class="row form-group">
                                            <div class="col-6">
                                                <label for="nf-file_number" class=" form-control-label">مثل نمبر</label>
                                                 <input type="text" name="file_number" value="{{ $case->file_number }}" class="form-control" placeholder="مثل نمبر">
                                            </div>
                                            
                                            <div class="col-6">
                                                <label for="nf-reference" class=" form-control-label">مرجوعہ</label>
                                                <input type="text" id="reference" name="reference" value="{{ $case->reference }}" placeholder="مرجوعہ" class="form-control">
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
                                                <input type="text" id="case_number" name="case_number" value="{{ $case->case_number }}" placeholder="مقدمہ نمبر" class="form-control">
                                            </div>
                                            </div>
                                            <div class="row form-group">
                                            <div class="col-6">
                                                <label for="nf-offence" class=" form-control-label">بجرم</label>
                                                <input type="text" id="offence" name="offence" value="{{ $case->offence }}" placeholder="بجرم" class="form-control">
                                            </div>
                                            
                                            <div class="col-6">
                                                <label for="nf-police_station" class=" form-control-label">تھانہ</label>
                                                <input type="text" id="police_station" name="police_station" value="{{ $case->police_station }}" placeholder="تھانہ" class="form-control">
                                            </div>
                                            </div>
                                            <div class="row form-group">
                                            <div class="col-6">
                                                <label for="nf-email" class=" form-control-label">عنوان مقدمہ</label>
                                                <input type="text" id="defendant" name="defendant" value="{{ $case->defendant }}" placeholder="" class="form-control">
                                            </div>
                                            
                                            <div class="col-6">
                                                <label for="nf-email" class=" form-control-label"></label>
                                                <input type="text" id="plaintiff" name="plaintiff" value="{{ $case->plaintiff }}" placeholder="" class="form-control">

                                            </div>
                                            </div>
                                            <div class="row form-group">
                                            <div class="col-6">
                                                <label for="nf-decision_date" class=" form-control-label">تاریخ فیصلہ</label>
                                                <input type="date" id="decision_date" name="decision_date" value="{{ $case->decision_date }}" placeholder="تاریخ فیصلہ" class="form-control">
                                            </div>
                                            
                                            <div class="col-6">
                                                <label for="nf-decision" class=" form-control-label">قطعات</label>
                                                <input type="text" id="decision" name="decision" value="{{ $case->decision }}" placeholder="قطعات" class="form-control">
                                            </div>
                                            </div>
                                            <div class="row form-group">
                                            <div class="col-12 md-9">
                                                <label for="nf-court_name" class=" form-control-label">نام عدالت</label>
                                                <input type="text" id="court_name" name="court_name" value="{{ $case->court_name }}" placeholder="نام عدالت" class="form-control">
                                            </div>
                                          
                                            </div>
                                            <div class="row form-group">
                                            <div class="col-6">
                                                <label for="nf-decision_year" class=" form-control-label">فیصلہ سال</label>
                                                <input type="text" id="decision_year" name="decision_year" value="{{ $case->decision_year }}" placeholder="فیصلہ سال" class="form-control">
                                            </div>
                                            
                                            <div class="col-6">
                                                <label for="nf-rack_number" class=" form-control-label">ریک نمبر</label>
                                                <input type="text" id="rack_number" name="rack_number" value="{{ $case->rack_number }}" placeholder="ریک نمبر" class="form-control">
                                            </div>
                                            </div>
                                            </div>

                                          
                                        
                                    </div>


		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>

<p class="text-center text-primary"><small> </small></p>
@endsection