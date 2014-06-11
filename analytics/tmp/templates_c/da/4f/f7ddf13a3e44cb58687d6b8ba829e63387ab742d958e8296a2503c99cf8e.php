<?php

/* @UserCountryMap/realtimeMap.twig */
class __TwigTemplate_da4ff7ddf13a3e44cb58687d6b8ba829e63387ab742d958e8296a2503c99cf8e extends Twig_Template
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
        echo "<div class=\"RealTimeMap\" style=\"position:relative; overflow:hidden;\"
     data-standalone=\"";
        // line 2
        echo twig_escape_filter($this->env, ((array_key_exists("mapIsStandaloneNotWidget", $context)) ? (_twig_default_filter((isset($context["mapIsStandaloneNotWidget"]) ? $context["mapIsStandaloneNotWidget"] : $this->getContext($context, "mapIsStandaloneNotWidget")), 0)) : (0)), "html", null, true);
        echo "\"
     data-config=\"";
        // line 3
        echo twig_escape_filter($this->env, twig_jsonencode_filter((isset($context["config"]) ? $context["config"] : $this->getContext($context, "config"))), "html", null, true);
        echo "\"
     tabindex=\"0\">

    <div class=\"RealTimeMap_container\">
        <div class=\"RealTimeMap_map\" style=\"overflow:hidden;\"></div>
        <div class=\"realTimeMap_overlay\">
            ";
        // line 9
        if ((($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "showFooterMessage", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "showFooterMessage"), true)) : (true))) {
            // line 10
            echo "            <span class=\"showing_visits_of\" style=\"display:none;\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountryMap_ShowingVisits")), "html", null, true);
            echo "
                <span class=\"realTimeMap_timeSpan\" style=\"font-weight:bold;\"></span>
            </span>
            ";
        }
        // line 14
        echo "            <span class=\"no_data\" style=\"display:none;\">";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreHome_ThereIsNoDataForThisReport")), "html", null, true);
        echo "</span>
            <span class=\"loading_data\">";
        // line 15
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_LoadingData")), "html", null, true);
        echo "...</span>
            <img src=\"plugins/UserCountryMap/images/realtimemap-loading.gif\" style=\"vertical-align:baseline;position:relative;left:-2px;\">
        </div>
        ";
        // line 18
        if ((($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "showDateTime", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["config"]) ? $context["config"] : null), "showDateTime"), true)) : (true))) {
            // line 19
            echo "        <div class=\"realTimeMap_overlay realTimeMap_datetime\"></div>
        ";
        }
        // line 21
        echo "    </div>
    <div class=\"RealTimeMap_meta\">
        <span class=\"loadingPiwik\">
            <img src=\"plugins/Zeitgeist/images/loading-blue.gif\"> ";
        // line 24
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_LoadingData")), "html", null, true);
        echo "...
        </span>
    </div>

</div>
<script type=\"text/javascript\">UserCountryMap.RealtimeMap.initElements();</script>";
    }

    public function getTemplateName()
    {
        return "@UserCountryMap/realtimeMap.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 24,  62 => 21,  58 => 19,  56 => 18,  50 => 15,  45 => 14,  37 => 10,  35 => 9,  26 => 3,  22 => 2,  19 => 1,);
    }
}
