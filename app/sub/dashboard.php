<div data-ng-controller="DashboardController">
  <div id="pageHeader" style="background-color:#F6F8F8;padding:20px;color:#646565;font-size:18px;">
    Dashboard
  </div>
  <div id="pageBackground" class="center pad-20">
    <div class="col-md-3 col-md-offset-1 pad-10">
      <div class="dashCard" ng-show="activeUser.type=='a'" ng-repeat="card in aDashCardsLeft" id="card.title">
        <div ng-hide="card.active == 'true'" ng-click="card.active = 'true'">
          {{card.title}} <i class="fa fa-fw fa-angle-down pullRight" style="font-size:18px;"></i>
        </div>
        <div ng-show="card.active == 'true'" ng-click="card.active=''">
          {{card.title}} <i class="fa fa-fw fa-angle-up pullRight" style="font-size:18px;"></i>
          <hr>
          {{card.content}}
        </div>
      </div>
      <div class="dashCard" ng-show="activeUser.type=='s' || activeUser.type=='p'" ng-repeat="card in sDashCardsLeft" id="card.title">
        <div ng-hide="card.active == 'true'" ng-click="card.active = 'true'">
          {{card.title}} <i class="fa fa-fw fa-angle-down pullRight" style="font-size:18px;"></i>
        </div>
        <div ng-show="card.active == 'true'" ng-click="card.active=''">
          {{card.title}} <i class="fa fa-fw fa-angle-up pullRight" style="font-size:18px;"></i>
          <hr>
          {{card.content}}
        </div>
      </div>
      <div class="dashCard" ng-show="activeUser.type=='e'" ng-repeat="card in eDashCardsLeft" id="card.title">
        <div ng-hide="card.active == 'true'" ng-click="card.active = 'true'">
          {{card.title}} <i class="fa fa-fw fa-angle-down pullRight" style="font-size:18px;"></i>
        </div>
        <div ng-show="card.active == 'true'" ng-click="card.active=''">
          {{card.title}} <i class="fa fa-fw fa-angle-up pullRight" style="font-size:18px;"></i>
          <hr>
          {{card.content}}
        </div>
      </div>
    </div>
    <div class="col-md-3 pad-10">
      <div class="dashCard" ng-show="activeUser.type=='a'" ng-repeat="card in aDashCardsMiddle" id="card.title">
        <div ng-hide="card.active == 'true'" ng-click="card.active = 'true'">
          {{card.title}} <i class="fa fa-fw fa-angle-down pullRight" style="font-size:18px;"></i>
        </div>
        <div ng-show="card.active == 'true'" ng-click="card.active=''">
          {{card.title}} <i class="fa fa-fw fa-angle-up pullRight" style="font-size:18px;"></i>
          <hr>
          {{card.content}}
        </div>
      </div>
      <div class="dashCard" ng-show="activeUser.type=='s' || activeUser.type=='p'" ng-repeat="card in sDashCardsMiddle" id="card.title">
        <div ng-hide="card.active == 'true'" ng-click="card.active = 'true'">
          {{card.title}} <i class="fa fa-fw fa-angle-down pullRight" style="font-size:18px;"></i>
        </div>
        <div ng-show="card.active == 'true'" ng-click="card.active=''">
          {{card.title}} <i class="fa fa-fw fa-angle-up pullRight" style="font-size:18px;"></i>
          <hr>
          {{card.content}}
        </div>
      </div>
      <div class="dashCard" ng-show="activeUser.type=='e'" ng-repeat="card in eDashCardsMiddle" id="card.title">
        <div ng-hide="card.active == 'true'" ng-click="card.active = 'true'">
          {{card.title}} <i class="fa fa-fw fa-angle-down pullRight" style="font-size:18px;"></i>
        </div>
        <div ng-show="card.active == 'true'" ng-click="card.active=''">
          {{card.title}} <i class="fa fa-fw fa-angle-up pullRight" style="font-size:18px;"></i>
          <hr>
          {{card.content}}
        </div>
      </div>
    </div>
    <div class="col-md-3 pad-10">
      <div class="dashCard" ng-show="activeUser.type=='a'" ng-repeat="card in aDashCardsRight" id="card.title">
        <div ng-hide="card.active == 'true'" ng-click="card.active = 'true'">
          {{card.title}} <i class="fa fa-fw fa-angle-down pullRight" style="font-size:18px;"></i>
        </div>
        <div ng-show="card.active == 'true'" ng-click="card.active=''">
          {{card.title}} <i class="fa fa-fw fa-angle-up pullRight" style="font-size:18px;"></i>
          <hr>
          {{card.content}}
        </div>
      </div>
      <div class="dashCard" ng-show="activeUser.type=='s' || activeUser.type=='p'" ng-repeat="card in sDashCardsRight" id="card.title">
        <div ng-hide="card.active == 'true'" ng-click="card.active = 'true'">
          {{card.title}} <i class="fa fa-fw fa-angle-down pullRight" style="font-size:18px;"></i>
        </div>
        <div ng-show="card.active == 'true'" ng-click="card.active=''">
          {{card.title}} <i class="fa fa-fw fa-angle-up pullRight" style="font-size:18px;"></i>
          <hr>
          {{card.content}}
        </div>
      </div>
      <div class="dashCard" ng-show="activeUser.type=='e'" ng-repeat="card in eDashCardsRight" id="card.title">
        <div ng-hide="card.active == 'true'" ng-click="card.active = 'true'">
          {{card.title}} <i class="fa fa-fw fa-angle-down pullRight" style="font-size:18px;"></i>
        </div>
        <div ng-show="card.active == 'true'" ng-click="card.active=''">
          {{card.title}} <i class="fa fa-fw fa-angle-up pullRight" style="font-size:18px;"></i>
          <hr>
          {{card.content}}
        </div>
      </div>
    </div>
  </div>
</div>
