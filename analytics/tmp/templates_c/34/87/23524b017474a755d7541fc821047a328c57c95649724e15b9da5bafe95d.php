<?php

/* @Live/_dataTableViz_visitorLog.twig */
class __TwigTemplate_348723524b017474a755d7541fc821047a328c57c95649724e15b9da5bafe95d extends Twig_Template
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
        $context["displayVisitorsInOwnColumn"] = (((isset($context["isWidget"]) ? $context["isWidget"] : $this->getContext($context, "isWidget"))) ? (false) : (true));
        // line 2
        $context["displayReferrersInOwnColumn"] = (($this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : $this->getContext($context, "clientSideParameters")), "smallWidth")) ? (false) : (true));
        // line 3
        echo "<table class=\"dataTable\" cellspacing=\"0\" width=\"100%\" style=\"width:100%;table-layout:fixed;\">
<thead>
<tr>
    <th style=\"display:none;\"></th>
    <th id=\"label\" class=\"sortable label\" style=\"cursor: auto;width:190px;\" width=\"190px\">
        <div id=\"thDIV\">";
        // line 8
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Date")), "html", null, true);
        echo "</div>
    </th>
    ";
        // line 10
        if ((isset($context["displayVisitorsInOwnColumn"]) ? $context["displayVisitorsInOwnColumn"] : $this->getContext($context, "displayVisitorsInOwnColumn"))) {
            // line 11
            echo "        <th id=\"label\" class=\"sortable label\" style=\"cursor: auto;width:225px;\" width=\"225px\">
            <div id=\"thDIV\">";
            // line 12
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Visitors")), "html", null, true);
            echo "</div>
        </th>
    ";
        }
        // line 15
        echo "    ";
        if ((isset($context["displayReferrersInOwnColumn"]) ? $context["displayReferrersInOwnColumn"] : $this->getContext($context, "displayReferrersInOwnColumn"))) {
            // line 16
            echo "    <th id=\"label\" class=\"sortable label\" style=\"cursor: auto;width:230px;\" width=\"230px\">
        <div id=\"thDIV\">";
            // line 17
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_Referrer_URL")), "html", null, true);
            echo "</div>
    </th>
    ";
        }
        // line 20
        echo "    <th id=\"label\" class=\"sortable label\" style=\"cursor: auto;\">
        <div id=\"thDIV\">";
        // line 21
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnNbActions")), "html", null, true);
        echo "</div>
    </th>
</tr>
</thead>
<tbody>
";
        // line 26
        $context["cycleIndex"] = 0;
        // line 27
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["dataTable"]) ? $context["dataTable"] : $this->getContext($context, "dataTable")), "getRows", array(), "method"));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["visitor"]) {
            // line 28
            echo "    ";
            $context["breakBeforeVisitorRank"] = ((($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "visitEcommerceStatusIcon"), "method") && $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "visitorTypeIcon"), "method"))) ? (true) : (false));
            // line 29
            echo "    ";
            ob_start();
            // line 30
            echo "        <img src=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "countryFlag"), "method"), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "location"), "method"), "html", null, true);
            echo ", Provider ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "providerName"), "method"), "html", null, true);
            echo "\"/>
        &nbsp;
        ";
            // line 32
            if ($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "plugins"), "method")) {
                // line 33
                echo "        <img src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "browserIcon"), "method"), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserSettings_BrowserWithPluginsEnabled", $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "browserName"), "method"), $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "plugins"), "method"))), "html", null, true);
                echo "\"/>
        ";
            } else {
                // line 35
                echo "        <img src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "browserIcon"), "method"), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserSettings_BrowserWithNoPluginsEnabled", $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "browserName"), "method"))), "html", null, true);
                echo "\"/>
        ";
            }
            // line 37
            echo "        &nbsp;
        <img src=\"";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "operatingSystemIcon"), "method"), "html", null, true);
            echo "\"
             title=\"";
            // line 39
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "operatingSystem"), "method"), "html", null, true);
            echo ", ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "resolution"), "method"), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "screenType"), "method"), "html", null, true);
            echo ")\"/>
        ";
            // line 40
            if ($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "visitorTypeIcon"), "method")) {
                // line 41
                echo "            &nbsp;-
            <img src=\"";
                // line 42
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "visitorTypeIcon"), "method"), "html", null, true);
                echo "\"
                 title=\"";
                // line 43
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ReturningVisitor")), "html", null, true);
                echo " - ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_NVisits", $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "visitCount"), "method"))), "html", null, true);
                echo "\"/>
        ";
            }
            // line 45
            echo "        ";
            if (((!(isset($context["displayVisitorsInOwnColumn"]) ? $context["displayVisitorsInOwnColumn"] : $this->getContext($context, "displayVisitorsInOwnColumn"))) || (isset($context["breakBeforeVisitorRank"]) ? $context["breakBeforeVisitorRank"] : $this->getContext($context, "breakBeforeVisitorRank")))) {
                echo "<br/><br />";
            }
            // line 46
            echo "        ";
            if ($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "visitConverted"), "method")) {
                // line 47
                echo "            <span title=\"";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_VisitConvertedNGoals", $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "goalConversions"), "method"))), "html", null, true);
                echo "\" class='visitorRank'
                  ";
                // line 48
                if (((!(isset($context["displayVisitorsInOwnColumn"]) ? $context["displayVisitorsInOwnColumn"] : $this->getContext($context, "displayVisitorsInOwnColumn"))) || (isset($context["breakBeforeVisitorRank"]) ? $context["breakBeforeVisitorRank"] : $this->getContext($context, "breakBeforeVisitorRank")))) {
                    echo "style=\"margin-left:0;\"";
                }
                echo ">
            <img src=\"";
                // line 49
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "visitConvertedIcon"), "method"), "html", null, true);
                echo "\"/>
            <span class='hash'>#</span>
            ";
                // line 51
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "goalConversions"), "method"), "html", null, true);
                echo "
            ";
                // line 52
                if ($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "visitEcommerceStatusIcon"), "method")) {
                    // line 53
                    echo "                &nbsp;-
                <img src=\"";
                    // line 54
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "visitEcommerceStatusIcon"), "method"), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "visitEcommerceStatus"), "method"), "html", null, true);
                    echo "\"/>
            ";
                }
                // line 56
                echo "            </span>
        ";
            }
            // line 58
            echo "        ";
            if ((!(isset($context["displayVisitorsInOwnColumn"]) ? $context["displayVisitorsInOwnColumn"] : $this->getContext($context, "displayVisitorsInOwnColumn")))) {
                echo "<br/><br />";
            }
            // line 59
            echo "        ";
            if ((isset($context["displayVisitorsInOwnColumn"]) ? $context["displayVisitorsInOwnColumn"] : $this->getContext($context, "displayVisitorsInOwnColumn"))) {
                // line 60
                echo "            ";
                if ((twig_length_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "pluginsIcons"), "method")) > 0)) {
                    // line 61
                    echo "                <hr/>
                ";
                    // line 62
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Plugins")), "html", null, true);
                    echo ":
                ";
                    // line 63
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "pluginsIcons"), "method"));
                    foreach ($context['_seq'] as $context["_key"] => $context["pluginIcon"]) {
                        // line 64
                        echo "                    <img src=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["pluginIcon"]) ? $context["pluginIcon"] : $this->getContext($context, "pluginIcon")), "pluginIcon"), "html", null, true);
                        echo "\" title=\"";
                        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute((isset($context["pluginIcon"]) ? $context["pluginIcon"] : $this->getContext($context, "pluginIcon")), "pluginName"), true), "html", null, true);
                        echo "\" alt=\"";
                        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute((isset($context["pluginIcon"]) ? $context["pluginIcon"] : $this->getContext($context, "pluginIcon")), "pluginName"), true), "html", null, true);
                        echo "\"/>
                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pluginIcon'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 66
                    echo "            ";
                }
                // line 67
                echo "        ";
            }
            // line 68
            echo "    ";
            $context["visitorColumnContent"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 69
            echo "
    ";
            // line 70
            ob_start();
            // line 71
            echo "    <div class=\"referrer\">
        ";
            // line 72
            if (($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "referrerType"), "method") == "website")) {
                // line 73
                echo "            ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Referrers_ColumnWebsite")), "html", null, true);
                echo ":
            <a href=\"";
                // line 74
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "referrerUrl"), "method"), "html", null, true);
                echo "\" target=\"_blank\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "referrerUrl"), "method"), "html", null, true);
                echo "\"
               style=\"text-decoration:underline;\">
                ";
                // line 76
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "referrerName"), "method"), "html", null, true);
                echo "
            </a>
        ";
            }
            // line 79
            echo "        ";
            if (($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "referrerType"), "method") == "campaign")) {
                // line 80
                echo "            ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Referrers_ColumnCampaign")), "html", null, true);
                echo "
            <br/>
            ";
                // line 82
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "referrerName"), "method"), "html", null, true);
                echo "
            ";
                // line 83
                if ((!twig_test_empty($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "referrerKeyword"), "method")))) {
                    echo " - ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "referrerKeyword"), "method"), "html", null, true);
                }
                // line 84
                echo "        ";
            }
            // line 85
            echo "        ";
            if (($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "referrerType"), "method") == "search")) {
                // line 86
                $context["keywordNotDefined"] = call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_NotDefined", call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnKeyword"))));
                // line 87
                $context["showKeyword"] = ((!twig_test_empty($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "referrerKeyword"), "method"))) && ($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "referrerKeyword"), "method") != (isset($context["keywordNotDefined"]) ? $context["keywordNotDefined"] : $this->getContext($context, "keywordNotDefined"))));
                // line 88
                if ($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "searchEngineIcon"), "method")) {
                    // line 89
                    echo "                <img src=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "searchEngineIcon"), "method"), "html", null, true);
                    echo "\" alt=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "referrerName"), "method"), "html", null, true);
                    echo "\"/>
            ";
                }
                // line 91
                echo "            <span ";
                if ((!(isset($context["showKeyword"]) ? $context["showKeyword"] : $this->getContext($context, "showKeyword")))) {
                    echo "title=\"";
                    echo twig_escape_filter($this->env, (isset($context["keywordNotDefined"]) ? $context["keywordNotDefined"] : $this->getContext($context, "keywordNotDefined")), "html", null, true);
                    echo "\"";
                }
                echo ">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "referrerName"), "method"), "html", null, true);
                echo "</span>
            ";
                // line 92
                if ((isset($context["showKeyword"]) ? $context["showKeyword"] : $this->getContext($context, "showKeyword"))) {
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Referrers_Keywords")), "html", null, true);
                    echo ":
                <br/>
                <a href=\"";
                    // line 94
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "referrerUrl"), "method"), "html", null, true);
                    echo "\" target=\"_blank\" style=\"text-decoration:underline;\">
                    \"";
                    // line 95
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "referrerKeyword"), "method"), "html", null, true);
                    echo "\"</a>
            ";
                }
                // line 97
                echo "            ";
                ob_start();
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "referrerKeyword"), "method"), "html", null, true);
                $context["keyword"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 98
                echo "            ";
                ob_start();
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "referrerName"), "method"), "html", null, true);
                $context["searchName"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 99
                echo "            ";
                ob_start();
                echo "#";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "referrerKeywordPosition"), "method"), "html", null, true);
                $context["position"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 100
                echo "            ";
                if ($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "referrerKeywordPosition"), "method")) {
                    // line 101
                    echo "                <span title='";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_KeywordRankedOnSearchResultForThisVisitor", (isset($context["keyword"]) ? $context["keyword"] : $this->getContext($context, "keyword")), (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), (isset($context["searchName"]) ? $context["searchName"] : $this->getContext($context, "searchName")))), "html", null, true);
                    echo "' class='visitorRank'>
                                <span class='hash'>#</span>
                    ";
                    // line 103
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "referrerKeywordPosition"), "method"), "html", null, true);
                    echo "
                            </span>
            ";
                }
                // line 106
                echo "        ";
            }
            // line 107
            echo "        ";
            if (($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "referrerType"), "method") == "direct")) {
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Referrers_DirectEntry")), "html", null, true);
            }
            // line 108
            echo "    </div>
    ";
            $context["referrerColumnContent"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 110
            echo "

    ";
            // line 112
            ob_start();
            // line 113
            echo "        <tr class=\"label";
            echo twig_escape_filter($this->env, twig_cycle(array(0 => "odd", 1 => "even"), (isset($context["cycleIndex"]) ? $context["cycleIndex"] : $this->getContext($context, "cycleIndex"))), "html", null, true);
            echo "\">
        ";
            // line 114
            $context["cycleIndex"] = ((isset($context["cycleIndex"]) ? $context["cycleIndex"] : $this->getContext($context, "cycleIndex")) + 1);
            // line 115
            echo "            <td style=\"display:none;\"></td>
            <td class=\"label\">
                <strong title=\"";
            // line 117
            if (($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "visitorType"), "method") == "new")) {
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_NewVisitor")), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_VisitorsLastVisit", $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "daysSinceLastVisit"), "method"))), "html", null, true);
            }
            echo "\">
                    ";
            // line 118
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "serverDatePrettyFirstAction"), "method"), "html", null, true);
            echo "
                    ";
            // line 119
            if ((isset($context["isWidget"]) ? $context["isWidget"] : $this->getContext($context, "isWidget"))) {
                echo "<br/>";
            } else {
                echo "-";
            }
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "serverTimePrettyFirstAction"), "method"), "html", null, true);
            echo "</strong>
                ";
            // line 120
            if ((!twig_test_empty($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "visitIp"), "method")))) {
                // line 121
                echo "                    <br/>
                <span title=\"";
                // line 122
                if ((!twig_test_empty($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "visitorId"), "method")))) {
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_VisitorID")), "html", null, true);
                    echo ": ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "visitorId"), "method"), "html", null, true);
                }
                // line 123
                if (($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "latitude"), "method") || $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "longitude"), "method"))) {
                    // line 124
                    echo "
";
                    // line 125
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "location"), "method"), "html", null, true);
                    echo "

GPS (lat/long): ";
                    // line 127
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "latitude"), "method"), "html", null, true);
                    echo ",";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "longitude"), "method"), "html", null, true);
                }
                echo "\">
                    IP: ";
                // line 128
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "visitIp"), "method"), "html", null, true);
                echo "</span>";
            }
            // line 129
            echo "
                ";
            // line 130
            if (($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "provider"), "method") && ($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "providerName"), "method") != "IP"))) {
                // line 131
                echo "                    <br/>
                    ";
                // line 132
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Provider_ColumnProvider")), "html", null, true);
                echo ":
                    <a href=\"";
                // line 133
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "providerUrl"), "method"), "html", null, true);
                echo "\" target=\"_blank\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "providerUrl"), "method"), "html", null, true);
                echo "\" style=\"text-decoration:underline;\">
                        ";
                // line 134
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "providerName"), "method"), "html", null, true);
                echo "
                    </a>
                ";
            }
            // line 137
            echo "                ";
            if ($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "customVariables"), "method")) {
                // line 138
                echo "                    <br/>
                    ";
                // line 139
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "customVariables"), "method"));
                foreach ($context['_seq'] as $context["id"] => $context["customVariable"]) {
                    // line 140
                    echo "                        ";
                    $context["name"] = ("customVariableName" . (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")));
                    // line 141
                    echo "                        ";
                    $context["value"] = ("customVariableValue" . (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")));
                    // line 142
                    echo "                        <br/>
                        <acronym title=\"";
                    // line 143
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CustomVariables_CustomVariables")), "html", null, true);
                    echo " (index ";
                    echo twig_escape_filter($this->env, (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "html", null, true);
                    echo ")\">
                            ";
                    // line 144
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('truncate')->getCallable(), array($this->getAttribute((isset($context["customVariable"]) ? $context["customVariable"] : $this->getContext($context, "customVariable")), (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), array(), "array"), 30)), "html", null, true);
                    echo "
                        </acronym>
                    ";
                    // line 146
                    if ((twig_length_filter($this->env, $this->getAttribute((isset($context["customVariable"]) ? $context["customVariable"] : $this->getContext($context, "customVariable")), (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), array(), "array")) > 0)) {
                        echo ": ";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('truncate')->getCallable(), array($this->getAttribute((isset($context["customVariable"]) ? $context["customVariable"] : $this->getContext($context, "customVariable")), (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), array(), "array"), 50)), "html", null, true);
                    }
                    // line 147
                    echo "                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['id'], $context['customVariable'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 148
                echo "                ";
            }
            // line 149
            echo "                ";
            if ((!(isset($context["displayVisitorsInOwnColumn"]) ? $context["displayVisitorsInOwnColumn"] : $this->getContext($context, "displayVisitorsInOwnColumn")))) {
                // line 150
                echo "                    <br/>
                    ";
                // line 151
                echo twig_escape_filter($this->env, (isset($context["visitorColumnContent"]) ? $context["visitorColumnContent"] : $this->getContext($context, "visitorColumnContent")), "html", null, true);
                echo "
                ";
            }
            // line 153
            echo "                ";
            if ((!(isset($context["displayReferrersInOwnColumn"]) ? $context["displayReferrersInOwnColumn"] : $this->getContext($context, "displayReferrersInOwnColumn")))) {
                // line 154
                echo "                    <br/>
                    ";
                // line 155
                echo twig_escape_filter($this->env, (isset($context["referrerColumnContent"]) ? $context["referrerColumnContent"] : $this->getContext($context, "referrerColumnContent")), "html", null, true);
                echo "
                ";
            }
            // line 157
            echo "            </td>

            ";
            // line 159
            if ((isset($context["displayVisitorsInOwnColumn"]) ? $context["displayVisitorsInOwnColumn"] : $this->getContext($context, "displayVisitorsInOwnColumn"))) {
                // line 160
                echo "                <td class=\"label\">
                    ";
                // line 161
                echo twig_escape_filter($this->env, (isset($context["visitorColumnContent"]) ? $context["visitorColumnContent"] : $this->getContext($context, "visitorColumnContent")), "html", null, true);
                echo "
                </td>
            ";
            }
            // line 164
            echo "
            ";
            // line 165
            if ((isset($context["displayReferrersInOwnColumn"]) ? $context["displayReferrersInOwnColumn"] : $this->getContext($context, "displayReferrersInOwnColumn"))) {
                // line 166
                echo "                <td class=\"column\">
                    ";
                // line 167
                echo twig_escape_filter($this->env, (isset($context["referrerColumnContent"]) ? $context["referrerColumnContent"] : $this->getContext($context, "referrerColumnContent")), "html", null, true);
                echo "
                </td>
            ";
            }
            // line 170
            echo "
            <td class=\"column ";
            // line 171
            if (($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "visitConverted"), "method") && (!(isset($context["isWidget"]) ? $context["isWidget"] : $this->getContext($context, "isWidget"))))) {
                echo "highlightField";
            }
            echo "\">
                <div class=\"visitor-log-page-list\">
                    ";
            // line 173
            if ((!twig_test_empty($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "visitorId"), "method")))) {
                // line 174
                echo "                    <a class=\"visitor-log-visitor-profile-link\" title=\"";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_ViewVisitorProfile")), "html", null, true);
                echo "\" data-visitor-id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "visitorId"), "method"), "html", null, true);
                echo "\">
                        <img src=\"plugins/Live/images/visitorProfileLaunch.png\"/> <span>";
                // line 175
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_ViewVisitorProfile")), "html", null, true);
                echo "</span>
                    </a>
                    ";
            }
            // line 178
            echo "                    <strong>
                        ";
            // line 179
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "actionDetails"), "method")), "html", null, true);
            echo "
                        ";
            // line 180
            if ((twig_length_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "actionDetails"), "method")) <= 1)) {
                // line 181
                echo "                            ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Action")), "html", null, true);
                echo "
                        ";
            } else {
                // line 183
                echo "                            ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Actions")), "html", null, true);
                echo "
                        ";
            }
            // line 185
            echo "                        ";
            if (($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "visitDuration"), "method") > 0)) {
                echo "- ";
                echo $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "visitDurationPretty"), "method");
            }
            // line 186
            echo "                    </strong>
                    <br/>
                    <ol class='visitorLog'>
                        ";
            // line 189
            $this->env->loadTemplate("@Live/_actionsList.twig")->display(array_merge($context, array("actionDetails" => $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getColumn", array(0 => "actionDetails"), "method"))));
            // line 190
            echo "                    </ol>
                </div>
            </td>
        </tr>
    ";
            $context["visitorRow"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 195
            echo "
    ";
            // line 196
            if (((!$this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : $this->getContext($context, "clientSideParameters")), "filterEcommerce")) || $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "getMetadata", array(0 => "hasEcommerce"), "method"))) {
                // line 197
                echo "        ";
                echo twig_escape_filter($this->env, (isset($context["visitorRow"]) ? $context["visitorRow"] : $this->getContext($context, "visitorRow")), "html", null, true);
                echo "
    ";
            }
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['visitor'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 200
        echo "
</tbody>
</table>";
    }

    public function getTemplateName()
    {
        return "@Live/_dataTableViz_visitorLog.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  655 => 200,  637 => 197,  635 => 196,  632 => 195,  625 => 190,  623 => 189,  618 => 186,  612 => 185,  606 => 183,  600 => 181,  598 => 180,  594 => 179,  591 => 178,  585 => 175,  578 => 174,  576 => 173,  569 => 171,  566 => 170,  560 => 167,  557 => 166,  555 => 165,  552 => 164,  546 => 161,  543 => 160,  541 => 159,  537 => 157,  532 => 155,  529 => 154,  526 => 153,  521 => 151,  518 => 150,  515 => 149,  512 => 148,  506 => 147,  501 => 146,  496 => 144,  490 => 143,  487 => 142,  484 => 141,  481 => 140,  477 => 139,  474 => 138,  471 => 137,  465 => 134,  459 => 133,  455 => 132,  452 => 131,  450 => 130,  447 => 129,  443 => 128,  436 => 127,  431 => 125,  428 => 124,  426 => 123,  420 => 122,  417 => 121,  415 => 120,  405 => 119,  401 => 118,  393 => 117,  389 => 115,  387 => 114,  382 => 113,  380 => 112,  376 => 110,  372 => 108,  367 => 107,  364 => 106,  358 => 103,  352 => 101,  349 => 100,  343 => 99,  338 => 98,  333 => 97,  328 => 95,  324 => 94,  318 => 92,  307 => 91,  299 => 89,  297 => 88,  295 => 87,  293 => 86,  290 => 85,  287 => 84,  282 => 83,  278 => 82,  272 => 80,  269 => 79,  263 => 76,  256 => 74,  251 => 73,  249 => 72,  246 => 71,  244 => 70,  241 => 69,  238 => 68,  235 => 67,  232 => 66,  219 => 64,  215 => 63,  211 => 62,  208 => 61,  205 => 60,  202 => 59,  197 => 58,  193 => 56,  186 => 54,  183 => 53,  181 => 52,  177 => 51,  172 => 49,  166 => 48,  161 => 47,  158 => 46,  153 => 45,  146 => 43,  142 => 42,  139 => 41,  137 => 40,  129 => 39,  125 => 38,  122 => 37,  114 => 35,  106 => 33,  104 => 32,  94 => 30,  91 => 29,  88 => 28,  71 => 27,  69 => 26,  61 => 21,  58 => 20,  52 => 17,  49 => 16,  46 => 15,  40 => 12,  37 => 11,  35 => 10,  30 => 8,  23 => 3,  21 => 2,  19 => 1,);
    }
}
