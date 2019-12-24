@csrf
<div class="form-group">
    <label>Name:</label>
    <input type="text" class="form-control" name="name" value="{{old('name', $role->name)}}" placeholder="Role name" required>
</div>
<div class="form-group">
    <label>Permissions:</label>
    <select name="permissions[]" multiple="multiple" class="form-control form-control-select2" data-fouc>
        @if($permissions)
            @foreach($permissions as $perm)
                <option value="{{$perm->id}}" {{ is_array(old('permissions')) ? (in_array($perm->id, old('permissions')) ? 'selected' : '') : (in_array($perm->id, $rolePermissions) ? 'selected' : '') }}>{{$perm->name}}</option>
            @endforeach
        @endif
    </select>
</div>
<div class="form-group">
    <label>Slug:</label>
    <input type="text" class="form-control" placeholder="Role slug here" name="slug" value="{{old('slug', $role->slug)}}" required>
</div>
