<header>

<!-- Main Navigation -->
<nav class="main small-only-hide">

	<!-- Login & Sign Up Section -->
	<section class="login-panel background-primary small-padding-top-1">

		<div class="close right">
			<img src="/img/close-white.png" />
		</div>

		<div class="row">

			<h4 class="color-white text-center small-margin-bottom-2 login-switch">Login or <a href="/sample-room/user/register.php" class="register">Sign Up</a></h4>

			<!-- Login -->
			<div class="login-form medium-6 columns small-centered color-white">
				<form method='post' action="/sample-room/user/login.php#login-form">
		        	<input type='text' maxlength="25" pattern=".{5,25}" required title="Your username must be between 5 and 25 characters in length" placeholder="Username / Email" name='username' />
					<input type='password' maxlength="50" pattern=".{8,50}" required title="Your password must be between 8 and 50 characters in length" placeholder="Password" name='password' />
		        	<input class="button secondary" type='submit' value='Login' />
		        	<a class="right" href="/sample-room/user/forgot-password.php">Forgot Password</a>
		        </form>
	        </div>

		</div>

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
	
	<div class="row">

		<!-- Header Logo -->
		<div class="small-4 columns">
			<a href="/">
				<h1>Zolatone</h1>
				<img class="logo" src="/img/zolatone-white.png">
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
						<a href="/finishes">Finishes &#9662;</a>
						<ul>
							<li><a href="/finishes/#/counterpointe">Counterpointe</a></li>
							<li><a href="/finishes/#/lluminations">Lluminations</a></li>
							<li><a href="/finishes/#/metal">Metal</a></li>
							<li><a href="/finishes/#/polomyx">Polomyx</a></li>
							<li><a href="/finishes/#/polomyx-airless">Polomyx Airless</a></li>
							<li><a href="/finishes/#/flex">Flex</a></li>
							<li><a href="/finishes/#/light-vision">Light Vision</a></li>
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
									echo '<li><a href="/sample-room/user/user_settings.php">My Account Settings</a></li>';
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
				<img class="logo" src="/img/zolatone-white.png">
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
			<li><a href="/finishes">Finishes</a></li>
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
					<?
						if(!isUserLoggedIn()) {
							echo '<li><a class="login-button">Log In or Sign Up</a></li>';
						} else {
							echo '<li><a href="/sample-room/user/logout.php">Log Out</a></li>';
							echo '<li><a href="/sample-room/user/user_settings.php">My Account Settings</a></li>';
						}
					?>
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

<!-- Mobile Login & Sign Up Section -->
<section class="mobile login-panel background-primary small-padding-top-1 medium-hide">

	<!-- Close Button -->
	<div class="close right">
		<img src="/img/close-white.png" />
	</div>

	<!-- Login -->
	<h4 class="color-white text-center small-margin-bottom-2 login-switch">Login or <a href="/sample-room/user/register.php" class="register">Sign Up</a></h4>
	<div class="small-12 small-centered columns small-margin-top-0 color-white">
		<form method='post' action="/sample-room/user/login.php#login-form">
	        <input type='text' maxlength="25" pattern=".{5,25}" required title="Your username must be between 5 and 25 characters in length" placeholder="Username / Email" name='username' />
			<input type='password' maxlength="50" pattern=".{8,50}" required title="Your password must be between 8 and 50 characters in length" placeholder="Password" name='password' />
	        <input class="button secondary" type='submit' value='Login' />
	        <a class="right" href="/sample-room/user/forgot-password.php">Forgot Password</a>
        </form>
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

</header>