<article class="container-fluid">
	<section class="">			
			<form method="post" action="#" class="row" enctype="multipart/form-data">
				<div class="container-fluid text-center">
					<h1 style="color:blue;text-align:center;">ADD A BOOK</h1>
					<div id="error" class="form-text" style="display:non;">
						<span>Fill the form in ordre to add a new book to the library.</span>
<?php
if(isset($_POST["sb"]))
{
	$title = isset($_POST["title"]) ? htmlspecialchars(trim($_POST["title"])) : null;
	$isbn = isset($_POST["isbn"]) ? htmlspecialchars(trim($_POST["isbn"])) : null;
	$first_name = isset($_POST["first_name"]) ? htmlspecialchars(trim($_POST["first_name"])) : null;
	$last_name = isset($_POST["last_name"]) ? htmlspecialchars(trim($_POST["last_name"])) : null;
	$editor = isset($_POST["editor"]) ? htmlspecialchars(trim($_POST["editor"])) : null;
	$cat = isset($_POST["cat"]) ? htmlspecialchars(trim($_POST["cat"])) : null;
	
	$state = isset($_POST["state"]) ? htmlspecialchars(trim($_POST["state"])) : null;
	$state = strtolower($state) == "new" ? 1 : 0;
	
	$place_at = isset($_POST["place_at"]) ? htmlspecialchars(trim($_POST["place_at"])) : null;
	$desc = isset($_POST["desc"]) ? htmlspecialchars(trim($_POST["desc"])) : null;
	$page = isset($_POST["page"]) ? htmlspecialchars(trim($_POST["page"])) : null;
	$lang = isset($_POST["lang"]) ? htmlspecialchars(trim($_POST["lang"])) : null;
	$quantity = isset($_POST["quantity"]) ? htmlspecialchars(trim($_POST["quantity"])) : null;
	$date = isset($_POST["date"]) ? htmlspecialchars(trim($_POST["date"])) : null;
	
	if($title and  $isbn and $first_name and $last_name and $editor and $place_at and $desc and $page and $lang and $quantity and $date)
	{
		if ((isset($_FILES['book_img']) AND $_FILES['book_img']['error'] == 0) AND (isset($_FILES['writer_img']) AND $_FILES['writer_img']['error'] == 0))
		{
		// Testons si le fichier n'est pas trop gros
			if (($_FILES['book_img']['size'] <= 10000000) AND ($_FILES['writer_img']['size'] <= 10000000))
			{
				// Testons si l'extension est autorisée
				$book_img = pathinfo($_FILES['book_img']['name']);
				$writer_img = pathinfo($_FILES['writer_img']['name']);
				
				$book_img_ext = $book_img['extension'];
				$writer_img_ext = $writer_img['extension'];
				
				$extensions_autorisees = array('jpg', 'jpeg', 'png');
				if (in_array($book_img_ext, $extensions_autorisees) AND in_array($writer_img_ext, $extensions_autorisees))
				{
					
					//DATABASE INSERTION
					//CATEGORY AND LANGUAGE TABLE => GETTING ID
					$req = $bdd->prepare("SELECT id FROM category WHERE name = :cat_name;");
					$req->execute(array("cat_name"=>$cat));
					$cat_id = $req->fetch(); $cat_id = $cat_id["id"];
					//echo $cat."ok";
					$req = $bdd->prepare("SELECT id FROM language WHERE language = :lang;");
					$req->execute(array("lang"=>$lang));
					$lang = $req->fetch(); $lang = $lang["id"];
					
					$req = $bdd->prepare("SELECT isbn FROM book WHERE issbn = :isbn;");
					$req->execute(array("isbn"=>$isbn));
					$isBookPresent = $req->fetch(); $isBookPresent = $isBookPresent["isbn"];
			
			//BOOK TABLE
				if(isset($isBookPresent) AND bool($isBookPresent))
				{
					$req = $bdd->prepare("INSERT INTO book VALUES(:isbn, :title, :cat, :editor, :state, :book_img, :place_at, :desc, :page, :lang, :quantity, :view, :pub_date, NOW());");
					$req->execute(array(
						"isbn" => $isbn,
						"title" => $title,
						"cat" => $cat_id,
						"editor" => $editor,
						"state" => $state,
						"book_img" => "book_images/".$isbn.".".$book_img_ext,
						"place_at" => $place_at,
						"desc" => $desc,
						"page" => $page,
						"lang" => $lang,
						"quantity" => $quantity,
						"view" => 150,
						"pub_date" => $date,
					));
				
					//WRITER TABLE
					$req = $bdd->prepare("SELECT id FROM writer WHERE first_name = :first_name AND last_name = :last_name;");
					$req->execute(array(
						"first_name" => $first_name,
						"last_name" => $last_name
					));
					$writer_id = $req->fetch()["id"];
					
					if(!$writer_id)
					{
						$req = $bdd->prepare("INSERT INTO writer(first_name, last_name, image) VALUES (:first_name, :last_name, NULL);");
						$req->execute(array(
							"first_name" => $first_name,
							"last_name" => $last_name
						));
						$req = $bdd->prepare("UPDATE writer SET image = :writer_img WHERE first_name = :first_name AND last_name = :last_name");
						$req->execute(array(
							"writer_img"=>"writer_images/".$bdd->lastInsertId().".".$writer_img_ext,
							"first_name" => $first_name,
							"last_name" => $last_name
						));
						
						$writer_id = $bdd->lastInsertId();
					}
					
					
					//LET'S UPLOAD FILES WITH THE WRITER TABLE LAST INSERTED ID
					move_uploaded_file($_FILES['book_img']['tmp_name'], 'medias/book_images/'.$isbn.".".$book_img_ext);
					move_uploaded_file($_FILES['writer_img']['tmp_name'], 'medias/writer_images/'.$writer_id.".".$writer_img_ext);
					
					//WRITE_ TABLE
					echo $writer_id;
					$req = $bdd->prepare("INSERT INTO write_(writer_id, book_isbn) VALUES(:writer_id, :book_isbn);");
					$req->execute(array(
						"writer_id" => $writer_id,
						"book_isbn" => $isbn
					));
					
					
?>
	<div style="background-color:green;color:#fff;">The book has been successfully uploaded!</div>
<?php
					}
					else
					{
?>
				<div style="background-color:red;color:#fff;">The images you've entered are too big.</div>
<?php
					}
				}
				else
				{
	?>
		<div style="background-color:red;color:#fff;">The extensions allowed are : jpg, jpeg, png.</div>
<?php
			}
		}
		else
		{
	?>
		<div style="background-color:red;color:#fff;">The images you've entered are too big.</div>
	<?php
		}
	}
	else
	{
?>
	<div style="background-color:red;color:#fff;">An error occured. Check the informations you've typed in.</div>
<?php
	}
	
	}
	else
	{
?>
		<div style="background-color:red;color:#fff;">Please enter all the informations about the book.</div>
<?php
	}
}							
							
?>
						</div>
					</div>
				</div>
				
				<div class="offset-1 col-5">
					<div class="mb-3">						
						<label for="title" class="form-label">Book Title</label>
						<input type="text" class="form-control" id="title" name="title" />
						
						<label for="isbn" class="form-label">Book ISBN</label>
						<input type="text" class="form-control" id="isbn" name="isbn" />
						
						<label for="first_name" class="form-label">Writer's First Name</label>
						<input type="text" class="form-control" id="first_name" name="first_name" />
						
						<label for="last_name" class="form-label">Writer's Last Name</label>
						<input type="text" class="form-control" id="last_name" name="last_name" />
						
						<label for="editor" class="form-label">Book Editor</label>
						<input type="text" class="form-control" id="editor" name="editor" />
						
						<label for="cat" class="form-label">Book Category</label>
						<select name="cat" id="cat" class="form-select">
							<option value="Novel">Novel</option>
							<option value="Personal Development">Personal Dev</option>
							<option value="Spirituality">Spirituality</option>
							<option value="Science">Science</option>
						</select>
						
						<label for="state" class="form-label">State</label>
						<select name="state" id="state" class="form-select">
							<option value="new">New</option>
							<option value="old">Old</option>
						</select>
						
						<label for="book_img" class="form-label">Book Image</label>
						<input type="file" class="form-control" id="book_imag" name="book_img" />						
					</div>
				</div>
				
				<div class="offset- col-5">
					<div class="mb-3">						
						<label for="place_at" class="form-label">Place At</label>
						<input type="number" class="form-control" id="place_at" name="place_at" />
						
						<label for="desc" class="form-label">Book Description</label>
						<textarea id="desc" class="form-control" rows="4" cols="5" name="desc">Type a description here!</textarea>
						
						<label for="page" class="form-label">Number Of Pages</label>
						<input type="number" class="form-control" id="page" name="page" />
						
						<label for="lang" class="form-label">Language Of The Book</label>
						<select name="lang" id="lang" class="form-select">
							<option value="English">English</option>
							<option value="French">French</option>
							<option value="Turkish">Turkish</option>
							<option value="German">German</option>
						</select>
						
						<label for="quantity" class="form-label">Number Of This Book</label>
						<input type="number" class="form-control" id="quantity" name="quantity" />
						
						<label for="date" class="form-label">Publication Date</label>
						<input type="date" class="form-control" id="date" name="date" />
						
						<label for="writer_img" class="form-label">Writer Image</label>
						<input type="file" class="form-control" id="book_imag" name="writer_img" />
						
					</div>
		
				</div>
				
				<div class="text-center row">
					<button type="sb" name ="sb" class="btn btn-primary" onclick="document.getElementById('error').style.display='bloc';">ADD THIS BOOK</button>
				</div>
			</form>
<br/>
	</section>
</article>