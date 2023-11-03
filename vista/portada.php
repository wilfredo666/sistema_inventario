<link rel="stylesheet" type="text/css" href="assest/portada/css/all.css">
<link rel="stylesheet" type="text/css" href="assest/portada/css/all.min.css">
<link rel="stylesheet" type="text/css" href="assest/portada/css/lightbox.css">
<link rel="stylesheet" type="text/css" href="assest/portada/css/flexslider.css">
<link rel="stylesheet" type="text/css" href="assest/portada/css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="assest/portada/css/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="assest/portada/css/jquery.rateyo.css" />
<!-- <link rel="stylesheet" type="text/css" href="css/jquery.mmenu.all.css" /> -->
<!-- <link rel="stylesheet" type="text/css" href="css/meanmenu.min.css"> -->
<link rel="stylesheet" type="text/css" href="assest/portada/inner-page-style.css">
<link rel="stylesheet" type="text/css" href="assest/portada/style2.css">
<link rel="stylesheet" type="text/css" href="assest/portada/style.css">

<link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700" rel="stylesheet">

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="assest/dist/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

<!-- Customized Bootstrap Stylesheet -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">

<!--    <link href="css/style.css" rel="stylesheet"> -->
<style>
	html {
		scroll-behavior: smooth;
	}

	img#imag {
		background-color: rgba(0, 0, 0, 0.8);
		filter: brightness(0.5);
	}
</style>

<body>
	<div id="page" class="site" itemscope itemtype="http://schema.org/LocalBusiness">
		<header class="site-header" id="home">
			<div class="top-header">
				<div class="container row align-items-end">
					<div class="top-header-left">
						<div class="top-header-block">
							<a href="mailto:info@educationpro.com" itemprop="email"><i class="fas fa-envelope"></i> piensadiferente@educationpro.com</a>
						</div>
						<div class="top-header-block">
							<a href="tel:+59177547082" itemprop="telephone"><i class="fas fa-phone"></i> (591) 77547082</a>
						</div>
					</div>
					<div class="top-header-right">
						<p class="text-white">Instituto de artes Matemático <span class="font-weight-bold text-white">Piensa Diferente</span></p>
					</div>
					<?php
					if (isset($_SESSION["ingreso"]) && $_SESSION["ingreso"] == "ok") {
					?>
						<div class="top-header-right align-content-center">
							<div class="login-block ">
								<a href="login" class="h4 text-yellow">Bienvenido: <?php echo $_SESSION['nombre_usuario'] ?> </a>
							</div>
						</div>
						<div class="align-content-end align-items-end">
							<li class="nav-item row ">
								<a href="salir" class="nav-link text-yellow">
									<i class="fas fa-power-off nav-icon"></i> Salir
								</a>
							</li>
						</div>
					<?php
					} else {
					?>
						<div class="top-header-right ">
							<div class="login-block">
								<a href="login" class="h4" style="color: yellow;">Iniciar Sesión</a>
							</div>
						</div>
					<?php
					}
					?>

				</div>
			</div>
			<!-- Top header Close -->
			<div class="main-header">
				<div class="container col-2 align-items-center" style="margin-bottom: 0; padding-bottom: 0; padding-top: 0;">
					<div class="logo-wrap" itemprop="logo">
						<img src="<?php echo "assest/dist/img/webAcademico/logo-letras.png" ?>" alt="Logo Image" width="45%">
						<!-- <h1>Education</h1> -->
					</div>
					<div class="nav-wrap col-8">
						<nav class="nav-desktop">
							<ul class="menu-list">
								<li><a href="#home">Inicio</a></li>
								<li> <a href="#cursos"> Inf. Cursos</a></li>
								<li><a href="#noticias">Noticias</a></li>
								<li><a href="#contacto">Contácto</a></li>
								<?php
								if (isset($_SESSION["ingreso"]) && $_SESSION["ingreso"] == "ok") {
								?>
									<li><a href="http://localhost/web_academico/inicio" style="color: #bb972d; "><i class="fa-solid fa-house-user"></i> Mi Sistema</a></li>
								<?php
								}
								?>
							</ul>
						</nav>
						<div id="bar">
							<i class="fas fa-bars"></i>
						</div>
						<div id="close">
							<i class="fas fa-times"></i>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- Header Close -->

		<!-- Carousel Start -->
		<div class="container-fluid">
			<div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#header-carousel" data-slide-to="0" class="active"></li>
					<li data-target="#header-carousel" data-slide-to="1"></li>
					<li data-target="#header-carousel" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active" style="min-height: 300px;">
						<img class="position-relative w-100" src="assest/dist/img/uni1.webp" style="min-height: 300px; object-fit: cover;" id="imag">
						<div class="carousel-caption d-flex align-items-center justify-content-center">
							<div class="p-5" style="width: 100%; max-width: 900px;">
								<h5 class="text-white text-uppercase mb-md-3">Instituto Matemático</h5>
								<h1 class="display-2 text-white mb-md-4">No pares de aprender y Piensa Diferente</h1>
							</div>
						</div>
					</div>
					<div class="carousel-item" style="min-height: 300px;">
						<img class="position-relative w-100" src="assest/dist/img/carousel-2.jpg" style="min-height: 300px; object-fit: cover;" id="imag">
						<div class="carousel-caption d-flex align-items-center justify-content-center">
							<div class="p-5" style="width: 100%; max-width: 900px;">
								<h5 class="text-white text-uppercase mb-md-3">Instituto Matemático</h5>
								<h1 class="display-2 text-white mb-md-4">CURSOS VIRTUALES</h1>
							</div>
						</div>
					</div>
					<div class="carousel-item" style="min-height: 300px;">
						<img class="position-relative w-100" src="assest/dist/img/carousel-3.jpg" style="min-height: 300px; object-fit: cover;" id="imag">
						<div class="carousel-caption d-flex align-items-center justify-content-center">
							<div class="p-5" style="width: 100%; max-width: 900px;" style=" background-color: black;">
								<h5 class="text-white text-uppercase mb-md-3">Instituto Matemático</h5>
								<h1 class="display-2 text-white mb-md-4">CURSOS PREFAS</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Carousel End -->

		<div class="container-fluid pt-5 h1" id="cursos">
			<!-- About End -->
			<!-- CURSOS -->
			<div class="page-heading pb-3">
				<div class="container">
					<h2>CURSOS POPULARES</h2>
				</div>
			</div>
			<!-- Popular courses End -->
			<div class="learn-courses">
				<div class="container">
					<div class="courses post-holder">
						<div class="owl-one owl-carousel info-post">
							<?php
							$cursos = ControladorCurso::ctrInfoCursos();
							foreach ($cursos as $value) {
								/* var_dump($separada); */
							?>
								<div class="row">
									<div class="box-wrap" itemprop="event" itemscope itemtype=" http://schema.org/Course">
										<?php if ($value['img_curso'] == "") {
										?>
											<div class="img-wrap img-holder" itemprop="image" style="width: 300px; height: 210px; margin-left: 4px;"><img src="assest/dist/img/cursoDefault.jpg ?>" alt="courses picture"></div>
										<?php
										} else {
										?>
											<div class="img-wrap img-holder" itemprop="image" style="width: 300px; height: 210px; margin-left: 4px;"><img src="assest/dist/img/cursos/<?php echo $value['img_curso'] ?>" alt="courses picture"></div>
										<?php
										} ?>

										<button class="learn-desining-banner btn rounded-pill text-center" onclick="MVerInfoCurso(<?php echo $value['id_curso'] ?>)">Más Información</button>

										<div class="box-body" itemprop="description" style="width: 300px; height: 160px; margin-left: 4px;">
											<p style="padding-bottom: 1px; margin-bottom: 0px; margin-top: 0;"><?php echo $value["titulo_curso"] ?></p>
											<section itemprop="time" style="margin-top: 5px;">
												<p><span>Descripción:</span> <?php echo $value["descripcion_curso"] ?></p>
											</section>
										</div>
									</div>
								</div>
							<?php
							}
							?>
						</div>
					</div>
				</div>
			</div>

			<!-- NOTICIAS -->
			<section class="page-heading mt-4 pt-4 pb-3" id="noticias">
				<div class="container">
					<h2>NOTICIAS</h2>
				</div>
			</section>
			<section class="latest-news" id="noticias">
				<div class="container" itemprop="event" itemscope itemtype=" http://schema.org/Event">
					<div class="owl-two owl-carousel">
						<?php
						$noticias = ControladorNoticia::ctrInfoNoticias();
						foreach ($noticias as $value) {
							$titulo = $value['titulo_noticia'];
						?>

							<div class="news-wrap" itemprop="event">
								<div class="news-img-wrap" itemprop="image">
									<?php
									if ($value['img_noticia'] == "") {
									?>
										<img src="assest/dist/img/noticias/noticiaDefault.jpg" alt="Latest News Images">
									<?php
									} else {
									?>
										<img src="assest/dist/img/noticias/<?php echo $value['img_noticia'] ?>" alt="Latest News Images">
									<?php
									}
									?>
								</div>
								<div class="news-detail" itemprop="description">
									<a href="">
										<h1><?php echo $titulo ?></h1>
									</a>
									<h2 itemprop="startDate"><?php echo $value['fecha_noticia'] ?></h2>

									<p class="mt-0 pt-0"><?php echo $value['descripcion_noticia'] ?></p>
								</div>
							</div>

						<?php
						}
						?>
					</div>
				</div>
			</section>
			<!-- fin Noticias -->

			<!-- Learn courses End -->
			<section class="whyUs-section">
				<div class="container">
					<div class="featured-points" style="font-size: 10px;">
						<img src="<?php echo "assest/dist/img/webAcademico/logo-letras.png" ?>" alt="Logo Image" width="60%">
						<ul>
							<li><i class="fas fa-book"></i> Especialidades</li>
							<li><i class="fas fa-book-open"></i>Nivel Pre-Universitario</li>
							<li><i class="fas fa-chalkboard-teacher"></i>Facultad de Ingeniería(Mat, Fis y Qmc)</li>
							<li><i class="fas fa-user-md"></i></i>Facultad de Medicina(Mat, Fis, Qmc, Leng, Bio)</li>
							<li> <i class="fas fa-book"></i>Facultad de Cs. Económicas (Mat y Lenguaje)</li>
						</ul>
					</div>
					<div class="whyus-wrap">
						<h1 style="color: yellow;">Para Primaria (Apoyo Escolar)</h1>
						<p itemprop="description">De 4to a 6to de Primaraia (Mat y Leng)</p>
						<p itemprop="description">De 1ro a 3ro de Primaraia (Mat y Leng)</p>

						<hr>
						<h1 style="color: yellow;">Para Secundaria</h1>
						<p itemprop="description">De 4to a 6to de Secundaria (Mat, Fis y Qmc)</p>
						<p itemprop="description">De 1ro a 3ro de Secundaria (Mat, Fis y Qmc)</p>
					</div>
				</div>
			</section>

			<!-- Latest News CLosed -->
			<section class="query-section text-center">
				<div class="container">
					<p>¿Tienes alguna consulta?<a href="tel:+59177547082"><i class="fas fa-phone"></i> +591 77547082</a></p>
				</div>
			</section>
			<!-- End of Query Section -->
			<footer class="page-footer" itemprop="footer" itemscope itemtype="http://schema.org/WPFooter" id="contacto" style="font-size: 12px;">
				<div class="footer-first-section">
					<div class="container">
						<div class="box-wrap" itemprop="about">
							<header>
								<h1>Encuéntranos en:</h1>
							</header>
							<div class="recent-course-wrap">
								<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1378.8439736231924!2d-68.19687648168131!3d-16.496414191535596!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sbo!4v1681182517903!5m2!1ses!2sbo" width="500" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
							</div>
						</div>

						<div class="box-wrap" itemprop="about">
							<header>
								<h1>Dirección</h1>
							</header>
							<p>Zona Villa Tunari, C/José Manuel Cortez Nro 1044</p>

							<h4><a href="tel:+9779813639131"><i class="fas fa-phone"></i> +591 77547082</a></h4>
							<h4><a href="mailto:info@educationpro.com"><i class="fas fa-envelope"></i> piensadiferente@educationpro.com</a></h4>
							<h4><a href=""><i class="fas fa-map-marker-alt"></i>Sede Complejo, Rio Seco</a></h4>
						</div>

						<div class="box-wrap" itemprop="about">
							<header>
								<h1>Contácto</h1>
							</header>
							<section class="quick-contact">
								<input type="email" name="email" placeholder="Tú correo electrónico*">
								<textarea placeholder="Escribe tu mensaje*" rows="8"></textarea>
								<button>enviar mensaje</button>
							</section>
						</div>

					</div>
				</div>
				<!-- End of box-Wrap -->
				<div class="footer-second-section">
					<div class="container">
						<hr class="footer-line">
						<ul class="social-list">
							<li><a href="" style="margin-left: 18px;"><i class="fab fa-facebook-square"></i></a></li>
							<li><a href=""></a></li>
							<li><a href=""><i class="fab fa-youtube"></i></a></li>
							<li><a href=""></a></li>
							<li><a href=""><i class="fab fa-instagram"></i></a></li>
						</ul>
						<hr class="footer-line">
					</div>
				</div>
				<div class="footer-last-section">
					<div class="container">
						<strong>
							<p>Copyright &copy; 2023 <a href="https://ekesoft.es"> EkeSoft</a>.<span style="font-size: 11px;">Derechos reservados.</span></p>
						</strong>
					</div>
				</div>
			</footer>
		</div>
		<script type="text/javascript" src="assest/portada/js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="assest/portada/js/lightbox.js"></script>
		<script type="text/javascript" src="assest/portada/js/all.js"></script>
		<script type="text/javascript" src="assest/portada/js/isotope.pkgd.min.js"></script>
		<script type="text/javascript" src="assest/portada/js/owl.carousel.js"></script>
		<script type="text/javascript" src="assest/portada/js/jquery.flexslider.js"></script>
		<script type="text/javascript" src="assest/portada/js/jquery.rateyo.js"></script>
		<!-- <script type="text/javascript" src="js/jquery.mmenu.all.js"></script> -->
		<!-- <script type="text/javascript" src="js/jquery.meanmenu.min.js"></script> -->
		<script type="text/javascript" src="assest/portada/js/custom.js"></script>

		<!-- JavaScript Libraries -->

		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
		<script src="assest/dist/lib/easing/easing.min.js"></script>
		<script src="assest/dist/lib/owlcarousel/owl.carousel.min.js"></script>
		<script src="assest/js/materia.js"></script>
		<script src="assest/js/curso.js"></script>

		<!--====================
		seccion de modals
		=====================-->
		<div class="modal fade" id="modal-lg">
			<div class="modal-dialog modal-lg">
				<div class="modal-content" id="content-lg">
					
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
</body>

</html>