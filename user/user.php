<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../assets/css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<title>Document</title>
</head>
<body>
	<div id="header">
		<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 p-3 border-bottom">
	      <a href="#" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
	      	<img src="../assets/img/3248924.png" class="bi me-2" width="40" height="40">
	      	<h1 aria-label="Bootstrap">Аптека</h1>
	      </a>
	    </header>
	</div>	
    
    

    <div class="row m-0" style="height: auto;">
    	<div class="flex-shrink-0 pl-3 pt-3 bg-white col">
		    <a href="#" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
		    	<img src="../assets/img/114903.png" class="bi pe-none me-2" width="30" height="24">
		     	<span class="fs-5 fw-semibold">Асортимет</span>
		    </a>
		    <iframe src="list.php" onload="resizeIframe(this)" style="width: 100%;"></iframe>
  		</div>



		<div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white col-5">
		    <div id="koz" class="d-flex align-items-center flex-shrink-0 p-3 text-decoration-none border-bottom">
		      <img src="../assets/img/Cart-PNG-HD-Quality.png" class="bi pe-none me-2" width="30" height="24">
		      <span class="fs-5 fw-semibold">Корзина</span>
		    </div>
		    <div class="video list-group list-group-flush border-bottom">
		      <iframe src="item.php" onload="resizeIframe(this)"></iframe>
		    </div>
	    </div>
    </div>

    <div id="footer">
		<footer id="footer" class="d-flex flex-wrap justify-content-between align-items-center py-3 mb-4 border-top">
		    <div class="col-md-4 d-flex align-items-center">
		      <a href="#" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
		        <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
		      </a>
		      <span class="mb-3 mb-md-0 text-muted">© 2022 Company, Inc</span>
		    </div>

		    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
		      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
		      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
		      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
		    </ul>
		</footer>
	</div>
	<script src="../assets/js/script.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>