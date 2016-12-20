<?php
include('includes/db_connect.php');
?>
<!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8" />
	<title>Друган</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	
</head>
<body>
	<div id="page">
		<div id="header">
			<div>
				село Друган
			</div>
			<ul>
                            <li class="current"><a href="index.php"><span>Начало</span></a></li>
				<li><a href="#"organic.html><span>Култура и история</span></a></li>
				<li><a href="#"blog.html><span>Новини и събития</span></a></li>
				<li><a href="obshtnost.php"><span>На седянката</span></a></li>
                                <li><a href="#"tips.html><span>Имоти</span></a></li>
			</ul>
		</div>
		<div id="body">
			<ul>
				<li>
                                    <h1><a href="selo.php">за селото...<pre></pre></a></h1>
					<div>
						<a href="selo.php"><img src="images/carkva.jpg" alt="Image" /></a>
					</div>
                                    <?php
                                     $query = $db->prepare("SELECT title, LEFT(body,525) AS body FROM home WHERE home_id='1'");
                                     $query->execute(); 
                                     $query->bind_result($title1, $body1);
                                    while ($query->fetch()):?>
                                        <span><?php echo $title1?></span>                          
					<p><?php echo $body1."..."?></p>
                                       <?php  endwhile?>
					<a href="selo.php" class="readmore">Още...</a>
				</li>
				<li>
					<h1><a href="turist.php">Природа и туризъм</a></h1>
					<div>
						<a href="turist.php"><img src="images/ostrica.jpg" alt="Image" /></a>
					</div>
                                        <?php
                                     $query = $db->prepare("SELECT title, LEFT(body,500) AS body FROM home WHERE home_id='2'");
                                     $query->execute(); 
                                     $query->bind_result($title2, $body2);
                                    while ($query->fetch()):?>
					<span><?php echo $title2?></span>
					<p><?php echo $body2?></p>
                                        <?php  endwhile?>
					<a href="turist.php" class="readmore">Още...</a>
				</li>
				<li>
                                    <h1><a href="tradicii.php">Традиции<pre></pre></a></h1>
					<div>
						<a href="tradicii.php"><img src="images/kukeri.jpg" alt="Image" /></a>
					</div>
                                    <?php
                                     $query = $db->prepare("SELECT title, LEFT(body,500) AS body FROM home WHERE home_id='3'");
                                     $query->execute(); 
                                     $query->bind_result($title3, $body3);
                                    while ($query->fetch()):?>
                                    <span><?php echo $title3?></span>
                                    <p><?php echo $body3?></p>
				<?php endwhile?>
					<a href="tradicii.php" class="readmore">Още...</a>
				</li>
			</ul>
		</div>
		<div id="footer">
			<ul>
				<li>
					<h3>Настаняване</h3>
					<div id="magazine">
						<p>Изберете вашето място, вашата почивка!</p>
						<a href="index.html"><img src="images/kashta.jpg" alt="Image" /></a>
					</div>
				</li>
				<li>
					<h3>Обсъждания</h3>
					<div id="gallery">
						<b>Кметство и община</b>
						<a href="index.html"></a>
						<p>Обществени обсъждания и събрания.<br />Нормативни документи.</p>
						<a href="index.html" class="viewall">Продължи</a>
					</div>
				</li>
				<li>
					<h3>Услуги</h3>
					<div>
                                                <b>Администрация и тарифи</b>
                                                <a href="administracia.html" class="viewall">Продължи</a>
						<b>Проекти</b>
                                                <a href="proekt.html" class="viewall"><br />Продължи</a>  
                                                <b>Дарения</b>	
                                                <a href="dari.html" class="viewall"><br />Продължи</a>

					</div>
				</li>
				<li>
					<h3>Контакти</h3>
					<div>
						<p>Email:<br />drugan@gmail.com<br /><br /></p>
						<p>Адрес:<br />Обл. Перник, Общ. Радомир<br />с. Друган<br />пк. 2410 <br /><br /></p>
						<p>Телефон:<br /> (07728)2321</p>
					</div>
				</li>
			</ul>
			<div>
				<p class="connect"><a href="https://www.facebook.com/groups/161950513850753/" target="_blank">Facebook</a></p>
				<p class="footnote">GPI. All right reserved.</p>
			</div>
		</div>
	</div>
</body>
</html>