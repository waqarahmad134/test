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
                <!-- DATA TABLE -->
                <h3 class="title-5 m-b-35">Data Table</h3>
                
                
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                            <tr>
                            <th>Type</th>
                                <th>Title</th>
                                <th>Institution No.</th>
                                <th>Institution Date</th>
                                <th>Court</th>
                                <th>Hearing Date</th>
                                <th>Actions</th> <!-- Added 'Actions' header for buttons if needed -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr class="tr-shadow">
                                <td>{{ $product->caset }}</td>
                                <td>{{ $product->p1 }}  VS. {{ $product->p2 }}</td>
                                <td>{{ $product->i_no }}</td>
                                <td>{{ $product->i_date }}</td>
                                <td>{{$product->jname($product->judge_id)}}</td>
                                <td>{{ $product->a_date }}</td>
                                <td>
                                    <!-- Action Buttons for each product, like Edit, Delete -->
                                    <a href="http://localhost/mms/public/finalprint/{{$product->id}}" data-toggle="tooltip"   data-original-title="View" class="btn btn-warning btn-sm viewProduct">View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- END DATA TABLE -->

                <br>
                <!-- Pagination -->
                {!! $products->links() !!}

                <p class="text-center text-primary"><small> </small></p>
            </div>
        </div>
    </div>
</div>
@endsection
