<?php
# Guest first-page
if (!auth()) { 
?>
<div id="pagewrap">
   <div id="content" class="main-content">
		<hgroup>
			<h1>Reesume</h1>
			<h3>Create your own beautiful resume<br />within minutes, for free!</h3>
		</hgroup>
	</div><!-- ./ div.main-content -->

	<aside id="sidebar" class="main-sign-up">

	<h3>Recover account</h3>

			<form action="" method="post" class="form">
				<input type="text" name="username" value="" placeholder="Username or Email" required />
				<input type="submit" name="recover" value="Recover" />
			</form>
		<h3>Sign in</h3>

		<form action="" method="post" class="form">
			<input type="text" name="username" value="" placeholder="Username" required />
			<input type="password" name="password" value="" placeholder="Password" required />
			
			<input type="checkbox" value="1" name="remember_me" /> <label for="remember_me">Remember me</label>
			<input type="submit" name="signin" value="SIGN IN" />

			<ul>
				<li><a href="#">Recover Password?</a></li>
				<li><a href="#">Sign up</a></li>
			</ul>
		</form>
	</aside><!-- ./ aside#main-sign-up -->
</div><!-- ./ section#main -->

<!--
		<h3>Sign up <span>at</span> Reesume</h3>

		<form action="" method="post" class="form">
			<input type="text" name="username" value="" placeholder="Username" required />
			<input type="email" name="email" value="" placeholder="Email" required />
			<input type="password" name="password" value="" placeholder="Password" required />
				
			<input type="submit" name="signup" value="SIGN UP FOR FREE" />
		</form>

			<h3>Recover account</h3>

			<form action="" method="post" class="form">
				<input type="text" name="username" value="" placeholder="Username or Email" required />
				<input type="submit" name="recover" value="Recover" />
			</form>
-->
<?php } ?>

<?php
# Signed in first-page
if (auth()) {
?>

	<div id="pagewrap">
    <div id="content">

      <article>
        <h1>My resumes</h1>
        <div class="latest-news">
          
        </div>
      </article>
			
			<?php if (admin()) { ?>
      <article>
        <h1>Weekly stats</h1>
        <div class="latest-news">
          Stay
        </div>
      </article>
    	<?php } ?>

      <article class="selected-job">
      	<h2>Selected job</h2>
        <section class="google-maps">
          <iframe width="200" height="280" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Bob's+Youth+Hostel,+Burgwallen+Nieuwe+Zijde,+Amsterdam,+The+Netherlands&amp;aq=0&amp;oq=bobs+&amp;sll=52.370216,4.895168&amp;sspn=0.197041,0.490265&amp;g=Amsterdam,+The+Netherlands&amp;ie=UTF8&amp;hq=Bob's+Youth+Hostel,&amp;hnear=Burgwallen+Nieuwe+Zijde,+Centrum,+Amsterdam,+Government+of+Amsterdam,+North+Holland,+The+Netherlands&amp;t=m&amp;cid=5612531135574622436&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
   			</section>
   			<div class="selected-job-link">
   				<a href="#">Front-end web developer for agency in Amsterdam</a>
   				<p>Posted by: <a href="#">Undutchables</a></p>
   			</div>
   		</section>
      </article>
	
    </div><!-- /#content -->

    <aside id="sidebar">
      <div class="widget-area profile">
        <img src="<?php echo BASEURL; ?>dev/img/users/medium/profile-1.png" alt="liljalinus @ Reesume" />
        <h3><?php echo get_name(); ?></h3>

        <a href="<?php echo BASEURL; ?>settings/" class="get-started">Get started</a>
      </div><!-- /Profile -->

      <div class="widget-area jobs">
        <h2>Latest jobs <a href="#"><img src="<?php echo BASEURL; ?>dev/img/icons/gear.png" alt="" /></a></h2>
				
				<div class="job-list-view">
					<a href="#">Top designer for Spotify in Stockholm</a>
					<p>Posted by: <a href="#">Spotify AB</a></p>
				</div>

				<div class="job-list-view">
					<a href="#">Bredbandsbolaget behöver dig i Karlskoga!</a>
					<p>Posted by: <a href="#">Uniflex</a></p>
				</div>

				<div class="job-list-view">
					<a href="#">Tele2 söker folk till support i Karlskoga</a>
					<p>Posted by: <a href="#">Uniflex</a></p>
				</div>

				<a href="#" class="load-jobs">Load jobs</a>
      </div><!-- /Latest jobs -->
    </aside>
  </div>

<?php } ?>

<!--
# Resume view

<section id="paper">
	<header class="edit">
		<hgroup>
			<h1>Resume</h1>
		</hgroup>
	</header>

	<section id="resume">
		<article class="content">
		<?php if (!auth()) { ?>
			<h3>Sign up</h3>
			<form action="" method="post" class="form">
				<input type="text" name="username" value="" placeholder="Username" required />
				<input type="email" name="email" value="" placeholder="Email" required />
				<input type="password" name="password" value="" placeholder="Password" required />
				
				<input type="submit" name="signup" value="Sign up" />
			</form>

			<h3>Sign in</h3>
			<form action="" method="post" class="form">
				<input type="text" name="username" value="" placeholder="Username or Email" required />
				<input type="password" name="password" value="" placeholder="Password" required />
			
				<input type="submit" name="signin" value="Sign in" /> 
				<input type="checkbox" value="1" name="remember_me" /> <small>Remember</small>
			</form>
			
			<h3>Recover account</h3>
			<form action="" method="post" class="form">
				<input type="text" name="username" value="" placeholder="Username or Email" required />
				<input type="submit" name="recover" value="Recover" />
			</form>
		<?php } ?>
		</article>

		<article class="content edit">
			<h3>Me</h3>

			Enjoys working with productive and goal-oriented individuals. Reliable, social aware, creative and always strive for perfection. 
			Always do everything wholeheartedly and uncompromising.
		</article>

		<article class="content edit">
			<h3>Goal</h3>

			Being able to use my interest in computers and the web. Be in a team to develop my main interest along with other driven people.
			Keeping a long-term relationship with a workplace, a place to grow &mdash; a place to stay.
		</article>

		<article class="content edit">
			<h3>Experience</h3>

			<h4>Bredbandsbolaget</h4>
			<p>During last summer I'd been offered the unique opportunity to keep Swedens most satisfied customers pleased. Incredibly rewarding, but also demanding. Perfect in other words.</p>
	
			<h4>Webdesign</h4>
			<p>My passion for the web is huge, so I'm freelancing at weekends to keep up with my biggest interest.</p>
		</article>

		<article class="content edit">
			<h3>Education</h3>
			
			<h4>Webdesign, Karlskoga Folkh&ouml;gskola, <span>2011 &mdash; 2013</span></h4>
			<p>With the goal to develop my previous knowledge of the web and receive a grade on my incredible knowledge.</p>

			<h4>Automotive Program, Tyres&ouml; Gymnasium, <span>2008 &mdash; 2011</span></h4>
			<p>Education with a focus on servicing motorized vehicles.</p>
			
			<h4>Elimentary School, Qvarnholmens Skola, <span>2004 &mdash; 2008</span></h4>
			<p>Basic education in one of Stockholm's most attractive free schools located at Djurg&aring;rdsfj&auml;rden, saltsj&ouml;n.</p>
		</article>

		<article class="content edit">
			<h3>Language</h3>
			<p>
				Swedish, native language.<br />
				English, handle the language very well, both spoken and in text.
			</p>
		</article>

		<article class="content edit">
			<h3>Reference</h3>
			<p>References are available at interest.</p>
		</article>
	</section>
</section>
<div style="clear: both; font-size: 1px;">&nbsp;</div>
-->