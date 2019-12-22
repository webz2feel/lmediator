@extends('backend.app')
@section('template_title', 'Permissions')
@section('content')
    @section('header', 'Permissions')
    <div class="content pt-0">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">All Permissions </h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('backend.permission.partials.permissions-header-buttons')
            </div>
            <table class="table datatable-responsive" id="permissions-table">
                <thead>
                <tr>
                    <th>Display Name</th>
                    <th>Permission</th>
                    <th>Created AT</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <thead class="transparent-bg">
                <tr>
                    <th>
                        <input type="text" class="search-input-text form-control" data-column="0">
                        <a class="reset-data" href="javascript:void(0)"><i class="icon icon-cross3"></i></a>
                    </th>
                    <th>
                        <input type="text" class="search-input-text form-control" data-column="1">
                        <a class="reset-data" href="javascript:void(0)"><i class="icon icon-cross3"></i></a>
                    </th>
                    <th>
                        <input type="text" class="search-input-text form-control" data-column="2">
                        <a class="reset-data" href="javascript:void(0)"><i class="icon icon-cross3"></i></a>
                    </th>
                    <th></th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@section('template_linked_css')

@endsection
@section('scripts')
    <script src="{{ asset('admin/plugins/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/plugins/tables/datatables/extensions/responsive.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/demo_pages/datatables_responsive.js') }}"></script>
    <script src="{{ asset('admin/dist/js/datatable-custom.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/plugins/notifications/sweet_alert.min.js') }}"></script>
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
                // searchDelay: 500,
                // dom: 'lBfrtip',
                buttons: {
                    buttons: [
                        { extend: 'copy', className: 'copyButton',  exportOptions: {columns: [ 0, 1, 2 ]  }},
                        { extend: 'csv', className: 'csvButton',  exportOptions: {columns: [ 0, 1, 2 ]  }},
                        { extend: 'excel', className: 'excelButton',  exportOptions: {columns: [ 0, 1, 2 ]  }},
                        { extend: 'pdf', className: 'pdfButton',  exportOptions: {columns: [ 0, 1, 2 ]  }},
                        { extend: 'print', className: 'printButton',  exportOptions: {columns: [ 0, 1, 2 ]  }}
                    ]
                },
                {{--language: {--}}
                {{--    @lang('datatable.strings')--}}
                {{--}--}}
            });
            Backend.DataTableSearch.init(dataTable);
        });
    </script>
@endsection
