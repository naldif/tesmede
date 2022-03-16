<!DOCTYPE html>
<html>


<?= $this->include('layouts/head') ?>


<body class="fixed-left">

   
    <!-- Begin page -->
    <div id="wrapper">

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <?= $this->include('layouts/sidemenu') ?>
        </div>
        <!-- Left Sidebar End -->

        <!-- Start right Content here -->

        <div class="content-page">
            <!-- Start content -->
            <div class="content">
            <?= $this->include('layouts/topbar') ?>
            <?= $this->renderSection('content') ?>

            </div> <!-- content -->

            <footer class="footer">
                © 2018 Annex by Mannatthemes.
            </footer>

        </div>
        <!-- End Right content here -->

    </div>
    <!-- END wrapper -->

    <?= $this->include('layouts/js') ?>
 

</body>

</html>