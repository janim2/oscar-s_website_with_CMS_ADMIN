<?php
  require_once 'partials/header.php'; 
  require_once 'database/config.php';
  require_once 'helpers/functions.php';
  require_once 'helpers/constants.php'; 


  $ref = $_GET['bb_ref'];

  $query = "SELECT * FROM books WHERE id = :id";
  $statement = $con->prepare($query);

  $statement->execute(
    array(
      ":id" => $ref
    )
  );

  $count = $statement->rowCount();
  $result = $statement->fetch();
?>

<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="books.php">Books</a>
        </li>

        <li class="breadcrumb-item active">Edit Book</li>
      </ol>
    </nav>

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Edit - </span> <?= $result['title'];?></h4>

    <!-- Horizontal -->
    <div class="row mb-5">
      <div class="col-md-12">
        <div class="card mb-3">
          <div class="row g-0">
            <div class="col-md-4">
              <img class="card-img card-img-left" src="<?=$book_images_url.fetchFirstBookImage($con, $result['id'])?>" style="object-fit: contain" alt="Card image" />
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <!-- <h5 class="card-title">Book Name</h5> -->
                <!-- <p class="card-text">
                            This is a wider card with supporting text below as a natural lead-in to additional content.
                            This content is a little bit longer.
                          </p> -->
                <div class="card mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><?= $result['title']?></h5>
                    <small class="text-muted float-end"><button type="button" class="btn rounded-pill btn-danger"
                        data-bs-toggle="modal" data-bs-target="#delete_modal">
                        <span class="tf-icons bx bx-trash"></span>
                      </button></small>
                  </div>
                  <div class="card-body">
                    <form id="edit_book_form">
                      <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-fullname">Title</label>
                        <input type="text" id="title" name="title" class="form-control" placeholder="Enter Title" value="<?= $result['title']?>" required/>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-company">Change Featured Image</label>
                        <input class="form-control" type="file" id="formFile" />
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-email">Description</label>
                        <textarea class="form-control" aria-label="With textarea" placeholder="Comment" id="description" name="description" required><?= $result['description']?></textarea>

                        <div class="form-text">Min 100 words</div>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-phone">Amazon link</label>
                        <input class="form-control" type="text" value="<?= $result['amazon_link']?>" id="link" name="link" />
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-phone">Date</label>
                        <input class="form-control" type="date" value="<?= $result['date_published']?>" id="date_published" name="date_published" />
                      </div>

                      <button type="submit" class="btn btn-primary loading">Update</button>
                    </form>
                  </div>
                </div>
                <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Horizontal -->
  </div>
  <!-- / Content -->

  <?php include_once 'includes/_delete.php'; ?>
  <?php require_once 'partials/footer.php'; ?>

  <script>
    saveId('oscar_portfolio_book_id', '<?= $ref; ?>');

    $(document).on('submit', '#edit_book_form', function (event) {
      event.preventDefault();
      submitFormQuery(this, "database/Book/edit_book.php", ".loading", "Book Editted Successfully", false);
    });

    //delete
    function _delete() {
      deleteItemQuery("database/Book/delete_book.php", ".loading", "Book Deleted Successfully", true);
    }
  </script>