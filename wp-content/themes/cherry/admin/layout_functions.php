<?php
function upload_input($input,$head = true)
{
    $bd_option = unserialize(get_option('bdayh_setting'));
    if($head == true)
    {
        ?>
        <div class="bd_item postbox">
        <h3 class="hndle"><?php echo $input['name']; ?></h3>
    <?php
    } ?>

    <div class="bd_option_item" >
        <?php if ( !empty($input['tip']) && $input['tip'] != ' ' ) { ?><a class="bd_help" title="<?php echo $input['tip']; ?>"></a><?php } ?>
        <span class="label"><?php echo $input['label']; ?></span>

        <input id="<?php echo $input['id']; ?>" class="<?php $class_name = (isset($input['class'])) ? $input['class'] : ""; echo $class_name; ?> img-path upload-url" type="text" name="bd_setting[<?php echo $input['id']; ?>]" value="<?php echo $bd_option['bd_setting'][$input['id']]; ?>">
        <input id="<?php echo $input['id']; ?>_button" type="button" class="go st_upload_button" value="Upload">

        <div class="upload_img" id="<?php echo $input['id']; ?>_img" <?php if($bd_option['bd_setting'][$input['id']] == ''){?> style="display:none;"<?php }?>>
            <img src="<?php echo $bd_option['bd_setting'][$input['id']];?>" alt="" />
            <a href="#" class="remove_img" id="<?php echo $input['id']; ?>_remove">
                <?php _e('Remove','bd') ?>
            </a>
        </div>
    </div>

    <?php if($head == true)
{
    ?>
    </div>
<?php
}
}

function uploadbg_input($input,$head = true)
{
    $bd_option = unserialize(get_option('bdayh_setting'));
    if($head == true)
    {
        ?>

    <?php
    } ?>

    <div class="bd_option_item" >
        <?php if ( !empty($input['tip']) && $input['tip'] != ' ' ) { ?><a class="bd_help" title="<?php echo $input['tip']; ?>"></a><?php } ?>
        <span class="label"><?php echo $input['label']; ?></span>

        <input id="<?php echo $input['id']; ?>" class="<?php $class_name = (isset($input['class'])) ? $input['class'] : ""; echo $class_name; ?> img-path upload-url" type="text" name="bd_setting[<?php echo $input['id']; ?>]" value="<?php echo $bd_option['bd_setting'][$input['id']]; ?>">
        <input id="<?php echo $input['id']; ?>_button" type="button" class="go st_upload_button" value="Upload">

        <div class="upload_img" id="<?php echo $input['id']; ?>_img" <?php if($bd_option['bd_setting'][$input['id']] == ''){?> style="display:none;"<?php }?>>
            <img src="<?php echo $bd_option['bd_setting'][$input['id']];?>" alt="" />
            <a href="#" class="remove_img" id="<?php echo $input['id']; ?>_remove">
                <?php _e('Remove','bd') ?>
            </a>
        </div>
    </div>

    <?php if($head == true)
{
    ?>

<?php
}
}


function ptext_input($input,$head = true)
{
    $bd_option = unserialize(get_option('bdayh_setting'));
    if($head == true)
    {
        ?>

        <div class="bd_item postbox">
        <h3 class="hndle"><?php echo $input['name']; ?></h3>
    <?php
    } ?>

    <div class="bd_option_item <?php $class_name = (isset($input['class'])) ? $input['class'] : ""; echo $class_name; ?>" >
        <p class="<?php echo $input['class']; ?>"><?php echo $input['label']; ?></p>
    </div><!--//End item-->

    <?php if($head == true)
{
    ?>
    </div>
<?php
}
}
// Slider Number


function text_input($input,$head = true)
{
    $bd_option = unserialize(get_option('bdayh_setting'));
    if($head == true)
    {
        ?>

        <div class="bd_item postbox">
        <h3 class="hndle"><?php echo $input['name']; ?></h3>
    <?php
    } ?>

    <div class="bd_option_item <?php $class_name = (isset($input['class'])) ? $input['class'] : ""; echo $class_name; ?>" >
        <?php if ( !empty($input['tip']) && $input['tip'] != ' ' ) { ?><a class="bd_help" title="<?php echo $input['tip']; ?>"></a><?php } ?>
        <span class="label"><?php echo $input['label']; ?></span>
        <input id="<?php echo $input['id']; ?>" class="<?php $class_name = (isset($input['class'])) ? $input['class'] : ""; echo $class_name; ?>" type="text" value="<?php echo stripslashes($bd_option['bd_setting'][$input['id']]) ;?>" name="bd_setting[<?php echo $input['id']; ?>]" />
        <span class="pp-bdlink"><?php echo $input['bdlink']; ?></span>
    </div><!--//End item-->

    <?php if($head == true)
{
    ?>
    </div>
<?php
}
}
// Slider Number

function slider_num_input($input,$head = true)
{
    $bd_option = unserialize(get_option('bdayh_setting'));
    if($head == true)
    {
        ?>
        <div class="bd_item postbox" >
        <h3 class="hndle"><?php echo $input['name']; ?></h3>
    <?php
    } ?>

    <div class="bd_option_item <?php $class_name = (isset($input['class'])) ? $input['class'] : ""; echo $class_name; ?>">
        <?php if ( !empty($input['tip']) && $input['tip'] != ' ' ) { ?><a class="bd_help" title="<?php echo $input['tip']; ?>"></a><?php } ?>
        <span class="label"><?php echo $input['label']; ?></span>

    <div class="bd-uislider">
        <div class="slider_num slide_num_f" id="<?php echo $input['id']; ?>" ></div>
        <input id="<?php echo $input['id']; ?>_input" class="input_num_f" type="text" name="bd_setting[<?php echo $input['id']; ?>]" value="<?php echo (int)$bd_option['bd_setting'][$input['id']];?>">
        <span class="unitf"><?php echo $input['unit']; ?><span>
	</div>
		  	    <script>
                jQuery(document).ready(function() {
                    jQuery("#<?php echo $input['id']; ?>").slider({
                        range: "min",
                        min: <?php echo $input['min']; ?>,
                        max: <?php echo $input['max']; ?>,
                        value: <?php if($bd_option['bd_setting'][$input['id']] != '') { echo $bd_option['bd_setting'][$input['id']]; }else{ echo 0;} ?>,
                        slide: function(event, ui) {
                            jQuery('#'+jQuery(this).attr('id')+'_input').val(ui.value);

                        }
                    });
                });
            </script>

    </div><!--//End item-->

    <?php if($head == true)
{
    ?>
    </div>
<?php
}
}



// typography

function typography_input($input,$head = true)
{
    global $options_fonts;
    $current_value = bdayh_get_option($input['id']);
    $bd_option = unserialize(get_option('bdayh_setting'));

    if($head == true)
    {
        ?>

    <?php
    } ?>

    <span class="label"><?php echo $input['label']; ?></span>
    <div class="pp-typo-content">
        <div class="pp-background-color">
            <div id="<?php echo $input['id']; ?>colorselect" class="colorSelector pp-color">
                <div style="background-color:<?php echo $current_value['color'] ; ?>"></div>
            </div>
            <input class="pp-input-text" id="<?php echo $input['id']; ?>color" type="text" name="bd_setting[<?php echo $input['id']; ?>][color]" value="<?php echo $current_value['color'] ; ?>" />
        </div>
        <select class="pp-select" name="bd_setting[<?php echo $input['id']; ?>][size]" id="<?php echo $input['id']; ?>[size]" style="width:30px;">
            <option value="" <?php if (!$current_value['size'] ) { echo ' selected="selected"' ; } ?>></option>
            <?php for( $i=1 ; $i<101 ; $i++){ ?>
                <option value="<?php echo $i ?>" <?php if (( $current_value['size']  == $i ) ) { echo ' selected="selected"' ; } ?>><?php echo $i ?></option>
            <?php } ?>
        </select>
        <select class="pp-select" name="bd_setting[<?php echo $input['id']; ?>][font]" id="<?php echo $input['id']; ?>[font]" style="width:198px;">
            <?php foreach( $options_fonts as $font => $font_name ){ ?>
                <option value="<?php echo $font ?>" <?php if ( $current_value['font']  == $font ) { echo ' selected="selected"' ; } ?>><?php echo $font_name ?></option>
            <?php } ?>
        </select>
        <select class="pp-select" name="bd_setting[<?php echo $input['id']; ?>][weight]" id="<?php echo $input['id']; ?>[weight]">
            <option value="" <?php if ( !$current_value['weight'] ) { echo ' selected="selected"' ; } ?>></option>
            <option value="normal" <?php if ( $current_value['weight']  == 'normal' ) { echo ' selected="selected"' ; } ?>>Normal</option>
            <option value="bold" <?php if ( $current_value['weight']  == 'bold') { echo ' selected="selected"' ; } ?>>Bold</option>
            <option value="lighter" <?php if ( $current_value['weight'] == 'lighter') { echo ' selected="selected"' ; } ?>>Lighter</option>
            <option value="bolder" <?php if ( $current_value['weight'] == 'bolder') { echo ' selected="selected"' ; } ?>>Bolder</option>
            <option value="100" <?php if ( $current_value['weight'] == '100') { echo ' selected="selected"' ; } ?>>100</option>
            <option value="200" <?php if ( $current_value['weight'] == '200') { echo ' selected="selected"' ; } ?>>200</option>
            <option value="300" <?php if ( $current_value['weight'] == '300') { echo ' selected="selected"' ; } ?>>300</option>
            <option value="400" <?php if ( $current_value['weight'] == '400') { echo ' selected="selected"' ; } ?>>400</option>
            <option value="500" <?php if ( $current_value['weight'] == '500') { echo ' selected="selected"' ; } ?>>500</option>
            <option value="600" <?php if ( $current_value['weight'] == '600') { echo ' selected="selected"' ; } ?>>600</option>
            <option value="700" <?php if ( $current_value['weight'] == '700') { echo ' selected="selected"' ; } ?>>700</option>
            <option value="800" <?php if ( $current_value['weight'] == '800') { echo ' selected="selected"' ; } ?>>800</option>
            <option value="900" <?php if ( $current_value['weight'] == '900') { echo ' selected="selected"' ; } ?>>900</option>
        </select>
        <select class="pp-select" name="bd_setting[<?php echo $input['id']; ?>][style]" id="<?php echo $input['id']; ?>[style]" >
            <option value="" <?php if ( !$current_value['style'] ) { echo ' selected="selected"' ; } ?>></option>
            <option value="normal" <?php if ( $current_value['style']  == 'normal' ) { echo ' selected="selected"' ; } ?>>Normal</option>
            <option value="italic" <?php if ( $current_value['style'] == 'italic') { echo ' selected="selected"' ; } ?>>Italic</option>
            <option value="oblique" <?php if ( $current_value['style']  == 'oblique') { echo ' selected="selected"' ; } ?>>oblique</option>
        </select>
    </div><!-- pp typography -->

    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('#<?php echo $input['id']; ?>colorselect').ColorPicker({
                color: '#FFFFFF',
                onShow: function (colpkr) {
                    jQuery(colpkr).fadeIn(500);
                    return false;},
                onHide: function (colpkr) {
                    jQuery(colpkr).fadeOut(500);
                    return false;
                },
                onChange: function (hsb, hex, rgb)
                {
                    jQuery('#<?php echo $input['id']; ?>colorselect div').css('backgroundColor', '#' + hex);
                    jQuery('#<?php echo $input['id']; ?>color').val('#'+hex);
                }
            });
        });
    </script>


    <?php if($head == true)
{
    ?>

<?php
}
}



// background

function background_bd_input($input,$head = true)
{
    $current_value = bdayh_get_option($input['id']);
    $bd_option = unserialize(get_option('bdayh_setting'));

    if($head == true)
    {
        ?>

    <?php
    } ?>

    <div class="pp-background">

        <div class="pp-background-color">
            <div id="<?php echo $input['id']; ?>colorselect" class="colorSelector pp-color">
                <div style="background-color:<?php echo $current_value['color'] ; ?>"></div>
            </div>
            <input class="pp-input-text" id="<?php echo $input['id']; ?>color" type="text" name="bd_setting[<?php echo $input['id']; ?>][color]" value="<?php echo $current_value['color'] ; ?>" />
        </div>

        <select class="pp-select" name="bd_setting[<?php echo $input['id']; ?>][repeat]" id="<?php echo $input['id']; ?>[repeat]">
            <option value="" <?php if ( !$current_value['repeat'] ) { echo ' selected="selected"' ; } ?>></option>
            <option value="repeat" <?php if ( $current_value['repeat']  == 'repeat' ) { echo ' selected="selected"' ; } ?>>repeat</option>
            <option value="no-repeat" <?php if ( $current_value['repeat']  == 'no-repeat') { echo ' selected="selected"' ; } ?>>no-repeat</option>
            <option value="repeat-x" <?php if ( $current_value['repeat'] == 'repeat-x') { echo ' selected="selected"' ; } ?>>repeat-x</option>
            <option value="repeat-y" <?php if ( $current_value['repeat'] == 'repeat-y') { echo ' selected="selected"' ; } ?>>repeat-y</option>
        </select>

        <select class="pp-select" name="bd_setting[<?php echo $input['id']; ?>][attachment]" id="<?php echo $input['id']; ?>[attachment]">
            <option value="" <?php if ( !$current_value['attachment'] ) { echo ' selected="selected"' ; } ?>></option>
            <option value="fixed" <?php if ( $current_value['attachment']  == 'fixed' ) { echo ' selected="selected"' ; } ?>>Fixed</option>
            <option value="scroll" <?php if ( $current_value['attachment']  == 'scroll') { echo ' selected="selected"' ; } ?>>scroll</option>
        </select>

        <select class="pp-select" name="bd_setting[<?php echo $input['id']; ?>][hor]" id="<?php echo $input['id']; ?>[hor]">
            <option value="" <?php if ( !$current_value['hor'] ) { echo ' selected="selected"' ; } ?>></option>
            <option value="left" <?php if ( $current_value['hor']  == 'left' ) { echo ' selected="selected"' ; } ?>>Left</option>
            <option value="right" <?php if ( $current_value['hor']  == 'right') { echo ' selected="selected"' ; } ?>>Right</option>
            <option value="center" <?php if ( $current_value['hor'] == 'center') { echo ' selected="selected"' ; } ?>>Center</option>
        </select>

        <select class="pp-select" name="bd_setting[<?php echo $input['id']; ?>][ver]" id="<?php echo $input['id']; ?>[ver]" >
            <option value="" <?php if ( !$current_value['ver'] ) { echo ' selected="selected"' ; } ?>></option>
            <option value="top" <?php if ( $current_value['ver']  == 'top' ) { echo ' selected="selected"' ; } ?>>Top</option>
            <option value="center" <?php if ( $current_value['ver'] == 'center') { echo ' selected="selected"' ; } ?>>Center</option>
            <option value="bottom" <?php if ( $current_value['ver']  == 'bottom') { echo ' selected="selected"' ; } ?>>Bottom</option>
        </select>
    </div><!-- pp background -->

    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('#<?php echo $input['id']; ?>colorselect').ColorPicker({
                color: '#FFFFFF',
                onShow: function (colpkr) {
                    jQuery(colpkr).fadeIn(500);
                    return false;},
                onHide: function (colpkr) {
                    jQuery(colpkr).fadeOut(500);
                    return false;
                },
                onChange: function (hsb, hex, rgb)
                {
                    jQuery('#<?php echo $input['id']; ?>colorselect div').css('backgroundColor', '#' + hex);
                    jQuery('#<?php echo $input['id']; ?>color').val('#'+hex);
                }
            });
        });
    </script>


    <?php if($head == true)
{
    ?>

<?php
}
}


function color_input($input,$head = true)
{
    $bd_option = unserialize(get_option('bdayh_setting'));
    if($head == true)
    {
        ?>
        <div class="bd_item postbox">
        <h3 class="hndle"><?php echo $input['name']; ?></h3>
    <?php
    } ?>

    <div class="bd_option_item <?php $class_name = (isset($input['class'])) ? $input['class'] : ""; echo $class_name; ?>" >
        <?php if ( !empty($input['tip']) && $input['tip'] != ' ' ) { ?><a class="bd_help" title="<?php echo $input['tip']; ?>"></a><?php } ?>
        <span class="label"><?php echo $input['label']; ?></span>

        <div id="<?php echo $input['id']; ?>" class="colorSelector">
            <div style="background-color:<?php echo $bd_option['bd_setting'][$input['id']];?>;"></div>
        </div>
        <input id="<?php echo $input['id']; ?>_input" class="input_numb color_input" type="text" name="bd_setting[<?php echo $input['id']; ?>]" value="<?php echo $bd_option['bd_setting'][$input['id']];?>">
    </div><!--//End item-->

    <script type="text/javascript">
        jQuery(document).ready(function()
        {
            jQuery('#<?php echo $input['id']; ?>').ColorPicker
            ({
                color: '#FFFFFF',
                onShow: function (colpkr) {
                    jQuery(colpkr).fadeIn(500);
                    return false;
                },
                onHide: function (colpkr) {
                    jQuery(colpkr).fadeOut(500);
                    return false;
                },
                onChange: function (hsb, hex, rgb)
                {
                    jQuery('#<?php echo $input['id']; ?> div').css('backgroundColor', '#' + hex);
                    jQuery('#<?php echo $input['id']; ?>'+'_input').val('#' + hex);
                }
            });


        });
    </script>

    <?php if($head == true)
{
    ?>
    </div>
<?php
}
}


function tags_input($input,$head = true)
{
    $bd_option = unserialize(get_option('bdayh_setting'));
    if($head == true)
    {
        ?>
        <div class="bd_item postbox">
        <h3 class="hndle"><?php echo $input['name']; ?></h3>
    <?php
    } ?>

    <div class="bd_option_item <?php $class_name = (isset($input['class'])) ? $input['class'] : ""; echo $class_name; ?>" >
        <?php if ( !empty($input['tip']) && $input['tip'] != ' ' ) { ?><a class="bd_help" title="<?php echo $input['tip']; ?>"></a><?php } ?>
        <span class="label"><?php echo $input['label']; ?></span>

        <input id="<?php echo $input['id']; ?>" class="<?php $class_name = (isset($input['class'])) ? $input['class'] : ""; echo $class_name; ?>" type="text" name="bd_setting[<?php echo $input['id']; ?>]" value="<?php echo $bd_option['bd_setting'][$input['id']];?>">
        <?php $list_tags = get_tags('orderby=count&order=desc&number=50');
        echo "<div class='list_tags'>";
        foreach ($list_tags as $tag)
        {
            ?>
            <span onclick="add_tag('<?php echo $input['id']; ?>','<?php echo $tag->name; ?>');">
			    			<?php echo $tag->name ?>
			    		</span>

        <?php }
        ?>
    </div>
    </div><!--//End item-->

    <?php if($head == true)
{
    ?>
    </div>
<?php
}

}


function textarea_input($input,$head = true)
{
    $bd_option = unserialize(get_option('bdayh_setting'));
    if($head == true)
    {
        ?>
        <div class="bd_item postbox">
        <h3 class="hndle"><?php echo $input['name']; ?></h3>
    <?php
    }
    ?>

    <div class="bd_option_item" >
        <?php if ( !empty($input['tip']) && $input['tip'] != ' ' ) { ?><a class="bd_help" title="<?php echo $input['tip']; ?>"></a><?php } ?>
        <span class="label"><?php echo $input['label']; ?></span>

        <?php if($input['id'] != 'advanced_export')
        {
            ?>
            <textarea id="<?php echo $input['id']; ?>" class="<?php $class_name = (isset($input['class'])) ? $input['class'] : ""; echo $class_name; ?>" name="bd_setting[<?php echo $input['id']; ?>]" rows="7"><?php if($input['id'] != 'advanced_export'){ echo stripslashes($bd_option['bd_setting'][$input['id']]); } else { echo base64_encode(get_option('bdayh_setting')); }?></textarea>
        <?php
        }
        else
        {
            echo '<div class="textarea textarea_full " id="'.$input['id'].'">'.base64_encode(get_option('bdayh_setting')).'</div>';
        }
        ?>

        <?php
        if($input['id'] == 'advanced_export')
        {
            ?>
            <button type="button" class="go" onclick="window.location='admin.php?page=options.php&do=download';">Download</button>
        <?php
        }
        ?>

    </div><!--//End item-->

    <?php if($head == true)
{
    ?>
    </div>
<?php
}
}


function number_input($input,$head = true)
{
    $bd_option = unserialize(get_option('bdayh_setting'));
    if($head == true)
    {
        ?>
        <div class="bd_item postbox">
        <h3 class="hndle"><?php echo $input['name']; ?></h3>
    <?php
    } ?>

    <div class="bd_option_item" id="<?php echo $input['id']; ?>_item">
        <?php if ( !empty($input['tip']) && $input['tip'] != ' ' ) { ?><a class="bd_help" title="<?php echo $input['tip']; ?>"></a><?php } ?>
        <span class="label"><?php echo $input['label']; ?></span>

        <input  type="text" id="<?php echo $input['id']; ?>" class="input_numb <?php $class_name = (isset($input['class'])) ? $input['class'] : ""; echo $class_name; ?>" name="bd_setting[<?php echo $input['id']; ?>]"  value="<?php echo $bd_option['bd_setting'][$input['id']];?>"  class="input_numb" />
    </div><!--//End item-->

    <?php if($head == true)
{
    ?>
    </div>
<?php
}
}


function checkbox_input($input,$head = true)
{
    $bd_option = unserialize(get_option('bdayh_setting'));
    if($head == true)
    {
        ?>
        <div class="bd_item postbox">
        <h3 class="hndle"><?php echo $input['name']; ?></h3>
    <?php
    } ?>

    <div class="bd_option_item" >
        <?php if ( !empty($input['tip']) && $input['tip'] != ' ' ) { ?><a class="bd_help" title="<?php echo $input['tip']; ?>"></a><?php } ?>
        <span class="label"><?php echo $input['label']; ?></span>

        <input type="checkbox" id="<?php echo $input['id']; ?>" <?php if(isset($bd_option['bd_setting'][$input['id']]) and $bd_option['bd_setting'][$input['id']] == 1){echo ' checked="checked"';}?> class="<?php $class_name = (isset($input['class'])) ? $input['class'] : ""; echo $class_name; ?>" name="bd_setting[<?php echo $input['id']; ?>]"  value="1" />
    </div><!--//End item-->

    <?php if($head == true)
{
    ?>
    </div>
<?php
}

}


function radio_input($input,$head = true)
{
    $bd_option = unserialize(get_option('bdayh_setting'));
    if($head == true)
    {
        ?>
        <div class="bd_item postbox">
        <h3 class="hndle"><?php echo $input['name']; ?></h3>
    <?php
    } ?>

    <div class="bd_option_item <?php $class_name = (isset($input['class'])) ? $input['class'] : ""; echo $class_name; ?>">
        <?php if ( !empty($input['tip']) && $input['tip'] != ' ' ) { ?><a class="bd_help" title="<?php echo $input['tip']; ?>"></a><?php } ?>
        <span class="label"><?php echo $input['label']; ?></span>

        <div class="check_radio_content">
            <?php foreach($input['list'] as $r)
            {
                ?>
                <label class="check_radio"><input id="<?php echo $input['id']; ?>_<?php echo $r; ?>" class="r_<?php echo $input['id'];?> <?php $class_name = (isset($input['class'])) ? $input['class'] : ""; echo $class_name; ?>" <?php if($bd_option['bd_setting'][$input['id']] == $r){echo 'checked="checked"';}?> name="bd_setting[<?php echo $input['id']; ?>]" type="radio" value="<?php echo $r; ?>"><?php echo $r; ?></label>
            <?php
            }

            if(isset($input['js']))
            {
                echo $input['js'];
            }
            ?>
        </div>
    </div><!--//End item-->

    <?php if($head == true)
{
    ?>
    </div>
<?php
}

}



function radio_bgtype_input($input,$head = true)
{
    $bd_option = unserialize(get_option('bdayh_setting'));
    if($head == true)
    {
        ?>
    <?php
    } ?>

    <div class="bd_option_item <?php $class_name = (isset($input['class'])) ? $input['class'] : ""; echo $class_name; ?>">
        <span class="label"><?php echo $input['label']; ?></span>

        <div class="check_radio_content">

            <?php foreach ($input['options'] as $key => $option) { ?>
                <label class="check_radio"><input name="bd_setting[<?php echo $input['id']; ?>]" id="<?php echo $input['id']; ?>" type="radio" value="<?php echo $key ?>" <?php if ( bdayh_get_option( $input['id'] ) == $key) { echo ' checked="checked"' ; } ?>> <?php echo $option; ?></label>
            <?php } ?>

        </div>
    </div><!--//End item-->

    <?php if($head == true)
{
    ?>
<?php
}

}



function select_input($input,$head = true)
{
    global $wp_cats;
    $bd_option = unserialize(get_option('bdayh_setting'));

    if($head == true)
    {
        ?>
        <div class="bd_item postbox">
        <h3 class="hndle"><?php echo $input['name']; ?></h3>
    <?php
    } ?>

    <div class="bd_option_item <?php $class_name = (isset($input['class'])) ? $input['class'] : ""; echo $class_name; ?>" id="<?php echo $input['id']; ?>">
        <?php if ( !empty($input['tip']) && $input['tip'] != ' ' ) { ?><a class="bd_help" title="<?php echo $input['tip']; ?>"></a><?php } ?>
        <span class="label"><?php echo $input['label']; ?></span>

        <select  class="<?php $class_name = (isset($input['class'])) ? $input['class'] : ""; echo $class_name; ?>" name="bd_setting[<?php echo $input['id']; ?>]" >
            <?php if(is_array($input['list']))
            {
                foreach($input['list'] as $r)
                {
                    ?>
                    <option value="<?php echo $r;?>" <?php if($bd_option['bd_setting'][$input['id']] == $r){echo 'selected="selected"';}?> ><?php echo $r;?></option>
                <?php
                }
            }
            elseif($input['list'] == 'cats' and is_array($wp_cats))
            {
                ?>
                <option value="" <?php if($bd_option['bd_setting'][$input['id']] == ''){echo 'selected="selected"';}?> >Select Category ..</option>
                <?php foreach($wp_cats as $c_id => $c_name )
            {
                ?>
                <option value="<?php echo $c_id;?>" <?php if($bd_option['bd_setting'][$input['id']] == $c_id){echo 'selected="selected"';}?> ><?php echo $c_name;?></option>
            <?php
            }
            } ?>
        </select>
    </div><!--//End item-->

    <?php if($head == true)
{
    ?>
    </div>
<?php
}

}



function get_admin_tab($input,$head = true)
{
    switch($input['type'])
    {
        case"upload":
            upload_input($input,$head);
            break;

        case"uploadbg":
            uploadbg_input($input,$head);
            break;

        case"text":
            text_input($input,$head);
            break;

        case"ptext":
            ptext_input($input,$head);
            break;

        case"color":
            color_input($input,$head);
            break;
        case"tags":
            tags_input($input,$head);
            break;
        case"textarea":
            textarea_input($input,$head);
            break;
        case"number":
            number_input($input,$head);
            break;
        case"checkbox":
            checkbox_input($input,$head);
            break;
        case"radio":
            radio_input($input,$head);
            break;
        case"radio_bgtype":
            radio_bgtype_input($input,$head);
            break;
        case"select":
            select_input($input,$head);
            break;
        case"slider_num":
            slider_num_input($input,$head);
            break;
        case"background_bd":
            background_bd_input($input,$head);
            break;
        case"typography":
            typography_input($input,$head);
            break;

    }
}


/*
	Home function =====================================================================*/
// Home news box
function home_news_box($k,$arr){
    global $wp_cats;
    ?>
    <div class="builder_inner" id="home_box_<?php echo $k; ?>">
        <input type="hidden" name="bd_setting[home][<?php echo $k; ?>][type]" value="news_box" />
        <h5 class="boxes_title"><a class="handle " original-title="Move Box">Move Box</a><span>News Box :</span><?php echo $wp_cats[$arr['cat']]; ?><span class="settings"> Settings</span><a class="del" id="remove_<?php echo $k; ?>" original-title="Remove Box">Remove Box</a></h5>
        <div class="bd_item builder_content">
            <div class="bd_item_content" style="display:none;">
                <div class="row">
                    <label>Category </label>
                    <select name="bd_setting[home][<?php echo $k; ?>][cat]" id="bd_setting_home_<?php echo $k; ?>_cat">
                        <?php foreach($wp_cats as $c_id => $c_name ){ ?>
                            <option value="<?php echo $c_id;?>" <?php if($arr['cat'] == $c_id){echo "selected='selected'";} ?>><?php echo $c_name;?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="row">
                    <label>Number of posts </label>
                    <input class="input_numb" name="bd_setting[home][<?php echo $k; ?>][number]" type="text" value="<?php echo $arr['number']; ?>">
                    <a class="bd_help" original-title="How many posts you want to be displayed from the selected categories. Type -1 if you want to use all the existing posts from the categories you selected."></a>
                </div>
                <div class="row">
                    <label>Box Layout </label>
                    <ol class="box_layout_list bd_box_layout">
                        <li <?php if($arr['layout'] == 1){?>class="selectd" <?php }?>>
                            <a href="#" original-title="First Post Left">
                                <img alt=" " src="<?php echo BD_FW; ?>/assets/images/on_col.png"></a>
                            <input name="bd_setting[home][<?php echo $k; ?>][layout]" type="radio" <?php if($arr['layout'] == 1){?> checked="checked" <?php }?> value="1"  />
                        </li>
                        <li <?php if($arr['layout'] == 2){?>class="selectd" <?php }?>>
                            <a href="#" original-title="First Post Full Width">
                                <img alt=" " src="<?php echo BD_FW; ?>/assets/images/tow_col.png"></a>
                            <input name="bd_setting[home][<?php echo $k; ?>][layout]" type="radio" <?php if($arr['layout'] == 2){?> checked="checked" <?php }?> value="2"  />
                        </li>
                        <li <?php if($arr['layout'] == 3){?>class="selectd" <?php }?>>
                            <a href="#" original-title="Two Box Small">
                                <img alt=" " src="<?php echo BD_FW; ?>/assets/images/three_col.png"></a>
                            <input name="bd_setting[home][<?php echo $k; ?>][layout]" type="radio" <?php if($arr['layout'] == 3){?> checked="checked" <?php }?>  value="3"  />
                        </li>
                        <li <?php if(intval($arr['layout']) == 4){echo 'class="selectd"';}?> >
                            <a href="#" original-title="News in picrure">
                                <img alt=" " src="<?php echo BD_FW; ?>/assets/images/news_in_picrure.png"></a>
                            <input name="bd_setting[home][<?php echo $k; ?>][layout]" type="radio" <?php if(intval($arr['layout']) == 4){?> checked="checked" <?php }?> value="4"  />
                        </li>
                        <li <?php if(intval($arr['layout']) == 5){echo 'class="selectd"';}?> >
                            <a href="#" original-title="News in picrure small">
                                <img alt=" " src="<?php echo BD_FW; ?>/assets/images/news_in_picrure_small.png"></a>
                            <input name="bd_setting[home][<?php echo $k; ?>][layout]" type="radio" <?php if(intval($arr['layout']) == 5){?> checked="checked" <?php }?> value="5"  />
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
<?php }

// Home scrolling
function home_scrolling_box($k,$arr){
    global $wp_cats;
    ?>
    <div class="builder_inner" id="home_box_<?php echo $k; ?>">
        <input type="hidden" name="bd_setting[home][<?php echo $k; ?>][type]" value="scrolling_box" />
        <h5 class="boxes_title"><a class="handle " original-title="Move Box">MoveBox</a><span>Scrolling box :</span><?php echo $arr['title']; ?><span class="settings">Settings</span><a class="del" id="remove_<?php echo $k; ?>" original-title="Remove Box">Remove Box</a></h5>
        <div class="bd_item builder_content">
            <div class="bd_item_content" style="display:none;">
                <div class="row">
                    <label>Category </label>
                    <select name="bd_setting[home][<?php echo $k; ?>][cat]" id="bd_setting_home_<?php echo $k; ?>_cat">
                        <?php foreach($wp_cats as $c_id => $c_name ) { ?>
                            <option value="<?php echo $c_id;?>" <?php if($arr['cat'] == $c_id){echo "selected='selected'";} ?>><?php echo $c_name;?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="row">
                    <label>Title </label>
                    <input type="text" name="bd_setting[home][<?php echo $k; ?>][title]" value="<?php echo $arr['title']; ?>">
                </div>
                <div class="row">
                    <label>Number of posts </label>
                    <input class="input_numb" name="bd_setting[home][<?php echo $k; ?>][number]" type="text" value="<?php echo $arr['number']; ?>">
                    <a class="bd_help" original-title="How many posts you want to be displayed from the selected categories. Type -1 if you want to use all the existing posts from the categories you selected.">
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php }

// Home Ads
function home_ads_box($k,$arr){
    ?>
    <div class="builder_inner" id="home_box_<?php echo $k; ?>">
        <input type="hidden" name="bd_setting[home][<?php echo $k; ?>][type]" value="ads_box" />
        <h5 class="boxes_title"><a class="handle " original-title="Move Box">MoveBox</a>Ads <span class="settings">Settings</span><a class="del" id="remove_<?php echo $k; ?>" original-title="Remove Box">Remove Box</a></h5>
        <div class="bd_item builder_content">
            <div class="bd_item_content" style="display:none;">
                <div class="row">
                    <label>Type </label>
                    <div class="check_radio_content">
                        <label class="check_radio"><input name="bd_setting[home][<?php echo $k; ?>][ad_type]" class="ad_type" <?php if($arr[ad_type] == 'code'){echo 'checked="checked"';}?>  type="radio" value="code">Ads Code </label>
                        <label class="check_radio">
                            <input name="bd_setting[home][<?php echo $k; ?>][ad_type]" class="ad_type" <?php if($arr[ad_type] == 'img'){echo 'checked="checked"';}?>   type="radio" value="img">Image Upload</label>
                    </div>
                </div>
                <div class="row ads_code" <?php if($arr[ad_type] == 'img'){echo 'style="display:none;"';}?> >
                    <label>Ads Code </label>
                    <textarea class="textarea_full" name="bd_setting[home][<?php echo $k; ?>][ad_code]" rows="7"><?php echo stripcslashes($arr[ad_code]); ?></textarea>
                </div>
                <div class="row ads_img" <?php if($arr[ad_type] == 'code'){echo 'style="display:none;"';}?>>
                    <label>Image Upload</label>
                    <input id="bd_setting_home_<?php echo $k; ?>" class="img-path upload-url" type="text" name="bd_setting[home][<?php echo $k; ?>][ad_img]" value="<?php echo $arr['ad_img']; ?>">
                    <input id="bd_setting_home_<?php echo $k; ?>_img_button" type="button" class="go st_upload_button" value="Upload">
                    <div class="upload_img" id="bd_setting_home_<?php echo $k; ?>_img" style="display:none;">
                        <img src="" width="120"  alt="" border="0" />
                        <a href="#" class="remove_img" id="bd_setting_home_<?php echo $k; ?>_remove">Remove</a>
                    </div>
                    <div class="clear">
                    </div>
                    <label>Ads Link </label>
                    <input type="text" name="bd_setting[home][<?php echo $k; ?>][ad_link]" value="<?php echo $arr['ad_link']; ?>">
                    <div class="clear">
                    </div>
                    <label>Alternate Name </label>
                    <input type="text" name="bd_setting[home][<?php echo $k; ?>][ad_alt]" value="<?php echo $arr['ad_alt']; ?>">
                </div>
            </div>
        </div>
    </div>
<?php }

// Home recent
function home_recent_box($k,$arr){
    global $wp_cats;
    if(isset($wp_cats))
    {
        ?>
        <div class="builder_inner" id="home_box_<?php echo $k; ?>">
            <input type="hidden" name="bd_setting[home][<?php echo $k; ?>][type]" value="recent_box" />
            <h5 class="boxes_title"><a class="handle " original-title="Move Box">MoveBox</a><?php echo $arr['title']; ?><span class="settings">Settings</span><a class="del" id="remove_<?php echo $k; ?>" original-title="Remove Box">Remove Box</a></h5>
            <div class="bd_item builder_content">
                <div class="bd_item_content" style="display:none;">
                    <div class="row">
                        <label>Category </label>
                        <select multiple="multiple" style="height: auto;" name="bd_setting[home][<?php echo $k; ?>][cat][]" id="bd_setting_home_<?php echo $k; ?>_cat">
                            <?php foreach($wp_cats as $c_id => $c_name ) { ?>
                                <option value="<?php echo $c_id;?>" <?php if(in_array($c_id,$arr['cat'])){echo "selected='selected'";} ?>><?php echo $c_name;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="row">
                        <label>Title </label>
                        <input type="text" name="bd_setting[home][<?php echo $k; ?>][title]" value="<?php echo $arr['title']; ?>">
                    </div>
                    <div class="row">
                        <label>Number of posts </label>
                        <input class="input_numb" name="bd_setting[home][<?php echo $k; ?>][number]" type="text" value="<?php echo $arr['number']; ?>">
                        <a class="bd_help" original-title="How many posts you want to be displayed from the selected categories. Type -1 if you want to use all the existing posts from the categories you selected."></a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
}