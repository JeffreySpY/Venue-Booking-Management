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

/* forms.html */
class __TwigTemplate_e7927d1f4b8e2516349aace8bdad4bee7933a04417a0221622d748f77b889a51 extends \MailPoetVendor\Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'translations' => [$this, 'block_translations'],
            'after_javascript' => [$this, 'block_after_javascript'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "layout.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("layout.html", "forms.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        // line 4
        echo "  <div id=\"forms_container\"></div>

  <div>
    <p class=\"mailpoet_sending_methods_help help\">
      ";
        // line 8
        echo MailPoet\Util\Helpers::replaceLinkTags($this->env->getExtension('MailPoet\Twig\I18n')->translate("<strong>Tip:</strong> we have a [link]list of plugins[/link] that work with MailPoet if you need fancier forms."), "https://kb.mailpoet.com/article/198-list-of-forms-plugins-that-work-with-mailpoet?utm_source=plugin&utm_medium=settings&utm_campaign=helpdocs", ["target" => "_blank", "id" => "mailpoet_helper_link", "data-beacon-article" => "5953a9720428637ff8d42272"]);
        // line 11
        echo "
    </p>
  </div>

  <script type=\"text/javascript\">
    var mailpoet_listing_per_page = ";
        // line 16
        echo \MailPoetVendor\twig_escape_filter($this->env, ($context["items_per_page"] ?? null), "html", null, true);
        echo ";
    var mailpoet_segments = ";
        // line 17
        echo json_encode(($context["segments"] ?? null));
        echo ";
    var mailpoet_form_edit_url =
      \"";
        // line 19
        echo admin_url("admin.php?page=mailpoet-form-editor&id=");
        echo "\";
    var mailpoet_beacon_articles = [
      '5e43d3ec2c7d3a7e9ae79da9',
      '58a718a6dd8c8e56bfa7cad6',
      '5ad9b1f22c7d3a0e93678640',
      '5d1f468504286369ad8d57ff'
    ];

    var mailpoet_display_nps_poll = ";
        // line 27
        echo json_encode(($context["display_nps_survey"] ?? null));
        echo ";

    ";
        // line 29
        if (($context["display_nps_survey"] ?? null)) {
            // line 30
            echo "      var mailpoet_display_nps_form = true;
      var mailpoet_premium_active = ";
            // line 31
            echo json_encode(($context["premium_plugin_active"] ?? null));
            echo ";
      var mailpoet_site_url = \"";
            // line 32
            echo \MailPoetVendor\twig_escape_filter($this->env, ($context["site_url"] ?? null), "html", null, true);
            echo "\";
      var mailpoet_current_wp_user = ";
            // line 33
            echo json_encode(($context["current_wp_user"] ?? null));
            echo ";
      var mailpoet_current_wp_user_firstname = '";
            // line 34
            echo \MailPoetVendor\twig_escape_filter($this->env, ($context["current_wp_user_firstname"] ?? null), "html", null, true);
            echo "';
      var mailpoet_review_request_illustration_url = '";
            // line 35
            echo $this->env->getExtension('MailPoet\Twig\Assets')->generateCdnUrl("review-request/review-request-illustration.20190815-1427.svg");
            echo "';
      var mailpoet_installed_days_ago = ";
            // line 36
            echo \MailPoetVendor\twig_escape_filter($this->env, ($context["installed_days_ago"] ?? null), "html", null, true);
            echo ";
    ";
        }
        // line 38
        echo "  </script>
";
    }

    // line 41
    public function block_translations($context, array $blocks = [])
    {
        // line 42
        echo "  ";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->localize(["pageTitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Forms"), "searchLabel" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Search"), "loadingItems" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Loading forms..."), "noItemsFound" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("No forms were found. Why not create a new one?"), "selectAllLabel" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("All forms on this page are selected."), "selectedAllLabel" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("All %d forms are selected."), "selectAllLink" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Select all forms on all pages"), "clearSelection" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Clear selection"), "permanentlyDeleted" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("%d forms permanently deleted."), "selectBulkAction" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Select bulk action"), "bulkActions" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Bulk Actions"), "apply" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Apply"), "filter" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Filter"), "emptyTrash" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Empty Trash"), "selectAll" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Select All"), "restore" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Restore"), "deletePermanently" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Delete Permanently"), "previousPage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Previous page"), "firstPage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("First page"), "nextPage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Next page"), "lastPage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Last page"), "currentPage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Current Page"), "pageOutOf" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("of"), "numberOfItemsSingular" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("1 item"), "numberOfItemsMultiple" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("%\$1d items"), "formName" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Name"), "noName" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("no name", "fallback for forms without a name in a form list"), "segments" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Lists"), "userChoice" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("User choice:"), "signups" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Sign-ups"), "createdOn" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Created On"), "oneFormTrashed" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("1 form was moved to the trash."), "multipleFormsTrashed" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("%\$1d forms were moved to the trash."), "oneFormDeleted" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("1 form was permanently deleted."), "multipleFormsDeleted" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("%\$1d forms were permanently deleted."), "oneFormRestored" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("1 form has been restored from the trash."), "multipleFormsRestored" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("%\$1d forms have been restored from the trash."), "edit" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Edit"), "duplicate" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Duplicate"), "formDuplicated" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Form \"%\$1s\" has been duplicated."), "trash" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Trash"), "moveToTrash" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Move to trash"), "new" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Add New")]);
        // line 88
        echo "
";
    }

    // line 91
    public function block_after_javascript($context, array $blocks = [])
    {
        // line 92
        echo "<script type=\"text/javascript\">
  jQuery('#mailpoet_helper_link').on('click', function() {
    MailPoet.trackEvent('Forms page > link to doc page', {
      'MailPoet Free version': window.mailpoet_version
    });
  });
</script>
";
    }

    public function getTemplateName()
    {
        return "forms.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  133 => 92,  130 => 91,  125 => 88,  122 => 42,  119 => 41,  114 => 38,  109 => 36,  105 => 35,  101 => 34,  97 => 33,  93 => 32,  89 => 31,  86 => 30,  84 => 29,  79 => 27,  68 => 19,  63 => 17,  59 => 16,  52 => 11,  50 => 8,  44 => 4,  41 => 3,  31 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "forms.html", "/home/u20s1035/dev_root/wp-content/plugins/mailpoet/views/forms.html");
    }
}
