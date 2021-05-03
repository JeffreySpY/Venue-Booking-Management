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

/* newsletter/templates/components/save.hbs */
class __TwigTemplate_84aec8bba3b59c1b2d101675f533bda3f19974651105c15bfc1f0671bde23ae3 extends \MailPoetVendor\Twig\Template
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
        echo "<div class=\"mailpoet_save_wrapper {{ wrapperClass }}\">
{{#if isWoocommerceTransactional}}
    <div class=\"mailpoet_save_button_group\">
        <input type=\"button\" name=\"save\" value=\"";
        // line 4
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Save");
        echo "\" class=\"button button-primary mailpoet_save_button\" />
    </div>
    <div class=\"clearfix\"></div>
    <div class=\"mailpoet_editor_messages\">
        <div class=\"mailpoet_save_error\"></div>
        <div class=\"mailpoet_editor_last_saved\">
            &nbsp;
            <span class=\"mailpoet_autosaved_message mailpoet_hidden\">";
        // line 11
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Autosaved");
        echo "</span>
            <span class=\"mailpoet_autosaved_at mailpoet_hidden\"></span>
        </div>
    </div>
    <div class=\"clearfix\"></div>
    <div class=\"mailpoet_save_woocommerce_customizer_disabled{{#if woocommerceCustomizerEnabled}} mailpoet_hidden{{/if}}\">
      <div class=\"mailpoet_save_woocommerce_error\">";
        // line 17
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("The usage of this email template for your WooCommerce emails is not yet activated.");
        echo "</div>
      <input type=\"button\" name=\"activate_wc_customizer\" value=\"";
        // line 18
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Activate now");
        echo "\" class=\"button button-primary mailpoet_save_activate_wc_customizer_button\" style=\"margin-top: 17px\">
    </div>
{{else}}
    <input type=\"button\" name=\"next\" value=\"";
        // line 21
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Next");
        echo "\" class=\"button button-primary mailpoet_save_next\" />
    <div class=\"mailpoet_button_group mailpoet_save_button_group\">
        <input type=\"button\" name=\"save\" value=\"";
        // line 23
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Save");
        echo "\" class=\"button button-primary mailpoet_save_button\" /><button class=\"button button-primary mailpoet_save_show_options\" data-automation-id=\"newsletter_save_options_toggle\" ><span class=\"dashicons mailpoet_save_show_options_icon\"></span></button>
    </div>
    <div class=\"clearfix\"></div>
    <div class=\"mailpoet_editor_messages\">
        <div class=\"mailpoet_save_error\"></div>
        <div class=\"mailpoet_editor_last_saved\">
            &nbsp;
            <span class=\"mailpoet_autosaved_message mailpoet_hidden\">";
        // line 30
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Autosaved");
        echo "</span>
            <span class=\"mailpoet_autosaved_at mailpoet_hidden\"></span>
        </div>
    </div>
    <ul class=\"mailpoet_save_options mailpoet_hidden\">
        <li class=\"mailpoet_save_option\"><a href=\"javascript:;\" class=\"mailpoet_save_template\" data-automation-id=\"newsletter_save_as_template_option\">";
        // line 35
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Save as template");
        echo "</a></li>
        <li class=\"mailpoet_save_option\"><a href=\"javascript:;\" class=\"mailpoet_save_export\">";
        // line 36
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Export as template");
        echo "</a></li>
    </ul>
    <div class=\"clearfix\"></div>
    <div class=\"mailpoet_save_as_template_container mailpoet_hidden\">
        <p><b class=\"mailpoet_save_as_template_title\">";
        // line 40
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Save as template");
        echo "</b></p>
        <p><input type=\"text\" name=\"template_name\" value=\"\" placeholder=\"";
        // line 41
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Insert template name");
        echo "\" class=\"mailpoet_input mailpoet_save_as_template_name\" /></p>
        <p><input type=\"button\" name=\"save_as_template\" value=\"";
        // line 42
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Save as template");
        echo "\" class=\"button button-primary mailpoet_button_full mailpoet_save_as_template\" data-automation-id=\"newsletter_save_as_template_button\" /></p>
    </div>
    <div class=\"mailpoet_export_template_container mailpoet_hidden\">
        <p><b class=\"mailpoet_export_template_title\">";
        // line 45
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Export template");
        echo "</b></p>
        <p><input type=\"text\" name=\"export_template_name\" value=\"\" placeholder=\"";
        // line 46
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Template name");
        echo "\" class=\"mailpoet_input mailpoet_export_template_name\" /></p>
        <p><input type=\"button\" name=\"export_template\" value=\"";
        // line 47
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Export template");
        echo "\" class=\"button button-primary mailpoet_button_full mailpoet_export_template\" /></p>
    </div>
{{/if}}
</div>
";
    }

    public function getTemplateName()
    {
        return "newsletter/templates/components/save.hbs";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  120 => 47,  116 => 46,  112 => 45,  106 => 42,  102 => 41,  98 => 40,  91 => 36,  87 => 35,  79 => 30,  69 => 23,  64 => 21,  58 => 18,  54 => 17,  45 => 11,  35 => 4,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "newsletter/templates/components/save.hbs", "/home/u20s1035/dev_root/wp-content/plugins/mailpoet/views/newsletter/templates/components/save.hbs");
    }
}
