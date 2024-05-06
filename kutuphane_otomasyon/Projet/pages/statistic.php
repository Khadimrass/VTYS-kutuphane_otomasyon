<?php
$student_no = $_GET["student"];
					if(isset($_POST["sb"]))
							{
								$id = $_POST["hd"]; 
								$bdd->exec("UPDATE borrow SET back_at = NOW() WHERE id = $id;");
								$req = $bdd->query("SELECT id FROM borrow
											WHERE id = $id
											AND back_at > be_back_at
									");
								$req_ = $bdd->query("SELECT id FROM ceza
											WHERE student_no = $student_no
									");
								$tmp = $req->fetch();
								$tmp_ = $req_->fetch();
								if($tmp)
								{
									if(!$tmp_)
									{
										$bdd->exec("INSERT INTO ceza VALUES(0, $student_no, NOW(), DATE_ADD(NOW(), INTERVAL 15 DAY));");
									}
									else
									{
										$bdd->exec("UPDATE ceza SET end_date = DATE_ADD(end_date, INTERVAL 5 DAY);");
									}

									 header("Refresh:0"); die();
								}	
							}
							
	
?>
<section class="container-fluid">
	<article class="row text-center" style="color:blue;">
		<h1>INFORMATIONS ABOUT <span style="color:orange;"><?php echo $student_no; ?></span></h1>
	</article>
	<br/>
<?php
	//RETURN A BOOK
	//DATEDIFF(ceza.end_date, ceza.started_date) AS ceza_date
	$req = $bdd->query("SELECT book.isbn, book.title, writer.first_name, writer.last_name, borrow.id AS borrow_id, borrow.borrow_at, borrow.be_back_at, borrow.back_at, category.name AS cat_name, language.language
						FROM borrow
						LEFT JOIN  book ON book.isbn = borrow.book_isbn
						LEFT JOIN  category ON book.category_id = category.id
						LEFT JOIN  language ON book.language_id = language.id	
						LEFT JOIN  write_ ON write_.book_isbn = book.isbn
						LEFT JOIN  writer ON write_.writer_id = writer.id
						LEFT JOIN  ceza ON ceza.student_no = borrow.student_no
						
						WHERE borrow.student_no = $student_no
	");
/*
						UNION
						
						SELECT book.isbn, book.title, writer.first_name, writer.last_name, borrow.borrow_at, borrow.be_back_at, category.name, language.language, ceza.end_date
						FROM borrow
						RIGHT JOIN  book ON book.isbn = borrow.book_isbn
						RIGHT JOIN  category ON book.category_id = category.id
						RIGHT JOIN  language ON book.language_id = language.id	
						RIGHT JOIN  write_ ON write_.book_isbn = book.isbn
						RIGHT JOIN  writer ON write_.writer_id = writer.id
						RIGHT JOIN  ceza ON ceza.student_no = borrow.student_no
*/


//{} () $ = []	

?>
<a href="<?php echo $_SERVER['CONTEXT_PREFIX'];?>?page=statistic" class="btn btn-primary"> &lt;&lt;&lt;Back To Statistcs</a>
	<article class="row">
		<div class="offset-0 col-12" style="background-color:re;">
			<table class="table table-dark" style="width:100%;background-color:#fff;">
				<tr>
					<th scope="col">ISBN</th>
					<th scope="col">Title</th>
					<th scope="col">Writer</th>
					<th scope="col">Category</th>
					<th scope="col">Language</th>
					<th scope="col">Owed Date</th>
					<th scope="col">Shoud Be Back On</th>
					<th scope="col">Gave Back At</th>
				</tr>
<style>
	.ceza_line
	{
		color : orange;
		background-color : red;
	}	
</style>	
<?php
		
				
	while($data = $req->fetch())
	{
?>				
				<tr style="background-color:re;">
					<th scope="row" style="background-color:<?php echo isset($data["back_at"]) ? ((strtotime($data["back_at"]) > strtotime($data["be_back_at"])) ? "red" : "green") : (time() > strtotime($data["be_back_at"]) ? "red" : "green")  ; ?>"> 
						<?php echo $data["isbn"]; ?> </th>
					<td style="background-color:<?php echo isset($data["back_at"]) ? ((strtotime($data["back_at"]) > strtotime($data["be_back_at"])) ? "red" : "green") : (time() > strtotime($data["be_back_at"]) ? "red" : "green")  ; ?>">
						<i><?php echo $data["title"]; ?></i></td>
					<td style="background-color:<?php echo isset($data["back_at"]) ? ((strtotime($data["back_at"]) > strtotime($data["be_back_at"])) ? "red" : "green") : (time() > strtotime($data["be_back_at"]) ? "red" : "green")  ; ?>">
						<?php echo $data["first_name"]." ".$data["last_name"]; ?></td>
					<td style="background-color:<?php echo isset($data["back_at"]) ? ((strtotime($data["back_at"]) > strtotime($data["be_back_at"])) ? "red" : "green") : (time() > strtotime($data["be_back_at"]) ? "red" : "green")  ; ?>">
						<?php echo ucwords($data["cat_name"]); ?></td>
					<td style="background-color:<?php echo isset($data["back_at"]) ? ((strtotime($data["back_at"]) > strtotime($data["be_back_at"])) ? "red" : "green") : (time() > strtotime($data["be_back_at"]) ? "red" : "green")  ; ?>">
						<?php echo $data["language"]; ?></td>
					<td style="background-color:<?php echo isset($data["back_at"]) ? ((strtotime($data["back_at"]) > strtotime($data["be_back_at"])) ? "red" : "green") : (time() > strtotime($data["be_back_at"]) ? "red" : "green")  ; ?>">
						<?php echo $data["borrow_at"]; ?></td>
					<td style="background-color:<?php echo isset($data["back_at"]) ? ((strtotime($data["back_at"]) > strtotime($data["be_back_at"])) ? "red" : "green") : (time() > strtotime($data["be_back_at"]) ? "red" : "green")  ; ?>">
						<?php echo $data["be_back_at"]; ?></td>
		
					<td style="background-color:<?php echo isset($data["back_at"]) ? ((strtotime($data["back_at"]) > strtotime($data["be_back_at"])) ? "red" : "green") : (time() > strtotime($data["be_back_at"]) ? "red" : "green")  ; ?>">
					<?php
//{} () $ = []						
// <th scope="col">Ceza ?</th> <td><?php echo isset($data["ceza_date"]) ? "<i style='color:red;'>Cezali</i>" : (isset($data["back_at"]) ? "<i style='color:green;'>Not Ceza</i>" : "<i style='color:orange;'>In process...</i>"); </td>
						
						if(isset($data["back_at"]))
						{
							echo $data["back_at"]; 
						}
						else
						{
					?>
						
							<form method="post" action="#">
								<div class="text-center">
									<input type="hidden" id="hd" class="form-control" name="hd" value="<?php echo $data['borrow_id']; ?>" />
									<button type="submit" name="sb" class="btn btn-primary col-12" style="font-siz:15px;">Return</button>
								</div>
							</form>
						
						
						<?php
							} 
						?>
						
					</td>
					
				
					
				</tr>
<?php
	}
?>
			</table>
		</div>
	</article>
</section>

