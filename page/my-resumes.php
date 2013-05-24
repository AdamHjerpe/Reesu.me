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
			
			<?php echo ''.BASEURL.'liljalinus/'.get_randomhash().''; ?>
			<br /><br />
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