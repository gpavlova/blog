<?php
//session_start();
include ('includes/db_connect.php');
//if(!isset($_SESSION['user_id'])){
  //  header('Location: login.php');
//exit();
//}
if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $body = $_POST['body'];
    $author = $_POST['author'];
    $category = "1";
    $title = $db->real_escape_string($title);
    $body = $db->real_escape_string($body);
//    $user_id = $_SESSION['user_id'];
    $date = date('Y-m-d');
    $body = htmlentities($body);
    $author = htmlentities($author);
    
    if($title && $body && $category){
        $query = $db->query("INSERT INTO new_posts (title, body, category_id, author, posted) VALUES('$title', '$body','$category', '$author', '$date')");
        if($query){
            echo "post added";
        }
        else {
            echo "error";
        }
    }
 else {
    echo "missing data";    
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <title></title>
    </head>
    <body>
        <div id="page">
		<div id="header">
			<div>
				село Друган
			</div>
			<ul>
                               <li><a href="index.html"><span>Начало</span></a></li>
				<li><a href="organic.html"><span>Култура и история</span></a></li>
				<li><a href="blog.html"><span>Новини и събития</span></a></li>
				<li class="current"><a href="obshtnost.php"><span>На седянката</span></a></li>
                                <li><a href="tips.html"><span>Имоти</span></a></li>
				<li><a href="contact.html"><span>Контакти</span></a></li>
                                <li><a href="login.php"><span>Вход</span></a></li>
			</ul>
		</div>
		<div class="body">
                    <div id="blog">
                        <div class="article">
                <h2>
                    Вашите теми
                </h2>
                <p>
                    Кажете на останалите
                    <br />
                    Важното за вас
                    <br />
                    <br />
                </p>
                
                        
                <br />
                   
                    
                        </div>
                          <div class="sidebar">
					<h2>Искам да кажа</h2>
					<ul>
                                            <li><a href="new_post_ds.php">Домашни стоки</a></li>
                                            <li><a href="new_post_lr.php">Лов и риболов</a></li>
                                            <li><a href="new_post_sab.php">Събирания</a></li>
                                            <li><a href="new_post_kuk.php">Кукери</a></li>
					    <li><a href="new_post_ch_c.php">Читалище и църква</a></li>
                                            <li><a href="new_post_dob.php">Доброволци</a></li>
                                            <li><a href="new_post_raz.php">Разни</a></li>
					</ul>
					<h2>Наоколо</h2>
					<ul>
						<li><a href="http://www.planinite.info/Transport_do_planinite/Avtobusno_razpisanie/Radomir/Radomir.htm">Транспорт</a></li>
						<li><a href="http://vestnici.net/">Новини</a></li>
						<li><a href="http://www.sabori.bg/">Празници от близо и далеч</a></li>
						<li><a href="http://radomir.acstre.com/">Радомир</a></li>
					</ul>
				</div>
		     </div>         
                </div>
            
            <div class="b-popup">
    <div class="b-popup-content">
                <form action="/DrBl/new_post_ds.php" method="post">
                    <label type="label1">Заглавие: </label><input type="text" name="title" /><label type="label1"><a href="obshtnost.php">  Х </a></label>
                    <br />
                    <label type="label1">Текст: </label>
                    <br />
                    <textarea name="body" cols=80 rows=20></textarea>
                    <br />
                    <br />
                    <label type="label1">Автор: </label><input type="text" name="author" />
                    <br />
                    <br />      
                    <input type="submit" name="submit" value="Запис" />
                </form>
        </div>

            </div>
            
		
	</div>
          
                
        </body>
</html>
