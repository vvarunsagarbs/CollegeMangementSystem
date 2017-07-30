<!DOCTYPE html>
<html lang="en" >
   <!-- Head -->
   <?php include 'include/head.php';?>
   <!-- /Head -->
   <body data-ng-app="myWebApp" data-ng-controller="DisciplineController">
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
            <div class="col-md-10" style="background-color:#F0F3F4;margin:0px;padding:0px;" data-ng-controller="ModuleController">
              <div class="container-fluid">
                <div class="row" id="pageHeader" style="background-color:#F6F8F8;color:#646565;font-size:18px;">
                  <div class="col-md-2 pad-10">
                    Academics
                  </div>
                  <div class="col-md-10">
                    <ul id="moduleSubMenu" class="customScroll">
                      <a href="{{menu.link}}" ng-repeat="menu in academicsCards" ng-click="setActiveSettingsView(menu.link)"><li>{{menu.title}}</li></a>
                    </ul>
                  </div>
                </div>
                <div id="BreadCrumb" data-ng-controller="ModuleController">
                  <ul>
                    <a href="index.php"><li style="display:inline">Home</li></a> >
                    <a href="modules.php" data-ng-click="setActiveModulePage('ac')"><li style="display:inline">Academics</li></a> >
                    <a ng-click="setActiveAttendanceView('none')"><li style="display:inline">Discipline</li></a>
                  </ul>
                </div>
                <div id="pageBackground" class="row center">
                  <div class = "row">
                    <div class="col-md-9 col-md-offset-1 pad-10" style="box-shadow:0px 2px 4px grey;background-color:white;">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th class="center">Sl.no</th>
                            <th class="center">Title</th>
                            <th class="center">Complaint No</th>
                            <th class="center">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr ng-repeat="detail in complaints">
                            <td>{{$index+1}}</td>
                            <td>{{detail.title}}</td>
                            <td>{{detail.complaintNo}}</td>
                            <td><a>Edit</a> | <a>Delete</a></td>
                          </tr>
                        </tbody>
                        <a style="float:right" ng-click="JSONToCSVConvertor(complaints,'Complaints','Complaints')">DownloadReport</a>
                      </table>
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
