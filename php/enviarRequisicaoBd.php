<?php 
echo "<pre>";
print_r($_GET);
echo "</pre>";

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		function teste() {
			console.log(document.getElementById('testeT'));
				}
	</script>
</head>
<body>
	<button onclick="teste()">Enviar</button>
	<input type="hidden" id="testeT" value="<?= $testeT ?>">
</body>
</html>