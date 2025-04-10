<div id="comments">
    <?php if ( have_comments() ) : ?>
        <ol class="commentlist">
            <!-- Limited to 3: per_page -->
            <?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments', 'per_page' => 3 ) ) ); ?>
        </ol>
        <?php
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
            echo '<nav class="woocommerce-pagination">';
            paginate_comments_links(
                apply_filters(
                    'woocommerce_comment_pagination_args',
                    array(
                        'prev_text' => '&larr;',
                        'next_text' => '&rarr;',
                        'type'      => 'list',
                    )
                )
            );
            echo '</nav>';
        endif;
        ?>
    <?php endif; ?>
</div>