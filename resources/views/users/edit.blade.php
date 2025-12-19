@extends('layout.layout')

@php
$title = 'Edit User';
$subTitle = 'Edit User Information';
@endphp

@section('content')

<div class="row gy-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h6 class="card-title mb-0">Edit User</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Use PUT method for updating -->

                    <div class="row gy-3">

                        <!-- Name Input -->
                        <div class="col-12">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email Input -->
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password Input (optional) -->
                        <div class="col-12">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                            <small class="text-muted">Leave blank if you do not want to change the password</small>
                            @error('password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password Confirmation (optional) -->
                        <div class="col-12">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                            @error('password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Status Input -->
                        <div class="col-12">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="active" {{ old('status', $user->status) == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status', $user->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Role Input -->
                        <div class="col-12">
                            <label for="role" class="form-label">Select Role</label>
                            <select name="role" id="role" class="form-control" required>
                                <option value="">-- Select Role --</option>
                                @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ old('role', $user->role) == $role->name ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('role')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- District Input -->
                        <div class="col-12">
                            <label for="district_id" class="form-label">Select District</label>
                            <select name="district_id" id="district_id" class="form-control">
                                <option value="">-- Select District --</option>
                                @foreach ($districts as $district)
                                <option value="{{ $district->id }}" {{ old('district_id', $user->district_id) == $district->id ? 'selected' : '' }}>
                                    {{ $district->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('district_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tehsil Input -->
                        <div class="col-12">
                            <label for="tehsil_id" class="form-label">Select Tehsil</label>
                            <select name="tehsil_id" id="tehsil_id" class="form-control">
                                <option value="">-- Select Tehsil --</option>
                                @foreach ($tehsils as $tehsil)
                                <option value="{{ $tehsil->id }}" {{ old('tehsil_id', $user->tehsil_id) == $tehsil->id ? 'selected' : '' }}>
                                    {{ $tehsil->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('tehsil_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Station Input -->
                        <div class="col-12">
                            <label for="station_id" class="form-label">Select Police Station</label>
                            <select name="station_id" id="station_id" class="form-control">
                                <option value="">-- Select Police Station --</option>
                                @foreach ($stations as $station)
                                <option value="{{ $station->id }}" {{ old('station_id', $user->station_id) == $station->id ? 'selected' : '' }}>
                                    {{ $station->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('station_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <!-- Submit Button -->
                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-primary">Update User</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
