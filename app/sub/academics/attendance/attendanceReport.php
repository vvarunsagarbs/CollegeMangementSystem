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
      <a href="modules.php" data-ng-click="setActiveModulePage('ac')"><li style="display:inline">Academics</li></a> >
      <a ng-click="setActiveAttendanceView('none')"><li style="display:inline">Attendance</li></a> >
      <a><li style="display:inline">Attendance Report</li></a>
    </ul>
  </div>
  <div class="row" style="padding:40px 20px 5px 20px">
    <div class="pad-20">
      <p><b> Attendance Report </b></p>
    </div>
  </div>
  <div class="col-md-8 col-md-offset-2">
    <md-content>
      <div class="container-fluid">

        <div class="row" style="padding:5px 20px 10px 20px">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Sl.no</th>
                <th>Student Name</th>
                <th>Batch</th>
                <th>Month</th>
                <th>No. of Leaves</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr ng-repeat="a in attendanceReport">
                <td class="center">{{$index+1}}</td>
                <td class="center">{{a.studentName}}</td>
                <td class="center">{{a.batch}}</td>
                <td class="center">{{a.month}},{{a.year}}</td>
                <td class="center">{{a.noOfLeaves}}</td>
                <td class="center"><a>Edit</a> | <a>Delete</a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </md-content>
  </div>
</div>
