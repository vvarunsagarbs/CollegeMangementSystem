<div class="container-fluid">
  <div class="row" id="pageHeader" style="background-color:#F6F8F8;color:#646565;font-size:18px;">
    <div class="col-md-2 pad-10">
      Reports
    </div>
    <div class="col-md-10 right">
      <ul id="moduleSubMenu" class="customScroll">
        <a ng-repeat="menu in moduleSubMenu" ng-click="setActiveHostelView(menu.link)"><li>{{menu.title}}</li></a>
      </ul>
    </div>
  </div>
  <div id="BreadCrumb" data-ng-controller="ModuleController">
    <ul>
      <a href="index.php"><li style="display:inline">Home</li></a> >
      <a href="modules.php" data-ng-click="setActiveModulePage('dr')"><li style="display:inline">Data and Reports</li></a> >
      <a ng-click="setActiveReportsView('none')"><li style="display:inline">Reports</li></a> >
      <a ng-click="#"><li style="display:inline">Former Student Details</li></a>
    </ul>
  </div>
  <div class="row pad-20">
    <div>
      <p><b>Former Student Details</b></p>
    </div>
    <div class="row pad-10">
      <div class="col-md-2 col-md-offset-9 pad-10 center" style="background-color:#23b7e5;color:white;font-weight:bold;;position:static;" ng-click="JSONToCSVConvertor(courseBatchDetails,'Courses/Batches','details')"> Download Data</div>
    </div>
    <div class = "row">
      <div class="col-md-10 col-md-offset-1 pad-10" style="box-shadow:0px 2px 4px grey;background-color:white;">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Sl.no</th>
              <th>Name</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Location</th>
              <th>Course</th>
              <th>Batch</th>
              <th>Joining Date</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="detail in formerStudentDetails">
              <td>{{$index+1}}</td>
              <td>{{detail.studentName}}</td>
              <td>{{detail.phone}}</td>
              <td>{{detail.parentEmail}}</td>
              <td>{{detail.location}}</td>
              <td>{{detail.course}}</td>
              <td>{{detail.batch}}</td>
              <td>{{detail.joiningDate}}</td>
              <td><a>Edit</a> | <a>Delete</a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
