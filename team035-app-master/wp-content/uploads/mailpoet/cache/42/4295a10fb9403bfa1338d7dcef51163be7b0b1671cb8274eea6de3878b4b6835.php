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

/* newsletter/templates/components/newsletterPreview.hbs */
class __TwigTemplate_75a6d5beb8f68d3ccde7b507a47895ef60078b5101a7f285fe8c876b0ed8e79f extends \MailPoetVendor\Twig\Template
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
        echo "<div class=\"mailpoet_browser_preview_link\">
  <a href=\"{{ previewUrl }}\" target=\"_blank\" rel=\"noopener noreferrer\">";
        // line 2
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Open in new tab", "Open email preview in new tab");
        echo "</a>
</div>
<div class=\"mailpoet_browser_preview_toggle\">
  <label>
    <input type=\"radio\" name=\"mailpoet_browser_preview_type\" class=\"mailpoet_browser_preview_type\" value=\"desktop\" {{#ifCond previewType '!=' 'mobile'}}CHECKED{{/ifCond}} />";
        // line 6
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Desktop", "Desktop browser preview mode");
        echo "
  </label>
  <label>
    <input type=\"radio\" name=\"mailpoet_browser_preview_type\" class=\"mailpoet_browser_preview_type\" value=\"mobile\" {{#ifCond previewType '==' 'mobile'}}CHECKED{{/ifCond}} />";
        // line 9
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Mobile", "Mobile browser preview mode");
        echo "
  </label>
</div>
<div class=\"mailpoet_browser_preview_container {{#ifCond previewType '==' 'mobile'}}mailpoet_browser_preview_container_mobile{{else}}mailpoet_browser_preview_container_desktop{{/ifCond}}\">
  <div class=\"mailpoet_browser_preview_border\">
    <iframe id=\"mailpoet_browser_preview_iframe\" class=\"mailpoet_browser_preview_iframe\" src=\"{{ previewUrl }}\" width=\"{{ width }}\" height=\"{{ height }}\"></iframe>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "newsletter/templates/components/newsletterPreview.hbs";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 9,  40 => 6,  33 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "newsletter/templates/components/newsletterPreview.hbs", "/home/u20s1035/dev_root/wp-content/plugins/mailpoet/views/newsletter/templates/components/newsletterPreview.hbs");
    }
}
