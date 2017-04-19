<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Documento senza titolo</title>
</head>
<script type="text/javascript" src="js/Three.js"></script>
<script type="text/javascript" src="js/ColladaLoader.js"></script>
<body>
<script>
var loader = new THREE.ColladaLoader();
loader.load('test/test.dae', function (result) {
  scene.add(result.scene);
});
</script>
</body>
</html>
