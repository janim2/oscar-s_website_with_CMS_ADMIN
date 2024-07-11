<!-- Book Modal 1-->
<div class="modal fade" id="logout_modal" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalToggleLabel">Logout</h5>
                <button type="button close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Are you sure you want to Logout?</div>
            <div class="modal-footer">
                <button class="btn btn-danger" onclick="Logout()">
                    Logout
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
        <div class="mb-2 mb-md-0">
            ©
            <script>
                document.write(new Date().getFullYear());
            </script>
            <a href="https://tek-devisal.com" target="_blank" class="footer-link fw-bolder">Tek-Devisal</a>
        </div>
        <!-- <div>
            <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
            <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

            <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/" target="_blank"
                class="footer-link me-4">Documentation</a>

            <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues" target="_blank"
                class="footer-link me-4">Support</a>
        </div> -->
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
    <a href="#" data-bs-toggle="modal" style="cursor: pointer;" data-bs-target="#logout_modal"
        class="btn btn-danger btn-buy-now logout">Logout</a>
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
<script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

<!-- Main JS -->
<script src="../assets/js/main.js"></script>

<!-- Alerts JS -->
<!-- <script src="../assets/js/ui-toasts.js"></script> -->

<!-- Page JS -->
<script src="../assets/js/dashboards-analytics.js"></script>

<!-- icons from iconify -->
<script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- swall alert starts here -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->

<script src="sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>

<script src="sweetalert2.min.js"></script>
<!-- swal ends here -->

<!-- //script to help me with the ajax functions -->
<script src="helpers/submittion_helper.js"></script>

<!-- all my custom js helpers -->
<script src="helpers/js_helpers.js"></script>

<script>
    function Logout() {
        submitQuery("database/Account/logout.php", ".logout", "Logout Successful", true);
    }
</script>
</body>

</html>