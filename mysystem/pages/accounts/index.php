<?php
include "../../api/config.php";

if (!isset($_SESSION['user'])) {
	header("LOCATION: ../../");
	exit();
}
?>
<!DOCTYPE html>
<html>
	<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css" />
  </head>
  <body>
	        <?php include "../menu.php"; ?>
        <div class="container mt-5">
            <h1>Account <?php echo $_SESSION['user']['fname'];?></h1>
            
			<table class="table">
			  <thead>
				<tr>
				  <th scope="col">ID</th>
				  <th scope="col">First Name</th>
				  <th scope="col">Last Name</th>
				  <th scope="col">Email</th>
				  <th scope="col">Action</th>
				</tr>
			  </thead>
			  <tbody id="tblAccountsList">
			  </tbody>
			</table>
        </div>
		
		<div class="modal" tabindex="-1" id="editModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		<input type="hidden" id="editId" />
        <input placeholder="Fname" type="text" id="editFname" />
		<br />
		<input placeholder="Email" type="text" id="editEmail" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button onclick="update()" type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

	<script src="https://code.jquery.com/jquery-4.0.0.js" integrity="sha256-9fsHeVnKBvqh3FB2HYu7g2xseAZ5MlN6Kz/qnkASV8U=" crossorigin="anonymous"></script>
	<script src="script.js"/></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>