  <!-- add blog modal -->
  <div class="modal fade" id="add_book" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <form id="add_book_form">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel1">New Book</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <div class="row">
                          <div class="col mb-3">
                              <label for="nameBasic" class="form-label">Title</label>
                              <input type="text" id="title" name="title" class="form-control" placeholder="Enter Title"
                                  required />
                          </div>
                      </div>
                      <div class="row">
                          <div class="col mb-3">
                              <label for="nameBasic" class="form-label">Featured Image</label>
                              <input class="form-control" type="file" name="files[]" multiple required/>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col mb-3">
                              <label for="nameBasic" class="form-label">Description</label>
                              <textarea class="form-control" aria-label="With textarea" placeholder="Comment"
                                  id="description" name="description" required></textarea>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col mb-3">
                              <label for="nameBasic" class="form-label">Amazon link</label>
                              <input class="form-control" type="text" id="link" name="link"
                                  required />
                          </div>
                      </div>

                      <div class="row">
                          <div class="col mb-3">
                              <label for="nameBasic" class="form-label">Date Published</label>
                              <input class="form-control" type="date" id="date_published" name="date_published"
                                  required />
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

              <form>
      </div>
  </div>