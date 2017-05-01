<?php

/**
 * Custom comments template.
 *
 * @package Terri
 */

if ( ! function_exists( 'terri_comments' ) ) {

	function terri_comments ( $comment, $args, $depth ) {

		$GLOBALS['comment'] = $comment;
        switch ( $comment->comment_type ) :
            case 'pingback' :
            case 'trackback' :
        ?>

        <li class="post pingback">
            <p><?php esc_html_e( 'Pingback:', 'terri' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( 'Edit', 'terri' ), ' ' ); ?></p>
        
        <?php
            	break;
            default :
        ?>


        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">

    		<div class="comment-avatar">
    			<?php echo get_avatar( $comment, 72 ); ?>
			</div><!-- .comment-avatar -->

    		<?php if ( $comment->comment_approved == '0' ) : ?>
    			<em><?php esc_html__( 'Your comment is awaiting moderation.', 'terri' ); ?></em>
    		<?php endif; ?>
    	 
    		<div class="comment-inner">

                <div class="comment-header">
                	<span><?php comment_author_link(); ?></span>
                	<?php esc_html_e( 'on', 'terri' ); ?>
                	<time datetime="<?php comment_time( 'c' ); ?>"><?php printf( esc_html__( '%1$s at %2$s', 'terri' ), get_comment_date(), get_comment_time() ); ?></time>

                    <?php edit_comment_link( esc_html__( 'Edit', 'terri' ), ' ' ); ?>
                </div><!-- .comment-header -->

                <div class="comment-content">
                    <?php comment_text(); ?>
                </div><!-- .comment-content -->

                <div class="comment-reply">
                    <?php comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply', 'terri' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                </div><!-- .comment-reply -->

    		</div><!-- .comment-inner -->

    	</li>

        <?php
                break;
        endswitch;

	}

}