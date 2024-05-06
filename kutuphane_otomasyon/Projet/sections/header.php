
	
	<header class="container-fluid text-center mt-3">
		<div class="row">
			<div class="btn btn-primary display-1 offset-1 col-10 pl-5 fw-bold" style="font-size:30px;"><span style="color:orange;">
				KOU KU</span><span style="color:red;"><span style="font-size:40px;">T</span>UPHANE</span>'YE HOŞGELDİNİZ!</div>
		</div>
		<div class="row">
			<nav class="navbar navbar-expand">
				<div class="container">
					<a class="navbar-brand text-uppercase fw-bold" href="<?php echo $_SERVER['CONTEXT_PREFIX'];?>">

						<span class="bg-primary bg-gradient p-1 rounded-3 text-light">KOU</span> KUTUPHANE
					</a>
					<ul class="navbar-nav">
						<li class="nav-item active">
							<a href="<?php echo $_SERVER['CONTEXT_PREFIX'];?>#our-books" class="nav-link">Our Books</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo $_SERVER['CONTEXT_PREFIX'];?>?page=add_book" >Add A New Book</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo $_SERVER['CONTEXT_PREFIX'];?>?page=statistic" class="nav-link">Statistics</a>

						</li>
						<li class="nav-item">
							<a class="nav-link" href="https://www.kocaeli.edu.tr/" target="_blank">KOU</a>
						</li>

						<li class="nav-item">
							<form method="post" action="?page=welcome&amp;search=1">
								<div class="mb-3" style="display:inline-block;">
									<input type="search" class="form-control" id="search" name="search" placeholder="Type a book.">
								</div>
								<button type="submit" name="sb" class="btn btn-primary">Search</button>
							</form>
						</li>
					</ul>
			  </div>
			</nav>
		</div>
	</header>