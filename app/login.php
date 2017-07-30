<!DOCTYPE html>
<html lang="en" >
   <!-- Head -->
   <?php include 'include/head.php';?>
   <!-- /Head -->
   <body data-ng-app="myWebApp" data-ng-controller="HomeController" style="background-color:#3D8A8A">
    <!-- Content -->
        <div class="container-fluid" style="background:url('img/mybg.png');background-size:cover;height:580px;">
          <div class="row">
            <div class="col-md-4 col-md-offset-2 center" style="box-shadow:0px 2px 4px grey;background-color:white;margin-top:50px;">
              <div class="row pad-10">
                <p style="font-size:25px;font-family:Georgia;font-weight:700;color:#3D8A8A">Login Form</p>
              </div>
              <hr style="margin:0px;">
              <div class="row">
                <form name="loginForm">
                  <div class="col-md-6">
                    <md-input-container style="padding:0px;">
                      <label>Username</label>
                      <input ng-model="loginData.username" type="text" style="width:100%;" ng-required="true">
                    </md-input-container>
                  </div>
                  <div class="col-md-6">
                    <md-input-container>
                      <label>Password</label>
                      <input ng-model="loginData.password" type="password" style="width:100%;" ng-required="true">
                    </md-input-container>
                  </div>
                </div>
                <div class="row center">
                  <md-button class="md-raised md-primary" type="submit" ng-click="loginUser(loginData)" ng-disabled="loginForm.$invalid">Submit</md-button>
                </div>
              </form>
            </div>
           </div>
           <div class="row" style="margin-top:10px">
             <div class="col-md-4 col-md-offset-2 pad-20" style="background-color:white;">
               <div class="row">
                 <h5 class="center">Login Credentials</h5>
                 <div class="col-md-6">
                   <p><b>Admin</b></p>
                   <p>username:admin<br />password:admin123</p>
                 </div>
                 <div class="col-md-6">
                   <p><b>Employee</b></p>
                   <p>username:employee<br />password:employee123</p>
                 </div>
               </div>
               <div class="row">
                 <div class="col-md-6">
                   <p><b>Student</b></p>
                   <p>username:student<br />password:student123</p>
                 </div>
                 <div class="col-md-6">
                   <p><b>Parent</b></p>
                   <p>username:parent<br />password:parent123</p>
                 </div>
               </div>
             </div>
           </div>
        </div>
    <!-- Content -->
    <!-- Footer -->
      <?php include 'include/footer.php'; ?>
    <!-- /Footer -->
   </body>
</html>
