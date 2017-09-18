// amcharts part

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
      "year": "family average running distance",
      "europe": randomVal(),
      "namerica": 10 - 1,
      "asia": randomVal(),
      "pattern": {
        "url": "https://www.amcharts.com/lib/3/patterns/black/pattern5.png",
        "width": 4,
        "height": 4
      },
      "color": "#000000"
    }, {
      "year": 2004,
      "europe": 7,
      "namerica": 10 - 1,
      "asia": randomVal(),
      "pattern": {
        "url": "https://www.amcharts.com/lib/3/patterns/black/pattern5.png",
        "width": 4,
        "height": 4
      },
      "color": "#000000"
    }, {
      "year": 2005,
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
  "graphs": [{
    "fillAlphas": 0.8,
    "lineAlpha": 0.3,
    "title": "Europe",
    "type": "column",
    "color": "#000000",
    "cornerRadiusTop": 6,
    "valueField": "europe",
    "balloonText": "[[title]]:[[value]]"
  }, {
    "fillAlphas": 0.8,
    "lineAlpha": 0.5,
    "title": "North America",
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
    "title": "Asia-Pacific",
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
var framesPerSecond = 300;
var world;
var columns = [];
var birdBody;
var birdBodyDef;
var birdFixtureDef;

function init() {
  setTimeout(initBox2D, 500);
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
  birdFixtureDef.density = 1;
  birdFixtureDef.friction = 0.3;
  birdFixtureDef.restitution = 0.6;
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
    bird.style.top = (chart.mouseY + 25) + "px";
    bird.style.left = (chart.mouseX + 25) + "px";
    // draw lines
    createLines(chart.mouseX, chart.mouseY);
  } else {
    if (birdBody) {
      var body = birdBody.GetBody();
      var birdPosition = body.GetPosition();
      bird.style.top = ((birdPosition.y) * pixels2meters - 25) + "px";
      bird.style.left = ((birdPosition.x) * pixels2meters - 20) + "px";
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