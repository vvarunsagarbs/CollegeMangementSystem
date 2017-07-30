<!DOCTYPE html>
<html lang="en" >
   <!-- Head -->
   <?php include 'include/head.php';?>
   <!-- /Head -->
   <body data-ng-app="myWebApp" data-ng-controller="SettingsController">
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
              <div ng-show="activeSettingsView=='none'">
                <?php include 'sub/administration/settings/dash.php'; ?>
              </div>
              <!-- /Dashboard -->
              <!-- Manage Course -->
              <div ng-show="activeSettingsView=='mcb'">
                <?php include 'sub/administration/settings/manageCourseBatch.php'; ?>
              </div>
              <!-- /Manage Course -->
              <!-- Manage Subjects -->
              <div ng-show="activeSettingsView=='ms'">
                <?php include 'sub/administration/settings/manageSubjects.php'; ?>
              </div>
              <!-- /Manage Subjects -->
              <!-- Manage Student Category -->
              <div ng-show="activeSettingsView=='msc'">
                <?php include 'sub/administration/settings/manageStudentCategory.php'; ?>
              </div>
              <!-- /Manage Student Category -->
              <!-- Additional Admission Details -->
              <div ng-show="activeSettingsView=='aaad'">
                <?php include 'sub/administration/settings/additionalAdmissionDetails.php'; ?>
              </div>
              <!-- /Additional Admission Details -->
              <!-- SMS Module -->
              <div ng-show="activeSettingsView=='sms'">
                <?php include 'sub/administration/settings/smsModule.php'; ?>
              </div>
              <!-- /SMS Module -->
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
