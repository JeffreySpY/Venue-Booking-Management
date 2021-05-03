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

/* subscribers/subscribers.html */
class __TwigTemplate_511498e3ddea008a39b26602844365c20664471f31f21be764d13982ef318124 extends \MailPoetVendor\Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

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
        $this->parent = $this->loadTemplate("layout.html", "subscribers/subscribers.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        // line 4
        echo "  <div id=\"subscribers_container\"></div>

  <script type=\"text/javascript\">
    var mailpoet_listing_per_page = ";
        // line 7
        echo \MailPoetVendor\twig_escape_filter($this->env, ($context["items_per_page"] ?? null), "html", null, true);
        echo ";
    var mailpoet_segments = ";
        // line 8
        echo json_encode(($context["segments"] ?? null));
        echo ";
    var mailpoet_custom_fields = ";
        // line 9
        echo json_encode(($context["custom_fields"] ?? null));
        echo ";
    var mailpoet_month_names = ";
        // line 10
        echo json_encode(($context["month_names"] ?? null));
        echo ";
    var mailpoet_date_formats = ";
        // line 11
        echo json_encode(($context["date_formats"] ?? null));
        echo ";
    var mailpoet_premium_active = ";
        // line 12
        echo json_encode(($context["premium_plugin_active"] ?? null));
        echo ";
    var mailpoet_max_confirmation_emails = ";
        // line 13
        echo \MailPoetVendor\twig_escape_filter($this->env, ($context["max_confirmation_emails"] ?? null), "html", null, true);
        echo ";
    var mss_active = ";
        // line 14
        echo json_encode(($context["mss_active"] ?? null));
        echo ";
    var mailpoet_beacon_articles = [
      '57ce07ffc6979108399a044b',
      '57ce079f903360649f6e56fc',
      '5d0a1da404286318cac46fe5',
      '5cbf19622c7d3a026fd3efe1',
      '58a5a7502c7d3a576d353c78',
    ];
    var mailpoet_subscribers_limit = ";
        // line 22
        ((($context["subscribers_limit"] ?? null)) ? (print (\MailPoetVendor\twig_escape_filter($this->env, ($context["subscribers_limit"] ?? null), "html", null, true))) : (print ("false")));
        echo ";
    var mailpoet_subscribers_limit_reached = ";
        // line 23
        echo ((($context["subscribers_limit_reached"] ?? null)) ? ("true") : ("false"));
        echo ";
    var mailpoet_has_valid_api_key = ";
        // line 24
        echo ((($context["has_valid_api_key"] ?? null)) ? ("true") : ("false"));
        echo ";
    var mailpoet_mss_key_invalid = ";
        // line 25
        echo ((($context["mss_key_invalid"] ?? null)) ? ("true") : ("false"));
        echo ";
    var mailpoet_subscribers_count = ";
        // line 26
        echo \MailPoetVendor\twig_escape_filter($this->env, ($context["subscriber_count"] ?? null), "html", null, true);
        echo ";
  </script>
";
    }

    // line 30
    public function block_translations($context, array $blocks = [])
    {
        // line 31
        echo "  ";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->localize(["pageTitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Subscribers"), "searchLabel" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Search"), "loadingItems" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Loading subscribers..."), "noItemsFound" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("No subscribers were found."), "bouncedSubscribersHelp" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Email addresses that are invalid or don't exist anymore are called \"bounced addresses\". It's a good practice not to send emails to bounced addresses to keep a good reputation with spam filters. Send your emails with MailPoet and we'll automatically ensure to keep a list of bounced addresses without any setup."), "bouncedSubscribersPremiumButtonText" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Get premium version!"), "selectAllLabel" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("All subscribers on this page are selected."), "selectedAllLabel" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("All %d subscribers are selected."), "selectAllLink" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Select all subscribers on all pages."), "clearSelection" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Clear selection"), "permanentlyDeleted" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("%d subscribers were permanently deleted."), "selectBulkAction" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Select bulk action"), "bulkActions" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Bulk Actions"), "apply" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Apply"), "filter" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Filter"), "emptyTrash" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Empty Trash"), "selectAll" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Select All"), "edit" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Edit"), "restore" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Restore"), "trash" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Trash"), "moveToTrash" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Move to trash"), "deletePermanently" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Delete Permanently"), "showMoreDetails" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Show more details"), "previousPage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Previous page"), "firstPage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("First page"), "nextPage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Next page"), "lastPage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Last page"), "currentPage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Current Page"), "pageOutOf" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("of"), "numberOfItemsSingular" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("1 item"), "numberOfItemsMultiple" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("%\$1d items"), "email" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("E-mail"), "firstname" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("First name"), "lastname" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Last name"), "status" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Status"), "unconfirmed" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Unconfirmed"), "subscribed" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Subscribed"), "unsubscribed" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Unsubscribed"), "inactive" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Inactive"), "bounced" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Bounced"), "selectList" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Select a list"), "unsubscribedOn" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Unsubscribed on %\$1s"), "subscriberUpdated" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Subscriber was updated successfully!"), "subscriberAdded" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Subscriber was added successfully!"), "welcomeEmailTip" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("This subscriber will receive Welcome Emails if any are active for your lists."), "subscriber" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Subscriber"), "status" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Status"), "lists" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Lists"), "subscribedOn" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Subscribed on"), "lastModifiedOn" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Last modified on"), "oneSubscriberTrashed" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("1 subscriber was moved to the trash."), "multipleSubscribersTrashed" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("%\$1d subscribers were moved to the trash."), "oneSubscriberDeleted" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("1 subscriber was permanently deleted."), "multipleSubscribersDeleted" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("%\$1d subscribers were permanently deleted."), "oneSubscriberRestored" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("1 subscriber has been restored from the trash."), "multipleSubscribersRestored" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("%\$1d subscribers have been restored from the trash."), "moveToList" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Move to list..."), "multipleSubscribersMovedToList" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("%\$1d subscribers were moved to list <strong>%\$2s</strong>"), "addToList" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Add to list..."), "multipleSubscribersAddedToList" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("%\$1d subscribers were added to list <strong>%\$2s</strong>."), "removeFromList" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Remove from list..."), "multipleSubscribersRemovedFromList" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("%\$1d subscribers were removed from list <strong>%\$2s</strong>"), "removeFromAllLists" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Remove from all lists"), "multipleSubscribersRemovedFromAllLists" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("%\$1d subscribers were removed from all lists."), "resendConfirmationEmail" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Resend confirmation email"), "oneConfirmationEmailSent" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("1 confirmation email has been sent."), "listsToWhichSubscriberWasSubscribed" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Lists to which the subscriber was subscribed."), "WPUsersSegment" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("WordPress Users"), "WPUserEditNotice" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("This subscriber is a registered WordPress user. [link]Edit his/her profile[/link] to change his/her email."), "allSendingPausedHeader" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("All sending is currently paused!"), "allSendingPausedBody" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Your key to send with MailPoet is invalid."), "allSendingPausedLink" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Purchase a key"), "tip" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Tip:"), "customFieldsTip" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Need to add new fields, like a telephone number or street address? You can add custom fields by editing the subscription form on the Forms page."), "year" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Year"), "month" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Month"), "day" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Day"), "new" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Add New"), "import" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Import"), "export" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Export"), "save" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Save"), "backToList" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Back")]);
        // line 117
        echo "
";
    }

    public function getTemplateName()
    {
        return "subscribers/subscribers.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 117,  113 => 31,  110 => 30,  103 => 26,  99 => 25,  95 => 24,  91 => 23,  87 => 22,  76 => 14,  72 => 13,  68 => 12,  64 => 11,  60 => 10,  56 => 9,  52 => 8,  48 => 7,  43 => 4,  40 => 3,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "subscribers/subscribers.html", "/home/u20s1035/dev_root/wp-content/plugins/mailpoet/views/subscribers/subscribers.html");
    }
}
