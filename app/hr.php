<!DOCTYPE html>
<html lang="en" >
   <!-- Head -->
   <?php include 'include/head.php';?>
   <!-- /Head -->
   <body data-ng-app="myWebApp" data-ng-controller="HRController">
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
              <div ng-show="activeHRView=='none'">
                <?php include 'sub/administration/hr/dash.php'; ?>
              </div>
              <!-- /Dashboard -->
              <!-- Hostel -->
              <div ng-show="activeHRView=='hrs'">
                <?php include 'sub/administration/hr/humanResourceSettings.php'; ?>
              </div>
              <!-- /Hostel -->
              <!-- Rooms -->
              <div ng-show="activeHRView=='em'">
                <?php include 'sub/administration/hr/employeeManagement.php'; ?>
              </div>
              <!-- /Rooms -->
              <!-- Room Allocation Category -->
              <div ng-show="activeHRView=='elm'">
                <?php include 'sub/administration/hr/employeeLeaveManagement.php'; ?>
              </div>
              <!-- /Room Allocation Category -->
              <!-- reports Details -->
              <div ng-show="activeHRView=='es'">
                <?php include 'sub/administration/hr/employeeSearch.php'; ?>
              </div>
              <!-- /reports Details -->
              <!-- reports Details -->
              <div ng-show="activeHRView=='ppm'">
                <?php include 'sub/administration/hr/payrollAndPayslipManagement.php'; ?>
              </div>
              <!-- /reports Details -->
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
