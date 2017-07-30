<!DOCTYPE html>
<html lang="en" >
   <!-- Head -->
   <?php include 'include/head.php';?>
   <!-- /Head -->
   <body data-ng-app="myWebApp" data-ng-controller="OnlinePaymentController">
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
              <div ng-show="activeOnlinePaymentView=='none'">
                <?php include 'sub/administration/onlinePayment/dash.php'; ?>
              </div>
              <!-- /Dashboard -->
              <!-- Hostel -->
              <div ng-show="activeOnlinePaymentView=='ops'">
                <?php include 'sub/administration/onlinePayment/settings.php'; ?>
              </div>
              <!-- /Hostel -->
              <!-- Rooms -->
              <div ng-show="activeOnlinePaymentView=='opt'">
                <?php include 'sub/administration/onlinePayment/transaction.php'; ?>
              </div>
              <!-- /Rooms -->
              <!-- Room Allocation Category -->
              <div ng-show="activeOnlinePaymentView=='cg'">
                <?php include 'sub/administration/onlinePayment/customGateways.php'; ?>
              </div>
              <!-- /Room Allocation Category -->
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
