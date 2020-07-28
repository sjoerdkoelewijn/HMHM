<?php /* Part of the info block */ ?>

<div class="text_wrap">

    <h3 class="subheader">
        <?php the_field('subheader'); ?>
    </h3>

    <h2 class="header">
        <?php the_field('header'); ?>
    </h2>    

    <p class="description">
        <?php the_field('description'); ?>
    </p>

    <?php include(get_template_directory() . '/blocks/parts/global/button-repeater.php'); ?> 

        <?php $textToggle = get_field('text_toggle');
        $belowBtnHeader = get_field('below_btn_header');
        $belowBtnText = get_field('below_btn_text');

        if( $textToggle === 'yes') { ?>

            <h3 class="below_btn_header">
                <?php echo $belowBtnHeader; ?>
            </h3>
            <p class="below_btn_text">
                <?php echo $belowBtnText; ?>
            </p>

        <?php } ?>
           
</div>