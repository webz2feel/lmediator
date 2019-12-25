<div id="options_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="#" method="post" id="category-form">
            <div class="modal-body">
                <div id="form_result"></div>
                    @csrf
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control" placeholder="Category name" name="name">
                    </div>

                    <div class="form-group">
                        <label>Slug:</label>
                        <input type="text" class="form-control" placeholder="Category slug" name="slug">
                    </div>
                    <div class="form-group">
                        <label>Short Description:</label>
                        <textarea rows="5" cols="5" class="form-control" placeholder="Enter your message here" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input type="checkbox" name="status" class="form-input-styled" checked data-fouc>
                                Active
                            </label>
                        </div>
                    </div>
                    <input type="hidden" id="action">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
