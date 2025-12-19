@extends('layout.layout')

@php
$title = 'Add Tehsil';
$subTitle = 'Tehsil Input Form';
@endphp

@section('content')

    <div class="row gy-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Add Tehsil</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('tehsils.store') }}" method="POST">
                        @csrf

                        <div class="row gy-3">

                            <!-- District Input -->
                            <div class="col-12">
                                <label for="district_id" class="form-label">Select District</label>
                                <select name="district_id" id="district_id" class="form-control" required>
                                    <option value="">-- Select District --</option>
                                    @foreach ($districts as $district)
                                        <option value="{{ $district->id }}" {{ old('district_id') == $district->id ? 'selected' : '' }}>
                                            {{ $district->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('district_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Tehsil Name Input -->
                            <div class="col-12">
                                <label for="name" class="form-label">Tehsil Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Status Input -->
                            <div class="col-12">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-control" required>
                                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <!-- Submit Button -->
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn btn-primary">Add Tehsil</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
