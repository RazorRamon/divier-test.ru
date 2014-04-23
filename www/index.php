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
	
	<!-- ����������� jQuery -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.js"></script>

	<!-- ��������� ����� ������ ������ -->
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
				<li class="active"><a href="#">������������ ������</a></li>
				<li><a href="#">������������</a></li>
				<li><a href="#">�������</a></li>
				<li><a href="#">��������� ��������</a>
					<ul>
						<li><a href="#">�������</a></li>
						<li><a href="#">��������� �����</a></li>
						<li><a href="#">��������� ��������</a></li>
						<li><a href="#">��������� ��������</a></li>
					</ul>
				</li>
				<li><a href="#">������������� ������</a></li>
			</ul>
		</div>
		<div class="form_search">
			<form autocomplete="on" method="get" action="/" >
				<input class='search' name="name" type="text" value="<?php echo isset($_GET['text']) ? htmlspecialchars($_GET['text']) : '' ?>" placeholder='����� �� �����' >
				<input class="button_form" type="submit" value="������">
			</form>
		</div>
	</header>
	
	<div id='content_box'>
		<div class="left_menu">
			<h2>������������ ������</h2>
			<ul>
				<li><a href="#">��� �����</a></li>
				<li class="active"><a href="#">��� ������</a></li>
				<li><a href="#">��� ����</a></li>
				<li><a href="#">��� ����</a></li>
			</ul>
		</div>
		
		<div class="right_sitebar">
			<h1>��� ������</h1>

			<?php
				// ������, ��� ������ �������� ������������ ��������� ������ �������

				set_time_limit(0);
				
				// ��������� ���������� ����� � ��������� ���������� � ������.
				$array_prod = file("products.txt");
				
				// ���������� ������
				shuffle($array_prod);

				$count = 0 ;
				foreach ($array_prod as $stroka_prod) {
					$count++ ;
					
					// ��������� ������ �� ������������ ��������� ������
					$parametr_product = explode(" ## ", $stroka_prod);
					
					echo '<div class="tovar">';
					$novinka = (int) $parametr_product[5]; 
					// ���������� 0/1 ��������� "�������"
					if ($novinka == 1) 
					{ 
						echo '<div class="novinka">&nbsp;</div>';
					}
					// ������� ����������� ������
					echo  '<img src="/images/' . $parametr_product[0] . '" />';
					// ������� ��� ������
					echo  '<p><b>' . $parametr_product[1] . '</b></p>';
					// ������� ������������ ������
					echo  '<p><span>' . $parametr_product[2] . '</span></p>';
					// ������� �������������
					echo  '<p>�������������: ' . $parametr_product[3] . '</p>';
					// ������� ����
					echo  '<p class="cost">' . $parametr_product[4] . ' ���./��.�</p>';
					
					echo  '<button type="submit" value="� �������">� �������</button></div>';

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
				<p><b>������������ ������</b></p>
				<p><span>Allure 20x980</span></p>
				<p>�������������: �������</p>
				<p class="cost">����: 23 276,80 ���./��.�</p>
				<button type="submit" value="� �������">� �������</button>
			</div>
			-->
			<div class="clear_div">&nbsp;</div>
			<div class="paginavi">
				<p>������ 1 - 15 �� 356 </p>
				<div class="pagin">������ | ����. | 
					<ul>
						<li class="active"><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li><a href="#">6</a></li>
						<li><a href="#">7</a></li>
					</ul>
				| <a href="#">����.</a> | <a href="#">�����</a> | <a href="#">���</a></div>
			</div>
			
		</div>
		<div class="clear_div">&nbsp;</div>
	</div>
	<footer></footer>
</body>
</html>