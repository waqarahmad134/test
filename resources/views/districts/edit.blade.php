@extends('layout.layout')

@php
$title = isset($district) ? 'Edit District' : 'Add District'; // Set title based on context
$subTitle = isset($district) ? 'Update District Form' : 'District Input Form'; // Set subtitle based on context
@endphp

@section('content')

    <div class="row gy-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">{{ isset($district) ? 'Update District' : 'Add District' }}</h6>
                </div>
                <div class="card-body">
                    <form action="{{ isset($district) ? route('districts.update', $district->id) : route('districts.store') }}" method="POST">
                        @csrf
                        @if(isset($district)) 
                            @method('PUT') <!-- This is for the update action -->
                        @endif

                        <div class="row gy-3">

                            <div class="col-12">
                                <label for="name" class="form-label">District Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', isset($district) ? $district->name : '') }}" required>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Status Input -->
                            <div class="col-12">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-control" required>
                                    <option value="active" {{ old('status', isset($district) ? $district->status : '') == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('status', isset($district) ? $district->status : '') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <!-- Submit Button -->
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-primary">{{ isset($district) ? 'Update District' : 'Add District' }}</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
