<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">

<?php
include "index.php";
?>
  <title>Interesting Data Analysis</title>
  
  
  <script src="echarts.js"></script>
      <link rel="stylesheet" href="css/style6.css">

  
</head>

<body>
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/box2d/Box2dWeb-2.1.a.3.min.js"></script>



<!--DESCRIBE DATUM WHICH IS RESULT IN BAD RESULT-->

<h1>Bomb the bad result</h1>
<div id="container" style="width: 900px; height: 500px; position:relative; align:center;">
  <span style="width : 200 px; height : 300 px;"></span><div id="chartdiv" style="width : 100%; height: 500px; position:absolute;" ontouchstart="addBird();" onmousedown="addBird();" onmouseup="releaseBird();" ontouchend="releaseBird();"></div>
  <img src="https://www.amcharts.com/lib/coffee/slingshot.png" style="width:70px; height:110px; position:absolute; bottom:17px; left:100px; pointer-events: none;"></img>
  <img src="https://www.amcharts.com/lib/coffee/redbird.png" id="bird" style="width:45px; height:45px; position:absolute; top:-100px; left:50px; pointer-events: none;"></img>
  <div style="width:300px; top:84px; left:95px; position:absolute;">Angry bird is used to destory the bad record and </a>. P.S. you know where to get the <a target="_blank" href="http://www.rovio.com">original game ;)</a></div>
</div>

<!--Chart for compare family 's data-->

<h1>Compare result with giant</h1>
 <div id="main" style="height:700px"></div>

 <!--chart for compare the family's data-->
<!--<canvas id="canvas" width="900px" height="500px"></canvas>-->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>


 <script type="text/javascript">

var meansed =  "<?php echo $_SESSION["MEANSED"]; ?>";
var meanmod =  "<?php echo $_SESSION["MEANMOD"]; ?>";
var meanla =  "<?php echo $_SESSION["MEANLA"]; ?>";
var meanma =  "<?php echo $_SESSION["MEANMA"]; ?>";
var caloriesbmr = "<?php echo $_SESSION["MEANCALBMR"]; ?>";
var caloriesmean = "<?php echo $_SESSION["MEANCALO"]; ?>";



function randomData() {


  return [{
      "year": "",
    }, {
      "year": "",
    }, {
      "year": "",
    }, {
      "year": "",
    }, {
      "year": "",
    }, {
      "year": "",
    },

    {
      "year": "Cardio",
      "meanmod": meanmod*1000 ,
      "meanma": meanma*1000,
      "meanla": meanla*1000,


      "pattern": {
        "url": "https://www.amcharts.com/lib/3/patterns/black/pattern5.png",
        "width": 4,
        "height": 4
      },
      "color": "#000000"
    }, 



    {
      "year": "Calories",
      "meanca": caloriesmean,
      "BMR": caloriesbmr,
      "pattern": {
        "url": "https://www.amcharts.com/lib/3/patterns/black/pattern5.png",
        "width": 4,
        "height": 4
      },
      "color": "#000000"
    },

    {
      "year": "other Physical Data",
      "europe": randomVal(),
      "namerica": randomVal(),
      "asia": randomVal()
    },

    {
      "year": "",
    },

    {
      "year": "",
    },

    {
      "year": "",
    }
  ];
}

var chart = AmCharts.makeChart("chartdiv", {
  "type": "serial",
  "marginLeft": 10,
  "marginBottom": 20,
  "balloon": {
    "fontSize": 16
  },
  "panEventsEnabled": true,
  "autoMargins": false,
  "startDuration": 1,
  "columnWidth": 0.4,
  "dataProvider": randomData(),
  "valueAxes": [{
    "stackType": "regular",
    "axisAlpha": 0.3,
    "gridAlpha": 0.1,
    "inside": true,
    "position": "left"
  }],
  "graphs": [

   {
    "fillAlphas": 0.8,
    "lineAlpha": 0.3,
    "title": "Mean of calories Out ",
    "type": "column",
    "color": "#000000",
    "cornerRadiusTop": 6,
    "valueField": "meanca",
    "balloonText": "[[title]]:[[value]]"
  }
  ,{
    "fillAlphas": 0.8,
    "lineAlpha": 0.3,
    "title": "Mean of moderately Active (*1000 times for data)",
    "type": "column",
    "color": "#000000",
    "cornerRadiusTop": 6,
    "valueField": "meanma",
    "balloonText": "[[title]]:[[value]]"
  }, 
  {
    "fillAlphas": 0.8,
    "lineAlpha": 0.3,
    "title": "Mean of lightly Active (*1000 times for data)",
    "type": "column",
    "color": "#000000",
    "cornerRadiusTop": 6,
    "valueField": "meanla",
    "balloonText": "[[title]]:[[value]]"
  }, 
   {
    "fillAlphas": 0.8,
    "lineAlpha": 0.3,
    "title": "Mean of moderately Active (*1000 times for data)",
    "type": "column",
    "color": "#000000",
    "cornerRadiusTop": 6,
    "valueField": "meanmod",
    "balloonText": "[[title]]:[[value]]"
  }, {
    "fillAlphas": 0.8,
    "lineAlpha": 0.3,
    "title": "Monthly mean of Calories BMR for your family",
    "type": "column",
    "color": "#000000",
    "cornerRadiusTop": 6,
    "valueField": "BMR",
    "balloonText": "[[title]]:[[value]]"
  },
  {
    "fillAlphas": 0.8,
    "lineAlpha": 0.3,
    "title": "Over",
    "type": "column",
    "color": "#000000",
    "cornerRadiusTop": 6,
    "valueField": "europe",
    "balloonText": "[[title]]:[[value]]"
  }, {
    "fillAlphas": 0.8,
    "lineAlpha": 0.5,
    "title": "ok and satisfactory",
    "type": "column",
    "color": "#000000",
    "lineColorField": "color",
    "patternField": "pattern",
    "cornerRadiusTop": 6,
    "valueField": "namerica",
    "balloonText": "[[title]]:[[value]]"
  }, {
    "fillAlphas": 0.8,
    "lineAlpha": 0.3,
    "title": "not acceptable",
    "type": "column",
    "color": "#000000",
    "cornerRadiusTop": 6,
    "valueField": "asia",
    "balloonText": "[[title]]:[[value]]"
  }],
  "categoryField": "year",
  "categoryAxis": {
    "gridPosition": "start",
    "axisAlpha": 0.3,
    "gridAlpha": 0.1,
    "tickLength": 0
  }
});

// generate random val
function randomVal() {
  return Math.round(Math.random() * 5) + 2;
}

// listen for init
chart.addListener("init", init);

// BOX2D (Physics) part
var width = 900;
var height = 500;
var pixels2meters = 30; // box2d uses meters, not pixels and this is ratio
var framesPerSecond = 30;
var world;
var columns = [];
var birdBody;
var birdBodyDef;
var birdFixtureDef;

function init() {
  setTimeout(initBox2D, 2000);
  bird = document.getElementById("bird");
}

function initBox2D() {
  var b2Vec2 = Box2D.Common.Math.b2Vec2;
  var b2BodyDef = Box2D.Dynamics.b2BodyDef;
  var b2Body = Box2D.Dynamics.b2Body;
  var b2FixtureDef = Box2D.Dynamics.b2FixtureDef;
  var b2Fixture = Box2D.Dynamics.b2Fixture;
  var b2World = Box2D.Dynamics.b2World;
  var b2PolygonShape = Box2D.Collision.Shapes.b2PolygonShape;
  var b2CircleShape = Box2D.Collision.Shapes.b2CircleShape;
  var b2DistanceJointDef = Box2D.Dynamics.Joints.b2DistanceJointDef;
  var b2DebugDraw = Box2D.Dynamics.b2DebugDraw;

  world = new b2World(
    new b2Vec2(0, 10),
    true
  );

  // ground. please, study box2d tutorials if you want to understand everything below
  var wallsBodyDef = new b2BodyDef();
  wallsBodyDef.type = b2Body.b2_staticBody;
  var wallsFixtureDef = new b2FixtureDef();
  wallsFixtureDef.density = 1.0;
  wallsFixtureDef.friction = 0.5;
  wallsFixtureDef.restitution = 0.2;
  wallsFixtureDef.shape = new b2PolygonShape();
  wallsFixtureDef.shape.SetAsBox(width / pixels2meters, 10 / pixels2meters);
  wallsBodyDef.position.Set(0, (height - 10) / pixels2meters);
  world.CreateBody(wallsBodyDef).CreateFixture(wallsFixtureDef);

  // bird
  birdBodyDef = new b2BodyDef();
  birdBodyDef.angularDamping = 3;
  birdBodyDef.linearDamping = 0.5;
  birdBodyDef.type = b2Body.b2_dynamicBody;

  birdFixtureDef = new b2FixtureDef();
  birdFixtureDef.density = 2;
  birdFixtureDef.friction = 3;
  birdFixtureDef.restitution = 0.000000000006;
  birdFixtureDef.shape = new b2CircleShape(20 / pixels2meters);

  birdBodyDef.position.Set(50 / pixels2meters, -20 / pixels2meters);
  birdBody = world.CreateBody(birdBodyDef).CreateFixture(birdFixtureDef);

  // rectangles
  var rectangleBodyDef = new b2BodyDef();
  rectangleBodyDef.angularDamping = 3;
  rectangleBodyDef.linearDamping = 0.5;
  rectangleBodyDef.type = b2Body.b2_dynamicBody;

  // fixed rectangle
  var fixedRectangleBodyDef = new b2BodyDef();
  fixedRectangleBodyDef.type = b2Body.b2_staticBody;

  var rectangleFixtureDef = new b2FixtureDef();
  rectangleFixtureDef.density = 0.2;
  rectangleFixtureDef.friction = 0.3;
  rectangleFixtureDef.restitution = 0.6;

  // now, loop through all columns

  for (var i = 0; i < chart.graphs.length; i++) {
    for (var j = 0; j < chart.graphs[i].columnsArray.length; j++) {
      columns.push(chart.graphs[i].columnsArray[j]);
    }
  }

  var x0 = 10;
  var y0 = 21;

  for (var i = 0; i < columns.length; i++) {
    var column = columns[i].column;
    var w = Math.abs(column.w);
    var h = Math.abs(column.h) - 0.5;
    var x = column.set.x + x0 + w / 2;
    var y = column.set.y + y0 - h / 2;

    // create block
    rectangleFixtureDef.shape = new b2PolygonShape();
    rectangleFixtureDef.shape.SetAsBox(w / 2 / pixels2meters, h / 2 / pixels2meters);

    // blocks with patterns are fixed (for more fun)
    if (column.pattern) {
      fixedRectangleBodyDef.position.Set(x / pixels2meters, y / pixels2meters);
      column.body = world.CreateBody(fixedRectangleBodyDef).CreateFixture(rectangleFixtureDef);
    } else {
      rectangleBodyDef.position.Set(x / pixels2meters, y / pixels2meters);
      column.body = world.CreateBody(rectangleBodyDef).CreateFixture(rectangleFixtureDef);
    }
  }

  //setup debug draw (if you don't need it, just delete the lines, uncomment to see how box objects are drawn)
  /*
var debugDraw = new b2DebugDraw();
debugDraw.SetSprite(document.getElementById("canvas").getContext("2d"));
debugDraw.SetDrawScale(pixels2meters);
debugDraw.SetFillAlpha(0.5);
debugDraw.SetLineThickness(1.0);
debugDraw.SetFlags(b2DebugDraw.e_shapeBit | b2DebugDraw.e_jointBit);
world.SetDebugDraw(debugDraw);
*/
  window.setInterval(update, 1000 / framesPerSecond);
}

//update blocks and bird
function update() {

  var x0 = 10;
  var y0 = 21;

  for (var i = 0; i < columns.length; i++) {
    var column = columns[i].column;
    var position = column.body.GetBody().GetPosition();
    var angle = column.body.GetBody().GetAngle();
    // a bit complicated transforms
    column.set.translate(position.x * pixels2meters - x0 - column.w / 2, position.y * pixels2meters - column.h / 2 - y0, 1, true);
    var node = column.set.node;
    var transform = node.getAttribute("transform");
    var val = "rotate(" + (angle * 180 / Math.PI) + "," + column.w / 2 + "," + column.h / 2 + ")";
    if (transform) {
      val = transform + " " + val;
    }
    node.setAttribute("transform", val);
  }

  if (isDragging) {
    bird.style.top = (chart.mouseY - 25) + "px";
    bird.style.left = (chart.mouseX - 25) + "px";
    // draw lines
    createLines(chart.mouseX, chart.mouseY);
  } else {
    if (birdBody) {
      var body = birdBody.GetBody();
      var birdPosition = body.GetPosition();
      bird.style.top = ((birdPosition.y) * pixels2meters - 25) + "px";
      bird.style.left = ((birdPosition.x) * pixels2meters - 25) + "px";
    }
  }

  world.Step(1 / framesPerSecond, 10, 10);

  // uncomment next line if you want to see box2d objects in action (also canvas element at the bottom)
  //world.DrawDebugData();
  world.ClearForces();
};

var isDragging = false;
var bird;
var mouseX;
var mousey;

// add bird
function addBird(event) {
  if (birdBody) {
    world.DestroyBody(birdBody.GetBody());
  }
  isDragging = true;
  bird.src = "https://www.amcharts.com/lib/coffee/redbird2.png";
}

// release bird
function releaseBird() {
  bird.src = "https://www.amcharts.com/lib/coffee/redbird.png";
  if (line1) {
    line1.remove();
  }
  if (line2) {
    line2.remove();
  }

  isDragging = false;

  birdBodyDef.position.Set(chart.mouseX / pixels2meters, chart.mouseY / pixels2meters);
  birdBody = world.CreateBody(birdBodyDef).CreateFixture(birdFixtureDef);
  setTimeout(applyImpulse, 30);
}

function applyImpulse() {
  var impulse = new Box2D.Common.Math.b2Vec2((150 - chart.mouseX) / 2, (390 - chart.mouseY) / 2);
  var pos = new Box2D.Common.Math.b2Vec2(0, 0);
  birdBody.GetBody().ApplyImpulse(impulse, pos);
}

var line1;
var line2;

function createLines(x, y) {

  if (line1) {
    line1.remove();
  }
  if (line2) {
    line2.remove();
  }
  line1 = AmCharts.line(chart.container, [x, 140], [y, 390], "#000000", 1, 3);
  line2 = AmCharts.line(chart.container, [x, 166], [y, 390], "#000000", 1, 3);
}
        // 基于准备好的dom，初始化echarts实例
var myChart = echarts.init(document.getElementById('main'));

        // 指定图表的配置项和数据
var paperDataURI = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJgAAAAyCAYAAACgRRKpAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAB6FJREFUeNrsnE9y2zYYxUmRkig7spVdpx3Hdqb7ZNeFO2PdoD1Cj9DeoEdKbmDPeNFNW7lu0y7tRZvsYqfjWhL/qPgggoIggABIQKQkwsOhE5sQCfzw3uNHJu5sNnOaZq29RttolwfAbxgwChO9nad//4C2C7S9Sfe3uzQobqNghdoJBdIw3R8qHnvNANcA1sBUGCaV9pYC7rYBbLvbgAFpaBgmWbujlO1NA9h2wQTbcdHOoih2ZujLa7WcFtoMtUsKuFEDWL3bkAHq2GTnT+OJkyTzsXRd1/G8FoYN9vBnQ+pGZ7f7BrDqYSLbq6IdxXGM96BKIlBgDP97mgj7aLXcDLa8fgqoGwFu1ABmvzwwLAuTTJmw/SFIfG/ZBmEMIwRiHCVOnCTSPkk/BDoD7YHJbvcNYOVgYmtNWo1cs0xJ8pQJDgXIfM9bscE4TrDyAWwETuEEpP0QSzWU365T0CpXtzoDdsJY3bmpjqfT0AlRKMfWhQBhFYkGLAwjpE6JIxsnAAz6YW0QjksQaBGGTq0fw/mt0kJvXQA7cezWmpYaqBJ73XmKREABQMAKARjZsOXZqU4/FvLbWgu9VQA24NzRGYEJJm6C1GmuJJ4w39C5Sj6x/H6IKiWxPHflwQv9wPEV5TeibgS4200DzGitSdX6VCZWR0nonAR98dQNgxInpey0BvnNeKHXJGDGYYLiJQwiqIjuHZ+uKsWpEsUYOHVAeOdm0k4rzm9vKYUbrRswY7UmcVYa48mR5SN2YgkoMlXCoHEmQ6cfAojni1VkAUmsrEplVddCfitU6FUFzDpMvDw1nkzFA5dz91dkYvP61MlJREV8waQWUSWRnVac35QeY/EAe83c0RmDCSzMRV+w2nlZhp1UyFNyJVpMaJ6VmlQ3HUBE9rdSpIUbhhJ2WnF+ExZ63U+f/v2h02mfeb7/JZp0a8rEK1ouVqeXu6LwhEZqA0eCuCyD6ExGngVmKpICJ5tUEbjFsmC+nRZRSsSC0UKv++7Pv676/f7ZQb/v7O/vm3p0wQ3sUEIoM/hsDpFNqKqV6t1R5ltgnJ6Xyt0kOT+RZelCQmcuVs1VrhGOC7qd0kIyV2N87j+7v938cUFXyQ8O+nh7hmBrt9vGVUz1mZ3nicsC7ISqTICqldLqFilaoEjddOxP5UamiJ3CubV9n+sKbH7rdHzu74rnE/UzW9QCASpmvC5XekOWiTdoQRA4z58PEGx7+PvSNRE0aHABbV+eiYjlTJ0oW5m+761M4txePWmox5ODVDTCdbIwF2Dysw4zqTzFxOc/TbjlC/p6ZbYM109/Bk+NuP3l2Cn+nDDhQtNKFwTdF3xm7sJLMmWSLmj4nel0+swdXd9coQ86k8EB3gw2enBwgKx0z8pdo4pqECv1Jbfe2lYqAJinmKoWmAexdilEougiOy1qe/P+UrubyfMlfPbT05MzHo/xHsHldLvde/fi8vKjM3MGQa/n9NDmuvIMBhOMrdRSbiOqAWqjEupVrVQFDFWAdS1fVpzVKal00WKHxaAyhi1XXpJYtrpZar/y8tXj4+MSUMuC1AGe7jBgURgOspPvBvMt6CrBto7cphrAdepjcXpnagpgnUCu+mA9FljRXq9bqmiKlSmZ5zhieUplJkqhYE+ajywYqRWOUSlYWQZzf/n1+qc4jr4KEYFAYRSF2YrrBkEGnGoznduKK5FefUwZ4Ja8rKJbBIV+QZVEi4LuC97776HFb8vqZEARmACkAPPRzVvMl+j3/fH8oCA9oWQOWhg603DqPNx/xAMKPwcb9f18hYITef/+g7XcRkJ9R6JEvFDPUwxsXchuiOXkATxf7TEuAMvKKnSIXla31bwF/eYpEhvIpUFc0+pIg3mnoaKszjk8PMQw+b7ev9VeKVOIPjicTtBkRXiAADQATvUh9Lpym+n6mJaVpiUBmZXy8lbRIJ7d0WlanQgogIlYXRGYqCLrBdkAsB/RN987Gu9kgY3CyUGA1Mlq68ptNupjOnd9vaCj/OhF/fVtJ81Mi2ymX+yOMqCgHwCIQAX7ElX7DKj9vWDpIXj2LPLm93ffoh3Z1vmPTa3nNtU7NNW3NvLKKnAMhPDSCyRVpUVRdVYYKAImXBsTwo0DtTKmvBOvEjbb9TZdK8X5TOEOkpQr3DSwF7E6+u6ubAOHgQVQEiZtoJQA48A2TGE7XidstnObqpUG3bZW3tSxOs7jlapbKaC0AWNgg1d4vqsCtnXkNtFbG2XqTjqPVypqdwxQtyY7L/xGa9Ww2c5txPZgeDptX/mY7E2CWbEgvulAGQOsTrDZzm1Cq8t/k2AngbICWJ1gs5Xbij5e2TWgrAPGwHaSggbAvariAovktjKPV3YdqLUCVjfYeLmt6JsEDVA1A6xusEFue/HiuM5Wt5FA1QKwusD28uXLBqhtB0wAG2znOwLYVgFVa8AY2AYUbN9sEWBbDdTGALYO2NYE2E4BtZGA2YLNEmA7DdTGA2YSttPT04nrut0GqAYwVdiGjsZrRkdHR3ftdlv3aQP9/zA0QO0KYBzgpO+0KQL2wCjUqMGmAUwJNgFgDVANYGZgQ4DdI8AGDVANYFba3/98+PqLzz+7ajCw1/4XYABXWBExzrUA+gAAAABJRU5ErkJggg==';

option = {
    backgroundColor: '#ffffff',
    tooltip: {},
    legend: {
        data: ['all'],
        textStyle: {color: '#ddd'}
    },
    xAxis: [{
        data: ['Total running distance', 'Qomolangma', 'Fuji Mountain','Hong Kong'],
        axisTick: {show: false},
        axisLine: {show: false},
        axisLabel: {
            margin: 20,
            textStyle: {
                color: '#000',
                fontSize: 14
            }
        }
    }],
    yAxis: {
        splitLine: {show: false},
        axisTick: {show: false},
        axisLine: {show: false},
        axisLabel: {show: false}
    },
    markLine: {
        z: -1
    },
    animationEasing: 'elasticOut',
    series: [{
        type: 'pictorialBar',
        name: 'all',
        hoverAnimation: true,
        label: {
            normal: {
                show: true,
                position: 'top',
                formatter: '{c} m',
                textStyle: {
                    fontSize: 16,
                    color: '#e54035'
                }
            }
        },
        data: [{
            value: 13000,
            symbol: 'image://' + paperDataURI,
            symbolRepeat: true,
            symbolSize: ['130%', '20%'],
            symbolOffset: [0, 10],
            symbolMargin: '-30%',
            animationDelay: function (dataIndex, params) {
                return params.index * 30;
            }
        }, {
            value: 8844,
            symbol: 'image://http://echarts.baidu.com/data/asset/img/hill-Qomolangma.png',
            symbolSize: ['200%', '105%'],
            symbolPosition: 'end'
        }, {
            value: 5895,
            symbol: 'image://http://echarts.baidu.com/data/asset/img/hill-Kilimanjaro.png',
            symbolSize: ['200%', '105%'],
            symbolPosition: 'end'
        },
        {
            value: 6000,
            symbol: 'image://https://upload.wikimedia.org/wikipedia/commons/1/12/Hong_Kong_Ball.png',
            symbolSize: ['200%', '105%'],
            symbolPosition: 'end'
        }

        ],
        markLine: {
            symbol: ['none', 'none'],
            label: {
                normal: {show: false}
            },
            lineStyle: {
                normal: {
                    color: '#e54035',
                    width: 2
                }
            },
            data: [{
                yAxis: 8844
            }]
        }
    }, {
        name: 'all',
        type: 'pictorialBar',
        barGap: '-100%',
        symbol: 'circle',
        itemStyle: {
            normal: {
                color: '#fff'
            }
        },
        silent: true,
        symbolOffset: [0, '50%'],
        z: -10,
        data: [{
            value: 1,
            symbolSize: ['150%', 50]
        }, {
            value: '-'
        }, {
            value: 1,
            symbolSize: ['200%', 50]
        }, {
            value: 1,
            symbolSize: ['200%', 50]
        }, {
            value: 1,
            symbolSize: ['200%', 50]
        }, {
            value: 1,
            symbolSize: ['200%', 50]
        }]
    }]
};

        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);


var uploadedDataURL = "https://cdn3.iconfinder.com/data/icons/ui-glyph-blue-03-of-5/100/UI_Blue_3_of_3_23-128.png";
var myChart = echarts.init(document.getElementById('main2'));

var option2 = {
    backgroundColor: '#FFFFFF',
    xAxis: {
        type: 'category',
        boundaryGap: false,
        axisLine: {
            show: true,
            lineStyle: {
                width: 2,
                color: '#eb594b'
            }
        },
        axisTick: {
            show: false
        },
        axisLabel: {
            textStyle: {
                color: 'white',
                fontSize: 16
            }
        },
        splitLine: {
            show: true,
            lineStyle: {
                width: 2,
                color: '#eb594b',
                type: 'dashed'
            }
        },
        data: ['2011', '2012', '2013', '2014', '2015'],
    },
    yAxis: [{
        type: 'value',
        min: 18,
        show: false
    }, {
        type: 'value',
        min: 2.3,
        max: 2.5,
        show: false
    }],
    legend: {
        data: ['average datum comparision', 'Your family average datum comparision']
    },
    series: [{
        name: 'your family datum',
        type: 'line',
        symbol: 'circle',
        symbolSize: 10,
        lineStyle: {
            normal: {
                color: 'transparent',
                width: 2,
            },
        },
        itemStyle: {
            normal: {
                color: '#46d185'
            }
        },
        areaStyle: {
            normal: {
                color: '#46d185'
            }
        },
        label: {
            normal: {
                show: true,
                position: 'top',
                textStyle: {
                    fontSize: 18,
                    color: '#ddd'
                }
            },
        },
        data: [18.62, 18.74, 18.89, 19.04, 19.18]
    }, {
        name: 'total datum comparision',
        type: 'line',
        data: [2.311, 2.314, 2.328, 2.347, 2.363],
        itemStyle: {
            normal: {
                color: '#eb594b',
                shadowColor: 'rgba(0, 0, 0, 0.5)',
                shadowBlur: 20
            }
        },
        yAxisIndex: 1,
        symbol: 'image://' + uploadedDataURL,
        symbolSize: 50,
        label: {
            normal: {
                show: true,
                position: 'top',
                textStyle: {
                    fontSize: 18,
                    color: 'white'
                }
            },
        },
        lineStyle: {
            normal: {
                width: 4,
                shadowColor: 'rgba(0, 0, 0, 0.25)',
                shadowBlur: 20
            }
        }
    }]
};

 myChart.setOption(option2);


alert("hi");


    </script>
</body>
</html>
