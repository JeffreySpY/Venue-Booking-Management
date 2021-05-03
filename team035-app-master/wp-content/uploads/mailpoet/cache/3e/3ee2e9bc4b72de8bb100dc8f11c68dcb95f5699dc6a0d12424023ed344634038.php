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

/* newsletter/templates/blocks/products/settingsDisplayOptions.hbs */
class __TwigTemplate_0bb82d5e3c8663bbcb2c5185adbbed73dc4d5255f297e0eb3d34d386e7bd4e62 extends \MailPoetVendor\Twig\Template
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
        echo "<div class=\"mailpoet_form_field\">
    <div class=\"mailpoet_form_field_radio_option\">
        <label>
            <input type=\"radio\" name=\"mailpoet_products_display_type\" class=\"mailpoet_products_display_type\" value=\"titleOnly\" {{#ifCond model.displayType '==' 'titleOnly'}}CHECKED{{/ifCond}}/>
            ";
        // line 5
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Title only");
        echo "
        </label>
    </div>
    <div class=\"mailpoet_form_field_radio_option\">
        <label>
            <input type=\"radio\" name=\"mailpoet_products_display_type\" class=\"mailpoet_products_display_type\" value=\"excerpt\" {{#ifCond model.displayType '==' 'excerpt'}}CHECKED{{/ifCond}}/>
            ";
        // line 11
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Title and a short description");
        echo "
        </label>
    </div>
    <div class=\"mailpoet_form_field_radio_option\">
        <label>
            <input type=\"radio\" name=\"mailpoet_products_display_type\" class=\"mailpoet_products_display_type\" value=\"full\" {{#ifCond model.displayType '==' 'full'}}CHECKED{{/ifCond}} />
            ";
        // line 17
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Title and description");
        echo "
        </label>
    </div>
</div>

<hr class=\"mailpoet_separator\" />

<div class=\"mailpoet_form_field\">
    <div class=\"mailpoet_form_field_title\">";
        // line 25
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Title Format");
        echo "</div>
    <div class=\"mailpoet_form_field_radio_option\">
        <label>
            <input type=\"radio\" name=\"mailpoet_products_title_format\" class=\"mailpoet_products_title_format\" value=\"h1\" {{#ifCond model.titleFormat '==' 'h1'}}CHECKED{{/ifCond}}/>
            ";
        // line 29
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Heading 1");
        echo "
        </label>
    </div>
    <div class=\"mailpoet_form_field_radio_option\">
        <label>
            <input type=\"radio\" name=\"mailpoet_products_title_format\" class=\"mailpoet_products_title_format\" value=\"h2\" {{#ifCond model.titleFormat '==' 'h2'}}CHECKED{{/ifCond}}/>
            ";
        // line 35
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Heading 2");
        echo "
        </label>
    </div>
    <div class=\"mailpoet_form_field_radio_option\">
        <label>
            <input type=\"radio\" name=\"mailpoet_products_title_format\" class=\"mailpoet_products_title_format\" value=\"h3\" {{#ifCond model.titleFormat '==' 'h3'}}CHECKED{{/ifCond}}/>
            ";
        // line 41
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Heading 3");
        echo "
        </label>
    </div>
</div>

<div class=\"mailpoet_form_field\">
    <div class=\"mailpoet_form_field_title\">";
        // line 47
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Title Alignment");
        echo "</div>
    <div class=\"mailpoet_form_field_radio_option\">
        <label>
            <input type=\"radio\" name=\"mailpoet_products_title_alignment\" class=\"mailpoet_products_title_alignment\" value=\"left\" {{#ifCond model.titleAlignment '==' 'left'}}CHECKED{{/ifCond}} />
            ";
        // line 51
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Left");
        echo "
        </label>
    </div>
    <div class=\"mailpoet_form_field_radio_option\">
        <label>
            <input type=\"radio\" name=\"mailpoet_products_title_alignment\" class=\"mailpoet_products_title_alignment\" value=\"center\" {{#ifCond model.titleAlignment '==' 'center'}}CHECKED{{/ifCond}} />
            ";
        // line 57
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Center");
        echo "
        </label>
    </div>
    <div class=\"mailpoet_form_field_radio_option\">
        <label>
            <input type=\"radio\" name=\"mailpoet_products_title_alignment\" class=\"mailpoet_products_title_alignment\" value=\"right\" {{#ifCond model.titleAlignment '==' 'right'}}CHECKED{{/ifCond}} />
            ";
        // line 63
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Right");
        echo "
        </label>
    </div>
</div>

<div class=\"mailpoet_form_field\">
    <div class=\"mailpoet_form_field_title\">";
        // line 69
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Make the product title into a link", "Display the product title into a link");
        echo "</div>
    <div class=\"mailpoet_form_field_radio_option\">
        <label>
            <input type=\"radio\" name=\"mailpoet_products_title_as_links\" class=\"mailpoet_products_title_as_links\" value=\"true\" {{#if model.titleIsLink}}CHECKED{{/if}}/>
            ";
        // line 73
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Yes");
        echo "
        </label>
    </div>
    <div class=\"mailpoet_form_field_radio_option\">
        <label>
            <input type=\"radio\" name=\"mailpoet_products_title_as_links\" class=\"mailpoet_products_title_as_links\" value=\"false\" {{#unless model.titleIsLink}}CHECKED{{/unless}}/>
            ";
        // line 79
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("No");
        echo "
        </label>
    </div>
</div>

<hr class=\"mailpoet_separator\" />

<div class=\"mailpoet_form_field mailpoet_products_title_position {{#ifCond model.displayType '===' 'titleOnly'}}mailpoet_hidden{{/ifCond}}\">
    <div class=\"mailpoet_form_field_title\">";
        // line 87
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Product title position", "Setting in the email designer to position an ecommerce product title");
        echo "</div>
    <div class=\"mailpoet_form_field_radio_option\">
        <label>
            <input type=\"radio\" name=\"mailpoet_products_title_position\" class=\"mailpoet_products_title_position\" value=\"abovePost\" {{#ifCond model.titlePosition '!=' 'aboveExcerpt'}}CHECKED{{/ifCond}}/>
            ";
        // line 91
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Above the product", "Display the product title above the product block");
        echo "
        </label>
    </div>
    <div class=\"mailpoet_form_field_radio_option\">
        <label>
            <input type=\"radio\" name=\"mailpoet_products_title_position\" class=\"mailpoet_products_title_position\" value=\"aboveExcerpt\" {{#ifCond model.titlePosition '==' 'aboveExcerpt'}}CHECKED{{/ifCond}}/>
            ";
        // line 97
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Above the product description", "Display the product title above the product description");
        echo "
        </label>
    </div>
</div>

<hr class=\"mailpoet_separator mailpoet_products_title_position_separator {{#ifCond model.displayType '===' 'titleOnly'}}mailpoet_hidden{{/ifCond}}\" />

<div> <!-- empty div for better git diff -->
    <div class=\"mailpoet_form_field mailpoet_products_featured_image_position_container\">
        <div class=\"mailpoet_form_field_title\">";
        // line 106
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Product image position");
        echo "</div>
        <div class=\"mailpoet_form_field_radio_option\">
            <label>
                <input type=\"radio\" name=\"mailpoet_products_featured_image_position\" class=\"mailpoet_products_featured_image_position\" value=\"centered\" {{#ifCond model.featuredImagePosition '==' 'centered' }}CHECKED{{/ifCond}}/>
                ";
        // line 110
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Centered");
        echo "
            </label>
        </div>
        <div class=\"mailpoet_form_field_radio_option\">
            <label>
                <input type=\"radio\" name=\"mailpoet_products_featured_image_position\" class=\"mailpoet_products_featured_image_position\" value=\"left\" {{#ifCond model.featuredImagePosition '==' 'left' }}CHECKED{{/ifCond}}/>
                ";
        // line 116
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Left");
        echo "
            </label>
        </div>
        <div class=\"mailpoet_form_field_radio_option\">
            <label>
                <input type=\"radio\" name=\"mailpoet_products_featured_image_position\" class=\"mailpoet_products_featured_image_position\" value=\"right\" {{#ifCond model.featuredImagePosition '==' 'right' }}CHECKED{{/ifCond}}/>
                ";
        // line 122
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Right");
        echo "
            </label>
        </div>
        <div class=\"mailpoet_form_field_radio_option\">
            <label>
                <input type=\"radio\" name=\"mailpoet_products_featured_image_position\" class=\"mailpoet_products_featured_image_position\" value=\"alternate\" {{#ifCond model.featuredImagePosition '==' 'alternate' }}CHECKED{{/ifCond}}/>
                ";
        // line 128
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Alternate");
        echo "
            </label>
        </div>
        <div class=\"mailpoet_form_field_radio_option\">
            <label>
                <input type=\"radio\" name=\"mailpoet_products_featured_image_position\" class=\"mailpoet_products_featured_image_position\" value=\"none\" {{#ifCond model.featuredImagePosition '==' 'none' }}CHECKED{{/ifCond}}/>
                ";
        // line 134
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("None");
        echo "
            </label>
        </div>
    </div>

    <div class=\"mailpoet_form_field mailpoet_products_image_full_width_option {{#ifCond model.displayType '==' 'titleOnly'}}mailpoet_hidden{{/ifCond}}\">
        <div class=\"mailpoet_form_field_title\">";
        // line 140
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Image width");
        echo "</div>
        <div class=\"mailpoet_form_field_radio_option\">
            <label>
                <input type=\"radio\" name=\"imageFullWidth\" class=\"mailpoet_products_image_full_width\" value=\"true\" {{#if model.imageFullWidth}}CHECKED{{/if}}/>
                ";
        // line 144
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Full width");
        echo "
            </label>
        </div>
        <div class=\"mailpoet_form_field_radio_option\">
            <label>
                <input type=\"radio\" name=\"imageFullWidth\" class=\"mailpoet_products_image_full_width\" value=\"false\" {{#unless model.imageFullWidth}}CHECKED{{/unless}}/>
                ";
        // line 150
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Padded");
        echo "
            </label>
        </div>
    </div>

    <hr class=\"mailpoet_separator\" />

    <div class=\"mailpoet_form_field\">
        <div class=\"mailpoet_form_field_title\">";
        // line 158
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Price");
        echo "</div>
        <div class=\"mailpoet_form_field_radio_option\">
            <label>
                <input type=\"radio\" name=\"mailpoet_products_price_position\" class=\"mailpoet_products_price_position\" value=\"below\" {{#ifCond model.pricePosition '==' 'below'}}CHECKED{{/ifCond}} />
                ";
        // line 162
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Below text");
        echo "
            </label>
        </div>
        <div class=\"mailpoet_form_field_radio_option\">
            <label>
                <input type=\"radio\" name=\"mailpoet_products_price_position\" class=\"mailpoet_products_price_position\" value=\"above\" {{#ifCond model.pricePosition '==' 'above'}}CHECKED{{/ifCond}} />
                ";
        // line 168
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Above text");
        echo "
            </label>
        </div>
        <div class=\"mailpoet_form_field_radio_option\">
            <label>
                <input type=\"radio\" name=\"mailpoet_products_price_position\" class=\"mailpoet_products_price_position\" value=\"hidden\" {{#ifCond model.pricePosition '==' 'hidden'}}CHECKED{{/ifCond}} />
                ";
        // line 174
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("No");
        echo "
            </label>
        </div>
    </div>

    <hr class=\"mailpoet_separator\" />

    <div class=\"mailpoet_form_field\">
        <div class=\"mailpoet_form_field_title mailpoet_form_field_title_small\">";
        // line 182
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("\"Buy now\" text");
        echo "</div>
        <div class=\"mailpoet_form_field_radio_option\">
            <label>
                <input type=\"radio\" name=\"mailpoet_products_read_more_type\" class=\"mailpoet_products_read_more_type\" value=\"link\" {{#ifCond model.readMoreType '==' 'link'}}CHECKED{{/ifCond}}/>
                ";
        // line 186
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Link");
        echo "
            </label>
        </div>
        <div class=\"mailpoet_form_field_radio_option\">
            <label>
                <input type=\"radio\" name=\"mailpoet_products_read_more_type\" class=\"mailpoet_products_read_more_type\" value=\"button\" {{#ifCond model.readMoreType '==' 'button'}}CHECKED{{/ifCond}}/>
                ";
        // line 192
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Button");
        echo "
            </label>
        </div>

        <div class=\"mailpoet_form_field_input_option mailpoet_form_field_block\">
            <input type=\"text\" class=\"mailpoet_input mailpoet_input_full mailpoet_products_read_more_text {{#ifCond model.readMoreType '!=' 'link'}}mailpoet_hidden{{/ifCond}}\" value=\"{{ model.readMoreText }}\" />
        </div>

        <div class=\"mailpoet_form_field_input_option mailpoet_form_field_block\">
            <a href=\"javascript:;\" class=\"mailpoet_products_select_button {{#ifCond model.readMoreType '!=' 'button'}}mailpoet_hidden{{/ifCond}}\">";
        // line 201
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Design a button");
        echo "</a>
        </div>
    </div>

    <hr class=\"mailpoet_separator\" />

    <div class=\"mailpoet_form_field\">
        <div class=\"mailpoet_form_field_title mailpoet_form_field_title_small mailpoet_form_field_title_inline\">";
        // line 208
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Show divider between products");
        echo "</div>
        <div class=\"mailpoet_form_field_radio_option\">
            <label>
                <input type=\"radio\" name=\"mailpoet_products_show_divider\" class=\"mailpoet_products_show_divider\" value=\"true\" {{#if model.showDivider}}CHECKED{{/if}}/>
                ";
        // line 212
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Yes");
        echo "
            </label>
        </div>
        <div class=\"mailpoet_form_field_radio_option\">
            <label>
                <input type=\"radio\" name=\"mailpoet_products_show_divider\"class=\"mailpoet_products_show_divider\" value=\"false\" {{#unless model.showDivider}}CHECKED{{/unless}}/>
                ";
        // line 218
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("No");
        echo "
            </label>
        </div>
        <div class=\"mailpoet_form_field_input_option\">
            <a href=\"javascript:;\" class=\"mailpoet_products_select_divider\">";
        // line 222
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Select divider");
        echo "</a>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "newsletter/templates/blocks/products/settingsDisplayOptions.hbs";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  364 => 222,  357 => 218,  348 => 212,  341 => 208,  331 => 201,  319 => 192,  310 => 186,  303 => 182,  292 => 174,  283 => 168,  274 => 162,  267 => 158,  256 => 150,  247 => 144,  240 => 140,  231 => 134,  222 => 128,  213 => 122,  204 => 116,  195 => 110,  188 => 106,  176 => 97,  167 => 91,  160 => 87,  149 => 79,  140 => 73,  133 => 69,  124 => 63,  115 => 57,  106 => 51,  99 => 47,  90 => 41,  81 => 35,  72 => 29,  65 => 25,  54 => 17,  45 => 11,  36 => 5,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "newsletter/templates/blocks/products/settingsDisplayOptions.hbs", "/home/u20s1035/dev_root/wp-content/plugins/mailpoet/views/newsletter/templates/blocks/products/settingsDisplayOptions.hbs");
    }
}
