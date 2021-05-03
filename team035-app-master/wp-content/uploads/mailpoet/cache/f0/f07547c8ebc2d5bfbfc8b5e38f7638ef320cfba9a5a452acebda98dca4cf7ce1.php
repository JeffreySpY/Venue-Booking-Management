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

/* newsletter/templates/components/history.hbs */
class __TwigTemplate_ba45f98ef371a4c54f820777d127ec4f89fba26c493657242caa96b971519874 extends \MailPoetVendor\Twig\Template
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
        echo "<div class=\"mailpoet_history_wrapper\">
  <a id=\"mailpoet-history-arrow-undo\" class=\"mailpoet_history_arrow\">
    <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"miter\" fill=\"none\">
      <path d=\"M5,17 L5,15 C5,10.0294373 8.80557963,6 13.5,6 C18.1944204,6 22,10.0294373 22,15\"/>
      <polyline points=\"8 15 5 18 2 15\"/>
    </svg>
  </a>

  <a id=\"mailpoet-history-arrow-redo\" class=\"mailpoet_history_arrow\">
    <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"miter\" fill=\"none\">
      <path d=\"M19,17 L19,15 C19,10.0294373 15.1944204,6 10.5,6 C5.80557963,6 2,10.0294373 2,15\"/>
      <polyline points=\"16 15 19 18 22 15\"/>
    </svg>
  </a>
</div>
";
    }

    public function getTemplateName()
    {
        return "newsletter/templates/components/history.hbs";
    }

    public function getDebugInfo()
    {
        return array (  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "newsletter/templates/components/history.hbs", "/home/u20s1035/dev_root/wp-content/plugins/mailpoet/views/newsletter/templates/components/history.hbs");
    }
}
