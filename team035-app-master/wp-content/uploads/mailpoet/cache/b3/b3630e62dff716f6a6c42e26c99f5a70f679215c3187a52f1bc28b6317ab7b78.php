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

/* newsletter/templates/components/sidebar/preview.hbs */
class __TwigTemplate_520d16e68305234ab4ca5ddfbd74fef566a0a04e4c03a900638e926f99c0e24d extends \MailPoetVendor\Twig\Template
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
        echo "<div class=\"handlediv\" title=\"Click to toggle\"><br></div>
<h3 data-automation-id=\"sidebar_preview_region_heading\">";
        // line 2
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Preview");
        echo "</h3>
<div class=\"mailpoet_region_content\">
    <iframe name=\"mailpoet_save_preview_email_for_autocomplete\" style=\"display:none\" src=\"about:blank\"></iframe>
    <form target=\"mailpoet_save_preview_email_for_autocomplete\">
      <div class=\"mailpoet_form_field\">
          <label>
              ";
        // line 8
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Send preview to");
        echo "<br />
              <input id=\"mailpoet_preview_to_email\" class=\"mailpoet_input mailpoet_input_full\" type=\"text\" name=\"to_email\" value=\"";
        // line 9
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute(($context["current_wp_user"] ?? null), "email", []), "html", null, true);
        echo "\" autocomplete=\"email\" />
          </label>
      </div>

      <div class=\"mailpoet_form_field relative-holder\">
        <input type=\"submit\" id=\"mailpoet_send_preview\" class=\"button button-primary mailpoet_button_full\" value=\"";
        // line 14
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Send preview");
        echo "\" />
        <span id=\"tooltip-send-preview\" class=\"tooltip-help-send-preview\"></span>
      </div>
    </form>

    {{#if mssKeyPendingApproval }}
    <div class=\"mailpoet_error\">
      ";
        // line 21
        echo MailPoet\Util\Helpers::replaceLinkTags($this->env->getExtension('MailPoet\Twig\I18n')->translate("You’ll soon be able to send once our team reviews your account. In the meantime, you can send previews to [link]your authorized emails[/link]."), "https://account.mailpoet.com/authorization", ["target" => "_blank", "rel" => "noopener noreferrer"]);
        echo "
    </div>
    {{/if}}

    <hr class=\"mailpoet_separator\" />

    <input type=\"button\" name=\"preview\" class=\"button button-primary mailpoet_button_full mailpoet_show_preview\" value=\"";
        // line 27
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("View in browser");
        echo "\" />
</div>
";
    }

    public function getTemplateName()
    {
        return "newsletter/templates/components/sidebar/preview.hbs";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 27,  64 => 21,  54 => 14,  46 => 9,  42 => 8,  33 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "newsletter/templates/components/sidebar/preview.hbs", "/home/u20s1035/dev_root/wp-content/plugins/mailpoet/views/newsletter/templates/components/sidebar/preview.hbs");
    }
}
