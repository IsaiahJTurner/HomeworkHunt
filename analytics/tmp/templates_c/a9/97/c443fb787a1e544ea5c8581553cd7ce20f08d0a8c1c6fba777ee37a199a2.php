<?php

/* @Installation/setupSuperUser.twig */
class __TwigTemplate_a997c443fb787a1e544ea5c8581553cd7ce20f08d0a8c1c6fba777ee37a199a2 extends Twig_Template
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
        echo "<h2>";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SuperUser")), "html", null, true);
        echo "</h2>

";
        // line 6
        if (array_key_exists("errorMessage", $context)) {
            // line 7
            echo "    <div class=\"error\">
        <img src=\"plugins/Zeitgeist/images/error_medium.png\"/>
        ";
            // line 9
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SuperUserSetupError")), "html", null, true);
            echo ":
        <br/>- ";
            // line 10
            echo (isset($context["errorMessage"]) ? $context["errorMessage"] : $this->getContext($context, "errorMessage"));
            echo "

    </div>
";
        }
        // line 14
        echo "
";
        // line 15
        if (array_key_exists("form_data", $context)) {
            // line 16
            echo "    ";
            $this->env->loadTemplate("genericForm.twig")->display($context);
        }
    }

    public function getTemplateName()
    {
        return "@Installation/setupSuperUser.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 16,  57 => 15,  54 => 14,  47 => 10,  43 => 9,  39 => 7,  37 => 6,  31 => 4,  28 => 3,);
    }
}
