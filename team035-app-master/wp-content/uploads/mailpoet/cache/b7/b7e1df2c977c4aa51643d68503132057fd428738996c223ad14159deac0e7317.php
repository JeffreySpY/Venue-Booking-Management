<?php

use MailPoetVendor\Twig\Environment;
use MailPoetVendor\Twig\Error\LoaderError;
use MailPoetVendor\Twig\Error\RuntimeError;
use MailPoetVendor\Twig\Extension\SandboxExtension;
use MailPoetVendor\Twig\Markup;
use MailPoetVendor\Twig\Sandbox\SecurityError;
use MailPoetVendor\Twig\Sandbox\SecurityNotAllowedTagError;
use MailPoetVendor\Twig\Sandbox\SecurityNotAllowedFilterError;
use MailPoetVendor\Twig\Sandbox\SecurityNotAllowedFunctionError;
use MailPoetVendor\Twig\Source;
use MailPoetVendor\Twig\Template;

/* layout.html */
class __TwigTemplate_e2a2aec49e03e296e0f05b0f40315b8425ca156b71d9d39c8d17bb6752a2f882 extends \MailPoetVendor\Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'templates' => [$this, 'block_templates'],
            'container' => [$this, 'block_container'],
            'title' => [$this, 'block_title'],
            'content' => [$this, 'block_content'],
            'after_css' => [$this, 'block_after_css'],
            'translations' => [$this, 'block_translations'],
            'after_translations' => [$this, 'block_after_translations'],
            'after_javascript' => [$this, 'block_after_javascript'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        if (($context["sub_menu"] ?? null)) {
            // line 2
            echo "<script type=\"text/javascript\">
jQuery('.toplevel_page_mailpoet-newsletters.menu-top-last')
  .addClass('wp-has-current-submenu')
  .find('a[href\$=\"";
            // line 5
            echo \MailPoetVendor\twig_escape_filter($this->env, ($context["sub_menu"] ?? null), "html", null, true);
            echo "\"]')
  .addClass('current')
  .parent()
  .addClass('current');
</script>
";
        }
        // line 11
        echo "
<!-- pre connect to 3d party to speed up page loading -->
<link rel=\"preconnect\" href=\"https://beacon-v2.helpscout.net/\">
<link rel=\"dns-prefetch\" href=\"https://beacon-v2.helpscout.net/\">
<link rel=\"preconnect\" href=\"http://cdn.mxpnl.com\">
<link rel=\"dns-prefetch\" href=\"http://cdn.mxpnl.com\">

<!-- system notices -->
<div id=\"mailpoet_notice_system\" class=\"mailpoet_notice\" style=\"display:none;\"></div>

<!-- handlebars templates -->
";
        // line 22
        $this->displayBlock('templates', $context, $blocks);
        // line 23
        echo "
<!-- main container -->
";
        // line 25
        $this->displayBlock('container', $context, $blocks);
        // line 42
        echo "
<!-- stylesheets -->
";
        // line 44
        echo $this->extensions['MailPoet\Twig\Assets']->generateStylesheet("mailpoet-plugin.css");
        // line 46
        echo "

";
        // line 48
        echo do_action("mailpoet_styles_admin_after");
        echo "

";
        // line 50
        $this->displayBlock('after_css', $context, $blocks);
        // line 51
        echo "
<script type=\"text/javascript\">
  var mailpoet_date_format = \"";
        // line 53
        echo \MailPoetVendor\twig_escape_filter($this->env, \MailPoetVendor\twig_escape_filter($this->env, $this->extensions['MailPoet\Twig\Functions']->getWPDateTimeFormat(), "js"), "html", null, true);
        echo "\";
  var mailpoet_time_format = \"";
        // line 54
        echo \MailPoetVendor\twig_escape_filter($this->env, \MailPoetVendor\twig_escape_filter($this->env, $this->extensions['MailPoet\Twig\Functions']->getWPTimeFormat(), "js"), "html", null, true);
        echo "\";
  var mailpoet_version = \"";
        // line 55
        echo $this->extensions['MailPoet\Twig\Functions']->getMailPoetVersion();
        echo "\";
  var mailpoet_locale = \"";
        // line 56
        echo $this->extensions['MailPoet\Twig\Functions']->getTwoLettersLocale();
        echo "\";
  var mailpoet_premium_version = ";
        // line 57
        echo json_encode($this->extensions['MailPoet\Twig\Functions']->getMailPoetPremiumVersion());
        echo ";
  var mailpoet_analytics_enabled = ";
        // line 58
        echo \MailPoetVendor\twig_escape_filter($this->env, json_encode(call_user_func_array($this->env->getFunction('is_analytics_enabled')->getCallable(), [])), "html", null, true);
        echo ";
  var mailpoet_analytics_data = ";
        // line 59
        echo json_encode(call_user_func_array($this->env->getFunction('get_analytics_data')->getCallable(), []));
        echo ";
  var mailpoet_analytics_public_id = ";
        // line 60
        echo json_encode(call_user_func_array($this->env->getFunction('get_analytics_public_id')->getCallable(), []));
        echo ";
  var mailpoet_analytics_new_public_id = ";
        // line 61
        echo \MailPoetVendor\twig_escape_filter($this->env, json_encode(call_user_func_array($this->env->getFunction('is_analytics_public_id_new')->getCallable(), [])), "html", null, true);
        echo ";
  var mailpoet_free_domains = ";
        // line 62
        echo json_encode($this->extensions['MailPoet\Twig\Functions']->getFreeDomains());
        echo ";
  var mailpoet_woocommerce_active = ";
        // line 63
        echo json_encode($this->extensions['MailPoet\Twig\Functions']->isWoocommerceActive());
        echo ";
  // RFC 5322 standard; http://emailregex.com/ combined with https://google.github.io/closure-library/api/goog.format.EmailAddress.html#isValid
  var mailpoet_email_regex = /(?=^[+a-zA-Z0-9_.!#\$%&'*\\/=?^`{|}~-]+@([a-zA-Z0-9-]+\\.)+[a-zA-Z0-9]{2,63}\$)(?=^(([^<>()\\[\\]\\\\.,;:\\s@\"]+(\\.[^<>()\\[\\]\\\\.,;:\\s@\"]+)*)|(\".+\"))@((\\[[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}])|(([a-zA-Z\\-0-9]+\\.)+[a-zA-Z]{2,})))/;
  var mailpoet_feature_flags = ";
        // line 66
        echo json_encode(($context["feature_flags"] ?? null));
        echo ";
  var mailpoet_referral_id = ";
        // line 67
        echo json_encode(($context["referral_id"] ?? null));
        echo ";
</script>

<!-- javascripts -->
";
        // line 71
        echo $this->extensions['MailPoet\Twig\Assets']->generateJavascript("vendor.js", "mailpoet.js");
        // line 74
        echo "

";
        // line 76
        echo $this->extensions['MailPoet\Twig\I18n']->localize(["ajaxFailedErrorMessage" => $this->extensions['MailPoet\Twig\I18n']->translate("An error has happened while performing a request, the server has responded with response code %d"), "senderEmailAddressWarning1" => $this->extensions['MailPoet\Twig\I18n']->translateWithContext("You might not reach the inbox of your subscribers if you use this email address.", "In the last step, before sending a newsletter. URL: ?page=mailpoet-newsletters#/send/2"), "senderEmailAddressWarning2" => $this->extensions['MailPoet\Twig\I18n']->translateWithContext("Use an address like %1\$s for the Sender and put %2\$s in the <em>Reply-to</em> field below.", "In the last step, before sending a newsletter. URL: ?page=mailpoet-newsletters#/send/2"), "senderEmailAddressWarning3" => $this->extensions['MailPoet\Twig\I18n']->translateWithContext("Read more."), "mailerSendingResumedNotice" => $this->extensions['MailPoet\Twig\I18n']->translate("Sending has been resumed."), "dismissNotice" => $this->extensions['MailPoet\Twig\I18n']->translate("Dismiss this notice."), "subscribersLimitNoticeTitle" => $this->extensions['MailPoet\Twig\I18n']->translate("Congratulations, you now have more than [subscribersLimit] subscribers!"), "freeVersionLimit" => $this->extensions['MailPoet\Twig\I18n']->translate("Our free version is limited to [subscribersLimit] subscribers."), "yourPlanLimit" => $this->extensions['MailPoet\Twig\I18n']->translate("Your plan is limited to [subscribersLimit] subscribers."), "youNeedToUpgrade" => $this->extensions['MailPoet\Twig\I18n']->translate("You need to upgrade now to be able to continue using MailPoet."), "upgradeNow" => $this->extensions['MailPoet\Twig\I18n']->translate("Upgrade Now"), "refreshMySubscribers" => $this->extensions['MailPoet\Twig\I18n']->translate("I’ve upgraded my subscription, refresh subscriber limit"), "setFromAddressModalTitle" => $this->extensions['MailPoet\Twig\I18n']->translate("It’s time to set your default FROM address!", "mailpoet"), "setFromAddressModalDescription" => $this->extensions['MailPoet\Twig\I18n']->translate("Set one of [link]your authorized email addresses[/link] as the default FROM email for your MailPoet emails.", "mailpoet"), "setFromAddressModalSave" => $this->extensions['MailPoet\Twig\I18n']->translate("Save", "mailpoet"), "setFromAddressEmailSuccess" => $this->extensions['MailPoet\Twig\I18n']->translate("Excellent. Your authorized email was saved. You can change it in the [link]Basics tab of the MailPoet settings[/link].", "mailpoet"), "setFromAddressEmailNotAuthorized" => $this->extensions['MailPoet\Twig\I18n']->translate("Can’t use this email yet! [link]Please authorize it first[/link].", "mailpoet"), "setFromAddressEmailUnknownError" => $this->extensions['MailPoet\Twig\I18n']->translate("An error occured when saving FROM email address.", "mailpoet"), "reviewRequestHeading" => $this->extensions['MailPoet\Twig\I18n']->translateWithContext("Thank you! Time to tell the world?", "After a user gives us positive feedback via the NPS poll, we ask them to review our plugin on WordPress.org."), "reviewRequestDidYouKnow" => $this->extensions['MailPoet\Twig\I18n']->translate("[username], did you know that hundreds of WordPress users read the reviews on the plugin repository? They’re also a source of inspiration for our team."), "reviewRequestUsingForDays" => $this->extensions['MailPoet\Twig\I18n']->pluralize("You’ve been using MailPoet for [days] day now, and we would love to read your own review.", "You’ve been using MailPoet for [days] days now, and we would love to read your own review.",         // line 100
($context["installed_days_ago"] ?? null)), "reviewRequestUsingForMonths" => $this->extensions['MailPoet\Twig\I18n']->pluralize("You’ve been using MailPoet for [months] month now, and we would love to read your own review.", "You’ve been using MailPoet for [months] months now, and we would love to read your own review.", \MailPoetVendor\twig_round((        // line 101
($context["installed_days_ago"] ?? null) / 30))), "reviewRequestRateUsNow" => $this->extensions['MailPoet\Twig\I18n']->translateWithContext("Rate us now", "Review our plugin on WordPress.org."), "reviewRequestNotNow" => $this->extensions['MailPoet\Twig\I18n']->translate("Not now"), "notSentYet" => $this->extensions['MailPoet\Twig\I18n']->translate("Not sent yet!")]);
        // line 106
        echo "
";
        // line 107
        $this->displayBlock('translations', $context, $blocks);
        // line 108
        echo "
";
        // line 109
        $this->displayBlock('after_translations', $context, $blocks);
        // line 110
        echo "
";
        // line 111
        echo $this->extensions['MailPoet\Twig\Assets']->generateJavascript("admin_vendor_chunk.js", "admin_vendor.js");
        // line 114
        echo "

";
        // line 116
        echo do_action("mailpoet_scripts_admin_before");
        echo "

";
        // line 118
        echo $this->extensions['MailPoet\Twig\Assets']->generateJavascript("admin.js");
        // line 120
        echo "

";
        // line 122
        echo $this->extensions['MailPoet\Twig\Assets']->generateJavascript("lib/analytics.js");
        echo "

";
        // line 124
        $context["helpscout_form_id"] = "1c666cab-c0f6-4614-bc06-e5d0ad78db2b";
        // line 125
        if ((\MailPoetVendor\twig_get_attribute($this->env, $this->source, \MailPoetVendor\twig_get_attribute($this->env, $this->source, ($context["mailpoet_api_key_state"] ?? null), "data", [], "any", false, false, false, 125), "support_tier", [], "any", false, false, false, 125) == "premium")) {
            // line 126
            echo "  ";
            $context["helpscout_form_id"] = "e93d0423-1fa6-4bbc-9df9-c174f823c35f";
        }
        // line 128
        echo "
<script type=\"text/javascript\">!function(e,t,n){function a(){var e=t.getElementsByTagName(\"script\")[0],n=t.createElement(\"script\");n.type=\"text/javascript\",n.async=!0,n.src=\"https://beacon-v2.helpscout.net\",e.parentNode.insertBefore(n,e)}if(e.Beacon=n=function(t,n,a){e.Beacon.readyQueue.push({method:t,options:n,data:a})},n.readyQueue=[],\"complete\"===t.readyState)return a();e.attachEvent?e.attachEvent(\"onload\",a):e.addEventListener(\"load\",a,!1)}(window,document,window.Beacon||function(){});</script>

<script type=\"text/javascript\"></script>

<script type=\"text/javascript\">
  if(window['Beacon'] !== undefined && window.hide_mailpoet_beacon !== true) {
    window.Beacon('init', '";
        // line 135
        echo \MailPoetVendor\twig_escape_filter($this->env, ($context["helpscout_form_id"] ?? null), "html", null, true);
        echo "');

    // HelpScout Beacon: Configuration
    window.Beacon(\"config\", {
      icon: 'message',
      zIndex: 50000,
      instructions: \"";
        // line 141
        echo $this->extensions['MailPoet\Twig\I18n']->translate("Want to give feedback to the MailPoet team? Contact us here. Please provide as much information as possible!");
        echo "\",
      showContactFields: true
    });

    // HelpScout Beacon: Custom information
    window.Beacon(\"identify\",
      ";
        // line 147
        echo json_encode($this->extensions['MailPoet\Twig\Helpscout']->getHelpscoutData());
        echo "
    );

    if (window.mailpoet_beacon_articles) {
      window.Beacon('suggest', window.mailpoet_beacon_articles)
    }
  }
</script>
<script>
  Parsley.addMessages('mailpoet', {
    defaultMessage: '";
        // line 157
        echo $this->extensions['MailPoet\Twig\I18n']->translate("This value seems to be invalid.");
        echo "',
    type: {
      email: '";
        // line 159
        echo $this->extensions['MailPoet\Twig\I18n']->translate("This value should be a valid email.");
        echo "',
      url: '";
        // line 160
        echo $this->extensions['MailPoet\Twig\I18n']->translate("This value should be a valid url.");
        echo "',
      number: '";
        // line 161
        echo $this->extensions['MailPoet\Twig\I18n']->translate("This value should be a valid number.");
        echo "',
      integer: '";
        // line 162
        echo $this->extensions['MailPoet\Twig\I18n']->translate("This value should be a valid integer.");
        echo "',
      digits: '";
        // line 163
        echo $this->extensions['MailPoet\Twig\I18n']->translate("This value should be digits.");
        echo "',
      alphanum: '";
        // line 164
        echo $this->extensions['MailPoet\Twig\I18n']->translate("This value should be alphanumeric.");
        echo "'
    },
    notblank: '";
        // line 166
        echo $this->extensions['MailPoet\Twig\I18n']->translate("This value should not be blank.");
        echo "',
    required: '";
        // line 167
        echo $this->extensions['MailPoet\Twig\I18n']->translate("This value is required.");
        echo "',
    pattern: '";
        // line 168
        echo $this->extensions['MailPoet\Twig\I18n']->translate("This value seems to be invalid.");
        echo "',
    min: '";
        // line 169
        echo $this->extensions['MailPoet\Twig\I18n']->translate("This value should be greater than or equal to %s.");
        echo "',
    max: '";
        // line 170
        echo $this->extensions['MailPoet\Twig\I18n']->translate("This value should be lower than or equal to %s.");
        echo "',
    range: '";
        // line 171
        echo $this->extensions['MailPoet\Twig\I18n']->translate("This value should be between %s and %s.");
        echo "',
    minlength: '";
        // line 172
        echo $this->extensions['MailPoet\Twig\I18n']->translate("This value is too short. It should have %s characters or more.");
        echo "',
    maxlength: '";
        // line 173
        echo $this->extensions['MailPoet\Twig\I18n']->translate("This value is too long. It should have %s characters or fewer.");
        echo "',
    length: '";
        // line 174
        echo $this->extensions['MailPoet\Twig\I18n']->translate("This value length is invalid. It should be between %s and %s characters long.");
        echo "',
    mincheck: '";
        // line 175
        echo $this->extensions['MailPoet\Twig\I18n']->translate("You must select at least %s choices.");
        echo "',
    maxcheck: '";
        // line 176
        echo $this->extensions['MailPoet\Twig\I18n']->translate("You must select %s choices or fewer.");
        echo "',
    check: '";
        // line 177
        echo $this->extensions['MailPoet\Twig\I18n']->translate("You must select between %s and %s choices.");
        echo "',
    equalto: '";
        // line 178
        echo $this->extensions['MailPoet\Twig\I18n']->translate("This value should be the same.");
        echo "'
  });

  Parsley.setLocale('mailpoet');
</script>
";
        // line 183
        $this->displayBlock('after_javascript', $context, $blocks);
        // line 184
        echo "<div id=\"mailpoet-modal\"></div>
";
    }

    // line 22
    public function block_templates($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 25
    public function block_container($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 26
        echo "<div class=\"wrap\">
  <!-- notices -->
  <div id=\"mailpoet_notice_error\" class=\"mailpoet_notice\" style=\"display:none;\"></div>
  <div id=\"mailpoet_notice_success\" class=\"mailpoet_notice\" style=\"display:none;\"></div>
  <!-- React notices -->
  <div id=\"mailpoet_notices\"></div>

  <!-- Set FROM address modal React root -->
  <div id=\"mailpoet_set_from_address_modal\"></div>

  <!-- title block -->
  ";
        // line 37
        $this->displayBlock('title', $context, $blocks);
        // line 38
        echo "  <!-- content block -->
  ";
        // line 39
        $this->displayBlock('content', $context, $blocks);
        // line 40
        echo "</div>
";
    }

    // line 37
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 39
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 50
    public function block_after_css($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 107
    public function block_translations($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 109
    public function block_after_translations($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    // line 183
    public function block_after_javascript($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    public function getTemplateName()
    {
        return "layout.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  411 => 183,  405 => 109,  399 => 107,  393 => 50,  387 => 39,  381 => 37,  376 => 40,  374 => 39,  371 => 38,  369 => 37,  356 => 26,  352 => 25,  346 => 22,  341 => 184,  339 => 183,  331 => 178,  327 => 177,  323 => 176,  319 => 175,  315 => 174,  311 => 173,  307 => 172,  303 => 171,  299 => 170,  295 => 169,  291 => 168,  287 => 167,  283 => 166,  278 => 164,  274 => 163,  270 => 162,  266 => 161,  262 => 160,  258 => 159,  253 => 157,  240 => 147,  231 => 141,  222 => 135,  213 => 128,  209 => 126,  207 => 125,  205 => 124,  200 => 122,  196 => 120,  194 => 118,  189 => 116,  185 => 114,  183 => 111,  180 => 110,  178 => 109,  175 => 108,  173 => 107,  170 => 106,  168 => 101,  167 => 100,  166 => 76,  162 => 74,  160 => 71,  153 => 67,  149 => 66,  143 => 63,  139 => 62,  135 => 61,  131 => 60,  127 => 59,  123 => 58,  119 => 57,  115 => 56,  111 => 55,  107 => 54,  103 => 53,  99 => 51,  97 => 50,  92 => 48,  88 => 46,  86 => 44,  82 => 42,  80 => 25,  76 => 23,  74 => 22,  61 => 11,  52 => 5,  47 => 2,  45 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "layout.html", "/home/u20s1035/dev_root/wp-content/plugins/mailpoet/views/layout.html");
    }
}
