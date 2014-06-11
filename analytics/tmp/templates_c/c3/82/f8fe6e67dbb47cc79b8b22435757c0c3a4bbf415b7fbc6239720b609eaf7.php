<?php

/* @Live/_actionsList.twig */
class __TwigTemplate_c382f8fe6e67dbb47cc79b8b22435757c0c3a4bbf415b7fbc6239720b609eaf7 extends Twig_Template
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
        $context["previousAction"] = false;
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["actionDetails"]) ? $context["actionDetails"] : $this->getContext($context, "actionDetails")));
        foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
            // line 3
            echo "    ";
            ob_start();
            // line 4
            echo "        ";
            if ($this->getAttribute((isset($context["action"]) ? $context["action"] : null), "customVariables", array(), "any", true, true)) {
                // line 5
                echo "            ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CustomVariables_CustomVariables")), "html", null, true);
                echo ":
            ";
                // line 6
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "customVariables"));
                foreach ($context['_seq'] as $context["id"] => $context["customVariable"]) {
                    // line 7
                    echo "                ";
                    $context["name"] = ("customVariablePageName" . (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")));
                    // line 8
                    echo "                ";
                    $context["value"] = ("customVariablePageValue" . (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")));
                    // line 9
                    echo "                - ";
                    echo $this->getAttribute((isset($context["customVariable"]) ? $context["customVariable"] : $this->getContext($context, "customVariable")), (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), array(), "array");
                    echo " ";
                    if ((twig_length_filter($this->env, $this->getAttribute((isset($context["customVariable"]) ? $context["customVariable"] : $this->getContext($context, "customVariable")), (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), array(), "array")) > 0)) {
                        echo " = ";
                        echo $this->getAttribute((isset($context["customVariable"]) ? $context["customVariable"] : $this->getContext($context, "customVariable")), (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), array(), "array");
                    }
                    // line 10
                    echo "
                ";
                    // line 12
                    echo "            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['id'], $context['customVariable'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 13
                echo "        ";
            }
            // line 14
            echo "    ";
            $context["customVariablesTooltip"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 15
            echo "    ";
            if ((((!$this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : $this->getContext($context, "clientSideParameters")), "filterEcommerce")) || ($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "type") == "ecommerceOrder")) || ($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "type") == "ecommerceAbandonedCart"))) {
                // line 16
                echo "        <li class=\"";
                if ($this->getAttribute((isset($context["action"]) ? $context["action"] : null), "goalName", array(), "any", true, true)) {
                    echo "goal";
                } else {
                    echo "action";
                }
                echo "\"
            title=\"";
                // line 17
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "serverTimePretty"), "html", null, true);
                if (($this->getAttribute((isset($context["action"]) ? $context["action"] : null), "url", array(), "any", true, true) && twig_length_filter($this->env, trim($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "url"))))) {
                    // line 18
                    echo "
";
                    // line 19
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "url"), "html", null, true);
                }
                if (twig_length_filter($this->env, trim((isset($context["customVariablesTooltip"]) ? $context["customVariablesTooltip"] : $this->getContext($context, "customVariablesTooltip"))))) {
                    // line 20
                    echo "
";
                    // line 21
                    echo twig_escape_filter($this->env, trim((isset($context["customVariablesTooltip"]) ? $context["customVariablesTooltip"] : $this->getContext($context, "customVariablesTooltip"))), "html", null, true);
                }
                // line 22
                if ($this->getAttribute((isset($context["action"]) ? $context["action"] : null), "generationTime", array(), "any", true, true)) {
                    // line 23
                    echo "
";
                    // line 24
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnGenerationTime")), "html", null, true);
                    echo ": ";
                    echo $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "generationTime");
                }
                // line 25
                if ($this->getAttribute((isset($context["action"]) ? $context["action"] : null), "timeSpentPretty", array(), "any", true, true)) {
                    // line 26
                    echo "
";
                    // line 27
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_TimeOnPage")), "html", null, true);
                    echo ": ";
                    echo $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "timeSpentPretty");
                }
                echo "\">
            <div>
            ";
                // line 29
                if ((($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "type") == "ecommerceOrder") || ($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "type") == "ecommerceAbandonedCart"))) {
                    // line 30
                    echo "            ";
                    // line 31
                    echo "                <img src=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "icon"), "html", null, true);
                    echo "\"/>
                ";
                    // line 32
                    if (($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "type") == "ecommerceOrder")) {
                        // line 33
                        echo "                    <strong>";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_EcommerceOrder")), "html", null, true);
                        echo "</strong>
                    <span style='color:#666;'>(";
                        // line 34
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "orderId"), "html", null, true);
                        echo ")</span>
                ";
                    } else {
                        // line 36
                        echo "                    <strong>";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_AbandonedCart")), "html", null, true);
                        echo "</strong>

                    ";
                        // line 39
                        echo "                ";
                    }
                    // line 40
                    echo "                <p>
                <span ";
                    // line 41
                    if ((!(isset($context["isWidget"]) ? $context["isWidget"] : $this->getContext($context, "isWidget")))) {
                        echo "style='margin-left:20px;'";
                    }
                    echo ">
                    ";
                    // line 42
                    if (($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "type") == "ecommerceOrder")) {
                        // line 44
                        ob_start();
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnRevenue")), "html", null, true);
                        echo ": ";
                        echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "revenue"), $this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : $this->getContext($context, "clientSideParameters")), "idSite")));
                        echo "
";
                        // line 45
                        if ((!twig_test_empty($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "revenueSubTotal")))) {
                            echo " - ";
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Subtotal")), "html", null, true);
                            echo ": ";
                            echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "revenueSubTotal"), $this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : $this->getContext($context, "clientSideParameters")), "idSite")));
                        }
                        // line 46
                        echo "
";
                        // line 47
                        if ((!twig_test_empty($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "revenueTax")))) {
                            echo " - ";
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Tax")), "html", null, true);
                            echo ": ";
                            echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "revenueTax"), $this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : $this->getContext($context, "clientSideParameters")), "idSite")));
                        }
                        // line 48
                        echo "
";
                        // line 49
                        if ((!twig_test_empty($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "revenueShipping")))) {
                            echo " - ";
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Shipping")), "html", null, true);
                            echo ": ";
                            echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "revenueShipping"), $this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : $this->getContext($context, "clientSideParameters")), "idSite")));
                        }
                        // line 50
                        echo "
";
                        // line 51
                        if ((!twig_test_empty($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "revenueDiscount")))) {
                            echo " - ";
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Discount")), "html", null, true);
                            echo ": ";
                            echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "revenueDiscount"), $this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : $this->getContext($context, "clientSideParameters")), "idSite")));
                        }
                        $context["ecommerceOrderTooltip"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                        // line 53
                        echo "                    <abbr title=\"";
                        echo twig_escape_filter($this->env, (isset($context["ecommerceOrderTooltip"]) ? $context["ecommerceOrderTooltip"] : $this->getContext($context, "ecommerceOrderTooltip")), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnRevenue")), "html", null, true);
                        echo ":
                    ";
                    } else {
                        // line 55
                        echo "                        ";
                        ob_start();
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnRevenue")), "html", null, true);
                        $context["revenueLeft"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                        // line 56
                        echo "                        ";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_LeftInCart", (isset($context["revenueLeft"]) ? $context["revenueLeft"] : $this->getContext($context, "revenueLeft")))), "html", null, true);
                        echo ":
                    ";
                    }
                    // line 58
                    echo "                        <strong>";
                    echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "revenue"), $this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : $this->getContext($context, "clientSideParameters")), "idSite")));
                    echo "</strong>
                    ";
                    // line 59
                    if (($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "type") == "ecommerceOrder")) {
                        // line 60
                        echo "                    </abbr>
                    ";
                    }
                    // line 61
                    echo ", ";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Quantity")), "html", null, true);
                    echo ": ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "items"), "html", null, true);
                    echo "

                    ";
                    // line 64
                    echo "                    ";
                    if ((!twig_test_empty($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "itemDetails")))) {
                        // line 65
                        echo "                        <ul style='list-style:square;margin-left:";
                        if ((isset($context["isWidget"]) ? $context["isWidget"] : $this->getContext($context, "isWidget"))) {
                            echo "15";
                        } else {
                            echo "50";
                        }
                        echo "px;'>
                            ";
                        // line 66
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "itemDetails"));
                        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                            // line 67
                            echo "                                <li>
                                    ";
                            // line 68
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "itemSKU"), "html", null, true);
                            if ((!twig_test_empty($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "itemName")))) {
                                echo ": ";
                                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "itemName"), "html", null, true);
                            }
                            // line 69
                            echo "                                    ";
                            if ((!twig_test_empty($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "itemCategory")))) {
                                echo " (";
                                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "itemCategory"), "html", null, true);
                                echo ")";
                            }
                            // line 70
                            echo "                                    ,
                                    ";
                            // line 71
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Quantity")), "html", null, true);
                            echo ": ";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "quantity"), "html", null, true);
                            echo ",
                                    ";
                            // line 72
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Price")), "html", null, true);
                            echo ": ";
                            echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "price"), $this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : $this->getContext($context, "clientSideParameters")), "idSite")));
                            echo "
                                </li>
                            ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 75
                        echo "                        </ul>
                    ";
                    }
                    // line 77
                    echo "                </span>
                </p>
            ";
                } elseif ((!$this->getAttribute((isset($context["action"]) ? $context["action"] : null), "goalName", array(), "any", true, true))) {
                    // line 80
                    echo "                ";
                    // line 81
                    echo "                ";
                    if ((!twig_test_empty((($this->getAttribute((isset($context["action"]) ? $context["action"] : null), "pageTitle", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["action"]) ? $context["action"] : null), "pageTitle"), false)) : (false))))) {
                        // line 82
                        echo "                    <span class=\"truncated-text-line\">";
                        echo call_user_func_array($this->env->getFilter('rawSafeDecoded')->getCallable(), array($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "pageTitle")));
                        echo "</span>
                ";
                    }
                    // line 84
                    echo "                ";
                    if ($this->getAttribute((isset($context["action"]) ? $context["action"] : null), "siteSearchKeyword", array(), "any", true, true)) {
                        // line 85
                        echo "                    ";
                        if (($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "type") == "search")) {
                            // line 86
                            echo "                        <img src='";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "icon"), "html", null, true);
                            echo "' title='";
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Actions_SubmenuSitesearch")), "html", null, true);
                            echo "' class=\"action-list-action-icon\">
                    ";
                        }
                        // line 88
                        echo "                    <span class=\"truncated-text-line\">";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "siteSearchKeyword"), "html", null, true);
                        echo "</span>
                ";
                    }
                    // line 90
                    echo "                ";
                    if ((!twig_test_empty((($this->getAttribute((isset($context["action"]) ? $context["action"] : null), "eventCategory", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["action"]) ? $context["action"] : null), "eventCategory"), false)) : (false))))) {
                        // line 91
                        echo "                    <img src='";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "icon"), "html", null, true);
                        echo "' title='";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Events_Event")), "html", null, true);
                        echo "' class=\"action-list-action-icon\">
                    <span class=\"truncated-text-line\">";
                        // line 92
                        echo call_user_func_array($this->env->getFilter('rawSafeDecoded')->getCallable(), array($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "eventCategory")));
                        echo " - ";
                        echo call_user_func_array($this->env->getFilter('rawSafeDecoded')->getCallable(), array($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "eventAction")));
                        echo " ";
                        if ($this->getAttribute((isset($context["action"]) ? $context["action"] : null), "eventName", array(), "any", true, true)) {
                            echo "- ";
                            echo call_user_func_array($this->env->getFilter('rawSafeDecoded')->getCallable(), array($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "eventName")));
                        }
                        echo " ";
                        if ($this->getAttribute((isset($context["action"]) ? $context["action"] : null), "eventValue", array(), "any", true, true)) {
                            echo "[";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "eventValue"), "html", null, true);
                            echo "]";
                        }
                        echo "</span>
                ";
                    }
                    // line 94
                    echo "                ";
                    if ((!twig_test_empty($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "url")))) {
                        // line 95
                        echo "                    ";
                        if ((($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "type") == "action") && (!twig_test_empty((($this->getAttribute((isset($context["action"]) ? $context["action"] : null), "pageTitle", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["action"]) ? $context["action"] : null), "pageTitle"), false)) : (false)))))) {
                            echo "<p>";
                        }
                        // line 96
                        echo "                    ";
                        if ((($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "type") == "download") || ($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "type") == "outlink"))) {
                            // line 97
                            echo "                        <img src='";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "icon"), "html", null, true);
                            echo "' class=\"action-list-action-icon\">
                    ";
                        }
                        // line 99
                        echo "
                    ";
                        // line 100
                        if (((!twig_test_empty((($this->getAttribute((isset($context["action"]) ? $context["action"] : null), "eventCategory", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["action"]) ? $context["action"] : null), "eventCategory"), false)) : (false)))) && ((($this->getAttribute((isset($context["previousAction"]) ? $context["previousAction"] : null), "url", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["previousAction"]) ? $context["previousAction"] : null), "url"), false)) : (false)) == $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "url")))) {
                            // line 102
                            echo "                        ";
                            // line 103
                            echo "                    ";
                        } else {
                            // line 104
                            echo "                        <a href=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "url"), "html", null, true);
                            echo "\" target=\"_blank\" class=\"";
                            if (twig_test_empty((($this->getAttribute((isset($context["action"]) ? $context["action"] : null), "eventCategory", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["action"]) ? $context["action"] : null), "eventCategory"), false)) : (false)))) {
                                echo "action-list-url";
                            }
                            echo " truncated-text-line\"
                           ";
                            // line 105
                            if (((!array_key_exists("overrideLinkStyle", $context)) || (isset($context["overrideLinkStyle"]) ? $context["overrideLinkStyle"] : $this->getContext($context, "overrideLinkStyle")))) {
                                echo "style=\"";
                                if ((($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "type") == "action") && (!twig_test_empty((($this->getAttribute((isset($context["action"]) ? $context["action"] : null), "pageTitle", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["action"]) ? $context["action"] : null), "pageTitle"), false)) : (false)))))) {
                                    echo "margin-left: 9px;";
                                }
                                echo "text-decoration:underline;\"";
                            }
                            echo ">
                           ";
                            // line 106
                            if ((!twig_test_empty((($this->getAttribute((isset($context["action"]) ? $context["action"] : null), "eventCategory", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["action"]) ? $context["action"] : null), "eventCategory"), false)) : (false))))) {
                                // line 107
                                echo "                               (url)
                           ";
                            } else {
                                // line 109
                                echo "                               ";
                                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "url"), "html", null, true);
                                echo "
                           ";
                            }
                            // line 111
                            echo "                        </a>
                    ";
                        }
                        // line 113
                        echo "                    ";
                        if ((($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "type") == "action") && (!twig_test_empty((($this->getAttribute((isset($context["action"]) ? $context["action"] : null), "pageTitle", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["action"]) ? $context["action"] : null), "pageTitle"), false)) : (false)))))) {
                            echo "</p>";
                        }
                        // line 114
                        echo "                ";
                    } elseif ((($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "type") != "search") && ($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "type") != "event"))) {
                        // line 115
                        echo "                    <p>
                    <span style=\"margin-left: 9px;\">";
                        // line 116
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : $this->getContext($context, "clientSideParameters")), "pageUrlNotDefined"), "html", null, true);
                        echo "</span>
                    </p>
                ";
                    }
                    // line 119
                    echo "            ";
                } else {
                    // line 120
                    echo "                ";
                    // line 121
                    echo "                <img src=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "icon"), "html", null, true);
                    echo "\" />
                <strong>";
                    // line 122
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "goalName"), "html", null, true);
                    echo "</strong>
                ";
                    // line 123
                    if (($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "revenue") > 0)) {
                        echo ", ";
                        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnRevenue")), "html", null, true);
                        echo ":
                    <strong>";
                        // line 124
                        echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute((isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "revenue"), $this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : $this->getContext($context, "clientSideParameters")), "idSite")));
                        echo "</strong>
                ";
                    }
                    // line 126
                    echo "            ";
                }
                // line 127
                echo "            </div>
        </li>
    ";
            }
            // line 130
            echo "
    ";
            // line 131
            $context["previousAction"] = (isset($context["action"]) ? $context["action"] : $this->getContext($context, "action"));
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['action'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "@Live/_actionsList.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  479 => 131,  476 => 130,  468 => 126,  463 => 124,  457 => 123,  453 => 122,  448 => 121,  446 => 120,  437 => 116,  434 => 115,  422 => 111,  416 => 109,  412 => 107,  410 => 106,  400 => 105,  391 => 104,  388 => 103,  386 => 102,  384 => 100,  381 => 99,  375 => 97,  346 => 92,  339 => 91,  336 => 90,  330 => 88,  322 => 86,  319 => 85,  316 => 84,  310 => 82,  305 => 80,  300 => 77,  296 => 75,  285 => 72,  279 => 71,  276 => 70,  260 => 67,  247 => 65,  236 => 61,  230 => 59,  225 => 58,  214 => 55,  206 => 53,  198 => 51,  195 => 50,  188 => 49,  185 => 48,  178 => 47,  175 => 46,  168 => 45,  159 => 42,  150 => 40,  147 => 39,  141 => 36,  136 => 34,  131 => 33,  124 => 31,  120 => 29,  112 => 27,  109 => 26,  107 => 25,  102 => 24,  99 => 23,  97 => 22,  87 => 19,  84 => 18,  81 => 17,  72 => 16,  66 => 14,  63 => 13,  57 => 12,  54 => 10,  43 => 8,  36 => 6,  31 => 5,  28 => 4,  25 => 3,  655 => 200,  637 => 197,  635 => 196,  632 => 195,  625 => 190,  623 => 189,  618 => 186,  612 => 185,  606 => 183,  600 => 181,  598 => 180,  594 => 179,  591 => 178,  585 => 175,  578 => 174,  576 => 173,  569 => 171,  566 => 170,  560 => 167,  557 => 166,  555 => 165,  552 => 164,  546 => 161,  543 => 160,  541 => 159,  537 => 157,  532 => 155,  529 => 154,  526 => 153,  521 => 151,  518 => 150,  515 => 149,  512 => 148,  506 => 147,  501 => 146,  496 => 144,  490 => 143,  487 => 142,  484 => 141,  481 => 140,  477 => 139,  474 => 138,  471 => 127,  465 => 134,  459 => 133,  455 => 132,  452 => 131,  450 => 130,  447 => 129,  443 => 119,  436 => 127,  431 => 114,  428 => 124,  426 => 113,  420 => 122,  417 => 121,  415 => 120,  405 => 119,  401 => 118,  393 => 117,  389 => 115,  387 => 114,  382 => 113,  380 => 112,  376 => 110,  372 => 96,  367 => 95,  364 => 94,  358 => 103,  352 => 101,  349 => 100,  343 => 99,  338 => 98,  333 => 97,  328 => 95,  324 => 94,  318 => 92,  307 => 81,  299 => 89,  297 => 88,  295 => 87,  293 => 86,  290 => 85,  287 => 84,  282 => 83,  278 => 82,  272 => 80,  269 => 69,  263 => 68,  256 => 66,  251 => 73,  249 => 72,  246 => 71,  244 => 64,  241 => 69,  238 => 68,  235 => 67,  232 => 60,  219 => 56,  215 => 63,  211 => 62,  208 => 61,  205 => 60,  202 => 59,  197 => 58,  193 => 56,  186 => 54,  183 => 53,  181 => 52,  177 => 51,  172 => 49,  166 => 48,  161 => 44,  158 => 46,  153 => 41,  146 => 43,  142 => 42,  139 => 41,  137 => 40,  129 => 32,  125 => 38,  122 => 30,  114 => 35,  106 => 33,  104 => 32,  94 => 21,  91 => 20,  88 => 28,  71 => 27,  69 => 15,  61 => 21,  58 => 20,  52 => 17,  49 => 16,  46 => 9,  40 => 7,  37 => 11,  35 => 10,  30 => 8,  23 => 3,  21 => 2,  19 => 1,);
    }
}
