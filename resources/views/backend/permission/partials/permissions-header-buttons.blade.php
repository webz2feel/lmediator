<!--Action Button-->
{{--@if(Active::checkUriPattern('admin/access/permission'))--}}
    @include('backend.permission.partials.header-export')
{{--@endif--}}
{{--        @permission('create-permission')--}}
{{--<button class="btn btn-primary" data-target="#confirmForm" data-modalClass="modal-success" data-toggle="modal" data-title="Add Permission" data-message="you can add new permission here"><i class="fa fa-plus"></i> Create Permission</button>--}}
<a href="{{route('admin.permission.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Create Permission</a>
{{--        @endauth--}}
