<?php

/* @CoreHome/_dataTableFooter.twig */
class __TwigTemplate_eac371b091c28cede2b9c8ce345a2243bb49e231cfd8b285f96261497f4d59f4 extends Twig_Template
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
        echo "<div class=\"dataTableFeatures\">

    <div class=\"dataTableFooterNavigation\">
        ";
        // line 4
        if ($this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "show_offset_information")) {
            // line 5
            echo "            <span>
                <span class=\"dataTablePages\"></span>
            </span>
        ";
        }
        // line 9
        echo "
        ";
        // line 10
        if ($this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "show_pagination_control")) {
            // line 11
            echo "            <span>
                <span class=\"dataTablePrevious\">&lsaquo; ";
            // line 12
            if ($this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : null), "dataTablePreviousIsFirst", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_First")), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Previous")), "html", null, true);
            }
            echo " </span>
                <span class=\"dataTableNext\">";
            // line 13
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Next")), "html", null, true);
            echo " &rsaquo;</span>
            </span>
        ";
        }
        // line 16
        echo "
        ";
        // line 17
        if ($this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "show_search")) {
            // line 18
            echo "            <span class=\"dataTableSearchPattern\">
                <input type=\"text\" class=\"searchInput\" length=\"15\" />
                <input type=\"submit\" value=\"";
            // line 20
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Search")), "html", null, true);
            echo "\" />
            </span>
        ";
        }
        // line 23
        echo "    </div>

    <span class=\"loadingPiwik\" style=\"display:none;\"><img src=\"plugins/Zeitgeist/images/loading-blue.gif\"/> ";
        // line 25
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_LoadingData")), "html", null, true);
        echo "</span>

    ";
        // line 27
        if ($this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "show_footer_icons")) {
            // line 28
            echo "        <div class=\"dataTableFooterIcons\">
            <div class=\"dataTableFooterWrap\">
                ";
            // line 30
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["footerIcons"]) ? $context["footerIcons"] : $this->getContext($context, "footerIcons")));
            foreach ($context['_seq'] as $context["_key"] => $context["footerIconGroup"]) {
                // line 31
                echo "                    <div class=\"tableIconsGroup\">
                    <span class=\"";
                // line 32
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["footerIconGroup"]) ? $context["footerIconGroup"] : $this->getContext($context, "footerIconGroup")), "class"), "html", null, true);
                echo "\">
                    ";
                // line 33
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["footerIconGroup"]) ? $context["footerIconGroup"] : $this->getContext($context, "footerIconGroup")), "buttons"));
                foreach ($context['_seq'] as $context["_key"] => $context["footerIcon"]) {
                    // line 34
                    echo "                        <span>
                            ";
                    // line 35
                    if (($this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "show_active_view_icon") && ($this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : $this->getContext($context, "clientSideParameters")), "viewDataTable") == $this->getAttribute((isset($context["footerIcon"]) ? $context["footerIcon"] : $this->getContext($context, "footerIcon")), "id")))) {
                        // line 36
                        echo "                                <img src=\"plugins/Zeitgeist/images/data_table_footer_active_item.png\" class=\"dataTableFooterActiveItem\"/>
                            ";
                    }
                    // line 38
                    echo "                            <a class=\"tableIcon ";
                    if (($this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : $this->getContext($context, "clientSideParameters")), "viewDataTable") == $this->getAttribute((isset($context["footerIcon"]) ? $context["footerIcon"] : $this->getContext($context, "footerIcon")), "id"))) {
                        echo "activeIcon";
                    }
                    echo "\" data-footer-icon-id=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["footerIcon"]) ? $context["footerIcon"] : $this->getContext($context, "footerIcon")), "id"), "html", null, true);
                    echo "\">
                                <img width=\"16\" height=\"16\" title=\"";
                    // line 39
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["footerIcon"]) ? $context["footerIcon"] : $this->getContext($context, "footerIcon")), "title"), "html", null, true);
                    echo "\" src=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["footerIcon"]) ? $context["footerIcon"] : $this->getContext($context, "footerIcon")), "icon"), "html", null, true);
                    echo "\"/>
                                ";
                    // line 40
                    if ($this->getAttribute((isset($context["footerIcon"]) ? $context["footerIcon"] : null), "text", array(), "any", true, true)) {
                        echo "<span>";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["footerIcon"]) ? $context["footerIcon"] : $this->getContext($context, "footerIcon")), "text"), "html", null, true);
                        echo "</span>";
                    }
                    // line 41
                    echo "                            </a>
                        </span>
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['footerIcon'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 44
                echo "                    </span>
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['footerIconGroup'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 47
            echo "                <div class=\"tableIconsGroup\">
                    ";
            // line 48
            if (twig_test_empty((isset($context["footerIcons"]) ? $context["footerIcons"] : $this->getContext($context, "footerIcons")))) {
                // line 49
                echo "                        <img src=\"plugins/Zeitgeist/images/data_table_footer_active_item.png\" class=\"dataTableFooterActiveItem\"/>
                    ";
            }
            // line 51
            echo "                    <span class=\"exportToFormatIcons\">
                        <a class=\"tableIcon\" var=\"export\">
                            <img width=\"16\" height=\"16\" src=\"plugins/Zeitgeist/images/export.png\" title=\"";
            // line 53
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ExportThisReport")), "html", null, true);
            echo "\"/>
                        </a>
                    </span>
\t\t\t\t    <span class=\"exportToFormatItems\" style=\"display:none;\">
\t\t\t\t\t";
            // line 57
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Export")), "html", null, true);
            echo ":
\t\t\t\t\t<a target=\"_blank\" methodToCall=\"";
            // line 58
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "apiMethodToRequestDataTable"), "html", null, true);
            echo "\" format=\"CSV\" filter_limit=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "export_limit"), "html", null, true);
            echo "\">CSV</a> |
\t\t\t\t\t<a target=\"_blank\" methodToCall=\"";
            // line 59
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "apiMethodToRequestDataTable"), "html", null, true);
            echo "\" format=\"TSV\" filter_limit=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "export_limit"), "html", null, true);
            echo "\">TSV (Excel)</a> |
\t\t\t\t\t<a target=\"_blank\" methodToCall=\"";
            // line 60
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "apiMethodToRequestDataTable"), "html", null, true);
            echo "\" format=\"XML\" filter_limit=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "export_limit"), "html", null, true);
            echo "\">XML</a> |
\t\t\t\t\t<a target=\"_blank\" methodToCall=\"";
            // line 61
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "apiMethodToRequestDataTable"), "html", null, true);
            echo "\" format=\"JSON\" filter_limit=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "export_limit"), "html", null, true);
            echo "\">Json</a> |
\t\t\t\t\t<a target=\"_blank\" methodToCall=\"";
            // line 62
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "apiMethodToRequestDataTable"), "html", null, true);
            echo "\" format=\"PHP\" filter_limit=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "export_limit"), "html", null, true);
            echo "\">Php</a>
                        ";
            // line 63
            if ($this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "show_export_as_rss_feed")) {
                // line 64
                echo "                            |
                            <a target=\"_blank\" methodToCall=\"";
                // line 65
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "apiMethodToRequestDataTable"), "html", null, true);
                echo "\" format=\"RSS\" filter_limit=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "export_limit"), "html", null, true);
                echo "\" date=\"last10\">
                                <img border=\"0\" src=\"plugins/Zeitgeist/images/feed.png\"/>
                            </a>
                        ";
            }
            // line 69
            echo "\t\t\t\t    </span>
                    ";
            // line 70
            if ($this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "show_export_as_image_icon")) {
                // line 71
                echo "                        <span id=\"dataTableFooterExportAsImageIcon\">
                            <a class=\"tableIcon\" href=\"#\" onclick=\"\$(this).closest('.dataTable').find('div.jqplot-target').trigger('piwikExportAsImage'); return false;\">
                                <img title=\"";
                // line 73
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ExportAsImage")), "html", null, true);
                echo "\" src=\"plugins/Zeitgeist/images/image.png\"/>
                            </a>
                        </span>
                    ";
            }
            // line 77
            echo "                </div>

            </div>
            <div class=\"limitSelection ";
            // line 80
            if (((!$this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "show_pagination_control")) && (!$this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "show_limit_control")))) {
                echo " hidden";
            }
            echo "\"
                 title=\"";
            // line 81
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_RowsToDisplay")), "html", null, true);
            echo "\"></div>
            <div class=\"tableConfiguration\">
                <a class=\"tableConfigurationIcon\" href=\"#\"></a>
                <ul>
                    ";
            // line 85
            if ($this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "show_flatten_table")) {
                // line 86
                echo "                        ";
                if (($this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : null), "flat", array(), "any", true, true) && ($this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : $this->getContext($context, "clientSideParameters")), "flat") == 1))) {
                    // line 87
                    echo "                            <li>
                                <div class=\"configItem dataTableIncludeAggregateRows\"></div>
                            </li>
                        ";
                }
                // line 91
                echo "                        <li>
                            <div class=\"configItem dataTableFlatten\"></div>
                        </li>
                    ";
            }
            // line 95
            echo "                    ";
            if ($this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "show_exclude_low_population")) {
                // line 96
                echo "                        <li>
                            <div class=\"configItem dataTableExcludeLowPopulation\"></div>
                        </li>
                    ";
            }
            // line 100
            echo "                </ul>
            </div>
            ";
            // line 102
            if ((call_user_func_array($this->env->getFunction('isPluginLoaded')->getCallable(), array("Annotations")) && (!$this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "hide_annotations_view")))) {
                // line 103
                echo "                <div class=\"annotationView\" title=\"";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Annotations_IconDesc")), "html", null, true);
                echo "\">
                    <a class=\"tableIcon\">
                        <img width=\"16\" height=\"16\" src=\"plugins/Zeitgeist/images/annotations.png\"/>
                    </a>
                    <span>";
                // line 107
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Annotations_Annotations")), "html", null, true);
                echo "</span>
                </div>
            ";
            }
            // line 110
            echo "
            <div class=\"foldDataTableFooterDrawer\" title=\"";
            // line 111
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Close")), "html_attr");
            echo "\"
                    ><img width=\"7\" height=\"4\" src=\"plugins/Morpheus/images/sortasc_dark.png\"></div>

        </div>
        <div class=\"expandDataTableFooterDrawer\" title=\"";
            // line 115
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ExpandDataTableFooter")), "html_attr");
            echo "\"
                ><img width=\"7\" height=\"4\" src=\"plugins/Morpheus/images/sortdesc_dark.png\" style=\"\"></div>
    ";
        }
        // line 118
        echo "
    <div class=\"datatableRelatedReports\">
        ";
        // line 120
        if (((!twig_test_empty($this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "related_reports"))) && $this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "show_related_reports"))) {
            // line 121
            echo "            ";
            echo $this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "related_reports_title");
            echo "
            <ul style=\"list-style:none;";
            // line 122
            if ((twig_length_filter($this->env, $this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "related_reports")) == 1)) {
                echo "display:inline-block;";
            }
            echo "}\">
                <li><span href=\"";
            // line 123
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "self_url"), "html", null, true);
            echo "\" style=\"display:none;\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "title"), "html", null, true);
            echo "</span></li>

                ";
            // line 125
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "related_reports"));
            foreach ($context['_seq'] as $context["reportUrl"] => $context["reportTitle"]) {
                // line 126
                echo "                    <li><span href=\"";
                echo twig_escape_filter($this->env, (isset($context["reportUrl"]) ? $context["reportUrl"] : $this->getContext($context, "reportUrl")), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, (isset($context["reportTitle"]) ? $context["reportTitle"] : $this->getContext($context, "reportTitle")), "html", null, true);
                echo "</span></li>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['reportUrl'], $context['reportTitle'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 128
            echo "            </ul>
        ";
        }
        // line 130
        echo "    </div>

    ";
        // line 132
        if (($this->getAttribute((isset($context["properties"]) ? $context["properties"] : null), "show_footer_message", array(), "any", true, true) && (!twig_test_empty($this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "show_footer_message"))))) {
            // line 133
            echo "        <div class='datatableFooterMessage'>";
            echo $this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "show_footer_message");
            echo "</div>
    ";
        }
        // line 135
        echo "
</div>

<span class=\"loadingPiwikBelow\" style=\"display:none;\"><img src=\"plugins/Zeitgeist/images/loading-blue.gif\"/> ";
        // line 138
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_LoadingData")), "html", null, true);
        echo "</span>

<div class=\"dataTableSpacer\"></div>
";
    }

    public function getTemplateName()
    {
        return "@CoreHome/_dataTableFooter.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  369 => 138,  364 => 135,  358 => 133,  356 => 132,  352 => 130,  348 => 128,  337 => 126,  333 => 125,  326 => 123,  320 => 122,  315 => 121,  313 => 120,  309 => 118,  303 => 115,  296 => 111,  293 => 110,  287 => 107,  279 => 103,  277 => 102,  273 => 100,  267 => 96,  264 => 95,  258 => 91,  252 => 87,  249 => 86,  247 => 85,  240 => 81,  234 => 80,  229 => 77,  222 => 73,  218 => 71,  216 => 70,  213 => 69,  204 => 65,  201 => 64,  199 => 63,  193 => 62,  187 => 61,  181 => 60,  175 => 59,  169 => 58,  165 => 57,  158 => 53,  154 => 51,  150 => 49,  148 => 48,  145 => 47,  137 => 44,  129 => 41,  123 => 40,  117 => 39,  108 => 38,  104 => 36,  102 => 35,  95 => 33,  88 => 31,  84 => 30,  80 => 28,  78 => 27,  73 => 25,  69 => 23,  63 => 20,  59 => 18,  54 => 16,  48 => 13,  40 => 12,  37 => 11,  35 => 10,  32 => 9,  24 => 4,  139 => 37,  136 => 36,  133 => 35,  130 => 34,  127 => 33,  125 => 32,  122 => 31,  119 => 30,  115 => 29,  111 => 27,  105 => 25,  99 => 34,  97 => 22,  94 => 21,  91 => 32,  85 => 18,  83 => 17,  79 => 15,  72 => 14,  66 => 13,  57 => 17,  49 => 10,  45 => 9,  41 => 8,  30 => 7,  28 => 6,  26 => 5,  21 => 2,  19 => 1,);
    }
}
