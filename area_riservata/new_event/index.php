<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<?php $permission = 1; require $_SERVER["DOCUMENT_ROOT"] . "/esoes/area_riservata/check_login.php" ?>
		<?php include $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/imports.html" ?>
		<?php include $_SERVER["DOCUMENT_ROOT"] . "/esoes/utilities/importsCalendar.html" ?>
		<?php include $_SERVER["DOCUMENT_ROOT"] . "/esoes/area_riservata/imports_riservata.html" ?>
		<script type="text/javascript" src="/esoes/js/jquery-ui/datepicker-it.js"></script>
		<title>ESO ES Onlus | Nuovo evento</title>
		<link href='./style.css' rel='stylesheet' />
		<script type="text/javascript" src="/esoes/js/timepicker/dist/wickedpicker.min.js"></script>
		<link rel="stylesheet" type="text/css" href="/esoes/js/timepicker/dist/wickedpicker.min.css">
	</head>
	<body>
		<div class="esterno">
			<?php include $_SERVER["DOCUMENT_ROOT"] . "/esoes/area_riservata/menu.php" ?>
			<br>
			<div class="contenitore">
				<h2 class="text-center bold">Inserisci un nuovo evento:</h2>
				<div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Titolo:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="titolo" placeholder="Titolo">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Luogo:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="luogo" placeholder="Luogo">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Indirizzo:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="indirizzo" placeholder="Indirizzo">
						</div>
					</div>
					<div class="form-group row">
						<label  class="col-sm-2 col-form-label">Giorno:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="datepicker" placeholder="gg-mm-aaaa">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Ora di inizio:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="timepicker" placeholder="hh:mm">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Tipo:</label>
						<div class="col-sm-10">
							<select id="tipo" class="form-control">
								<option selected value="0">Spettacolo</option>
								<option value="2">Allenamento</option>
							</select>
						</div>
					</div>
					<button type="submit" class="btn btn-primary center" id="create">Crea evento</button>
				</div>
			</div>
		</div>
		<script src='./script.js'></script>
	</body>
</html>
