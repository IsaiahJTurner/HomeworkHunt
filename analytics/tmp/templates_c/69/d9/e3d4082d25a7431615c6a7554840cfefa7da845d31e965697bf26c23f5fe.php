<?php

/* @Installation/firstWebsiteSetup.twig */
class __TwigTemplate_69d9e3d4082d25a7431615c6a7554840cfefa7da845d31e965697bf26c23f5fe extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("@Installation/layout.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Installation/layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        if (array_key_exists("displayGeneralSetupSuccess", $context)) {
            // line 5
            echo "    <span id=\"toFade\" class=\"success\">
\t    ";
            // line 6
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SuperUserSetupSuccess")), "html", null, true);
            echo "
        <img src=\"plugins/Zeitgeist/images/success_medium.png\"/>
    </span>
";
        }
        // line 10
        echo "
<h2>";
        // line 11
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SetupWebsite")), "html", null, true);
        echo "</h2>
<p>";
        // line 12
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SiteSetup")), "html", null, true);
        echo "</p>
";
        // line 13
        if (array_key_exists("errorMessage", $context)) {
            // line 14
            echo "    <div class=\"error\">
        <img src=\"plugins/Zeitgeist/images/error_medium.png\"/>
        ";
            // line 16
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SetupWebsiteError")), "html", null, true);
            echo ":
        <br/>- ";
            // line 17
            echo (isset($context["errorMessage"]) ? $context["errorMessage"] : $this->getContext($context, "errorMessage"));
            echo "

    </div>
";
        }
        // line 21
        echo "
";
        // line 22
        if (array_key_exists("form_data", $context)) {
            // line 23
            echo "    ";
            $this->env->loadTemplate("genericForm.twig")->display($context);
        }
        // line 25
        echo "<br/>
<p><em>";
        // line 26
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SiteSetupFootnote")), "html", null, true);
        echo "</em></p>
";
    }

    public function getTemplateName()
    {
        return "@Installation/firstWebsiteSetup.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 26,  80 => 25,  76 => 23,  74 => 22,  71 => 21,  64 => 17,  60 => 16,  56 => 14,  54 => 13,  50 => 12,  46 => 11,  43 => 10,  36 => 6,  33 => 5,  31 => 4,  28 => 3,);
    }
}
