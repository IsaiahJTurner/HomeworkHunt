<?php

/* @Installation/layout.twig */
class __TwigTemplate_0e3fb6a6f9133caecb230680df754431e73cbf81f714be33dfcd4ffd9e07113d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"utf-8\">
    <title>Piwik &rsaquo; ";
        // line 5
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_Installation")), "html", null, true);
        echo "</title>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"libs/jquery/themes/base/jquery-ui.css\"/>
    <link rel=\"stylesheet\" type=\"text/css\" href=\"index.php?module=Installation&action=getBaseCss\"/>
    <link rel=\"shortcut icon\" href=\"plugins/CoreHome/images/favicon.ico\"/>
    <script type=\"text/javascript\" src=\"libs/jquery/jquery.js\"></script>
    <script type=\"text/javascript\" src=\"libs/jquery/jquery-ui.js\"></script>
    <script type=\"text/javascript\" src=\"plugins/Installation/javascripts/installation.js\"></script>

    <link rel=\"stylesheet\" type=\"text/css\" href=\"plugins/Installation/stylesheets/installation.css\"/>
    ";
        // line 14
        if ((call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_LayoutDirection")) == "rtl")) {
            // line 15
            echo "        <link rel=\"stylesheet\" type=\"text/css\" href=\"plugins/Zeitgeist/stylesheets/rtl.css\"/>
    ";
        }
        // line 17
        echo "</head>
<body>
<div id=\"installationPage\">
    <div id=\"content\">
        <div id=\"logo\">
            <img id=\"title\" src=\"plugins/Morpheus/images/logo.png\"/> &nbsp;&nbsp;&nbsp;<span
                    id=\"subtitle\"># ";
        // line 23
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_OpenSourceWebAnalytics")), "html", null, true);
        echo "</span>
        </div>
        <div style=\"float:right;\" id=\"topRightBar\">
            <br/>
            ";
        // line 27
        echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Template.topBar"));
        echo "
        </div>
        <div class=\"both\"></div>

        <div id=\"generalInstall\">
            ";
        // line 32
        $this->env->loadTemplate("@Installation/_allSteps.twig")->display($context);
        // line 33
        echo "        </div>

        <div id=\"detailInstall\">
            ";
        // line 36
        ob_start();
        // line 37
        echo "            <p class=\"nextStep\">
                <a class=\"submit\" href=\"";
        // line 38
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('linkTo')->getCallable(), array(array("action" => (isset($context["nextModuleName"]) ? $context["nextModuleName"] : $this->getContext($context, "nextModuleName")), "token_auth" => null, "method" => null))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Next")), "html", null, true);
        echo " &raquo;</a>
            </p>
            ";
        $context["nextButton"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 41
        echo "            ";
        if ((array_key_exists("showNextStepAtTop", $context) && (isset($context["showNextStepAtTop"]) ? $context["showNextStepAtTop"] : $this->getContext($context, "showNextStepAtTop")))) {
            // line 42
            echo "                ";
            echo twig_escape_filter($this->env, (isset($context["nextButton"]) ? $context["nextButton"] : $this->getContext($context, "nextButton")), "html", null, true);
            echo "
            ";
        }
        // line 44
        echo "            ";
        $this->displayBlock('content', $context, $blocks);
        // line 45
        echo "            ";
        if ((isset($context["showNextStep"]) ? $context["showNextStep"] : $this->getContext($context, "showNextStep"))) {
            // line 46
            echo "                ";
            echo twig_escape_filter($this->env, (isset($context["nextButton"]) ? $context["nextButton"] : $this->getContext($context, "nextButton")), "html", null, true);
            echo "
            ";
        }
        // line 48
        echo "        </div>

        <div class=\"both\"></div>

        <br/>
        <br/>

        <h3>";
        // line 55
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_InstallationStatus")), "html", null, true);
        echo "</h3>

        <div id=\"progressbar\" data-progress=\"";
        // line 57
        echo twig_escape_filter($this->env, (isset($context["percentDone"]) ? $context["percentDone"] : $this->getContext($context, "percentDone")), "html", null, true);
        echo "\"></div>
        ";
        // line 58
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_PercentDone", (isset($context["percentDone"]) ? $context["percentDone"] : $this->getContext($context, "percentDone")))), "html", null, true);
        echo "
    </div>
</div>
</body>
</html>
";
    }

    // line 44
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "@Installation/layout.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 44,  126 => 58,  122 => 57,  117 => 55,  108 => 48,  102 => 46,  99 => 45,  96 => 44,  90 => 42,  87 => 41,  79 => 38,  76 => 37,  74 => 36,  69 => 33,  67 => 32,  59 => 27,  44 => 17,  40 => 15,  38 => 14,  26 => 5,  20 => 1,  85 => 37,  82 => 36,  80 => 35,  58 => 15,  52 => 23,  45 => 9,  39 => 7,  37 => 6,  31 => 4,  28 => 3,);
    }
}
