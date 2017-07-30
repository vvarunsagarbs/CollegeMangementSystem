<div class="container-fluid">
  <div class="row" id="pageHeader" style="background-color:#F6F8F8;color:#646565;font-size:18px;">
    <div class="col-md-2 pad-10">
      OnlinePayment
    </div>
    <div class="col-md-10 right">
      <ul id="moduleSubMenu" class="customScroll">
        <a ng-repeat="menu in moduleSubMenu" ng-click="setActiveOnlinePaymentView(menu.link)"><li>{{menu.title}}</li></a>
      </ul>
    </div>
  </div>
  <div id="BreadCrumb" data-ng-controller="ModuleController">
    <ul>
      <a href="index.php"><li style="display:inline">Home</li></a> >
      <a href="modules.php" data-ng-click="setActiveModulePage('ad')"><li style="display:inline">Administration</li></a> >
      <a ng-click="setActiveOnlinePaymentView('none')"><li style="display:inline">Online Payment</li></a> >
      <a ng-click="#"><li style="display:inline"> Settings </li></a>
    </ul>
  </div>
  <div class="row pad-20">
    <div>
      <p><b>Settings</b></p>
    </div>
    <div class="col-md-8 col-md-offset-2">
      <md-content>
        <div class="container-fluid">
          <div class="row" style="padding:40px 20px 5px 20px">
            <md-radio-group ng-model="data.group1">
              <div class="col-md-6">
                <p><b>Enable Online Payment</b></p>
              </div>
              <div class="col-md-3">
                  <md-radio-button value="enabled" class="md-primary">Enable</md-radio-button>
              </div>
              <div class="col-md-3">
                <md-radio-button value="diabled"> Disable </md-radio-button>
              </div>
            </md-radio-group>
          </div>
          <div class="row" style="padding:5px 20px 10px 20px">
              <md-button class="md-primary md-raised pullRight">Save</md-button>
          </div>
        </div>
      </md-content>
    </div>
  </div>
</div>
