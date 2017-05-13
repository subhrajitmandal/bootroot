<?php
/*
  Template Name: Blog Template
*/

?>
<?php get_header(); ?>

  <div class="container">
    <div class="row text-left">

      <div class="col-md-9">

        <div class="page-header">
          <h1><?php wp_title(''); ?></h1>
        </div>


        <?php

          $args = array(
            'post_type'     => 'post'
          );
          $the_query = new WP_Query( $args );

        ?>

        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

            <li data-target="#carousel-example-generic" data-slide-to="<?php echo $the_query->current_post; ?>" class="<?php if( $the_query->current_post == 0 ):?>active<?php endif; ?>"></li>

            <?php endwhile; endif; ?>
          </ol>

          <?php rewind_posts(); ?>

          <!-- Wrapper for slides -->
          <div class="carousel-inner">

            <?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

            <div class="item <?php if( $the_query->current_post == 0 ):?>active<?php endif; ?>">

              <?php
                $thumbnail_id = get_post_thumbnail_id();
                $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true );
                $thumbnail_meta = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true);
              ?>
              <a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php echo $thumbnail_meta; ?>"></a>
              <div class="carousel-caption"><?php the_title(); ?></div>
            </div>

            <?php endwhile; endif; ?>

          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
        </div>


	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php // Display blog posts on any page @ http://m0n.co/l
		$temp = $wp_query; $wp_query= null;
		$wp_query = new WP_Query(); $wp_query->query('showposts=5' . '&paged='.$paged);
		while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

		<h2><a href="<?php the_permalink(); ?>" title="Read more"><?php the_title(); ?></a></h2>
		<p><em>
              By <?php the_author(); ?>
              on <?php echo the_time('l, F jS, Y');?>
              in <?php the_category( ', ' ); ?>.
              <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a>
            </em></p>
		<?php the_excerpt(); ?>
		<hr>
		<?php endwhile; ?>

		<?php if ($paged > 1) { ?>

		<nav id="nav-posts">
			<div class="prev"><?php next_posts_link('&laquo; Previous Posts'); ?></div>
			<div class="next"><?php previous_posts_link('Newer Posts &raquo;'); ?></div>
		</nav>

		<?php } else { ?>

		<nav id="nav-posts">
			<div class="prev"><?php next_posts_link('&laquo; Previous Posts'); ?></div>
		</nav>

		<?php } ?>

		<?php wp_reset_postdata(); ?>

	</article>

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>



        <?php endwhile; else: ?>

          <div class="page-header">
            <h1>Oh no!</h1>
          </div>

          <p>No content is appearing for this page!</p>

        <?php endif; ?>


      </div>

      <?php get_sidebar( 'blog' ); ?>

    </div>
</div>

<?php get_footer(); ?>
