<?php
/**
 * Contains the post embed content template part
 *
 * When a post is embedded in an iframe, this file is used to create the content template part
 * output.
 *
 */
?>
	<div <?php post_class( 'wp-embed' ); ?>>
	

		<div class="entry-thumbnail">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail($size = 'thumbnail'); ?></a>
    </div>

		<p class="wp-embed-heading">
			<a href="<?php the_permalink(); ?>" target="_top">
				<?php the_title(); ?>
			</a>
		</p>

		<?php if ( $thumbnail_id && 'square' === $shape ) : ?>
			<div class="wp-embed-featured-image square">
				<a href="<?php the_permalink(); ?>" target="_top">
					<?php echo wp_get_attachment_image( $thumbnail_id, $image_size ); ?>
				</a>
			</div>
		<?php endif; ?>

		<div class="wp-embed-excerpt"><?php the_excerpt_embed(); ?></div>

		<?php
      $pod = pods( 'son', $post->ID );
      if ($pod->field("type") == "son") {
          
          $sons = $pod->field( 'contenu_audio' );
          if (!empty($sons)) {
            $idson = $sons[ 'ID' ];
            echo '<div class="le-son">';
            echo '<audio controls title="'.$sons[ 'post_title'].'" class="son-'.$sons[ 'ID'].' pour-player">';
            echo '<source src="'.$sons[ 'guid'].'" type="audio/mpeg">';
            echo '<p>Votre navigateur ne supporte pas javascript, et n\'a pas de lecteur audio intégré. Vous consultez une version du site moins conviviale...</p>';
            echo '</audio>';
            echo '<script>
            function waitForElementToDisplay(selector, time) {
        if(document.querySelector(selector)!=null) {
            jQuery("#jquery_jplayer").jPlayer({
                    volume: 1.0,
                    cssSelectorAncestor: "#lecteur-son-'.$sons[ 'ID'].'",
                    cssSelector: {
                      currentTime: ".lcdlg-t-currenttime",
                      play: ".lcdlg-t-play",
                      pause: ".lcdlg-t-pause",
                    },
                    supplied: "mp3",
                    autoBlur: false,
                    keyEnabled: true,
                    play: function() {
                      console.log("play");
                    },
                    ready: function () {
                        jQuery(this).jPlayer("setMedia", {
                          title: "'.$sons[ 'post_title'].'",
                          mp3: "'.$sons[ 'guid'].'",
                          });
                    },
              });
            return;
        }
        else {
            setTimeout(function() {
                waitForElementToDisplay(selector, time);
            }, time);
        }
    }
              jQuery(document).ready(function($){
              window.player = new LCDLGPlayer();
              ajouterLecteurByClass("son-'.$sons[ 'ID'].'", true, true, false, true);
              $(".sans-javascript").css("display", "none"); 
              waitForElementToDisplay("#lecteur-son-'.$sons[ 'ID'].' .lcdlg-t-play");
              
              
              });
              </script>';
            echo '</div>';
            echo '<div id="jquery_jplayer"></div>';
          }
      
      }
		
		?>
		
		
		
		<?php
		/**
		 * Prints additional content after the embed excerpt.
		 *
		 * @since 4.4.0
		 */
		do_action( 'embed_content' );
		?>

		<div class="wp-embed-footer">
			<?php the_embed_site_title() ?>

			<div class="wp-embed-meta">
				<?php
				/**
				 * Prints additional meta content in the embed template.
				 *
				 * @since 4.4.0
				 */
				do_action( 'embed_content_meta');
				?>
			</div>
		</div>
	</div>
<?php
