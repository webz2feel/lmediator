<!--Action Button-->
{{--@if(Active::checkUriPattern('admin/access/permission'))--}}
    @include('backend.role.partials.header-export')
{{--@endif--}}
{{--        @permission('create-permission')--}}
{{--<button class="btn btn-primary" data-target="#confirmForm" data-modalClass="modal-success" data-toggle="modal" data-title="Add Permission" data-message="you can add new permission here"><i class="fa fa-plus"></i> Create Permission</button>--}}
<a href="{{route('admin.user.create')}}" class="btn btn-primary btn-sm"><i class="icon icon-plus2"></i> Create User</a>
{{--        @endauth--}}