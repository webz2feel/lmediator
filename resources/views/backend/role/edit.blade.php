@extends('backend.app')
@section('template_title', 'Edit Role')
@section('header', 'Role')
@section('content')
    <div class="row">
        <div class="col-md-6">

            <!-- Basic layout-->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Edit Role</h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('admin.role.update', $role->id)}}" method="POST" class="form-validate-jquery">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="id" value="{{$role->id}}">
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" class="form-control" name="name" value="{{old('name', $role->name)}}" placeholder="Role name" required>
                        </div>

                        <div class="form-group">
                            <label>Role Slug:</label>
                            <input type="text" class="form-control" placeholder="Role slug here" name="slug" value="{{old('slug', $role->slug)}}" required>
                        </div>

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
@endsection
