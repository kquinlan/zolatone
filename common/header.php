<? require_once($_SERVER['DOCUMENT_ROOT'] . "/sample-room/user/models/config.php") ?>

<!-- header.php -->
<header>

<!-- Main Navigation -->
<nav class="main small-only-hide">

	<!-- Login & Sign Up Panel -->
	<section class="login-panel background-primary small-padding-top-1">
		<form method='post' action="user/login.php">
                <p>
                <label>Username:</label>
                <input type='text' name='username' />
                </p>
                <p>
                <label>Password:</label>
                <input type='password' name='password' />
                </p>
                <p>
                <input class="button" type='submit' value='Login' />
                </p>
                </form>
                <? echo resultBlock($errors,$successes); ?>

                <form name='newUser' action='".$_SERVER['PHP_SELF']."' method='post'>
				<p>
				<label>User Name:</label>
				<input type='text' name='username' />
				</p>
				<p>
				<label>Display Name:</label>
				<input type='text' name='displayname' />
				</p>
				<p>
				<label>Password:</label>
				<input type='password' name='password' />
				</p>
				<p>
				<label>Confirm:</label>
				<input type='password' name='passwordc' />
				</p>
				<p>
				<label>Email:</label>
				<input type='text' name='email' />
				</p>
				<p>
				<label>Security Code:</label>
				<img src='models/captcha.php'>
				</p>
				<label>Enter Security Code:</label>
				<input name='captcha' type='text'>
				</p>
				<label>&nbsp;<br>
				<input class="button" type='submit' value='Register' />
				</p>
				</form>

	</section>

	<!-- Subscription Section -->
	<section class="subscribe-panel background-primary small-padding-top-1">

		<div class="close right small-margin-right-1">
			<img src="/img/close-white.png" />
		</div>

		<div class="row">
			<!-- Don't want to miss out? -->	
			<div class="medium-5 columns color-white">
				<h3 class="color-white">Don't want to miss out?</h3>
				<hr />
				<p>We’ll never crowd your inbox, only sending you the coolest news <i>once</i> a month!</p>
			</div>

			<!-- Sign Up -->
			<div class="medium-6 columns color-white">
				<h3 class="color-white">Sign Up</h3>
				<form>

					<div class="row">
						<div class="medium-6 columns left">
							<input type="text" placeholder="Name" required />
						</div>
					</div>

					<div class="row">
						<div class="medium-6 columns">
							<input type="email" placeholder="Email Address" required />
						</div>
						<div class="medium-4 columns left small-padding-0">
							<input type="submit" value="Subscribe" class="button secondary" required />
						</div>
					</div>

				</form>
			</div>
		</div>
	</section>

	<!-- Mobile Subscription Section -->
	<section class="mobile subscribe-panel background-primary small-padding-top-1 medium-hide">

		<!-- Close Button -->
		<div class="close right small-margin-right-1">
			<img src="/img/close-white.png" />
		</div>

		<div class="row">
			<!-- Don't want to miss out? -->	
			<div class="small-12 columns color-white">
				<h3 class="color-white small-margin-0">Don't want to miss out?</h3>
				<hr class="small-only-hide" />
				<p>We’ll never crowd your inbox, only sending you the coolest news <i>once</i> a month!</p>
			</div>

			<!-- Sign Up -->
			<div class="small-12 columns color-white">
				<h3 class="color-white">Sign Up</h3>
				<form>

					<div class="row">
						<div class="small-12 columns left">
							<input type="text" placeholder="Name" required />
						</div>
					</div>

					<div class="row">
						<div class="small-12 columns">
							<input type="email" placeholder="Email Address" required />
						</div>
						<div class="small-11 columns left">
							<input type="submit" value="Subscribe" class="button secondary" required />
						</div>
					</div>

				</form>
			</div>
		</div>
	</section>
	
	<div class="row">

		<!-- Header Logo -->
		<div class="small-4 columns">
			<a href="/">
				<h1>Zolatone</h1>
				<img src="/img/zolatone-white.png">
			</a>
		</div>
		
		<div class="small-8 columns color-white small-padding-top-1">
			<!-- Business Nav -->
			<section class="text-right ">
				<ul>
					<li><a class="subscribe-button">Subscribe</a></li>
					<li><a href="/where-to-buy">Where to Buy</a></li>
					<li><a href="/faq">FAQ</a></li>
					<li><a href="/contact-us">Contact</a></li>
				</ul>
			</section>

			<!-- Site Nav -->
			<section class="text-right">
				<ul>
					<li><a href="/">Home</a></li>
					<li><a href="/about">About</a></li>
					<li>
						<a href="">Finishes &#9662;</a>
						<ul>
							<li><a href="">Counterpointe</a></li>
							<li><a href="">Lluminations</a></li>
							<li><a href="">Metal</a></li>
							<li><a href="">Polomyx</a></li>
							<li><a href="">Polomyx Airless</a></li>
							<li><a href="">Flex</a></li>
							<li><a href="">Light Vision</a></li>
							<li><a href="">Order a Brochure</a></li>
						</ul>
					</li>
					<li><a href="/ideas">Ideas</a></li>
					<li>
						<a href="/technical-documents">Tech Info &#9662;</a>
						<ul>
							<li><a href="/technical-documents">Technical Documents</a></li>
							<li><a href="/videos">Videos</a></li>
							<li><a href="/leed">LEED</a></li>
						</ul>
					</li>
					<li>
						<a href="/sample-room">Sample Room &#9662;</a>
						<ul>
							<?
								if(!isUserLoggedIn()) {
									echo '<li><a class="login-button">Log In or Sign Up</a></li>';
								} else {
									echo '<li><a href="/sample-room/user/logout.php">Log Out</a></li>';
								}
							?>
							<li><a href="/sample-room">My Saved Samples</a></li>
						</ul>
					</li>
				</ul>
			</section>
		</div>

	</div>
</nav>

<!-- Mobile Navigation -->
	<section class="menu-mobile medium-hide row small-padding-0">
		<div class="small-8 columns small-padding-0">
			<a href="/">
				<h1>Zolatone</h1>
				<img src="/img/zolatone-white.png">
			</a>
			</div>

			<!-- Off Canvas Button -->
		<div class="small-4 columns">
			<section class="right">
				<p class="small-margin-0">
					<a class="off-canvas-toggle color-white" ></a>
				</p>
			</section>
		</div>
	</section>

<nav class="mobile medium-hide">

	<!-- Off Canvas Menu -->
	<aside>

		<ul class="off-canvas-list">
			<li><a href="/">Home</a></li>
			<li><a href="/about">About</a></li>
			<li><a href="#">Finishes</a></li>
			<li><a href="/ideas">Ideas</a></li>
			<li><a href="/technical-documents">Tech Info</a>
				<ul>
					<li><a href="/technical-documents">Tech Docs</a></li>
					<li><a href="/videos">Videos</a></li>
					<li><a href="/leed">LEED</a></li>
				</ul>
			</li>	
			<li><a href="/sample-room">Sample Room</a>
				<ul>
					<li><a href="">Login / Sign Up</a></li>
					<li><a href="/sample-room">My Saved Samples</a></li>
				</ul>
			</li>
			<li><a class="subscribe-button">Subscribe</a></li>
			<li><a href="/where-to-buy">Where To Buy</a></li>
			<li><a href="/faq">FAQ</a></li>
			<li><a href="/contact-us">Contact</a></li>
		</ul>

	</aside>

</nav>

<div class="exit"></div>

</header>