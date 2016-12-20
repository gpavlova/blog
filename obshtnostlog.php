<?php
include('includes/db_connect.php');
$record_count = $db->query("SELECT * FROM new_posts");
$per_page = 4;
//брой страници според записи
$pages= ceil($record_count->num_rows/$per_page);

if(isset($_GET['p']) && is_numeric($_GET['p'])){
    $page = $_GET['p'];
} 
else {
$page = 1;    
}

if($page<=0){
$start = 0;
} else {
$start = $page*$per_page-$per_page;    
}
$prev = $page-1;// предишна стр.
$nex = $page + 1;//следваща стр.
$query = $db->prepare("SELECT new_posts_id, title, body, author, category, posted FROM new_posts INNER JOIN categories ON categories.category_id=new_posts.category_id order by new_posts_id desc limit $start, $per_page");
$query->execute(); 
$query->bind_result($new_post_id, $title, $body, $author, $category, $posted); 
?>
<!DOCTYPE html>

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
                    <div id="blog">
                        <div class="article">
                        <?php
            while ($query->fetch()):
                $lastspace = mb_substr($body,0,3000)
                ?>
                            <h2><?php echo $title?></h2>           
                <p>
                    
                 
                    <?php echo $lastspace."<a href='postlog.php?id=$new_post_id'>...</a>"?>
                    <br />
                    <?php echo $author?>
                    <br />
                    <?php echo $category?>
                    <br />
                    <br />
                    <form action="/DrBl/obshtnostlog.php" method="post">
                    <input type="submit" name="submit" value="Разреши">
                    </form>  
                <?php 
                if($category=="Лов и риболов"){
                    $category_id=2;
                }
                if($category=="Домашни стоки"){
                    $category_id=1;
                }
                if($category=="Събирания"){
                    $category_id=3;
                }
                if($category=="Кукери"){
                    $category_id=4;
                }
                if($category=="Читалище и църква"){
                    $category_id=5;
                }
                if($category=="Доброволци"){
                    $category_id=6;
                }
                if($category=="Разни"){
                    $category_id=7;
                }
                include ('includes/db_connect.php');
                if(isset($_POST['submit'])){
                    
    $queryIn = $db->query("INSERT INTO posts (title, body, author, category_id, posted) VALUES('$title','$body','$author','$category_id', '$posted')");
    if($queryIn){
            echo "post added";
        }
    else {
           echo "error"; 
        }
    $queryDel= $db->query("DELETE FROM new_posts WHERE new_posts_id='$new_post_id'");}?>
                </p>                 
         <br/>                
                <?php endwhile?>
                
                <br />
                    <?php
            if($prev>0){
                echo "<a href='obshtnostlog.php?p=$prev'><font color='#0D4D79'><< Предишни</font></a>";
            }
               ?>
            <?php
            if($page<$pages){
                echo "<a href='obshtnostlog.php?p=$nex'><font color='#0D4D79'>Още >></font></a>";
            }
            ?>
                    
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