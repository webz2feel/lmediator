@extends('backend.app')
@section('template_title', 'Permissions')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading panel-border">
                    Permissions
                    <span class="tools pull-right">
                                            <a class="refresh-box fa fa-repeat" href="javascript:;"></a>
                                            <a class="collapse-box fa fa-chevron-down" href="javascript:;"></a>
                                            <a class="close-box fa fa-times" href="javascript:;"></a>
                                        </span>
                </header>
                <div class="panel-body">
                    <div class="text-right">
                        @include('backend.permission.partials.permissions-header-buttons')
                    </div>
                    <br>
                    <table class="table responsive-data-table table-striped" id="permissions-table">
                        <thead>
                        <tr>
                            <th>
                                Display Name
                            </th>
                            <th>
                                Permission
                            </th>
                            <th>
                                Created At
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <thead class="transparent-bg">
                        <tr>
                            <th>
                                <input type="text" class="search-input-text form-control" data-column="0">
                                <a class="reset-data" href="javascript:void(0)"><i class="fa fa-times"></i></a>
                            </th>
                            <th>
                                <input type="text" class="search-input-text form-control" data-column="1">
                                <a class="reset-data" href="javascript:void(0)"><i class="fa fa-times"></i></a>
                            </th>
                            <th>
                                <input type="text" class="search-input-text form-control" data-column="2">
                                <a class="reset-data" href="javascript:void(0)"><i class="fa fa-times"></i></a>
                            </th>
                            <th></th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </section>
        </div>

    </div>
@endsection
@section('template_linked_css')
    <link href="{{ asset('admin/components/datatables/media/css/jquery.dataTables.css') }}" rel="stylesheet">
    <style>
        div.dataTables_wrapper div.dataTables_processing {
            background: rgba(0, 0, 0, 0.75) none repeat scroll 0 0;
            border: 1px solid rgba(255, 255, 255, 1);
            box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.5);
            color: #fff;
            padding: 5px 0;
            z-index: 10;
            position: absolute;
            top: 50%;
            left: 50%;
            width: 200px;
            margin-left: -100px;
            margin-top: -26px;
            text-align: center;
        }
    </style>
@endsection
@section('scripts')

    <script type="text/javascript" src="{{ asset('admin/components/datatables/pdfmake.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/components/datatables/vfs_fonts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/components/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/dist/js/datatable-custom.js') }}"></script>
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var dataTable = $('#permissions-table').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.permission.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'slug', name: 'slug'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                // order: [[3, "asc"]],
                searchDelay: 500,
                dom: 'lBfrtip',
                buttons: {
                    buttons: [
                        { extend: 'copy', className: 'copyButton',  exportOptions: {columns: [ 0, 1, 2 ]  }},
                        { extend: 'csv', className: 'csvButton',  exportOptions: {columns: [ 0, 1, 2 ]  }},
                        { extend: 'excel', className: 'excelButton',  exportOptions: {columns: [ 0, 1, 2 ]  }},
                        { extend: 'pdf', className: 'pdfButton',  exportOptions: {columns: [ 0, 1, 2 ]  }},
                        { extend: 'print', className: 'printButton',  exportOptions: {columns: [ 0, 1, 2 ]  }}
                    ]
                },
                language: {
{{--                    @lang('datatable.strings')--}}
                }
            });
            Backend.DataTableSearch.init(dataTable);
        });
    </script>
@endsection
