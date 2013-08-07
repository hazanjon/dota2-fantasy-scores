<!DOCTYPE html>
<html>
<head>
    <title>TI3 Fantasy Challenge Scores</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet" media="screen" />
    <script type="text/javascript" src="/js/knockout-2.3.0.js"></script>
    <script type="text/javascript" src="/ti3-data.js"></script>
    <script type="text/javascript" src="/js/frontend.js"></script>
</head>
<body>
    <!-- ko if: showPlayer() == 0 -->
        <table class="table table_hover">
            <thead>
                <tr>
                    <th>Player</th>
                    <th>Position</th>
                    <!-- ko foreach: days -->
                        <th data-bind="text: 'Day ' + $data"></th>
                    <!-- /ko -->
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <!-- ko foreach: dfc.vm.playerData -->
                    <tr>
                        <!-- ko with: player -->
                            <td style="cursor: pointer">
                                    <a data-bind="click: function(){ $root.showPlayer(account_id); return false}">
                                        <img data-bind="attr: {src: avatar}">
                                        <span data-bind="text: personaname"></span>
                                    </a>
                            </td>
                            <td>
                                <span data-bind="text: fantasy_role.capitalize()"></span>
                            </td>
                        <!-- /ko -->
                        
                        <!-- ko foreach: dfc.vm.days -->
                            <td>
                            <!-- ko with: $parent.days[$index()] -->
                                <span data-bind="text: total"></span>
                            <!-- /ko -->
                            </td>
                        <!-- /ko -->
                        <td data-bind="text: days.sumValue('total').toFixed(2)">Total here</td>
                    </tr>
                <!-- /ko -->
            </tbody>
        </table>
    <!-- /ko -->
    <!-- ko ifnot: showPlayer() == 0 -->
        <!-- ko with: playerData().byId(showPlayer()) -->
            <div class="row">
                <span class="span2">
                    <img data-bind="attr: {src: player.avatarfull}" class="img-polaroid">
                </span>
                <span class="span8">
                    <div class="row">
                        <span class="span8">
                            <h1 data-bind="text: player.personaname"></h1>
                        </span>
                    </div>  
                    <div class="row">
                        <span class="span8">
                            <h3 data-bind="text: player.fantasy_role.capitalize()"></h3>
                        </span>
                    </div>  
                </span>
                <span class="span2">
                    <button type="button" class="btn btn-primary" data-bind="click: function(){ $root.showPlayer(0); return false}">Back</button>
                </span>
            </div>
            <!-- ko foreach: days -->
                <h2 data-bind="text: 'Day ' + id"></h2>
                
                <table class="table table_hover">
                    <thead>
                        <tr>                    
                            <th>ID</th>
                            <th>Radiant</th>
                            <th>Dire</th>
                            <th>Time</th>
                            <th>Kills</th>
                            <th>Deaths</th>
                            <th>Assists</th>
                            <th>Last Hits</th>
                            <th>GPM</th>
                            <th>XPM</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- ko foreach: breakdown -->
                            <tr>
                                <!-- ko with: $root.matchData().byValue('match_id', match_id) -->
                                    <td data-bind="text: match_id"></td>
                                    <td data-bind="text: radiant_name"></td>
                                    <td data-bind="text: dire_name"></td>
                                    <td data-bind="text: start_time"></td>
                                <!-- /ko -->
                                
                                <td data-bind="text: points.kills.toFixed(2)"></td>
                                <td data-bind="text: points.deaths.toFixed(2)"></td>
                                <td data-bind="text: points.assists.toFixed(2)"></td>
                                <td data-bind="text: points.last_hits.toFixed(2)"></td>
                                <td data-bind="text: points.gold_per_min.toFixed(2)"></td>
                                <td data-bind="text: points.xp_per_min.toFixed(2)"></td>
                                <td data-bind="text: total.toFixed(2)"></td>
                            </tr>
                        <!-- /ko -->
                        <tr class="success">
                            <td colspan="4">Totals</td>
                            <td data-bind="text: breakdown.sumValue('points', 'kills').toFixed(2)"></td>
                            <td data-bind="text: breakdown.sumValue('points', 'deaths').toFixed(2)"></td>
                            <td data-bind="text: breakdown.sumValue('points', 'assists').toFixed(2)"></td>
                            <td data-bind="text: breakdown.sumValue('points', 'last_hits').toFixed(2)"></td>
                            <td data-bind="text: breakdown.sumValue('points', 'gold_per_min').toFixed(2)"></td>
                            <td data-bind="text: breakdown.sumValue('points', 'xp_per_min').toFixed(2)"></td>
                            <td><strong><span data-bind="text: total.toFixed(2)"></span></strong></td>
                        </tr>
                        <!-- /ko -->
                    </tbody>
                </table>
            <!-- /ko -->
        <!-- /ko -->
    <!-- /ko -->
</body>
    <script>
        dfc.vm = new viewModel();
        ko.applyBindings(dfc.vm);
    </script>
</html>  