
<section class="container-fluid">
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
		<div class="container-fluid text-center col-10">
			<div class="row">
				<div class="col-3" style="background-color:re;">
					<img src="medias/<?php echo $data["book_img"];?>" class="card-img-top" alt="Cannot load image." width="300" height="350"/>
					<span style="font-family:sans-serif;" id="about_author"> <a href="#" title="About this author" style="text-decoration:none;" >About <?php echo $data["first_name"]." ".$data["last_name"]; ?></a>(Author)</span>
					<div id="author" style="position:absolute; z-index:99; display:none;">
						<img src="medias/<?php echo $data["image"];?>" class="btn btn-primary" style="background-color:orange;" alt="Cannot load image." width="150" height="200"/>
					</div>
				</div>
				<div class="col-9" style="background-color:blu;">

					<section class="container-fluid text-start">
						<div style="">
							<span style="font-size : 30px; font-weight:bold;"><?php echo $data["title"];?></span>
						</div>
						<div style="">
							<span style="font-size : 20px;">By <?php echo $data["first_name"]." ".$data["last_name"];?> </span>
							<span style="font-weight:bold;">(Author)</span>
						</div>
						
						<div class="">
								<span class="">
									<i class="fas fa-eye" style="color:orange;"></i>
									<span><?php echo $data["view"]; ?></span><span class="fw-bold">(Readings)</span>
								</span>
								
								<span class="">
									<i class="fas fa-barcode" style="color:orange;"></i>
									<span class="fw-bold"><?php echo $data["isbn"]; ?></span<span class="fw-bold">(ISBN)</span>
								</span>
								
								<span class="">
									<i class="far fa-calendar-alt" style="color:orange;"></i> 
									<span class="fw-bold"> Added On(<?php echo $data["add_on"]; ?>)</span>
								</span>
								
								
						</div>
					</section>
				<hr/>
					<section class="container-fluid">
					<?php $tab = array($data["description"]);?>
							
						
						<p class="" style="text-align:justify;">
							<span id="text1"> </span> 
							<a id="more" href="" onclick="more_f();">See More...</a>
							<a id="less" href="" onclick="less_f();">See Less</a>
						</p>
						
						<script>
							
								var desc = <?php echo json_encode($tab); ?>;
								desc = desc[0];
								var more = document.getElementById('more');
								var less = document.getElementById('less');
								var text1 = document.getElementById('text1');
							
								more.addEventListener("click", function(event){event.preventDefault()});
								less.addEventListener("click", function(event){event.preventDefault()});
								
								function less_f()
								{
									var text_1 = desc.substring(0,1000);
									if(desc.length <= 1000)
									{
										text_1 = desc;
										less.style.display = "none";
										more.style.display = "none";
										text1.innerHTML = text_1;
										return;
									}
									text1.innerHTML = text_1;
									
									less.style.display = "none";
									more.style.display = "inline-block";
								}
								function more_f()
								{
									text1.innerHTML = desc;
									less.style.display = "inline-block";
									more.style.display = "none";
								}
								
								less_f();
						</script>
							
					</section>
				<hr/>
					<section class="container-fluid">
						<div class="row" style="font-size:12px;">
							
							<div class="col-2 text-center bg-light">
								<span class="">
									<span>Editor</span><br/>
									<i class="fas fa-user-edit"></i></br>
									<span><?php echo $data["editor"]; ?></span>
								</span>
							</div>
							
							<div class="col-2 text-center bg-light">
								<span class="">
									<span>State</span><br/>
									<i class="fas fa-book"></i></br>
									<span><?php echo ($data["state"]==1)? "New" : "Old" ; ?></span>
								</span>
							</div>
							
							<div class="col-2 text-center bg-light">
								<span class="">
									<span>Pub. Date</span><br/>
									<i class="far fa-calendar-alt"></i></br>
									<span><?php echo $data["pub_date"]; ?></span>
								</span>
							</div>
							
							<div class="col-2 text-center bg-light">
								<span class="">
									<span>Place No</span><br/>
									<i class="fa fa-columns"></i></br>
									<span><?php echo $data["place_at"]; ?></span>
								</span>
							</div>
							
							<div class="col-2 text-center bg-light">
								<span class="">
									<span>Pages</span><br/>
									<i class="fas fa-file-alt"></i></br>
									<span><?php echo $data["page"]; ?></span>
								</span>
							</div>
							
							<div class="col-2 text-center bg-light">
								<span class="">
									<span>Quantity</span><br/>
									<i class="fas fa-boxes"></i></br>
									<span><?php echo $data["quantity"]; ?></span>
								</span>
							</div>
							
							
						</div>
						<hr/>
					</section>
				</div>
					<div class="row">
						<a href="<?php echo $_SERVER['CONTEXT_PREFIX'];?>?page=borrow&amp;book=<?php echo $data['isbn'];?>" class="btn btn-primary" style="font-size:30px;background-color:orange;">Borrow This Book!</a>
					</div>
			</div>
		</div>	
	</article>
	<br/>
	<article class="row mt-3">
		<div class="container-fluid text-center col-8">
			<div class="row">
				<h1>Similar Books...</h1>
		<hr/>
			</div>
			<div class="row">
<?php
	$id = $_GET["book"]; 
	$req = $bdd->prepare("SELECT * FROM book 
				WHERE category_id = (SELECT category_id FROM book WHERE book.isbn = :isbn LIMIT 1) LIMIT 10;");
	$req->execute(array("isbn"=>$id));

	while($data = $req->fetch())
	{
		if($id != $data["isbn"])
		{	
?>
						<div class="card col-4" style="display:inline-bloc;">
						<br/>
							<img src="medias/<?php echo $data["book_img"];?>" class="card-img-top" alt="Cannot load image." width="300" height="250"/>
							<div class="card-body">
								<p class="card-text">
									<?php echo turkish_to_english_character(substr($data["description"], 0, 40))."...";?>
									<h5 class="card-title"><?php echo turkish_to_english_character(substr($data["title"], 0, 30))."...";?></h5>
								</p>
							<!---
								<span class="fw-bold" style="font-style:italic">
									<span class="" style="color:red;">Readings :</span> <span class="" style="color:orange;"><?php echo $data["view"];?></span>
								</span>								
							<br/>
							-->
								<a href="<?php echo $_SERVER['CONTEXT_PREFIX'];?>?page=book_info&amp;book=<?php echo $data['isbn'];?>" class="btn btn-primary" style="background-color:orange;font-size:20px;">View This Book</a>
							</div>
						</div>
<?php
		}
	}
?>				</div>
		</div>
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