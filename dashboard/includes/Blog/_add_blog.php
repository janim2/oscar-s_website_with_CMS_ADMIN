<!-- add blog modal -->
<div class="modal fade" id="add_blog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">New Blog Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="add_blog_form">
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Title</label>
                            <input type="text" id="title" name="title" class="form-control" placeholder="Enter Title" required/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Featured Image</label>
                            <input class="form-control" type="file" name="files[]" multiple required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Blog Content</label>
                            <textarea class="form-control" id="content" name="content" aria-label="With textarea"
                                placeholder="Comment" required></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="exampleFormControlSelect2" class="form-label">Tags</label>
                            <select multiple class="form-select" id="tags" name="tags"
                                aria-label="Multiple select example">
                                <!-- <option selected>Open this select menu</option> -->
                                <option value="1" selected>Inspiration</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-check form-switch mb-2">
                        <input class="form-check-input" type="checkbox" id="areCommentsAllowed"
                            name="areCommentsAllowed"/>
                        <label class="form-check-label" for="flexSwitchCheckChecked">Check to allow comments</label>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary loading">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>