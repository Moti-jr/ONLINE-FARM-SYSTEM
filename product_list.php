<?php

// Database
$hostname = "localhost";
$username = "root";
$password = "";

try {
	$connection = new PDO("mysql:host=$hostname;dbname=farm", $username, $password);
	// set the PDO error mode to exception
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo "Database connection failed: " . $e->getMessage();
}
if (isset($_POST['records-limit'])) {
	$_SESSION['records-limit'] = $_POST['records-limit'];
}

$limit = 8;
$page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
$paginationStart = ($page - 1) * $limit;
$sql = "SELECT * FROM `product`  ORDER BY `product`.`Date Added` DESC ";
$authors = $connection->query("SELECT * FROM product   ORDER BY `product`.`Date Added` DESC LIMIT $paginationStart, $limit")->fetchAll();
// Get total records
$sql = $connection->query("SELECT count(product_id) AS Id FROM product")->fetchAll();
$allRecrods = $sql[0]['Id'];

// Calculate total pages
$totoalPages = ceil($allRecrods / $limit);
// Prev + Next
$prev = $page - 1;
$next = $page + 1;
?>

<div class="products_sample col-lg-11 col-md-12 col-sm-12 col-xm-12 mx-auto mt-2 d-flex justify-content-around flex-wrap no-gutters  mb-3 pb-5"
	style="background-color: white; position:relative;">
	<?php foreach ($authors as $row) : ?>
	<div class="col-lg-3 col-md-4 col-sm-6 col-xm-6 col-6 mb-3 mt-2">
		<div class="prod_list card text-black mr-2" id="product-card" ">
                <img class=" card-img-top px-1 pt-1" src="Images/<?php echo $row['img'] ?>" height="210px" alt=""
			data-toggle="modal" data-target="#prod_id<?php echo $row['product_id'] ?>">
			<!-- Modal -->
			<div class="modal fade" id="prod_id<?php echo $row['product_id'] ?>" tabindex="-1" role="dialog"
				aria-labelledby="modelTitleId" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">s
						<div class="modal-body">
							<div class="col-lg-6 mx-auto">
								<img src="Images/<?php echo $row['img'] ?>" alt="" style="width:100%">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary">Save</button>
						</div>
					</div>
				</div>
			</div>
			<!-- End of Modal -->
			<div class="card-footer">
				<div class="rating  mb-2">
					<?php
						$rater = 4;
						for ($r = 0; $r < $rater; $r++) {
						?>
					<i class="fa fa-star" style="color:gold; font-size:14px" aria-hidden="true"></i>
					<?php
						}
						if ($rater < 5) {
							$rem = 5 - $rater;
							for ($re = 0; $re < $rem; $re++) {
							?>
					<i class="fa fa-star" style="color:cadetblue; font-size:14px" aria-hidden="true"></i>
					<?php
							}
						}
						?>
				</div>
				<a href="product_search.php?name=<?php echo $row['name'] ?> ">
					<h6 style="font-size:13px;font-weight:800"><?php echo $row['name'] ?></h6>
				</a>
				<div class="row mb-2 mt-1">
					<div class="col-lg-6">
						<span><s>Ksh <?php echo $row['previous_price'] ?></s></span>
					</div>
					<span>Ksh <?php echo $row['per_unit']  ?>/<?php echo $row['weight'] ?><?php echo $row['unit']; ?>
					</span>
				</div>
				<div class="button-section mb-0 mt-2">
					<form action="cart1.php" method="post">
						<input type="text" name="product_id" value="<?php echo $row['product_id'] ?>" hidden>
						<input type="text" name="UserId" value="<?php echo $_SESSION['Id'] ?>" hidden>
						<input type="text" name="Price" value="<?php echo $row['per_unit'] ?>" hidden>
						<center>
							<button type="submit" class="btn" style="background-color:orange"><i class="fa fa-cart-plus"
									aria-hidden="true"></i> Add to Cart</button>
						</center>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach; ?>

	<div class="footer mt-4" style="position: absolute; bottom:4px;">
		<!-- Pagination -->
		<div class="row">
			<nav aria-label="Page navigation example mt-2">
				<ul class="pagination justify-content-center">
					<li class="page-item 
                    <?php if ($page <= 1) {
						echo 'disabled';
					} ?>">
						<a class="page-link" href="
                        <?php if ($page <= 1) {
							echo '#';
						} else {
							echo "?page=" . $prev;
						} ?>">Previous</a>
					</li>
					<?php
					for ($i = 1; $i <= $totoalPages; $i++) : ?>
					<li class="page-item 
                        <?php if ($page == $i) {
							echo 'active';
						} ?>">
						<a class="page-link" href="index.php?page=
                            <?= $i; ?>"> <?= $i; ?> </a>
					</li>
					<?php endfor; ?>
					<li class="page-item 
                    <?php if ($page >= $totoalPages) {
						echo 'disabled';
					} ?>">
						<a class="page-link" href="
                        <?php if ($page >= $totoalPages) {
							echo '#';
						} else {
							echo "?page=" . $next;
						} ?>">Next</a>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</div>
<!-- jQuery + Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
	$('#records-limit').change(function() {
		$('form').submit();
	})
});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>