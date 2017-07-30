<div class="container-fluid">
  <div class="row" id="pageHeader" style="background-color:#F6F8F8;color:#646565;font-size:18px;">
    <div class="col-md-2 pad-10">
      Configuration
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
      <a ng-click="setActiveSettingsView('none')"><li style="display:inline">Settings</li></a> >
      <a ng-click="#"><li style="display:inline">Additional Admission Details</li></a>
    </ul>
  </div>
  <div class="row pad-20">
    <div>
      <p><b>Add Additional Details</b></p>
    </div>
    <div class = "row">
      <div class="col-md-6 col-md-offset-3 pad-20" style="box-shadow:0px 2px 4px grey;background-color:white;">
        <div class="pad-20">
          <div class="row">
            <md-input-container>
              <label>Name</label>
              <input ng-model="user.title" type="text">
            </md-input-container>
          </div>
          <div class="row">
            <div class="col-md-4">
              <p>Status</p>
            </div>
            <md-radio-group ng-model="data.group1">
              <div class="col-md-4">
                <md-radio-button value="active" class="md-primary">Active</md-radio-button>
              </div>
              <div class="col-md-4">
                <md-radio-button value="Inactive" class="md-primary">Inactive</md-radio-button>
              </div>
            </md-radio-group>
          </div>
          <div class="row">
            <div class="col-md-6">
             <p>Is Mandatory</p>
            </div>
            <div class="col-md-6">
             <md-checkbox md-no-ink aria-label="Checkbox No Ink" ng-model="data.cb8" class="md-primary">
             </md-checkbox>
           </div>
          </div>
          <div class="row">
            <md-input-container>
              <label>Input method</label>
              <md-select ng-model="ctrl.userState">
                <md-option><em>Text Box</em></md-option>
                <md-option><em>Select Box</em></md-option>
                <md-option><em>Text Area</em></md-option>
                <md-option><em>Chek Box</em></md-option>
                <md-option ng-repeat="state in ctrl.states" ng-value="state.abbrev" ng-disabled="$index === 1">
            </md-input-container>
          </div>
          <div class="row">
            <div class="col-md-3 col-md-offset-3" style="height:50px;">
              <md-button class="md-raised md-primary">Add</md-button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
