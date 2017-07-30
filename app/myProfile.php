<!DOCTYPE html>
<html lang="en" >
   <!-- Head -->
   <?php include 'include/head.php';?>
   <!-- /Head -->
   <body data-ng-app="myWebApp" data-ng-controller="ProfileController">
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
                    <a ng-click="setActiveAttendanceView('none')"><li style="display:inline">My Profile</li></a>
                  </ul>
                </div>
                <div id="pageBackground" class="row center">
                  <div class = "row">
                    <div class="col-md-9 col-md-offset-1" style="background-color:white">
                      <div class="row">
                        <div class="col-md-2">
                          <img src="img/a0.jpg" alt="profilePic" style="border-radius:50%;width:100%;"/>
                        </div>
                        <div class="col-md-8 pad-10" style="text-align:left;">
                          <p>{{profile.name}}</p>
                          <p>ID: {{profile.id}}</p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-10 col-md-offset-2">
                          <div class="container-fluid" id="profileInfo">
                            <div class="row">
                              <div class="col-md-4">
                                Joining Date
                              </div>
                              <div class="col-md-8">
                                {{profile.joiningDate}}
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                Department
                              </div>
                              <div class="col-md-8">
                                {{profile.department}}
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                Category
                              </div>
                              <div class="col-md-8">
                                {{profile.category}}
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                Position
                              </div>
                              <div class="col-md-8">
                                {{profile.position}}
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                Grade
                              </div>
                              <div class="col-md-8">
                                {{profile.grade}}
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                Job Title
                              </div>
                              <div class="col-md-8">
                                {{profile.jobTitle}}
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                Gender
                              </div>
                              <div class="col-md-8">
                                {{profile.gender}}
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                Email
                              </div>
                              <div class="col-md-8">
                                {{profile.email}}
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                Status
                              </div>
                              <div class="col-md-8">
                                {{profile.status}}
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                Qualification
                              </div>
                              <div class="col-md-8">
                                {{profile.qualification}}
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                Total Experience
                              </div>
                              <div class="col-md-8">
                                {{profile.totalExperience}}
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                Experience Info
                              </div>
                              <div class="col-md-8">
                                {{profile.experienceInfo}}
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                Biometric ID
                              </div>
                              <div class="col-md-8">
                                {{profile.biometricID}}
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
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
