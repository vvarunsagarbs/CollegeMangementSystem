<div class="container-fluid">
  <div class="row" id="pageHeader" style="background-color:#F6F8F8;color:#646565;font-size:18px;">
    <div class="col-md-2 pad-10">
      Home
    </div>
    <div class="col-md-10">
      <ul id="moduleSubMenu" class="customScroll">
        <a href="{{menu.link}}" ng-repeat="menu in utilityCards" ng-click="setActiveSettingsView(menu.link)"><li>{{menu.title}}</li></a>
      </ul>
    </div>
  </div>
  <div id="BreadCrumb">
    <ul>
      <a href="index.php"><li style="display:inline">Home</li></a> >
      <a ng-click="setActiveSettingsView('none')"><li style="display:inline">Utility</li></a>
    </ul>
  </div>
  <div id="pageBackground" class="row center">
    <div class="col-md-4 pad-10" ng-repeat="card in utilityCards">
      <div class="dashCard" id="card.title" ng-click="setActiveSettingsView(card.link)" style="height:120px;">
        <a href="{{card.link}}" style="color:black;text-decoration:none;">
          <div style="pad-20">
              <span><b>{{card.title}}</b></span>
              <hr>
              <span>{{card.title}} Descrition</span>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>
