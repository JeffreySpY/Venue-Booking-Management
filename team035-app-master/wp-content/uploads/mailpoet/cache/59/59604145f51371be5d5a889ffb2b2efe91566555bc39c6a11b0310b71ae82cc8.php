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

/* mss_pitch_translations.html */
class __TwigTemplate_c19fa771e380752cf97be7fe29cc5bb54666db954eadd5c48b3bcf47ffe2a259 extends \MailPoetVendor\Twig\Template
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
        echo $this->env->getExtension('MailPoet\Twig\I18n')->localize(["welcomeWizardMSSFreeTitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("MailPoet Premium is entirely free for you. Sign up!", "Promotion for our email sending service: Title"), "welcomeWizardMSSFreeSubtitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Did you know? Users with 1,000 subscribers or less get the Premium for free.", "Promotion for our email sending service: Paragraph"), "welcomeWizardMSSFreeListTitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("You’ll get", "Promotion for our email sending service: Paragraph"), "welcomeWizardMSSList1" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Access to detailed analytics", "Promotion for our email sending service: Feature item"), "welcomeWizardMSSList2" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("MailPoet sending your emails for great deliverability", "Promotion for our email sending service: Feature item"), "welcomeWizardMSSList4" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Fast, priority support", "Promotion for our email sending service: Feature item"), "welcomeWizardMSSList5" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("The MailPoet logo removed from the footer of your emails", "Promotion for our email sending service: Feature item"), "welcomeWizardMSSFreeButton" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Sign up for free!", "Promotion for our email sending service: Button"), "welcomeWizardMSSNotFreeTitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("It’s now time to take your MailPoet to the next level", "Promotion for our email sending service: Title"), "welcomeWizardMSSNotFreeSubtitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Starting at only \$13 per month, MailPoet Premium offers the following features", "Promotion for our email sending service: Paragraph"), "welcomeWizardMSSNotFreeButton" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Sign up now", "Promotion for our email sending service: Button"), "welcomeWizardMSSNoThanks" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("No thanks!", "Promotion for our email sending service: Skip link")]);
        // line 14
        echo "
";
    }

    public function getTemplateName()
    {
        return "mss_pitch_translations.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  32 => 14,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "mss_pitch_translations.html", "/home/u20s1035/dev_root/wp-content/plugins/mailpoet/views/mss_pitch_translations.html");
    }
}
