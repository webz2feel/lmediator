<div class="form-group">
    <label>Name:</label>
    <input type="text" class="form-control" placeholder="Category name" name="name" id="name">
</div>
<div class="form-group">
    <label>Slug:</label>
    <input type="text" class="form-control" placeholder="Category slug" name="slug" id="slug">
</div>
<div class="form-group">
    <label>Parent Category <span class="text-muted">(optional)</span>:</label>
    <select class="form-control select" data-fouc name="status">
        <option value=""></option>
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label>Short Description:</label>
    <textarea rows="5" cols="5" class="form-control" placeholder="Enter your message here" name="description" id="description"></textarea>
</div>
<div class="form-group">
    <div class="form-check form-check-inline">
        <label class="form-check-label">
            <input id="status" type="checkbox" name="status" class="form-input-styled" data-fouc>
            Active
        </label>
    </div>
</div>
<div class="text-right">
    <a href="{{route('admin.user.index')}}" class="btn btn-default">Back</a>
    <button type="submit" class="btn btn-primary">Submit <i
            class="icon-paperplane ml-2"></i>
    </button>
</div>
