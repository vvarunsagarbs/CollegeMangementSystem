var app = angular.module('myWebApp',['ngMaterial']);

app.run(function($http, $rootScope, $timeout, $mdToast) {
  console.log('App Starts');

  $rootScope.logoutActiveUser = function () {
    $rootScope.activeUser = '';
    window.localStorage['activeUser'] = '';
    window.location.reload();
  }

  // Toast Template
  $rootScope.showSimpleToast = function(message, position, delay) {
    $mdToast.show(
      $mdToast.simple()
        .textContent(message)
        .position(position)
        .hideDelay(delay)
    );
  }

  $rootScope.setActiveSubNav = function (view) {
    console.log('activeSubNav', view);
    $rootScope.activeSubNav = view;
  }

  $rootScope.JSONToCSVConvertor = function (JSONData, ReportTitle, ShowLabel) {
      //If JSONData is not an object then JSON.parse will parse the JSON string in an Object
      var arrData = typeof JSONData != 'object' ? JSON.parse(JSONData) : JSONData;

      var CSV = '';
      //Set Report title in first row or line

      CSV += ReportTitle + '\r\n\n';

      //This condition will generate the Label/Header
      if (ShowLabel) {
          var row = "";

          //This loop will extract the label from 1st index of on array
          for (var index in arrData[0]) {

              //Now convert each value to string and comma-seprated
              row += index + ',';
          }

          row = row.slice(0, -1);

          //append Label row with line break
          CSV += row + '\r\n';
      }

      //1st loop is to extract each row
      for (var i = 0; i < arrData.length; i++) {
          var row = "";

          //2nd loop will extract each column and convert it in string comma-seprated
          for (var index in arrData[i]) {
              row += '"' + arrData[i][index] + '",';
          }

          row.slice(0, row.length - 1);

          //add a line break after each row
          CSV += row + '\r\n';
      }

      if (CSV == '') {
          alert("Invalid data");
          return;
      }

      //Generate a file name
      var fileName = "MyReport_";
      //this will remove the blank-spaces from the title and replace it with an underscore
      fileName += ReportTitle.replace(/ /g,"_");

      //Initialize file format you want csv or xls
      var uri = 'data:text/csv;charset=utf-8,' + escape(CSV);

      // Now the little tricky part.
      // you can use either>> window.open(uri);
      // but this will not work in some browsers
      // or you will not get the correct file extension

      //this trick will generate a temp <a /> tag
      var link = document.createElement("a");
      link.href = uri;

      //set the visibility hidden so it will not effect on your web-layout
      link.style = "visibility:hidden";
      link.download = fileName + ".csv";

      //this part will append the anchor tag and remove it after automatic click
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
  }

})

app.controller('HomeController', function($rootScope, $scope, $http, $timeout, $mdSidenav, $log) {
  console.log('Loading Home Controller..');
  $scope.users = [{'name':'admin','password':'admin123','type':'a'},{'name':'employee','password':'employee123','type':'e'},{'name':'student','password':'student123','type':'s'},{'name':'parent','password':'parent123','type':'p'}];

  $scope.loginUser = function (loginData) {
    angular.forEach($scope.users, function(value, key) {
      // console.log(key + ': ' + value.name+ ', ' + value.password);
      if (loginData.username == value.name ) {
        console.log('username found');
        if (value.password == loginData.password) {
          console.log('login success');
          $rootScope.activeUser = value;
          window.localStorage['activeUser'] = JSON.stringify($rootScope.activeUser);
          console.log('activeUser',$rootScope.activeUser);
          window.location.href="index.php";
        } else {
          $rootScope.showSimpleToast("Invalid Username or Password", "top right", "2000");
        }
      } else {
        $rootScope.showSimpleToast("Invalid Username or Password", "top right", "2000");
      }
    });
  }
});

app.controller('SideBarController', function ($rootScope,$scope, $timeout, $mdSidenav, $log) {
  console.log('Loading SideBarController');

  if (window.localStorage['activeUser'] == null || window.localStorage['activeUser'] == undefined || window.localStorage['activeUser']== ""){
      window.location.href = "login.php";
    } else {
      $rootScope.activeUser = JSON.parse(window.localStorage['activeUser']);
      console.log('activeUser',$rootScope.activeUser);
  }

  $scope.setActiveSubNavView = function(view) {
    console.log('activeSubNavView',view);
    $scope.activeSubNavView = view;
    window.localStorage['activeSubNavView'] = view;
    console.log('window.localStorage["activeSubNavView"]', window.localStorage['activeSubNavView']);
  }

  if(window.localStorage['activeSubNavView'] == undefined || window.localStorage['activeSubNavView'] == null || window.localStorage['activeSubNavView'] == '') {
    $scope.setActiveSubNavView('none');
    console.log('reset');
    } else {
    $scope.setActiveSubNavView(window.localStorage['activeSubNavView']);
    console.log('sourced');
  }

  $scope.administrationSubmenu = [{'icon':'','controller':'SettingsController','link':'settings.php','title':'Settings'},{'icon':'','controller':'HostelController','link':'hostel.php','title':'Hostel'},{'icon':'','controller':'HRController','link':'hr.php','title':'Human Resource'},{'icon':'','controller':'OnlinePaymentController','link':'onlinePayment.php','title':'Online Payment'},{'icon':'','controller':'InventoryController','link':'inventory.php','title':'Inventory'},{'icon':'','controller':'ReminderController','link':'reminder.php','title':'Reminders'},{'icon':'','controller':'FinanceController','link':'finance.php','title':'Finance'},{'icon':'','controller':'TransportController','link':'transport.php','title':'Transport'}];

  $scope.academicsSubmenu = [{'icon':'','controller':'ApplicantRegistrationController','link':'applicantRegistration.php','title':'Applicant Registration'},{'icon':'','controller':'AttendanceController','link':'attendance.php','title':'Attendence'},{'icon':'','controller':'BatchSummaryController','link':'batchSummary.php','title':'Batch Summary'},{'icon':'','controller':'DisciplineController','link':'discipline.php','title':'Discipline'},{'icon':'','controller':'ProfileController','link':'myProfile.php','title':'My Profile'}, {'icon':'','controller':'PlacementsController','link':'placements.php','title':'Placement'}, {'icon':'','controller':'HomeController','link':'cs.php','title':'Leaves'},{'icon':'','controller':'HomeController','link':'cs.php','title':'Library'},{'icon':'','controller':'HomeController','link':'cs.php','title':'Remarks'},{'icon':'','controller':'HomeController','link':'cs.php','title':'Student Records'},{'icon':'','controller':'HomeController','link':'cs.php','title':'Students'},{'icon':'','controller':'HomeController','link':'cs.php','title':'Timetable'},{'icon':'','controller':'HomeController','link':'cs.php','title':'Transfer Certificate'},{'icon':'','controller':'HomeController','link':'cs.php','title':'Examination'},{'icon':'','controller':'HomeController','link':'cs.php','title':'Calender'}];

  $scope.dataReportsSubmenu = [{'icon':'','controller':'ReportsController','link':'reports.php','title':'Reports'},{'icon':'','controller':'CustomImportsController','link':'customImports.php','title':'Custom Imports'},{'icon':'','controller':'CustomReportsController','link':'customReports.php','title':'Custom Reports'},{'icon':'','controller':'HomeController','link':'dataExports.php','title':'Data Exports'},{'icon':'','controller':'AuditController','link':'audit.php','title':'Audit'}];

  $scope.UtilitySubmenu = [{'icon':'','controller':'HomeController','link':'cs.php','title':'Alumni'},{'icon':'','controller':'HomeController','link':'cs.php','title':'Blog'},{'icon':'','controller':'HomeController','link':'cs.php','title':'Collaborate'},{'icon':'','controller':'HomeController','link':'cs.php','title':'Discussion'},{'icon':'','controller':'HomeController','link':'cs.php','title':'Documents'},{'icon':'','controller':'HomeController','link':'cs.php','title':'E-mail'},{'icon':'','controller':'HomeController','link':'cs.php','title':'Event Creation'},{'icon':'','controller':'HomeController','link':'cs.php','title':'Forms'},{'icon':'','controller':'HomeController','link':'cs.php','title':'Gallery'},{'icon':'','controller':'HomeController','link':'cs.php','title':'Google Docs'},{'icon':'','controller':'HomeController','link':'cs.php','title':'News'},{'icon':'','controller':'HomeController','link':'cs.php','title':'Poll'},{'icon':'','controller':'HomeController','link':'cs.php','title':'Tasks'}];

});

app.controller('DashboardController', function ($rootScope,$scope, $timeout, $mdSidenav, $log) {
  console.log('Loading DashboardController');

  if (window.localStorage['activeUser'] == null || window.localStorage['activeUser'] == undefined || window.localStorage['activeUser']== ""){
    window.location.href = "login.php";
  } else {
    $rootScope.activeUser = JSON.parse(window.localStorage['activeUser']);
    console.log('activeUser',$rootScope.activeUser);
  }

  $scope.aDashCardsLeft = [{"title":"Discussions","content":"No Data to Display","active":"true"},{"title":"Finance","content":"No Data to Display","active":"true"},{"title":"Timetable","content":"No Data to Display","active":"true"}];
  $scope.aDashCardsMiddle = [{"title":"Birthdays","content":"No Data to Display","active":"true"},{"title":"Employees on Leave","content":"No Data to Display","active":"true"},{"title":"News","content":"No Data to Display","active":"true"},{"title":"Blogs","content":"No Data to Display","active":"true"},{"title":"Leave Applications","content":"No Data to Display","active":"true"}];
  $scope.aDashCardsRight = [{"title":"Online Meetings","content":"Meeting with Dean on July 25,2017 @ 5:00pm","active":"true"},{"title":"Events","content":"No Data to Display","active":"true"},{"title":"Placements","content":"No Data to Display","active":"true"}];

  $scope.sDashCardsLeft = [{"title":"Examinations","content":"No Data to Display","active":"true"},{"title":"Timetable","content":"No Data to Display","active":"true"}];
  $scope.sDashCardsMiddle = [{"title":"News","content":"No Data to Display","active":"true"},{"title":"Fees Due","content":"No Data to Display","active":"true"}];
  $scope.sDashCardsRight = [{"title":"Events","content":"No Data to Display","active":"true"}];

  $scope.pDashCardsLeft = [{"title":"Examinations","content":"No Data to Display","active":"true"},{"title":"Timetable","content":"No Data to Display","active":"true"}];
  $scope.pDashCardsMiddle = [{"title":"News","content":"No Data to Display","active":"true"},{"title":"Fees Due","content":"No Data to Display","active":"true"}];
  $scope.pDashCardsRight = [{"title":"Events","content":"No Data to Display","active":"true"}];

  $scope.eDashCardsLeft = [{"title":"Leave Applications","content":"No Data to Display","active":"true"},{"title":"News","content":"No Data to Display","active":"true"}];
  $scope.eDashCardsMiddle = [{"title":"Employees On Leave","content":"No Data to Display","active":"true"},{"title":"Events","content":"No Data to Display","active":"true"}];
  $scope.eDashCardsRight = [{"title":"Timetable","content":"No Data to Display","active":"true"}];
});

app.controller('ModuleController', function ($rootScope, $scope, $timeout) {
  console.log('Loading ModuleController...');

  if (window.localStorage['activeUser'] == null || window.localStorage['activeUser'] == undefined || window.localStorage['activeUser']== ""){
      window.location.href = "login.php";
    } else {
      $rootScope.activeUser = JSON.parse(window.localStorage['activeUser']);
      console.log('activeUser',$rootScope.activeUser);
  }

  $scope.modulesMenu = [{'title':'Administration','tag':'Manage Your Institution Details','link':'ad'},{'title':'Academics','tag':'Track the Academic Records','link':'ac'},{'title':'Data and Reports','tag':'Generate Reports','link':'dr'},{'title':'Utility','tag':'Manage the Communication','link':'ut'}];

  $scope.administrationCards = [{'icon':'','controller':'SettingsController','link':'settings.php','title':'Settings'},{'icon':'','controller':'HostelController','link':'hostel.php','title':'Hostel'},{'icon':'','controller':'HRController','link':'hr.php','title':'Human Resource'},{'icon':'','controller':'OnlinePaymentController','link':'onlinePayment.php','title':'Online Payment'},{'icon':'','controller':'InventoryController','link':'inventory.php','title':'Inventory'},{'icon':'','controller':'ReminderController','link':'reminder.php','title':'Reminders'},{'icon':'','controller':'FinanceController','link':'finance.php','title':'Finance'},{'icon':'','controller':'TransportController','link':'transport.php','title':'Transport'}];

  $scope.academicsCards = [{'icon':'','controller':'HomeController','link':'applicantRegistration.php','title':'Applicant Registration'},{'icon':'','controller':'AttendanceController','link':'attendance.php','title':'Attendence'},{'icon':'','controller':'BatchSummaryController','link':'batchSummary.php','title':'Batch Summary'},{'icon':'','controller':'DisciplineController','link':'discipline.php','title':'Discipline'},{'icon':'','controller':'ProfileController','link':'myProfile.php','title':'My Profile'}, {'icon':'','controller':'PlacementsController','link':'placements.php','title':'Placement'}, {'icon':'','controller':'HomeController','link':'cs.php','title':'Calender'},{'icon':'','controller':'HomeController','link':'cs.php','title':'Examination'},{'icon':'','controller':'HomeController','link':'cs.php','title':'Leaves'},{'icon':'','controller':'HomeController','link':'cs.php','title':'Library'},{'icon':'','controller':'HomeController','link':'cs.php','title':'Remarks'},{'icon':'','controller':'HomeController','link':'cs.php','title':'Student Records'},{'icon':'','controller':'HomeController','link':'cs.php','title':'Students'},{'icon':'','controller':'HomeController','link':'cs.php','title':'Timetable'},{'icon':'','controller':'HomeController','link':'cs.php','title':'Transfer Certificate'}];

  $scope.dataReportsCards = [{'icon':'','controller':'ReportController','link':'reports.php','title':'Reports'},{'icon':'','controller':'CustomImportsController','link':'customImports.php','title':'Custom Imports'},{'icon':'','controller':'CustomReportsController','link':'customReports.php','title':'Custom Reports'},{'icon':'','controller':'HomeController','link':'dataExports.php','title':'Data Exports'},{'icon':'','controller':'AuditController','link':'audit.php','title':'Audit'}];

  $scope.utilityCards = [{'icon':'','controller':'HomeController','link':'cs.php','title':'Alumni'},{'icon':'','controller':'HomeController','link':'cs.php','title':'Blog'},{'icon':'','controller':'HomeController','link':'cs.php','title':'Collaborate'},{'icon':'','controller':'HomeController','link':'cs.php','title':'Discussion'},{'icon':'','controller':'HomeController','link':'cs.php','title':'Documents'},{'icon':'','controller':'HomeController','link':'cs.php','title':'E-mail'},{'icon':'','controller':'HomeController','link':'cs.php','title':'Event Creation'},{'icon':'','controller':'HomeController','link':'cs.php','title':'Forms'},{'icon':'','controller':'HomeController','link':'cs.php','title':'Gallery'},{'icon':'','controller':'HomeController','link':'cs.php','title':'Google Docs'},{'icon':'','controller':'HomeController','link':'cs.php','title':'News'},{'icon':'','controller':'HomeController','link':'cs.php','title':'Poll'},{'icon':'','controller':'HomeController','link':'cs.php','title':'Tasks'}];

  $scope.setActiveModulePage = function (view) {
    $scope.activeModulesView = view;
    console.log('activeModulesView',view);
    window.localStorage['activeModulesView'] = view;
  }
  if (window.localStorage['activeModulesView'] == null || window.localStorage['activeModulesView'] == undefined || window.localStorage['activeModulesView']== ""){
    $scope.setActiveModulePage('none');
  } else {
    $scope.setActiveModulePage(window.localStorage['activeModulesView']);
  }
})

app.controller('SettingsController', function ($rootScope,$scope, $timeout, $mdSidenav, $log) {
  console.log('Loading SettingsController');

  if (window.localStorage['activeUser'] == null || window.localStorage['activeUser'] == undefined || window.localStorage['activeUser']== ""){
      window.location.href = "login.php";
    } else {
      $rootScope.activeUser = JSON.parse(window.localStorage['activeUser']);
      console.log('activeUser',$rootScope.activeUser);
  }

  $scope.moduleSubMenu = [{"title":"Course/ Batch","tag":"Add a new course or batch for this academic year","link":"mcb"},{"title":"Subjects","tag":"Manage subjects coresponding to different courses","link":"ms"},{"title":"Student Category","tag":"Add Student Category","link":"msc"},{"title":"Additional Admission Details","tag":"Set Some Additional details for admission","link":"aaad"},{"title":"SMS Module","tag":"Enable/disable SMS settings","link":"sms"}];

  $scope.setActiveSettingsView = function (view) {
    $scope.activeSettingsView = view;
    console.log('activeSettingsView',view);
    window.localStorage['activeSettingsView'] = view;
  }

  if (window.localStorage['activeSettingsView'] == null || window.localStorage['activeSettingsView'] == undefined || window.localStorage['activeSettingsView']== ""){
    $scope.setActiveSettingsView('none');
  } else {
    $scope.setActiveSettingsView(window.localStorage['activeSettingsView']);
  }

  $scope.resetToDash = function () {
    $scope.setActiveSettingsView('none');
  }
  $scope.studentCategory = [{'name':'Staff child'},{'name':'Financially Weak student'},{'name':'Sibling In Institution'}];
  $scope.courseBatches = [{"sNo":"1","name":"Diploma in Theatre Semester 1(GPA)","code":"DT Sem1","batch":"0","student":"0"},{"sNo":"2","name":"Diploma in Theatre Semester 2(GPA)","code":"DT Sem2","batch":"0","student":"0"},{"sNo":"3","name":"Diploma in Theatre Semester 3(GPA)","code":"DT Sem3","batch":"0","student":"0"},{"sNo":"4","name":"Diploma in Theatre Semester 4(GPA)","code":"DT Sem4","batch":"0","student":"0"},{"sNo":"5","name":"Diploma in Theatre Semester 5(GPA)","code":"DT Sem5","batch":"0","student":"0"},{"sNo":"6","name":"Diploma in Theatre Semester 6(GPA)","code":"DT Sem6","batch":"1","student":"5"},{"sNo":"7","name":"Grade 1(Normal)","code":"G1","batch":"1","student":"11"},{"sNo":"8","name":"Grade 2(GPA)","code":"G2","batch":"1","student":"10"},{"sNo":"9","name":"Grade 3(CWA)","code":"G3","batch":"1","student":"10"},{"sNo":"10","name":"Grade 4(CSE)","code":"G4","batch":"1","student":"10"},{"sNo":"11","name":"Grade 5(CCE)","code":"G5","batch":"1","student":"10"}];

});

app.controller('HostelController', function ($rootScope,$scope,$timeout) {
  console.log('Loading HostelController');

  if (window.localStorage['activeUser'] == null || window.localStorage['activeUser'] == undefined || window.localStorage['activeUser']== ""){
      window.location.href = "login.php";
    } else {
      $rootScope.activeUser = JSON.parse(window.localStorage['activeUser']);
      console.log('activeUser',$rootScope.activeUser);
  }

  $scope.moduleSubMenu = [{"title":"Hostel","tag":"Manage Hostel Details","link":"ho"},{"title":"Rooms","tag":"Manage room details","link":"ro"},{"title":"Room Allocation","tag":"Allocate rooms to the students","link":"ra"},{"title":"Report","tag":"Generate Report","link":"re"}];

  $scope.setActiveHostelView = function (view) {
    $scope.activeHostelView = view;
    console.log('activeHostelView',view);
    window.localStorage['activeHostelView'] = view;
  }

  if (window.localStorage['activeHostelView'] == null || window.localStorage['activeHostelView'] == undefined || window.localStorage['activeHostelView']== ""){
    $scope.setActiveHostelView('none');
  } else {
    $scope.setActiveHostelView(window.localStorage['activeHostelView']);
  }

  $scope.resetToDash = function () {
    $scope.setActiveHostelView('none');
  }

  $scope.allHostels = [{"name": "G1","type": "Gents","info": ""},{"name": "L1","type": "Ladies","info": ""}];

  $scope.rooms = [{"rNo":"r1","spr":"4","availability":"2","rent":"2500"},{"rNo":"r2","spr":"4","availability":"2","rent":"2500"},{"rNo":"r3","spr":"4","availability":"2","rent":"2500"},{"rNo":"r4","spr":"4","availability":"2","rent":"2500"},{"rNo":"r5","spr":"4","availability":"2","rent":"2500"},{"rNo":"r6","spr":"3","availability":"3","rent":"3000"},{"rNo":"r7","spr":"3","availability":"3","rent":"3000"},{"rNo":"r8","spr":"3","availability":"2","rent":"3000"},{"rNo":"r9","spr":"3","availability":"2","rent":"3000"},{"rNo":"r10","spr":"3","availability":"1","rent":"2500"},{"rNo":"r11","spr":"2","availability":"2","rent":"3500"},{"rNo":"r12","spr":"2","availability":"2","rent":"3500"},{"rNo":"r13","spr":"2","availability":"2","rent":"3500"},{"rNo":"r14","spr":"2","availability":"1","rent":"3500"},{"rNo":"r15","spr":"2","availability":"1","rent":"3500"},{"rNo":"r16","spr":"1","availability":"1","rent":"4000"},{"rNo":"r17","spr":"1","availability":"1","rent":"4000"},{"rNo":"r18","spr":"1","availability":"1","rent":"4000"},{"rNo":"r19","spr":"1","availability":"1","rent":"4000"},{"rNo":"r20","spr":"1","availability":"1","rent":"4000"}];

})

app.controller('HRController', function ($rootScope,$scope,$timeout) {
  console.log('Loading HRController');

  if (window.localStorage['activeUser'] == null || window.localStorage['activeUser'] == undefined || window.localStorage['activeUser']== ""){
      window.location.href = "login.php";
    } else {
      $rootScope.activeUser = JSON.parse(window.localStorage['activeUser']);
      console.log('activeUser',$rootScope.activeUser);
  }

  $scope.moduleSubMenu = [{"title":"HR Settings","tag":"Set up and maintain Human Resources","link":"hrs"},{"title":"Employee Management","tag":"Add employees and manage their subject associations","link":"em"},{"title":"Employee Leave Management","tag":"Manage employee attendance and leaves","link":"elm"},{"title":"Employee Search","tag":"Search, view, and maintain employee records","link":"es"},{"title":"Payroll and Payslip Management","tag":"Set up employee payroll and generate payslips","link":"ppm"}];

  $scope.HRsettings = [{"title":"Employee Category","tag":"Create and manage employee categories","link":"hrsec"},{"title":"Employee Position","tag":"Create and manage employee positions","link":"hrsep"},{"title":"Employee Department","tag":"Create and manage employee departments","link":"hrsed"},{"title":"Employee Grade","tag":"Create and manage employee grades","link":"hrseg"},{"title":"Working Day Settings","tag":"Set up employee working day settings","link":"hrswds"},{"title":"Leave Types","tag":"Add and manage employee leave types","link":"hrslt"},{"title":"Bank Details","tag":"Create and manage employee bank details","link":"hrsbd"},{"title":"Payroll Settings","tag":"Configure the payroll calculation mode","link":"hrsps"},{"title":"Additional Details","tag":"Create and manage additional details for the employee admission form","link":"hrsps"},{"title":"Leave Groups","tag":"Create leave groups to manage different leave types.","link":"hrslg"}];

  $scope.employeeManagement = [{"title":"Employee Admission","tag":"Employee admission form","link":"emed"},{"title":"Employee Subject Association","tag":"Assign an employee with one or more subjects","link":"emesa"}];

  $scope.employeeLeaveManagement = [{"title":"Attendance Register","tag":"Mark employee attendance","link":"elmarr"},{"title":"Attendance Report","tag":"Generate the employee attendance report for all departments","link":"elmart"},{"title":"Leave Reset","tag":"Reset employee leaves","link":"elmart"},{"title":"Leave Applications","tag":"View all employee leave applications","link":"elmla"}];

  $scope.payrollAndPayslipManagement = [{"title":"Payroll Categories","tag":"Create and manage employee payroll categories","link":"ppm"},{"title":"Payroll Groups","tag":"Create and manage employee payroll groups","link":"ppmpg"},{"title":"Payslips for Payroll Groups","tag":"Generate payslips for employees of a payroll group","link":"ppmppg"},{"title":"Payslips for Employees","tag":"Generate payslips for individual employees","link":"ppmpfe"},{"title":"Rejected Payslips","tag":"Manage rejected employee payslips","link":"ppmrp"},{"title":"Payslip Settings","tag":"Configure information to be displayed in employee payslips","link":"ppmps"},{"title":"Payslip Report","tag":"View the employee payslip report","link":"ppmpr"},{"title":"Advanced Payslip Reports","tag":"Generate advanced payslip reports and save as custom templates for later use","link":"ppmapr"}];

  $scope.setActiveHRView = function (view) {
    $scope.activeHRView = view;
    console.log('activeHRView',view);
    window.localStorage['activeHRView'] = view;
  }

  if (window.localStorage['activeHRView'] == null || window.localStorage['activeHRView'] == undefined || window.localStorage['activeHRView']== ""){
    $scope.setActiveHRView('none');
  } else {
    $scope.setActiveHRView(window.localStorage['activeHRView']);
  }

  $scope.resetToDash = function () {
    $scope.setActiveHRView('none');
  }

})

app.controller('OnlinePaymentController', function ($rootScope,$scope,$timeout) {
  console.log('Loading OnlinePaymentController');

  if (window.localStorage['activeUser'] == null || window.localStorage['activeUser'] == undefined || window.localStorage['activeUser']== ""){
      window.location.href = "login.php";
    } else {
      $rootScope.activeUser = JSON.parse(window.localStorage['activeUser']);
      console.log('activeUser',$rootScope.activeUser);
  }

  $scope.moduleSubMenu = [{"title":"Settings","tag":"Manage online payment settings","link":"ops"},{"title":"Transactions","tag":"List online transactions","link":"opt"},{"title":"Custom Gateways","tag":"Manage custom gateways","link":"cg"}];

  $scope.setActiveOnlinePaymentView = function (view) {
    $scope.activeOnlinePaymentView = view;
    console.log('activeOnlinePaymentView',view);
    window.localStorage['activeOnlinePaymentView'] = view;
  }

  if (window.localStorage['activeOnlinePaymentView'] == null || window.localStorage['activeOnlinePaymentView'] == undefined || window.localStorage['activeOnlinePaymentView']== ""){
    $scope.setActiveOnlinePaymentView('none');
   } else {
    $scope.setActiveOnlinePaymentView(window.localStorage['activeOnlinePaymentView']);
  }

  $scope.resetToDash = function () {
    $scope.setActiveOnlinePaymentView('none');
  }

  $scope.customGateways = [{'name':'CC Avenue','status':'Active'},{'name':'PayUMoney','status':'Inactive'}];
})

app.controller('ReportsController', function ($rootScope,$scope,$timeout) {

  $scope.moduleSubMenu = [{"title":"Course / Batch Details","tag":"Generates Course / Batch Details","link":"drcbd"},{"title":"Former students Details","tag":"Generates Former students Details","link":"drfsd"},{"title":"Former Employees Details","tag":"Generates Former Employees Details","link":"drfed"},{"title":"Subject Details","tag":"Generates Subject Details","link":"drsd"},{"title":"Employee Subject Association Details","tag":"Generates Employee subject association Details","link":"dresad"},{"title":"Employee Payroll Details","tag":"Generates Employee Payroll Details","link":"drepd"},{"title":"Exam Schedule Details","tag":"Generates Exam Schedule Details","link":"dresd"},{"title":"Fee collection Details","tag":"Generates Fee collection Details","link":"drfcd"},{"title":"Fees Defaulters Details","tag":"Generates Fees Defaulters Details","link":"drfdd"},{"title":"Students Fees Defaulters Details","tag":"Generates Students Fees Defaulters Details","link":"drsfdd"},{"title":"Students Fees Head-wise Report","tag":"Generates Students Fees Head-wise Report","link":"drsfr"}];

  if (window.localStorage['activeUser'] == null || window.localStorage['activeUser'] == undefined || window.localStorage['activeUser']== ""){
      window.location.href = "login.php";
    } else {
      $rootScope.activeUser = JSON.parse(window.localStorage['activeUser']);
      console.log('activeUser',$rootScope.activeUser);
  }

  $scope.setActiveReportsView = function (view) {
    $scope.activeReportsView = view;
    console.log('activeReportsView',view);
    window.localStorage['activeReportsView'] = view;
  }

  if (window.localStorage['activeReportsView'] == null || window.localStorage['activeReportsView'] == undefined || window.localStorage['activeReportsView']== ""){
    $scope.setActiveReportsView('none');
  } else {
    $scope.setActiveReportsView(window.localStorage['activeReportsView']);
  }

  $scope.courseBatchDetails = [{"sNo":"1","name":"Diploma in Theatre Semester 1(GPA)","code":"DT Sem1","batch":"0","student":"0"},{"sNo":"2","name":"Diploma in Theatre Semester 2(GPA)","code":"DT Sem2","batch":"0","student":"0"},{"sNo":"3","name":"Diploma in Theatre Semester 3(GPA)","code":"DT Sem3","batch":"0","student":"0"},{"sNo":"4","name":"Diploma in Theatre Semester 4(GPA)","code":"DT Sem4","batch":"0","student":"0"},{"sNo":"5","name":"Diploma in Theatre Semester 5(GPA)","code":"DT Sem5","batch":"0","student":"0"},{"sNo":"6","name":"Diploma in Theatre Semester 6(GPA)","code":"DT Sem6","batch":"1","student":"5"},{"sNo":"7","name":"Grade 1(Normal)","code":"G1","batch":"1","student":"11"},{"sNo":"8","name":"Grade 2(GPA)","code":"G2","batch":"1","student":"10"},{"sNo":"9","name":"Grade 3(CWA)","code":"G3","batch":"1","student":"10"},{"sNo":"10","name":"Grade 4(CSE)","code":"G4","batch":"1","student":"10"},{"sNo":"11","name":"Grade 5(CCE)","code":"G5","batch":"1","student":"10"}];

  $scope.formerStudentDetails = [{"studentName":"aadesh","fatherName":"bachan","motherName":"devi","phone":"9999123999","alternativePhone":"9494123944","parentEmail":"bachan@gmail.com","currentAddress":"IstFloor,ESI Disp.Bldg, peenya,Bangalore – 560 058","permanentAddress":"IIIrd phase, Peenya, Bangalore-58","birthday":"24-04-1993","age":"17","location":"bangalor","course":"abc","batch":"1","joiningDate":"01-01-2017","bloodGroup":"b+"},{"studentName":"aashirya","fatherName":"ravi","motherName":"pooja","phone":"8812388123","alternativePhone":"77991239977","parentEmail":"pooja@gmail.com","currentAddress":"2nd Floor, ESID Bldg. Sirur Park Road,Seshadripuram, Bangalore-20","permanentAddress":"2nd Floor, 7th Cross, Goutham Nagar,Srirampuram, Bangalore-21","birthday":"03-08-1990","age":"20","location":"bangalor","course":"abc","batch":"1","joiningDate":"01-01-2017","bloodGroup":"ab+"},{"studentName":"abhay","fatherName":"North Anjaneya Temple Street,Basavanagudi,Bangalore-4","motherName":"NGEF Premises, Old Madras Road,Bangalore","phone":"9999123999","alternativePhone":"9494123944","parentEmail":"Abhay.hcl@gmail.com","currentAddress":"2nd Floor, 7th Cross, Goutham Nagar,Srirampuram, Bangalore-21","permanentAddress":"2nd Floor, ESID Bldg. Sirur Park Road,Seshadripuram, Bangalore-20","birthday":"24-04-1993","age":"21","location":"bangalor","course":"abc","batch":"1","joiningDate":"01-01-2017","bloodGroup":"b+"},{"studentName":"mohan","fatherName":"shakar","motherName":"priya","phone":"9999123999","alternativePhone":"9494123944","parentEmail":"shakar@gmail.com","currentAddress":"IstFloor,ESI Disp.Bldg, peenya,Bangalore – 560 058","permanentAddress":"IIIrd phase, Peenya, Bangalore-58","birthday":"24-04-1993","age":"17","location":"bangalor","course":"abc","batch":"1","joiningDate":"01-01-2017","bloodGroup":"b+"},{"studentName":"ramya","fatherName":"ganesh","motherName":"hema","phone":"8812388123","alternativePhone":"77991239977","parentEmail":"ganesh@gmail.com","currentAddress":"2nd Floor, ESID Bldg. Sirur Park Road,Seshadripuram, Bangalore-20","permanentAddress":"2nd Floor, 7th Cross, Goutham Nagar,Srirampuram, Bangalore-21","birthday":"03-08-1990","age":"20","location":"bangalor","course":"abc","batch":"1","joiningDate":"01-01-2017","bloodGroup":"ab+"},{"studentName":"gopi","fatherName":"tagor","motherName":"prasanna","phone":"9999123999","alternativePhone":"9494123944","parentEmail":"tagor@gmail.com","currentAddress":"IstFloor,ESI Disp.Bldg, peenya,Bangalore – 560 058","permanentAddress":"IIIrd phase, Peenya, Bangalore-58","birthday":"24-04-1993","age":"17","location":"bangalor","course":"abc","batch":"2","joiningDate":"01-01-2017","bloodGroup":"b+"},{"studentName":"kalpana","fatherName":"venkateawararao","motherName":"santhi","phone":"8812388123","alternativePhone":"77991239977","parentEmail":"venky@gmail.com","currentAddress":"2nd Floor, ESID Bldg. Sirur Park Road,Seshadripuram, Bangalore-20","permanentAddress":"2nd Floor, 7th Cross, Goutham Nagar,Srirampuram, Bangalore-21","birthday":"03-08-1990","age":"20","location":"bangalor","course":"abc","batch":"2","joiningDate":"01-01-2017","bloodGroup":"ab+"},{"studentName":"vinay","fatherName":"charan","motherName":"uma","phone":"9999123999","alternativePhone":"9494123944","parentEmail":"charan@gmail.com","currentAddress":"IstFloor,ESI Disp.Bldg, peenya,Bangalore – 560 058","permanentAddress":"IIIrd phase, Peenya, Bangalore-58","birthday":"24-04-1993","age":"17","location":"bangalor","course":"abc","batch":"2","joiningDate":"01-01-2017","bloodGroup":"b+"},{"studentName":"senha","fatherName":"ravikumar","motherName":"sindhu","phone":"8812388123","alternativePhone":"77991239977","parentEmail":"ravikumar@gmail.com","currentAddress":"2nd Floor, ESID Bldg. Sirur Park Road,Seshadripuram, Bangalore-20","permanentAddress":"2nd Floor, 7th Cross, Goutham Nagar,Srirampuram, Bangalore-21","birthday":"03-08-1990","age":"20","location":"bangalor","course":"abc","batch":"2","joiningDate":"01-01-2017","bloodGroup":"ab+"},{"studentName":"prasanna","fatherName":"ramexh","motherName":"ganga","phone":"9999123999","alternativePhone":"9494123944","parentEmail":"ramesh@gmail.com","currentAddress":"IstFloor,ESI Disp.Bldg, peenya,Bangalore – 560 058","permanentAddress":"IIIrd phase, Peenya, Bangalore-58","birthday":"24-04-1993","age":"17","location":"bangalor","course":"abc","batch":"2","joiningDate":"01-01-2017","bloodGroup":"b+"},{"studentName":"tejaswani","fatherName":"srinivas","motherName":"jhansi","phone":"8812388123","alternativePhone":"77991239977","parentEmail":"pooja@gmail.com","currentAddress":"2nd Floor, ESID Bldg. Sirur Park Road,Seshadripuram, Bangalore-20","permanentAddress":"2nd Floor, 7th Cross, Goutham Nagar,Srirampuram, Bangalore-21","birthday":"03-08-1990","age":"20","location":"bangalor","course":"abc","batch":"3","joiningDate":"01-01-2017","bloodGroup":"ab+"},{"studentName":"saivinela","fatherName":"harish","motherName":"vineetha","phone":"9999123999","alternativePhone":"9494123944","parentEmail":"bachan@gmail.com","currentAddress":"IstFloor,ESI Disp.Bldg, peenya,Bangalore – 560 058","permanentAddress":"IIIrd phase, Peenya, Bangalore-58","birthday":"24-04-1993","age":"17","location":"bangalor","course":"abc","batch":"3","joiningDate":"01-01-2017","bloodGroup":"b+"},{"studentName":"bhavan","fatherName":"praveen","motherName":"meghana","phone":"8812388123","alternativePhone":"77991239977","parentEmail":"pooja@gmail.com","currentAddress":"2nd Floor, ESID Bldg. Sirur Park Road,Seshadripuram, Bangalore-20","permanentAddress":"2nd Floor, 7th Cross, Goutham Nagar,Srirampuram, Bangalore-21","birthday":"03-08-1990","age":"20","location":"bangalor","course":"abc","batch":"3","joiningDate":"01-01-2017","bloodGroup":"ab+"},{"studentName":"abiyaram","fatherName":"tarakramarao","motherName":"lakshmi","phone":"9999123999","alternativePhone":"9494123944","parentEmail":"tarak@gmail.com","currentAddress":"IstFloor,ESI Disp.Bldg, peenya,Bangalore – 560 058","permanentAddress":"IIIrd phase, Peenya, Bangalore-58","birthday":"24-04-1993","age":"17","location":"bangalor","course":"abc","batch":"3","joiningDate":"01-01-2017","bloodGroup":"b+"},{"studentName":"aashirya","fatherName":"ravi","motherName":"pooja","phone":"8812388123","alternativePhone":"77991239977","parentEmail":"pooja@gmail.com","currentAddress":"2nd Floor, ESID Bldg. Sirur Park Road,Seshadripuram, Bangalore-20","permanentAddress":"2nd Floor, 7th Cross, Goutham Nagar,Srirampuram, Bangalore-21","birthday":"03-08-1990","age":"20","location":"bangalor","course":"abc","batch":"3","joiningDate":"01-01-2017","bloodGroup":"ab+"},{"studentName":"vijay","fatherName":"govindaraju","motherName":"devi","phone":"9999123999","alternativePhone":"9494123944","parentEmail":"raju@gmail.com","currentAddress":"IstFloor,ESI Disp.Bldg, peenya,Bangalore – 560 058","permanentAddress":"IIIrd phase, Peenya, Bangalore-58","birthday":"24-04-1993","age":"17","location":"bangalor","course":"abc","batch":"4","joiningDate":"01-01-2017","bloodGroup":"b+"},{"studentName":"chandu","fatherName":"muralikrishna","motherName":"komali","phone":"8812388123","alternativePhone":"77991239977","parentEmail":"komali@gmail.com","currentAddress":"2nd Floor, ESID Bldg. Sirur Park Road,Seshadripuram, Bangalore-20","permanentAddress":"2nd Floor, 7th Cross, Goutham Nagar,Srirampuram, Bangalore-21","birthday":"03-08-1990","age":"20","location":"bangalor","course":"abc","batch":"4","joiningDate":"01-01-2017","bloodGroup":"ab+"},{"studentName":"vishwak","fatherName":"ganesh","motherName":"koteswari","phone":"9999123999","alternativePhone":"9494123944","parentEmail":"ganesh@gmail.com","currentAddress":"IstFloor,ESI Disp.Bldg, peenya,Bangalore – 560 058","permanentAddress":"IIIrd phase, Peenya, Bangalore-58","birthday":"24-04-1993","age":"17","location":"bangalor","course":"abc","batch":"4","joiningDate":"01-01-2017","bloodGroup":"b+"},{"studentName":"lakshminarayana","fatherName":"sivanarayana","motherName":"pramella","phone":"8812388123","alternativePhone":"77991239977","parentEmail":"siva@gmail.com","currentAddress":"2nd Floor, ESID Bldg. Sirur Park Road,Seshadripuram, Bangalore-20","permanentAddress":"2nd Floor, 7th Cross, Goutham Nagar,Srirampuram, Bangalore-21","birthday":"03-08-1990","age":"20","location":"bangalor","course":"abc","batch":"4","joiningDate":"01-01-2017","bloodGroup":"ab+"},{"studentName":"tejasree","fatherName":"Ist Floor, ESID Bldg. IInd Cross, OTC Road, B’lore-53","motherName":"ESID Bldg, Ist Cross, Magadi Road, Bangalore-23","phone":"8812388123","alternativePhone":"77991239977","parentEmail":"teja@gmail.com","currentAddress":"2nd Floor, ESID Bldg. Sirur Park Road,Seshadripuram, Bangalore-20","permanentAddress":"2nd Floor, 7th Cross, Goutham Nagar,Srirampuram, Bangalore-21","birthday":"03-08-1990","age":"single","location":"bangalor","course":"abc","batch":"4","joiningDate":"01-01-2017","bloodGroup":"ab+"}];

})

app.controller('ApplicantRegistrationController', function ($rootScope, $scope, $timeout) {
  console.log('loading ApplicantRegistrationController');
})

app.controller('AttendanceController', function ($rootScope,$scope,$timeout) {

  $scope.moduleSubMenu = [{"title":"Attendance Register","tag":"Attendance register for Students","link":"acarr"},{"title":"Attendance Report","tag":"Attendance report of Students","link":"acart"},{"title":"Day-wise Attendance Report","tag":"Day-wise Attendance Report","link":"acdwar"}];

  if (window.localStorage['activeUser'] == null || window.localStorage['activeUser'] == undefined || window.localStorage['activeUser']== ""){
      window.location.href = "login.php";
    } else {
      $rootScope.activeUser = JSON.parse(window.localStorage['activeUser']);
      console.log('activeUser',$rootScope.activeUser);
  }

  $scope.setActiveAttendanceView = function (view) {
    $scope.activeAttendanceView = view;
    console.log('activeAttendanceView',view);
    window.localStorage['activeAttendanceView'] = view;
  }

  if (window.localStorage['activeAttendanceView'] == null || window.localStorage['activeAttendanceView'] == undefined || window.localStorage['activeAttendanceView']== ""){
    $scope.setActiveAttendanceView('none');
  } else {
    $scope.setActiveAttendanceView(window.localStorage['activeAttendanceView']);
  }

  $scope.courseBatchDetails = [{"sNo":"1","name":"Diploma in Theatre Semester 1(GPA)","code":"DT Sem1","batch":"0","student":"0"},{"sNo":"2","name":"Diploma in Theatre Semester 2(GPA)","code":"DT Sem2","batch":"0","student":"0"},{"sNo":"3","name":"Diploma in Theatre Semester 3(GPA)","code":"DT Sem3","batch":"0","student":"0"},{"sNo":"4","name":"Diploma in Theatre Semester 4(GPA)","code":"DT Sem4","batch":"0","student":"0"},{"sNo":"5","name":"Diploma in Theatre Semester 5(GPA)","code":"DT Sem5","batch":"0","student":"0"},{"sNo":"6","name":"Diploma in Theatre Semester 6(GPA)","code":"DT Sem6","batch":"1","student":"5"},{"sNo":"7","name":"Grade 1(Normal)","code":"G1","batch":"1","student":"11"},{"sNo":"8","name":"Grade 2(GPA)","code":"G2","batch":"1","student":"10"},{"sNo":"9","name":"Grade 3(CWA)","code":"G3","batch":"1","student":"10"},{"sNo":"10","name":"Grade 4(CSE)","code":"G4","batch":"1","student":"10"},{"sNo":"11","name":"Grade 5(CCE)","code":"G5","batch":"1","student":"10"}];

  $scope.formerStudentDetails = [{"studentName":"aadesh","fatherName":"bachan","motherName":"devi","phone":"9999123999","alternativePhone":"9494123944","parentEmail":"bachan@gmail.com","currentAddress":"IstFloor,ESI Disp.Bldg, peenya,Bangalore – 560 058","permanentAddress":"IIIrd phase, Peenya, Bangalore-58","birthday":"24-04-1993","age":"17","location":"bangalor","course":"abc","batch":"1","joiningDate":"01-01-2017","bloodGroup":"b+"},{"studentName":"aashirya","fatherName":"ravi","motherName":"pooja","phone":"8812388123","alternativePhone":"77991239977","parentEmail":"pooja@gmail.com","currentAddress":"2nd Floor, ESID Bldg. Sirur Park Road,Seshadripuram, Bangalore-20","permanentAddress":"2nd Floor, 7th Cross, Goutham Nagar,Srirampuram, Bangalore-21","birthday":"03-08-1990","age":"20","location":"bangalor","course":"abc","batch":"1","joiningDate":"01-01-2017","bloodGroup":"ab+"},{"studentName":"abhay","fatherName":"North Anjaneya Temple Street,Basavanagudi,Bangalore-4","motherName":"NGEF Premises, Old Madras Road,Bangalore","phone":"9999123999","alternativePhone":"9494123944","parentEmail":"Abhay.hcl@gmail.com","currentAddress":"2nd Floor, 7th Cross, Goutham Nagar,Srirampuram, Bangalore-21","permanentAddress":"2nd Floor, ESID Bldg. Sirur Park Road,Seshadripuram, Bangalore-20","birthday":"24-04-1993","age":"21","location":"bangalor","course":"abc","batch":"1","joiningDate":"01-01-2017","bloodGroup":"b+"},{"studentName":"mohan","fatherName":"shakar","motherName":"priya","phone":"9999123999","alternativePhone":"9494123944","parentEmail":"shakar@gmail.com","currentAddress":"IstFloor,ESI Disp.Bldg, peenya,Bangalore – 560 058","permanentAddress":"IIIrd phase, Peenya, Bangalore-58","birthday":"24-04-1993","age":"17","location":"bangalor","course":"abc","batch":"1","joiningDate":"01-01-2017","bloodGroup":"b+"},{"studentName":"ramya","fatherName":"ganesh","motherName":"hema","phone":"8812388123","alternativePhone":"77991239977","parentEmail":"ganesh@gmail.com","currentAddress":"2nd Floor, ESID Bldg. Sirur Park Road,Seshadripuram, Bangalore-20","permanentAddress":"2nd Floor, 7th Cross, Goutham Nagar,Srirampuram, Bangalore-21","birthday":"03-08-1990","age":"20","location":"bangalor","course":"abc","batch":"1","joiningDate":"01-01-2017","bloodGroup":"ab+"},{"studentName":"gopi","fatherName":"tagor","motherName":"prasanna","phone":"9999123999","alternativePhone":"9494123944","parentEmail":"tagor@gmail.com","currentAddress":"IstFloor,ESI Disp.Bldg, peenya,Bangalore – 560 058","permanentAddress":"IIIrd phase, Peenya, Bangalore-58","birthday":"24-04-1993","age":"17","location":"bangalor","course":"abc","batch":"2","joiningDate":"01-01-2017","bloodGroup":"b+"},{"studentName":"kalpana","fatherName":"venkateawararao","motherName":"santhi","phone":"8812388123","alternativePhone":"77991239977","parentEmail":"venky@gmail.com","currentAddress":"2nd Floor, ESID Bldg. Sirur Park Road,Seshadripuram, Bangalore-20","permanentAddress":"2nd Floor, 7th Cross, Goutham Nagar,Srirampuram, Bangalore-21","birthday":"03-08-1990","age":"20","location":"bangalor","course":"abc","batch":"2","joiningDate":"01-01-2017","bloodGroup":"ab+"},{"studentName":"vinay","fatherName":"charan","motherName":"uma","phone":"9999123999","alternativePhone":"9494123944","parentEmail":"charan@gmail.com","currentAddress":"IstFloor,ESI Disp.Bldg, peenya,Bangalore – 560 058","permanentAddress":"IIIrd phase, Peenya, Bangalore-58","birthday":"24-04-1993","age":"17","location":"bangalor","course":"abc","batch":"2","joiningDate":"01-01-2017","bloodGroup":"b+"},{"studentName":"senha","fatherName":"ravikumar","motherName":"sindhu","phone":"8812388123","alternativePhone":"77991239977","parentEmail":"ravikumar@gmail.com","currentAddress":"2nd Floor, ESID Bldg. Sirur Park Road,Seshadripuram, Bangalore-20","permanentAddress":"2nd Floor, 7th Cross, Goutham Nagar,Srirampuram, Bangalore-21","birthday":"03-08-1990","age":"20","location":"bangalor","course":"abc","batch":"2","joiningDate":"01-01-2017","bloodGroup":"ab+"},{"studentName":"prasanna","fatherName":"ramexh","motherName":"ganga","phone":"9999123999","alternativePhone":"9494123944","parentEmail":"ramesh@gmail.com","currentAddress":"IstFloor,ESI Disp.Bldg, peenya,Bangalore – 560 058","permanentAddress":"IIIrd phase, Peenya, Bangalore-58","birthday":"24-04-1993","age":"17","location":"bangalor","course":"abc","batch":"2","joiningDate":"01-01-2017","bloodGroup":"b+"},{"studentName":"tejaswani","fatherName":"srinivas","motherName":"jhansi","phone":"8812388123","alternativePhone":"77991239977","parentEmail":"pooja@gmail.com","currentAddress":"2nd Floor, ESID Bldg. Sirur Park Road,Seshadripuram, Bangalore-20","permanentAddress":"2nd Floor, 7th Cross, Goutham Nagar,Srirampuram, Bangalore-21","birthday":"03-08-1990","age":"20","location":"bangalor","course":"abc","batch":"3","joiningDate":"01-01-2017","bloodGroup":"ab+"},{"studentName":"saivinela","fatherName":"harish","motherName":"vineetha","phone":"9999123999","alternativePhone":"9494123944","parentEmail":"bachan@gmail.com","currentAddress":"IstFloor,ESI Disp.Bldg, peenya,Bangalore – 560 058","permanentAddress":"IIIrd phase, Peenya, Bangalore-58","birthday":"24-04-1993","age":"17","location":"bangalor","course":"abc","batch":"3","joiningDate":"01-01-2017","bloodGroup":"b+"},{"studentName":"bhavan","fatherName":"praveen","motherName":"meghana","phone":"8812388123","alternativePhone":"77991239977","parentEmail":"pooja@gmail.com","currentAddress":"2nd Floor, ESID Bldg. Sirur Park Road,Seshadripuram, Bangalore-20","permanentAddress":"2nd Floor, 7th Cross, Goutham Nagar,Srirampuram, Bangalore-21","birthday":"03-08-1990","age":"20","location":"bangalor","course":"abc","batch":"3","joiningDate":"01-01-2017","bloodGroup":"ab+"},{"studentName":"abiyaram","fatherName":"tarakramarao","motherName":"lakshmi","phone":"9999123999","alternativePhone":"9494123944","parentEmail":"tarak@gmail.com","currentAddress":"IstFloor,ESI Disp.Bldg, peenya,Bangalore – 560 058","permanentAddress":"IIIrd phase, Peenya, Bangalore-58","birthday":"24-04-1993","age":"17","location":"bangalor","course":"abc","batch":"3","joiningDate":"01-01-2017","bloodGroup":"b+"},{"studentName":"aashirya","fatherName":"ravi","motherName":"pooja","phone":"8812388123","alternativePhone":"77991239977","parentEmail":"pooja@gmail.com","currentAddress":"2nd Floor, ESID Bldg. Sirur Park Road,Seshadripuram, Bangalore-20","permanentAddress":"2nd Floor, 7th Cross, Goutham Nagar,Srirampuram, Bangalore-21","birthday":"03-08-1990","age":"20","location":"bangalor","course":"abc","batch":"3","joiningDate":"01-01-2017","bloodGroup":"ab+"},{"studentName":"vijay","fatherName":"govindaraju","motherName":"devi","phone":"9999123999","alternativePhone":"9494123944","parentEmail":"raju@gmail.com","currentAddress":"IstFloor,ESI Disp.Bldg, peenya,Bangalore – 560 058","permanentAddress":"IIIrd phase, Peenya, Bangalore-58","birthday":"24-04-1993","age":"17","location":"bangalor","course":"abc","batch":"4","joiningDate":"01-01-2017","bloodGroup":"b+"},{"studentName":"chandu","fatherName":"muralikrishna","motherName":"komali","phone":"8812388123","alternativePhone":"77991239977","parentEmail":"komali@gmail.com","currentAddress":"2nd Floor, ESID Bldg. Sirur Park Road,Seshadripuram, Bangalore-20","permanentAddress":"2nd Floor, 7th Cross, Goutham Nagar,Srirampuram, Bangalore-21","birthday":"03-08-1990","age":"20","location":"bangalor","course":"abc","batch":"4","joiningDate":"01-01-2017","bloodGroup":"ab+"},{"studentName":"vishwak","fatherName":"ganesh","motherName":"koteswari","phone":"9999123999","alternativePhone":"9494123944","parentEmail":"ganesh@gmail.com","currentAddress":"IstFloor,ESI Disp.Bldg, peenya,Bangalore – 560 058","permanentAddress":"IIIrd phase, Peenya, Bangalore-58","birthday":"24-04-1993","age":"17","location":"bangalor","course":"abc","batch":"4","joiningDate":"01-01-2017","bloodGroup":"b+"},{"studentName":"lakshminarayana","fatherName":"sivanarayana","motherName":"pramella","phone":"8812388123","alternativePhone":"77991239977","parentEmail":"siva@gmail.com","currentAddress":"2nd Floor, ESID Bldg. Sirur Park Road,Seshadripuram, Bangalore-20","permanentAddress":"2nd Floor, 7th Cross, Goutham Nagar,Srirampuram, Bangalore-21","birthday":"03-08-1990","age":"20","location":"bangalor","course":"abc","batch":"4","joiningDate":"01-01-2017","bloodGroup":"ab+"},{"studentName":"tejasree","fatherName":"Ist Floor, ESID Bldg. IInd Cross, OTC Road, B’lore-53","motherName":"ESID Bldg, Ist Cross, Magadi Road, Bangalore-23","phone":"8812388123","alternativePhone":"77991239977","parentEmail":"teja@gmail.com","currentAddress":"2nd Floor, ESID Bldg. Sirur Park Road,Seshadripuram, Bangalore-20","permanentAddress":"2nd Floor, 7th Cross, Goutham Nagar,Srirampuram, Bangalore-21","birthday":"03-08-1990","age":"single","location":"bangalor","course":"abc","batch":"4","joiningDate":"01-01-2017","bloodGroup":"ab+"}];


  $scope.attendanceReport = [
                          {"studentName":"aadesh","batch":"1","month":"June","year":"2017","noOfLeaves":"4"},
                          {"studentName":"aashirya","batch":"1","month":"June","year":"2017","noOfLeaves":"2"},
                          {"studentName":"abhay","batch":"1","month":"June","year":"2017","noOfLeaves":"1"},
                          {"studentName":"mohan","batch":"1","month":"June","year":"2017","noOfLeaves":"7"},
                          {"studentName":"ramya","batch":"1","month":"June","year":"2017","noOfLeaves":"4"},
                          {"studentName":"gopi","batch":"1","month":"June","year":"2017","noOfLeaves":"2"},
                          {"studentName":"kalpana","batch":"1","month":"June","year":"2017","noOfLeaves":"0"},
                          {"studentName":"vinay","batch":"1","month":"June","year":"2017","noOfLeaves":"1"},
                          {"studentName":"senha","batch":"1","month":"June","year":"2017","noOfLeaves":"2"},
                          {"studentName":"prasanna","batch":"1","month":"June","year":"2017","noOfLeaves":"4"},
                          {"studentName":"tejaswani","batch":"1","month":"June","year":"2017","noOfLeaves":"8"},
                          {"studentName":"saivinela","batch":"1","month":"June","year":"2017","noOfLeaves":"3"},
                          {"studentName":"bhavan","batch":"1","month":"June","year":"2017","noOfLeaves":"6"},
                          {"studentName":"abiyaram","batch":"1","month":"June","year":"2017","noOfLeaves":"9"},
                          {"studentName":"aashirya","batch":"1","month":"June","year":"2017","noOfLeaves":"4"},
                          {"studentName":"vijay","batch":"1","month":"June","year":"2017","noOfLeaves":"5"},
                          {"studentName":"chandu","batch":"1","month":"June","year":"2017","noOfLeaves":"7"},
                          {"studentName":"vishwak","batch":"1","month":"June","year":"2017","noOfLeaves":"3"},
                          {"studentName":"lakshminarayana","batch":"1","month":"June","year":"2017","noOfLeaves":"5"}
                        ];
})

app.controller('CustomImportsController', function ($rootScope, $scope, $timeout) {
  console.log('loading CustomImportsController');
  $scope.customImportList = [{'name':'Student Admission','model':'Student Admission'}];
})

app.controller('CustomReportsController', function ($rootScope, $scope, $timeout) {
  console.log('loading CustomReportsController');
  $scope.customReportList = [{'name':'Students with AB- blood group'},{'name':'Students with A- blood group'}];
})

app.controller('AuditController', function ($rootScope,$scope,$timeout) {

  $scope.moduleSubMenu = [{"title":"Activity Audit","tag":"View Activities","link":"acau"},{"title":"User Audit","tag":"View Userwise Activities","link":"usau"},{"title":"Data Audit","tag":"View Data Activities","link":"daau"}];

  if (window.localStorage['activeUser'] == null || window.localStorage['activeUser'] == undefined || window.localStorage['activeUser']== ""){
      window.location.href = "login.php";
    } else {
      $rootScope.activeUser = JSON.parse(window.localStorage['activeUser']);
      console.log('activeUser',$rootScope.activeUser);
  }

  $scope.setActiveAuditView = function (view) {
    $scope.activeAuditView = view;
    console.log('activeAuditView',view);
    window.localStorage['activeAuditView'] = view;
  }

  if (window.localStorage['activeAuditView'] == null || window.localStorage['activeAuditView'] == undefined || window.localStorage['activeAuditView']== ""){
    $scope.setActiveAuditView('none');
  } else {
    $scope.setActiveAuditView(window.localStorage['activeReportsView']);
  }

  $scope.activityAuditDetails = [{'activity':'login','module':'user','visits':'1'},{'activity':'logout','module':'user','visits':'1'}];
  $scope.userAuditDetails = [{'activity':'login','name':'admin','visits':'2','lastActive':'Yesterday'},{'activity':'logout','name':'admin','visits':'2','lastActive':'Today'}];


})

app.controller('BatchSummaryController', function ($rootScope,$scope,$timeout) {
  console.log('Loading BatchSummaryController');
  $scope.formerStudentDetails = [{"studentName":"aadesh","fatherName":"bachan","motherName":"devi","phone":"9999123999","alternativePhone":"9494123944","parentEmail":"bachan@gmail.com","currentAddress":"IstFloor,ESI Disp.Bldg, peenya,Bangalore – 560 058","permanentAddress":"IIIrd phase, Peenya, Bangalore-58","birthday":"24-04-1993","age":"17","location":"bangalor","course":"abc","batch":"1","joiningDate":"01-01-2017","bloodGroup":"b+"},{"studentName":"aashirya","fatherName":"ravi","motherName":"pooja","phone":"8812388123","alternativePhone":"77991239977","parentEmail":"pooja@gmail.com","currentAddress":"2nd Floor, ESID Bldg. Sirur Park Road,Seshadripuram, Bangalore-20","permanentAddress":"2nd Floor, 7th Cross, Goutham Nagar,Srirampuram, Bangalore-21","birthday":"03-08-1990","age":"20","location":"bangalor","course":"abc","batch":"1","joiningDate":"01-01-2017","bloodGroup":"ab+"},{"studentName":"abhay","fatherName":"North Anjaneya Temple Street,Basavanagudi,Bangalore-4","motherName":"NGEF Premises, Old Madras Road,Bangalore","phone":"9999123999","alternativePhone":"9494123944","parentEmail":"Abhay.hcl@gmail.com","currentAddress":"2nd Floor, 7th Cross, Goutham Nagar,Srirampuram, Bangalore-21","permanentAddress":"2nd Floor, ESID Bldg. Sirur Park Road,Seshadripuram, Bangalore-20","birthday":"24-04-1993","age":"21","location":"bangalor","course":"abc","batch":"1","joiningDate":"01-01-2017","bloodGroup":"b+"},{"studentName":"mohan","fatherName":"shakar","motherName":"priya","phone":"9999123999","alternativePhone":"9494123944","parentEmail":"shakar@gmail.com","currentAddress":"IstFloor,ESI Disp.Bldg, peenya,Bangalore – 560 058","permanentAddress":"IIIrd phase, Peenya, Bangalore-58","birthday":"24-04-1993","age":"17","location":"bangalor","course":"abc","batch":"1","joiningDate":"01-01-2017","bloodGroup":"b+"},{"studentName":"ramya","fatherName":"ganesh","motherName":"hema","phone":"8812388123","alternativePhone":"77991239977","parentEmail":"ganesh@gmail.com","currentAddress":"2nd Floor, ESID Bldg. Sirur Park Road,Seshadripuram, Bangalore-20","permanentAddress":"2nd Floor, 7th Cross, Goutham Nagar,Srirampuram, Bangalore-21","birthday":"03-08-1990","age":"20","location":"bangalor","course":"abc","batch":"1","joiningDate":"01-01-2017","bloodGroup":"ab+"},{"studentName":"gopi","fatherName":"tagor","motherName":"prasanna","phone":"9999123999","alternativePhone":"9494123944","parentEmail":"tagor@gmail.com","currentAddress":"IstFloor,ESI Disp.Bldg, peenya,Bangalore – 560 058","permanentAddress":"IIIrd phase, Peenya, Bangalore-58","birthday":"24-04-1993","age":"17","location":"bangalor","course":"abc","batch":"2","joiningDate":"01-01-2017","bloodGroup":"b+"},{"studentName":"kalpana","fatherName":"venkateawararao","motherName":"santhi","phone":"8812388123","alternativePhone":"77991239977","parentEmail":"venky@gmail.com","currentAddress":"2nd Floor, ESID Bldg. Sirur Park Road,Seshadripuram, Bangalore-20","permanentAddress":"2nd Floor, 7th Cross, Goutham Nagar,Srirampuram, Bangalore-21","birthday":"03-08-1990","age":"20","location":"bangalor","course":"abc","batch":"2","joiningDate":"01-01-2017","bloodGroup":"ab+"},{"studentName":"vinay","fatherName":"charan","motherName":"uma","phone":"9999123999","alternativePhone":"9494123944","parentEmail":"charan@gmail.com","currentAddress":"IstFloor,ESI Disp.Bldg, peenya,Bangalore – 560 058","permanentAddress":"IIIrd phase, Peenya, Bangalore-58","birthday":"24-04-1993","age":"17","location":"bangalor","course":"abc","batch":"2","joiningDate":"01-01-2017","bloodGroup":"b+"},{"studentName":"senha","fatherName":"ravikumar","motherName":"sindhu","phone":"8812388123","alternativePhone":"77991239977","parentEmail":"ravikumar@gmail.com","currentAddress":"2nd Floor, ESID Bldg. Sirur Park Road,Seshadripuram, Bangalore-20","permanentAddress":"2nd Floor, 7th Cross, Goutham Nagar,Srirampuram, Bangalore-21","birthday":"03-08-1990","age":"20","location":"bangalor","course":"abc","batch":"2","joiningDate":"01-01-2017","bloodGroup":"ab+"},{"studentName":"prasanna","fatherName":"ramexh","motherName":"ganga","phone":"9999123999","alternativePhone":"9494123944","parentEmail":"ramesh@gmail.com","currentAddress":"IstFloor,ESI Disp.Bldg, peenya,Bangalore – 560 058","permanentAddress":"IIIrd phase, Peenya, Bangalore-58","birthday":"24-04-1993","age":"17","location":"bangalor","course":"abc","batch":"2","joiningDate":"01-01-2017","bloodGroup":"b+"},{"studentName":"tejaswani","fatherName":"srinivas","motherName":"jhansi","phone":"8812388123","alternativePhone":"77991239977","parentEmail":"pooja@gmail.com","currentAddress":"2nd Floor, ESID Bldg. Sirur Park Road,Seshadripuram, Bangalore-20","permanentAddress":"2nd Floor, 7th Cross, Goutham Nagar,Srirampuram, Bangalore-21","birthday":"03-08-1990","age":"20","location":"bangalor","course":"abc","batch":"3","joiningDate":"01-01-2017","bloodGroup":"ab+"},{"studentName":"saivinela","fatherName":"harish","motherName":"vineetha","phone":"9999123999","alternativePhone":"9494123944","parentEmail":"bachan@gmail.com","currentAddress":"IstFloor,ESI Disp.Bldg, peenya,Bangalore – 560 058","permanentAddress":"IIIrd phase, Peenya, Bangalore-58","birthday":"24-04-1993","age":"17","location":"bangalor","course":"abc","batch":"3","joiningDate":"01-01-2017","bloodGroup":"b+"},{"studentName":"bhavan","fatherName":"praveen","motherName":"meghana","phone":"8812388123","alternativePhone":"77991239977","parentEmail":"pooja@gmail.com","currentAddress":"2nd Floor, ESID Bldg. Sirur Park Road,Seshadripuram, Bangalore-20","permanentAddress":"2nd Floor, 7th Cross, Goutham Nagar,Srirampuram, Bangalore-21","birthday":"03-08-1990","age":"20","location":"bangalor","course":"abc","batch":"3","joiningDate":"01-01-2017","bloodGroup":"ab+"},{"studentName":"abiyaram","fatherName":"tarakramarao","motherName":"lakshmi","phone":"9999123999","alternativePhone":"9494123944","parentEmail":"tarak@gmail.com","currentAddress":"IstFloor,ESI Disp.Bldg, peenya,Bangalore – 560 058","permanentAddress":"IIIrd phase, Peenya, Bangalore-58","birthday":"24-04-1993","age":"17","location":"bangalor","course":"abc","batch":"3","joiningDate":"01-01-2017","bloodGroup":"b+"},{"studentName":"aashirya","fatherName":"ravi","motherName":"pooja","phone":"8812388123","alternativePhone":"77991239977","parentEmail":"pooja@gmail.com","currentAddress":"2nd Floor, ESID Bldg. Sirur Park Road,Seshadripuram, Bangalore-20","permanentAddress":"2nd Floor, 7th Cross, Goutham Nagar,Srirampuram, Bangalore-21","birthday":"03-08-1990","age":"20","location":"bangalor","course":"abc","batch":"3","joiningDate":"01-01-2017","bloodGroup":"ab+"},{"studentName":"vijay","fatherName":"govindaraju","motherName":"devi","phone":"9999123999","alternativePhone":"9494123944","parentEmail":"raju@gmail.com","currentAddress":"IstFloor,ESI Disp.Bldg, peenya,Bangalore – 560 058","permanentAddress":"IIIrd phase, Peenya, Bangalore-58","birthday":"24-04-1993","age":"17","location":"bangalor","course":"abc","batch":"4","joiningDate":"01-01-2017","bloodGroup":"b+"},{"studentName":"chandu","fatherName":"muralikrishna","motherName":"komali","phone":"8812388123","alternativePhone":"77991239977","parentEmail":"komali@gmail.com","currentAddress":"2nd Floor, ESID Bldg. Sirur Park Road,Seshadripuram, Bangalore-20","permanentAddress":"2nd Floor, 7th Cross, Goutham Nagar,Srirampuram, Bangalore-21","birthday":"03-08-1990","age":"20","location":"bangalor","course":"abc","batch":"4","joiningDate":"01-01-2017","bloodGroup":"ab+"},{"studentName":"vishwak","fatherName":"ganesh","motherName":"koteswari","phone":"9999123999","alternativePhone":"9494123944","parentEmail":"ganesh@gmail.com","currentAddress":"IstFloor,ESI Disp.Bldg, peenya,Bangalore – 560 058","permanentAddress":"IIIrd phase, Peenya, Bangalore-58","birthday":"24-04-1993","age":"17","location":"bangalor","course":"abc","batch":"4","joiningDate":"01-01-2017","bloodGroup":"b+"},{"studentName":"lakshminarayana","fatherName":"sivanarayana","motherName":"pramella","phone":"8812388123","alternativePhone":"77991239977","parentEmail":"siva@gmail.com","currentAddress":"2nd Floor, ESID Bldg. Sirur Park Road,Seshadripuram, Bangalore-20","permanentAddress":"2nd Floor, 7th Cross, Goutham Nagar,Srirampuram, Bangalore-21","birthday":"03-08-1990","age":"20","location":"bangalor","course":"abc","batch":"4","joiningDate":"01-01-2017","bloodGroup":"ab+"},{"studentName":"tejasree","fatherName":"Ist Floor, ESID Bldg. IInd Cross, OTC Road, B’lore-53","motherName":"ESID Bldg, Ist Cross, Magadi Road, Bangalore-23","phone":"8812388123","alternativePhone":"77991239977","parentEmail":"teja@gmail.com","currentAddress":"2nd Floor, ESID Bldg. Sirur Park Road,Seshadripuram, Bangalore-20","permanentAddress":"2nd Floor, 7th Cross, Goutham Nagar,Srirampuram, Bangalore-21","birthday":"03-08-1990","age":"single","location":"bangalor","course":"abc","batch":"4","joiningDate":"01-01-2017","bloodGroup":"ab+"}];

})

app.controller('DisciplineController', function ($rootScope, $scope, $timeout) {
  console.log('Loading DisciplineController');

  $scope.complaints = [{'title':'Ragging','complaintNo':'C1000'},{'title':'Stolen My Purse','complaintNo':'C1001'},{'title':'Misbehaviour','complaintNo':'C1002'}];

})

app.controller('ProfileController', function ($rootScope, $scope, $timeout) {
  console.log('Loading ProfileController');

  $scope.profile ={'name':'Admin','id':'admin','joiningDate': 'March 01, 2017','department':'System Admin','category':'System Admin','position':'System Admin','grade':'System Admin','jobTitle':'Administrator','gender':'Male','email':'testmail@testcompany.com','status':'Active','qualification':'BE','totalExperience':'4','experienceInfo':'NA','biometricID':'NA'}

})

app.controller('PlacementsController', function ($rootScope, $scope, $timeout) {
  console.log('Loading PlacementsController');

  $scope.placements = [{'title':'Foradian Recruitment Drive','company':'Foradian Technologies','date':'February 25, 2015'}];

})

app.controller('FinanceController', function ($rootScope,$scope,$timeout) {
  console.log('Loading FinanceController');

  if (window.localStorage['activeUser'] == null || window.localStorage['activeUser'] == undefined || window.localStorage['activeUser']== ""){
      window.location.href = "login.php";
    } else {
      $rootScope.activeUser = JSON.parse(window.localStorage['activeUser']);
      console.log('activeUser',$rootScope.activeUser);
  }

  $scope.moduleSubMenu = [{"title":"Fees","tag":"Fees Control","link":"fe"},{"title":"Category","tag":"Manage Category","link":"ca"},{"title":"Transactions","tag":"Manage Transactions","link":"tr"},{"title":"Donations","tag":"Create new donations","link":"do"},{"title":"Employee Payslip Management","tag":"Manage employee payslips and generate the employee payslip report","link":"empama"},{"title":"Finance Reports","tag":"Show Transactions","link":"fire"},{"title":"Asset Liability Management","tag":"Asset Liability Management","link":"aslima"},{"title":"Tally Export","tag":"Manage Tally Exports","link":"taex"}];

  $scope.setActiveFinanceView = function (view) {
    $scope.activeFinanceView = view;
    console.log('activeFinanceView',view);
    window.localStorage['activeFinanceView'] = view;
  }

  if (window.localStorage['activeFinanceView'] == null || window.localStorage['activeFinanceView'] == undefined || window.localStorage['activeFinanceView']== ""){
    $scope.setActiveFinanceView('none');
   } else {
    $scope.setActiveFinanceView(window.localStorage['activeFinanceView']);
  }

  $scope.resetToDash = function () {
    $scope.setActiveFinanceView('none');
  }

})

app.controller('InventoryController', function ($rootScope,$scope,$timeout) {
  console.log('Loading InventoryController');

  if (window.localStorage['activeUser'] == null || window.localStorage['activeUser'] == undefined || window.localStorage['activeUser']== ""){
      window.location.href = "login.php";
    } else {
      $rootScope.activeUser = JSON.parse(window.localStorage['activeUser']);
      console.log('activeUser',$rootScope.activeUser);
  }

  $scope.moduleSubMenu = [{"title":"Store Category","tag":"Create and Manage store categories","link":"stca"},{"title":"Store Type","tag":"Create and manage store types","link":"stty"},{"title":"Store","tag":"Create and Manage Stores","link":"st"},
                          {"title":"Item Category","tag":"Create and Manage item categories","link":"itca"},{"title":"Store Items","tag":"Create and manage store items","link":"stit"},{"title":"Supplier Type","tag":"Create and Manage Supplier Types","link":"suty"},
                          {"title":"Supplier","tag":"Create and Manage suppliers","link":"su"},{"title":"Indents","tag":"Create indents","link":"in"},{"title":"Purchase Order","tag":"Manage Purchase Order","link":"puor"},
                          {"title":"Billing","tag":"Manage Invoice","link":"bi"},{"title":"GRN","tag":"Creates GRN","link":"grn"},{"title":"Reports","tag":"Generate Reports","link":"re"},{"title":"Tax Settings","tag":"Manage tax calculation mode","link":"tase"}];

  $scope.setActiveInventoryView = function (view) {
    $scope.activeInventoryView = view;
    console.log('activeInventoryView',view);
    window.localStorage['activeInventoryView'] = view;
  }

  if (window.localStorage['activeInventoryView'] == null || window.localStorage['activeInventoryView'] == undefined || window.localStorage['activeInventoryView']== ""){
    $scope.setActiveInventoryView('none');
   } else {
    $scope.setActiveInventoryView(window.localStorage['activeInventoryView']);
  }

  $scope.resetToDash = function () {
    $scope.setActiveOnlinePaymentView('none');
  }

})

app.controller('ReminderController', function ($rootScope,$scope,$timeout) {
  console.log('Loading ReminderController');

  if (window.localStorage['activeUser'] == null || window.localStorage['activeUser'] == undefined || window.localStorage['activeUser']== ""){
      window.location.href = "login.php";
    } else {
      $rootScope.activeUser = JSON.parse(window.localStorage['activeUser']);
      console.log('activeUser',$rootScope.activeUser);
  }

  $scope.moduleSubMenu = [{"title":"Reminder Settings","tag":"Create and manage reminders for events, fee schedules and exam schedules","link":"rese"},{"title":"Create Custom Reminders","tag":"Create custom reminders for upcoming institutional events","link":"crcure"},{"title":"View Event Reminders","tag":"View and update reminders for upcoming events, fee schedules and exam schedules","link":"vievre"},{"title":"View Custom Reminders","tag":"View and update custom reminders for upcoming institutional events","link":"do"}];

  $scope.setActiveReminderView = function (view) {
    $scope.activeReminderView = view;
    console.log('activeReminderView',view);
    window.localStorage['activeReminderView'] = view;
  }

  if (window.localStorage['activeReminderView'] == null || window.localStorage['activeReminderView'] == undefined || window.localStorage['activeReminderView']== ""){
    $scope.setActiveReminderView('none');
   } else {
    $scope.setActiveReminderView(window.localStorage['activeReminderView']);
  }

  $scope.resetToDash = function () {
    $scope.setActiveReminderView('none');
  }

})

app.controller('TransportController', function ($rootScope,$scope,$timeout) {
  console.log('Loading TransportController');

  if (window.localStorage['activeUser'] == null || window.localStorage['activeUser'] == undefined || window.localStorage['activeUser']== ""){
      window.location.href = "login.php";
    } else {
      $rootScope.activeUser = JSON.parse(window.localStorage['activeUser']);
      console.log('activeUser',$rootScope.activeUser);
  }

  $scope.moduleSubMenu = [{"title":"Set Routes","tag":"Set the routes for vehicles","link":"sero"},{"title":"Vehicles","tag":"Vehicle Details","link":"vede"},{"title":"Transport","tag":"Transport Details","link":"tr"},{"title":"Transport Fee","tag":"Transport Fee Details","link":"trfe"},{"title":"Report","tag":"Generate Report","link":"gere"},{"title":"Manage route additional details","tag":"Additional Details","link":"maroadde"},{"title":"Manage vehicle additional details","tag":"Additional Details","link":"maveadde"}];

  $scope.setActiveTransportView = function (view) {
    $scope.activeTransportView = view;
    console.log('activeTransportView',view);
    window.localStorage['activeTransportView'] = view;
  }

  if (window.localStorage['activeTransportView'] == null || window.localStorage['activeTransportView'] == undefined || window.localStorage['activeTransportView']== ""){
    $scope.setActiveTransportView('none');
   } else {
    $scope.setActiveTransportView(window.localStorage['activeTransportView']);
  }

  $scope.resetToDash = function () {
    $scope.setActiveTransportView('none');
  }

})
