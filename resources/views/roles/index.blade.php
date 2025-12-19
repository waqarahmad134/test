

@extends('layout.layout')

@php
$title = 'Dashboard';
$subTitle = '';
@endphp


@section('content')
@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif

<div class="section__content section__content--p30">
                    <div class="container-fluid">
                    <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Roles Management</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                        
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        
                                    </div>
                              
                                    <div class="table-data__tool-right">
                                    
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#yourModal" >
                                            <i class="zmdi zmdi-plus" ></i>Create New Role</button>
                                     
                                    </div>
                                    
                                </div>
                                <div class="table table-bordered ">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                            <th>No</th>
     <th>Name</th>
     <th width="280px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($roles as $key => $role)
                                            <tr class="tr-shadow">
                                                
                                            <tr class="spacer"></tr>
                                            <tr class="tr-shadow">
                                            <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
          
            @can('role-edit')
                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
            @endcan
            @can('role-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            @endcan
        </td>
                                            </tr>
                                            @endforeach
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
                                    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                                        @csrf

                                        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permission:</strong>
            <br/>
            @foreach($permission as $value)
                <label><input name="admin" type="checkbox" value=" {{ $value->id }}">
                {{ $value->name }}</label>
            <br/>
            @endforeach
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