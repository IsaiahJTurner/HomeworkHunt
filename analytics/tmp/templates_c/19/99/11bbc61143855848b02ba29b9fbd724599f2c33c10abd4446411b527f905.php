<?php

/* @ScheduledReports/index.twig */
class __TwigTemplate_199911bbc61143855848b02ba29b9fbd724599f2c33c10abd4446411b527f905 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("dashboard.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "dashboard.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
";
        // line 5
        $this->env->loadTemplate("@CoreHome/_siteSelectHeader.twig")->display($context);
        // line 6
        echo "
<div class=\"top_controls\">
    ";
        // line 8
        $this->env->loadTemplate("@CoreHome/_periodSelect.twig")->display($context);
        // line 9
        echo "</div>

<div class=\"centerLargeDiv\">
    <h2 piwik-enriched-headline
        help-url=\"http://piwik.org/docs/email-reports/\">";
        // line 13
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_ManageEmailReports")), "html", null, true);
        echo "</h2>
    <span id=\"reportSentSuccess\"></span>
    <span id=\"reportUpdatedSuccess\"></span>

    <div class=\"entityContainer\">
        ";
        // line 18
        $context["ajax"] = $this->env->loadTemplate("ajaxMacros.twig");
        // line 19
        echo "        ";
        echo $context["ajax"]->geterrorDiv();
        echo "
        ";
        // line 20
        echo $context["ajax"]->getloadingDiv();
        echo "
        ";
        // line 21
        $this->env->loadTemplate("@ScheduledReports/_listReports.twig")->display($context);
        // line 22
        echo "        ";
        $this->env->loadTemplate("@ScheduledReports/_addReport.twig")->display($context);
        // line 23
        echo "        <a id='bottom'></a>
    </div>
</div>

<div class=\"ui-confirm\" id=\"confirm\">
    <h2>";
        // line 28
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_AreYouSureDeleteReport")), "html", null, true);
        echo "</h2>
    <input role=\"yes\" type=\"button\" value=\"";
        // line 29
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Yes")), "html", null, true);
        echo "\"/>
    <input role=\"no\" type=\"button\" value=\"";
        // line 30
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_No")), "html", null, true);
        echo "\"/>
</div>

<script type=\"text/javascript\">
    var ReportPlugin = {};
    ReportPlugin.defaultPeriod = '";
        // line 35
        echo twig_escape_filter($this->env, (isset($context["defaultPeriod"]) ? $context["defaultPeriod"] : $this->getContext($context, "defaultPeriod")), "html", null, true);
        echo "';
    ReportPlugin.defaultHour = '";
        // line 36
        echo twig_escape_filter($this->env, (isset($context["defaultHour"]) ? $context["defaultHour"] : $this->getContext($context, "defaultHour")), "html", null, true);
        echo "';
    ReportPlugin.defaultReportType = '";
        // line 37
        echo twig_escape_filter($this->env, (isset($context["defaultReportType"]) ? $context["defaultReportType"] : $this->getContext($context, "defaultReportType")), "html", null, true);
        echo "';
    ReportPlugin.defaultReportFormat = '";
        // line 38
        echo twig_escape_filter($this->env, (isset($context["defaultReportFormat"]) ? $context["defaultReportFormat"] : $this->getContext($context, "defaultReportFormat")), "html", null, true);
        echo "';
    ReportPlugin.reportList = ";
        // line 39
        echo (isset($context["reportsJSON"]) ? $context["reportsJSON"] : $this->getContext($context, "reportsJSON"));
        echo ";
    ReportPlugin.createReportString = \"";
        // line 40
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_CreateReport")), "html", null, true);
        echo "\";
    ReportPlugin.updateReportString = \"";
        // line 41
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_UpdateReport")), "html", null, true);
        echo "\";
    \$(function () {
        initManagePdf();
    });
</script>
<style type=\"text/css\">
    .reportCategory {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .entityAddContainer {
        position:relative;
    }

    .entityAddContainer > .entityCancel:first-child {
        position: absolute;
        right:0;
        bottom:100%;
    }
</style>
";
    }

    public function getTemplateName()
    {
        return "@ScheduledReports/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 41,  115 => 40,  111 => 39,  107 => 38,  103 => 37,  99 => 36,  95 => 35,  87 => 30,  83 => 29,  79 => 28,  72 => 23,  69 => 22,  67 => 21,  63 => 20,  58 => 19,  56 => 18,  48 => 13,  42 => 9,  40 => 8,  36 => 6,  34 => 5,  31 => 4,  28 => 3,);
    }
}
