<!DOCTYPE html>
<html lang="en" >
   <!-- Head -->
   <?php include 'include/head.php';?>
   <!-- /Head -->
   <body data-ng-app="myWebApp" data-ng-controller="HostelController">
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
              <div ng-show="activeHostelView=='none'">
                <?php include 'sub/administration/hostel/dash.php'; ?>
              </div>
              <!-- /Dashboard -->
              <!-- Hostel -->
              <div ng-show="activeHostelView=='ho'">
                <?php include 'sub/administration/hostel/hostels.php'; ?>
              </div>
              <!-- /Hostel -->
              <!-- Rooms -->
              <div ng-show="activeHostelView=='ro'">
                <?php include 'sub/administration/hostel/rooms.php'; ?>
              </div>
              <!-- /Rooms -->
              <!-- Room Allocation Category -->
              <div ng-show="activeHostelView=='ra'">
                <?php include 'sub/administration/hostel/roomAllocation.php'; ?>
              </div>
              <!-- /Room Allocation Category -->
              <!-- reports Details -->
              <div ng-show="activeHostelView=='re'">
                <?php include 'sub/administration/hostel/reports.php'; ?>
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
