<div class="tab-pane fade show active" id="basic">
    <form action="{{route('admin.basic.settings', $setting->id)}}" method="POST" class="form-validate-jquery" enctype="multipart/form-data">
        @csrf
        @if($setting->favicon)
        <div class="form-group row">
            <label class="col-form-label col-lg-3"></label>
            <div class="col-lg-9">
                <img class="img-preview rounded" src="{{asset('storage/'.$setting->favicon)}}" alt="Favicon">
            </div>
        </div>
        @endif
        <div class="form-group row">
            <label class="col-form-label col-lg-3">Favicon</label>
            <div class="col-lg-9">
                <input type="file" name="favicon" class="form-control-uniform" data-fouc>
            </div>
        </div>
        @if($setting->logo)
            <div class="form-group row">
                <label class="col-form-label col-lg-3"></label>
                <div class="col-lg-9">
                    <img class="img-preview rounded" src="{{asset('storage/'.$setting->logo)}}" alt="Logo">
                </div>
            </div>
        @endif
        <div class="form-group row">
            <label class="col-form-label col-lg-3">Logo</label>
            <div class="col-lg-9">
                <input type="file" name="logo" class="form-control-uniform" data-fouc>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Website Title:</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" placeholder="IIlogics" name="website_title" value="{{ $setting->website_title }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Contact Email:</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" placeholder="info@example.com" name="contact_email" value="{{ $setting->contact_email }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">Contact Number:</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" placeholder="92343242344" name="contact_number" value="{{ $setting->contact_number }}">
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">Update <i class="icon-paperplane ml-2"></i></button>
        </div>
    </form>
</div>
@section('scripts')
    <script src="{{ asset('admin/plugins/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script>
        $(function() {
            $('.form-control-uniform').uniform();
        })
    </script>
@endsection
