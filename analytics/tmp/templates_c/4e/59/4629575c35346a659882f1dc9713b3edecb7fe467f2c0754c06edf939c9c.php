<?php

/* @Live/getLastVisitsStart.twig */
class __TwigTemplate_4e594629575c35346a659882f1dc9713b3edecb7fe467f2c0754c06edf939c9c extends Twig_Template
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
        // line 2
        $context["maxPagesDisplayedByVisitor"] = 100;
        // line 3
        echo "
<ul id='visitsLive'>
    ";
        // line 5
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["visitors"]) ? $context["visitors"] : $this->getContext($context, "visitors")));
        foreach ($context['_seq'] as $context["_key"] => $context["visitor"]) {
            // line 6
            echo "        <li id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "idVisit"), "html", null, true);
            echo "\" class=\"visit\">
            <div style=\"display:none;\" class=\"idvisit\">";
            // line 7
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "idVisit"), "html", null, true);
            echo "</div>
            <div title=\"";
            // line 8
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "actionDetails")), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Actions")), "html", null, true);
            echo "\" class=\"datetime\">
                <span style=\"display:none;\" class=\"serverTimestamp\">";
            // line 9
            echo $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "serverTimestamp");
            echo "</span>
                ";
            // line 10
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "serverDatePretty"), "html", null, true);
            echo " - ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "serverTimePretty"), "html", null, true);
            echo " ";
            if (($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "visitDuration") > 0)) {
                echo "<em>(";
                echo $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "visitDurationPretty");
                echo ")</em>";
            }
            // line 11
            echo "                &nbsp;<img src=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "countryFlag"), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "location"), "html", null, true);
            echo ", ";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Provider_ColumnProvider")), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "providerName"), "html", null, true);
            echo "\"/>
                &nbsp;<img src=\"";
            // line 12
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "browserIcon"), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "browserName"), "html", null, true);
            echo ", ";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Plugins")), "html", null, true);
            echo ": ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "plugins"), "html", null, true);
            echo "\"/>
                &nbsp;<img src=\"";
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "operatingSystemIcon"), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "operatingSystem"), "html", null, true);
            echo ", ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "resolution"), "html", null, true);
            echo "\"/>
                &nbsp;
                ";
            // line 15
            if ($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "visitConverted")) {
                // line 16
                echo "                <span title=\"";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_VisitConvertedNGoals", $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "goalConversions"))), "html", null, true);
                echo "\" class='visitorRank'>
                    <img src=\"";
                // line 17
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "visitConvertedIcon"), "html", null, true);
                echo "\" />
                    <span class='hash'>#</span>
                    ";
                // line 19
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "goalConversions"), "html", null, true);
                echo "
                    ";
                // line 20
                if ($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "visitEcommerceStatusIcon")) {
                    // line 21
                    echo "                        &nbsp;-
                        <img src=\"";
                    // line 22
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "visitEcommerceStatusIcon"), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "visitEcommerceStatus"), "html", null, true);
                    echo "\"/>
                    ";
                }
                // line 24
                echo "                </span>
                ";
            }
            // line 26
            echo "                ";
            if ($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "visitorTypeIcon")) {
                // line 27
                echo "                    &nbsp;- <img src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "visitorTypeIcon"), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ReturningVisitor")), "html", null, true);
                echo "\"/>
                ";
            }
            // line 29
            echo "                ";
            if ((!twig_test_empty((($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : null), "visitorId", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : null), "visitorId"), false)) : (false))))) {
                // line 30
                echo "                <a class=\"visits-live-launch-visitor-profile rightLink\" title=\"";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_ViewVisitorProfile")), "html", null, true);
                echo "\" data-visitor-id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "visitorId"), "html", null, true);
                echo "\">
                    <img src=\"plugins/Live/images/visitorProfileLaunch.png\"/>
                </a>
                ";
            }
            // line 34
            echo "                ";
            if ($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "visitIp")) {
                echo "- <span title=\"";
                if ((!twig_test_empty($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "visitorId")))) {
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_VisitorID")), "html", null, true);
                    echo ": ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "visitorId"), "html", null, true);
                }
                echo "\">
                    IP: ";
                // line 35
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "visitIp"), "html", null, true);
                echo "</span>
                ";
            }
            // line 37
            echo "            </div>
            <!--<div class=\"settings\"></div>-->
            <div class=\"referrer\">
                ";
            // line 40
            if (($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "referrerType") != "direct")) {
                // line 41
                echo "                    ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_FromReferrer")), "html", null, true);
                echo "
                    ";
                // line 42
                if ((!twig_test_empty($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "referrerUrl")))) {
                    // line 43
                    echo "                        <a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "referrerUrl"), "html", null, true);
                    echo "\" target=\"_blank\">
                    ";
                }
                // line 45
                echo "                    ";
                if ($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : null), "searchEngineIcon", array(), "any", true, true)) {
                    // line 46
                    echo "                        <img src=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "searchEngineIcon"), "html", null, true);
                    echo "\" />
                    ";
                }
                // line 48
                echo "                    ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "referrerName"), "html", null, true);
                echo "
                    ";
                // line 49
                if ((!twig_test_empty($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "referrerUrl")))) {
                    // line 50
                    echo "                        </a>
                    ";
                }
                // line 52
                echo "                    ";
                if ((!twig_test_empty($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "referrerKeyword")))) {
                    echo " - \"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "referrerKeyword"), "html", null, true);
                    echo "\"";
                }
                // line 53
                echo "                    ";
                ob_start();
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "referrerKeyword"), "html", null, true);
                $context["keyword"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 54
                echo "                    ";
                ob_start();
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "referrerName"), "html", null, true);
                $context["searchName"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 55
                echo "                    ";
                ob_start();
                echo "#";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "referrerKeywordPosition"), "html", null, true);
                $context["position"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 56
                echo "                    ";
                if ((!twig_test_empty($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "referrerKeywordPosition")))) {
                    // line 57
                    echo "                        <span title='";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_KeywordRankedOnSearchResultForThisVisitor", (isset($context["keyword"]) ? $context["keyword"] : $this->getContext($context, "keyword")), (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), (isset($context["searchName"]) ? $context["searchName"] : $this->getContext($context, "searchName")))), "html", null, true);
                    echo "' class='visitorRank'>
                            <span class='hash'>#</span> ";
                    // line 58
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "referrerKeywordPosition"), "html", null, true);
                    echo "
                        </span>
                    ";
                }
                // line 61
                echo "                ";
            } else {
                // line 62
                echo "                    ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Referrers_DirectEntry")), "html", null, true);
                echo "
                ";
            }
            // line 64
            echo "            </div>
            <div id=\"";
            // line 65
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "idVisit"), "html", null, true);
            echo "_actions\" class=\"settings\">
                <span class=\"pagesTitle\" title=\"";
            // line 66
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "actionDetails")), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Actions")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Pages")), "html", null, true);
            echo ":</span>&nbsp;
                ";
            // line 67
            $context["col"] = 0;
            // line 68
            echo "                ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "actionDetails"));
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
            foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
                // line 69
                echo "                    ";
                if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index") <= (isset($context["maxPagesDisplayedByVisitor"]) ? $context["maxPagesDisplayedByVisitor"] : $this->getContext($context, "maxPagesDisplayedByVisitor")))) {
                    // line 70
                    echo "                        ";
                    if ((($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "type") == "ecommerceOrder") || ($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "type") == "ecommerceAbandonedCart"))) {
                        // line 71
                        echo "                            ";
                        ob_start();
                        // line 72
                        echo "                                ";
                        if (($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "type") == "ecommerceOrder")) {
                            // line 73
                            echo "                                    ";
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_EcommerceOrder")), "html", null, true);
                            echo "
                                ";
                        } else {
                            // line 75
                            echo "                                    ";
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_AbandonedCart")), "html", null, true);
                            echo "
                                ";
                        }
                        // line 77
                        echo "                                -
                                ";
                        // line 78
                        if (($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "type") == "ecommerceOrder")) {
                            // line 79
                            echo "                                    ";
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnRevenue")), "html", null, true);
                            echo ":
                                ";
                        } else {
                            // line 81
                            echo "                                    ";
                            ob_start();
                            // line 82
                            echo "                                        ";
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnRevenue")), "html", null, true);
                            echo "
                                    ";
                            $context["revenueLeft"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                            // line 84
                            echo "                                    ";
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_LeftInCart", (isset($context["revenueLeft"]) ? $context["revenueLeft"] : $this->getContext($context, "revenueLeft")))), "html", null, true);
                            echo ":
                                ";
                        }
                        // line 86
                        echo "                                ";
                        echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "revenue"), (isset($context["idSite"]) ? $context["idSite"] : $this->getContext($context, "idSite"))));
                        echo " - ";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "serverTimePretty"), "html", null, true);
                        echo "
                                ";
                        // line 87
                        if ((!twig_test_empty($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "itemDetails")))) {
                            // line 88
                            echo "                                    ";
                            $context['_parent'] = (array) $context;
                            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "itemDetails"));
                            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                                // line 89
                                echo "                                    # ";
                                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "itemSKU"), "html", null, true);
                                if ((!twig_test_empty($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "itemName")))) {
                                    echo ": ";
                                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "itemName"), "html", null, true);
                                }
                                if ((!twig_test_empty($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "itemCategory")))) {
                                    echo " (";
                                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "itemCategory"), "html", null, true);
                                    echo ")";
                                }
                                echo ", ";
                                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Quantity")), "html", null, true);
                                echo ": ";
                                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "quantity"), "html", null, true);
                                echo ", ";
                                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Price")), "html", null, true);
                                echo ": ";
                                echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "price"), (isset($context["idSite"]) ? $context["idSite"] : $this->getContext($context, "idSite"))));
                                echo "
                                    ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 91
                            echo "                                ";
                        }
                        // line 92
                        echo "                            ";
                        $context["title"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                        // line 93
                        echo "                            <span title=\"";
                        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title")), "html", null, true);
                        echo "\">
\t\t\t\t\t\t        <img class='iconPadding' src=\"";
                        // line 94
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "icon"), "html", null, true);
                        echo "\"/>
                                ";
                        // line 95
                        if (($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "type") == "ecommerceOrder")) {
                            // line 96
                            echo "                                    ";
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnRevenue")), "html", null, true);
                            echo ": ";
                            echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "revenue"), (isset($context["idSite"]) ? $context["idSite"] : $this->getContext($context, "idSite"))));
                            echo "
                                ";
                        }
                        // line 98
                        echo "                            </span>
                        ";
                    } else {
                        // line 100
                        echo "                            ";
                        $context["col"] = ((isset($context["col"]) ? $context["col"] : $this->getContext($context, "col")) + 1);
                        // line 101
                        echo "                            ";
                        if (((isset($context["col"]) ? $context["col"] : $this->getContext($context, "col")) >= 9)) {
                            // line 102
                            echo "                                ";
                            $context["col"] = 0;
                            // line 103
                            echo "                            ";
                        }
                        // line 104
                        echo "                            <a href=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "url"), "html", null, true);
                        echo "\" target=\"_blank\">
                                ";
                        // line 105
                        if (($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "type") == "action")) {
                            // line 107
                            ob_start();
                            // line 108
                            if ((!twig_test_empty($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "pageTitle")))) {
                                echo call_user_func_array($this->env->getFilter('rawSafeDecoded')->getCallable(), array($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "pageTitle")));
                            }
                            // line 109
                            echo "
";
                            // line 110
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "serverTimePretty"), "html", null, true);
                            echo "
";
                            // line 111
                            if ($this->getAttribute((isset($context["action"]) ? $context["action"] : null), "timeSpentPretty", array(), "any", true, true)) {
                                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_TimeOnPage")), "html", null, true);
                                echo ": ";
                                echo $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "timeSpentPretty");
                            }
                            $context["title"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                            // line 113
                            echo "                                    <img src=\"plugins/Live/images/file";
                            echo twig_escape_filter($this->env, (isset($context["col"]) ? $context["col"] : $this->getContext($context, "col")), "html", null, true);
                            echo ".png\" title=\"";
                            echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title")), "html", null, true);
                            echo "\"/>
                                ";
                        } elseif ((($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "type") == "outlink") || ($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "type") == "download"))) {
                            // line 115
                            echo "                                    <img class='iconPadding' src=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "icon"), "html", null, true);
                            echo "\"
                                         title=\"";
                            // line 116
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "url"), "html", null, true);
                            echo " - ";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "serverTimePretty"), "html", null, true);
                            echo "\"/>
                                ";
                        } elseif (($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "type") == "search")) {
                            // line 118
                            echo "                                    <img class='iconPadding' src=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "icon"), "html", null, true);
                            echo "\"
                                         title=\"";
                            // line 119
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Actions_SubmenuSitesearch")), "html", null, true);
                            echo ": ";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "siteSearchKeyword"), "html", null, true);
                            echo " - ";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "serverTimePretty"), "html", null, true);
                            echo "\"/>
                                ";
                        } elseif ((!twig_test_empty((($this->getAttribute((isset($context["action"]) ? $context["action"] : null), "eventCategory", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["action"]) ? $context["action"] : null), "eventCategory"), false)) : (false))))) {
                            // line 121
                            echo "                                    <img  class=\"iconPadding\" src='";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "icon"), "html", null, true);
                            echo "'
                                        title=\"";
                            // line 122
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Events_Event")), "html", null, true);
                            echo " ";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "eventCategory"), "html", null, true);
                            echo " - ";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "eventAction"), "html", null, true);
                            echo " ";
                            if ($this->getAttribute((isset($context["action"]) ? $context["action"] : null), "eventName", array(), "any", true, true)) {
                                echo "- ";
                                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "eventName"), "html", null, true);
                            }
                            echo " ";
                            if ($this->getAttribute((isset($context["action"]) ? $context["action"] : null), "eventValue", array(), "any", true, true)) {
                                echo "- ";
                                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "eventValue"), "html", null, true);
                            }
                            echo "\"/>
                                ";
                        } else {
                            // line 124
                            echo "                                    <img class='iconPadding' src=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "icon"), "html", null, true);
                            echo "\"
                                         title=\"";
                            // line 125
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "goalName"), "html", null, true);
                            echo " - ";
                            if (($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "revenue") > 0)) {
                                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnRevenue")), "html", null, true);
                                echo ": ";
                                echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "revenue"), (isset($context["idSite"]) ? $context["idSite"] : $this->getContext($context, "idSite"))));
                                echo " - ";
                            }
                            echo " ";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "serverTimePretty"), "html", null, true);
                            echo "\"/>
                                ";
                        }
                        // line 127
                        echo "                            </a>
                        ";
                    }
                    // line 129
                    echo "                    ";
                }
                // line 130
                echo "                ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['action'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 131
            echo "                ";
            if ((twig_length_filter($this->env, $this->getAttribute((isset($context["visitor"]) ? $context["visitor"] : $this->getContext($context, "visitor")), "actionDetails")) > (isset($context["maxPagesDisplayedByVisitor"]) ? $context["maxPagesDisplayedByVisitor"] : $this->getContext($context, "maxPagesDisplayedByVisitor")))) {
                // line 132
                echo "                    <em>(";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_MorePagesNotDisplayed")), "html", null, true);
                echo ")</em>
                ";
            }
            // line 134
            echo "            </div>
        </li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['visitor'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 137
        echo "</ul>
<script type=\"text/javascript\">
\$('#visitsLive').on('click', '.visits-live-launch-visitor-profile', function (e) {
    e.preventDefault();
    broadcast.propagateNewPopoverParameter('visitorProfile', \$(this).attr('data-visitor-id'));
    return false;
});
</script>";
    }

    public function getTemplateName()
    {
        return "@Live/getLastVisitsStart.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  554 => 137,  546 => 134,  540 => 132,  537 => 131,  523 => 130,  520 => 129,  516 => 127,  502 => 125,  497 => 124,  478 => 122,  473 => 121,  464 => 119,  459 => 118,  452 => 116,  447 => 115,  439 => 113,  432 => 111,  428 => 110,  425 => 109,  421 => 108,  419 => 107,  417 => 105,  412 => 104,  409 => 103,  406 => 102,  403 => 101,  400 => 100,  396 => 98,  388 => 96,  386 => 95,  382 => 94,  377 => 93,  374 => 92,  371 => 91,  345 => 89,  340 => 88,  338 => 87,  331 => 86,  325 => 84,  319 => 82,  316 => 81,  310 => 79,  308 => 78,  305 => 77,  299 => 75,  293 => 73,  290 => 72,  287 => 71,  284 => 70,  281 => 69,  263 => 68,  261 => 67,  253 => 66,  249 => 65,  246 => 64,  240 => 62,  237 => 61,  231 => 58,  226 => 57,  223 => 56,  217 => 55,  212 => 54,  207 => 53,  200 => 52,  196 => 50,  194 => 49,  189 => 48,  183 => 46,  180 => 45,  174 => 43,  172 => 42,  167 => 41,  165 => 40,  160 => 37,  155 => 35,  144 => 34,  134 => 30,  131 => 29,  123 => 27,  120 => 26,  116 => 24,  109 => 22,  106 => 21,  104 => 20,  100 => 19,  95 => 17,  90 => 16,  88 => 15,  79 => 13,  69 => 12,  58 => 11,  48 => 10,  44 => 9,  38 => 8,  34 => 7,  29 => 6,  25 => 5,  21 => 3,  19 => 2,);
    }
}
