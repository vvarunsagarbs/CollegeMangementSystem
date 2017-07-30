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
      <a ng-click="#"><li style="display:inline">Manage Student Category</li></a>
    </ul>
  </div>
  <div class="row">
    <div class="pad-20">
      <p><b>Manage Student Category</b></p>
    </div>
    <div class="col-md-8 col-md-offset-2">
  	  <md-content>
  	   <div class="container-fluid">
  	    <div class="row pad-20">
          <div class="col-md-5 col-md-offset-2">
           <md-input-container style="width:100%;">
      		    <label>Enter new category :</label>
      		    <input ng-model="user.title" type="text">
    		   </md-input-container>
          </div>
          <div class="col-md-3 pad-10">
     	      <md-button class="md-raised md-primary">Add</md-button>
          </div>
         </div>
         <table class="table table-hover">
           <thead>
             <tr>
               <th>Sl.no</th>
               <th>Student Category</th>
               <th>Actions</th>
             </tr>
           </thead>
           <tbody>
             <tr ng-repeat="category in studentCategory">
               <td>{{$index+1}}</td>
               <td>{{category.name}}</td>
               <td><a>Edit</a> | <a>Delete</a></td>
             </tr>
           </tbody>
         </table>

        </div>
      </md-content>
  	</div>
  </div>
</div>
