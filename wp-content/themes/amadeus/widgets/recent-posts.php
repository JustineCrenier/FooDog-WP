<?php
/**
 * Recent posts widget.
 *
 * @package Amadeus
 */

/**
 * Class Amadeus_Recent_Posts
 */
class Amadeus_Recent_Posts extends WP_Widget {

	/**
	 * Amadeus_Recent_Posts constructor.
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'   => 'amadeus_recent_posts_widget',
			'description' => __( 'Recent posts with thumbnails.', 'amadeus' ),
		);
		parent::__construct( 'amadeus_recent_posts_widget', __( 'Amadeus: Recent Posts', 'amadeus' ), $widget_ops );
		$this->alt_option_name = 'amadeus_recent_posts_widget';

		add_action( 'save_post', array( $this, 'flush_widget_cache' ) );
		add_action( 'deleted_post', array( $this, 'flush_widget_cache' ) );
		add_action( 'switch_theme', array( $this, 'flush_widget_cache' ) );
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options.
	 */
	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'amadeus' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>"/>
		</p>

		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:', 'amadeus' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3"/></p>

		<p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>"/>
			<label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?', 'amadeus' ); ?></label></p>

		<?php
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options.
	 * @param array $old_instance The previous options.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance              = $old_instance;
		$instance['title']     = strip_tags( $new_instance['title'] );
		$instance['number']    = strip_tags( $new_instance['number'] );
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset( $alloptions['amadeus_Recent_Posts'] ) ) {
			delete_option( 'amadeus_Recent_Posts' );
		}

		return $instance;
	}

	/**
	 * Delete cache
	 */
	public function flush_widget_cache() {
		wp_cache_delete( 'amadeus_recent_Pposts', 'widget' );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Widget instance.
	 */
	public function widget( $args, $instance ) {
		$cache = array();
		if ( ! $this->is_preview() ) {
			$cache = wp_cache_get( 'amadeus_recent_posts', 'widget' );
		}

		if ( ! is_array( $cache ) ) {
			$cache = array();
		}

		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];

			return;
		}

		ob_start();

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';

		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number ) {
			$number = 5;
		}
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

		$r = new WP_Query(
			array(
				'posts_per_page'      => $number,
				'no_found_rows'       => true,
				'post_status'         => 'publish',
				'ignore_sticky_posts' => true,
			)
		);

		if ( $r->have_posts() ) :
			if ( ! empty( $args['before_widget'] ) ) {
				echo $args['before_widget'];
			}

			if ( ! empty( $title ) ) {

				if ( ! empty( $args['before_title'] ) ) {
					echo $args['before_title'];
				}
				echo $title;

				if ( ! empty( $args['after_title'] ) ) {
					echo $args['after_title'];
				}
			}
			?>
			<ul class="list-group">
				<?php
				while ( $r->have_posts() ) :
					$r->the_post();
?>
					<li class="list-group-item">
						<div class="recent-post clearfix">
							<?php if ( has_post_thumbnail() ) : ?>
								<div class="recent-thumb col-md-3 col-xs-3">
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail' ); ?></a>
								</div>
							<?php endif; ?>
							<?php if ( has_post_thumbnail() ) : ?>
								<?php echo '<div class="col-md-9 col-xs-9">'; ?>
							<?php else : ?>
								<?php echo '<div class="col-md-12">'; ?>
							<?php endif; ?>
							<h4><a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a></h4>
							<?php if ( $show_date ) : ?>
							<span class="post-date"><i class="fa fa-calendar"></i>&nbsp;<?php echo get_the_date(); ?></span></div>
						<?php else : ?>
							<?php echo '</div>'; ?>
						<?php endif; ?>
						</div>
					</li>
				<?php endwhile; ?>
			</ul>
			<?php
			if ( ! empty( $args['after_widget'] ) ) {
				echo $args['after_widget'];
			}

			wp_reset_postdata();

		endif;

		if ( ! $this->is_preview() ) {
			$cache[ $args['widget_id'] ] = ob_get_flush();
			wp_cache_set( 'amadeus_Recent_Posts', $cache, 'widget' );
		} else {
			ob_end_flush();
		}
	}

}
