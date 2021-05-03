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

/* newsletter/templates/blocks/image/block.hbs */
class __TwigTemplate_ddc3f2f0ca3d38527ba33a5b8329b07dfd0eb8505decf6490c718e3796bfe8fe extends \MailPoetVendor\Twig\Template
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
<div class=\"mailpoet_content\" style=\"{{#ifCond model.styles.block.textAlign '==' 'left'}}margin: 0 auto 0 0; {{/ifCond}}{{#ifCond model.styles.block.textAlign '==' 'center'}}margin: auto; {{/ifCond}}{{#ifCond model.styles.block.textAlign '==' 'right'}}margin: 0 0 0 auto; {{/ifCond}}width: {{model.width}}\">
\t<div class=\"mailpoet_image\">
\t\t<a href=\"{{ model.link }}\" onClick=\"return false;\">
\t\t\t<img src=\"{{#ifCond model.src '!=' ''}}{{ model.src }}{{ else }}{{ imageMissingSrc }}{{/ifCond}}\" alt=\"{{ model.alt }}\" onerror=\"if(this.src != '{{ imageMissingSrc }}') {this.src = '{{ imageMissingSrc }}';}\" width=\"{{model.width}}\" />
\t\t</a>
\t\t<div class=\"mailpoet_image_resize_handle_container{{#ifCond model.styles.block.textAlign '==' 'right'}} mailpoet_image_resize_handle_container_left{{/ifCond}}\">
\t\t    <div class=\"mailpoet_image_resize_handle\">
\t\t        <span class=\"mailpoet_image_resize_handle_icon\">";
        // line 9
        echo \MailPoetVendor\twig_source($this->env, "newsletter/templates/svg/block-tools/resize.svg");
        echo "</span>
\t\t    </div>
\t\t</div>
\t</div>
</div>
<div class=\"mailpoet_block_highlight\"></div>
";
    }

    public function getTemplateName()
    {
        return "newsletter/templates/blocks/image/block.hbs";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 9,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "newsletter/templates/blocks/image/block.hbs", "/home/u20s1035/dev_root/wp-content/plugins/mailpoet/views/newsletter/templates/blocks/image/block.hbs");
    }
}
