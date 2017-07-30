<!DOCTYPE html>
<html lang="en" >
   <!-- Head -->
   <?php include 'include/head.php';?>
   <!-- /Head -->
   <body data-ng-app="myWebApp" data-ng-controller="ModuleController">
    <!-- NavBar -->
        <?php include 'include/navbar.php';?>
    <!-- /NavBar -->
    <!-- Content -->
        <div class="container-fluid">
          <div class="row" style="min-height:518px;display: -ms-flex; display: -webkit-flex; display: flex;">
            <!-- Side Navigation Bar -->
            <div class="col-md-2" style="background-color:#1C2B36;margin:0px;padding:0px;">
              <?php include 'include/sidebar.php'; ?>
            </div>
            <!-- Side Navigation Bar -->
            <!-- Main Content -->
            <div class="col-md-10" style="background-color:#F0F3F4;margin:0px;padding:0px;">
              <!-- Dashboard -->
              <div ng-show="activeModulesView=='none'">
                <?php include 'sub/modules/dash.php'; ?>
              </div>
              <!-- /Dashboard -->
              <!-- administration -->
              <div ng-show="activeModulesView=='ad'">
                <?php include 'sub/modules/administration.php'; ?>
              </div>
              <!-- /administration -->
              <!-- academics -->
              <div ng-show="activeModulesView=='ac'">
                <?php include 'sub/modules/academics.php'; ?>
              </div>
              <!-- /academics -->
              <!-- dataReports -->
              <div ng-show="activeModulesView=='dr'">
                <?php include 'sub/modules/dataReports.php'; ?>
              </div>
              <!-- /dataReports -->
              <!-- Utility -->
              <div ng-show="activeModulesView=='ut'">
                <?php include 'sub/modules/utility.php'; ?>
              </div>
              <!-- /Utility -->
            </div>
            <!-- /Main Content -->
          </div>
        </div>
    <!-- Content -->
    <!-- Footer -->
      <?php include 'include/footer.php'; ?>
    <!-- /Footer -->
   </body>
</html>
