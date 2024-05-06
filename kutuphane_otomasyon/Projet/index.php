<?php 
//session_start();
try
{
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=koulibrary;charset=utf8mb4', 'root', '');
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$bdd->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8mb4");
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
	//$_SEESION["bdd"] = $bdd;

	function turkish_to_english_character($text)
	{
		$text = str_replace("ü", "u", $text);
		$text = str_replace("Ü", "U", $text);
		
		$text = str_replace("ö", "o", $text);
		$text = str_replace("Ö", "O", $text);
		
		$text = str_replace("ğ", "g", $text);
		$text = str_replace("Ğ", "G", $text);
		
		$text = str_replace("ş", "s", $text);
		$text = str_replace("Ş", "S", $text);
		
		$text = str_replace("ı", "i", $text);
		$text = str_replace("İ", "I", $text);
		
		$text = str_replace("ç", "c", $text);
		$text = str_replace("Ç", "C", $text);
		
		return $text;
	}
//{} () $ = []
$title = "Welcome";
if(isset($_GET["page"]))
{
	switch($_GET["page"])
	{
		case "book_info":
			$title = "Book Informations";
			break;
		case "borrow":
			$title = "Borrow A Book";
			break;
		case "borrower":
			$title = "Borrow Informations";
			break;
		case "add_book":
			$title = "Add A New Book";
			break;
		case "statistic":
			$title = "Statistics";
			break;
		default:
			$title = "Welcome";
	}
}
	
	?>

	<!Doctype html>
	<html>
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=windows-1254" />
			<meta property="og:locale" content="tr_TR">
			<title><?php echo $title; ?></title>
			<link rel="icon" href="medias/logo/logo.png" type="image/png">
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"/>	
			<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
			<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"></script>
		</head>




	<?php 

	include("sections/header.php");
	?>
	<body class="container-fluid bg-light">	
	<?php
	if(isset($_GET["page"]))
	{
		if($_GET["page"]=="book_info"  AND isset($_GET["book"]))
		{
			include("pages/book_information.php");
		}
		else if($_GET["page"]=="borrow")
		{
			include("pages/borrow.php");
		}
		/*else if($_GET["page"]=="borrower")
		{
			include("pages/borrower.php");
		}*/
		else if($_GET["page"]=="statistic" AND isset($_GET["student"]))
		{
			include("pages/statistic.php");
		}
		else if($_GET["page"]=="statistic" AND !isset($student))
		{
			include("pages/borrower.php");
		}
		else if($_GET["page"]=="add_book")
		{
			include("pages/add_book.php");
		}
		else if($_GET["page"]=="books" AND isset($_GET["no"]))
		{
			include("pages/welcome.php");
		}
		else
		{
			include("pages/welcome.php");
		}
	}
	else
	{
		include("pages/welcome.php");
	}
}
catch (Exception $e)
{
	die('An Unknown Error Occured : ' . $e->getMessage());
}

	?>
	
<br/>	
<br/>	
<br/>	
	<?php 

	include("sections/footer.php");
	?>



	</body>
</html>