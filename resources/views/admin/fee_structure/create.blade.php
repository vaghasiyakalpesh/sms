@extends('admin.layout')
@section('title', 'Fee Structure Form')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Fee Structure</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Fee Structure Form</li>
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
                                <h3 class="card-title">Add Fee Structure</h3>
                            </div>
                            <form action="{{ route('fee-structure.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="fee-head">Fee Head</label>
                                                <select class="form-control" name="fee_head" id="fee-head">
                                                    <option value="">Select Fee Head</option>
                                                    @foreach ($feeHeads as $feeHead)
                                                        <option value="{{ $feeHead->id }}">{{$feeHead->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('fee_head')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="class-id">Class</label>
                                                <select class="form-control" name="class" id="class-id">
                                                    <option value="">Select Class</option>
                                                    @foreach ($classes as $class)
                                                        <option value="{{ $class->id }}">{{$class->name}}</option>
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
                                                    <option value="">Select Class</option>
                                                    @foreach ($academicYears as $academicYear)
                                                        <option value="{{ $academicYear->id }}">{{$academicYear->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('academic_year')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="january">January</label>
                                                <input type="text" name="january" class="form-control" id="january"
                                                    placeholder="Enter January Fee">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="fee-head">February</label>
                                                <input type="text" name="february" class="form-control" id="fee-head"
                                                    placeholder="Enter February Fee">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="march">March</label>
                                                <input type="text" name="march" class="form-control" id="march"
                                                    placeholder="Enter March Fee">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="april">April</label>
                                                <input type="text" name="april" class="form-control" id="april"
                                                    placeholder="Enter April Fee">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="may">May</label>
                                                <input type="text" name="may" class="form-control" id="may"
                                                    placeholder="Enter May Fee">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="june">June</label>
                                                <input type="text" name="june" class="form-control" id="june"
                                                    placeholder="Enter June Fee">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="july">July</label>
                                                <input type="text" name="july" class="form-control" id="july"
                                                    placeholder="Enter July Fee">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="august">August</label>
                                                <input type="text" name="august" class="form-control" id="august"
                                                    placeholder="Enter August Fee">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="september">September</label>
                                                <input type="text" name="september" class="form-control" id="september"
                                                    placeholder="Enter September Fee">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="october">October</label>
                                                <input type="text" name="october" class="form-control" id="october"
                                                    placeholder="Enter October Fee">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="november">November</label>
                                                <input type="text" name="november" class="form-control" id="november"
                                                    placeholder="Enter November Fee">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="december">December</label>
                                                <input type="text" name="december" class="form-control" id="december"
                                                    placeholder="Enter December Fee">
                                            </div>
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