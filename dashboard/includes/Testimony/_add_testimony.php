<div class="modal fade" id="add_testimonial" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="testimony_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">New Testimonial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Testimony</label>
                            <textarea class="form-control" aria-label="With textarea" placeholder="Testimony"
                                id="testimony" name="testimony" required></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Speaker</label>
                            <input type="text" id="speaker" name="speaker" class="form-control"
                                placeholder="Enter Speaker" required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Image of Speaker</label>
                            <input class="form-control" type="file" name="files[]" required />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Position</label>
                            <input type="text" id="position" name="position" class="form-control"
                                placeholder="Enter Position" required />
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary loading">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>