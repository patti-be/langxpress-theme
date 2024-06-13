<?php

// Function to handle form submission
function handle_contact_form()
{
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $message = sanitize_textarea_field($_POST['message']);

    // Email subject
    $subject = 'New Contact Form Submission';

    // Email body
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message: $message\n";

    // Recipient email address
    $to = 'patti.berchi@gmail.com';

    // Send email
    wp_mail($to, $subject, $body);

    // Redirect after form submission
    wp_redirect(home_url());
    exit;
}
add_action('admin_post_handle_contact_form', 'handle_contact_form');
add_action('admin_post_nopriv_handle_contact_form', 'handle_contact_form');
