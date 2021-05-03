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

/* newsletter/templates/blocks/products/settingsSelection.hbs */
class __TwigTemplate_19cdec55b6e066f7f9729a1422d6275861445edcd629de43faa5f6deedabaa5e extends \MailPoetVendor\Twig\Template
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
        echo "<div class=\"mailpoet_settings_products_selection_controls\">
    <div class=\"mailpoet_product_selection_filter_row\">
        <input type=\"text\" name=\"\" class=\"mailpoet_input mailpoet_input_full mailpoet_products_search_term\" value=\"{{model.search}}\" placeholder=\"";
        // line 3
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Search...");
        echo "\" />
    </div>
    <div class=\"mailpoet_product_selection_filter_row\">
        <select class=\"mailpoet_select mailpoet_input_full mailpoet_products_post_status\">
            <option value=\"publish\" {{#ifCond model.postStatus '==' 'publish'}}SELECTED{{/ifCond}}>";
        // line 7
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Published");
        echo "</option>
            <option value=\"pending\" {{#ifCond model.postStatus '==' 'pending'}}SELECTED{{/ifCond}}>";
        // line 8
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Pending Review");
        echo "</option>
            <option value=\"draft\" {{#ifCond model.postStatus '==' 'draft'}}SELECTED{{/ifCond}}>";
        // line 9
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Draft");
        echo "</option>
        </select>
    </div>
    <div class=\"mailpoet_product_selection_filter_row\">
        <select class=\"mailpoet_select mailpoet_products_categories_and_tags\" multiple=\"multiple\">
          {{#each model.terms}}
            <option value=\"{{ id }}\" selected=\"selected\">{{ text }}</option>
          {{/each}}
        </select>
    </div>
</div>
<div class=\"mailpoet_product_selection_container\">
</div>
<div class=\"mailpoet_product_selection_loading\" style=\"visibility: hidden;\">
  ";
        // line 23
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Loading posts...");
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "newsletter/templates/blocks/products/settingsSelection.hbs";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 23,  49 => 9,  45 => 8,  41 => 7,  34 => 3,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "newsletter/templates/blocks/products/settingsSelection.hbs", "/home/u20s1035/dev_root/wp-content/plugins/mailpoet/views/newsletter/templates/blocks/products/settingsSelection.hbs");
    }
}
