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

/* newsletter/templates/blocks/products/settingsSinglePost.hbs */
class __TwigTemplate_31c20e0e28ae8946098c7e427b0ae1a9941feae1d19880360b47ab75e4d55cc0 extends \MailPoetVendor\Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<div class=\"mailpoet_settings_products_single_product\">
    <label>
        <input id=\"mailpoet_select_product_{{ index }}\" class=\"mailpoet_select_product_checkbox\" type=\"checkbox\" class=\"checkbox\" value=\"\" name=\"post_selection\">
        {{#ellipsis model.post_title 40 '...'}}{{/ellipsis}}
    </label>
</div>
";
    }

    public function getTemplateName()
    {
        return "newsletter/templates/blocks/products/settingsSinglePost.hbs";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "newsletter/templates/blocks/products/settingsSinglePost.hbs", "/home/u20s1035/dev_root/wp-content/plugins/mailpoet/views/newsletter/templates/blocks/products/settingsSinglePost.hbs");
    }
}
