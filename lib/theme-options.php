<?php
add_action( 'admin_menu', 'pb_add_admin_menu' );
add_action( 'admin_init', 'pb_settings_init' );


function pb_add_admin_menu(  ) { 

    add_menu_page('Paperboy', 'Paperboy', 'manage_options', 'theme-options', 'pb_options_page', 'dashicons-welcome-widgets-menus');

    add_submenu_page( 'theme-options', 'Paperboy', 'Paperboy', 'manage_options', 'theme-options', 'pb_options_page');
    add_submenu_page( 'theme-options', 'Paperboy SEO', 'Paperboy SEO', 'manage_options', 'paperboy-seo', 'pb_options_page_seo');
}


function pb_settings_init(  ) { 

    register_setting( 'optionsPage', 'pb_settings' );
    register_setting( 'optionsPageSeo', 'pb_settings_seo' );

    add_settings_section(
        'pb_general_section', 
        __( 'Your section description', '_paperboybasetheme' ), 
        'pb_settings_section_callback', 
        'optionsPage'
    );

    add_settings_field( 
        'pb_facebook_page', 
        __( 'Facebook Page', '_paperboybasetheme' ), 
        'pb_facebook_page_render', 
        'optionsPage', 
        'pb_general_section' 
    );

    add_settings_field( 
        'pb_responsive_layout', 
        __( 'Is the layout responsive?', '_paperboybasetheme' ), 
        'pb_responsive_layout_render', 
        'optionsPage', 
        'pb_general_section' 
    );

    add_settings_field( 
        'pb_layout_select', 
        __( 'Choose layout', '_paperboybasetheme' ), 
        'pb_layout_select_render', 
        'optionsPage', 
        'pb_general_section' 
    );

    add_settings_section(
        'pb_seo_section', 
        __( 'Search engine optimization', '_paperboybasetheme' ), 
        'pb_seo_section_callback', 
        'optionsPageSeo'
    );

    add_settings_field( 
        'pb_description', 
        __( 'Description', '_paperboybasetheme' ), 
        'pb_description_render', 
        'optionsPageSeo', 
        'pb_seo_section' 
    );

    add_settings_field( 
        'pb_keywords', 
        __( 'Keywords', '_paperboybasetheme' ), 
        'pb_keywords_render', 
        'optionsPageSeo', 
        'pb_seo_section' 
    );


}


function pb_facebook_page_render(  ) { 

    $options = get_option( 'pb_settings' );
    ?>
    <input type='text' name='pb_settings[pb_facebook_page]' value='<?php echo $options['pb_facebook_page']; ?>'>
    <?php

}



function pb_responsive_layout_render(  ) { 

    $options = get_option( 'pb_settings' );
    ?>
    No <input type='radio' name='pb_settings[pb_responsive_layout]' <?php checked( $options['pb_responsive_layout'], 0 ); ?> value='0'>
    Yes <input type='radio' name='pb_settings[pb_responsive_layout]' <?php checked( $options['pb_responsive_layout'], 1 ); ?> value='1'>
    <?php

}


function pb_layout_select_render(  ) { 

    $options = get_option( 'pb_settings' );
    ?>
    <select name='pb_settings[pb_layout_select]'>
        <option value='1' <?php selected( $options['pb_layout_select'], 1 ); ?>>Option 1</option>
        <option value='2' <?php selected( $options['pb_layout_select'], 2 ); ?>>Option 2</option>
    </select>

<?php

}

// SECOND PAGE


function pb_description_render(  ) { 

    $options = get_option( 'pb_settings_seo' );
    ?>
    <textarea cols='40' rows='5' name='pb_settings_seo[pb_description]'><?php echo $options['pb_description']; ?></textarea>
    <?php

}


function pb_keywords_render(  ) { 

    $options = get_option( 'pb_settings_seo' );
    ?>
    <textarea cols='40' rows='5' name='pb_settings_seo[pb_keywords]'><?php echo $options['pb_keywords']; ?></textarea>

<?php

}


function pb_settings_section_callback(  ) { 

    echo __( 'This section description', '_paperboybasetheme' );

}

function pb_seo_section_callback(  ) { 

    echo __( 'Here you can manage your SEO', '_paperboybasetheme' );

}


function pb_options_page(  ) { 

    ?>
    <div class="wrap">
        <form action='options.php' method='post'>
            
            <h1>Paperboy</h1>
            
            <?php
            settings_fields( 'optionsPage' );
            do_settings_sections( 'optionsPage' );
            submit_button();
            ?>
            
        </form>
    </div>
    <?php

}

function pb_options_page_seo(  ) { 

    ?>
    <div class="wrap">
        <form action='options.php' method='post'>
            
            <h1>Paperboy SEO</h1>
            
            <?php
            settings_fields( 'optionsPageSeo' );
            do_settings_sections( 'optionsPageSeo' );
            submit_button();
            ?>
            
        </form>
    </div>
    <?php

}

?>
