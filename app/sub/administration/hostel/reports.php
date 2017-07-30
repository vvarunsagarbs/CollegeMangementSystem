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
      <a ng-click="#"><li style="display:inline">Reports</li></a>
    </ul>
  </div>
  <div class="row">
    <div class="pad-20">
      <p><b>Reports</b></p>
    </div>
    <div class="row center">
      <img src="img/WorkInProgress.gif" alt="Work In Progress"/>
    </div>
  </div>
</div>
