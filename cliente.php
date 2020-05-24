 <H1>Calculadora</H1>
<form action="cliente.php" method="GET">
	Numero 1: <input type="text" name="a"><br>
	Numero 2: <input type="text" name="b"><br>
	Operacion: 	<select name="action">
			<option value="suma">Sumar</option>
			<option value="multiplicacion">Multiplicar</option>
	</select>
	
		<input type="submit" value="Calcular" />
</form>

<?php 

# Operación suma

if (isset($_GET["action"]) && $_GET["action"] == "suma") {
	$calculadora = file_get_contents('http://localhost/calculadora2/servicio.php?a='.$_GET["a"].'&b='.$_GET["b"].'&action=suma');
	
	$calculadora = json_decode($calculadora, true);
	//echo $calculadora.'___________________________________';
	?>
	<h1>SUMA</h1>
	<table>
			<tr>
				<td>Primer numero:</td>
				<td><?php echo $calculadora["a"] ?></td>
			</tr>
			<tr>
				<td>Segundo numero:</td>
				<td><?php echo $calculadora["b"] ?></td>
			</tr>
			<tr>
				<td>Total:</td>
				<td><h1><?php echo $calculadora["total"] ?></h1></td>
			</tr>
	</table>
	<?php
}

# Operación multiplicaión

if (isset($_GET["action"]) && $_GET["action"] == "multiplicacion") {
	$calculadora = file_get_contents('http://localhost/calculadora2/servicio.php?a='.$_GET["a"].'&b='.$_GET["b"].'&action=suma');
	//$calculadora = file_get_contents('http://localhost/calculadora2/servicio.php?action=multiplicacion&a='.$_GET["a"].'&b='.$_GET["b"]);
	$calculadora = json_decode($calculadora, true);
	?>
	<h1>MULTIPLICACION</h1>
	<table>
			<tr>
				<td>Primer numero:</td>
				<td><?php echo $calculadora["a"] ?></td>
			</tr>
			<tr>
				<td>Segundo numero:</td>
				<td><?php echo $calculadora["b"] ?></td>
			</tr>
			<tr>
				<td>Total:</td>
				<td><h1><?php echo $calculadora["total"] ?></h1></td>
			</tr>
	</table>
	<?php
}

?>