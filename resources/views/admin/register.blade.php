@extends('layouts.adminlogin')
@section('page_meta')
    <meta name="description" content="Property Seeling Website.">
    <meta name="keywords" content="property, sales, leases, buy">
    <meta name="author" content="pixelstrap">
    <title>Admin - Register</title>
@endsection
@section('page_content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Registration Form</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            @csrf

                            {{-- First Name --}}
                            <div class="mb-3">
                                <label for="firstname" class="form-label">First Name</label>
                                <input type="text" id="firstname" name="fname"
                                    class="form-control @error('firstname') is-invalid @enderror"
                                    value="{{ old('firstname') }}" placeholder="Enter first name" required>
                                @error('firstname')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Last Name --}}
                            <div class="mb-3">
                                <label for="lastname" class="form-label">Last Name</label>
                                <input type="text" id="lastname" name="lname"
                                    class="form-control @error('lastname') is-invalid @enderror"
                                    value="{{ old('lastname') }}" placeholder="Enter last name" required>
                                @error('lastname')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" id="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                    placeholder="Enter email" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Password --}}
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Enter password" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>



                            {{-- Submit Button --}}
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
