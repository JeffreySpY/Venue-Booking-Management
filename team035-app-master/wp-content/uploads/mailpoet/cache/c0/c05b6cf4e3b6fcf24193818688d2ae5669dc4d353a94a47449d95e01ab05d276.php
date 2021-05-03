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

/* newsletter/templates/blocks/container/settings.hbs */
class __TwigTemplate_5f25decbe0d76c5a0178b3e48b5f3d71957099bcdc3bb48ca8bf8916ef581989 extends \MailPoetVendor\Twig\Template
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
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Columns");
        echo "</h3>
<div class=\"mailpoet_form_field\">
    <label>
        <div class=\"mailpoet_form_field_input_option\">
            <input type=\"text\" name=\"background-color\" class=\"mailpoet_field_container_background_color mailpoet_color\" value=\"{{ model.styles.block.backgroundColor }}\" />
        </div>
        <div class=\"mailpoet_form_field_title mailpoet_form_field_title_inline\">";
        // line 7
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Background color");
        echo "</div>
    </label>
</div>
<hr>
<div class=\"mailpoet_form_field\">
    <label>
        <div class=\"mailpoet_form_field_title\">";
        // line 13
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Background image");
        echo "</div>
        <div class=\"mailpoet_form_field_input_option\">
            <input type=\"text\" name=\"src\" class=\"mailpoet_input mailpoet_field_image_address\" value=\"{{ model.image.src }}\" placeholder=\"http://\" /><br />
        </div>
    </label>
</div>
<div class=\"mailpoet_form_field\">
    <input type=\"button\" name=\"select-image\" class=\"button button-secondary mailpoet_button_full mailpoet_field_image_select_image\" value=\"{{#if model.image.src}}";
        // line 20
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("Select another image"), "html_attr");
        echo "{{else}}";
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Select background image", "call to action to select an image as a background image of a layout block"), "html_attr");
        echo "{{/if}}\" />
</div>
<div class=\"mailpoet_form_field\">
    <div class=\"mailpoet_form_field_title\">";
        // line 23
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Display options");
        echo "</div>
    <div class=\"mailpoet_form_field_radio_option\">
        <label>
            <input type=\"radio\" name=\"display_type\" class=\"mailpoet_field_display_type\" value=\"scale\" {{#ifCond model.image.display '===' 'scale'}}CHECKED{{/ifCond}}/>
            ";
        // line 27
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Scale");
        echo "
        </label>
    </div>
    <div class=\"mailpoet_form_field_radio_option\">
        <label>
            <input type=\"radio\" name=\"display_type\" class=\"mailpoet_field_display_type\" value=\"fit\" {{#ifCond model.image.display '===' 'fit'}}CHECKED{{/ifCond}}/>
            ";
        // line 33
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Fit");
        echo "
        </label>
    </div>
    <div class=\"mailpoet_form_field_radio_option\">
        <label>
            <input type=\"radio\" name=\"display_type\" class=\"mailpoet_field_display_type\" value=\"tile\" {{#ifCond model.image.display '===' 'tile'}}CHECKED{{/ifCond}}/>
            ";
        // line 39
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Tile");
        echo "
        </label>
    </div>
</div>
<p class=\"mailpoet_settings_notice\">";
        // line 43
        echo MailPoet\Util\Helpers::replaceLinkTags($this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("A [link]few email clients[/link] do not show background images. Make sure you have a good background color to fall back on if the image is not displayed.", "Editor > right sidebar for column block settings."), "https://kb.mailpoet.com/article/261-add-a-background-image-to-your-newsletter", ["target" => "_blank", "data-beacon-article" => "5bf5863104286304a71c7e1a"]);
        echo "</p>
<div class=\"mailpoet_form_field\">
    <input type=\"button\" class=\"button button-primary mailpoet_done_editing\" value=\"";
        // line 45
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\I18n')->translate("Done"), "html_attr");
        echo "\" />
</div>
";
    }

    public function getTemplateName()
    {
        return "newsletter/templates/blocks/container/settings.hbs";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  104 => 45,  99 => 43,  92 => 39,  83 => 33,  74 => 27,  67 => 23,  59 => 20,  49 => 13,  40 => 7,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "newsletter/templates/blocks/container/settings.hbs", "/home/u20s1035/dev_root/wp-content/plugins/mailpoet/views/newsletter/templates/blocks/container/settings.hbs");
    }
}
