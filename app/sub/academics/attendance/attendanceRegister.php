<div class="container-fluid">
  <div class="row" id="pageHeader" style="background-color:#F6F8F8;color:#646565;font-size:18px;">
    <div class="col-md-2 pad-10">
      Hostel
    </div>
    <div class="col-md-10">
      <ul id="moduleSubMenu" class="customScroll">
        <a ng-repeat="menu in moduleSubMenu" ng-click="setActiveAttendanceView(menu.link)"><li>{{menu.title}}</li></a>
      </ul>
    </div>
  </div>
  <div id="BreadCrumb" data-ng-controller="ModuleController">
    <ul>
      <a href="index.php"><li style="display:inline">Home</li></a> >
      <a href="modules.php" data-ng-click="setActiveModulePage('ad')"><li style="display:inline">Academics</li></a> >
      <a ng-click="setActiveAttendanceView('none')"><li style="display:inline">Attendance</li></a> >
      <a><li style="display:inline">Attendance Register</li></a> >
    </ul>
  </div>
  <div class="col-md-8 col-md-offset-2">
    <md-content>
      <div class="container-fluid">
        <div class="row" style="padding:40px 20px 5px 20px">
          <div class="col-md-4">
            <p><b> Search </b></p>
          </div>
          <div class="col-md-4">
            <md-datepicker style="width:100%" ng-model="user.submissionDate"></md-datepicker>
          </div>
        </div>
        <div class="row" style="padding:5px 20px 10px 20px">
            <md-button class="md-primary md-raised pullRight">Save</md-button>
        </div>
      </div>
    </md-content>
  </div>
</div>
