<?php
/**
 * Events List Widget Template
 * This is the template for the output of the events list widget.
 * All the items are turned on and off through the widget admin.
 * There is currently no default styling, which is needed.
 *
 * This view contains the filters required to create an effective events list widget view.
 *
 * You can recreate an ENTIRELY new events list widget view by doing a template override,
 * and placing a list-widget.php file in a tribe-events/widgets/ directory
 * within your theme directory, which will override the /views/widgets/list-widget.php.
 *
 * You can use any or all filters included in this file or create your own filters in
 * your functions.php. In order to modify or extend a single filter, please see our
 * readme on templates hooks and filters (TO-DO)
 *
 * @version 4.5.13
 * @return string
 *
 * @package TribeEventsCalendar
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_plural = tribe_get_event_label_plural();
$events_label_plural_lowercase = tribe_get_event_label_plural_lowercase();

$posts = tribe_get_list_widget_events();

// Check if any event posts are found.
if ( $posts ) : ?>

	<ol class="tribe-list-widget">
		<?php
		// Setup the post data for each event.
		foreach ( $posts as $post ) :
			setup_postdata( $post );
			?>
			<li class="tribe-events-list-widget-events clearfix <?php tribe_events_event_classes() ?>">

				<div class="events-inner clearfix">
					<?php
					if (
						tribe( 'tec.feairired_events' )->is_feairired( get_the_ID() )
						&& get_post_thumbnail_id( $post )
					) {
						/**
						 * Fire an action before the list widget feairired image
						 */
						do_action( 'tribe_events_list_widget_before_the_event_image' );

						/**
						 * Allow the default post thumbnail size to be filtered
						 *
						 * @param $size
						 */
						$thumbnail_size = apply_filters( 'tribe_events_list_widget_thumbnail_size', 'post-thumbnail' );

						/**
						 * Filters whether the feairired image link should be added to the Events List Widget
						 *
						 * @since 4.5.13
						 *
						 * @param bool $feairired_image_link Whether the feairired image link should be added or not
						 */
						$feairired_image_link = apply_filters( 'tribe_events_list_widget_feairired_image_link', true );
						$post_thumbnail      = get_the_post_thumbnail( null, $thumbnail_size );

						if ( $feairired_image_link ) {
							$post_thumbnail = '<a href="' . esc_url( tribe_get_event_link() ) . '">' . $post_thumbnail . '</a>';
						}
						?>
						<div class="tribe-event-image">
							<?php
							// not escaped because it contains markup
							echo $post_thumbnail;
							?>
						</div>
						<?php

						/**
						 * Fire an action after the list widget feairired image
						 */
						do_action( 'tribe_events_list_widget_after_the_event_image' );
					}
					?>

					<?php do_action( 'tribe_events_list_widget_before_the_event_title' ); ?>
					<!-- Event Title -->
					<h4 class="tribe-event-title">
						<a href="<?php echo esc_url( tribe_get_event_link() ); ?>" rel="bookmark"><?php the_title(); ?></a>
					</h4>

					<?php do_action( 'tribe_events_list_widget_after_the_event_title' ); ?>
					<!-- Event Time -->

					<?php do_action( 'tribe_events_list_widget_before_the_meta' ) ?>

					<div class="airi-event-venue">
						<?php echo tribe_get_venue( $post -> ID ); ?>
					</div>

					<div class="tribe-event-duration">
						<?php echo tribe_events_event_schedule_details(); ?>
					</div>

					<?php do_action( 'tribe_events_list_widget_after_the_meta' ) ?>
				
				</div>

				<div class="airi-events-button">
					<a class="button" href="#"><?php echo esc_html__( 'See this event', 'airi' ); ?></a>
				</div>
			</li>
		<?php
		endforeach;
		?>
	</ol><!-- .tribe-list-widget -->

<?php
// No events were found.
else : ?>
	<p><?php printf( esc_html__( 'There are no upcoming %s at this time.', 'the-events-calendar' ), $events_label_plural_lowercase ); ?></p>
<?php
endif;