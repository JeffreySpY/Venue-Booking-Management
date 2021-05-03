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

/* help.html */
class __TwigTemplate_9f744f56524102eb0307dbddcace29cd13a644ef296bc7818dc63157893fb5d5 extends \MailPoetVendor\Twig\Template
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
        $this->parent = $this->loadTemplate("layout.html", "help.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        // line 4
        echo "
<h1 class=\"title\">";
        // line 5
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Help");
        echo "</h1>

<div id=\"mailpoet_help\">

  <script type=\"text/javascript\">
    var systemInfoData = ";
        // line 10
        echo json_encode(($context["systemInfoData"] ?? null));
        echo ";
    var systemStatusData = ";
        // line 11
        echo json_encode(($context["systemStatusData"] ?? null));
        echo ";
  </script>

  <div id=\"help_container\"></div>

</div>

";
    }

    // line 19
    public function block_translations($context, array $blocks = [])
    {
        // line 20
        echo $this->env->getExtension('MailPoet\Twig\I18n')->localize(["tabKnowledgeBaseTitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Knowledge Base"), "tabSystemInfoTitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("System Info"), "tabSystemStatusTitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("System Status"), "tabYourPrivacyTitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Your Privacy"), "systemStatusIntroCron" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("For the plugin to work, it must be able to establish connection with the task scheduler."), "systemStatusIntroCronMSS" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("For the plugin to work, it must be able to establish connection with the task scheduler and the key activation/MailPoet sending service."), "systemStatusCronTitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Task Scheduler"), "systemStatusMSSTitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Key Activation and MailPoet Sending Service"), "systemStatusConnectionSuccessful" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Connection successful."), "systemStatusConnectionUnsuccessful" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Connection unsuccessful."), "systemStatusCronConnectionUnsuccessfulInfo" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Please consult our [link]knowledge base article[/link] for troubleshooting tips."), "systemStatusMSSConnectionUnsuccessfulInfo" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Please contact our technical support for assistance."), "knowledgeBaseIntro" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Click on one of these categories below to find more information:"), "knowledgeBaseButton" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Visit our Knowledge Base for more articles"), "systemInfoIntro" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("The information below is useful when you need to get in touch with our support. Just copy all the text below and paste it into a message to us."), "systemInfoDataError" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Sorry, there was an error, please try again later."), "systemStatusCronStatusTitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Cron"), "systemStatusQueueTitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Sending Queue"), "yourPrivacyContent1" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("MailPoet respects your privacy. We don’t track any information about your website or yourself without your explicit consent."), "yourPrivacyContent2" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("We track information, like your email & IP address, if you answer a survey in the plugin thanks to third party services, like PollDaddy for example."), "yourPrivacyContent3" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("If you send with MailPoet, we track data that is used to ensure that the service works correctly."), "yourPrivacyButton" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Read our Privacy Notice"), "lastUpdated" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Last updated", "A label in a status table e.g. Last updated: 2018-10-18 18:50"), "lastRunStarted" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Last run started", "A label in a status table e.g. Last run started: 2018-10-18 18:50"), "lastRunCompleted" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Last run completed", "A label in a status table e.g. Last run completed: 2018-10-18 18:50"), "lastSeenError" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Last seen error", "A label in a status table e.g. Last seen error: Process timeout"), "lastSeenErrorDate" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Last seen error date", "A label in a status table e.g. Last seen error date: 2018-10-18 18:50"), "unknown" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("unknown", "An unknown state is a status table e.g. Last run started: unknown"), "accessible" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Accessible", "A label in a status table e.g. Accessible: yes"), "status" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Status"), "yes" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("yes"), "no" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("no"), "none" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("none", "An empty state is a status table e.g. Error: none"), "running" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("running", "A state of a process."), "paused" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("paused", "A state of a process."), "cronWaiting" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("waiting for the next run", "A state of a process."), "startedAt" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Started at", "A label in a status table e.g. Started at: 2018-10-18 18:50"), "sentEmails" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Sent emails", "A label in a status table e.g. Sent emails: 50"), "retryAttempt" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Retry attempt", "A label in a status table e.g. Retry attempt: 2"), "retryAt" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Retry at", "A label in a status table e.g. Retry at: 2018-10-18 18:50"), "error" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Error", "A label in a status table e.g. Error: missing data"), "totalCompletedTasks" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Total completed tasks"), "totalScheduledTasks" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Total scheduled tasks"), "totalRunningTasks" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Total running tasks"), "totalPausedTasks" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Total paused tasks"), "scheduledTasks" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Scheduled tasks"), "runningTasks" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Running tasks"), "completedTasks" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Completed tasks"), "type" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Type", "Table column heading for task type."), "email" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Email"), "priority" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Priority", "Table column heading for task priority (number)."), "scheduledAt" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Scheduled At"), "updatedAt" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Updated At"), "nothingToShow" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Nothing to show."), "preview" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Preview", "Text of a link to email preview page.")]);
        // line 76
        echo "
";
    }

    public function getTemplateName()
    {
        return "help.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 76,  73 => 20,  70 => 19,  58 => 11,  54 => 10,  46 => 5,  43 => 4,  40 => 3,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "help.html", "/home/u20s1035/dev_root/wp-content/plugins/mailpoet/views/help.html");
    }
}
