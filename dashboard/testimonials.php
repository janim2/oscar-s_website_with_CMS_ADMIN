<?php
  require_once 'partials/header.php'; 
  require_once 'database/config.php';
  require_once 'helpers/functions.php';
  require_once 'helpers/constants.php';

  $i = 1;

  $query = "SELECT * FROM testimony";
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
      <div class="col-md-9">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.html">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="appointments.html">Appointments</a>
            </li>
            <li class="breadcrumb-item">
              <a href="blogs.html">Blogs</a>
            </li>
            <li class="breadcrumb-item">
              <a href="books.html">Books</a>
            </li>
            <li class="breadcrumb-item active">Testimonials</li>
          </ol>
        </nav>
      </div>
      <div class="col-md-3">
        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
          data-bs-target="#add_testimonial">
          <span class="tf-icons bx bx-plus"></span>&nbsp; New Testimonial
        </button>
      </div>
    </div>
    <div style="margin-bottom: 20px"></div>

    <div class="row mb-5">

      <?php
      
          if($count > 0){
            foreach($result as $results){
              ?>
              <div class="col-md-6 col-lg-4 mb-3">
                <div class="card">
                  <h5 class="card-header">#<?= $i; ?></h5>
                  <div class="card-body">
                    <blockquote class="blockquote mb-0">
                      <p>
                      <?= strlen($results['testimony']) <= 210 ? $results['testimony']  : substr($results['testimony'] , 0, 210) . "...";?>
                      </p>
                      <img src="<?=$speaker_images_url.fetchFirstSpeakerImage($con, $results['id'])?>" class="rounded-circle" alt="No image" height="100" width="100"> 
                      <br>
                      <footer class="blockquote-footer mt-2">
                        <?= $results['speaker']; ?>
                        <cite title="Source Title">(<?= $results['position']; ?>)</cite>
                        <div class="card-body">
                          <button type="button" class="btn rounded-pill btn-primary" data-bs-toggle="offcanvas"
                            data-bs-target="#description_modal" aria-controls="offcanvasScroll" onclick="display_in_slider(<?= $results['id']; ?>)">
                            <span class="iconify" data-icon="akar-icons:eye-open"></span> </button>
                          <button type="button" class="btn rounded-pill btn-secondary"
                            onclick="location.href='edit_testimony.php?t_ref=<?= $results['id'];?>'">
                            <span class="tf-icons bx bx-edit"></span>
                          </button>
                          <button type="button" class="btn rounded-pill btn-danger" data-bs-toggle="modal"
                            data-bs-target="#delete_modal" onclick="saveId('oscar_portfolio_testimony_id', <?= $results['id']; ?>)">
                            <span class="tf-icons bx bx-trash"></span>
                          </button>
                        </div>
                      </footer>
                    </blockquote>
                  </div>
                </div>
              </div>
          <?php
          $i++;
          }
        }
      ?>

    </div>
    <!--/ Content types -->
  </div>
  <!-- / Content -->

  <!-- add testimonial modal -->
  <?php include_once 'includes/Testimony/_add_testimony.php'; ?>
  <?php include_once 'includes/_delete.php'; ?>
  <?php include_once 'includes/_slide_in_view.php'; ?>

  <?php
    require_once 'partials/footer.php'; 
  ?>

<script>    
    $(document).on('submit', '#testimony_form', function (event) {
      event.preventDefault();
      submitFormQuery(this, "database/Testimony/add_testimony.php", ".loading", "Testimony Added Successfully", false);
    });

    function display_in_slider(id){
      // console.log("checking");
      FetchItemQuery("database/Testimony/fetch_testimony.php", id);
    }

    function _delete(){
      deleteItemQuery("database/Testimony/delete_testimony.php", ".loading", "Testimony Deleted Successfully");
    }
</script>