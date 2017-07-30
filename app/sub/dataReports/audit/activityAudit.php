<div class="container-fluid">
  <div class="row" id="pageHeader" style="background-color:#F6F8F8;color:#646565;font-size:18px;">
    <div class="col-md-2 pad-10">
      Audit
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
      <a ng-click="setActiveAuditView('none')"><li style="display:inline">Audit</li></a> >
      <a ng-click="#"><li style="display:inline">Activity Audit</li></a>
    </ul>
  </div>
  <div class="row pad-20">
    <div>
      <!-- <p><b>Course/Batch Details</b></p> -->
    </div>
    <div class="row">
      <div class="col-md-3 col-md-offset-3">
        <md-input-container>
          <!-- <label>State</label> -->
          <md-select ng-model="activity.duration" aria-label="Activity Duration">
            <md-option><em>Select Date</em></md-option>
            <md-option><em>Today</em></md-option>
            <md-option><em>Last Week</em></md-option>
            <md-option><em>Last Month</em></md-option>
          </md-select>
        </md-input-container>
      </div>
    </div>
    <div class = "row">
      <div class="col-md-9 col-md-offset-1 pad-10" style="box-shadow:0px 2px 4px grey;background-color:white;">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Activity</th>
              <th>Module</th>
              <th>Visits</th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="detail in activityAuditDetails">
              <td>{{detail.activity}}</td>
              <td>{{detail.module}}</td>
              <td>{{detail.visits}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
