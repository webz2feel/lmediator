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
                     br
                    <table class="table responsive-data-table table-striped" id="permissions-table">
                        <thead>
                        <tr>
                            <th>
                                Permission
                            </th>
                            <th>
                                Display Name
                            </th>
{{--                            <th>--}}
{{--                                Sort--}}
{{--                            </th>--}}
                            <th>
                                Actions
                            </th>
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
    <link href="{{ asset('admin/components/datatables-tabletools/css/dataTables.tableTools.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/components/datatables-colvis/css/dataTables.colVis.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/components/datatables-responsive/css/responsive.dataTables.scss') }}" rel="stylesheet">
    <link href="{{ asset('admin/components/datatables-scroller/css/scroller.dataTables.scss') }}" rel="stylesheet">
@endsection
@section('scripts')
    <script src="{{ asset('admin/components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script src="{{ asset('admin/components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/components/datatables-colvis/js/dataTables.colVis.js') }}"></script>
    <script src="{{ asset('admin/components/datatables-responsive/js/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('admin/components/datatables-scroller/js/dataTables.scroller.js') }}"></script>
{{--    <script src="{{ asset('admin/dist/js/datatable-custom.js') }}"></script>--}}
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
                    // {data: 'sort', name: 'permissions.sort'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[1, "asc"]],
                searchDelay: 500,
                dom: 'lBfrtip',
                buttons: {
                    buttons: [
                        { extend: 'copy', className: 'copyButton',  exportOptions: {columns: [ 0, 1, 2 ]  }},
                        { extend: 'csv', className: 'csvButton',  exportOptions: {columns: [ 0, 1, 2 ]  }},
                        { extend: 'excel', className: 'excelButton',  exportOptions: {columns: [ 0, 1, 2 ]  }},
                        { extend: 'pdf', className: 'pdfButton',  exportOptions: {columns: [ 0, 1, 2 ]  }},
                        // { extend: 'print', className: 'printButton',  exportOptions: {columns: [ 0, 1, 2 ]  }}
                    ]
                },
                language: {
{{--                    @lang('datatable.strings')--}}
                }
            });
            // Backend.DataTableSearch.init(dataTable);
        });
    </script>
@endsection
