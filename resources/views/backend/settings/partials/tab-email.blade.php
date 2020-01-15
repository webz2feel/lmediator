<div class="tab-pane fade" id="email">
    <form action="{{route('admin.email.settings', $setting->id)}}" method="POST"
          class="form-validate-jquery" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Mail Driver:</label>
            <select name="mail_driver" id="mail_driver" class="select form-control">
                <option value="smtp" selected="selected">SMTP</option>
                <option value="mail">Mail</option>
                <option value="sendmail">SendMail</option>
                <option value="mailgun">MailGun</option>
                <option value="mandrill">Mandrill</option>
                <option value="ses">Amazon SES</option>
                <option value="sparkpost">Sparkpost</option>
            </select>
        </div>
        <div class="form-group">
            <label>SMTP Protocol:</label>
            <input type="text" class="form-control" placeholder="mail.smtp2go.com"
                   name="smtp_protocol" value="{{ $setting->smtp_protocol }}">
        </div>
        <div class="form-group">
            <label>SMPT Username:</label>
            <input type="text" class="form-control" placeholder="info@example.com"
                   name="smtp_username" value="{{ $setting->smtp_username }}">
        </div>
        <div class="form-group">
            <label>SMTP Password:</label>
            <input type="text" class="form-control" placeholder="12345" name="smtp_password"
                   value="{{ $setting->smtp_password }}">
        </div>
        <div class="form-group">
            <label>SMTP Port:</label>
            <input type="text" class="form-control" placeholder="12345" name="smtp_port"
                   value="{{ $setting->smtp_port }}">
        </div>
        <div class="form-group">
            <label>SMTP Security:</label>
            <input type="text" class="form-control" placeholder="tls" name="smtp_security"
                   value="{{ $setting->smtp_security }}">
        </div>
        <fieldset>
            <legend>SendMail - Pretend Settings:</legend>
            <div class="form-group ">
                <label for="mail_sendmail" class="bold">Mail Sendmail</label>
                <input class="form-control" id="mail_sendmail" placeholder="Mail Sendmail"
                       name="mail_sendmail" type="text" value="/usr/sbin/sendmail -bs">

            </div>
            <div class="form-group ">
                <label for="mail_pretend" class="bold">Mail Pretend</label>
                <input class="form-control" id="mail_pretend" placeholder="Mail Pretend"
                       name="mail_pretend" type="text" value="true">
            </div>
        </fieldset>
        <fieldset>
            <legend>MailGun Settings:</legend>
            <div class="form-group ">
                <label for="mailgun_domain" class="bold">Mailgun Domain</label>
                <input class="form-control" id="mailgun_domain" placeholder="Mailgun Domain"
                       name="mailgun_domain" type="text" value="your-mailgun-domain">

            </div>
            <div class="form-group ">
                <label for="mailgun_secret" class="bold">Mailgun Secret</label>
                <input class="form-control" id="mailgun_secret" placeholder="Mailgun Secret"
                       name="mailgun_secret" type="text" value="your-mailgun-secret">

            </div>
        </fieldset>
        <fieldset>
            <legend>Mandrill Settings:</legend>
            <div class="form-group ">
                <label for="mandrill_secret" class="bold">Mandrill Secret</label>
                <input class="form-control" id="mandrill_secret" placeholder="Mandrill Secret"
                       name="mandrill_secret" type="text" value="your-mandrill-secret">

            </div>
        </fieldset>
        <fieldset>
            <legend>Sparkpost Settings:</legend>
            <div class="form-group ">
                <label for="sparkpost_secret" class="bold">Sparkpost Secret</label>
                <input class="form-control" id="sparkpost_secret" placeholder="Sparkpost Secret"
                       name="sparkpost_secret" type="text" value="your-sparkpost-secret">

            </div>
        </fieldset>
        <fieldset>
            <legend>AMAZON SES Settings:</legend>
            <div class="form-group ">
                <label for="ses_key" class="bold">SES Key</label>
                <input class="form-control" id="ses_key" placeholder="SES Key" name="ses_key"
                       type="text" value="your-ses-key">

            </div>

            <div class="form-group ">
                <label for="ses_secret" class="bold">SES Secret</label>
                <input class="form-control" id="ses_secret" placeholder="SES Secret"
                       name="ses_secret" type="text" value="your-ses-secret">

            </div>
            <div class="form-group ">
                <label for="ses_region" class="bold">SES Region</label>
                <input class="form-control" id="ses_region" placeholder="SES Region"
                       name="ses_region" type="text" value="your-ses-region">

            </div>
        </fieldset>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">Update <i
                    class="icon-paperplane ml-2"></i></button>
        </div>
    </form>
</div>
