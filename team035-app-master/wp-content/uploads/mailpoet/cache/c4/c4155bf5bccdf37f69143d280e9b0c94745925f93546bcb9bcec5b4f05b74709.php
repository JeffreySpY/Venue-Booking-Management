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

/* newsletter/templates/components/heading.hbs */
class __TwigTemplate_7bd1be0a4eaf231ac2d2f1b6b245c74665dd9fa18226a3f93ebf8aae390d365f extends \MailPoetVendor\Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "{{#if isWoocommerceTransactional}}
  <h1>";
        // line 2
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Edit template for WooCommerce emails", "Name of user interface used to customize email template used for eCommerce related emails (for example order confirmation email)");
        echo "</h1>
  <p class=\"mailpoet_heading_wc_template_description\">";
        // line 3
        echo MailPoet\Util\Helpers::replaceLinkTags($this->env->getExtension('MailPoet\Twig\I18n')->translate("This email template will be used for all your WooCommerce emails. Meaning that any content added to this template will be visible in all WooCommerce emails. If you want to change email-specific content including titles, [link]visit WooCommerce settings[/link]."), "?page=wc-settings&tab=email", ["target" => "_blank"]);
        echo "</p>
  <div class=\"mailpoet_form_field mailpoet_heading_form_field\">
    <label for=\"mailpoet_heading_email_type\">";
        // line 5
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Load dummy data for email:", "Label of a dropdown used to switch between email type: order processing, order completed, ...");
        echo "</label>
    <select id=\"mailpoet_heading_email_type\">
      <option value=\"new_account\">";
        // line 7
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("New account", "woocommerce");
        echo "</option>
      <option value=\"processing_order\">";
        // line 8
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Processing order", "woocommerce");
        echo "</option>
      <option value=\"completed_order\" selected=\"selected\">";
        // line 9
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Completed order", "woocommerce");
        echo "</option>
      <option value=\"customer_note\">";
        // line 10
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Customer note", "woocommerce");
        echo "</option>
    </select>
  </div>
{{else}}
<div class=\"mailpoet_form_field mailpoet_heading_form_field\">
  <input
    type=\"text\"
    class=\"mailpoet_input mailpoet_input_title\"
    data-automation-id=\"newsletter_title\"
    value=\"{{ model.subject }}\"
    placeholder=\"";
        // line 20
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Click here to change the subject!");
        echo "\"
  />
  <span id=\"tooltip-designer-subject-line\" class=\"tooltip-help-designer-subject-line\"></span>
</div>
<div class=\"mailpoet_form_field mailpoet_heading_form_field\">
  <input type=\"text\"
    class=\"mailpoet_input mailpoet_input_preheader\"
    value=\"{{ model.preheader }}\"
    placeholder=\"";
        // line 28
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Preview text (usually displayed underneath the subject line in the inbox)");
        echo "\"
  />
  <span id=\"tooltip-designer-preheader\" class=\"tooltip-help-designer-preheader\"></span>
</div>
{{/if}}
";
    }

    public function getTemplateName()
    {
        return "newsletter/templates/components/heading.hbs";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 28,  72 => 20,  59 => 10,  55 => 9,  51 => 8,  47 => 7,  42 => 5,  37 => 3,  33 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "newsletter/templates/components/heading.hbs", "/home/u20s1035/dev_root/wp-content/plugins/mailpoet/views/newsletter/templates/components/heading.hbs");
    }
}
