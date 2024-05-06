<?php
//GENERAL UPFATE OF DATABASE OF WHAT CONCERNING CEZA
//{} () $ = []
	$bdd->exec("DELETE FROM ceza WHERE end_date <= NOW();");
?>
<section class="container-fluid">
	<article class="row text-center" style="color:blue;">
		<h1>Who Borrowed ?</h1>
	</article>
	<br/>
	<article class="row">
		<div class="offset-1 col-10" style="">
<?php
//{} () $ = []
	$req = $bdd->query("SELECT student.student_no, COUNT(borrow.book_isbn) AS owed_num, MAX(borrow.borrow_at) AS max_b_date, MIN(borrow.be_back_at) as min_b_date, ceza.started_date as ceza,
					DATEDIFF(ceza.end_date, ceza.started_date) AS ceza_date
					FROM student
					LEFT JOIN borrow ON student.student_no = borrow.student_no
					LEFT JOIN ceza ON borrow.student_no = ceza.student_no
					GROUP BY student.student_no
			"); 
	
?>
			<table class="table table-striped table-dark" style="width:100%; background-color:#fff;">
				<tr>
					<th scope="col">Student</th>
					<th scope="col">Owed Books</th>
					<th scope="col">Lastest Book Borrowed At</th>
					<th scope="col">Earliest Date To Return</th>
					<th scope="col">Ceza Suresi</th>
				</tr>
<?php
	while($data = $req->fetch())
	{
?>				<tr>
				<?php 
						if($data["owed_num"]==0)
						{
				?>
							<th scope="row"><?php echo $data["student_no"]; ?></th>

				<?php
						}
						else
						{
				?>
					<th scope="row"><a href="<?php echo $_SERVER['CONTEXT_PREFIX'];?>?page=statistic&amp;student=<?php echo $data["student_no"]; ?>"><?php echo $data["student_no"]; ?></a></th>
				<?php
						}
				?>
					<td><?php echo $data["owed_num"];  ?></td>
					<?php 
						if($data["owed_num"]==0)
						{
					?>
							<td style="color:orange;text-align:cente;"> No</td> 
							<td style="color:orange;text-align:cente;">Book</td> 
							<td style="color:orange;text-align:cente;">Borrowed.</td> 
					<?php
						}
						else
						{
					?>
							<td><?php echo $data["max_b_date"]; ?></td>
							<td><?php echo $data["min_b_date"]; ?></td>
							<td><?php echo isset($data["ceza_date"]) ? "<span style='color:red'>".$data["ceza_date"]." DAYS</span>" : "<span style='color:green'>No ceza</span>"; ?></td>

					<?php
						}
					?>					
				</tr>
<?php
	}
?>
			</table>
		</div>
	</article>
</section>