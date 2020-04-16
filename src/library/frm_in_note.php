<?php
	if (isset($_GET['q']) 
		&& $_GET['q'] == 3 
		&& isset($_SESSION['user']) 
		&& isset($_SESSION['credential']) 
		&& $_SESSION['credential'] == 'level-2'){
	?>
		<button type="button" class="btn-insert-note">
			<img src="./public/img/add-note.png" class="img-insert-note">
		</button>
		<article class="content-frm-insert-publish">
			<form method="POST" id="frm-insert-publish" class="frm-insert-product">
				<article class="title-frm-insert-product">
					<br><h6>Hello! Publish a note? Let's start!</h6><br>
				</article>
				<input id="tr" type="text" name="transmitter" placeholder="Published by (Optional)">
				<input id="ti" type="text" name="title" placeholder="My fabolous title (Required)" required>
				<textarea id="text_content" name="description" placeholder="My text content (Required)" required></textarea>
				<label>
					<p>Image #1 (Optional)</p>
					<input type="file" id="im1" accept="image/*" name="img1">
					<p>Image #2 (Optional)</p>
					<input type="file" id="im2" accept="image/*" name="img2">
					<p>Image #3 (Optional)</p>
					<input type="file" id="im3" accept="image/*" name="img3">
				</label>
				<article class="content-btn-insert-product">
					<button type="submit" class="btn-submit-insert-product btn btn-primary">
						Insert
					</button>
					<button type="button" class="btn-back-insert-publish btn btn-danger">
						Back
					</button>
				</article>
			</form>
		</article>
	<?php	
	}
?>