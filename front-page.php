<?php get_header();  ?>

<!-- Sidebar -->
<aside>
  <nav class="sideNav">
    <div class="progressBar"></div>
    <?php wp_nav_menu( array(
        'container' => false,
        'theme_location' => 'primary'
      )); ?>
  </nav>
</aside>
<!-- /. Sidebar -->

<!-- Main Content -->
<main>
  <header id="home">
  
    <figure class="logo container">
      <h1>Melissa</h1>
      <h1>Perry</h1>
      <p class="tagline">Frontend</p>
      <p class="tagline">Web Developer</p>      
    </figure> <!-- /.container -->

  </header><!--/.header-->



<div class="main">
  <div class="container">

  <section id="about">
    <div class="inner-wrapper">
      
      <h2>About</h2>
      <p><?php the_field('about_description'); ?></p>

      <figure class="headshot">
        <?php $image = get_field('about_image'); ?>
        <img src="<?php echo $image['sizes']['large']?>" alt="<?php echo $image['alt'];?>">
      </figure>
      
    </div>
  </section>


  <section id="work">
    <div class="inner-wrapper">
      
      <h2>Work</h2>

      <ul class="portfolio">
        <?php while(has_sub_field('portfolio_item')): ?>
          <li class="portfolioItem">

            <figure class="mockup">
              <?php $image = get_sub_field('mockup'); ?>
              <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt'];?>">
            </figure>

            <div class="info">
              <h3>
                <?php the_sub_field('type_of_project'); ?>
              </h3>
              
              <p class="skillsUsed">
                <?php while(has_sub_field('skills_used')): ?>
                  <?php the_sub_field('skill_name'); ?> <span>|</span>
                <?php endwhile; ?>
              </p>
              
              <p class="shortDesc">
                <?php the_sub_field('short_description'); ?>
              </p>

              <a href="<?php the_sub_field('link'); ?>">View Live</a>
            </div>

          </li>
        <?php endwhile; ?>
      </ul>
  
    </div>
  </section>

  <section id="skills">
    <div class="inner-wrapper">

      <h2>Skills</h2>

      <h2>Current</h2>

      <?php while(has_sub_field('skill')): ?>

        <?php if (get_sub_field('skill_type') == 'current') {?>
          <div class="singleSkill">
            <i class="<?php the_sub_field('skill_icon') ?>"></i>
            <p><?php the_sub_field('skill_name') ?></p>
          </div>
        <?php } else { ?>
        <?php }; ?>
      <?php endwhile; ?>


      <h2>Coming Soon</h2>

      <?php while(has_sub_field('skill')): ?>

        <?php if (get_sub_field('skill_type') == 'upcoming') {?>
          <div class="singleSkill">
            <i class="<?php the_sub_field('skill_icon') ?>"></i>
            <p><?php the_sub_field('skill_name') ?></p>
          </div>
        <?php } else { ?>
        <?php }; ?>
      <?php endwhile; ?>
     
    </div>
  </section>

  <section id="contact">
    <div class="inner-wrapper">
        
      <h2>Contact</h2>

      <p>
        <?php the_field('contact_description'); ?>
      </p>

      <div>
        <?php the_field('contact_form'); ?>
      </div>
      
    </div>
  </section>

</div> <!-- /.main -->

<?php get_footer(); ?>