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

/* newsletter/templates/blocks/footer/settings.hbs */
class __TwigTemplate_a7bb0b25d2e9486b03ee470d739f8b8424265fe762b6184372d0abc3c1b6a8e6 extends \MailPoetVendor\Twig\Template
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
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Footer");
        echo "</h3>
<div class=\"mailpoet_form_field mailpoet_form_narrow_select2\">
    <div class=\"mailpoet_form_field_input_option\">
        <input type=\"text\" name=\"font-color\" id=\"mailpoet_field_footer_text_color\" class=\"mailpoet_field_footer_text_color mailpoet_color\" value=\"{{ model.styles.text.fontColor }}\" />
        <select id=\"mailpoet_field_footer_text_font_family\" name=\"font-family\" class=\"mailpoet_select mailpoet_select_medium mailpoet_field_footer_text_font_family mailpoet_font_family\">
        <optgroup label=\"";
        // line 6
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Standard fonts");
        echo "\">
        {{#each availableStyles.fonts.standard}}
            <option value=\"{{ this }}\" {{#ifCond this '==' ../model.styles.text.fontFamily}}SELECTED{{/ifCond}}>{{ this }}</option>
        {{/each}}
        </optgroup>
        <optgroup label=\"";
        // line 11
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Custom fonts");
        echo "\">
        {{#each availableStyles.fonts.custom}}
            <option value=\"{{ this }}\" {{#ifCond this '==' ../model.styles.text.fontFamily}}SELECTED{{/ifCond}}>{{ this }}</option>
        {{/each}}
        </optgroup>
        </select>
        <select id=\"mailpoet_field_footer_text_size\" name=\"font-size\" class=\"mailpoet_select mailpoet_select_small mailpoet_field_footer_text_size mailpoet_font_size\">
        {{#each availableStyles.textSizes}}
            <option value=\"{{ this }}\" {{#ifCond this '==' ../model.styles.text.fontSize}}SELECTED{{/ifCond}}>{{ this }}</option>
        {{/each}}
        </select>
    </div>
    <div class=\"mailpoet_form_field_title mailpoet_form_field_title_inline\">";
        // line 23
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Text");
        echo "</div>
</div>
<div class=\"mailpoet_form_field\">
    <div class=\"mailpoet_form_field_input_option\">
        <input type=\"text\" class=\"mailpoet_color\" size=\"6\" maxlength=\"6\" name=\"link-color\" value=\"{{ model.styles.link.fontColor }}\" id=\"mailpoet_field_footer_link_color\" />
    </div>
    <div class=\"mailpoet_form_field_title mailpoet_form_field_title_inline\">";
        // line 29
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Links");
        echo "</div>
    <label>
        <div class=\"mailpoet_form_field_checkbox_option mailpoet_option_offset_left_small\">
            <input type=\"checkbox\" name=\"underline\" value=\"underline\" id=\"mailpoet_field_footer_link_underline\" {{#ifCond model.styles.link.textDecoration '==' 'underline'}}CHECKED{{/ifCond}}/> ";
        // line 32
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Underline");
        echo "
        </div>
    </label>
</div>

<div class=\"mailpoet_form_field\">
    <div class=\"mailpoet_form_field_input_option\">
        <input type=\"text\" name=\"background-color\" class=\"mailpoet_field_footer_background_color mailpoet_color\" value=\"{{ model.styles.block.backgroundColor }}\" />
    </div>
    <div class=\"mailpoet_form_field_title mailpoet_form_field_title_inline\">";
        // line 41
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Background");
        echo "</div>
</div>

<div class=\"mailpoet_form_field\">
    <div class=\"mailpoet_form_field_radio_option\">
        <label>
        <input type=\"radio\" name=\"alignment\" class=\"mailpoet_field_footer_alignment\" value=\"left\" {{#ifCond model.styles.text.textAlign '===' 'left'}}CHECKED{{/ifCond}}/>
        ";
        // line 48
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Left");
        echo "
        </label>
    </div>
    <div class=\"mailpoet_form_field_radio_option\">
        <label>
            <input type=\"radio\" name=\"alignment\" class=\"mailpoet_field_footer_alignment\" value=\"center\" {{#ifCond model.styles.text.textAlign '===' 'center'}}CHECKED{{/ifCond}}/>
            ";
        // line 54
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Center");
        echo "
        </label>
    </div>
    <div class=\"mailpoet_form_field_radio_option\">
        <label>
            <input type=\"radio\" name=\"alignment\" class=\"mailpoet_field_footer_alignment\" value=\"right\" {{#ifCond model.styles.text.textAlign '===' 'right'}}CHECKED{{/ifCond}}/>
            ";
        // line 60
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Right");
        echo "
        </label>
    </div>
</div>

<div class=\"mailpoet_form_field\">
    <input type=\"button\" class=\"button button-primary mailpoet_done_editing\" data-automation-id=\"footer_done_button\" value=\"";
        // line 66
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("Done"), "html_attr");
        echo "\" />
</div>

<p class=\"mailpoet_settings_notice\">";
        // line 69
        echo MailPoet\Util\Helpers::replaceLinkTags($this->env->getExtension('MailPoet\Twig\I18n')->translate("If an email client [link]does not support a custom web font[/link], a similar standard font will be used instead."), "https://kb.mailpoet.com/article/176-which-fonts-can-be-used-in-mailpoet#custom-web-fonts", ["target" => "_blank", "data-beacon-article" => "586b882690336009736c1455"]);
        echo "</p>

<script type=\"text/javascript\">
    fontsSelect('#mailpoet_field_footer_text_font_family');
</script>
";
    }

    public function getTemplateName()
    {
        return "newsletter/templates/blocks/footer/settings.hbs";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  132 => 69,  126 => 66,  117 => 60,  108 => 54,  99 => 48,  89 => 41,  77 => 32,  71 => 29,  62 => 23,  47 => 11,  39 => 6,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "newsletter/templates/blocks/footer/settings.hbs", "/home/u20s1035/dev_root/wp-content/plugins/mailpoet/views/newsletter/templates/blocks/footer/settings.hbs");
    }
}
