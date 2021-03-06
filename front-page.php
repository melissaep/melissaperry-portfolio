<?php get_header();  ?>

<!-- Sidebar -->
<!-- /. Sidebar -->

<!-- Main Content -->
<div class="hamburgerWrapper">
  <input class="menuCheck" type="checkbox">
  <div class="hamburger">
    <div></div>
  </div>
</div>

<main>
  <header id="home">
    <div class="wrapper">
      <object type="image/svg+xml" data="wp-content/themes/portfolio/images/logo.svg"></object>
      <!-- <h1>Melissa Perry</h1> -->
      <a href="#about" class="arrowDown arrow bounce">
        <i class="fa fa-angle-double-down"></i>
      </a>
    </div>
  </header><!--/.header-->



<div class="main">
  <div class="container">
 
  <aside>
    <div class="innerNav">
      <object class="navLogo hidden" type="image/svg+xml" data="wp-content/themes/portfolio/images/smallLogo.svg"></object>
      <nav class="sideNav">
        <div class="progressBar"></div>
        <?php wp_nav_menu( array(
            'container' => false,
            'theme_location' => 'primary'
          )); ?>
      </nav>
      <a class="arrowUp arrow hidden" href="#home"><i class="fa fa-angle-double-up"></i></a>
    </div>
  </aside>

  <section id="about">
    <div class="wrapper">

      <h2>About</h2>
      <div class="innerWrapper clearfix">
        <p><?php the_field('about_description'); ?></p>
        
        <figure class="headshot grid">
          <?php $image = get_field('about_image'); ?>
          <img src="<?php echo $image['sizes']['large']?>" alt="<?php echo $image['alt'];?>">
        </figure>
      </div>
      
    </div>
  </section>


  <section id="work">
    <div class="wrapper">
      
      <h2>Work</h2>

      <div class="innerWrapper">
        <ul class="portfolio">
          <?php while(has_sub_field('portfolio_item')): ?>
            <li class="portfolioItem">
        
              <figure class="mockup">
                <?php $image = get_sub_field('mockup'); ?>
                <a href="<?php the_sub_field('link'); ?>" target="_blank"><img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt'];?>"></a>
              </figure>
        
              <div class="info">
                <h3>
                  <?php the_sub_field('type_of_project'); ?>
                </h3>
                
                <div class="infoDrawer clearfix">
                  <p class="skillsUsed">
                    <?php while(has_sub_field('skills_used')): ?>
                      <?php the_sub_field('skill_name'); ?> <span>|</span>
                    <?php endwhile; ?>
                  </p>
                  
                  <p class="shortDesc">
                    <?php the_sub_field('short_description'); ?>
                  </p>
                          
                  <a class="live" href="<?php the_sub_field('link'); ?>" target="_blank">View Live</a>
                </div>
              </div>
        
            </li>
          <?php endwhile; ?>
        </ul>
      </div>
  
    </div>
  </section>

  <section id="skills">
    <div class="wrapper">

      <h2>Skills</h2>

      <div class="innerWrapper">
        <h2 class="skillLabel">I know...</h2>

        <ul class="skillsList skillsList1">
          <?php while(has_sub_field('skill')): ?>
            <?php if (get_sub_field('skill_type') === 'current') {?>
              <li class="singleSkill">
                <i class="<?php the_sub_field('skill_icon') ?>"></i>
                <p><?php the_sub_field('skill_name') ?></p>
              </li>
            <?php }; ?>
          <?php endwhile; ?>
          <?php while(has_sub_field('skill')): ?>
            <?php if (get_sub_field('skill_type') === 'currentSVG') {?>
              <li class="singleSkill">
                <div class="skillIcon">
                  <object class="skillIcon" type="image/svg+xml" data="<?php the_sub_field('skill_icon') ?>"></object>
                </div>
                <p><?php the_sub_field('skill_name') ?></p>
              </li>
            <?php }; ?>
          <?php endwhile; ?> 
        </ul>
        
        <h2 class="skillLabel">I want to learn...</h2>
        
        <ul class="skillsList">
          <?php while(has_sub_field('skill')): ?>
            <?php if (get_sub_field('skill_type') === 'upcoming') {?>
              <li class="singleSkill">
                <i class="<?php the_sub_field('skill_icon') ?>"></i>
                <p><?php the_sub_field('skill_name') ?></p>
              </li>
            <?php }; ?>
          <?php endwhile; ?>
        </ul>
      </div>
     
    </div>
  </section>

  <section id="contact">
    <div class="wrapper">

        <h2>Contact</h2>

        <div class="innerWrapper">
          <div class="innerInnerWrapper clearfix">
            <div class="contactInfo">
              <p>
                <?php the_field('contact_description'); ?>
              </p>
              
              <p class="email">Send me a message at <a href="mailto:<?php the_field('contact_email'); ?>"><?php the_field('contact_email'); ?></a> or through the form below.</p>
              
              <?php the_field('contact_form'); ?>
            </div>

            <ul class="social">
              <li>
                <a href="http://twitter.com/melissaep/" target="_blank"><i class="fa fa-twitter"></i></a>
              </li>
              <li>
                <a href="http://instagram.com/melissaep/" target="_blank"><i class="fa fa-instagram"></i></a>
              </li>
              <li>
                <a href="https://ca.linkedin.com/in/melissaep"><i class="fa fa-linkedin" target="_blank"></i></a>
              </li>
              <li>
                <a href="http://github.com/melissaep/" target="_blank"><i class="fa fa-github"></i></a>
              </li>
            </ul>
          </div>
        </div>
      
    </div>
  </section>

</div> <!-- /.main -->

<?php get_footer(); ?>