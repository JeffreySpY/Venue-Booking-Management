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

/* newsletter/templates/blocks/divider/block.hbs */
class __TwigTemplate_5365841c2b4f60dc897cbec3c8fe9b294593896e0690be0885bbc65779b69fc9 extends \MailPoetVendor\Twig\Template
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
        echo "<div class=\"mailpoet_tools\"></div>
<div class=\"mailpoet_content\" data-automation-id=\"divider\" style=\"padding: {{ model.styles.block.padding }} 0; background-color: {{ model.styles.block.backgroundColor }};\">
    <div class=\"mailpoet_divider\" style=\"border-top-width: {{ model.styles.block.borderWidth }}; border-top-style: {{ model.styles.block.borderStyle }}; border-top-color: {{ model.styles.block.borderColor }};\"></div>
    <div class=\"mailpoet_resize_handle_container\">
        <div class=\"mailpoet_resize_handle\" data-automation-id=\"divider_resize_handle\">
            <span class=\"mailpoet_resize_handle_text\">{{ totalHeight }}</span>
            <span class=\"mailpoet_resize_handle_icon\">";
        // line 7
        echo \MailPoetVendor\twig_source($this->env, "newsletter/templates/svg/block-icons/spacer.svg");
        echo "</span>
        </div>
    </div>
</div>
<div class=\"mailpoet_block_highlight\"></div>
";
    }

    public function getTemplateName()
    {
        return "newsletter/templates/blocks/divider/block.hbs";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 7,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "newsletter/templates/blocks/divider/block.hbs", "/home/u20s1035/dev_root/wp-content/plugins/mailpoet/views/newsletter/templates/blocks/divider/block.hbs");
    }
}
