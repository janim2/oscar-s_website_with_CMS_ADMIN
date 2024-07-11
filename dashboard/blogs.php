<?php
  require_once 'partials/header.php'; 
  require_once 'database/config.php';
  require_once 'helpers/functions.php';
  require_once 'helpers/constants.php';

  $query = "SELECT * FROM blogs";
  $statement = $con->prepare($query);

  $statement->execute();

  $count = $statement->rowCount();
  $result = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->

  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
        <div class="col-md-10">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="index.html">Dashboard</a>
              </li>
              <li class="breadcrumb-item">
                <a href="appointments.html">Appointments</a>
              </li>
              <li class="breadcrumb-item active">Blogs</li>
            </ol>
          </nav>
        </div>
        <div class="col-md-2">
          <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#add_blog">
            <span class="tf-icons bx bx-plus"></span>&nbsp; New Post
          </button>
        </div>
      </div>

      <!-- Examples -->
      <div class="row mb-5">
        <div style="margin-bottom: 20px"></div>
        <?php
          if($count > 0){
            foreach($result as $results){?>
              <div class="col-md-6 col-lg-4 mb-3">
                <div class="card h-100">
                  <div class="card-body">
                    <h5 class="card-title"><?= $results['title']; ?></h5>
                      <span class="badge bg-label-primary">Inspiration</span>
                    <!-- <span class="badge bg-label-primary">Family</span>
                    <span class="badge bg-label-primary">Fishes</span> -->
                    <!-- <h6 class="card-subtitle text-muted">Support card subtitle</h6> -->
                  </div>  
                  <img class="img-fluid" src="<?=$blog_images_url.fetchFirstBlogImage($con, $results['id'])?>" alt="Card image cap" />

                  <div class="card-body">
                    <!-- <span class="badge bg-success">Comments enabled</span> -->

                    <span class="badge <?= $results['show_comments'] == 0 ? 'bg-danger' : 'bg-success'?>">Comments <?= $results['show_comments'] == 0 ? 'disabled' : 'enabled'?></span>

                    <p class="card-text"><?= strlen($results['content']) <= 210 ? $results['content']  : substr($results['content'] , 0, 210) . "...";?></p>
                    <div class="text-center">
                      <button type="button" class="btn rounded-pill btn-primary" data-bs-toggle="offcanvas"
                    data-bs-target="#description_modal" aria-controls="offcanvasScroll" onclick="display_in_slider(<?= $results['id']; ?>)">
                        <span class="iconify" data-icon="akar-icons:eye-open"></span> </button>
                      <button type="button" class="btn rounded-pill btn-secondary" onclick="location.href='edit_blog.php?ref=<?= $results['id']; ?>'">
                        <span class="tf-icons bx bx-edit"></span>
                      </button>
                      <button type="button" class="btn rounded-pill btn-danger" data-bs-toggle="modal"
                    data-bs-target="#delete_modal" onclick="saveId('oscar_portfolio_blog_id', <?= $results['id']; ?>)">
                        <span class="tf-icons bx bx-trash"></span>
                      </button>
                    </div>

                  </div>
                </div>
              </div>
        <?php
            }
          }
        ?>
      </div>

    </div>
    <!--/ Card layout -->
  </div>
  <!-- / Content -->
  
  <?php include_once 'includes/Blog/_add_blog.php'; ?>
  <?php include_once 'includes/_delete.php'; ?>
  <?php include_once 'includes/_slide_in_view.php'; ?>


<?php
  require_once 'partials/footer.php'; 
?>

<script>    
    $(document).on('submit', '#add_blog_form', function (event) {
      event.preventDefault();
      submitFormQuery(this, "database/Blog/add_blog.php", ".loading", "Blog Post Added Successfully", false);
    });

    function display_in_slider(id){
      // console.log("checking");
      FetchItemQuery("database/Blog/fetch_blog.php", id);
    }

    //delete
    function _delete(){
      deleteItemQuery("database/Blog/delete_blog.php", ".loading", "Post Deleted Successfully");
    }
</script>