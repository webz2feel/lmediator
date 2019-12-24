@extends('backend.app')
@section('template_title', 'Edit Role')
@section('header', 'Roles')
@section('content')
    @section('header', 'Roles')
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
            <table class="table datatable-responsive" id="data-table">
                <thead>
                <tr>
                    <th>Display Name</th>
                    <th>Role</th>
                    <th>Created AT</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <td>Display Name</td>
                    <td>Role</td>
                    <td>Created AT</td>
                    <td></td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('admin/plugins/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/plugins/tables/datatables/extensions/responsive.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/demo_pages/datatables_responsive.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/plugins/tables/datatables/extensions/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/plugins/tables/datatables/extensions/buttons.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/plugins/notifications/sweet_alert.min.js') }}"></script>
    @includeIf('backend.scripts.datatable-config')
    <script>
       $(function() {
           $('#data-table').DataTable({
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
           });
       });
    </script>
@endsection
