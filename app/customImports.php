<!DOCTYPE html>
<html lang="en" >
   <!-- Head -->
   <?php include 'include/head.php';?>
   <!-- /Head -->
   <body data-ng-app="myWebApp" data-ng-controller="CustomImportsController">
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
                    <a ng-click="setActiveReportsView('none')"><li style="display:inline">Custom Imports</li></a>
                  </ul>
                </div>
                <div class = "row">
                  <div class="col-md-10 col-md-offset-1 pad-10" style="box-shadow:0px 2px 4px grey;background-color:white;">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Sl.no</th>
                          <th>Name</th>
                          <th>Model</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="detail in customImportList">
                          <td>{{$index+1}}</td>
                          <td>{{detail.name}}</td>
                          <td>{{detail.model}}</td>
                          <td><a ng-click="JSONToCSVConvertor(customImportList,'Custom Data','CustomData')">Export CSV</a> | <a ng-click="viewImportDataOption = 'true'">Import Data</a> | <a>Delete</a> | <a>Imports</a></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="row pad-10" ng-show="viewImportDataOption == 'true'">
                  <div class="col-md-6 col-md-offset-3 pad-10">
                    <md-content>
                      <div class="col-md-6 pad-20">
                        Import Data
                      </div>
                      <div class="col-md-6">
                        <md-input-container>
                          <input ng-model="user.email" type="file">
                        </md-input-container>
                      </div>
                    </md-content>
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
