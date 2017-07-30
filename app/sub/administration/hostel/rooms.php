<div class="container-fluid">
  <div class="row" id="pageHeader" style="background-color:#F6F8F8;color:#646565;font-size:18px;">
    <div class="col-md-2 pad-10">
      Hostel
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
      <a href="modules.php" data-ng-click="setActiveModulePage('ad')"><li style="display:inline">Administration</li></a> >
      <a ng-click="setActiveHostelView('none')"><li style="display:inline">Hostel</li></a> >
      <a ng-click="#"><li style="display:inline">Rooms</li></a>
    </ul>
  </div>
  <div class="row pad-20">
    <div>
      <p><b>Rooms</b></p>
    </div>
    <div class = "row">
      <div class="col-md-8 col-md-offset-1 pad-10" style="box-shadow:0px 2px 4px grey;background-color:white;">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Sl.no</th>
              <th>Room Number</th>
              <th>Students Per Room</th>
              <th>Availability</th>
              <th>Rent</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr ng-repeat="room in rooms">
              <td>{{$index+1}}</td>
              <td>{{room.rNo}}</td>
              <td>{{room.spr}}</td>
              <td>{{room.availability}}</td>
              <td>{{room.rent}}</td>
              <td><a>Edit</a> | <a>Delete</a></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-2 pad-10 center">
        <div>
          <!-- <div class="pad-10" style="background-color:#23b7e5;color:white;font-weight:bold;margin-bottom:10px"> Add New Hostel </div><hr style="margin:0px;padding:0px;"> -->
          <div class="pad-10" style="background-color:#23b7e5;color:white;font-weight:bold;"ng-click="JSONToCSVConvertor(rooms,'Room with Availablity','rooms')"> Download Data</div>
        </div>
      </div>
    </div>
  </div>
</div>
