<?php

/* @SitesManager/_displayJavascriptCode.twig */
class __TwigTemplate_b8ece5046c99f7dc85f6d4016f2d6537b3c4ac10631d6bc6eb3402dcd97cdc22 extends Twig_Template
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
        echo "<h2>";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("SitesManager_TrackingTags", (isset($context["displaySiteName"]) ? $context["displaySiteName"] : $this->getContext($context, "displaySiteName")))), "html", null, true);
        echo "</h2>

<div class='trackingHelp'>
    <p>";
        // line 4
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_JSTracking_Intro")), "html", null, true);
        echo "</p>

    <p>";
        // line 6
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTrackingIntro3", "<a href=\"http://piwik.org/integrate/\" target=\"_blank\">", "</a>"));
        echo "</p>

    <h3>";
        // line 8
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_JsTrackingTag")), "html", null, true);
        echo "</h3>

    <p>";
        // line 10
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_CodeNote", "&lt;/body&gt;"));
        echo "</p>

    <pre class=\"code-pre\"><code>";
        // line 12
        echo (isset($context["jsTag"]) ? $context["jsTag"] : $this->getContext($context, "jsTag"));
        echo "</code></pre>

    <br/>
    <p>";
        // line 15
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTrackingIntro5", "<a target=\"_blank\" href=\"http://piwik.org/docs/javascript-tracking/\">", "</a>"));
        echo "</p>

    <p>";
        // line 17
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_JSTracking_EndNote", "<em>", "</em>"));
        echo "</p>
</div>";
    }

    public function getTemplateName()
    {
        return "@SitesManager/_displayJavascriptCode.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 17,  52 => 15,  46 => 12,  41 => 10,  36 => 8,  31 => 6,  26 => 4,  19 => 1,);
    }
}
