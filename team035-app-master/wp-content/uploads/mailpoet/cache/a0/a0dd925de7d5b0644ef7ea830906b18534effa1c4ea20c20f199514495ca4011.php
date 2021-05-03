<?php

use MailPoetVendor\Twig\Environment;
use MailPoetVendor\Twig\Error\LoaderError;
use MailPoetVendor\Twig\Error\RuntimeError;
use MailPoetVendor\Twig\Extension\SandboxExtension;
use MailPoetVendor\Twig\Markup;
use MailPoetVendor\Twig\Sandbox\SecurityError;
use MailPoetVendor\Twig\Sandbox\SecurityNotAllowedTagError;
use MailPoetVendor\Twig\Sandbox\SecurityNotAllowedFilterError;
use MailPoetVendor\Twig\Sandbox\SecurityNotAllowedFunctionError;
use MailPoetVendor\Twig\Source;
use MailPoetVendor\Twig\Template;

/* segments.html */
class __TwigTemplate_af93c79668572662d54c2f756d0810c1e5545063cfa77cda2fa75a8d8b6717a3 extends \MailPoetVendor\Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'translations' => [$this, 'block_translations'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "layout.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("layout.html", "segments.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "  <div id=\"segments_container\"></div>

  <script type=\"text/javascript\">
    var mailpoet_listing_per_page = ";
        // line 7
        echo \MailPoetVendor\twig_escape_filter($this->env, ($context["items_per_page"] ?? null), "html", null, true);
        echo ";
    var mailpoet_beacon_articles = [
      '5d667fc22c7d3a7a4d77c426',
      '57f47ca3c697914f21035256',
      '5d4beee42c7d3a330e3c4207',
      '5e187a3a2c7d3a7e9ae607ff',
      '57ce079f903360649f6e56fc',
      '5d722c7104286364bc8ecf19',
      '5a574bd92c7d3a194368233e',
      '59a89621042863033a1c82e6'
    ];
    var mailpoet_mss_active = ";
        // line 18
        echo json_encode(($context["mss_active"] ?? null));
        echo ";
    var mailpoet_subscribers_limit = ";
        // line 19
        ((($context["subscribers_limit"] ?? null)) ? (print (\MailPoetVendor\twig_escape_filter($this->env, ($context["subscribers_limit"] ?? null), "html", null, true))) : (print ("false")));
        echo ";
    var mailpoet_subscribers_limit_reached = ";
        // line 20
        echo ((($context["subscribers_limit_reached"] ?? null)) ? ("true") : ("false"));
        echo ";
    var mailpoet_has_valid_api_key = ";
        // line 21
        echo ((($context["has_valid_api_key"] ?? null)) ? ("true") : ("false"));
        echo ";
    var mailpoet_mss_key_invalid = ";
        // line 22
        echo ((($context["mss_key_invalid"] ?? null)) ? ("true") : ("false"));
        echo ";
    var mailpoet_subscribers_count = ";
        // line 23
        echo \MailPoetVendor\twig_escape_filter($this->env, ($context["subscriber_count"] ?? null), "html", null, true);
        echo ";
    var mailpoet_subscribers_in_plan_count = ";
        // line 24
        echo \MailPoetVendor\twig_escape_filter($this->env, ($context["subscriber_count"] ?? null), "html", null, true);
        echo ";
    var mailpoet_premium_subscribers_count = ";
        // line 25
        echo \MailPoetVendor\twig_escape_filter($this->env, ($context["premium_subscriber_count"] ?? null), "html", null, true);
        echo ";
    var mailpoet_has_premium_support = ";
        // line 26
        echo ((($context["has_premium_support"] ?? null)) ? ("true") : ("false"));
        echo ";
    var mailpoet_wp_users_count = ";
        // line 27
        ((($context["wp_users_count"] ?? null)) ? (print (\MailPoetVendor\twig_escape_filter($this->env, ($context["wp_users_count"] ?? null), "html", null, true))) : (print ("false")));
        echo ";
    var wordpress_editable_roles_list = ";
        // line 28
        echo json_encode(($context["wordpress_editable_roles_list"] ?? null));
        echo ";
    var mailpoet_newsletters_list = ";
        // line 29
        echo json_encode(($context["newsletters_list"] ?? null));
        echo ";
    var mailpoet_product_categories = ";
        // line 30
        echo json_encode(($context["product_categories"] ?? null));
        echo ";
    mailpoet_product_categories = mailpoet_product_categories.map(function(category) {
      category.id = category.cat_ID;
      return category;
    });
    var mailpoet_products = ";
        // line 35
        echo json_encode(($context["products"] ?? null));
        echo ";
    mailpoet_products = mailpoet_products.map(function(product) {
      product.id = product.ID;
      return product;
    });
    var is_woocommerce_active = ";
        // line 40
        echo json_encode(($context["is_woocommerce_active"] ?? null));
        echo ";

  </script>
";
    }

    // line 45
    public function block_translations($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 46
        echo "  ";
        echo $this->extensions['MailPoet\Twig\I18n']->localize(["pageTitle" => $this->extensions['MailPoet\Twig\I18n']->translate("Lists"), "searchLabel" => $this->extensions['MailPoet\Twig\I18n']->translate("Search"), "loadingItems" => $this->extensions['MailPoet\Twig\I18n']->translate("Loading lists..."), "noItemsFound" => $this->extensions['MailPoet\Twig\I18n']->translate("No lists found"), "selectAllLabel" => $this->extensions['MailPoet\Twig\I18n']->translate("All lists on this page are selected."), "selectedAllLabel" => $this->extensions['MailPoet\Twig\I18n']->translate("All %d lists are selected."), "selectAllLink" => $this->extensions['MailPoet\Twig\I18n']->translate("Select all lists on all pages"), "clearSelection" => $this->extensions['MailPoet\Twig\I18n']->translate("Clear selection"), "permanentlyDeleted" => $this->extensions['MailPoet\Twig\I18n']->translate("%d lists were permanently deleted."), "selectBulkAction" => $this->extensions['MailPoet\Twig\I18n']->translate("Select bulk action"), "bulkActions" => $this->extensions['MailPoet\Twig\I18n']->translate("Bulk Actions"), "apply" => $this->extensions['MailPoet\Twig\I18n']->translate("Apply"), "name" => $this->extensions['MailPoet\Twig\I18n']->translate("Name"), "description" => $this->extensions['MailPoet\Twig\I18n']->translate("Description"), "segmentUpdated" => $this->extensions['MailPoet\Twig\I18n']->translate("List successfully updated!"), "segmentAdded" => $this->extensions['MailPoet\Twig\I18n']->translate("List successfully added!"), "segment" => $this->extensions['MailPoet\Twig\I18n']->translate("List"), "subscribed" => $this->extensions['MailPoet\Twig\I18n']->translate("Subscribed"), "unconfirmed" => $this->extensions['MailPoet\Twig\I18n']->translate("Unconfirmed"), "unsubscribed" => $this->extensions['MailPoet\Twig\I18n']->translate("Unsubscribed"), "inactive" => $this->extensions['MailPoet\Twig\I18n']->translate("Inactive"), "bounced" => $this->extensions['MailPoet\Twig\I18n']->translate("Bounced"), "createdOn" => $this->extensions['MailPoet\Twig\I18n']->translate("Created on"), "oneSegmentTrashed" => $this->extensions['MailPoet\Twig\I18n']->translate("1 list was moved to the trash. Note that deleting a list does not delete its subscribers."), "multipleSegmentsTrashed" => $this->extensions['MailPoet\Twig\I18n']->translate("%\$1d lists were moved to the trash. Note that deleting a list does not delete its subscribers."), "oneSegmentDeleted" => $this->extensions['MailPoet\Twig\I18n']->translate("1 list was permanently deleted. Note that deleting a list does not delete its subscribers."), "multipleSegmentsDeleted" => $this->extensions['MailPoet\Twig\I18n']->translate("%\$1d lists were permanently deleted. Note that deleting a list does not delete its subscribers."), "oneSegmentRestored" => $this->extensions['MailPoet\Twig\I18n']->translate("1 list has been restored from the Trash."), "multipleSegmentsRestored" => $this->extensions['MailPoet\Twig\I18n']->translate("%\$1d lists have been restored from the Trash."), "duplicate" => $this->extensions['MailPoet\Twig\I18n']->translate("Duplicate"), "listDuplicated" => $this->extensions['MailPoet\Twig\I18n']->translate("List \"%\$1s\" has been duplicated."), "update" => $this->extensions['MailPoet\Twig\I18n']->translate("Update"), "forceSync" => $this->extensions['MailPoet\Twig\I18n']->translate("Force Sync"), "readMore" => $this->extensions['MailPoet\Twig\I18n']->translate("Read More"), "listSynchronized" => $this->extensions['MailPoet\Twig\I18n']->translate("List \"%\$1s\" has been synchronized."), "viewSubscribers" => $this->extensions['MailPoet\Twig\I18n']->translate("View Subscribers"), "new" => $this->extensions['MailPoet\Twig\I18n']->translate("New List"), "newSegment" => $this->extensions['MailPoet\Twig\I18n']->translate("New Segment"), "edit" => $this->extensions['MailPoet\Twig\I18n']->translate("Edit"), "trash" => $this->extensions['MailPoet\Twig\I18n']->translate("Trash"), "moveToTrash" => $this->extensions['MailPoet\Twig\I18n']->translate("Move to trash"), "emptyTrash" => $this->extensions['MailPoet\Twig\I18n']->translate("Empty Trash"), "selectAll" => $this->extensions['MailPoet\Twig\I18n']->translate("Select All"), "restore" => $this->extensions['MailPoet\Twig\I18n']->translate("Restore"), "deletePermanently" => $this->extensions['MailPoet\Twig\I18n']->translate("Delete permanently"), "save" => $this->extensions['MailPoet\Twig\I18n']->translate("Save"), "trashDisallowed" => $this->extensions['MailPoet\Twig\I18n']->translateWithContext("List cannot be deleted because it’s used for %\$1s email", "Alert shown when trying to delete segment, which is assigned to any automatic emails."), "previousPage" => $this->extensions['MailPoet\Twig\I18n']->translate("Previous page"), "firstPage" => $this->extensions['MailPoet\Twig\I18n']->translate("First page"), "nextPage" => $this->extensions['MailPoet\Twig\I18n']->translate("Next page"), "lastPage" => $this->extensions['MailPoet\Twig\I18n']->translate("Last page"), "currentPage" => $this->extensions['MailPoet\Twig\I18n']->translate("Current page"), "pageOutOf" => $this->extensions['MailPoet\Twig\I18n']->translate("of"), "numberOfItemsSingular" => $this->extensions['MailPoet\Twig\I18n']->translate("1 item"), "numberOfItemsMultiple" => $this->extensions['MailPoet\Twig\I18n']->translate("%\$1d items"), "allSendingPausedHeader" => $this->extensions['MailPoet\Twig\I18n']->translate("All sending is currently paused!"), "allSendingPausedBody" => $this->extensions['MailPoet\Twig\I18n']->translate("Your key to send with MailPoet is invalid."), "allSendingPausedLink" => $this->extensions['MailPoet\Twig\I18n']->translate("Purchase a key"), "segmentDescriptionTip" => $this->extensions['MailPoet\Twig\I18n']->translate("This text box is for your own use and is never shown to your subscribers."), "backToList" => $this->extensions['MailPoet\Twig\I18n']->translate("Back"), "subscribersInPlanCount" => $this->extensions['MailPoet\Twig\I18n']->translateWithContext("%\$1d / %\$2d", "count / total subscribers"), "subscribersInPlan" => $this->extensions['MailPoet\Twig\I18n']->translateWithContext("%s subscribers in your plan", "number of subscribers in a sending plan"), "subscribersInPlanTooltip" => $this->extensions['MailPoet\Twig\I18n']->translate("This is the total of subscribed, unconfirmed and inactive subscribers we count when you are sending with MailPoet Sending Service. The count excludes unsubscribed and bounced (invalid) email addresses."), "mailpoetSubscribers" => $this->extensions['MailPoet\Twig\I18n']->translateWithContext("%s MailPoet subscribers", "number of subscribers in the plugin"), "mailpoetSubscribersTooltipFree" => $this->extensions['MailPoet\Twig\I18n']->translate("This is the total of all subscribers including %\$1d WordPress users. To exclude WordPress users, please purchase one of our premium plans."), "mailpoetSubscribersTooltipPremium" => $this->extensions['MailPoet\Twig\I18n']->translate("This is the total of all subscribers excluding all WordPress users."), "pageTitleSegments" => $this->extensions['MailPoet\Twig\I18n']->translate("Segments"), "formPageTitle" => $this->extensions['MailPoet\Twig\I18n']->translate("Segment"), "formSegmentTitle" => $this->extensions['MailPoet\Twig\I18n']->translate("Segment"), "descriptionTip" => $this->extensions['MailPoet\Twig\I18n']->translate("This text box is for your own use and is never shown to your subscribers."), "dynamicSegmentUpdated" => $this->extensions['MailPoet\Twig\I18n']->translate("Segment successfully updated!"), "dynamicSegmentAdded" => $this->extensions['MailPoet\Twig\I18n']->translate("Segment successfully added!"), "segmentType" => $this->extensions['MailPoet\Twig\I18n']->translate("Type"), "wpUserRole" => $this->extensions['MailPoet\Twig\I18n']->translate("WordPress user roles"), "email" => $this->extensions['MailPoet\Twig\I18n']->translate("Email"), "nameColumn" => $this->extensions['MailPoet\Twig\I18n']->translate("Name"), "subscribersCountColumn" => $this->extensions['MailPoet\Twig\I18n']->translate("Number of subscribers"), "updatedAtColumn" => $this->extensions['MailPoet\Twig\I18n']->translate("Modified on"), "loadingDynamicSegmentItems" => $this->extensions['MailPoet\Twig\I18n']->translate("Loading data…"), "noDynamicSegmentItemsFound" => $this->extensions['MailPoet\Twig\I18n']->translate("No segments found"), "numberOfItemsSingular" => $this->extensions['MailPoet\Twig\I18n']->translate("1 item"), "numberOfItemsMultiple" => $this->extensions['MailPoet\Twig\I18n']->translate("%\$1d items"), "previousPage" => $this->extensions['MailPoet\Twig\I18n']->translate("Previous page"), "firstPage" => $this->extensions['MailPoet\Twig\I18n']->translate("First page"), "nextPage" => $this->extensions['MailPoet\Twig\I18n']->translate("Next page"), "lastPage" => $this->extensions['MailPoet\Twig\I18n']->translate("Last page"), "currentPage" => $this->extensions['MailPoet\Twig\I18n']->translate("Current page"), "pageOutOf" => $this->extensions['MailPoet\Twig\I18n']->translateWithContext("of", "Page X of Y"), "notSentYet" => $this->extensions['MailPoet\Twig\I18n']->translate("Not sent yet"), "selectLinkPlaceholder" => $this->extensions['MailPoet\Twig\I18n']->translate("Select link"), "selectNewsletterPlaceholder" => $this->extensions['MailPoet\Twig\I18n']->translate("Select email"), "selectActionPlaceholder" => $this->extensions['MailPoet\Twig\I18n']->translate("Select action"), "selectUserRolePlaceholder" => $this->extensions['MailPoet\Twig\I18n']->translate("Select user role"), "emailActionOpened" => $this->extensions['MailPoet\Twig\I18n']->translateWithContext("opened", "Dynamic segment creation: when newsletter was opened"), "emailActionNotOpened" => $this->extensions['MailPoet\Twig\I18n']->translateWithContext("not opened", "Dynamic segment creation: when newsletter was not opened"), "emailActionClicked" => $this->extensions['MailPoet\Twig\I18n']->translateWithContext("clicked", "Dynamic segment creation: when a newsletter link was clicked"), "emailActionNotClicked" => $this->extensions['MailPoet\Twig\I18n']->translateWithContext("not clicked", "Dynamic segment creation: when a newsletter link was not clicked"), "searchLabel" => $this->extensions['MailPoet\Twig\I18n']->translate("Search"), "segmentsTip" => $this->extensions['MailPoet\Twig\I18n']->translateWithContext("Tip", "A note about dynamic segments usage"), "segmentsTipText" => $this->extensions['MailPoet\Twig\I18n']->translate("segments allow you to group your subscribers by other criteria, such as events and actions."), "segmentsTipLink" => $this->extensions['MailPoet\Twig\I18n']->translate("Read more."), "oneDynamicSegmentTrashed" => $this->extensions['MailPoet\Twig\I18n']->translate("1 segment was moved to the trash."), "multipleDynamicSegmentsTrashed" => $this->extensions['MailPoet\Twig\I18n']->translate("%\$1d segments were moved to the trash."), "oneDynamicSegmentRestored" => $this->extensions['MailPoet\Twig\I18n']->translate("1 segment has been restored from the Trash."), "multipleDynamicSegmentsRestored" => $this->extensions['MailPoet\Twig\I18n']->translate("%\$1d segments have been restored from the Trash."), "multipleDynamicSegmentsDeleted" => $this->extensions['MailPoet\Twig\I18n']->translate("%\$1d segments were permanently deleted."), "oneDynamicSegmentDeleted" => $this->extensions['MailPoet\Twig\I18n']->translate("1 segment was permanently deleted."), "wooPurchasedCategory" => $this->extensions['MailPoet\Twig\I18n']->translate("Customers who have purchased in this category…"), "wooPurchasedProduct" => $this->extensions['MailPoet\Twig\I18n']->translate("Customers who have purchased this product…"), "selectWooPurchasedCategory" => $this->extensions['MailPoet\Twig\I18n']->translate("Search category"), "selectWooPurchasedProduct" => $this->extensions['MailPoet\Twig\I18n']->translate("Search products"), "woocommerce" => $this->extensions['MailPoet\Twig\I18n']->translateWithContext("WooCommerce", "Dynamic segment creation: User selects this to use any woocommerce filters")]);
        // line 166
        echo "
";
    }

    public function getTemplateName()
    {
        return "segments.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  149 => 166,  146 => 46,  142 => 45,  134 => 40,  126 => 35,  118 => 30,  114 => 29,  110 => 28,  106 => 27,  102 => 26,  98 => 25,  94 => 24,  90 => 23,  86 => 22,  82 => 21,  78 => 20,  74 => 19,  70 => 18,  56 => 7,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "segments.html", "/home/u20s1035/dev_root/wp-content/plugins/mailpoet/views/segments.html");
    }
}
