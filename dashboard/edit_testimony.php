<?php
  require_once 'partials/header.php'; 
  require_once 'database/config.php';
  require_once 'helpers/functions.php';

  $ref = $_GET['t_ref'];

  $query = "SELECT * FROM testimony WHERE id = :id";
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

    <div class="container-xxl flex-grow-1 container-p-y">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item">
            <a href="testimonials.php">Testimony</a>
          </li>

          <li class="breadcrumb-item active">Edit</li>
        </ol>
      </nav>

      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Testimony by - </span> <?= $result['speaker']; ?></h4>

      <!-- Basic Layout -->
      <div class="row">
        <div class="col-xl">
          <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="mb-0">Edit Testimony</h5>
              <small class="text-muted float-end">Default label</small>
            </div>
            <div class="card-body">
              <form id="edit_testimony_form">
                <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Testimony</label>
                  <textarea type="text" id="testimony" name="testimony" class="form-control" placeholder="Enter Testimony" required><?= $result['testimony']?></textarea>
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-default-company">Speaker</label>
                  <input type="text" id="speaker" name="speaker" class="form-control" placeholder="Enter Speaker" value="<?= $result['speaker']?>" required/>
                </div>
                <div class="mb-3">
                  <label class="form-label" for="basic-default-email">Position</label>
                  <input type="text" id="position" name="position" class="form-control" placeholder="Enter Position" value="<?= $result['position']?>" required/>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / Content -->
    <?php include_once 'includes/_delete.php'; ?>
    <?php require_once 'partials/footer.php'; ?>

<script>
  saveId('oscar_portfolio_testimony_id', '<?= $ref; ?>');

  $(document).on('submit', '#edit_testimony_form', function (event) {
    event.preventDefault();
    submitFormQuery(this, "database/Testimony/edit_testimony.php", ".loading", "Testimony Editted Successfully", false);
  });

  //delete
  function _delete() {
    deleteItemQuery("database/Testimony/delete_testimony.php", ".loading", "Testimony Deleted Successfully", true);
  }
</script>