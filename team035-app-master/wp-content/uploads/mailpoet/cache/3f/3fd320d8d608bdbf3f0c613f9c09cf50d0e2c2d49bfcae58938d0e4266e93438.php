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

/* form/editor.html */
class __TwigTemplate_fd88c8d6d471f79e95d4687867c4e4214fe41beeeb0e2b96c162bb282dbc1fe0 extends \MailPoetVendor\Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'after_css' => [$this, 'block_after_css'],
            'container' => [$this, 'block_container'],
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
        $this->parent = $this->loadTemplate("layout.html", "form/editor.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_after_css($context, array $blocks = [])
    {
        // line 4
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateStylesheet("mailpoet-form-editor.css");
        echo "
";
        // line 5
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateStylesheet("mailpoet-public.css");
        echo "
";
    }

    // line 8
    public function block_container($context, array $blocks = [])
    {
        // line 9
        echo "
<script type=\"text/javascript\">
  var mailpoet_beacon_articles = [
    '5e43d3ec2c7d3a7e9ae79da9',
  ];
</script>

<div class=\"block-editor\">
    <div id=\"mailpoet_form_edit\" class=\"block-editor__container\">
    </div>
</div>

<script>
  ";
        // line 23
        echo "  var mailpoet_form_data = ";
        echo json_encode(($context["form"] ?? null));
        echo ";
  var mailpoet_form_exports = ";
        // line 24
        echo json_encode(($context["form_exports"] ?? null));
        echo ";
  var mailpoet_form_segments = ";
        // line 25
        echo json_encode(($context["segments"] ?? null));
        echo ";
  var mailpoet_form_pages = ";
        // line 26
        echo json_encode(($context["pages"] ?? null));
        echo ";
  var mailpoet_custom_fields = ";
        // line 27
        echo json_encode(($context["custom_fields"] ?? null));
        echo ";
  var mailpoet_date_types = ";
        // line 28
        echo json_encode(($context["date_types"] ?? null));
        echo ";
  var mailpoet_date_formats = ";
        // line 29
        echo json_encode(($context["date_formats"] ?? null));
        echo ";
  var mailpoet_month_names = ";
        // line 30
        echo json_encode(($context["month_names"] ?? null));
        echo ";
  var mailpoet_form_preview_page = ";
        // line 31
        echo json_encode(($context["preview_page_url"] ?? null));
        echo ";
  ";
        // line 33
        echo "</script>

<style id=\"mailpoet-form-editor-form-styles\"></style>
";
    }

    // line 38
    public function block_translations($context, array $blocks = [])
    {
        // line 39
        echo $this->env->getExtension('MailPoet\Twig\I18n')->localize(["addFormName" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Add form name", "A placeholder for form name input"), "changesNotSaved" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Your changes you made may not be saved"), "back" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Back"), "form" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Form"), "formSettings" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Settings", "A settings section heading"), "formSettingsStyles" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Styles"), "formSettingsStylesBackgroundColor" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Background Color"), "formSettingsStylesFontSize" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Font Size"), "formSettingsStylesFontColor" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Font Color"), "formSettingsStylesFontColorInherit" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Inherit from theme"), "formSettingsInheritStyleFromTheme" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Inherit style from theme"), "formSettingsDisplayFullWidth" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Display Fullwidth", "A label for checkbox in form style settings"), "formSettingsBold" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Bold", "A label for checkbox in form style settings"), "formSettingsBorderSize" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Border Size", "A label for checkbox in form style settings"), "formSettingsBorderRadius" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Border Radius", "A label for checkbox in form style settings"), "formSettingsBorderColor" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Border Color", "A label for checkbox in form style settings"), "formSettingsApplyToAll" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Apply styles to all inputs"), "customFieldSettings" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Custom field settings", "A settings section heading"), "customFieldsFormSettings" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Form settings", "A settings section heading"), "formPlacement" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Form Placement", "A settings section heading"), "formPlacementLabel" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Form placement", "A label for a select box"), "customCss" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Custom CSS", "A settings section heading"), "formSaved" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Form saved."), "customFieldSaved" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Custom field saved."), "placeFixedBarFormOnPages" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Fixed bar", "This is a text on a widget that leads to settings for form placement - form type is fixed bar"), "placeFixedBarFormOnPagesDescription" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Display your form in a fixed horizontal bar at the top or bottom of posts or pages."), "placeSlideInFormOnPages" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Slide–in", "This is a text on a widget that leads to settings for form placement - form type is slide in"), "placeSlideInFormOnPagesDescription" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Display your form in a slide–in form on top of your page content."), "placePopupFormOnPages" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Pop up", "This is a text on a widget that leads to settings for form placement - form type is pop up, it will be displayed on page in a small modal window"), "placePopupFormOnPagesDescription" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Display your form in a pop up window."), "placeFormBellowPages" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Below pages", "This is a text on a widget that leads to settings for form placement"), "placeFormBellowPagesDescription" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("This form placement allows you to add this form at the end of all the pages or posts, below the content."), "placeFormBellowAllPages" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Display on all pages", "This is a text on a switch if a form should be displayed bellow all pages"), "placeFormBellowAllPosts" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Display on all posts", "This is a text on a switch if a form should be displayed bellow all posts"), "placeFormOthers" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Others (widget)", "Placement of the form using theme widget"), "formPlacementDelay" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Display with a delay of", "Label on a selection of different times"), "formPlacementPlacementPosition" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Position", "Placement of a fixed bar form, on top of the page or on the bottom"), "formPlacementPlacementPositionTop" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("top", "Placement of a fixed bar form, on top of the page or on the bottom"), "formPlacementPlacementPositionBottom" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("bottom", "Placement of a fixed bar form, on top of the page or on the bottom"), "formPlacementPlacementPositionLeft" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("left", "Placement of a slide in form, on the left or right side of the page"), "formPlacementPlacementPositionRight" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("right", "Placement of a slide in  form, on the left or right side of the page"), "formPlacementDelaySeconds" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("%1s sec", "times selection should be in the end \"30 sec\""), "formPlacementSave" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Save", "Text on a button to save a form"), "addFormWidgetHint" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Add this form to a [link]widget area[/link]."), "addFormShortcodeHint" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("[link]Use Gutenberg block[/link] available on any page or post. Or use the shortcode [shortcode]."), "addFormPhpIframeHint" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Use [link]PHP[/link] or [link]iFrame[/link]."), "settingsListLabel" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("This form adds the subscribers to these lists"), "settingsAfterSubmit" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("After submit…"), "settingsShowMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Show message"), "settingsGoToPage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Go to Page"), "settingsPleaseSelectList" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Please select a list"), "fieldsBlocksCategory" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Fields"), "customFieldsBlocksCategory" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Custom Fields"), "layoutBlocksCategory" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Layout"), "customFieldNumberOfLines" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Number of lines"), "customFieldSaveCTA" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Update custom field", "Text on the save button"), "customFieldDeleteCTA" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Delete this custom field", "Text on the delete button"), "customFieldDeleteConfirm" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("This field will be deleted for all your subscribers. Are you sure?"), "customFieldTypeText" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Text Input"), "customFieldTypeTextarea" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Text Area"), "customFieldTypeRadio" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Radio buttons"), "customFieldTypeCheckbox" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Checkbox"), "customFieldTypeSelect" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Select", "Form input type"), "customFieldTypeDate" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Date"), "customFieldDateType" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Type of date"), "customFieldDateFormat" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Order"), "customFieldDefaultToday" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Preselect today’s date"), "customFieldDay" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Day"), "customFieldMonth" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Month"), "customFieldYear" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Year"), "customField1Line" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("1 line", "Number of rows in textarea"), "customField2Lines" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("2 lines", "Number of rows in textarea"), "customField3Lines" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("3 lines", "Number of rows in textarea"), "customField4Lines" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("4 lines", "Number of rows in textarea"), "customField5Lines" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("5 lines", "Number of rows in textarea"), "customFieldValidateFor" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Validate for"), "customFieldValidateNothing" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Nothing"), "customFieldValidateNumbersOnly" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Numbers only"), "customFieldValidateAlphanumerical" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Alphanumerical"), "customFieldValidatePhoneNumber" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Phone number, (+,-,#,(,) and spaces allowed)"), "customFieldAddItem" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Add item"), "blockMandatory" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Mandatory field"), "blockFirstName" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("First name"), "blockFirstNameDescription" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Input field used to catch subscribers’ first names."), "blockLastName" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Last name"), "blockLastNameDescription" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Input field used to catch subscribers’ last names."), "blockSegmentSelect" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("List selection"), "blockLastNameDescription" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Allow your subscribers to select which list(s) they want to subscribe to."), "blockSegmentSelectLabel" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Select list(s):"), "blockSegmentSelectNoLists" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Please select at least one list"), "blockSegmentSelectListLabel" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Select the segment that you want to add"), "blockEmail" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Email"), "blockEmailDescription" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Input field used to catch subscribers’ email addresses."), "blockSubmit" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Submit button"), "blockSubmitDescription" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Button used to submit the form."), "blockSubmitLabel" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Subscribe!", "a default value for a subscription form button"), "missingObligatoryBlock" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Email input or submit is missing. Try reloading the form editor."), "label" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Label", "settings for a label of an input"), "displayLabelWithinInput" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Display label within input"), "displayLabel" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Display label", "Settings - if label should be displayed"), "blockDivider" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Divider"), "blockCustomHtml" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Custom HTML"), "blockCustomHtmlDescription" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Display custom text or HTML code in your form."), "blockCustomHtmlDefault" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Subscribe to our newsletter and join [mailpoet_subscribers_count] other subscribers."), "blockCustomHtmlContentLabel" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Custom text", "Textarea label"), "blockCustomHtmlNl2br" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Automatically add paragraphs"), "blockAddCustomField" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Create Custom Field"), "blockAddCustomFieldDescription" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Create a new custom field for your subscribers."), "blockAddCustomFieldFormHeading" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("New Custom Field."), "blockCreateButton" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Create", "Label on form submit button."), "customFieldName" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Field name", "Label for form field for custom input name"), "selectCustomFieldType" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Select a field type", "Label for form field for custom input type"), "customFieldWithNameExists" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("The custom field [name] already exists. Please choose another name."), "successMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("This is what the success message looks like."), "errorMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("This is what the error message looks like."), "formPreview" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Form Preview"), "formPreviewDesktop" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Desktop", "Desktop browser preview mode"), "formPreviewMobile" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Mobile", "Mobile browser preview mode"), "formPreviewOthersDisclaimer" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Psssst. We try our best to show you what the widget might look like, but better check the final result on your website."), "noName" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("no name", "fallback for forms without a name in a form list")]);
        // line 160
        echo "
";
    }

    // line 163
    public function block_after_javascript($context, array $blocks = [])
    {
        // line 164
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateJavascript("form_editor.js");
        echo "
";
    }

    public function getTemplateName()
    {
        return "form/editor.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  130 => 164,  127 => 163,  122 => 160,  120 => 39,  117 => 38,  110 => 33,  106 => 31,  102 => 30,  98 => 29,  94 => 28,  90 => 27,  86 => 26,  82 => 25,  78 => 24,  73 => 23,  58 => 9,  55 => 8,  49 => 5,  45 => 4,  42 => 3,  32 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "form/editor.html", "/home/u20s1035/dev_root/wp-content/plugins/mailpoet/views/form/editor.html");
    }
}
