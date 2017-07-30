<!DOCTYPE html>
<html lang="en" >
   <!-- Head -->
   <?php include 'include/head.php';?>
   <!-- /Head -->
   <body data-ng-app="myWebApp" data-ng-controller="HomeController">
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
              <div class="container-fluid">
                <div class="row" id="pageHeader" style="background-color:#F6F8F8;color:#646565;font-size:18px;">
                  <div class="col-md-2 pad-10">
                    Reports
                  </div>
                  <div class="col-md-10" data-ng-controller="ModuleController">
                    <ul id="moduleSubMenu" class="customScroll">
                      <a ng-repeat="menu in dataReportsCards" ng-click="setActiveReportsView(menu.link)"><li>{{menu.title}}</li></a>
                    </ul>
                  </div>
                </div>
                <div id="BreadCrumb" data-ng-controller="ModuleController">
                  <ul>
                    <a href="index.php"><li style="display:inline">Home</li></a> >
                    <a href="modules.php" data-ng-click="setActiveModulePage('dr')"><li style="display:inline">Data and Reports</li></a> >
                    <a ng-click="setActiveReportsView('none')"><li style="display:inline">Data Exports</li></a>
                  </ul>
                </div>
                <div class="row">
                  <div class="col-md-8 col-md-offset-1 pad-10" style="box-shadow:0px 2px 4px grey;background-color:white;">
                    <div class="row">
                      <div class="col-md-4">
                        <md-datepicker ng-model="startDate" md-placeholder="Start date" md-open-on-focus></md-datepicker>
                      </div>
                      <div class="col-md-4">
                        <md-datepicker ng-model="endDate" md-placeholder="End date" md-open-on-focus></md-datepicker>
                      </div>
                      <div class="col-md-4">
                        <md-button class="md-primary md-raised pullRight">Search</md-button>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-8 col-md-offset-1 pad-10 center" style="box-shadow:0px 2px 4px grey;background-color:yellow;">
                    No Exports Found
                  </div>
                </div>
              </div>
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
