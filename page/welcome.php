<?php 
  include '../inc/initiate.php';
  include '../inc/header.php';
?>
    <aside class="sidebar">
      <div class="widget-area profile">
        <h3><?php echo get_name(); ?></h3>
        <?php 
          $sql = sql("SELECT picture FROM members WHERE id='".get_id()."' LIMIT 1");
          if (file_exists("dev/users/100/".$sql['picture'])) {
            echo '<img src="dev/users/100/'.$sql['picture'].'" alt="Photo of '.get_name().' at Reesume" width="100" height="100" />';
          } 
          else {
            echo '<img src="dev/users/noprofile.jpg" alt="'.get_name().' has no photo ar Reesume" width="100" height="100" />';
          }
        ?>

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
    </aside> <!-- /.sidebar -->
  </div>
  <div class="content">
    <article>
      <h1>Welcome to Reesu.me!</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut, voluptas, adipisci, laborum, rerum eius velit iure excepturi quas esse magnam sit inventore molestias odio sapiente accusantium possimus reprehenderit recusandae labore!</p>
      <img src="http://placeimg.com/600/300/people" alt="">
      <p>Perferendis, possimus quam modi consequuntur aut excepturi tempora hic suscipit. Odio, eligendi dicta consequatur amet animi nulla et! Magnam, natus eveniet quas porro eum voluptatum maiores architecto incidunt facilis odio.</p>
      <blockquote>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam, tempore.</blockquote>
      <p>Cum, iure in suscipit ducimus autem corporis perferendis. Et, molestiae, nam, quaerat nesciunt possimus magnam sapiente eum nemo repudiandae ratione dolorem ullam repellat eos libero eaque quisquam consectetur obcaecati illo!</p>
    </article>
  </div>