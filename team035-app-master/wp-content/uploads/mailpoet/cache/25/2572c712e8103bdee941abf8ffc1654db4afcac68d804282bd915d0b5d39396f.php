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

/* newsletter/templates/blocks/products/settings.hbs */
class __TwigTemplate_d2b447f4775a302f99393ab3bab5020789f303994752d24bea773040f357d68d extends \MailPoetVendor\Twig\Template
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
        echo "<h3>";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Product selection");
        echo "</h3>
<div class=\"mailpoet_settings_products_selection\"></div>
<div class=\"mailpoet_settings_products_display_options mailpoet_closed\"></div>
<div class=\"mailpoet_settings_products_controls\">
  <div class=\"mailpoet_form_field\">
      <a href=\"javascript:;\" class=\"mailpoet_settings_products_show_product_selection mailpoet_hidden\">";
        // line 6
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Back to selection");
        echo "</a>
      <a href=\"javascript:;\" class=\"mailpoet_settings_products_show_display_options\">";
        // line 7
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Display options");
        echo "</a>
  </div>
  <input type=\"button\" class=\"button button-primary mailpoet_settings_products_insert_selected\" value=\"";
        // line 9
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("Insert selected"), "html_attr");
        echo "\" />
</div>
";
    }

    public function getTemplateName()
    {
        return "newsletter/templates/blocks/products/settings.hbs";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 9,  43 => 7,  39 => 6,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "newsletter/templates/blocks/products/settings.hbs", "/home/u20s1035/dev_root/wp-content/plugins/mailpoet/views/newsletter/templates/blocks/products/settings.hbs");
    }
}
