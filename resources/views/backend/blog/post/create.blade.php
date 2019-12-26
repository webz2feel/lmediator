@extends('backend.app')
@section('template_title', 'Add Post')
@section('header', 'Post')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <!-- Basic layout-->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Post</h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('admin.post.store')}}" method="POST" class="form-validate-jquery">
                        @csrf
                        <div class="form-group">
                            <label>Title:</label>
                            <input type="text" class="form-control" name="title" value="{{old('title')}}" placeholder="Post title" required>
                        </div>

                        <div class="form-group">
                            <label>Contents:</label>
                            <textarea id="summernote" name="contents" class="form-control"></textarea>
                        </div>

                        <div class="text-right">
                            <a href="{{route('admin.permission.index')}}" class="btn btn-default">Back</a>
                            <button type="submit" class="btn btn-primary">Submit <i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title">Status</h6>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label>Your name:</label>
                        <select name="status" id="status" class="form-control select" data-fouc>
                            <option value="published">Published</option>
                            <option value="pending">Pending</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title">Categories</h6>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label>Select Categories:</label>
                        <select multiple name="categories" id="categories" class="form-control select" data-fouc>
                            <option value="published">Published</option>
                            <option value="pending">Pending</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title">Tags</h6>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label>Select Tags:</label>
                        <select multiple name="status" id="status" class="form-control select" data-fouc>
                            <option value="published">Published</option>
                            <option value="pending">Pending</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title">Featured Image</h6>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <input type="file" name="file" class="file-input-overwrite" data-fouc>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('admin/plugins/js/plugins/forms/validation/validate.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/demo_pages/form_validation.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/plugins/editors/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/plugins/uploaders/fileinput/fileinput.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/js/demo_pages/uploader_bootstrap.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select').select2({
                placeholder: 'Select',
                minimumResultsForSearch: Infinity
            });
            $('#summernote').summernote({
                height: 300,
                tabsize: 2
            });
        });
    </script>
@endsection
