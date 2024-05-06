

		
		<section class="row">
			<article class="container-fluid text-center offset-2 col-8 mt-3" style="background-color:#ff;">
				
<?php
//{} () $ = [] +&
	$no = isset($_GET["no"]) ? ((int)$_GET["no"]==0) ? 1 : (int)$_GET["no"]  : 1;
	

if(isset($_GET["search"]))
{
	
	if(isset($_POST["sb"]))
	{
		$title = isset($_POST["search"]) ? htmlspecialchars(trim($_POST["search"])) : null;
		
/*		
		$req = $bdd->query("SELECT COUNT(*) AS total FROM book 
							WHERE title LIKE '%$title%'
							ORDER BY add_on DESC");	
	
		$total = (int)$req->fetch()["total"];
		$apage = 4;
		$num_page = ceil($total/$apage);
		$debut = ($no-1)*$apage;
*/	
	
		$req = $bdd->query("SELECT * FROM book WHERE title LIKE '%$title%'
							ORDER BY add_on DESC");
	}
?>

				<div class="display-6 fw-bold">Searching Results : <i style="color:orange"><?php echo $_POST["search"]; ?></i></div>
				<div class="row mt-3">
<?php
}
else
{
?>
		<section class="row">
			<article class="container-fluid text-center offset-2 col-8 mt-3" style="background-color:#fff;border:2px solid #000;border-radius:2px;">
				<div class="display-6 fw-bold">Recently Added...</div>
					<!--Boucle php limit 3-->
					<div class="row mt-3">
<?php
	$req = $bdd->query("SELECT * FROM book ORDER BY add_on DESC LIMIT 3");
	while($data = $req->fetch())
	{
?>
						<div class="card col-4" style="display:inline-bloc;">
							<img src="medias/<?php echo $data["book_img"];?>" class="card-img-top" alt="Cannot load image." width="300" height="250"/>
							<div class="card-body">
								<p class="card-text"><?php echo turkish_to_english_character(substr($data["description"], 0, 40))."...";?></p>
								<h5 class="card-title"><?php echo turkish_to_english_character(substr($data["title"], 0, 30))."...";?></h5>
								<span class="fw-bold" style="font-style:italic">
									<span class="" style="color:red;">Readings :</span> <span class="" style="color:orange;"><?php echo $data["view"];?></span>
								</span>                           
								<a href="<?php echo $_SERVER['CONTEXT_PREFIX'];?>?page=book_info&amp;book=<?php echo $data['isbn'];?>" class="btn btn-primary">View This Book</a>
							</div>
						</div>
<?php
	}
?>	
					</div>
			</article>
		</section>
		<br/>
		
				<div class="display-6 fw-bold" id="#our-books">Our Books...</div>
				<div class="row mt-3">
<?php
//{} () $ = [] +&

		$req = $bdd->query("SELECT count(*) AS total FROM book;");
		$total = (int)$req->fetch()["total"];
		$apage = 4;
		$num_page = ceil($total/$apage);
		$debut = ($no-1)*$apage;
		$req = $bdd->query("SELECT * FROM book ORDER BY add_on DESC LIMIT  $apage OFFSET $debut;");

}

if($req->rowCount() > 0)
{
	while($data = $req->fetch())
	{
?>
						<div class="card col-3" style="display:inline-bloc;">
							<img src="medias/<?php echo $data["book_img"];?>" class="card-img-top" alt="Cannot load image." width="300" height="300"/>
							<div class="card-body">
								<p class="card-text"><?php echo turkish_to_english_character(substr($data["description"], 0, 40))."...";?></p>
								<h5 class="card-title"><?php echo turkish_to_english_character(substr($data["title"], 0, 30))."...";?></h5>
								<span class="fw-bold" style="font-style:italic">
									<span class="" style="color:red;">Readings :</span> <span class="" style="color:orange;"><?php echo $data["view"];?></span>
								</span>
								<a href="<?php echo $_SERVER['CONTEXT_PREFIX'];?>?page=book_info&amp;book=<?php echo $data['isbn'];?>" class="btn btn-primary">View This Book</a>
							</div>
						</div>
<?php
	}	
}
else
{
	if(isset($_GET["search"]))
	{		
?>
		<div class="row" style="background-color:red;color:#fff;">
			The book you're looing for doesn't match with any one present in our database. Try another one or take a look to our recently added books.
		</div>	
		
			<hr/>
			<hr/>
				<section class="row">
					<article class="container-fluid text-center  offset-0 col-12 mt-3" style="background-color:#fff;border:1px solid #000;border-radius:2px;">
					<div class="display-6 fw-bold">Recently Added...</div>
						<!--Boucle php limit 3-->
						<div class="row mt-3">
			<?php
				$req = $bdd->query("SELECT * FROM book ORDER BY add_on DESC LIMIT 6");
				while($data = $req->fetch())
				{
			?>
									<div class="card col-4" style="display:inline-bloc;">
										<img src="medias/<?php echo $data["book_img"];?>" class="card-img-top" alt="Cannot load image." width="300" height="250"/>
										<div class="card-body">
											<p class="card-text"><?php echo turkish_to_english_character(substr($data["description"], 0, 40))."...";?></p>
											<h5 class="card-title"><?php echo turkish_to_english_character(substr($data["title"], 0, 30))."...";?></h5>
											<span class="fw-bold" style="font-style:italic">
												<span class="" style="color:red;">Readings :</span> <span class="" style="color:orange;"><?php echo $data["view"];?></span>
											</span>                           
											<a href="<?php echo $_SERVER['CONTEXT_PREFIX'];?>?page=book_info&amp;book=<?php echo $data['isbn'];?>" class="btn btn-primary">View This Book</a>
										</div>
									</div>
			<?php
				}
			?>	
								</div>
						</article>
					</section>
<?php
	}
	else
	{		
?>
		<div style="background-color:red;color:white;">
			No Book To Display Yet. Try Again Later.
		</div>
<?php
	}
?>

		
<?php	
}
?>
				</div>
				
				
				
			</article>
		</section>
		
		<section class="row">
			<article class="container-fluid text-center offset-2 col-8 mt-3" style="background-color:#ff;">

<?php
	if($no > 1 AND $no <= $num_page)
	{
?>
<button class="btn-pagination">
	<a class="pagination" href="<?php echo $_SERVER['CONTEXT_PREFIX'];?>?page=books&amp;no=<?php $prev=$no-1; echo $prev;?>">&lt;&lt; </a>
</button>
<?php
	}
?>		
<?php
//{} () $ = []
if(!isset($_GET["search"]))
{	
	//$num_page = 55;
	$i = 1;
	$page = $no;
	
	$debut = ($page-2 >= 1) ? $page-2 : 1; 
	$fin =($page+2 <= $num_page) ? $page+2 : $num_page; 
	
?>

<?php
	while($debut <= $fin)
	{
?>
	<button class="btn-pagination">
		<a class="pagination" href="<?php echo $_SERVER['CONTEXT_PREFIX'];?>?page=books&amp;no=<?php echo $debut;?>"><?php echo ($no==$debut) ? "<span style='background-color:blue;color:white;padding:5px;'>".$debut."</span>" : $debut; ?> </a>
	</button>
<?php
		$debut++;
	}

	if($fin < $num_page-1)
	{
?>
	<button class="btn-pagination">
		...<a class="pagination" href="<?php echo $_SERVER['CONTEXT_PREFIX'];?>?page=books&amp;no=<?php echo $num_page;?>"><?php echo ($no==$num_page) ? "<span style='background-color:blue;color:white;padding:5px;'>".$num_page."</span>" : $num_page; ?> </a>
	</button>
<?php	
	}
	
	if($no < $num_page AND $no >= 1)
	{
?>
<button class="btn-pagination">
	<a class="pagination" href="<?php echo $_SERVER['CONTEXT_PREFIX'];?>?page=books&amp;no=<?php $next=$no+1; echo $next;?>">&gt;&gt; </a>
</button>
<?php
	}
}
?>

<style>
	.pagination
	{
		display : inline-block;
		text-decoration : none;	
	}
	
	.btn-pagination:hover
	{
		background-color : blue;
		color : #fff;
	}
	
	.btn-pagination
	{
		border : none;
		font-weight : bold;
		padding : 5px;
	}
	
	
</style>
	
	
	</article>
		</section>
		
		