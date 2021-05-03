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

/* automatic_emails.html */
class __TwigTemplate_5eb346a0186d364aace7c1aecef36752ac5c7f0feb4a100c65b82b1e250ebd2f extends \MailPoetVendor\Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'translations' => [$this, 'block_translations'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<script type=\"text/javascript\">
  var mailpoet_woocommerce_automatic_emails = ";
        // line 2
        echo json_encode(($context["automatic_emails"] ?? null));
        echo ";
  var mailpoet_woocommerce_optin_on_checkout = \"";
        // line 3
        echo \MailPoetVendor\twig_escape_filter($this->env, ($context["woocommerce_optin_on_checkout"] ?? null), "html", null, true);
        echo "\";
</script>

";
        // line 6
        $this->displayBlock('translations', $context, $blocks);
    }

    public function block_translations($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo "  ";
        echo $this->extensions['MailPoet\Twig\I18n']->localize(["automaticEmail" => $this->extensions['MailPoet\Twig\I18n']->translate("Automatic Email"), "tip" => $this->extensions['MailPoet\Twig\I18n']->translate("Tip:"), "selectAutomaticEmailsEventsConditionsHeading" => $this->extensions['MailPoet\Twig\I18n']->translate("Select %1s events conditions"), "sendAutomaticEmailWhenHeading" => $this->extensions['MailPoet\Twig\I18n']->translate("Send this %1s Automatic Email when..."), "automaticEmailActivated" => $this->extensions['MailPoet\Twig\I18n']->translate("Your %1s Automatic Email is now activated!"), "automaticEmailActivationFailed" => $this->extensions['MailPoet\Twig\I18n']->translate("Your %1s Automatic Email could not be activated, please check the settings."), "automaticEmailEventOptionsNotConfigured" => $this->extensions['MailPoet\Twig\I18n']->translate("You need to configure email options before this email can be sent."), "sentToXCustomers" => $this->extensions['MailPoet\Twig\I18n']->translate("Sent to %\$1d customers"), "wooCommerceEmailsWarning" => $this->extensions['MailPoet\Twig\I18n']->translate("WooCommerce emails won’t be sent to new customers because the opt-in on checkout is disabled. Enable it so they can immediately get your emails after their first purchase."), "wooCommerceEmailsWarningLink" => $this->extensions['MailPoet\Twig\I18n']->translate("Edit WooCommerce settings")]);
        // line 18
        echo "
";
    }

    public function getTemplateName()
    {
        return "automatic_emails.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 18,  58 => 7,  51 => 6,  45 => 3,  41 => 2,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "automatic_emails.html", "/home/u20s1035/dev_root/wp-content/plugins/mailpoet/views/automatic_emails.html");
    }
}
