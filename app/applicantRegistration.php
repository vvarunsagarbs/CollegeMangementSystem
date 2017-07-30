<!DOCTYPE html>
<html lang="en" >
   <!-- Head -->
   <?php include 'include/head.php';?>
   <!-- /Head -->
   <body data-ng-app="myWebApp" data-ng-controller="ApplicantRegistrationController">
    <!-- NavBar -->
        <?php include 'include/navbar.php';?>
    <!-- /NavBar -->
    <!-- Content -->
        <div class="container-fluid">
          <div class="row" style="min-height:518px;display: -ms-flex; display: -webkit-flex; display: flex;">
            <!-- Side Navigation Bar -->
            <div class="col-md-2" style="background-color:#1C2B36;margin:0px;padding:0px;">
              <?php include 'include/sidebar.php'; ?>
            </div>
            <!-- Side Navigation Bar -->
            <!-- Main Content -->
            <div class="col-md-10" style="background-color:#F0F3F4;margin:0px;padding:0px;">
              <div class="container-fluid">
                <div class="row" id="pageHeader" style="background-color:#F6F8F8;color:#646565;font-size:18px;">
                  <div class="col-md-3 pad-10">
                    Applicant Registration
                  </div>
                  <div class="col-md-9">
                    <!-- <ul id="moduleSubMenu" class="customScroll">
                      <a ng-repeat="menu in moduleSubMenu" ng-click="setActiveHostelView(menu.link)"><li>{{menu.title}}</li></a>
                    </ul> -->
                  </div>
                </div>
                <div id="BreadCrumb" data-ng-controller="ModuleController">
                  <ul>
                    <a href="index.php"><li style="display:inline">Home</li></a> >
                    <a href="modules.php" data-ng-click="setActiveModulePage('ac')"><li style="display:inline">Academics</li></a> >
                    <a><li style="display:inline">Applicant Registration</li></a>
                  </ul>
                </div>
                <div class="col-md-8 col-md-offset-2">
                	 <md-content>
                	   <div class="container-fluid">
                       <div class="row pad-10 center" style="font-size:18px;font-weight:bold">
                         New Applicant
                       </div>
                       <hr>
                	    <div class="row">
                        <div class="col-md-6">
                          <md-input-container>
                    		    <label>School/College Name</label>
                    		    <input ng-model="user.title" type="text">
                    		   </md-input-container>
                          </div>
                  	    </div>
                  	    <div class="row">
                          <div class="col-md-6">
                            <md-input-container>
                      		    <label>School/College Address</label>
                      		    <input ng-model="user.title" type="text">
                      		   </md-input-container>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <md-input-container>
                      		    <label>School/College Phone</label>
                      		    <input ng-model="user.title" type="text">
                      		   </md-input-container>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <md-input-container>
                      		    <label>School/College Email</label>
                      		    <input ng-model="user.title" type="text">
                      		   </md-input-container>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <md-input-container>
                      		    <label>School/College Website</label>
                      		    <input ng-mo del="user.title" type="text">
                      		   </md-input-container>
                          </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6">
                      		   <md-input-container>
                      		   <label>Institution type</label>
                                <md-select ng-model="ctrl.userState">
                                  <md-option><em>K-12</em></md-option>
                                  <md-option><em>Higher Education</em></md-option>
                                  <md-option ng-repeat="state in ctrl.states" ng-value="state.abbrev" ng-disabled="$index === 1">
                      		    </md-input-container>
                            </div>
                          </div>
                          <div class="row">
                           <div class="col-md-6">
                      		   <md-input-container>
                      		   <label>Student Attendence type</label>
                                <md-select ng-model="ctrl.userState">
                                  <md-option><em>Daily</em></md-option>
                                  <md-option><em>Subject wise</em></md-option>
                                  <md-option ng-repeat="state in ctrl.states" ng-value="state.abbrev" ng-disabled="$index === 1">
                      		    </md-input-container>
                           </div>
                          </div>
                          <div class="row">
                           <div class="col-md-6">
                      		   <md-input-container>
                      		   <label>Start day of the week</label>
                                <md-select ng-model="ctrl.userState">
                                  <md-option><em>Sunday</em></md-option>
                                  <md-option><em>Monday</em></md-option>
                                  <md-option><em>Tuesday</em></md-option>
                                  <md-option><em>Wednesday</em></md-option>
                                  <md-option><em>Thrusday</em></md-option>
                                  <md-option><em>Firday</em></md-option>
                                   <md-option><em>Saterday</em></md-option>
                                  <md-option ng-repeat="state in ctrl.states" ng-value="state.abbrev" ng-disabled="$index === 1">
                      		    </md-input-container>
                           </div>
                          </div>
                          <div class="row">
                           <div class="col-md-6">
                      		   <md-input-container>
                      		   <label>Date</label>
                                <md-select ng-model="ctrl.userState">
                                  <md-option><em>DMY</em></md-option>
                                  <md-option><em>YMD</em></md-option>
                                  <md-option><em>MDY</em></md-option>
                                  <md-option ng-repeat="state in ctrl.states" ng-value="state.abbrev" ng-disabled="$index === 1">
                      		    </md-input-container>
                           </div>
                          </div>
                          <div class="row">
                           <div class="col-md-6">
                      		   <md-input-container>
                      		   <label>Date separator</label>
                                <md-select ng-model="ctrl.userState">
                                  <md-option><em>-</em></md-option>
                                  <md-option><em>/</em></md-option>
                                  <md-option ng-repeat="state in ctrl.states" ng-value="state.abbrev" ng-disabled="$index === 1">
                      		    </md-input-container>
                           </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <md-input-container>
                        		    <label>Finance Year Start Date</label>
                        		    <md-datepicker ng-model="user.submissionDate"></md-datepicker>
                        		   </md-input-container>
                            </div>
                            <div class="col-md-6">
                      		    <md-input-container>
                      	        <label>Finance Year End Date</label>
                                  <md-datepicker ng-model="user.submissionDate"></md-datepicker>
                                </md-input-container>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <md-input-container>
                        		    <label>Starting receipt number</label>
                        		    <input ng-model="user.title" type="text">
                        		   </md-input-container>
                            </div>
                          </div>
                          <div class="row">
                           <div class="col-md-6">
                      		   <md-input-container>
                      		   <label>Language</label>
                                <md-select ng-model="ctrl.userState">
                                  <md-option><em>English</em></md-option>
                                  <md-option><em>Hindi</em></md-option>
                                  <md-option><em>Tamil</em></md-option>
                                  <md-option><em>Telugu</em></md-option>
                                  <md-option><em>Kannada</em></md-option>
                                  <md-option><em>Odisa</em></md-option>
                                   <md-option><em>Bengali</em></md-option>
                                  <md-option ng-repeat="state in ctrl.states" ng-value="state.abbrev" ng-disabled="$index === 1">
                      		    </md-input-container>
                           </div>
                          </div>
                         <div class="row">
                           <div class="col-md-6">
                      		   <md-input-container>
                      		   <label>Time zone</label>
                                <md-select ng-model="ctrl.userState">
                                  <md-option><em></em></md-option>
                                  <md-option><em>Mumbai</em></md-option>
                                  <md-option><em>Kolata</em></md-option>
                                  <md-option><em>Newdelhi</em></md-option>
                                  <md-option ng-repeat="state in ctrl.states" ng-value="state.abbrev" ng-disabled="$index === 1">
                      		    </md-input-container>
                           </div>
                          </div>
                          <div class="row">
                           <div class="col-md-6">
                      		   <md-input-container>
                      		   <label>Country</label>
                                <md-select ng-model="ctrl.userState">
                                  <md-option><em></em></md-option>
                                  <md-option><em>India</em></md-option>
                                  <md-option><em>Usa</em></md-option>
                                  <md-option><em>Canada</em></md-option>
                                  <md-option ng-repeat="state in ctrl.states" ng-value="state.abbrev" ng-disabled="$index === 1">
                      		    </md-input-container>
                           </div>
                          </div>
                           <div class="row">
                            <div class="col-md-6">
                              <md-input-container>
                        		    <label>Currency Type</label>
                        		    <input ng-mo del="user.title" type="text">
                        		   </md-input-container>
                            </div>
                          </div>
                            <div class="row">
                              <div class="col-md-6">
                                <md-input-container>
                          		    <label>Precision Count</label>
                          		    <input ng-mo del="user.title" type="text">
                          		   </md-input-container>
                              </div>
                            </div>
                            <div class="row">
                          <div class="col-md-6">
                            <md-input-container>
                    		    <label>Upload Logo (500KB max, 150x110)</label>
                  		    </div>
                  		    <div class="col-md-6" style="padding-top:20px;">
                    		    <input ng-mo del="user.title" type="file">
                    		   </md-input-container>
                          </div>
                          </div>
                            <div class="row">
                           <div class="col-md-6">
                		   <md-input-container>
                		   <label>Include Grading Systems</label>
                          <md-select ng-model="ctrl.userState">
                            <md-option><em>GPA</em></md-option>
                            <md-option><em> CWA</em></md-option>
                            <md-option><em> CCE</em></md-option>
                            <md-option><em> ICSE</em></md-option>
                            <md-option ng-repeat="state in ctrl.states" ng-value="state.abbrev" ng-disabled="$index === 1">
                		    </md-input-container>
                           </div>
                          </div>
                          <div class="row">
                          <div class="col-md-6">
                            <md-input-container>
                		    <label>Moodle URL (eg: http://domain.com/moodle)‎</label>
                		    <input ng-mo del="user.title" type="text">
                		   </md-input-container>
                          </div>
                          </div>
                          <div class="row">
                          <div class="col-md-6">
                            <md-input-container>
                		    <label>Select Font</label>
                		    <input ng-mo del="user.title" type="text">
                		   </md-input-container>
                          </div>
                          </div>
                          <div class="row">
                          <div class="col-md-6">
                            <md-input-container>
                		    <label>Enable auto increment of Student Admission No.</label>
                		   </md-input-container>
                          </div>
                          <div class="col-md-6" style="padding-top:25px;">
                	            <div flex-gt-sm="50">
                	          <md-checkbox md-no-ink aria-label="Checkbox No Ink" ng-model="data.cb1" class="md-primary">
                	          </md-checkbox>
                	        </div>
                		    </div>
                          </div>
                          <div class="row">
                          <div class="col-md-6">
                            <md-input-container>
                		    <label>Enable auto increment of Employee No.</label>
                		   </md-input-container>
                          </div>
                          <div class="col-md-6" style="padding-top:25px;">
                            <div flex-gt-sm="50">
                	          <md-checkbox md-no-ink aria-label="Checkbox No Ink" ng-model="data.cb2" class="md-primary">
                	          </md-checkbox>
                	          </div>
                		        </div>
                          </div>
                          <div class="row">
                          <div class="col-md-6">
                            <md-input-container>
                		    <label>Enable news comment moderation</label>
                		   </md-input-container>
                          </div>
                          <div class="col-md-6" style="padding-top:25px;">
                            <div flex-gt-sm="50">
                	          <md-checkbox md-no-ink aria-label="Checkbox No Ink" ng-model="data.cb3" class="md-primary">
                	          </md-checkbox>
                	          </div>
                		        </div>
                                </div>
                          <div class="row">
                          <div class="col-md-6">
                            <md-input-container>
                		    <label>Enable sibling</label>
                		   </md-input-container>
                          </div>
                          <div class="col-md-6" style="padding-top:25px;">
                            <div flex-gt-sm="50">
                	          <md-checkbox md-no-ink aria-label="Checkbox No Ink" ng-model="data.cb4" class="md-primary">
                	          </md-checkbox>
                	          </div>
                		        </div>
                          </div>
                          <div class="row">
                          <div class="col-md-6">
                            <md-input-container>
                		    <label>Enable password change at first time login</label>
                		   </md-input-container>
                          </div>
                          <div class="col-md-6" style="padding-top:25px;">
                           <div flex-gt-sm="50">
                	          <md-checkbox md-no-ink aria-label="Checkbox No Ink" ng-model="data.cb5" class="md-primary">
                	          </md-checkbox>
                	          </div>
                		        </div>
                          </div>
                          <div class="row">
                          <div class="col-md-6">
                            <md-input-container>
                		    <label>Enable roll number for students</label>
                		   </md-input-container>
                          </div>
                          <div class="col-md-6" style="padding-top:25px;">
                           <div flex-gt-sm="50">
                	          <md-checkbox md-no-ink aria-label="Checkbox No Ink" ng-model="data.cb6" class="md-primary">
                	          </md-checkbox>
                	          </div>
                		        </div>
                          </div>
                          <div class="row">
                          <div class="col-md-6">
                            <md-input-container>
                		    <label>Enable Google SSO</label>
                		   </md-input-container>
                          </div>
                          <div class="col-md-6" style="padding-top:25px;">
                           <div flex-gt-sm="50">
                	          <md-checkbox md-no-ink aria-label="Checkbox No Ink" ng-model="data.cb7" class="md-primary">
                	          </md-checkbox>
                	          </div>
                		        </div>
                          </div>
                          <div class="row">
                          <div class="col-md-6">
                            <md-input-container>
                		    <label>Enable auto-logout</label>
                		   </md-input-container>
                          </div>
                          <div class="col-md-6" style="padding-top:25px;">
                            <div flex-gt-sm="50">
                	          <md-checkbox md-no-ink aria-label="Checkbox No Ink" ng-model="data.cb8" class="md-primary">
                	          </md-checkbox>
                	          </div>
                		        </div>
                          </div>
                          <div class="row">
                          <div class="col-md-6 col-md-offset-1" style="margin-top:20px;float:right;">
                          <section layout="row" layout-sm="column" layout-align="center center" layout-wrap>
                     	       <md-button class="md-raised md-primary">Update</md-button>
                		    </section>
                           </div>
                           </div>
                         </div>
                      </md-content>
                  	</div>
                  </div>
            <!-- /Main Content -->
          </div>
        </div>
    <!-- Content -->
    <!-- Footer -->
      <?php include 'include/footer.php'; ?>
    <!-- /Footer -->
   </body>
</html>
