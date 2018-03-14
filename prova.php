<link rel="stylesheet" href="croppie.css" />
<script src="croppie.js"></script>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<?php include "./utilities/imports.html" ?>
        <link rel="stylesheet" href="./css/home.css">
		
		<title>ESO ES Onlus</title>
		<link rel="stylesheet" href="./js/croppie-2.6.1/croppie.css" />
		<script src="./js/croppie-2.6.1/croppie.js"></script>
	</head>
	<body>
		<?php include "./utilities/menu.php"; ?>
		<div class="container">
			<a class="btn file-btn">
                                    <span>Upload</span>
                                    <input type="file" id="upload" value="Choose a file" accept="image/*" />
                                </a>
                                <div id="upload-demo"></div>
			<script>
			$uploadCrop = $('#upload-demo').croppie({
    enableExif: true,
    viewport: {
        width: 200,
        height: 200,
        type: 'circle'
    },
    boundary: {
        width: 300,
        height: 300
    }
})
			</script>
		</div>
		
		<?php include "./utilities/footer.html"; ?>		
	</body>
</html>