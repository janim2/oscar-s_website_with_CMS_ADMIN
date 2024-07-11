<?php
  require_once 'partials/header.php'; 
  require_once 'database/config.php';
  require_once 'helpers/functions.php';
  require_once 'helpers/constants.php';

  $query = "SELECT * FROM books";
  $statement = $con->prepare($query);

  $statement->execute();

  $count = $statement->rowCount();
  $result = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-md-10">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="appointments.php">Appointments</a>
            </li>
            <li class="breadcrumb-item">
              <a href="blogs.php">Blogs</a>
            </li>
            <li class="breadcrumb-item active">Books</li>
          </ol>
        </nav>
      </div>
      <div class="col-md-2">
        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#add_book">
          <span class="tf-icons bx bx-plus"></span>&nbsp; New Book
        </button>
      </div>
    </div>

    <div style="margin-bottom: 20px">
      
    </div>

    <div class="row mb-5">
      <?php
        if($count > 0){
          foreach($result as $results){?>
            <div class="col-md-6 col-lg-4">
              <div class="card">
                <img class="card-img-top" src="<?=$book_images_url.fetchFirstBookImage($con, $results['id'])?>" alt="Card image cap" />
                <div class="card-body">
                  <h5 class="card-title"><?= $results['title']; ?></h5>
                  <p class="card-text"><?= strlen($results['description']) <= 210 ? $results['description']  : substr($results['description'] , 0, 210) . "...";?></p>
                </div>

                <div class="card-body text-center">
                  <button type="button" class="btn rounded-pill btn-primary" data-bs-toggle="offcanvas"
                    data-bs-target="#description_modal" aria-controls="offcanvasScroll" onclick="display_in_slider(<?= $results['id']?>)">
                    <span class="iconify" data-icon="akar-icons:eye-open"></span> </button>
                  <button type="button" class="btn rounded-pill btn-secondary" onclick="location.href='edit_book.php?bb_ref=<?= $results['id']?>'">
                    <span class="tf-icons bx bx-edit"></span>
                  </button>
                  <button type="button" class="btn rounded-pill btn-danger" data-bs-toggle="modal"
                    data-bs-target="#delete_modal" onclick="saveId('oscar_portfolio_book_id', <?= $results['id']; ?>)">
                    <span class="tf-icons bx bx-trash"></span>
                  </button>
                </div>
              </div>
            </div>
      <?php
        }
      }
      ?>
    </div>
  </div>
  <!-- / Content -->

  <?php include_once 'includes/Books/_add_book.php'; ?>
  <?php include_once 'includes/_delete.php'; ?>
  <?php include_once 'includes/_slide_in_view.php'; ?>

  <?php
    require_once 'partials/footer.php'; 
  ?>

<script>    
    $(document).on('submit', '#add_book_form', function (event) {
      event.preventDefault();
      submitFormQuery(this, "database/Book/add_book.php", ".loading", "Book Added Successfully", false);
    });

    function display_in_slider(id){
      // console.log("checking");
      FetchItemQuery("database/Book/fetch_book.php", id);
    }

    function _delete(){
      deleteItemQuery("database/Book/delete_book.php", ".loading", "Book Deleted Successfully");
    }
</script>