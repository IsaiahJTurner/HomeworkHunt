<?php

/* @ScheduledReports/_listReports.twig */
class __TwigTemplate_988da630ef6ab0d93c926e4c5195785c0ea0389fe78f95f81e110b2574f525ac extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div id='entityEditContainer'>
    <table class=\"dataTable entityTable\">
        <thead>
        <tr>
            <th class=\"first\">";
        // line 5
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Description")), "html", null, true);
        echo "</th>
            <th>";
        // line 6
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_EmailSchedule")), "html", null, true);
        echo "</th>
            <th>";
        // line 7
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_ReportFormat")), "html", null, true);
        echo "</th>
            <th>";
        // line 8
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_SendReportTo")), "html", null, true);
        echo "</th>
            <th>";
        // line 9
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Download")), "html", null, true);
        echo "</th>
            <th>";
        // line 10
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Edit")), "html", null, true);
        echo "</th>
            <th>";
        // line 11
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Delete")), "html", null, true);
        echo "</th>
        </tr>
        </thead>

        ";
        // line 15
        if (((isset($context["userLogin"]) ? $context["userLogin"] : $this->getContext($context, "userLogin")) == "anonymous")) {
            // line 16
            echo "        <tr>
            <td colspan='7'>
                <br/>
                ";
            // line 19
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_MustBeLoggedIn")), "html", null, true);
            echo "
                <br/>&rsaquo; <a href='index.php?module=";
            // line 20
            echo twig_escape_filter($this->env, (isset($context["loginModule"]) ? $context["loginModule"] : $this->getContext($context, "loginModule")), "html", null, true);
            echo "'>";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Login_LogIn")), "html", null, true);
            echo "</a>
                <br/><br/>
            </td>
        </tr>
    </table>
    ";
        } elseif (twig_test_empty((isset($context["reports"]) ? $context["reports"] : $this->getContext($context, "reports")))) {
            // line 26
            echo "    <tr>
        <td colspan='7'>
            <br/>
            ";
            // line 29
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_ThereIsNoReportToManage", (isset($context["siteName"]) ? $context["siteName"] : $this->getContext($context, "siteName"))));
            echo ".
            <br/><br/>
            <a onclick='' id='linkAddReport'>&rsaquo; ";
            // line 31
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_CreateAndScheduleReport")), "html", null, true);
            echo "</a>
            <br/><br/>
        </td>
    </tr>
    </table>
    ";
        } else {
            // line 37
            echo "    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["reports"]) ? $context["reports"] : $this->getContext($context, "reports")));
            foreach ($context['_seq'] as $context["_key"] => $context["report"]) {
                // line 38
                echo "        <tr>
            <td class=\"first\">
                ";
                // line 40
                echo $this->getAttribute((isset($context["report"]) ? $context["report"] : $this->getContext($context, "report")), "description");
                echo "
                ";
                // line 41
                if (((isset($context["segmentEditorActivated"]) ? $context["segmentEditorActivated"] : $this->getContext($context, "segmentEditorActivated")) && $this->getAttribute((isset($context["report"]) ? $context["report"] : $this->getContext($context, "report")), "idsegment"))) {
                    // line 42
                    echo "                    <div class=\"entityInlineHelp\" style=\"font-size: 9pt;\">
                        ";
                    // line 43
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["savedSegmentsById"]) ? $context["savedSegmentsById"] : $this->getContext($context, "savedSegmentsById")), $this->getAttribute((isset($context["report"]) ? $context["report"] : $this->getContext($context, "report")), "idsegment"), array(), "array"), "html", null, true);
                    echo "
                    </div>
                ";
                }
                // line 46
                echo "            </td>
            <td>";
                // line 47
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["periods"]) ? $context["periods"] : $this->getContext($context, "periods")), $this->getAttribute((isset($context["report"]) ? $context["report"] : $this->getContext($context, "report")), "period"), array(), "array"), "html", null, true);
                echo "
                <!-- Last sent on ";
                // line 48
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["report"]) ? $context["report"] : $this->getContext($context, "report")), "ts_last_sent"), "html", null, true);
                echo " -->
            </td>
            <td>
                ";
                // line 51
                if ((!twig_test_empty($this->getAttribute((isset($context["report"]) ? $context["report"] : $this->getContext($context, "report")), "format")))) {
                    // line 52
                    echo "                    ";
                    echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute((isset($context["report"]) ? $context["report"] : $this->getContext($context, "report")), "format")), "html", null, true);
                    echo "
                ";
                }
                // line 54
                echo "            </td>
            <td>
                ";
                // line 57
                echo "                ";
                if ((twig_length_filter($this->env, $this->getAttribute((isset($context["report"]) ? $context["report"] : $this->getContext($context, "report")), "recipients")) == 0)) {
                    // line 58
                    echo "                    ";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_NoRecipients")), "html", null, true);
                    echo "
                ";
                } else {
                    // line 60
                    echo "                    ";
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["report"]) ? $context["report"] : $this->getContext($context, "report")), "recipients"));
                    foreach ($context['_seq'] as $context["_key"] => $context["recipient"]) {
                        // line 61
                        echo "                        ";
                        echo twig_escape_filter($this->env, (isset($context["recipient"]) ? $context["recipient"] : $this->getContext($context, "recipient")), "html", null, true);
                        echo "
                        <br/>
                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['recipient'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 64
                    echo "                    ";
                    // line 65
                    echo "                    <a href=\"#\" idreport=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["report"]) ? $context["report"] : $this->getContext($context, "report")), "idreport"), "html", null, true);
                    echo "\" name=\"linkSendNow\" class=\"link_but\" style=\"margin-top:3px;\">
                        <img border=0 src='";
                    // line 66
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["reportTypes"]) ? $context["reportTypes"] : $this->getContext($context, "reportTypes")), $this->getAttribute((isset($context["report"]) ? $context["report"] : $this->getContext($context, "report")), "type"), array(), "array"), "html", null, true);
                    echo "'/>
                        ";
                    // line 67
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_SendReportNow")), "html", null, true);
                    echo "
                    </a>
                ";
                }
                // line 70
                echo "            </td>
            <td>
                ";
                // line 73
                echo "                <a href=\"";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('linkTo')->getCallable(), array(array("module" => "API", "segment" => null, "token_auth" => (isset($context["token_auth"]) ? $context["token_auth"] : $this->getContext($context, "token_auth")), "method" => "ScheduledReports.generateReport", "idReport" => $this->getAttribute((isset($context["report"]) ? $context["report"] : $this->getContext($context, "report")), "idreport"), "outputType" => (isset($context["downloadOutputType"]) ? $context["downloadOutputType"] : $this->getContext($context, "downloadOutputType")), "language" => (isset($context["language"]) ? $context["language"] : $this->getContext($context, "language"))))), "html", null, true);
                echo "\"
                   target=\"_blank\" name=\"linkDownloadReport\" id=\"";
                // line 74
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["report"]) ? $context["report"] : $this->getContext($context, "report")), "idreport"), "html", null, true);
                echo "\" class=\"link_but\">
                    <img src='";
                // line 75
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["reportFormatsByReportType"]) ? $context["reportFormatsByReportType"] : $this->getContext($context, "reportFormatsByReportType")), $this->getAttribute((isset($context["report"]) ? $context["report"] : $this->getContext($context, "report")), "type"), array(), "array"), $this->getAttribute((isset($context["report"]) ? $context["report"] : $this->getContext($context, "report")), "format"), array(), "array"), "html", null, true);
                echo "' border=\"0\"/>
                    ";
                // line 76
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Download")), "html", null, true);
                echo "
                </a>
            </td>
            <td>
                ";
                // line 81
                echo "                <a href='#' name=\"linkEditReport\" id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["report"]) ? $context["report"] : $this->getContext($context, "report")), "idreport"), "html", null, true);
                echo "\" class=\"link_but\">
                    <img src='plugins/Zeitgeist/images/ico_edit.png' border=\"0\"/>
                    ";
                // line 83
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Edit")), "html", null, true);
                echo "
                </a>
            </td>
            <td>
                ";
                // line 88
                echo "                <a href='#' name=\"linkDeleteReport\" id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["report"]) ? $context["report"] : $this->getContext($context, "report")), "idreport"), "html", null, true);
                echo "\" class=\"link_but\">
                    <img src='plugins/Zeitgeist/images/ico_delete.png' border=\"0\"/>
                    ";
                // line 90
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Delete")), "html", null, true);
                echo "
                </a>
            </td>
        </tr>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['report'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 95
            echo "    </table>
    ";
            // line 96
            if (((isset($context["userLogin"]) ? $context["userLogin"] : $this->getContext($context, "userLogin")) != "anonymous")) {
                // line 97
                echo "        <br/>
        <a onclick='' id='linkAddReport'>&rsaquo; ";
                // line 98
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_CreateAndScheduleReport")), "html", null, true);
                echo "</a>
        <br/>
        <br/>
    ";
            }
            // line 102
            echo "    ";
        }
        // line 103
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "@ScheduledReports/_listReports.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  259 => 103,  256 => 102,  249 => 98,  246 => 97,  244 => 96,  241 => 95,  230 => 90,  224 => 88,  217 => 83,  211 => 81,  204 => 76,  200 => 75,  196 => 74,  191 => 73,  187 => 70,  181 => 67,  177 => 66,  172 => 65,  170 => 64,  160 => 61,  155 => 60,  149 => 58,  146 => 57,  142 => 54,  136 => 52,  134 => 51,  128 => 48,  124 => 47,  121 => 46,  112 => 42,  110 => 41,  106 => 40,  102 => 38,  97 => 37,  88 => 31,  78 => 26,  49 => 11,  45 => 10,  41 => 9,  37 => 8,  33 => 7,  29 => 6,  25 => 5,  19 => 1,  119 => 41,  115 => 43,  111 => 39,  107 => 38,  103 => 37,  99 => 36,  95 => 35,  87 => 30,  83 => 29,  79 => 28,  72 => 23,  69 => 22,  67 => 20,  63 => 19,  58 => 16,  56 => 15,  48 => 13,  42 => 9,  40 => 8,  36 => 6,  34 => 5,  31 => 4,  28 => 3,);
    }
}
