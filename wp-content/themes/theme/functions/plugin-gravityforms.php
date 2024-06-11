<?php







/**
 * Add all Gravity Forms capabilities to Editor role.
 * Runs when this theme is activated.
 *
 * @access public
 * @return void
 */
function grant_gforms_editor_access() {

    $role = get_role( 'editor' );
    $role->add_cap( 'gravityforms_view_entries' );
}
// Tie into the 'after_switch_theme' hook
add_action( 'after_switch_theme', 'grant_gforms_editor_access' );

/**
 * Remove Gravity Forms capabilities from Editor role.
 * Runs when this theme is deactivated (in favor of another).
 *
 * @access public
 * @return void
 */
function revoke_gforms_editor_access() {

    $role = get_role( 'editor' );
    $role->remove_cap( 'gravityforms_view_entries' );
}
// Tie into the 'switch_theme' hook
add_action( 'switch_theme', 'revoke_gforms_editor_access' );




/**
 * Gravity forms adapitve placeholders
 *
 *
 *
 */


//add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );



// Rewrites gravity form output to work with adaptive placeholders
//
//add_filter( 'gform_field_content', 'adaptive_placeholders', 10, 5 );
//function adaptive_placeholders( $input, $field, $value, $lead_id, $form_id ) {
//    if ( $field->cssClass == 'adaptive' && !is_admin()) {
//        $label = '<label for="input_'.$form_id.'_'.$field->id.'">'.$field->label.'</label></div>';
//
//        $input = preg_replace('/(^|\n)?<label\b.*?<\/label>/', '', $input); // Remove label
//        $input = str_replace( 'name=', "required name=", $input ); // Add 'required'
//        $input = str_replace('</div>', $label, $input) ; // Add label at bottom
//    }
//    return $input;
//}




/**
 * Gravity Wiz // Disable HTML5 Validation on Gravity Forms
 * http://gravitywiz.com/disable-html5-validation-on-gravity-forms/
 * This is needed to work with adaptive placeholders
 */
//add_filter( 'gform_form_tag', 'add_no_validate_attribute_to_form_tag' );
//function add_no_validate_attribute_to_form_tag( $form_tag ) {
//    return str_replace( '>', ' novalidate="novalidate">', $form_tag );
//}


// Remove Gravity forms jump to anchor on form success
//add_filter( 'gform_confirmation_anchor', '__return_false' );


// Add button classes to submit button
//add_filter("gform_submit_button", "alter_form_submit_button", 10, 2);
function alter_form_submit_button($button, $form){
    if ($form["button"]["type"] == "text") {
        // (class=) followed by (single or double quote) followed by (anything that is not a single or double quote)
        $pattern = '/(class=)(\'|")([^\'"]+)/';
        $replacement = '${1}${2}${3} button-primary';
        $newbutton = preg_replace($pattern, $replacement, $button);
        if ( !is_null($newbutton) ) {
            return $newbutton;
        }
    }
    return $button;
}


// filter the Gravity Forms button type
//add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );
//function form_submit_button( $button, $form ) {
//
//
//    if($form['cssClass'] != 'override-button'){
//        return "<button class='button button-primary' id='gform_submit_button_{$form['id']}'>Get Quote<br><small>obligation free, quick response</small></button>";
//    }else{
//        return "<button class='button button-primary' id='gform_submit_button_{$form['id']}'>".$form['button']['text']."</button>";
//    }
//}
//














