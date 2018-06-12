<html>

<?php
	// php-code
	$name = 'Galina';
	$a = 1;
	$b = 2;
	$c = $a + $b;
	$myArray = [1, 2, 3, 4, "sdfsdf"];



		function getString() {
			return "hello hello hello!";
		}

	$personArray = [
		'age' => 12,
		'name' => 'Oleg',
		'email' => 'oleg@gmail.com',
		'gender' => 'unknown',
		'married' => false
	];

	?>

<body>
		<h1>Hello, <?= $name ?></h1>
		<?= $c ?>

		<h2>
		 <?php echo getString(); ?>
		</h2>

		<ul>
			<?php
				foreach($myArray as $element) {
					echo "<li>" . $element . "</li>";
				}
				for($i = 0; $i < 4; $i++) {
					echo "<li>чайник номер $i </li>";
				}
				foreach($personArray as $key => $value) {
					echo "<li>$key: $value</li>";
				}
			?>
		</ul>

</body>
</html>
