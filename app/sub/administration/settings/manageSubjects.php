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
      <a ng-click="#"><li style="display:inline">Manage Subjects</li></a>
    </ul>
  </div>
  <div class="row pad-20">
    <div>
      <p><b>Manage Subjects</p></b>
    </div>
    <div class="col-md-8 col-md-offset-2">
      <md-content>
       <div class="container-fluid">
        <div class="row pad-20">
          <div class="col-md-5">
				    <md-input-container>
			   	    <label>Course</label>
		            <md-select ng-model="ctrl.userState">
		            <md-option><em>Diploma in theatre semister 1(GPA)</em></md-option>
		            <md-option><em>Diploma in theatre semister 2(GPA)</em></md-option>
		            <md-option><em>Diploma in theatre semister 3(GPA)</em></md-option>
		            <md-option><em>Diploma in theatre semister 4(GPA)</em></md-option>
		            <md-option><em>Diploma in theatre semister 5(GPA)</em></md-option>
		            <md-option><em>Diploma in theatre semister 6(GPA)</em></md-option>
		            <md-option><em>Diploma in theatre semister 7(GPA)</em></md-option>
		            <md-option><em>Diploma in theatre semister 8(GPA)</em></md-option>
		            <md-option><em>Grade 1(Normal)</em></md-option>
		            <md-option><em>Grade 2(GPA)</em></md-option>
		            <md-option><em>Grade 3(CWA)</em></md-option>
		            <md-option><em>Grade 4(CSE)</em></md-option>
		            <md-option><em>Grade 5(CCE)</em></md-option>
		            <md-option ng-repeat="state in ctrl.states" ng-value="state.abbrev" ng-disabled="$index === 1">
				    </md-input-container>
	        </div>
	        <div class="col-md-5">
				   <md-input-container>
		         <label>Batch</label>
             <md-select ng-model="ctrl.userState">
             <md-option><em>Select a batch</em></md-option>
           <md-input-container>
          </div>
          <div class="col-md-2">
            <md-button class="md-raised md-primary">Add</md-button>
          </div>
         </div>
        </div>
      </md-content>
    </div>
  </div>
</div>
