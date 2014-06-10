<?php

/* @Installation/databaseSetup.twig */
class __TwigTemplate_8b234f89ab554c134135e20498d9acec1056b669af0060c2fa5feb04bef59250 extends Twig_Template
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
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_DatabaseSetup")), "html", null, true);
        echo "</h2>

";
        // line 6
        if (array_key_exists("errorMessage", $context)) {
            // line 7
            echo "    <div class=\"error\">
        <img src=\"plugins/Zeitgeist/images/error_medium.png\"/>
        ";
            // line 9
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_DatabaseErrorConnect")), "html", null, true);
            echo ":
        <br/>";
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
        return "@Installation/databaseSetup.twig";
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
