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

/* newsletter/templates/blocks/image/settings.hbs */
class __TwigTemplate_7358785bb8e3e6059ee91a4f15f7216c8a920d4fdec8bf02b17e98ec26733bc1 extends \MailPoetVendor\Twig\Template
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
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Image");
        echo "<span id=\"tooltip-designer-ideal-width\" class=\"tooltip-help-designer-ideal-width\"></span></h3>
<div class=\"mailpoet_form_field\">
    <label>
        <div class=\"mailpoet_form_field_title\">";
        // line 4
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Link");
        echo " <span class=\"mailpoet_form_field_optional\">(";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Optional");
        echo ")</div>
        <div class=\"mailpoet_form_field_input_option\">
            <input type=\"text\" name=\"src\" class=\"mailpoet_input mailpoet_field_image_link\" value=\"{{ model.link }}\" placeholder=\"http://\" />
        </div>
    </label>
</div>
<div class=\"mailpoet_form_field\">
    <label>
        <div class=\"mailpoet_form_field_title\">";
        // line 12
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Image address", "input field for the image URL");
        echo "</div>
        <div class=\"mailpoet_form_field_input_option\">
            <input type=\"text\" name=\"src\" class=\"mailpoet_input mailpoet_field_image_address\" value=\"{{ model.src }}\" placeholder=\"http://\" /><br />
        </div>
    </label>
</div>
<div class=\"mailpoet_form_field\">
    <input type=\"button\" name=\"select-image\" class=\"button button-secondary mailpoet_button_full mailpoet_field_image_select_image\" value=\"";
        // line 19
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("Select another image"), "html_attr");
        echo "\" />
</div>

<div class=\"mailpoet_form_field\">
    <label>
        <div class=\"mailpoet_form_field_title\">";
        // line 24
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Alternative text");
        echo "</div>
        <div class=\"mailpoet_form_field_input_option\">
            <input type=\"text\" name=\"alt\" class=\"mailpoet_input mailpoet_field_image_alt_text\" value=\"{{ model.alt }}\" />
        </div>
    </label>
</div>
<div class=\"mailpoet_form_field\">
    <label>
        <div class=\"mailpoet_form_field_title\">";
        // line 32
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Width");
        echo "</div>
        <div class=\"mailpoet_form_field_input_option\">
            <input
                class=\"mailpoet_input mailpoet_input_small mailpoet_field_image_width_input\"
                name=\"image-width-input\"
                type=\"number\"
                value=\"{{getNumber model.width}}\"
                min=\"36\"
                max=\"660\"
                step=\"2\"
            /> px
            <input
                class=\"mailpoet_range mailpoet_range_small mailpoet_field_image_width\"
                name=\"image-width\"
                type=\"range\"
                value=\"{{getNumber model.width}}\"
                min=\"36\"
                max=\"660\"
                step=\"2\"
            />
        </div>
    </label>
</div>
<div class=\"mailpoet_form_field\">
    <div class=\"mailpoet_form_field_checkbox_option\">
        <label>
            <input type=\"checkbox\" name=\"fullWidth\" class=\"mailpoet_field_image_full_width\" value=\"true\" {{#if model.fullWidth }}CHECKED{{/if}}/>
            ";
        // line 59
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("No padding", "Option to remove a default padding around images");
        echo "
        </label>
        <span id=\"tooltip-designer-full-width\" class=\"tooltip-help-designer-full-width\"></span>
    </div>
</div>
<div class=\"mailpoet_form_field\">
    <div class=\"mailpoet_form_field_title\">";
        // line 65
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Alignment");
        echo "</div>
    <div class=\"mailpoet_form_field_radio_option\">
        <label>
        <input type=\"radio\" name=\"alignment\" class=\"mailpoet_field_image_alignment\" value=\"left\" {{#ifCond model.styles.block.textAlign '===' 'left'}}CHECKED{{/ifCond}}/>
        ";
        // line 69
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Left");
        echo "
        </label>
    </div>
    <div class=\"mailpoet_form_field_radio_option\">
        <label>
            <input type=\"radio\" name=\"alignment\" class=\"mailpoet_field_image_alignment\" value=\"center\" {{#ifCond model.styles.block.textAlign '===' 'center'}}CHECKED{{/ifCond}}/>
            ";
        // line 75
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Center");
        echo "
        </label>
    </div>
    <div class=\"mailpoet_form_field_radio_option\">
        <label>
            <input type=\"radio\" name=\"alignment\" class=\"mailpoet_field_image_alignment\" value=\"right\" {{#ifCond model.styles.block.textAlign '===' 'right'}}CHECKED{{/ifCond}}/>
            ";
        // line 81
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Right");
        echo "
        </label>
    </div>
</div>

<div class=\"mailpoet_form_field\">
    <input type=\"button\" class=\"button button-primary mailpoet_done_editing\" value=\"";
        // line 87
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("Done"), "html_attr");
        echo "\" />
</div>
";
    }

    public function getTemplateName()
    {
        return "newsletter/templates/blocks/image/settings.hbs";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  152 => 87,  143 => 81,  134 => 75,  125 => 69,  118 => 65,  109 => 59,  79 => 32,  68 => 24,  60 => 19,  50 => 12,  37 => 4,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "newsletter/templates/blocks/image/settings.hbs", "/home/u20s1035/dev_root/wp-content/plugins/mailpoet/views/newsletter/templates/blocks/image/settings.hbs");
    }
}
