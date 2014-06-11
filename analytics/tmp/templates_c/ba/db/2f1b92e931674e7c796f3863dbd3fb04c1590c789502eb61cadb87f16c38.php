<?php

/* @UserCountryMap/visitorMap.twig */
class __TwigTemplate_badb2f1b92e931674e7c796f3863dbd3fb04c1590c789502eb61cadb87f16c38 extends Twig_Template
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
        echo "<div class=\"UserCountryMap\" style=\"position:relative; overflow:hidden;\">
    <div class=\"UserCountryMap_container\">
        <div class=\"UserCountryMap_map\" style=\"overflow:hidden;\"></div>
        <div class=\"UserCountryMap-overlay UserCountryMap-title\">
            <div class=\"content\">
                <!--<div class=\"map-title\" style=\"font-weight:bold; color:#9A9386;\"></div>-->
                <div class=\"map-stats\" style=\"color:#565656;\"></div>
            </div>
        </div>
        <div class=\"UserCountryMap-overlay UserCountryMap-legend\">
            <div class=\"content\">
            </div>
        </div>
        <div class=\"UserCountryMap-tooltip UserCountryMap-info\">
            <div class=\"content unlocated-stats\" data-tpl=\"";
        // line 15
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountryMap_Unlocated")), "html", null, true);
        echo "\">
            </div>
        </div>
        <div class=\"UserCountryMap-info-btn\" data-tooltip-target=\".UserCountryMap-tooltip\"></div>
    </div>
    <div class=\"mapWidgetStatus\">
        ";
        // line 21
        if ((isset($context["noData"]) ? $context["noData"] : $this->getContext($context, "noData"))) {
            // line 22
            echo "            <div class=\"pk-emptyDataTable\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreHome_ThereIsNoDataForThisReport")), "html", null, true);
            echo "</div>
        ";
        } else {
            // line 24
            echo "            <span class=\"loadingPiwik\">
                <img src=\"plugins/Zeitgeist/images/loading-blue.gif\" />
                ";
            // line 26
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_LoadingData")), "html", null, true);
            echo "...
            </span>
        ";
        }
        // line 29
        echo "    </div>
    <div class=\"dataTableFeatures\" style=\"padding-top:0;\">
        <div class=\"dataTableFooterIcons\">
            <div class=\"dataTableFooterWrap\" var=\"graphVerticalBar\">
                <img class=\"UserCountryMap-activeItem dataTableFooterActiveItem\" src=\"plugins/Zeitgeist/images/data_table_footer_active_item.png\" style=\"left: 25px;\" />

                <div class=\"tableIconsGroup\">
                    <span class=\"tableAllColumnsSwitch\">
                        <a class=\"UserCountryMap-btn-zoom tableIcon\" format=\"table\">
                            <img src=\"plugins/Zeitgeist/images/zoom-out.png\" title=\"Zoom to world\" />
                        </a>
                    </span>
                </div>
                <div class=\"tableIconsGroup UserCountryMap-view-mode-buttons\">
                    <span class=\"tableAllColumnsSwitch\">
                        <a var=\"tableAllColumns\" class=\"UserCountryMap-btn-region tableIcon activeIcon\" format=\"tableAllColumns\"
                           data-region=\"";
        // line 45
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountryMap_Regions")), "html", null, true);
        echo "\" data-country=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountryMap_Countries")), "html", null, true);
        echo "\">
                            <img src=\"plugins/UserCountryMap/images/regions.png\" title=\"Show visitors per region/country\" />
                            <span style=\"margin:0;\">";
        // line 47
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountryMap_Countries")), "html", null, true);
        echo "</span>&nbsp;
                        </a>
                        <a var=\"tableGoals\" class=\"UserCountryMap-btn-city tableIcon inactiveIco\" format=\"tableGoals\">
                            <img src=\"plugins/UserCountryMap/images/cities.png\" title=\"Show visitors per city\" />
                            <span style=\"margin:0;\">";
        // line 51
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountryMap_Cities")), "html", null, true);
        echo "</span>&nbsp;
                        </a>
                    </span>
                </div>
            </div>

            <select class=\"userCountryMapSelectMetrics\" style=\"float:right;margin-right:0;margin-bottom:5px;max-width: 9em;font-size:10px;\">
                ";
        // line 58
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["metrics"]) ? $context["metrics"] : $this->getContext($context, "metrics")));
        foreach ($context['_seq'] as $context["_key"] => $context["metric"]) {
            // line 59
            echo "                    <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["metric"]) ? $context["metric"] : $this->getContext($context, "metric")), 0, array(), "array"), "html", null, true);
            echo "\" ";
            if (($this->getAttribute((isset($context["metric"]) ? $context["metric"] : $this->getContext($context, "metric")), 0, array(), "array") == (isset($context["defaultMetric"]) ? $context["defaultMetric"] : $this->getContext($context, "defaultMetric")))) {
                echo "selected=\"selected\"";
            }
            echo "}>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["metric"]) ? $context["metric"] : $this->getContext($context, "metric")), 1, array(), "array"), "html", null, true);
            echo "</option>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['metric'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 61
        echo "            </select>
            <select class=\"userCountryMapSelectCountry\" style=\"float:right;margin-right:5px;margin-bottom:5px; max-width: 9em;font-size:10px;\">
                <option value=\"world\">";
        // line 63
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountryMap_WorldWide")), "html", null, true);
        echo "</option>
                <option disabled=\"disabled\">––––––</option>
                <option value=\"AF\">";
        // line 65
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_continent_afr")), "html", null, true);
        echo "</option>
                <option value=\"AS\">";
        // line 66
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_continent_asi")), "html", null, true);
        echo "</option>
                <option value=\"EU\">";
        // line 67
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_continent_eur")), "html", null, true);
        echo "</option>
                <option value=\"NA\">";
        // line 68
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_continent_amn")), "html", null, true);
        echo "</option>
                <option value=\"OC\">";
        // line 69
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_continent_oce")), "html", null, true);
        echo "</option>
                <option value=\"SA\">";
        // line 70
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_continent_ams")), "html", null, true);
        echo "</option>
                <option disabled=\"disabled\">––––––</option>
            </select>
        </div>
    </div>
</div>

";
        // line 77
        if ((!(isset($context["noData"]) ? $context["noData"] : $this->getContext($context, "noData")))) {
            // line 78
            echo "<!-- configure some piwik vars -->
<script type=\"text/javascript\">
    var visitorMap,
    config = JSON.parse('";
            // line 81
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, (isset($context["config"]) ? $context["config"] : $this->getContext($context, "config")), "js"), "html", null, true);
            echo "');
    config._ = JSON.parse('";
            // line 82
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, (isset($context["localeJSON"]) ? $context["localeJSON"] : $this->getContext($context, "localeJSON")), "js"), "html", null, true);
            echo "');
    config.reqParams = JSON.parse('";
            // line 83
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, (isset($context["reqParamsJSON"]) ? $context["reqParamsJSON"] : $this->getContext($context, "reqParamsJSON")), "js"), "html", null, true);
            echo "');

    \$('.UserCountryMap').addClass('dataTable');

    if (\$('#dashboardWidgetsArea').length) {
        // dashboard mode
        var \$widgetContent = \$('.UserCountryMap').parents('.widgetContent');

        \$widgetContent.on('widget:create',function (evt, widget) {
            visitorMap = new UserCountryMap.VisitorMap(config, widget);
        }).on('widget:maximise',function (evt) {
                    visitorMap.resize();
                }).on('widget:minimise',function (evt) {
                    visitorMap.resize();
                }).on('widget:destroy', function (evt) {
                    visitorMap.destroy();
                });
    } else {
        // stand-alone mode
        visitorMap = new UserCountryMap.VisitorMap(config);
    }

</script>
";
        }
    }

    public function getTemplateName()
    {
        return "@UserCountryMap/visitorMap.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  177 => 83,  173 => 82,  169 => 81,  164 => 78,  162 => 77,  152 => 70,  148 => 69,  144 => 68,  140 => 67,  136 => 66,  132 => 65,  127 => 63,  123 => 61,  108 => 59,  104 => 58,  94 => 51,  87 => 47,  80 => 45,  62 => 29,  56 => 26,  52 => 24,  46 => 22,  44 => 21,  35 => 15,  19 => 1,);
    }
}
