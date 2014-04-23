<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>TEST</title>
	<meta name="description" content="opisanie" />
	<meta name="keywords" content="keywords" />
	<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />

    <link rel="stylesheet" type="text/css" href="/css/style.css" />
	<link rel="stylesheet" type="text/css" href="/css/normalize.css" />

	<link rel="icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="alternate" type="application/rss+xml" title="RSS Feed" href="/news/rss/" />
	
	<!-- Подключение jQuery -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.js"></script>

	<!-- Изменение цвета текста товара -->
	<script type="text/javascript">
		$(document).ready(function(){
			$(".tovar img").click(function(){
				$(this).parent().toggleClass('checked');
			});
		});
	</script>
</head>

<body>
	<header>
		<a class="logo" href="/index.php">
			<img src="/images/logo.png" />
		</a>
		<div class="top_menu">
			<ul>
				<li class="active"><a href="#">Керамическая плитка</a></li>
				<li><a href="#">Керамогранит</a></li>
				<li><a href="#">Мозаика</a></li>
				<li><a href="#">Напольные покрытия</a>
					<ul>
						<li><a href="#">Ламинат</a></li>
						<li><a href="#">Паркетная доска</a></li>
						<li><a href="#">Массивные покрытия</a></li>
						<li><a href="#">Пробковые покрытия</a></li>
					</ul>
				</li>
				<li><a href="#">Сопутствующие товары</a></li>
			</ul>
		</div>
		<div class="form_search">
			<form autocomplete="on" method="get" action="/" >
				<input class='search' name="name" type="text" value="<?php echo isset($_GET['text']) ? htmlspecialchars($_GET['text']) : '' ?>" placeholder='Поиск по сайту' >
				<input class="button_form" type="submit" value="искать">
			</form>
		</div>
	</header>
	
	<div id='content_box'>
		<div class="left_menu">
			<h2>Керамическая плитка</h2>
			<ul>
				<li><a href="#">для КУХНИ</a></li>
				<li class="active"><a href="#">для ВАННОЙ</a></li>
				<li><a href="#">для ПОЛА</a></li>
				<li><a href="#">для СТЕН</a></li>
			</ul>
		</div>
		
		<div class="right_sitebar">
			<h1>для ВАННОЙ</h1>

			<?php
				// Скрипт, при помощи которого производится генерация списка товаров

				set_time_limit(0);
				
				// Считывает содержимое файла и построчно записывает в массив.
				$array_prod = file("products.txt");
				
				// Перемешаем массив
				shuffle($array_prod);

				$count = 0 ;
				foreach ($array_prod as $stroka_prod) {
					$count++ ;
					
					// Разобрать строку на составляющие параметры товара
					$parametr_product = explode(" ## ", $stroka_prod);
					
					echo '<div class="tovar">';
					$novinka = (int) $parametr_product[5]; 
					// Определяем 0/1 параметра "новинка"
					if ($novinka == 1) 
					{ 
						echo '<div class="novinka">&nbsp;</div>';
					}
					// Выводим изображение товара
					echo  '<img src="/images/' . $parametr_product[0] . '" />';
					// Выводим тип товара
					echo  '<p><b>' . $parametr_product[1] . '</b></p>';
					// Выводим наименование товара
					echo  '<p><span>' . $parametr_product[2] . '</span></p>';
					// Выводим производителя
					echo  '<p>Производитель: ' . $parametr_product[3] . '</p>';
					// Выводим цену
					echo  '<p class="cost">' . $parametr_product[4] . ' руб./кв.м</p>';
					
					echo  '<button type="submit" value="в корзину">в корзину</button></div>';

					if ($count == 9) 
					{ 
						break;
					}
				}
			?>
			<!--
			<div class='tovar'>
				<div class="novinka">&nbsp;</div>
				<img src="/images/tovar-1.png" />
				<p><b>Керамическая плитка</b></p>
				<p><span>Allure 20x980</span></p>
				<p>Производитель: Испания</p>
				<p class="cost">цена: 23 276,80 руб./кв.м</p>
				<button type="submit" value="в корзину">в корзину</button>
			</div>
			-->
			<div class="clear_div">&nbsp;</div>
			<div class="paginavi">
				<p>Товары 1 - 15 из 356 </p>
				<div class="pagin">Начало | Пред. | 
					<ul>
						<li class="active"><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li><a href="#">6</a></li>
						<li><a href="#">7</a></li>
					</ul>
				| <a href="#">След.</a> | <a href="#">Конец</a> | <a href="#">Все</a></div>
			</div>
			
		</div>
		<div class="clear_div">&nbsp;</div>
	</div>
	<footer></footer>
</body>
</html>