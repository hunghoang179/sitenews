<!-- Start footer -->
<footer id="footer-container">



<?php if(of_get_option('footer_columns') == 'footer_0_col') {}else{?>
    <div class="footer-columns">
        <div class="row">
            <?php if(of_get_option('footer_columns') == 'footer_2col' || of_get_option('footer_columns') == 'footer_3col') {?>
            <div class="<?php if(of_get_option('footer_columns') == 'footer_2col'){echo "grid_6";}elseif(of_get_option('footer_columns') == 'footer_3col'){echo "grid_4";}?>"><?php if (is_active_sidebar('footer1-sidebar')) : dynamic_sidebar('footer1-sidebar'); endif; ?></div>
            <div class="<?php if(of_get_option('footer_columns') == 'footer_2col'){echo "grid_6";}elseif(of_get_option('footer_columns') == 'footer_3col'){echo "grid_4";}?>"><?php if (is_active_sidebar('footer2-sidebar')) : dynamic_sidebar('footer2-sidebar'); endif; ?></div>
            <?php }?>
            <?php if(of_get_option('footer_columns') == 'footer_1col' || of_get_option('footer_columns') == 'footer_3col') {?>
            <div class="<?php if(of_get_option('footer_columns') == 'footer_1col'){echo "grid_12";}elseif(of_get_option('footer_columns') == 'footer_3col'){echo "grid_4";}?>"><?php if (is_active_sidebar('footer3-sidebar')) : dynamic_sidebar('footer3-sidebar'); endif; ?></div>
     		<?php }?>
        </div>
    </div>
    <?php }?>

<?php if(of_get_option('disable_copyright_footer') == 0){?>
    <div class="footer-bottom">
        <div class="row">
            <div class="grid_6 footer-left"> <?php echo of_get_option('copyright'); ?></div>
            <div class="grid_6 footer-right">  
                <?php if (of_get_option('enable_menu_bottom') == 1){ ?>
                
                    <?php $footer_menu = array('theme_location' => 'Footer_Menu', 'depth' => 1, 'container' => false, 'menu_class' => 'menu-footer', 'menu_id' => '', 'fallback_cb' => false ); ?>
                    <?php wp_nav_menu($footer_menu); ?>
                    
                <?php }else{echo "&nbsp;";} ?></div>
        </div>  
    </div>  
<?php }?>


</footer>
<!-- End footer -->



<?php
$tracking_code = of_get_option('tracking_code');

if (!empty($tracking_code)) {
    echo '<script>' . $tracking_code . '</script>';
}


?>


<?php
wp_footer();
?>
</body>
</html>
