<div class="container-fluid" style="position:fixed;width:100%;height:60px;z-index:10;" ng-mouseleave="setActiveSubNav('none')">
  <div class="row">
    <div class="col-md-2 sideNav">
      <b>COLLEGE MANAGEMENT SYSTEM</b>
    </div>
    <div class="col-md-10 navBarElements">
      <div class="row setWhite">
        <div class="col-md-4 pad-20">
          <a><i class="fa fa-fw fa-dedent"></i></a>
          <a><i class="icon-user fa-fw"></i></a>
          <a>Quick Links <span class="caret"></span></a>
          <a>New <span class="caret"></span></a>
        </div>
        <div class="col-md-3 col-md-offset-5 pad-10 right">
          <a><i class="icon-bell fa-fw"></i><span class="badge badge-sm up bg-danger pull-right-xs">2</span></a>
          <a ng-mouseover="setActiveSubNav('profile')">{{activeUser.name}} <span class="caret"></span></a>
          <a><span class="avatar">
            <img src="img/a0.jpg" alt="...">
            <i class="on md b-white bottom"></i>
          </span></a>
        </div>
      </div>
    </div>
  </div>
 <div class="row">
   <div class="col-md-10 col-md-offset-2">
     <div class="col-md-3 col-md-offset-9 center pad-20" style="background-color:white;" ng-mouseleave="setActiveSubNav('none')" ng-show="activeSubNav=='profile'">
       <div ng-click="logoutActiveUser()">Logout</div>
     </div>
   </div>
 </div>
</div>
<div style="height:60px"></div>
<!-- Scrollers -->
<div id="scrollToBottom" onclick="window.scrollTo(0,document.body.scrollHeight);" style="background-color:rgba(0,0,0,0.5);color:white;"><i class="fa fa-fw fa-angle-down pullRight" style="font-size:18px;"></i></div>
<div id="scrollToTop" onclick="window.scrollTo(0,0);" style="background-color:rgba(0,0,0,0.5);color:white;"><i class="fa fa-fw fa-angle-up pullRight" style="font-size:18px;"></i></div>
<script>
  //Scroll Detector
  window.onscroll = function() {myFunction()};
  document.getElementById("scrollToTop").style.visibility = "hidden";
  document.getElementById("scrollToBottom").style.visibility = "hidden";
  function myFunction() {
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
      document.getElementById("scrollToTop").style.visibility = "visible";
      document.getElementById("scrollToBottom").style.visibility = "visible";
    } else {
      document.getElementById("scrollToTop").style.visibility = "hidden";
      document.getElementById("scrollToBottom").style.visibility = "hidden";
    }
  }
</script>
