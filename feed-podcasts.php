<?php
/**
 * RSS 0.92 Feed Template for displaying RSS 0.92 Posts feed.
 *
 * @package WordPress
 */
 
 include("mp3.class.php");

header('Content-Type: ' . feed_content_type('rss') . '; charset=' . get_option('blog_charset'), true);

function wavDur($file) {
  $fp = fopen($file, 'r');
  if (fread($fp,4) == "RIFF") {
    fseek($fp, 20);
    $rawheader = fread($fp, 16);
    $header = unpack('vtype/vchannels/Vsamplerate/Vbytespersec/valignment/vbits',$rawheader);
    $pos = ftell($fp);
    while (fread($fp,4) != "data" && !feof($fp)) {
      $pos++;
      fseek($fp,$pos);
    }
    $rawheader = fread($fp, 4);
    $data = unpack('Vdatasize',$rawheader);
    $sec = $data[datasize]/$header[bytespersec];
    $minutes = intval(($sec / 60) % 60);
    $seconds = intval($sec % 60);
    return str_pad($minutes,2,"0", STR_PAD_LEFT).":".str_pad($seconds,2,"0", STR_PAD_LEFT);
  }
}

$image_principale = get_stylesheet_directory_uri() . "/images/lecridelagirafe-1400.png";


/* cas taxonomy */
$taxonomy = get_query_var( 'taxonomy' );
$term = get_query_var( 'term' );
if ($taxonomy && $term) {
	$term_name = get_term_by( 'slug', $term, $taxonomy ); 
	
	if ($taxonomy == "duree")
		$page_name = "durée de ";
	else if ($taxonomy == "type_de_contenu")
		$page_name = "type ";
	else if ($taxonomy == "theme")
		$page_name = "thème ";
	else if ($taxonomy == "recurrence")
		$page_name = "récurrence ";
	else if ($taxonomy == "type_de_contenu")
		$page_name = "";
	else if ($taxonomy == "serie") {
		$page_name = "";
		// on vérifie s'il y a une vignette de série
		$pod = pods( 'serie', $term );
        if ($pod->field('vignette_de_podcast' )) {
              //$image_principale = $pod->display( 'vignette_de_podcast' );
              
              $image_principale  = pods_image_url( 
                    $pod->field( 'vignette_de_podcast', TRUE ),
                    'lcdlg-podcast',
                    0,
                    array(
                    ),
                    true
                );
        }
            
    }
	else
		$page_name = $taxonomy;
    
    
	$page_name .= $term_name->name;
	
	$permalink = get_term_link($term_name);
}
else {
	$page_name = "Nos cris";
	$permalink = get_home_url() . "/sons/";
}

$page_name_full = $page_name . " | Le cri de la girafe";




echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>'; ?>
<rss xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd" xmlns:atom="http://www.w3.org/2005/Atom" version="2.0" >
<channel>
	<title><?php echo $page_name_full; ?></title>
	<link><?php echo $permalink; ?></link>
	<description><?php bloginfo_rss('description') ?></description>
	<language><?php bloginfo_rss( 'language' ); ?></language>
	<atom:link href="<?php echo $permalink; ?>/feed/podcasts" rel="self" type="application/rss+xml" />
	<lastBuildDate><?php
		$date = get_lastpostmodified( 'GMT' );
		echo $date ? mysql2date( 'D, d M Y H:i:s +0000', $date, false ) : date( 'D, d M Y H:i:s +0000' );
	?></lastBuildDate>
	<generator>Le cri de la girafe</generator>
	<image>
      <url><?php echo $image_principale; ?></url>
      <title><?php echo $page_name_full; ?></title>
      <link><?php echo $permalink; ?></link>
    </image>
    <itunes:author>Le cri de la girafe</itunes:author>
    <itunes:category text="Society &amp; Culture" />
    <itunes:explicit>no</itunes:explicit>
    <itunes:image href="<?php echo $image_principale; ?>" />
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
		<author>contact@lecridelagirafe.org (Collectif le cri de la girafe)</author>
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
					//$url_son = str_replace("http://", "https://", $url_son);
			}

        $local_url = str_replace("https://", "http://", $url_son);
        $local_url = str_replace("http://lecridelagirafe.org/wp-content/", get_stylesheet_directory() . "/../../", $local_url);
        $local_url = str_replace("http://dev.lecridelagirafe.org/wp-content/", get_stylesheet_directory() . "/../../", $local_url);

			
			$authors = $pod->field( 'auteur' );
			$auteurs = "";
			if ( ! empty( $authors) ) {
				$authlist = array();
				foreach($authors as $author) {
						$authlist[] = $author["post_title"];
				}
				$auteurs = join( ", ", $authlist);	

			}
			
			if (has_post_thumbnail()) {
              echo "<itunes:image href=\"" . get_the_post_thumbnail_url(get_the_ID(), 'lcdlg-podcast') . "\" />";
            }
		?>
	  <enclosure url="<?php echo $url_son;?>" length="<?php echo filesize($local_url);?>" type="audio/mpeg"  />
      <guid><?php echo $url_son;?></guid>
      <pubDate><?php 
        echo mysql2date('D, d M Y H:i:s +0000', get_post_time('Y-m-d H:i:s', true), false); 
        ?></pubDate>
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
				if (count(cats) == 1)
          echo ",";
			}
			else {
				echo "sans thème";
			}
		?></itunes:keywords>
      <itunes:subtitle><?php $categories = wp_get_post_terms($post->ID, 'type_de_contenu', array("fields" => "all"));
			if ( $categories && ! is_wp_error( $categories ) ) {
				$cats = array();
				foreach ( $categories as $term ) {
					$cats[] = $term->name;
				}
				$cats_list = join( ", ", $cats );
				echo $cats_list;
			}
			else {
				echo "-";
			}?></itunes:subtitle>
      <itunes:summary><![CDATA[<?php the_excerpt_rss(); ?>]]></itunes:summary>
      <itunes:duration><?php
	$path_parts = pathinfo($local_url);
	if (in_array($path_parts['extension'], array("mp3", "MP3"))) {
	        $mp3file = new MP3File($local_url);
        	$duration = $mp3file->getDurationEstimate();
	        echo MP3File::formatTime($duration);
	}
	else if (in_array($path_parts['extension'], array("wav", "WAV"))) {
		echo wavDur($local_url);
	}
      ?></itunes:duration>
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
