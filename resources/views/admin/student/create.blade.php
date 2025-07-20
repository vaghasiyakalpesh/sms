@extends('admin.layout')
@section('title', 'Register Student Form')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Register Student</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Register Student Form</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            <div class="card-header">
                                <h3 class="card-title">Register Student</h3>
                            </div>
                            <form action="{{ route('student.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="class-id">Class</label>
                                                <select class="form-control" name="class" id="class-id">
                                                    <option value="">Select Class</option>
                                                    @foreach ($classes as $class)
                                                        <option value="{{ $class->id }}" {{ old('class') == $class->id ? 'selected' : '' }} >{{$class->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('class')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="academic-year-id">Academic Year</label>
                                                <select class="form-control" name="academic_year" id="academic-year-id">
                                                    <option value="">Select Academic Year</option>
                                                    @foreach ($academicYears as $academicYear)
                                                        <option value="{{ $academicYear->id }}" {{ old('academic_year') == $academicYear->id ? 'selected' : '' }}>{{$academicYear->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('academic_year')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}"
                                                    placeholder="Enter Student Name">
                                            </div>
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}"
                                                    placeholder="Enter Student email">
                                            </div>
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="father_name">Father Name</label>
                                                <input type="text" name="father_name" class="form-control" id="father_name"
                                                value="{{ old('father_name') }}"
                                                    placeholder="Enter Student Father Name">
                                            </div>
                                            @error('father_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="mother_name">Mother Name</label>
                                                <input type="text" name="mother_name" class="form-control" id="mother_name"
                                                value="{{ old('mother_name') }}"
                                                    placeholder="Enter Student  Mother Name">
                                            </div>
                                            @error('mother_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="dob">DOB</label>
                                                <input type="date" name="dob" class="form-control" id="dob" value="{{ old('dob') }}"
                                                    placeholder="Enter Student Date Of Birth">
                                            </div>
                                            @error('dob')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="admission_date">Admission Date</label>
                                                <input type="date" name="admission_date" class="form-control"
                                                    id="admission_date" value="{{ old('admission_date') }}" placeholder="Enter Student Admission Date">
                                            </div>
                                            @error('admission_date')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="mobile_no">Mobile Number</label>
                                                <input type="number" name="mobile_no" class="form-control" id="mobile_no" value="{{ old('mobile_no') }}"
                                                    placeholder="Enter Student Mobile Number">
                                            </div>
                                            @error('mobile_no')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <input type="text" name="address" class="form-control" id="address" value="{{ old('address') }}"
                                                    placeholder="Enter Student Address">
                                            </div>
                                            @error('address')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" name="password" class="form-control" id="password" value="{{ old('password') }}"
                                                    placeholder="Enter Student Password">
                                            </div>
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="confirm_password">Confirm Password</label>
                                                <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}"
                                                    id="confirm_password" placeholder="Enter Confirm Password">
                                            </div>
                                            @error('password_confirmation')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
@section('custom-js')
    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script>
        $(function () {
            bsCustomFileInput.init();
        });
    </script>
@endsection