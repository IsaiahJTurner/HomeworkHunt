<?php

/* dashboard.twig */
class __TwigTemplate_0fc31d8e6a9fbaeef34c48fc7d3c7e17934de5a67c1e06695e2174875ee4226b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'notification' => array($this, 'block_notification'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<!--[if lt IE 9 ]>
<html class=\"old-ie\" id=\"ng-app\" ng-app=\"piwikApp\"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html id=\"ng-app\" ng-app=\"piwikApp\"><!--<![endif]-->
    <head>
        ";
        // line 7
        $this->displayBlock('head', $context, $blocks);
        // line 26
        echo "    </head>
    <body ng-app=\"app\">
    ";
        // line 28
        $this->env->loadTemplate("_iframeBuster.twig")->display($context);
        // line 29
        echo "    ";
        $this->env->loadTemplate("@CoreHome/_javaScriptDisabled.twig")->display($context);
        // line 30
        echo "
    <div id=\"root\">
        ";
        // line 32
        $this->env->loadTemplate("@CoreHome/_warningInvalidHost.twig")->display($context);
        // line 33
        echo "        ";
        $this->env->loadTemplate("@CoreHome/_topScreen.twig")->display($context);
        // line 34
        echo "
        ";
        // line 35
        $this->displayBlock('notification', $context, $blocks);
        // line 38
        echo "
        <div class=\"ui-confirm\" id=\"alert\">
            <h2></h2>
            <input role=\"yes\" type=\"button\" value=\"";
        // line 41
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Ok")), "html", null, true);
        echo "\"/>
        </div>

    ";
        // line 44
        echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Template.beforeContent", "dashboard", (isset($context["currentModule"]) ? $context["currentModule"] : $this->getContext($context, "currentModule"))));
        echo "
        ";
        // line 45
        $this->displayBlock('content', $context, $blocks);
        // line 47
        echo "    </div>
    ";
        // line 48
        echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Template.footer"));
        echo "
    </body>
</html>
";
    }

    // line 7
    public function block_head($context, array $blocks = array())
    {
        echo "            
            <meta charset=\"utf-8\">
            <title>";
        // line 9
        echo (isset($context["siteName"]) ? $context["siteName"] : $this->getContext($context, "siteName"));
        echo " - ";
        if (((isset($context["isCustomLogo"]) ? $context["isCustomLogo"] : $this->getContext($context, "isCustomLogo")) == false)) {
            echo "Piwik &rsaquo; ";
        }
        echo " ";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreHome_WebAnalyticsReports")), "html", null, true);
        echo "</title>
            <meta http-equiv=\"X-UA-Compatible\" content=\"IE=EDGE,chrome=1\"/>
            <meta name=\"viewport\" content=\"initial-scale=1.0\" />
            <meta name=\"generator\" content=\"Piwik - Open Source Web Analytics\"/>
            <meta name=\"description\" content=\"Web Analytics report for '";
        // line 13
        echo twig_escape_filter($this->env, (isset($context["siteName"]) ? $context["siteName"] : $this->getContext($context, "siteName")), "html_attr");
        echo "' - Piwik\"/>
            <meta name=\"apple-itunes-app\" content=\"app-id=737216887\" />
";
        // line 15
        $this->env->loadTemplate("@CoreHome/_favicon.twig")->display($context);
        // line 16
        $this->env->loadTemplate("_jsGlobalVariables.twig")->display($context);
        // line 17
        $this->env->loadTemplate("_piwikTag.twig")->display($context);
        // line 18
        echo "            <!--[if lt IE 9]>
            <script language=\"javascript\" type=\"text/javascript\" src=\"libs/jqplot/excanvas.min.js\"></script>
            <![endif]-->
";
        // line 21
        $this->env->loadTemplate("_jsCssIncludes.twig")->display($context);
        // line 22
        echo "            <!--[if IE]>
            <link rel=\"stylesheet\" type=\"text/css\" href=\"plugins/Zeitgeist/stylesheets/ieonly.css\"/>
            <![endif]-->
        ";
    }

    // line 35
    public function block_notification($context, array $blocks = array())
    {
        // line 36
        echo "            ";
        $this->env->loadTemplate("@CoreHome/_notifications.twig")->display($context);
        // line 37
        echo "        ";
    }

    // line 45
    public function block_content($context, array $blocks = array())
    {
        // line 46
        echo "        ";
    }

    public function getTemplateName()
    {
        return "dashboard.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  140 => 46,  137 => 45,  133 => 37,  130 => 36,  127 => 35,  120 => 22,  118 => 21,  113 => 18,  111 => 17,  109 => 16,  107 => 15,  102 => 13,  89 => 9,  83 => 7,  75 => 48,  72 => 47,  70 => 45,  66 => 44,  60 => 41,  55 => 38,  53 => 35,  50 => 34,  41 => 30,  38 => 29,  36 => 28,  32 => 26,  30 => 7,  22 => 1,  56 => 12,  54 => 11,  51 => 10,  47 => 33,  45 => 32,  42 => 6,  40 => 5,  37 => 4,  34 => 3,  29 => 2,);
    }
}
