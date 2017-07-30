<div class="container-fluid">
  <div class="row" id="pageHeader" style="background-color:#F6F8F8;color:#646565;font-size:18px;">
    <div class="col-md-2 pad-10">
      Reports
    </div>
    <div class="col-md-10">
      <ul id="moduleSubMenu" class="customScroll">
        <a ng-repeat="menu in moduleSubMenu" ng-click="setActiveReportsView(menu.link)"><li>{{menu.title}}</li></a>
      </ul>
    </div>
  </div>
  <div id="BreadCrumb" data-ng-controller="ModuleController">
    <ul>
      <a href="index.php"><li style="display:inline">Home</li></a> >
      <a href="modules.php" data-ng-click="setActiveModulePage('ad')"><li style="display:inline">Administration</li></a> >
      <a ng-click="setActiveReminderView('none')"><li style="display:inline">Reminder</li></a> >
      <a><li style="display:inline">Current Page</li></a>
    </ul>
  </div>
  <div id="pageBackground" class="row center pad-20">
    <div class="row center" style="padding:10%;">
      <img src="img/WorkInProgress.gif" alt="Work In Progress"/>
    </div>
  </div>
</div>
