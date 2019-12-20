@extends('backend.app')
@section('template_title', 'Add Permission')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <header class="panel-heading">
                    Add Permission
                    <span class="tools pull-right">
                                            <a class="refresh-box fa fa-repeat" href="javascript:;"></a>
                                            <a class="collapse-box fa fa-chevron-down" href="javascript:;"></a>
                                            <a class="close-box fa fa-times" href="javascript:;"></a>
                                        </span>
                </header>
                <div class="panel-body">
                    <form class="cmxform form-horizontal " id="commentForm" method="POST" action="{{route('admin.permission.store')}}">
                        @csrf
                        <div class="form-group ">
                            <label for="name" class="control-label col-lg-3">Name (required)</label>
                            <div class="col-lg-6">
                                <input class="form-control" id="name" name="name" minlength="2" type="text" value="{{old('name')}}" required/>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="slug" class="control-label col-lg-3">Slug (required)</label>
                            <div class="col-lg-6">
                                <input class="form-control" id="slug" type="text" name="slug" value="{{old('slug')}}" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6">
                                <button class="btn btn-primary" type="submit">Save</button>
                                <button class="btn btn-default" type="button">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('admin/components/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/init-validation.js') }}"></script>
@endsection
