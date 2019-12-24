@extends('backend.app')
@section('template_title', 'Add Role')
@section('header', 'Roles')
@section('content')
    <div class="row">
        <div class="col-md-6">

            <!-- Basic layout-->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Add Role</h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('admin.role.store')}}" method="POST" class="form-validate-jquery">
                        @includeIf('backend.role.partials.form', ['role' => $role, 'permissions' => $permissions, 'rolePermissions' => []])
                        <div class="text-right">
                            <a href="{{route('admin.role.index')}}" class="btn btn-default">Back</a>
                            <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /basic layout -->
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('admin/plugins/js/plugins/forms/validation/validate.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/demo_pages/form_validation.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script>
        $(function() {
            $('.form-control-select2').select2({
                minimumResultsForSearch: Infinity
            });
        });
    </script>
@endsection
