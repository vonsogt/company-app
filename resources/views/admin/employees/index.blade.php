@extends('layouts.admin')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        {{-- Breadcrumb --}}


        <!-- Page Heading & Breadcrumb -->
        <div class="row">
            <div class="col-sm-6">
                <h1 class="h3 mb-2 text-gray-800">
                    Employee
                </h1>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.employee.index') }}">Employee</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List</li>
                    </ol>
                </nav>
            </div>
        </div>




        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Company</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Company</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    @section('scripts')
        <script>

            // Data table
            var table = $("#dataTable").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "order": [0, "desc"],
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('admin.employee.index') }}",
                "columns": [
                    {data: 'id', name: "ID"},
                    {data: 'full_name', name: "Full Name"},
                    {data: 'company', name: "Company"},
                    {data: 'email', name: "Email"},
                    {data: 'phone', name: "Phone"},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                "lengthChange": true,
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                "buttons": [{
                        "extend": "collection",
                        "text": '<i class="fa fa-download"></i> Export',
                        "dropup": true,
                        "buttons": [{
                                extend: "copy",
                                exportOptions: {
                                    columns: 'th:not(:last-child)'
                                }
                            },
                            {
                                extend: "csv",
                                exportOptions: {
                                    columns: 'th:not(:last-child)'
                                }
                            },
                            {
                                extend: "excel",
                                exportOptions: {
                                    columns: 'th:not(:last-child)'
                                }
                            },
                            {
                                extend: "pdf",
                                exportOptions: {
                                    columns: 'th:not(:last-child)'
                                }
                            },
                            {
                                extend: "print",
                                exportOptions: {
                                    columns: 'th:not(:last-child)'
                                }
                            },
                        ]
                    },
                    {
                        extend: "colvis",
                        text: '<i class="fa fa-eye-slash"></i> Column Visibility',
                        dropup: true
                    }
                ],
            });

            // Call the dataTables jQuery plugin
            $(document).ready(function() {
                $('#dataTable').DataTable();
            });
        </script>
    @endsection
@endsection
