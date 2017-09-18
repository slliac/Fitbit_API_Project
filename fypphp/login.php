<?php
session_start();
unset( $_SESSION['Rname']);
$_SESSION["data"] = false;
?>

<!DOCTYPE html>


<html >
<head>
  <meta charset="UTF-8">
  <title>login page</title>


  <link rel="stylesheet" href="css/style2.css">
  <link rel="stylesheet" href="css/login_style.css">


</head>
<style>
    body {
        color: #000;
        font-size:13px;
        text-align:center;
        background-color: #fff;
        margin: 0px;
        overflow: hidden;
    }
#info {
                position: absolute;
                top: 150px;
                left: 32%;
                padding: 5px;
                width: 50%;
}
a {
				color: red;
}
</style>


<body>
  <!-- threejs.org canvas lines example -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r67/three.min.js">
</script>


<div id= "info" class="panel-lite" align="center" align="center">
    <div class="thumbur">
        <div class="icon-lock"></div>
    </div>
    <h4>Let 's begin your Fitbit 's journey. </h4>

    <button class="floating-btn" onclick = "login()"><i class="icon-arrow"></i></button>
</div>



<script>

  var mouseX = 0,
      mouseY = 0,
      windowHalfX = window.innerWidth / 2,
      windowHalfY = window.innerHeight / 2,
      SEPARATION = 200,
      AMOUNTX = 10,
      AMOUNTY = 10,
      camera,
      scene,
      renderer;

  init();
  animate();

  function login()
  {
      window.location.href = "https://www.fitbit.com/oauth2/authorize?response_type=token&client_id=227Z8V&redirect_uri=http%3A%2F%2F124.244.52.66%2Ffypphp%2Ffirst.php&scope=activity%20heartrate%20location%20nutrition%20profile%20settings%20sleep%20social%20weight&expires_in=604800";
  }

	function init() {
        var container,
        separation = 100,
        amountX = 50,
        amountY = 50,
        particle;

    container = document.createElement('div');
    document.body.appendChild(container);

    scene = new THREE.Scene();
    renderer = new THREE.CanvasRenderer( { alpha: true }); // gradient; this can be swapped for WebGLRenderer
    renderer.setSize( window.innerWidth, window.innerHeight );
    container.appendChild( renderer.domElement );

    camera = new THREE.PerspectiveCamera(
    	75,
      window.innerWidth / window.innerHeight,
      1,
      10000
    );
    camera.position.z = 100;

		// particles
    var PI2 = Math.PI * 2;

    var material = new THREE.SpriteCanvasMaterial( {

    	color: 0xffffff,
    	program: function ( context ) {
				context.beginPath();
        context.arc( 0, 0, 0.5, 0, PI2, true );
        context.fill();
      }
    });

    var geometry = new THREE.Geometry();

    for ( var i = 0; i < 100; i ++ ) {
      particle = new THREE.Sprite( material );
      particle.position.x = Math.random() * 2 - 1;
      particle.position.y = Math.random() * 2 - 1;
      particle.position.z = Math.random() * 2 - 1;
      particle.position.normalize();
      particle.position.multiplyScalar( Math.random() * 10 + 450 );
      particle.scale.x = particle.scale.y = 10;
      scene.add( particle );
      geometry.vertices.push( particle.position );
    }

    // lines

    var line = new THREE.Line( geometry, new THREE.LineBasicMaterial( { color: 0xffffff, opacity: 0.5 } ) );
    scene.add( line );

    // mousey

    document.addEventListener( 'mousemove', onDocumentMouseMove, false );
		document.addEventListener( 'touchstart', onDocumentTouchStart, false );
    document.addEventListener( 'touchmove', onDocumentTouchMove, false );

 		window.addEventListener( 'resize', onWindowResize, false );

	} // end init();

	function onWindowResize() {

  	windowHalfX = window.innerWidth / 2;
    windowHalfY = window.innerHeight / 2;

    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();

    renderer.setSize( window.innerWidth, window.innerHeight );

	}



	function onDocumentMouseMove(event) {

  	mouseX = event.clientX - windowHalfX;
    mouseY = event.clientY - windowHalfY;

  }

  function onDocumentTouchStart( event ) {

		if ( event.touches.length > 1 ) {

    	event.preventDefault();

      mouseX = event.touches[ 0 ].pageX - windowHalfX;
      mouseY = event.touches[ 0 ].pageY - windowHalfY;

    }
	}

  function onDocumentTouchMove( event ) {

  	if ( event.touches.length == 1 ) {

    	event.preventDefault();

      mouseX = event.touches[ 0 ].pageX - windowHalfX;
      mouseY = event.touches[ 0 ].pageY - windowHalfY;

		}
	}

	function animate() {

		requestAnimationFrame( animate );
    render();

	}

	function render() {

    camera.position.x += ( mouseX - camera.position.x ) * .05;
    camera.position.y += ( - mouseY + 200 - camera.position.y ) * .05;
    camera.lookAt( scene.position );

    renderer.render( scene, camera );

  }
</script>



</body>
</html>
