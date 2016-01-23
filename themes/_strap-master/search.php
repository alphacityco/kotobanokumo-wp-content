<?php
/**
 * The template for displaying search results pages.
 *
 * @package _s
 */
global $wpdb;
get_header(); ?>

	<div class="container glosarios-internos">
	  <div id="primary" class="content-area">
		  <main id="main" class="site-main" role="main">
      
      <?php    	
    
      $querystring = "SELECT
			                kumo_name_directory_name.name as name,
			                kumo_name_directory_name.description,
			                  (SELECT
	                       kumo_name_directory.name as categoria
	                       FROM kumo_name_directory
	                       WHERE kumo_name_directory.ID = kumo_name_directory_name.directory
	                      ) as category
			                FROM kumo_name_directory_name
			                WHERE kumo_name_directory_name.description like '%" .  get_search_query() . "%'";
			                 
			
			$resultados = $wpdb->get_results( $querystring );     	
		
		?>
		
		<?php if ( $resultados ) : ?>
      
			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Resultados de su b&uacute;squeda: %s', '_s' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			
			<?php
			
			
			
			
			$contador = 1;
			$contador_total = 0;
			$glosario_actual;
			
			?>
			
			
			
			<?php foreach ($resultados as $entrada) { ?>
          <?php
				  /**
				   * Run the loop for the search to output the results.
				   * If you want to overload this in a child theme then include a file
				   * called content-search.php and that will be used instead.
				   */
				  ?>
				  
				  
				  <?php
				  
				  $contador_total = $contador_total + 1;
				  
				  if ($glosario_actual != $entrada->category) {
				    /* Es la 1ra entrada de esta nueva categoría */  
				    
				    if ($contador == 2) {
				    	echo "</div><hr />";
				    }
				    
				    echo "<h3 class='name_directory_title'>Glosario: </h3><h1 class='entry-title'>". $entrada->category ."</h3><br>";
				    $glosario_actual = $entrada->category;
				    $contador = 1;
				  	
				  }
				  
				  if ($contador == 1) {
				  	/* Es la primera columna de 2 */
				    ?>
				    <div class="row">
              <div class="col-md-5">
				        <?php  
				        /* echo "contador:" . $contador . " y total:" . $contador_total . "<br>"; */
				        $contador = $contador + 1;
				        echo "<strong>". $entrada->name . "</strong><br>";
				        echo $entrada->description . "<br>";
				        ?>
				      </div>
				      
				      <?php  
				  } else {
				  	/* Es la 2da columna de 2, cierro la fila */
				    ?>
				    <div class="col-md-5">
				      <?php  
				        /* echo "contador:" . $contador . " y total:" . $contador_total . "<br>"; */
				        $contador = $contador + 1;
				        echo "<strong>". $entrada->name . "</strong><br>";
				        echo $entrada->description . "<br>";
				        ?>
				      </div>
				    </div><hr />  	
				  	<?php
				  	$contador = 1;
				  }  
				  ?>

			<?php } ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>
      
			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		
		</main><!-- #main -->
  </div>  	
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
