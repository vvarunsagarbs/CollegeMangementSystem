<!DOCTYPE html>
<html lang="en" >
   <!-- Head -->
   <?php include 'include/head.php';?>
   <!-- /Head -->
   <body data-ng-app="myWebApp" data-ng-controller="AuditController">
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
              <div ng-show="activeAuditView=='none'">
                <?php include 'sub/dataReports/audit/dash.php'; ?>
              </div>
              <!-- /Dashboard -->
              <!-- Hostel -->
              <div ng-show="activeAuditView=='acau'">
                <?php include 'sub/dataReports/audit/activityAudit.php'; ?>
              </div>
              <!-- /Hostel -->
              <!-- Rooms -->
              <div ng-show="activeAuditView=='usau'">
                <?php include 'sub/dataReports/audit/userAudit.php'; ?>
              </div>
              <!-- /Rooms -->
              <!-- Rooms -->
              <div ng-show="activeAuditView=='daau'">
                <?php include 'sub/dataReports/audit/dataAudit.php'; ?>
              </div>
              <!-- /Rooms -->
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
