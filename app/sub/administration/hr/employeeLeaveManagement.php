<div class="container-fluid">
  <div class="row" id="pageHeader" style="background-color:#F6F8F8;color:#646565;font-size:18px;">
    <div class="col-md-2 pad-10">
      Human Resources
    </div>
    <div class="col-md-10">
      <ul id="moduleSubMenu" class="customScroll">
        <a ng-repeat="menu in employeeLeaveManagement" ng-click="setActiveHRSubView(menu.link)"><li>{{menu.title}}</li></a>
      </ul>
    </div>
  </div>
  <div id="BreadCrumb" data-ng-controller="ModuleController">
    <ul>
      <a href="index.php"><li style="display:inline">Home</li></a> >
      <a href="modules.php" data-ng-click="setActiveModulePage('ad')"><li style="display:inline">Administration</li></a> >
      <a ng-click="setActiveHRView('none')"><li style="display:inline">HR</li></a> >
      <a><li style="display:inline">Employee Leave Management</li></a>
    </ul>
  </div>
  <div id="pageBackground" class="row center pad-20">
    <div class="col-md-4 pad-10" ng-repeat="card in employeeLeaveManagement" style="height:120px;">
      <div class="dashCard" id="card.title" ng-click="setActiveHRView(card.link)">
        <div>
            <span><b>{{card.title}}</b></span>
          <hr>
          {{card.tag}}
        </div>
      </div>
    </div>
  </div>
</div>
