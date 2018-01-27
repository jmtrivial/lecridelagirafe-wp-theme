<?php
/**
 * RSS 0.92 Feed Template for displaying RSS 0.92 Posts feed.
 *
 * @package WordPress
 */

header('Content-Type: ' . feed_content_type('rss') . '; charset=' . get_option('blog_charset'), true);


/* cas taxonomy */
$taxonomy = get_query_var( 'taxonomy' );
$term = get_query_var( 'term' );
if ($taxonomy && $term) {
	$term_name = get_term_by( 'slug', $term, $taxonomy ); 
	
	if ($taxonomy == "duree")
		$page_name = "durée de ";
	else if ($taxonomy == "type_de_contenu")
		$page_name = "type";
	else if ($taxonomy == "theme")
		$page_name = "thème";
	else if ($taxonomy == "recurrence")
		$page_name = "récurrence";
	else if ($taxonomy == "type_de_contenu")
		$page_name = "";
	else if ($taxonomy == "serie")
		$page_name = "série";
	else
		$page_name = $taxonomy;
					
	$page_name .= " " . $term_name->name;
	
	$permalink = get_term_link($term_name);
}
else {
	$page_name = "Nos cris";
	$permalink = get_home_url() . "/sons/";
}

$page_name_full = "Le cri de la girafe — " . $page_name;


echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>'; ?>
<rss xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd" version="2.0" >
<channel>
	<title><?php echo $page_name_full; ?></title>
	<link><?php echo $permalink; ?></link>
	<description><?php bloginfo_rss('description') ?></description>
	<language><?php bloginfo_rss( 'language' ); ?></language>
	<lastBuildDate><?php
		$date = get_lastpostmodified( 'GMT' );
		echo $date ? mysql2date( 'D, d M Y H:i:s +0000', $date ) : date( 'D, d M Y H:i:s +0000' );
	?></lastBuildDate>
	<generator>Le cri de la girafe</generator>
	<image>
      <url><?php echo get_stylesheet_directory_uri(); ?>/images/logo-2000.png</url>
      <title><?php echo $page_name_full; ?></title>
      <link><?php echo $permalink; ?></link>
    </image>
    <itunes:author>Le cri de la girafe</itunes:author>
    <itunes:category text="Création sonore"></itunes:category>
    <itunes:explicit>no</itunes:explicit>
    <itunes:image href="<?php echo get_site_icon_url(); ?>" />
    <itunes:owner>
      <itunes:email>contact@lecridelagirafe.org</itunes:email>
      <itunes:name>Le cri de la girafe</itunes:name>
    </itunes:owner>
    <itunes:subtitle><?php echo $page_name; ?></itunes:subtitle>
    <itunes:summary><?php bloginfo_rss('description') ?></itunes:summary>

	<?php
	/**
	 * Fires at the end of the RSS Feed Header.
	 *
	 * @since 2.0.0
	 */
	do_action( 'rss_head' );
	?>

<?php while (have_posts()) : the_post(); 

	if (get_post_type() == "son") {
	?>
	<item>
		<title><?php the_title_rss() ?></title>
		<description><![CDATA[<?php the_excerpt_rss() ?>]]></description>
		<link><?php the_permalink_rss() ?></link>
		<author>contact@lecridelagirafe.org</author>
		<category><?php 
			$categories = wp_get_post_terms($post->ID, 'type_de_contenu', array("fields" => "all"));
			if ( $categories && ! is_wp_error( $categories ) ) {
				$cats = array();
				foreach ( $categories as $term ) {
					$cats[] = $term->name;
				}
				$cats_list = join( ", ", $cats );
				echo $cats_list;
			}
			else {
				echo "sans catégorie";
			}
		?></category>
		<?php
			$pod = pods( 'son', $post->ID );
			$related = $pod->field( 'contenu_audio' );
			if ( ! empty( $related ) ) {
					$url_son = $related["guid"];
			}

			
			$authors = $pod->field( 'auteur' );
			$auteurs = "";
			if ( ! empty( $authors) ) {
				$authlist = array();
				foreach($authors as $author) {
						$authlist[] = $author["post_title"];
				}
				$auteurs = join( ", ", $authlist);	

			}
		?>
	  <enclosure url="<?php echo $url_son;?>" type="audio/mpeg"  />
      <guid ><?php echo $url_son;?></guid>
      <pubDate><?php echo get_the_date(); ?></pubDate>
      <itunes:author><?php echo $auteurs; ?></itunes:author>
      <itunes:explicit>no</itunes:explicit>
      <itunes:keywords><?php 
			$categories = wp_get_post_terms($post->ID, 'theme', array("fields" => "all"));
			if ( $categories && ! is_wp_error( $categories ) ) {
				$cats = array();
				foreach ( $categories as $term ) {
					$cats[] = $term->name;
				}
				$cats_list = join( ", ", $cats );
				echo $cats_list;
			}
			else {
				echo "sans thème";
			}
		?></itunes:keywords>
      <!-- itunes:subtitle>Émission du 12.11.2017</itunes:subtitle -->
      <itunes:summary><![CDATA[<?php the_excerpt_rss() ?>]]></itunes:summary>
      <!-- itunes:duration>???</itunes:duration-->
		<?php
		/**
		 * Fires at the end of each RSS feed item.
		 *
		 * @since 2.0.0
		 */
		do_action( 'rss_item' );
		?>
	</item>
<?php 
	}
endwhile; ?>
</channel>
</rss>
