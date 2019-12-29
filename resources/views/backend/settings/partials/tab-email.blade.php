<div class="tab-pane fade" id="email">
    <form action="{{route('admin.email.settings', $setting->id)}}" method="POST" class="form-validate-jquery" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">SMTP Protocl:</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" placeholder="mail.smtp2go.com" name="smtp_protocol" value="{{ $setting->smtp_protocol }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">SMPT Username:</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" placeholder="info@example.com" name="smtp_username" value="{{ $setting->smtp_username }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">SMTP Password:</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" placeholder="12345" name="smtp_password" value="{{ $setting->smtp_password }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">SMTP Port:</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" placeholder="12345" name="smtp_port" value="{{ $setting->smtp_port }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label">SMTP Security:</label>
            <div class="col-lg-9">
                <input type="text" class="form-control" placeholder="tls" name="smtp_security" value="{{ $setting->smtp_security }}">
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">Update <i class="icon-paperplane ml-2"></i></button>
        </div>
    </form>
</div>
