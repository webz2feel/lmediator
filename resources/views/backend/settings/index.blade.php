@extends('backend.app')
@section('template_title', 'Settings')
@section('header', 'Settings')
@section('content')
    <div class="content pt-0">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title">App Settings</h6>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                                <a class="list-icons-item" data-action="remove"></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <ul class="nav nav-tabs nav-tabs-highlight">
                            <li class="nav-item"><a href="#basic" class="nav-link active" data-toggle="tab">Basic</a></li>
                            <li class="nav-item"><a href="#email" class="nav-link" data-toggle="tab">Email</a></li>
                        </ul>

                        <div class="tab-content">
                            @includeIf('backend.settings.partials.tab-basic')
                            @includeIf('backend.settings.partials.tab-email')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{--@section('scripts')--}}
{{--    <script src="{{ asset('admin/plugins/js/plugins/forms/selects/select2.min.js') }}"></script>--}}
{{--    <script src="{{ asset('admin/plugins/js/plugins/notifications/sweet_alert.min.js') }}"></script>--}}
{{--@endsection--}}
