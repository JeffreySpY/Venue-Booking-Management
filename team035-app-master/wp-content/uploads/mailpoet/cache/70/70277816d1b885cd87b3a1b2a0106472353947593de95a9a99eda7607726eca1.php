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

/* newsletter/templates/components/sidebar/styles.hbs */
class __TwigTemplate_c6cf0d2716f78c1e5b868bc876b7840911555ad3d43d94620d06f802fd838474 extends \MailPoetVendor\Twig\Template
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
        echo "<div class=\"handlediv\" title=\"";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Click to toggle");
        echo "\"><br></div>
<h3>";
        // line 2
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Styles");
        echo "</h3>
<div class=\"mailpoet_region_content\">
    <form id=\"mailpoet_newsletter_styles\" action=\"\" method=\"post\" accept-charset=\"utf-8\">
        {{#if isWoocommerceTransactional}}
            <div class=\"mailpoet_form_field\">
                <span>
                    <span><input type=\"text\" class=\"mailpoet_color\" size=\"6\" maxlength=\"6\" name=\"wc-branding-color\" value=\"{{ model.woocommerce.brandingColor }}\" id=\"mailpoet_wc_branding_color\"></span>
                </span>";
        // line 9
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Branding color");
        echo "
            </div>
            <hr />
        {{/if}}
        <div class=\"mailpoet_form_field mailpoet_form_narrow_select2\">
            <span>
                <span><input type=\"text\" class=\"mailpoet_color\" size=\"6\" maxlength=\"6\" name=\"text-color\" value=\"{{ model.text.fontColor }}\" id=\"mailpoet_text_font_color\"></span>
            </span>
            <select id=\"mailpoet_text_font_family\" name=\"text-family\" class=\"mailpoet_font_family mailpoet_select mailpoet_select_medium\">
            <optgroup label=\"";
        // line 18
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Standard fonts");
        echo "\">
            {{#each availableStyles.fonts.standard}}
                <option value=\"{{ this }}\" {{#ifCond this '==' ../model.text.fontFamily}}SELECTED{{/ifCond}}>{{ this }}</option>
            {{/each}}
            </optgroup>
            <optgroup label=\"";
        // line 23
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Custom fonts");
        echo "\">
            {{#each availableStyles.fonts.custom}}
                <option value=\"{{ this }}\" {{#ifCond this '==' ../model.text.fontFamily}}SELECTED{{/ifCond}}>{{ this }}</option>
            {{/each}}
            </optgroup>
            </select>
            <select id=\"mailpoet_text_font_size\" name=\"text-size\" class=\"mailpoet_font_size mailpoet_select mailpoet_select_small\">
            {{#each availableStyles.textSizes}}
                <option value=\"{{ this }}\" {{#ifCond this '==' ../model.text.fontSize}}SELECTED{{/ifCond}}>{{ this }}</option>
            {{/each}}
            </select> ";
        // line 33
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Text");
        echo "
        </div>
        {{#unless isWoocommerceTransactional}}
          <div class=\"mailpoet_form_field mailpoet_form_narrow_select2\">
              <span>
                  <span><input type=\"text\" class=\"mailpoet_color\" size=\"6\" maxlength=\"6\" name=\"h1-color\" value=\"{{ model.h1.fontColor }}\" id=\"mailpoet_h1_font_color\"></span>
              </span>
              <select id=\"mailpoet_h1_font_family\" name=\"h1-family\" class=\"mailpoet_font_family mailpoet_select mailpoet_select_medium\">
              <optgroup label=\"";
        // line 41
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Standard fonts");
        echo "\">
              {{#each availableStyles.fonts.standard}}
                  <option value=\"{{ this }}\" {{#ifCond this '==' ../model.h1.fontFamily}}SELECTED{{/ifCond}}>{{ this }}</option>
              {{/each}}
              </optgroup>
              <optgroup label=\"";
        // line 46
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Custom fonts");
        echo "\">
              {{#each availableStyles.fonts.custom}}
                  <option value=\"{{ this }}\" {{#ifCond this '==' ../model.h1.fontFamily}}SELECTED{{/ifCond}}>{{ this }}</option>
              {{/each}}
              </optgroup>
              </select>
              <select id=\"mailpoet_h1_font_size\" name=\"h1-size\" class=\"mailpoet_font_size mailpoet_select mailpoet_select_small\">
              {{#each availableStyles.headingSizes}}
                  <option value=\"{{ this }}\" {{#ifCond this '==' ../model.h1.fontSize}}SELECTED{{/ifCond}}>{{ this }}</option>
              {{/each}}
              </select> ";
        // line 56
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Heading 1");
        echo "
          </div>
          <div class=\"mailpoet_form_field mailpoet_form_narrow_select2\">
              <span>
                  <span><input type=\"text\" class=\"mailpoet_color\" size=\"6\" maxlength=\"6\" name=\"h2-color\" value=\"{{ model.h2.fontColor }}\" id=\"mailpoet_h2_font_color\"></span>
              </span>
              <select id=\"mailpoet_h2_font_family\" name=\"h2-family\" class=\"mailpoet_font_family mailpoet_select mailpoet_select_medium\">
              <optgroup label=\"";
        // line 63
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Standard fonts");
        echo "\">
              {{#each availableStyles.fonts.standard}}
                  <option value=\"{{ this }}\" {{#ifCond this '==' ../model.h2.fontFamily}}SELECTED{{/ifCond}}>{{ this }}</option>
              {{/each}}
              </optgroup>
              <optgroup label=\"";
        // line 68
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Custom fonts");
        echo "\">
              {{#each availableStyles.fonts.custom}}
                  <option value=\"{{ this }}\" {{#ifCond this '==' ../model.h2.fontFamily}}SELECTED{{/ifCond}}>{{ this }}</option>
              {{/each}}
              </optgroup>
              </select>
              <select id=\"mailpoet_h2_font_size\" name=\"h2-size\" class=\"mailpoet_font_size mailpoet_select mailpoet_select_small\">
              {{#each availableStyles.headingSizes}}
                  <option value=\"{{ this }}\" {{#ifCond this '==' ../model.h2.fontSize}}SELECTED{{/ifCond}}>{{ this }}</option>
              {{/each}}
              </select> ";
        // line 78
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Heading 2");
        echo "
          </div>
          <div class=\"mailpoet_form_field mailpoet_form_narrow_select2\">
              <span>
                  <span><input type=\"text\" class=\"mailpoet_color\" size=\"6\" maxlength=\"6\" name=\"h3-color\" value=\"{{ model.h3.fontColor }}\" id=\"mailpoet_h3_font_color\"></span>
              </span>
              <select id=\"mailpoet_h3_font_family\" name=\"h3-family\" class=\"mailpoet_font_family mailpoet_select mailpoet_select_medium\">
              <optgroup label=\"";
        // line 85
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Standard fonts");
        echo "\">
              {{#each availableStyles.fonts.standard}}
                  <option value=\"{{ this }}\" {{#ifCond this '==' ../model.h3.fontFamily}}SELECTED{{/ifCond}}>{{ this }}</option>
              {{/each}}
              </optgroup>
              <optgroup label=\"";
        // line 90
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Custom fonts");
        echo "\">
              {{#each availableStyles.fonts.custom}}
                  <option value=\"{{ this }}\" {{#ifCond this '==' ../model.h3.fontFamily}}SELECTED{{/ifCond}}>{{ this }}</option>
              {{/each}}
              </optgroup>
              </select>
              <select id=\"mailpoet_h3_font_size\" name=\"h3-size\" class=\"mailpoet_font_size mailpoet_select mailpoet_select_small\">
              {{#each availableStyles.headingSizes}}
                  <option value=\"{{ this }}\" {{#ifCond this '==' ../model.h3.fontSize}}SELECTED{{/ifCond}}>{{ this }}</option>
              {{/each}}
              </select> ";
        // line 100
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Heading 3");
        echo "
          </div>
          <div class=\"mailpoet_form_field mailpoet_form_narrow_select2\">
              <span>
                  <span><input type=\"text\" class=\"mailpoet_color\" size=\"6\" maxlength=\"6\" name=\"link-color\" value=\"{{ model.link.fontColor }}\" id=\"mailpoet_a_font_color\"></span>
              </span>";
        // line 105
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Links");
        echo " <label><input type=\"checkbox\" name=\"underline\" value=\"underline\" id=\"mailpoet_a_font_underline\" {{#ifCond model.link.textDecoration '==' 'underline'}}CHECKED{{/ifCond}} class=\"mailpoet_option_offset_left_small\"/> ";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Underline");
        echo "</label>
          </div>
          <hr />
          <div class=\"mailpoet_form_field\">
              <label>
              ";
        // line 110
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Text line height");
        echo "
              <select id=\"mailpoet_text_line_height\" name=\"text-line-height\">
              {{#each availableStyles.lineHeights}}
                  <option value=\"{{ this }}\" {{#ifCond this '==' ../model.text.lineHeight}}SELECTED{{/ifCond}}>{{ this }}</option>
              {{/each}}
              </select>
              </label>
          </div>
          <div class=\"mailpoet_form_field\">
              <label>
              ";
        // line 120
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Heading line height");
        echo "
              <select id=\"mailpoet_heading_line_height\" name=\"heading-line-height\">
              {{#each availableStyles.lineHeights}}
                  {{!-- Checking against h1 only since all headings have the same line height value. --}}
                  <option value=\"{{ this }}\" {{#ifCond this '==' ../model.h1.lineHeight}}SELECTED{{/ifCond}}>{{ this }}</option>
              {{/each}}
              </select>
              </label>
          </div>
        {{/unless}}
        <hr />
        <div class=\"mailpoet_form_field\">
            <span>
                <span><input type=\"text\" class=\"mailpoet_color\" size=\"6\" maxlength=\"6\" name=\"newsletter-color\" value=\"{{ model.wrapper.backgroundColor }}\" id=\"mailpoet_newsletter_background_color\"></span>
            </span>";
        // line 134
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Content background");
        echo "
        </div>
        <div class=\"mailpoet_form_field\">
            <span>
                <span><input type=\"text\" class=\"mailpoet_color\" size=\"6\" maxlength=\"6\" name=\"background-color\" value=\"{{ model.body.backgroundColor }}\" id=\"mailpoet_background_color\"></span>
            </span>";
        // line 139
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Global background");
        echo "
        </div>
    </form>
    <p class=\"mailpoet_settings_notice\">";
        // line 142
        echo MailPoet\Util\Helpers::replaceLinkTags($this->env->getExtension('MailPoet\Twig\I18n')->translate("If an email client [link]does not support a custom web font[/link], a similar standard font will be used instead."), "https://kb.mailpoet.com/article/176-which-fonts-can-be-used-in-mailpoet#custom-web-fonts", ["target" => "_blank", "data-beacon-article" => "586b882690336009736c1455"]);
        echo "</p>
</div>
<script type=\"text/javascript\">
    fontsSelect('.mailpoet_font_family.mailpoet_select');
</script>
";
    }

    public function getTemplateName()
    {
        return "newsletter/templates/components/sidebar/styles.hbs";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  234 => 142,  228 => 139,  220 => 134,  203 => 120,  190 => 110,  180 => 105,  172 => 100,  159 => 90,  151 => 85,  141 => 78,  128 => 68,  120 => 63,  110 => 56,  97 => 46,  89 => 41,  78 => 33,  65 => 23,  57 => 18,  45 => 9,  35 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "newsletter/templates/components/sidebar/styles.hbs", "/home/u20s1035/dev_root/wp-content/plugins/mailpoet/views/newsletter/templates/components/sidebar/styles.hbs");
    }
}
