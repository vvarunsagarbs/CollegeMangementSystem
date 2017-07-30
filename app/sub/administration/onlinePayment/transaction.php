<div class="container-fluid">
  <div class="row" id="pageHeader" style="background-color:#F6F8F8;color:#646565;font-size:18px;">
    <div class="col-md-2 pad-10">
      Online Payment
    </div>
    <div class="col-md-10 right">
      <ul id="moduleSubMenu" class="customScroll">
        <a ng-repeat="menu in moduleSubMenu" ng-click="setActiveSettingsView(menu.link)"><li>{{menu.title}}</li></a>
      </ul>
    </div>
  </div>
  <div id="BreadCrumb" data-ng-controller="ModuleController">
    <ul>
      <a href="index.php"><li style="display:inline">Home</li></a> >
      <a href="modules.php" data-ng-click="setActiveModulePage('ad')"><li style="display:inline">Administration</li></a> >
      <a ng-click="setActiveOnlinePaymentView('none')"><li style="display:inline">Online Payment</li></a> >
      <a ng-click="#"><li style="display:inline">Transaction</li></a>
    </ul>
  </div>
  <div class="row">
    <div class="pad-20">
      <p><b>Transaction</b></p>
    </div>
    <div class="col-md-8 col-md-offset-1 pad-10" style="box-shadow:0px 2px 4px grey;background-color:white;">
      <div class="row">
        <div class="col-md-4">
          <md-datepicker ng-model="startDate" md-placeholder="Start date" md-open-on-focus></md-datepicker>
        </div>
        <div class="col-md-4">
          <md-datepicker ng-model="endDate" md-placeholder="End date" md-open-on-focus></md-datepicker>
        </div>
        <div class="col-md-4">
          <md-button class="md-primary md-raised pullRight">Search</md-button>
        </div>
      </div>
    </div>
    <div class="col-md-8 col-md-offset-1 pad-10 center" style="box-shadow:0px 2px 4px grey;background-color:yellow;">
      No Records Found
    </div>
  </div>
</div>
