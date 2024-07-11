<?php
  require_once 'partials/header.php'; 
  require_once 'database/config.php';
  require_once 'helpers/functions.php';

  $i = 1;
  $query = "SELECT * FROM appointments";
  $statement = $con->prepare($query);

  $statement->execute();

  $count = $statement->rowCount();
  $result = $statement->fetchAll(PDO::FETCH_ASSOC);
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
        <li class="breadcrumb-item active">Apointment</li>
      </ol>
    </nav>

    <!-- Basic Bootstrap Table -->
    <div class="card">
      <h5 class="card-header">Your Appointments</h5>

      <div class="table-responsive text-nowrap">
        <table class="table">
          <?php
            if($count > 0){?>
          <thead>
            <tr>
              <th>S/N</th>
              <th>Apointment Status</th>
              <th>Full Name</th>
              <th>Email</th>
              <th>Phone Number</th>
              <th>Date</th>
              <!-- <th>Actions</th> -->
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            <?php
                foreach($result as $results){?>
                  <tr>
                    <td><?= $i; ?></td>
                    <td>
                      <span class="badge <?= verifyDate($results['date']) == 0 ? 'bg-label-primary' : 'bg-label-danger' ?>"><?= verifyDate($results['date']) ? 'Past' : 'Upcoming' ?></span>
                    </td>

                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?= $results['fullname']; ?></strong></td>
                    <td><?= $results['email']; ?></td>

                    <td><?= $results['phonenumber']?></td>
                    <td><?= dateFormat($results['date']); ?></td>
                    <!-- <td class="text-center">
                      <div class="demo-inline-spacing">
                        <button type="button" class="btn rounded-pill btn-danger">
                          <span class="tf-icons bx bx-trash"></span>
                        </button>
                      </div>
                    </td> -->
                  </tr>
            <?php
            }  
            ?>
            
          </tbody>
          <?php
            }
          ?>

        </table>
      </div>
    </div>
    <!--/ Responsive Table -->
  </div>
  <!-- / Content -->

  <!-- Footer -->
  <footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
      <div class="mb-2 mb-md-0">
        ©
        <script>
          document.write(new Date().getFullYear());
        </script>
        <a href="https://tekdevisal.com" target="_blank" class="footer-link fw-bolder">Tek-Devisal</a>
      </div>
    </div>
  </footer>
  <!-- / Footer -->

  <div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->
<div class="buy-now">
  <a href="#" target="_blank" class="btn btn-danger btn-buy-now">Logout</a>
</div>

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="../assets/vendor/libs/jquery/jquery.js"></script>
<script src="../assets/vendor/libs/popper/popper.js"></script>
<script src="../assets/vendor/js/bootstrap.js"></script>
<script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="../assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->

<!-- Main JS -->
<script src="../assets/js/main.js"></script>

<!-- Page JS -->

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>