@csrf
<div class="row">
    <div class="col-md-6">
        <fieldset>
            <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Personal details</legend>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>First name:</label>
                        <input type="text" placeholder="First name" class="form-control required" name="first_name" value="{{old('first_name', $user->first_name)}}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Last name:</label>
                        <input type="text" placeholder="Last name" class="form-control required" name="last_name" value="{{old('last_name', $user->last_name)}}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="text" placeholder="example@yahoo.com" class="form-control required" name="email" value="{{old('email', $user->email)}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Password:</label>
                        <input type="password" class="form-control" placeholder="Strong password" name="password">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="d-block">Status:</label>

                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-input-styled" name="is_active" value="1" {{ old('is_active') == '1' ? 'checked' : '' }} {{$user->is_active ? 'checked' : ''}} data-fouc>
                                Active
                            </label>
                        </div>

                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-input-styled" name="is_active" value="0" {{ old('is_active') == '0'  ? 'checked' : '' }} {{!$user->is_active ? 'checked' : ''}} data-fouc>
                                In-active
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
    </div>
    <div class="col-md-6">
        <fieldset>
            <legend class="font-weight-semibold"><i class="icon-lock5 mr-2"></i> Access details</legend>
            <div class="form-group">
                <label class="d-block">Roles:</label>
                @if($roles->count())
                    @foreach($roles as $role)
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-input-styled" name="roles[]" value="{{ $role->id }}" {{ is_array(old('roles')) ? (in_array($role->id, old('roles')) ? 'checked' : '') : (in_array($role->id, $userRoles) ? 'checked' : '') }} data-fouc>
                                {{ $role->name }}
                            </label>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                <label>Permissions:</label>
                <select name="permissions[]" multiple="multiple" class="form-control form-control-select2" data-placeholder="Select permissions" data-fouc>
                    @if($permissions)
                        @foreach($permissions as $perm)
                            <option value="{{$perm->id}}" {{ is_array(old('permissions')) ? (in_array($perm->id, old('permissions')) ? 'selected' : '') : (in_array($perm->id, $userPermissions) ? 'selected' : '') }}>{{$perm->name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </fieldset>
    </div>
</div>
