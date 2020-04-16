<article class="row header bg-dark">
	<header class="col-8 col-sm-8 col-lg-8 col-xl-8">
		<a href="?q=0&keyword=Section">
			<img class="logo" src="public/img/logo.png?<?php echo rand();?>">
		</a>
		<h1 class="lema d-none">Un lugar para el deportista.</h1>
	</header>
	<nav class="navbar col-4 col-sm-4 col-lg-4 col-xl-4">
		<ul class="nav">
			<a href="?q=0&keyword=Section">
				<li class="h">
					Home
				</li>	
			</a>
			<a href="">
				<li class="m">
					Shop
				</li>	
			</a>
			<a href="?q=2&keyword=Support">
				<li class="s">
					Support
				</li>	
			</a>
			<?php
			if (isset($_SESSION['user']) 
				&& isset($_SESSION['credential']) 
				&& $_SESSION['credential'] == 'level-1' 
				|| isset($_SESSION['credential']) 
				&& $_SESSION['credential'] == 'level-2'){
			 ?>
				<li class="list-profile">
					<article class="user-profile-photo" style="background-image: url(public/img/user.png);"></article>
				</li>
				<a href="?q=7&keyword=Logout">
					<li>
						Salir
					</li>
				</a>
			 <?php
			 }else{
			 ?>
				 <a href="?q=5&keyword=Login">
					<li>
						Login/Register
					</li>
				</a>
			 <?php
			 }
			 ?> 
		</ul>
		<?php
		if (isset($q)){
		?>
			<article class="frm-search">
				<input id="form-control" type="search" placeholder="Search" aria-label="Search">
				<button title="Presione y hable" id="assistant-voice" type="button" class="assistant-voice">
					<img src="public/img/call.png" class="assistant-voice-img">
				</button>
				<audio id="sound-voice">
					<source src="public/sound/call-1.mp3" type="audio/mp3">
				</audio>
				<audio id="sound-voice-off">
					<source src="public/sound/call-off.mp3" type="audio/mp3">
				</audio>
			</article>
		<?php	
		}else{
		?>
			<a href="?q=0&keyword=Section">
				<article class="frm-search">
					<input id="form-control" type="search" placeholder="Search" aria-label="Search">
					<button type="button" class="assistant-voice">
						<img src="public/img/call.png" class="assistant-voice-img">
					</button>
				</article>
			</a>
		<?php
		}
		?>	
	</nav>
</article>