<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Documento senza titolo</title>

</head>

<script src="js/three.min.js"></script>

<body>

<script>



    var camera, scene, renderer;

    var geometry, material, mesh;



    init();

    animate();



    function init() {



        camera = new THREE.PerspectiveCamera( 75, window.innerWidth / window.innerHeight, 1, 10000 );

        camera.position.z = 1000;



        scene = new THREE.Scene();



        geometry = new THREE.CubeGeometry( 200, 200, 200 );

        material = new THREE.MeshBasicMaterial( { color: 0xff0000, wireframe: true } );



        mesh = new THREE.Mesh( geometry, material );

        scene.add( mesh );



        renderer = new THREE.CanvasRenderer();

        renderer.setSize( window.innerWidth, window.innerHeight );



        document.body.appendChild( renderer.domElement );



    }



    function animate() {



        // note: three.js includes requestAnimationFrame shim

        requestAnimationFrame( animate );



        mesh.rotation.x += 0.01;

        mesh.rotation.y += 0.02;



        renderer.render( scene, camera );



    }



</script>

</body>

</html>

