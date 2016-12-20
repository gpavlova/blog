<?php
session_start();
include ('includes/db_connect.php');
if(!isset($_SESSION['user_id'])){
  header('Location: login.php');
exit();
}
if(isset($_POST['submit1'])){
    $title = $_POST['title'];
    $body = $_POST['body'];
    $title = $db->real_escape_string($title);
    $body = $db->real_escape_string($body);
    $user_id = $_SESSION['user_id'];
    $body = htmlentities($body);

    
    if($title && $body){
        $query = $db->query("UPDATE home SET title='$title', body='$body' WHERE home_id=1");
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
if(isset($_POST['submit2'])){
    $title = $_POST['title'];
    $body = $_POST['body'];
    $title = $db->real_escape_string($title);
    $body = $db->real_escape_string($body);
    $user_id = $_SESSION['user_id'];
    $body = htmlentities($body);

    
    if($title && $body){
        $query = $db->query("UPDATE home SET title='$title', body='$body' WHERE home_id=2");
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
if(isset($_POST['submit3'])){
    $title = $_POST['title'];
    $body = $_POST['body'];
    $title = $db->real_escape_string($title);
    $body = $db->real_escape_string($body);
    $user_id = $_SESSION['user_id'];
    $body = htmlentities($body);

    
    if($title && $body){
        $query = $db->query("UPDATE home SET title='$title', body='$body' WHERE home_id=3");
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
                                <li class="current"><a href="indexlog.php"><span>Начало</span></a></li>
				<li><a href="#"organic.html><span>Култура и история</span></a></li>
				<li><a href="#"blog.html><span>Новини и събития</span></a></li>
				<li><a href="obshtnostlog.php"><span>На седянката</span></a></li>
                                <li><a href="logout.php"><span>Изход</span></a></li>
			</ul>
		</div>
		<div id="body">
                    
                       
                        <form action="/DrBl/indexlog.php" method="post">
                            <label type="label1">За селото...</label>
                            <br/>
                            ---------------------------------------------------------------------------
                            <p>
                            <label type="label">Заглавие: </label><input type="text" name="title" />
                            </p>
                            <p>
                            <label type="label">Текст: </label>
                            </p>
                            <p>
                            <label type="label"></label><textarea name="body" cols=80 rows=20></textarea>
                            </p>
                            <br />      
                            <input type="submit" name="submit1" value="Запис" />
                        </form>
                    
                       <br />
                       
                        <form action="/DrBl/indexlog.php" method="post">
                            <label type="label1">Природа и туризъм</label>
                            <br/>
                            ---------------------------------------------------------------------------
                            <p>
                            <label type="label">Заглавие: </label><input type="text" name="title" />
                            </p>
                            <p>
                            <label type="label">Текст: </label>
                            </p>
                            <p>
                            <label type="label"></label><textarea name="body" cols=80 rows=20></textarea>
                            </p>
                            <br />      
                            <input type="submit" name="submit2" value="Запис" />
                        </form>  
                       
                    <br />
                    
                        <form action="/DrBl/indexlog.php" method="post">
                            <label type="label1">Традиции</label>
                            <br/>
                            ---------------------------------------------------------------------------
                            <p>
                            <label type="label">Заглавие: </label><input type="text" name="title" />
                            </p>
                            <p>
                            <label type="label">Текст: </label>
                            </p>
                            <p>
                            <label type="label"></label><textarea name="body" cols=80 rows=20></textarea>
                            </p>
                            <br />      
                            <input type="submit" name="submit3" value="Запис" />
                        </form>
		            
                </div>
		<div id="footer">
                    <ul>		
				<br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
			</ul>
			<div>
				<p class="connect"><a href="https://www.facebook.com/groups/161950513850753/" target="_blank">Facebook</a></p>
				<p class="footnote">GPI. All right reserved.</p>
			</div>
		</div>
	</div>
</body>
</html>
