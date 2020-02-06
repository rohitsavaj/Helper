your-name
[text* your-name class:form-control placeholder "Name *"]

your-phone
[tel* your-phone minlength:10 maxlength:15 class:form-control placeholder "Phone Number *"]

your-email
[email* your-email autocomplete:off class:form-control placeholder "Email *"]

your-subject
[text your-subject class:form-control placeholder "Subject"]

your-message
[textarea your-message class:form-control placeholder "Brief description of your legal issue"]
[textarea* your-message x3 class:form-control] <!-- only rows -->
[textarea* your-message 10x class:form-control] <!-- only columns -->
[textarea* your-message 10x3 class:form-control] <!-- both -->

your-zip
[text your-zip class:form-control placeholder "Zip Code"]

To  shruti.radadiya@webslaw.com,tushar.patel@webslaw.com,harsh.vasitha@webslaw.com,rohit.savaj@webslaw.com,rajni.sharma@webslaw.com,madhuri.dedania@webslaw.com

From  [your-name] <wordpress@kornberglawfirm.com>

Subject [your-name] Contacting [_site_title]

Additional Headers: Reply-To: [your-email]
Bcc: leads@webslaw.com

Message Body

form id logic
https://stackoverflow.com/questions/46977362/target-wpcf7mailsent-of-a-specific-contact-7-form

select box
[select* your-state class:form-control first_as_label "State" "Alabama" "Alaska" "Arizona" "Arkansas" "California" "Colorado" "Connecticut" "Delaware" "Florida" "Georgia" "Hawaii" "Idaho" "Illinois" "Indiana" "Iowa" "Kansas" "Kentucky" "Louisiana" "Maine" "Maryland" "Massachusetts" "Michigan" "Minnesota" "Mississippi" "Missouri" "Montana" "Nebraska" "Nevada" "New Hampshire" "New Jersey" "New Mexico" "New York" "North Carolina" "North Dakota" "Ohio" "Oklahoma" "Oregon" "Pennsylvania" "Puerto Rico" "Rhode Island" "South Carolina" "South Dakota" "Tennessee" "Texas" "Utah" "Vermont" "Virginia" "Washington" "Washington DC" "West Virginia" "Wisconsin" "Wyoming"]

contact-preferences
[checkbox* contact-preferences "Email" "Phone"]

Mail format
<style>table tr th,table tr td{vertical-align:top}</style>
<div class="main-box" style="border: 1px solid #dddddd;border-radius: 5px; width: 650px;float: none;text-align: center; margin:40px auto; overflow: hidden;">
<div class="mb-header" style="background:#f2f2f2; padding: 20px 30px;">
<a href="https://polkatots.glasier.in"><img src="https://polkatots.glasier.in/wp-content/uploads/2020/01/plka-logo-min.png"/></a>
</div>
<div class="mb-content" style="background:#fff; padding: 25px;text-align: left;">
<table cellpadding="5" border="0" cellspacing="0" width="100%">
<tr><td colspan="2">A new inquiry has been submitted to the website. Please review the details below.</td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><th width="150" valign="top">Name:</th><td>[your-name]</td></tr>
<tr><th valign="top">Email:</th><td>[your-email]</td></tr>
<tr><th valign="top">Phone:</th><td>[your-phone]</td></tr>
<tr><th valign="top">Subject:</th><td>[your-subject]</td></tr>
<tr><th valign="top">Message:</th><td>[your-message]</td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2">This e-mail was sent from a contact form on <a href="https://polkatots.glasier.in">Polkatots</td></tr>
</table>
</div>
<div class="mb-footer" style="background:#03316c; padding:5px; text-align:center;">
<a href="https://glasierinc.com/" target="_blank"><img src="https://glasierinc.com/wp-content/uploads/2019/01/logo.png?id=1132" style="width:120px;"></a>
</div>
</div>


Additional Settings
acceptance_as_validation: on

[response]

<summary>How would you like to be contacted? Check all that apply. *</summary>


wpcf7-submit

terms:
[acceptance acceptance-195] I have read the <a href="https://www.kornberglawfirm.com/Disclaimer" title="Disclaimer" target="_blank">Disclaimer</a> and <a href="https://www.kornberglawfirm.com/Privacy-Policy" title="Privacy" target="_blank"> Privacy Policy</a> Terms.

wp-config.php
define('WPCF7_AUTOP', false);

<button class="wpcf7-submit" type="submit">Get a Prompt Response</button>

popup form
<div id="header">
	<h2><span>Contact Us</span><div class="closebtn"><i class="fa fa-close"></i></div></h2>
	<div class="form-style">
		<div class="form-group">[text* your-name placeholder "Your Name *"]</div>
		<div class="form-group">[email* your-email autocomplete:off placeholder "Your Email *"]</div>
		<div class="form-group">[tel* your-phone minlength:10 maxlength:15 placeholder "Phone No. *"]</div>
		<div class="form-group">[textarea your-message placeholder "Message"]</div><button class="effect-1 wpcf7-submit">Send Message</button>[response]</div>
</div>[honeypot southbaylawyer-827][spam_email spam_email-14 email_field:your-email message_field:your-message]

// thank you page separate
add_action('wp_footer', 'thank_you_redirect_fun');
function thank_you_redirect_fun() {
	$f_form = get_field('footer_form','option');
	$p_form = get_field('popup_form','option'); ?>
	<script>
        document.addEventListener('wpcf7mailsent', function(event) {
			<?php
			 ?>
            if(event.detail.contactFormId == <?php echo $f_form;?>) {
                location = '<?php echo get_permalink( get_page_by_path( 'thank-you-footer' ) );?>';
            }
            else if(event.detail.contactFormId == <?php echo $p_form;?>) {
                location = '<?php echo get_permalink( get_page_by_path( 'thank-you-popup' ) );?>';
            }
        }, false);
	</script>
<?php
}
// thank you page separate