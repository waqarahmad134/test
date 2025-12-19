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
                                
                                   
                                </div>
                                </div>
                            </div>
                        </div>
                     
                        <div class="row m-t-25">
                        <div class="col-sm-6 col-lg-4" >
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                             
                                            </div>
                                            <div class="text">
                                                
                                                <h2>{{$total}}</h2>
                                            
                                                <span >Total Institution</span>
                                                
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div> 
                            <div class="col-sm-6 col-lg-4" >
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                             
                                            </div>
                                            <div class="text">
                                                <h2>{{$monthly}}</h2>
                                            
                                                <span >Monthly Institution</span>
                                                
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div> 
                            <div class="col-sm-6 col-lg-4" >
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                             
                                            </div>
                                            <div class="text">
                                                <h2>{{$criminal}}</h2>
                                            
                                                <span >Criminal Institution</span>
                                                
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div> 
                            <div class="col-sm-6 col-lg-4" >
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                             
                                            </div>
                                            <div class="text">
                                            
                                                <h2>{{$civil}}</h2>
                                            
                                                <span >Civil Institution</span>
                                                
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div> 
                            <div class="col-sm-6 col-lg-4" >
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                             
                                            </div>
                                            <div class="text">
                                                <h2>{{$total}}</h2>
                                        
                                                <span >Misc Cases</span>
                                                
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div> 
                            <div class="col-sm-6 col-lg-4" >
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                             
                                            </div>
                                            <div class="text">
                                                <h2>{{$total}}</h2>
                                            
                                                <span >Lifetime Institution</span>
                                                
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div> 
                        
                            @role('Admin')
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
                            @endrole
                            @role('user')
                            <div class="col-sm-6 col-lg-3" >
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                            
                                            </div>
                                            <div class="text">
                                                <h2>Mine</h2>
                                            
                                                <span>{{$mine}}</span>
                                                
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div> 
                            <div class="col-sm-6 col-lg-3" >
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                            
                                            </div>
                                            <div class="text">
                                                <h2>Today</h2>
                                            
                                                <span>{{$today}}</span>
                                                
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div> 
                            @endrole
                        </div>
                      @role('Admin')
                        <div class="row">
                        
                            <div class="col-lg-12">
                                <h2 class="title-1 m-b-25">Today Report</h2>
                              
                               
                                <div class="table-responsive table--no-card m-b-40">
                                
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                            
                                                <th>name</th>
                                                <th class="text-right">total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($u as $user)
                        @foreach($user->getRoleNames() as $v)
                        @if($v!="Admin")
                                            <tr>
                                         
                                                <td>{{$user->name}}</td>
                                  
                                                <td class="text-right">{{$user->counts($user->id)}}</td>
                                            </tr>
                                            @endif
                            @endforeach
                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                          </div>
                          @endrole
                                      @endsection

                                      
