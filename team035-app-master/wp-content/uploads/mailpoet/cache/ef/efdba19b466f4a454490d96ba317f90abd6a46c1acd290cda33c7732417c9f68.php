<?php

use MailPoetVendor\Twig\Environment;
use MailPoetVendor\Twig\Error\LoaderError;
use MailPoetVendor\Twig\Error\RuntimeError;
use MailPoetVendor\Twig\Markup;
use MailPoetVendor\Twig\Sandbox\SecurityError;
use MailPoetVendor\Twig\Sandbox\SecurityNotAllowedTagError;
use MailPoetVendor\Twig\Sandbox\SecurityNotAllowedFilterError;
use MailPoetVendor\Twig\Sandbox\SecurityNotAllowedFunctionError;
use MailPoetVendor\Twig\Source;
use MailPoetVendor\Twig\Template;

/* welcome_wizard.html */
class __TwigTemplate_1b123dac2067d39b7dfa4b72de5335ff92bb542e227699ee79239269cd12f277 extends \MailPoetVendor\Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'translations' => [$this, 'block_translations'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "layout.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("layout.html", "welcome_wizard.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        // line 4
        echo "<script>
  var mailpoet_logo_url = '";
        // line 5
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateCdnUrl("welcome-wizard/mailpoet-logo.20190109-1400.png");
        echo "';
  var wizard_sender_illustration_url = '";
        // line 6
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateCdnUrl("welcome-wizard/sender.20190409.png");
        echo "';
  var wizard_email_course_illustration_url = '";
        // line 7
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateCdnUrl("welcome-wizard/email-course.20190409.png");
        echo "';
  var wizard_tracking_illustration_url = '";
        // line 8
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateCdnUrl("welcome-wizard/tracking.20190409.png");
        echo "';
  var wizard_MSS_pitch_illustration_url = '";
        // line 9
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateCdnUrl("welcome-wizard/illu-pitch-mss.20190912.png");
        echo "';
  var is_mp2_migration_complete = ";
        // line 10
        echo json_encode(($context["is_mp2_migration_complete"] ?? null));
        echo ";
  var is_woocommerce_active = ";
        // line 11
        echo json_encode(($context["is_woocommerce_active"] ?? null));
        echo ";
  var finish_wizard_url = '";
        // line 12
        echo \MailPoetVendor\twig_escape_filter($this->env, ($context["finish_wizard_url"] ?? null), "html", null, true);
        echo "';
  var sender_data = ";
        // line 13
        echo json_encode(($context["sender"] ?? null));
        echo ";
  var admin_email = ";
        // line 14
        echo json_encode(($context["admin_email"] ?? null));
        echo ";
  var hide_mailpoet_beacon = true;
  var subscribers_count = ";
        // line 16
        echo \MailPoetVendor\twig_escape_filter($this->env, ($context["subscriber_count"] ?? null), "html", null, true);
        echo ";
  var mailpoet_account_url = '";
        // line 17
        echo \MailPoetVendor\twig_escape_filter($this->env, \MailPoetVendor\twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\Functions')->addReferralId(((("https://account.mailpoet.com/?s=" . ($context["subscriber_count"] ?? null)) . "&email=") . $this->getAttribute(($context["current_wp_user"] ?? null), "user_email", []))), "js"), "html", null, true);
        echo "';
  var has_mss_key_specified = ";
        // line 18
        echo json_encode(($context["has_mss_key_specified"] ?? null));
        echo ";
  var mailpoet_feature_flags = ";
        // line 19
        echo json_encode(($context["mailpoet_feature_flags"] ?? null));
        echo ";
</script>

<div id=\"mailpoet_wizard_container\"></div>

<div class=\"welcome_wizard_video\">
    <iframe width=\"1\" height=\"1\" src=\"https://player.vimeo.com/video/279123953\" frameborder=\"0\"></iframe>
</div>

";
    }

    // line 30
    public function block_translations($context, array $blocks = [])
    {
        // line 31
        echo $this->env->getExtension('MailPoet\Twig\I18n')->localize(["welcomeWizardLetsStartTitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Welcome! Let’s get you started on the right foot."), "welcomeWizardSenderText" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Who is the sender of the emails you’ll be creating with MailPoet?"), "welcomeWizardSenderMigratedUserText" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("We have a few things to tell you before you begin to ensure you have a good experience."), "welcomeWizardUsageTrackingStepTitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Help MailPoet improve with anonymous usage tracking."), "welcomeWizardUsageTrackingStepSubTitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Data we don’t gather:"), "welcomeWizardTrackingText" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Gathering usage data allows us to make MailPoet better — the way you use MailPoet will be considered as we evaluate new features, judge the quality of an update, or determine if an improvement makes sense."), "welcomeWizardTrackingList1" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Any personal data"), "welcomeWizardTrackingList2" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Email addresses"), "welcomeWizardTrackingList3" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Login and passwords"), "welcomeWizardTrackingList4" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Content of your emails"), "welcomeWizardTrackingList5" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Open and click rates"), "welcomeWizardTrackingLink" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Read more about what we collect."), "welcomeWizardEmailCourseTitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Sign up to our 4-part email course"), "welcomeWizardEmailCourseText" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("A must for every beginner (in English only)"), "seeVideoGuide" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("See video guide", "A label on a button"), "skip" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Skip", "A label on a skip button"), "noThanksSkip" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("No thanks. Skip.", "A label on a skip button"), "allowAndFinish" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Allow & Finish", "A label on a button"), "allowAndContinue" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Allow & Continue", "A label on a button"), "senderAddress" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("From Address", "A form field label"), "replyToAddress" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Reply-to Address", "A form field label"), "senderName" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("From Name", "A form field label"), "next" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Next", "A label on a button")]);
        // line 55
        echo "
";
        // line 56
        $this->loadTemplate("mss_pitch_translations.html", "welcome_wizard.html", 56)->display($context);
    }

    public function getTemplateName()
    {
        return "welcome_wizard.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 56,  118 => 55,  116 => 31,  113 => 30,  99 => 19,  95 => 18,  91 => 17,  87 => 16,  82 => 14,  78 => 13,  74 => 12,  70 => 11,  66 => 10,  62 => 9,  58 => 8,  54 => 7,  50 => 6,  46 => 5,  43 => 4,  40 => 3,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "welcome_wizard.html", "/home/u20s1035/dev_root/wp-content/plugins/mailpoet/views/welcome_wizard.html");
    }
}
