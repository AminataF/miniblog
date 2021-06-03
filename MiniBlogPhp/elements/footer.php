	</main><!-- /.container -->
	<footer>
		<hr>
		<div class="row">
			<div class="col-md-4">
				<?php
					require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'DoubleCompteur.php';
					$compteur = new DoubleCompteur(dirname(__DIR__) . DIRECTORY_SEPARATOR .'data'. DIRECTORY_SEPARATOR . 'compteur');
					$compteur->incrementer();
					$vues = $compteur->recuperer();
				?>
				Il y a <?= $vues?> visite<?php if($vues > 1){ echo 's'; }?> sur le site.
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<form action="newsletters.php" method="POST" role="form">
						<legend>NewsLetter</legend>
						<div class="form-group">
							<input type="email" name="email" class="form-control col-sm-8" id="email" placeholder="Entrer votre email" require>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
			<div class="col-md-4">
				<h5>Navigations</h5>
				<ul class="list-unstyled text-small">
					<?= nav_menu(); ?>
				</ul>
			</div>
		</div>
	</footer>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>

	</html>