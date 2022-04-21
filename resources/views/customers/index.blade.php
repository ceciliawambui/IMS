<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Customers</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <style>
        body {
            font-family: 'Times New Roman', serif;
        }

        .btn-group-xs>.btn,
        .btn-xs {
            padding: .35rem .5rem;
            font-size: .875rem;
            line-height: .5;
            border-radius: .2rem;
        }

        .table.dataTable td {
            padding: 3px;
        }

        .table.dataTable th {
            padding: 3px;
        }

    </style>

</head>

<body>
    <div class="container-fluid mt-2">
        @yield('content')
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Customers</li>
                        </ol>
                    </nav>

                </div>
                <div>
                    <a class="btn btn-info btn-sm" href="{{ route('home') }}"> Back</a>
                    <a class="btn btn-success btn-sm" href="{{ route('customers.create') }}"> Create Customer</a>
                </div>
                <div></div>
                <div>

                </div>
                <div>
                    <form name="viewTrashed" class="d-flex float-right">
                        <select name="trashed" id="trashed" class="form-control mr-2 size=5">
                            <option value="">View Customers</option>
                            <option value="1">View Trashed</option>
                        </select>
                        <button type="button" id="filterTrashed" class="btn btn-sm btn-success btn-xs">Filter</button>
                    </form>

                </div>

            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="card-body">
            <table class="table table-bordered" id="datatable-crud" style="width: 100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</body>
<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#datatable-crud').DataTable({
            processing: true,
            serverSide: true,
            responsive:true,
            ajax: {
                url: "{{ url('customers') }}",
                data: function(value) {
                    value.trashed = $("#trashed").val()
                }
            },
            columns: [
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'phone',
                    name: 'phone'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                },
            ],
            order: [
                [0, 'desc']
            ]
        });
        $('body').on('click', '.delete', function() {
            if (confirm("Delete Record?") == true) {
                var id = $(this).data('id');
                // ajax
                $.ajax({
                    type: "POST",
                    url: "{{ url('delete-customer') }}",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(res) {
                        var oTable = $('#datatable-crud').dataTable();
                        oTable.fnDraw(false);
                    }
                });
            }
        });
        // $('.dataTables_filter input[type="search"]')
        //     .attr('placeholder', '  Search...')
        $('#filterTrashed').click(function() {
            $('#datatable-crud').DataTable().draw(true)
        })
    });
</script>

</html>

