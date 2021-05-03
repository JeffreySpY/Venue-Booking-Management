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

/* newsletter/templates/blocks/posts/settingsSelection.hbs */
class __TwigTemplate_3a904e255b06b577dcdbdd4136d1d96ba5ac9d826c885ca8bf814a00a73b41e9 extends \MailPoetVendor\Twig\Template
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
        echo "<div class=\"mailpoet_settings_posts_selection_controls\">
    <div class=\"mailpoet_post_selection_filter_row\">
        <input type=\"text\" name=\"\" class=\"mailpoet_input mailpoet_input_full mailpoet_posts_search_term\" value=\"{{model.search}}\" placeholder=\"";
        // line 3
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Search...");
        echo "\" />
    </div>
    <div class=\"mailpoet_post_selection_filter_row\"><select name=\"mailpoet_posts_content_type\" class=\"mailpoet_select mailpoet_select_half_width mailpoet_settings_posts_content_type\">
            <option value=\"post\" {{#ifCond model.contentType '==' 'post'}}SELECTED{{/ifCond}}>";
        // line 6
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Posts");
        echo "</option>
            <option value=\"page\" {{#ifCond model.contentType '==' 'page'}}SELECTED{{/ifCond}}>";
        // line 7
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Pages");
        echo "</option>
            <option value=\"mailpoet_page\" {{#ifCond model.contentType '==' 'mailpoet_page'}}SELECTED{{/ifCond}}>";
        // line 8
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("MailPoet pages");
        echo "</option>
        </select><select class=\"mailpoet_select mailpoet_select_half_width mailpoet_posts_post_status\">
            <option value=\"publish\" {{#ifCond model.postStatus '==' 'publish'}}SELECTED{{/ifCond}}>";
        // line 10
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Published");
        echo "</option>
            <option value=\"future\" {{#ifCond model.postStatus '==' 'future'}}SELECTED{{/ifCond}}>";
        // line 11
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Scheduled");
        echo "</option>
            <option value=\"draft\" {{#ifCond model.postStatus '==' 'draft'}}SELECTED{{/ifCond}}>";
        // line 12
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Draft");
        echo "</option>
            <option value=\"pending\" {{#ifCond model.postStatus '==' 'pending'}}SELECTED{{/ifCond}}>";
        // line 13
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Pending Review");
        echo "</option>
            <option value=\"private\" {{#ifCond model.postStatus '==' 'private'}}SELECTED{{/ifCond}}>";
        // line 14
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Private");
        echo "</option>
        </select></div>
    <div class=\"mailpoet_post_selection_filter_row\">
        <select class=\"mailpoet_select mailpoet_posts_categories_and_tags\" multiple=\"multiple\">
          {{#each model.terms}}
            <option value=\"{{ id }}\" selected=\"selected\">{{ text }}</option>
          {{/each}}
        </select>
    </div>
</div>
<div class=\"mailpoet_post_selection_container\">
</div>
<div class=\"mailpoet_post_selection_loading\" style=\"visibility: hidden;\">
  ";
        // line 27
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Loading posts...");
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "newsletter/templates/blocks/posts/settingsSelection.hbs";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 27,  69 => 14,  65 => 13,  61 => 12,  57 => 11,  53 => 10,  48 => 8,  44 => 7,  40 => 6,  34 => 3,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "newsletter/templates/blocks/posts/settingsSelection.hbs", "/home/u20s1035/dev_root/wp-content/plugins/mailpoet/views/newsletter/templates/blocks/posts/settingsSelection.hbs");
    }
}
