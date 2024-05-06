<br/>
<section class="container-fluid">
	<article class="row text-center" style="color:blue;">
		<h1>GET THIS BOOK</h1>
	</article>
<?php
	$id = $_GET["book"]; 
?>
<a href="<?php echo $_SERVER['CONTEXT_PREFIX'];?>?page=book_info&amp;book=<?php echo $id;?>" class="btn btn-primary"> &lt;&lt;&lt;Back To Book Informations</a>
	<hr/>
	<article class="row">
<?php
	$id = $_GET["book"]; 
	$req = $bdd->prepare("SELECT * FROM write_ 
				INNER JOIN book ON book.isbn = write_.book_isbn
				INNER JOIN writer ON writer.id = write_.writer_id
				WHERE write_.book_isbn = :book_isbn;");
	$req->execute(array("book_isbn"=>$id));
	$data = $req->fetch();
?>
<?php
//{} () $ = []
	if(isset($_POST["sb"]))
	{
		$id = $_GET["book"];
		$student_no = isset($_POST["student_no"]) ? htmlspecialchars(trim($_POST["student_no"])) : null;
		$week = isset($_POST["week"]) ? htmlspecialchars(trim($_POST["week"])) : null;
		
		$req = $bdd->query("SELECT student_no FROM student");
		$students = array(); $i=0;
		while($student = $req->fetch())
		{
			$students[$i] = $student["student_no"];
			$i++;
		}
	//HAS ALREADY BORROW THIS BOOK
		$has_borrow = false;
		$req = $bdd->query("SELECT student_no, book_isbn, back_at FROM borrow");
		while($tmp = $req->fetch())
		{
			if($student_no == $tmp["student_no"] &&  $id == $tmp["book_isbn"] && !$tmp["back_at"])
			{
				$has_borrow = true;
				break;
			}
		}
	//IF THE studentGOT A CEZA	
		$ceza = false;
		$req_ = $bdd->query("SELECT * FROM ceza WHERE student_no=$student_no");
		$tmp_ = $req_->fetch();
		//print_r($tmp_); echo $student_no;
		if($tmp_)
		{
			$ceza = true;
		}
		//exit(0);

		if($has_borrow == false)
		{
			if($ceza == false)
			{
				if(in_array($student_no, $students))
				{
					$req = $bdd->prepare("INSERT INTO borrow VALUES(0, :student_no, :book_isbn, NOW(), DATE_ADD(NOW(), INTERVAL $week WEEK), NULL);");
					$req->execute(array(
						"student_no" => (int)$student_no,
						"book_isbn" => $id
					));
?>
	<div style="background-color:green;color:#fff;" align="center">Your request has been successfully recorded. Enjoy your reading.</div>
<?php		
			
				}
				else
				{
?>
	<div style="background-color:red;color:#fff;" align="center">This student is not prensent in our university. Control your Student Number.</div>
<?php
								
				}
			}
			else
			{
?>
	<div style="background-color:red;color:#fff;" align="center">This student is punished. He cannot borrow books from our library untill the <?php echo $tmp_["end_date"]; ?></div>
<?php
								
			}
		}
		else
		{
?>
	<div style="background-color:red;color:#fff;" align="center">This student already borrowed this book. Try to borrow another book.</div>
<?php
		}
	}
?>
			<div class="offset-1 col-3 text-end" style="background-color:re;">
				<img src="medias/<?php echo $data["book_img"];?>" class="card-img-top" alt="Cannot load image." width="300" height="350"/>
				<span style="font-family:sans-serif;" id="about_author"> <a href="#" title="About this author" style="text-decoration:none;" >About <?php echo $data["first_name"]." ".$data["last_name"]; ?></a>(Author)</span>
				
				<div id="author" style="position:absolute; z-index:99; display:none;">
					<img src="medias/<?php echo $data["image"];?>" class="btn btn-primary" style="background-color:orange;" alt="Cannot load image." width="150" height="200"/>
				</div>
			</div>
			
			
			<form method="post" action="#" class="col-5 mt-4">
				<div class="mb-3">
					
					<div class="text-center" style="margin-top:-20px;">
							<span style="font-size:30px; font-weight:bold;color:orange;"><?php echo $data["title"];?></span> 
						<br/>
							<span style="font-size : 15px;">By <?php echo $data["first_name"]." ".$data["last_name"];?> </span>
							<span style="font-weight:bold;">(Author)</span>
						</div>
				<br/>
					<label for="student_no" class="form-label">Student Number : </label>
					<input type="text" class="form-control" id="student_no" name="student_no" aria-describedby="student_no">
				</div>
				<div class="mb-3">
					<label for="date" class="form-label">Number Weeks(Max 12 Weeks) : </label>
					<input type="number" class="form-control" id="date" name="week" />
				</div>
			
			<hr/>
			<hr/>
			<hr/>
				<div class="text-center">
					<button type="submit" name="sb" class="btn btn-primary col-12" style="font-size:20px;">Borrow Now!</button>
				</div>
			</form>
	</article>
</section>


<script>
	var a_a = document.getElementById('about_author');
	var a = document.getElementById('author');
	a.style.marginLeft = "0px";
	a.style.marginTop = "0px";
	a_a.addEventListener("mouseover", function(event){
		a.style.display = "block";
		a.style.marginLeft = "300px"
		a.style.marginTop = "-150px";
	});
	a_a.addEventListener("mouseout", function(event){
		a.style.display = "none";
	});
</script>

