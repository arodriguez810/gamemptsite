<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MPT Games</title>
	<link href="https://fonts.googleapis.com/css?family=Lato:400,400i|PT+Serif:700" rel="stylesheet">
	<link rel="stylesheet" href="dist/css/style.css">
	<script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
</head>
<body class="is-boxed has-animations">
<div class="body-wrap boxed-container">
	<header class="site-header">
		<div class="container">

		</div>
	</header>

	<main>
		<section class="hero text-light text-center">
			<div class="container-sm">
				<div class="hero-inner">
					<h1 class="hero-title h2-mobile mt-0 is-revealing">Seleccione el juego que desea usar.</h1>
					<p class="hero-paragraph is-revealing">Todos los juegos necesitarán de un crédito para usarse, por
						favor adquiera los mismos.</p>
				</div>
			</div>
		</section>


		<section class="features section text-center">
			<div class="container">
				<div class="features-inner section-inner has-top-divider">
					<h2 class="section-title mt-0">Juegos</h2>
					<div class="features-wrap">
						<div class="feature is-revealing">
							<div class="feature-inner" onclick="location.href='lottery-numbers/game'"
								 style="cursor: pointer">
								<div class="feature-icon">
									<img width="192" height="192"
										 src="img/lottery-numbers.PNG"
									</img>
								</div>
								<h4 class="feature-title h3-mobile">Lottery Numbers</h4>
								<p class="text-sm">Juego con lotería instantánea</p>
							</div>
						</div>
						<div class="feature is-revealing">
							<div class="feature-inner">
								<div class="feature-icon">
									<svg width="48" height="48" xmlns="http://www.w3.org/2000/svg">
										<g fill="none" fill-rule="evenodd">
											<path fill="#84E482" d="M48 16v32H16z"/>
											<path fill="#0EB3CE" d="M0 0v32h32z"/>
											<circle fill="#02C6A4" cx="29" cy="9" r="4"/>
										</g>
									</svg>
								</div>
								<h4 class="feature-title h3-mobile">Raspadita</h4>
								<p class="text-sm">Juego donde podrás raspar.</p>
							</div>
						</div>
						<div class="feature is-revealing">
							<div class="feature-inner">
								<div class="feature-icon">
									<svg width="48" height="48" xmlns="http://www.w3.org/2000/svg">
										<g fill="none" fill-rule="evenodd">
											<path fill="#0EB3CE" d="M0 0h32v32H0z"/>
											<path fill="#84E482" d="M16 16h32L16 48z"/>
										</g>
									</svg>
								</div>
								<h4 class="feature-title h3-mobile">The Fruits</h4>
								<p class="text-sm">El juego de las frutas.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="features-extended section">
			<div class="container">
				<div class="features-extended-inner section-inner has-top-divider">
					<div class="features-extended-header text-center">
						<div class="container-sm">
							<h2 class="section-title mt-0">Más detalles</h2>
							<p class="section-paragraph">Lorem ipsum is common placeholder text used to demonstrate the
								graphic elements of a document or visual presentation</p>
						</div>
					</div>
					<div class="feature-extended">
						<div class="feature-extended-image is-revealing">
							<img width="480" height="360" onclick="location.href='lottery-numbers/game'"
								 style="cursor: pointer"
								 src="img/lottery-numbers.PNG">

							</img>
						</div>
						<div class="feature-extended-body">
							<h3 class="mt-0">Lottery Numbers</h3>
							<p>Descripción más amplia sobre el juego</p>
						</div>
					</div>
					<div class="feature-extended">
						<div class="feature-extended-image is-revealing">
							<svg width="480" height="360" viewBox="0 0 480 360" xmlns="http://www.w3.org/2000/svg">
								<defs>
									<filter x="-500%" y="-500%" width="1000%" height="1000%"
											filterUnits="objectBoundingBox" id="dropshadow-2">
										<feOffset dy="16" in="SourceAlpha" result="shadowOffsetOuter"/>
										<feGaussianBlur stdDeviation="24" in="shadowOffsetOuter"
														result="shadowBlurOuter"/>
										<feColorMatrix values="0 0 0 0 0.12 0 0 0 0 0.17 0 0 0 0 0.21 0 0 0 0.2 0"
													   in="shadowBlurOuter"/>
									</filter>
								</defs>
								<path fill="#F6F8FA" d="M480 140v220H280zM0 220V0h200z"/>
								<path fill="#FFF" d="M40 50h400v260H40z"
									  style="mix-blend-mode:multiply;filter:url(#dropshadow-2)"/>
								<path fill="#FFF" d="M40 50h400v260H40z"/>
								<path fill="#FFF"
									  d="M86.225 161l62.226 62.225-62.226 62.225L24 223.225zM296 176h80v160h-80z"
									  style="mix-blend-mode:multiply;filter:url(#dropshadow-2)"/>
								<path fill="#FFF"
									  d="M86.225 161l62.226 62.225-62.226 62.225L24 223.225zM296 176h80v160h-80z"/>
								<path fill="#FFF" d="M245.092 218l9.378 22.092-22.093 9.378L223 227.378z"
									  style="mix-blend-mode:multiply;filter:url(#dropshadow-2)"/>
								<path fill="#02C6A4" d="M245.092 218l9.378 22.092-22.093 9.378L223 227.378z"/>
								<path fill="#FFF" d="M270 96H170v100z"
									  style="mix-blend-mode:multiply;filter:url(#dropshadow-2)"/>
								<path fill="#84E482" d="M270 96H170v100z"/>
								<circle fill="#FFF" cx="296" cy="177" r="32"
										style="mix-blend-mode:multiply;filter:url(#dropshadow-2)"/>
								<circle fill="#0EB3CE" cx="296" cy="177" r="32" style="mix-blend-mode:multiply"/>
							</svg>
						</div>

						<div class="feature-extended-body">
							<h3 class="mt-0">Raspadita</h3>
							<p>Descripción más amplia sobre el juego</p>
						</div>
					</div>
					<div class="feature-extended">
						<div class="feature-extended-image is-revealing">
							<svg width="480" height="360" viewBox="0 0 480 360" xmlns="http://www.w3.org/2000/svg">
								<defs>
									<filter x="-500%" y="-500%" width="1000%" height="1000%"
											filterUnits="objectBoundingBox" id="dropshadow-3">
										<feOffset dy="16" in="SourceAlpha" result="shadowOffsetOuter"/>
										<feGaussianBlur stdDeviation="24" in="shadowOffsetOuter"
														result="shadowBlurOuter"/>
										<feColorMatrix values="0 0 0 0 0.12 0 0 0 0 0.17 0 0 0 0 0.21 0 0 0 0.2 0"
													   in="shadowBlurOuter"/>
									</filter>
								</defs>
								<path fill="#F6F8FA" d="M480 140v220H280zM0 220V0h200z"/>
								<path fill="#FFF" d="M40 50h400v260H40z"
									  style="mix-blend-mode:multiply;filter:url(#dropshadow-3)"/>
								<path fill="#FFF" d="M40 50h400v260H40z"/>
								<path fill="#FFF" d="M72 248h88v88H72zM180 24h80v160h-80z"
									  style="mix-blend-mode:multiply;filter:url(#dropshadow-3)"/>
								<path fill="#FFF" d="M72 248h88v88H72zM180 24h80v160h-80z"/>
								<path fill="#FFF" d="M277.664 261.919l-18.113 15.745-15.746-18.113 18.113-15.745z"
									  style="mix-blend-mode:multiply;filter:url(#dropshadow-3)"/>
								<path fill="#02C6A4" d="M277.664 261.919l-18.113 15.745-15.746-18.113 18.113-15.745z"/>
								<path fill="#FFF" d="M315 129H215v100z"
									  style="mix-blend-mode:multiply;filter:url(#dropshadow-3)"/>
								<path fill="#84E482" d="M315 129H215v100z"/>
								<circle fill="#FFF" cx="318" cy="219" r="32"
										style="mix-blend-mode:multiply;filter:url(#dropshadow-3)"/>
								<circle fill="#0EB3CE" cx="318" cy="219" r="32" style="mix-blend-mode:multiply"/>
							</svg>
						</div>
						<div class="feature-extended-body">
							<h3 class="mt-0">The Fruits</h3>
							<p>Descripción más amplia sobre el juego</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="pricing section">
			<div class="container">
				<div class="pricing-inner section-inner has-top-divider">
					<h2 class="section-title mt-0 text-center">Precios de los créditos</h2>
					<div class="pricing-tables-wrap">
						<div class="pricing-table is-revealing">
							<div class="pricing-table-inner">
								<div class="pricing-table-main">
									<div class="pricing-table-header">
										<div class="pricing-table-title mt-12 mb-16 text-secondary">Lottery Numbers
										</div>
										<div class="pricing-table-price mb-24 pb-32"><span
												class="pricing-table-price-currency h3">$</span><span
												class="pricing-table-price-amount h1">50.00/cu</span></div>
									</div>
									<ul class="pricing-table-features list-reset text-xs mb-56">
										<li>
											<span class="list-icon">
												<svg width="16" height="12" xmlns="http://www.w3.org/2000/svg">
													<path
														d="M14.3.3L5 9.6 1.7 6.3c-.4-.4-1-.4-1.4 0-.4.4-.4 1 0 1.4l4 4c.2.2.4.3.7.3.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4-.4-.4-1-.4-1.4 0z"
														fill="#00C6A7" fill-rule="nonzero"/>
												</svg>
											</span>
											<span>Cada crédito te permite una partida.</span>
										</li>
										<li>
                                                <span class="list-icon">
                                                    <svg width="16" height="12" xmlns="http://www.w3.org/2000/svg">
                                                        <path
															d="M14.3.3L5 9.6 1.7 6.3c-.4-.4-1-.4-1.4 0-.4.4-.4 1 0 1.4l4 4c.2.2.4.3.7.3.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4-.4-.4-1-.4-1.4 0z"
															fill="#00C6A7" fill-rule="nonzero"/>
                                                    </svg>
                                                </span>
											<span>Cada crédito puede darte 2 créditos más.</span>
										</li>
										<li>
                                                <span class="list-icon">
                                                    <svg width="16" height="12" xmlns="http://www.w3.org/2000/svg">
                                                        <path
															d="M14.3.3L5 9.6 1.7 6.3c-.4-.4-1-.4-1.4 0-.4.4-.4 1 0 1.4l4 4c.2.2.4.3.7.3.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4-.4-.4-1-.4-1.4 0z"
															fill="#00C6A7" fill-rule="nonzero"/>
                                                    </svg>
                                                </span>
											<span>Sed do eiusmod tempor cesa.</span>
										</li>
									</ul>
								</div>
								<div class="pricing-table-cta">
									<a class="button button-secondary button-block" href="#">Acceder</a>
								</div>
							</div>
						</div>
						<div class="pricing-table is-revealing">
							<div class="pricing-table-inner">
								<div class="pricing-table-main">
									<div class="pricing-table-header">
										<div class="pricing-table-title mt-12 mb-16 text-primary">Raspadita</div>
										<div class="pricing-table-price mb-24 pb-32"><span
												class="pricing-table-price-currency h3">$</span><span
												class="pricing-table-price-amount h1">150.00/cu</span></div>
									</div>
									<ul class="pricing-table-features list-reset text-xs mb-56">
										<li>
                                                <span class="list-icon">
                                                    <svg width="16" height="12" xmlns="http://www.w3.org/2000/svg">
                                                        <path
															d="M14.3.3L5 9.6 1.7 6.3c-.4-.4-1-.4-1.4 0-.4.4-.4 1 0 1.4l4 4c.2.2.4.3.7.3.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4-.4-.4-1-.4-1.4 0z"
															fill="#00A2B8" fill-rule="nonzero"/>
                                                    </svg>
                                                </span>
											<span>Sed do eiusmod tempor cesa.</span>
										</li>
										<li>
                                                <span class="list-icon">
                                                    <svg width="16" height="12" xmlns="http://www.w3.org/2000/svg">
                                                        <path
															d="M14.3.3L5 9.6 1.7 6.3c-.4-.4-1-.4-1.4 0-.4.4-.4 1 0 1.4l4 4c.2.2.4.3.7.3.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4-.4-.4-1-.4-1.4 0z"
															fill="#00A2B8" fill-rule="nonzero"/>
                                                    </svg>
                                                </span>
											<span>Sed do eiusmod tempor cesa.</span>
										</li>
										<li>
                                                <span class="list-icon">
                                                    <svg width="16" height="12" xmlns="http://www.w3.org/2000/svg">
                                                        <path
															d="M14.3.3L5 9.6 1.7 6.3c-.4-.4-1-.4-1.4 0-.4.4-.4 1 0 1.4l4 4c.2.2.4.3.7.3.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4-.4-.4-1-.4-1.4 0z"
															fill="#00A2B8" fill-rule="nonzero"/>
                                                    </svg>
                                                </span>
											<span>Sed do eiusmod tempor cesa.</span>
										</li>
										<li>
                                                <span class="list-icon">
                                                    <svg width="16" height="12" xmlns="http://www.w3.org/2000/svg">
                                                        <path
															d="M14.3.3L5 9.6 1.7 6.3c-.4-.4-1-.4-1.4 0-.4.4-.4 1 0 1.4l4 4c.2.2.4.3.7.3.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4-.4-.4-1-.4-1.4 0z"
															fill="#00A2B8" fill-rule="nonzero"/>
                                                    </svg>
                                                </span>
											<span>Sed do eiusmod tempor cesa.</span>
										</li>
									</ul>
								</div>
								<div class="pricing-table-cta">
									<a class="button button-primary button-block" href="#">Acceder</a>
								</div>
							</div>
						</div>
						<div class="pricing-table is-revealing">
							<div class="pricing-table-inner">
								<div class="pricing-table-main">
									<div class="pricing-table-header">
										<div class="pricing-table-title mt-12 mb-16 text-secondary">The Fruits
										</div>
										<div class="pricing-table-price mb-24 pb-32"><span
												class="pricing-table-price-currency h3">$</span><span
												class="pricing-table-price-amount h1">10.00/cu</span></div>
									</div>
									<ul class="pricing-table-features list-reset text-xs mb-56">
										<li>
											<span class="list-icon">
												<svg width="16" height="12" xmlns="http://www.w3.org/2000/svg">
													<path
														d="M14.3.3L5 9.6 1.7 6.3c-.4-.4-1-.4-1.4 0-.4.4-.4 1 0 1.4l4 4c.2.2.4.3.7.3.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4-.4-.4-1-.4-1.4 0z"
														fill="#00C6A7" fill-rule="nonzero"/>
												</svg>
											</span>
											<span>Cada crédito te permite una partida.</span>
										</li>
										<li>
                                                <span class="list-icon">
                                                    <svg width="16" height="12" xmlns="http://www.w3.org/2000/svg">
                                                        <path
															d="M14.3.3L5 9.6 1.7 6.3c-.4-.4-1-.4-1.4 0-.4.4-.4 1 0 1.4l4 4c.2.2.4.3.7.3.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4-.4-.4-1-.4-1.4 0z"
															fill="#00C6A7" fill-rule="nonzero"/>
                                                    </svg>
                                                </span>
											<span>Cada crédito puede darte 2 créditos más.</span>
										</li>
										<li>
                                                <span class="list-icon">
                                                    <svg width="16" height="12" xmlns="http://www.w3.org/2000/svg">
                                                        <path
															d="M14.3.3L5 9.6 1.7 6.3c-.4-.4-1-.4-1.4 0-.4.4-.4 1 0 1.4l4 4c.2.2.4.3.7.3.3 0 .5-.1.7-.3l10-10c.4-.4.4-1 0-1.4-.4-.4-1-.4-1.4 0z"
															fill="#00C6A7" fill-rule="nonzero"/>
                                                    </svg>
                                                </span>
											<span>Sed do eiusmod tempor cesa.</span>
										</li>
									</ul>
								</div>
								<div class="pricing-table-cta">
									<a class="button button-secondary button-block" href="#">Acceder</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>

	<footer class="site-footer">
		<div class="container">
			<div class="site-footer-inner">
				<div class="brand footer-brand">
					<a href="#">
						<svg width="32" height="32" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
							<title>Evelyn</title>
							<defs>
								<radialGradient cy="0%" fx="50%" fy="0%" r="100%" id="logo-gradient-footer">
									<stop stop-color="#00A2B8" offset="0%"/>
									<stop stop-color="#00F9D2" offset="100%"/>
								</radialGradient>
							</defs>
							<path
								d="M16 32C7.163 32 0 24.837 0 16S7.163 0 16 0s16 7.163 16 16-7.163 16-16 16zm0-10a6 6 0 1 0 0-12 6 6 0 0 0 0 12z"
								fill="url(#logo-gradient-footer)" fill-rule="evenodd"/>
						</svg>
					</a>
				</div>
				<ul class="footer-links list-reset">
					<li>
						<a href="#">Contact</a>
					</li>
					<li>
						<a href="#">About us</a>
					</li>
					<li>
						<a href="#">FAQ's</a>
					</li>
					<li>
						<a href="#">Support</a>
					</li>
				</ul>
				<ul class="footer-social-links list-reset">
					<li>
						<a href="#">
							<span class="screen-reader-text">Facebook</span>
							<svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
								<path
									d="M6.023 16L6 9H3V6h3V4c0-2.7 1.672-4 4.08-4 1.153 0 2.144.086 2.433.124v2.821h-1.67c-1.31 0-1.563.623-1.563 1.536V6H13l-1 3H9.28v7H6.023z"
									fill="#0EB3CE"/>
							</svg>
						</a>
					</li>
					<li>
						<a href="#">
							<span class="screen-reader-text">Twitter</span>
							<svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
								<path
									d="M16 3c-.6.3-1.2.4-1.9.5.7-.4 1.2-1 1.4-1.8-.6.4-1.3.6-2.1.8-.6-.6-1.5-1-2.4-1-1.7 0-3.2 1.5-3.2 3.3 0 .3 0 .5.1.7-2.7-.1-5.2-1.4-6.8-3.4-.3.5-.4 1-.4 1.7 0 1.1.6 2.1 1.5 2.7-.5 0-1-.2-1.5-.4C.7 7.7 1.8 9 3.3 9.3c-.3.1-.6.1-.9.1-.2 0-.4 0-.6-.1.4 1.3 1.6 2.3 3.1 2.3-1.1.9-2.5 1.4-4.1 1.4H0c1.5.9 3.2 1.5 5 1.5 6 0 9.3-5 9.3-9.3v-.4C15 4.3 15.6 3.7 16 3z"
									fill="#0EB3CE"/>
							</svg>
						</a>
					</li>
					<li>
						<a href="#">
							<span class="screen-reader-text">Google</span>
							<svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
								<path
									d="M7.9 7v2.4H12c-.2 1-1.2 3-4 3-2.4 0-4.3-2-4.3-4.4 0-2.4 2-4.4 4.3-4.4 1.4 0 2.3.6 2.8 1.1l1.9-1.8C11.5 1.7 9.9 1 8 1 4.1 1 1 4.1 1 8s3.1 7 7 7c4 0 6.7-2.8 6.7-6.8 0-.5 0-.8-.1-1.2H7.9z"
									fill="#0EB3CE"/>
							</svg>
						</a>
					</li>
				</ul>
				<div class="footer-copyright">&copy; <?php echo date("Y"); ?> MPT Games, todos los derechos
					reservados.
				</div>
			</div>
		</div>
	</footer>
</div>
<script src="dist/js/main.min.js"></script>
</body>
</html>
