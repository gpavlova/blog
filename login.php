<?php
session_start();
if(isset($_POST['submit'])){
$user = $_POST['username'];
$password=$_POST['password'];
//include DB
    include ('includes/db_connect.php');
    if(empty($user)||empty($password)){
        echo "Missing information";
    }
 else {
      $user = strip_tags($user);
      $user =$db->real_escape_string($user);  
      $password = strip_tags($password);
      $password =$db->real_escape_string($password);  
      $password=md5($password);
      $query = $db->query("SELECT user_id, username FROM user WHERE username='$user' AND password='$password'");
    if($query->num_rows == 1)
    {
        while($row = $query->fetch_object()){
            $_SESSION['user_id']=$row->user_id;
        }
        header('Location: indexlog.php');
            exit();
        }
 else {
     echo "Missing information";
     
 }
        
    }
}
?>
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
				<li><a href="index.php"><span>Начало</span></a></li>
				<li><a href="#"organic.html><span>Култура и история</span></a></li>
				<li><a href="#"blog.html><span>Новини и събития</span></a></li>
				<li><a href="obshtnost.php"><span>На седянката</span></a></li>
                                <li><a href="#"tips.html><span>Имоти</span></a></li>
			</ul>
		</div>
		<div id="body">
			
            <form action="login.php" method="post">
            <p>
            <label type="label">Потребител</label><input type="text" name="username"/>
            </p>
            <p>
            <label type="label">Парола</label><input type="password" name="password"/>
            </p>
            <input type="submit" name="submit" value="Вход"/>     
            </form>
                    
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