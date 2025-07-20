@extends('admin.layout')
@section('title', 'All Fee Heads')
@section('custom-css')
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection
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
                            <li class="breadcrumb-item active">Fee Structure List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            <div class="card-header">
                                <h3 class="card-title">Fee Structure</h3>
                            </div>
                            <div class="row m-2">
                                <form action="" method="get"
                                    class="w-100 d-flex justify-content-between align-items-center">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="class-id">Class</label>
                                            <select class="form-control" name="class" id="class-id">
                                                <option value="">Select Class</option>
                                                @foreach ($classes as $class)
                                                    <option value="{{ $class->id }}" {{ old('class', $class->id == request('class')) ? 'selected' : '' }}>
                                                        {{$class->name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="academic-year-id">Academic Year</label>
                                            <select class="form-control" name="academic_year" id="academic-year-id">
                                                <option value="">Select Academic Year</option>
                                                @foreach ($academicYears as $academicYear)
                                                    <option value="{{ $academicYear->id }}" {{old('academic_year', $academicYear->id == request('academic_year')) ? 'selected' : '' }}>
                                                        {{$academicYear->name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Class</th>
                                            <th>Fee Head</th>
                                            <th>Academic Year</th>
                                            <th>January</th>
                                            <th>February</th>
                                            <th>March</th>
                                            <th>April</th>
                                            <th>May</th>
                                            <th>June</th>
                                            <th>July</th>
                                            <th>August</th>
                                            <th>September</th>
                                            <th>October</th>
                                            <th>November</th>
                                            <th>December</th>
                                            <th>Created Time</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($feeStructures as $feeStructure)
                                            <tr>
                                                <td>{{ $feeStructure->id }}</td>
                                                <td>{{ $feeStructure->class->name }}</td>
                                                <td>{{ $feeStructure->feeHead->name }}</td>
                                                <td>{{ $feeStructure->academicYear->name }}</td>
                                                <td>{{ $feeStructure->january }}</td>
                                                <td>{{ $feeStructure->february }}</td>
                                                <td>{{ $feeStructure->march }}</td>
                                                <td>{{ $feeStructure->april }}</td>
                                                <td>{{ $feeStructure->may }}</td>
                                                <td>{{ $feeStructure->june }}</td>
                                                <td>{{ $feeStructure->july }}</td>
                                                <td>{{ $feeStructure->august }}</td>
                                                <td>{{ $feeStructure->september }}</td>
                                                <td>{{ $feeStructure->october }}</td>
                                                <td>{{ $feeStructure->november }}</td>
                                                <td>{{ $feeStructure->december }}</td>
                                                <td>{{ $feeStructure->created_at->format('d:m:y') }}</td>
                                                <td>
                                                    <a href="{{ route('fee-structure.edit', $feeStructure->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('fee-structure.delete', $feeStructure->id) }}"
                                                        class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </div>
@endsection
@section('custom-js')



    <script src="plugins/jquery/jquery.min.js"></script>

    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script src="dist/js/adminlte.min2167.js?v=3.2.0"></script>

    <script src="dist/js/demo.js"></script>

    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection