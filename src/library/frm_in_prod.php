<?php 
	if (isset($_SESSION['user']) 
		&& isset($_SESSION['credential']) 
		&& $_SESSION['credential'] == 'level-2'){
		?>
		<button type="button" class="btn-insert-product">
			<img src="./public/img/add.png" class="img-insert-product">
		</button>
		<article class="content-frm-insert-product">
			<form method="POST" id="frm-insert-product" class="frm-insert-product">
				<article class="title-frm-insert-product">
					<br><h6>Hi!, ¿Are you insert a product? Let's go!</h6><br>
				</article>
				<input id="ti" type="text" name="title" placeholder="My fabolous title" required>
				<textarea placeholder="My detailing description" id="description" name="description" required></textarea>
				<select name="type" required>
					<option>
						---
					</option>
					<option>
						MTB
					</option>
					<option>
						Route
					</option>
					<option>
						Urban
					</option>
					<option>
						Kids
					</option>
					<option>
						Gadgets
					</option>
					<option>
						Products
					</option>
					<option>
						Suplements
					</option>
					<option>
						Services
					</option>
				</select>
				<input type="file" id="im" accept="image/*" name="img" required>
				<input type="file" id="im_2" accept="image/*" name="img_2" required>
				<input type="file" id="im_3" accept="image/*" name="img_3" required>
				<input onkeyup="format(this)" type="text" id="pr" name="price" placeholder="My price" required>
				<input type="url" id="bu" name="button" placeholder="My link buy" required>
				<article class="content-btn-insert-product">
					<button type="submit" class="btn-submit-insert-product btn btn-primary">
						Insert
					</button>
					<button type="button" class="btn-back-insert-product btn btn-danger">
						Back
					</button>
				</article>
			</form>
		</article>	
		<?php
	}
?>