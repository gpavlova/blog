<?php
if(!isset($_GET['id'])){
    header('Location: index.php');
    exit();
}
else {
$id = $_GET['id'];    
}
include ('includes/db_connect.php');

if(!is_numeric($id)){
    header('Location: index.php');
}

    $sql = "SELECT title, body FROM new_posts WHERE new_posts_id='$id'";
    $query = $db->query($sql);
    
     if($query->num_rows != 1){
         header('Location: index.php');
         exit();
     }

?>

<html>
<head>
	<meta  charset="utf-8" />
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
                                <li><a href="indexlog.php"><span>Начало</span></a></li>
				<li><a href="#"organic.html><span>Култура и история</span></a></li>
				<li><a href="#"blog.html><span>Новини и събития</span></a></li>
				<li class="current"><a href="obshtnostlog.php"><span>На седянката</span></a></li>
                                <li><a href="#"tips.html><span>Имоти</span></a></li>
                                <li><a href="logout.php"><span>Изход</span></a></li>
			</ul>
		</div>
		<div class="body">
			<?php
                $row = $query->fetch_object();
                echo "<h2>".$row->title."</h2>";
                echo "<p>".$row->body."</p>";
                        ?>
                </div>
                
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
						<p>Обществени обсъждания и събрания.<br />Нормативни документи.</p>
						<a href="kmetstvo.html" class="viewall">Продължи</a>
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