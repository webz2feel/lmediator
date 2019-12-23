@extends('backend.app')
@section('template_title', 'Edit Role')
@section('header', 'Roles')
@section('content')
    @section('header', 'Permissions')
    <div class="content pt-0">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">All Roles </h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('backend.role.partials.roles-header-buttons')
            </div>
            <table class="table datatable-responsive" id="permissions-table">
                <thead>
                <tr>
                    <th>Display Name</th>
                    <th>Role</th>
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
                <tfoot>
                <tr>
                    <td>Name</td>
                    <td>Position</td>
                    <td>Age</td>
                    <td></td>
                </tr>
                </tfoot>
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
    <script src="{{ asset('admin/plugins/js/plugins/tables/datatables/extensions/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/plugins/tables/datatables/extensions/buttons.min.js') }}"></script>
{{--    <script src="{{ asset('admin/plugins/js/demo_pages/datatables_extension_buttons_html5.js') }}"></script>--}}
    <script src="{{ asset('admin/dist/js/datatable-custom.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/plugins/notifications/sweet_alert.min.js') }}"></script>
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.extend( $.fn.dataTable.defaults, {
                autoWidth: false,
                dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
                language: {
                    search: '<span>Filter:</span> _INPUT_',
                    searchPlaceholder: 'Type to filter...',
                    lengthMenu: '<span>Show:</span> _MENU_',
                    paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
                }
            });
            $('#permissions-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.role.get") }}',
                    type: 'post'
                },
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'slug', name: 'slug'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                buttons: {
                    buttons: [
                        {
                            extend: 'print',
                            className: 'btn btn-light',
                            exportOptions: {
                                columns: [ 0, ':visible' ]
                            }
                        },
                        {
                            extend: 'copyHtml5',
                            className: 'btn btn-light',
                            exportOptions: {
                                columns: [ 0, ':visible' ]
                            }
                        },
                        {
                            extend: 'excelHtml5',
                            className: 'btn btn-light',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            className: 'btn btn-light',
                            exportOptions: {
                                columns: [0, 1, 2, 5]
                            }
                        },
                        {
                            extend: 'colvis',
                            text: '<i class="icon-three-bars"></i>',
                            className: 'btn bg-blue btn-icon dropdown-toggle'
                        }
                    ]
                },
                initComplete: function () {
                    this.api().columns().every(function() {
                        var column = this;
                        var select = $('<select class="form-control filter-select" data-placeholder="Filter"><option value=""></option></select>')
                            .appendTo($(column.footer()).not(':last-child').empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search( val ? '^'+val+'$' : '', true, false )
                                    .draw();
                            });

                        column.data().unique().sort().each(function (d, j) {
                            select.append('<option value="'+d.replace(/<(?:.|\n)*?>/gm, '')+'">'+d.replace(/<(?:.|\n)*?>/gm, '')+'</option>')
                        });
                    });
                }
            });
            {{--var dataTable = $('#permissions-table').dataTable({--}}
            {{--    processing: true,--}}
            {{--    serverSide: true,--}}
            {{--    ajax: {--}}
            {{--        url: '{{ route("admin.role.get") }}',--}}
            {{--        type: 'post'--}}
            {{--    },--}}
            {{--    columns: [--}}
            {{--        {data: 'name', name: 'name'},--}}
            {{--        {data: 'slug', name: 'slug'},--}}
            {{--        {data: 'created_at', name: 'created_at'},--}}
            {{--        {data: 'actions', name: 'actions', searchable: false, sortable: false}--}}
            {{--    ],--}}
                // order: [[3, "asc"]],
                // searchDelay: 500,
                // dom: 'lBfrtip',
                // buttons: {
                //     buttons: [
                //         { extend: 'copy', className: 'copyButton',  exportOptions: {columns: [ 0, 1, 2 ]  }},
                //         { extend: 'csv', className: 'csvButton',  exportOptions: {columns: [ 0, 1, 2 ]  }},
                //         { extend: 'excel', className: 'excelButton',  exportOptions: {columns: [ 0, 1, 2 ]  }},
                //         { extend: 'pdf', className: 'pdfButton',  exportOptions: {columns: [ 0, 1, 2 ]  }},
                //         { extend: 'print', className: 'printButton',  exportOptions: {columns: [ 0, 1, 2 ]  }}
                //     ]
                // },
                {{--language: {--}}
                {{--    @lang('datatable.strings')--}}
                {{--}--}}
            // });
            // Backend.DataTableSearch.init(dataTable);
        });
    </script>
@endsection
