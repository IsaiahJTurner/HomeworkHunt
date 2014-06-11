<?php

/* @ScheduledReports/_addReport.twig */
class __TwigTemplate_71ea0a1db4f83068119eb9fcbf0924c254cb56db56b42e7161f1e9ad1af12261 extends Twig_Template
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
        echo "<div class=\"entityAddContainer\" style=\"display:none;\">
    <div class='entityCancel'>
        ";
        // line 3
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_CancelAndReturnToReports", "<a class='entityCancelLink'>", "</a>"));
        echo "
    </div>
    <div class='clear'></div>
    <form id='addEditReport'>
        <table class=\"dataTable entityTable\">
            <thead>
            <tr class=\"first\">
                <th colspan=\"2\">";
        // line 10
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_CreateAndScheduleReport")), "html", null, true);
        echo "</th>
            <tr>
            </thead>
            <tbody>
            <tr>
                <td class=\"first\">";
        // line 15
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Website")), "html", null, true);
        echo " </td>
                <td style=\"width:650px;\">
                    ";
        // line 17
        echo (isset($context["siteName"]) ? $context["siteName"] : $this->getContext($context, "siteName"));
        echo "
                </td>
            </tr>
            <tr>
                <td class=\"first\">";
        // line 21
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Description")), "html", null, true);
        echo " </td>
                <td>
                    <textarea cols=\"30\" rows=\"3\" id=\"report_description\" class=\"inp\"></textarea>

                    <div class=\"entityInlineHelp\">
                        ";
        // line 26
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_DescriptionOnFirstPage")), "html", null, true);
        echo "
                    </div>
                </td>
            </tr>
            ";
        // line 30
        if ((isset($context["segmentEditorActivated"]) ? $context["segmentEditorActivated"] : $this->getContext($context, "segmentEditorActivated"))) {
            // line 31
            echo "            <tr>
                <td class=\"first\">";
            // line 32
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("SegmentEditor_ChooseASegment")), "html", null, true);
            echo " </td>
                <td>
                    <select id='report_segment'>
                        <option value=\"\">";
            // line 35
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("SegmentEditor_DefaultAllVisits")), "html", null, true);
            echo "</option>
                        ";
            // line 36
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["savedSegmentsById"]) ? $context["savedSegmentsById"] : $this->getContext($context, "savedSegmentsById")));
            foreach ($context['_seq'] as $context["savedSegmentId"] => $context["savedSegmentName"]) {
                // line 37
                echo "                            <option value=\"";
                echo twig_escape_filter($this->env, (isset($context["savedSegmentId"]) ? $context["savedSegmentId"] : $this->getContext($context, "savedSegmentId")), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_slice($this->env, (isset($context["savedSegmentName"]) ? $context["savedSegmentName"] : $this->getContext($context, "savedSegmentName")), 0, 50), "html", null, true);
                echo "</option>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['savedSegmentId'], $context['savedSegmentName'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 39
            echo "                    </select>

                    <div class=\"entityInlineHelp\">
                        ";
            // line 42
            ob_start();
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("SegmentEditor_DefaultAllVisits")), "html", null, true);
            $context["SegmentEditor_DefaultAllVisits"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 43
            echo "                        ";
            ob_start();
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("SegmentEditor_AddNewSegment")), "html", null, true);
            $context["SegmentEditor_AddNewSegment"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 44
            echo "                        ";
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_Segment_Help", "<a href=\"./\" target=\"_blank\">", "</a>", (isset($context["SegmentEditor_DefaultAllVisits"]) ? $context["SegmentEditor_DefaultAllVisits"] : $this->getContext($context, "SegmentEditor_DefaultAllVisits")), (isset($context["SegmentEditor_AddNewSegment"]) ? $context["SegmentEditor_AddNewSegment"] : $this->getContext($context, "SegmentEditor_AddNewSegment"))));
            echo "
                    </div>
                </td>
            </tr>
            ";
        }
        // line 49
        echo "            <tr>
                <td class=\"first\">";
        // line 50
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_EmailSchedule")), "html", null, true);
        echo "</td>
                <td>
                    <select id=\"report_period\" class=\"inp\">
                        ";
        // line 53
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["periods"]) ? $context["periods"] : $this->getContext($context, "periods")));
        foreach ($context['_seq'] as $context["periodId"] => $context["period"]) {
            // line 54
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, (isset($context["periodId"]) ? $context["periodId"] : $this->getContext($context, "periodId")), "html", null, true);
            echo "\">
                                ";
            // line 55
            echo twig_escape_filter($this->env, (isset($context["period"]) ? $context["period"] : $this->getContext($context, "period")), "html", null, true);
            echo "
                            </option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['periodId'], $context['period'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 58
        echo "                    </select>

                    <div class=\"entityInlineHelp\">
                        ";
        // line 61
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_WeeklyScheduleHelp")), "html", null, true);
        echo "
                        <br/>
                        ";
        // line 63
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_MonthlyScheduleHelp")), "html", null, true);
        echo "
                        <br/>
                        ";
        // line 65
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_ReportHour")), "html", null, true);
        echo "
                        <input type=\"text\" style=\"height: 0.9em;padding-left: 5px;width: 35px;\" id=\"report_hour\" class=\"inp\" size=\"2\">
                        ";
        // line 67
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_OClock")), "html", null, true);
        echo "
                    </div>
                </td>
            </tr>

            <tr ";
        // line 72
        if ((twig_length_filter($this->env, (isset($context["reportTypes"]) ? $context["reportTypes"] : $this->getContext($context, "reportTypes"))) == 1)) {
            echo "style=\"display:none;\"";
        }
        echo ">
                <td class=\"first\">
                    ";
        // line 74
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_ReportType")), "html", null, true);
        echo "
                </td>
                <td>
                    <select id=\"report_type\">
                        ";
        // line 78
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["reportTypes"]) ? $context["reportTypes"] : $this->getContext($context, "reportTypes")));
        foreach ($context['_seq'] as $context["reportType"] => $context["reportTypeIcon"]) {
            // line 79
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, (isset($context["reportType"]) ? $context["reportType"] : $this->getContext($context, "reportType")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, (isset($context["reportType"]) ? $context["reportType"] : $this->getContext($context, "reportType"))), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['reportType'], $context['reportTypeIcon'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 81
        echo "                    </select>
                </td>
            </tr>

            <tr>
                <td class=\"first\">
                    ";
        // line 87
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_ReportFormat")), "html", null, true);
        echo "
                </td>

                <td>
                    ";
        // line 91
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["reportFormatsByReportType"]) ? $context["reportFormatsByReportType"] : $this->getContext($context, "reportFormatsByReportType")));
        foreach ($context['_seq'] as $context["reportType"] => $context["reportFormats"]) {
            // line 92
            echo "                        <select name='report_format' class='";
            echo twig_escape_filter($this->env, (isset($context["reportType"]) ? $context["reportType"] : $this->getContext($context, "reportType")), "html", null, true);
            echo "'>
                            ";
            // line 93
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["reportFormats"]) ? $context["reportFormats"] : $this->getContext($context, "reportFormats")));
            foreach ($context['_seq'] as $context["reportFormat"] => $context["reportFormatIcon"]) {
                // line 94
                echo "                                <option value=\"";
                echo twig_escape_filter($this->env, (isset($context["reportFormat"]) ? $context["reportFormat"] : $this->getContext($context, "reportFormat")), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_upper_filter($this->env, (isset($context["reportFormat"]) ? $context["reportFormat"] : $this->getContext($context, "reportFormat"))), "html", null, true);
                echo "</option>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['reportFormat'], $context['reportFormatIcon'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 96
            echo "                        </select>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['reportType'], $context['reportFormats'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 98
        echo "                </td>
            </tr>

            ";
        // line 101
        echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Template.reportParametersScheduledReports"));
        echo "

            <tr id=\"row_report_display_options\">
                <td class=\"first\">
                    ";
        // line 106
        echo "                    ";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_AggregateReportsFormat")), "html", null, true);
        echo "
                </td>
                <td>
                    <select id=\"display_format\">
                        ";
        // line 110
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["displayFormats"]) ? $context["displayFormats"] : $this->getContext($context, "displayFormats")));
        foreach ($context['_seq'] as $context["formatValue"] => $context["formatLabel"]) {
            // line 111
            echo "                            <option ";
            if (((isset($context["formatValue"]) ? $context["formatValue"] : $this->getContext($context, "formatValue")) == 1)) {
                echo "selected";
            }
            echo " value=\"";
            echo twig_escape_filter($this->env, (isset($context["formatValue"]) ? $context["formatValue"] : $this->getContext($context, "formatValue")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (isset($context["formatLabel"]) ? $context["formatLabel"] : $this->getContext($context, "formatLabel")), "html", null, true);
            echo "</option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['formatValue'], $context['formatLabel'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 113
        echo "                    </select>

                    <div class='report_evolution_graph'>
                        <br/>
                        <input type=\"checkbox\" id=\"report_evolution_graph\"/>
                        <label for=\"report_evolution_graph\"><em>";
        // line 118
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_EvolutionGraph", 5)), "html", null, true);
        echo "</em></label>
                    </div>
                </td>
            </tr>

            <tr>
                <td class=\"first\">";
        // line 124
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_ReportsIncluded")), "html", null, true);
        echo "</td>
                <td>
                    ";
        // line 126
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["reportsByCategoryByReportType"]) ? $context["reportsByCategoryByReportType"] : $this->getContext($context, "reportsByCategoryByReportType")));
        foreach ($context['_seq'] as $context["reportType"] => $context["reportsByCategory"]) {
            // line 127
            echo "                        <div name='reportsList' class='";
            echo twig_escape_filter($this->env, (isset($context["reportType"]) ? $context["reportType"] : $this->getContext($context, "reportType")), "html", null, true);
            echo "'>

                            ";
            // line 129
            if ($this->getAttribute((isset($context["allowMultipleReportsByReportType"]) ? $context["allowMultipleReportsByReportType"] : $this->getContext($context, "allowMultipleReportsByReportType")), (isset($context["reportType"]) ? $context["reportType"] : $this->getContext($context, "reportType")), array(), "array")) {
                // line 130
                echo "                                ";
                $context["reportInputType"] = "checkbox";
                // line 131
                echo "                            ";
            } else {
                // line 132
                echo "                                ";
                $context["reportInputType"] = "radio";
                // line 133
                echo "                            ";
            }
            // line 134
            echo "
                            ";
            // line 135
            $context["countCategory"] = 0;
            // line 136
            echo "
                            ";
            // line 137
            $context["newColumnAfter"] = intval(floor(((twig_length_filter($this->env, (isset($context["reportsByCategory"]) ? $context["reportsByCategory"] : $this->getContext($context, "reportsByCategory"))) + 1) / 2)));
            // line 138
            echo "
                            <div id='leftcolumn'>
                                ";
            // line 140
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["reportsByCategory"]) ? $context["reportsByCategory"] : $this->getContext($context, "reportsByCategory")));
            foreach ($context['_seq'] as $context["category"] => $context["reports"]) {
                // line 141
                echo "                                ";
                if ((((isset($context["countCategory"]) ? $context["countCategory"] : $this->getContext($context, "countCategory")) >= (isset($context["newColumnAfter"]) ? $context["newColumnAfter"] : $this->getContext($context, "newColumnAfter"))) && ((isset($context["newColumnAfter"]) ? $context["newColumnAfter"] : $this->getContext($context, "newColumnAfter")) != 0))) {
                    // line 142
                    echo "                                ";
                    $context["newColumnAfter"] = 0;
                    // line 143
                    echo "                            </div>
                            <div id='rightcolumn'>
                                ";
                }
                // line 146
                echo "                                <div class='reportCategory'>";
                echo twig_escape_filter($this->env, (isset($context["category"]) ? $context["category"] : $this->getContext($context, "category")), "html", null, true);
                echo "</div>
                                <ul class='listReports'>
                                    ";
                // line 148
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["reports"]) ? $context["reports"] : $this->getContext($context, "reports")));
                foreach ($context['_seq'] as $context["_key"] => $context["report"]) {
                    // line 149
                    echo "                                        <li>
                                            <input type='";
                    // line 150
                    echo twig_escape_filter($this->env, (isset($context["reportInputType"]) ? $context["reportInputType"] : $this->getContext($context, "reportInputType")), "html", null, true);
                    echo "' id=\"";
                    echo twig_escape_filter($this->env, (isset($context["reportType"]) ? $context["reportType"] : $this->getContext($context, "reportType")), "html", null, true);
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["report"]) ? $context["report"] : $this->getContext($context, "report")), "uniqueId"), "html", null, true);
                    echo "\" report-unique-id='";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["report"]) ? $context["report"] : $this->getContext($context, "report")), "uniqueId"), "html", null, true);
                    echo "'
                                                   name='";
                    // line 151
                    echo twig_escape_filter($this->env, (isset($context["reportType"]) ? $context["reportType"] : $this->getContext($context, "reportType")), "html", null, true);
                    echo "Reports'/>
                                            <label for=\"";
                    // line 152
                    echo twig_escape_filter($this->env, (isset($context["reportType"]) ? $context["reportType"] : $this->getContext($context, "reportType")), "html", null, true);
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["report"]) ? $context["report"] : $this->getContext($context, "report")), "uniqueId"), "html", null, true);
                    echo "\">
                                                ";
                    // line 153
                    echo $this->getAttribute((isset($context["report"]) ? $context["report"] : $this->getContext($context, "report")), "name");
                    echo "
                                                ";
                    // line 154
                    if (($this->getAttribute((isset($context["report"]) ? $context["report"] : $this->getContext($context, "report")), "uniqueId") == "MultiSites_getAll")) {
                        // line 155
                        echo "                                                    <div class=\"entityInlineHelp\">";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_ReportIncludeNWebsites", (isset($context["countWebsites"]) ? $context["countWebsites"] : $this->getContext($context, "countWebsites")))), "html", null, true);
                        // line 156
                        echo "</div>
                                                ";
                    }
                    // line 158
                    echo "                                            </label>
                                        </li>
                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['report'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 161
                echo "                                    ";
                $context["countCategory"] = ((isset($context["countCategory"]) ? $context["countCategory"] : $this->getContext($context, "countCategory")) + 1);
                // line 162
                echo "                                </ul>
                                <br/>
                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['category'], $context['reports'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 165
            echo "                            </div>
                        </div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['reportType'], $context['reportsByCategory'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 168
        echo "                </td>
            </tr>

            </tbody>
        </table>

        <input type=\"hidden\" id=\"report_idreport\" value=\"\">
        <input type=\"submit\" id=\"report_submit\" name=\"submit\" class=\"submit\"/>

    </form>
    <div class='entityCancel'>
        ";
        // line 179
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_OrCancel", "<a class='entityCancelLink'>", "</a>"));
        echo "
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@ScheduledReports/_addReport.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  448 => 179,  435 => 168,  427 => 165,  419 => 162,  416 => 161,  408 => 158,  404 => 156,  401 => 155,  399 => 154,  395 => 153,  390 => 152,  386 => 151,  377 => 150,  374 => 149,  370 => 148,  364 => 146,  359 => 143,  356 => 142,  353 => 141,  349 => 140,  345 => 138,  343 => 137,  340 => 136,  338 => 135,  335 => 134,  332 => 133,  329 => 132,  326 => 131,  323 => 130,  321 => 129,  315 => 127,  311 => 126,  306 => 124,  297 => 118,  290 => 113,  275 => 111,  271 => 110,  263 => 106,  251 => 98,  233 => 94,  229 => 93,  220 => 91,  213 => 87,  205 => 81,  194 => 79,  190 => 78,  183 => 74,  176 => 72,  168 => 67,  163 => 65,  158 => 63,  153 => 61,  148 => 58,  139 => 55,  130 => 53,  98 => 39,  73 => 32,  70 => 31,  68 => 30,  61 => 26,  53 => 21,  46 => 17,  23 => 3,  259 => 103,  256 => 101,  249 => 98,  246 => 97,  244 => 96,  241 => 95,  230 => 90,  224 => 92,  217 => 83,  211 => 81,  204 => 76,  200 => 75,  196 => 74,  191 => 73,  187 => 70,  181 => 67,  177 => 66,  172 => 65,  170 => 64,  160 => 61,  155 => 60,  149 => 58,  146 => 57,  142 => 54,  136 => 52,  134 => 54,  128 => 48,  124 => 50,  121 => 49,  112 => 44,  110 => 41,  106 => 40,  102 => 38,  97 => 37,  88 => 31,  78 => 26,  49 => 11,  45 => 10,  41 => 15,  37 => 8,  33 => 10,  29 => 6,  25 => 5,  19 => 1,  119 => 41,  115 => 43,  111 => 39,  107 => 43,  103 => 42,  99 => 36,  95 => 35,  87 => 37,  83 => 36,  79 => 35,  72 => 23,  69 => 22,  67 => 20,  63 => 19,  58 => 16,  56 => 15,  48 => 13,  42 => 9,  40 => 8,  36 => 6,  34 => 5,  31 => 4,  28 => 3,);
    }
}
