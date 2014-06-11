<?php

/* @CoreHome/getDefaultIndexView.twig */
class __TwigTemplate_18d9b2087e1df489ffe03a934ad55cca4ca7a802444d1a568b6590b383a8323a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("dashboard.twig");

        $this->blocks = array(
            'notification' => array($this, 'block_notification'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "dashboard.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_notification($context, array $blocks = array())
    {
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
";
        // line 5
        $this->env->loadTemplate("@CoreHome/_siteSelectHeader.twig")->display($context);
        // line 6
        echo "
";
        // line 7
        if ((array_key_exists("menu", $context) && (isset($context["menu"]) ? $context["menu"] : $this->getContext($context, "menu")))) {
            // line 8
            echo "  ";
            $this->env->loadTemplate("@CoreHome/_menu.twig")->display($context);
        }
        // line 10
        echo "
";
        // line 11
        $this->env->loadTemplate("@CoreHome/_indexContent.twig")->display($context);
        // line 12
        echo "
";
    }

    public function getTemplateName()
    {
        return "@CoreHome/getDefaultIndexView.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 12,  54 => 11,  51 => 10,  47 => 8,  45 => 7,  42 => 6,  40 => 5,  37 => 4,  34 => 3,  29 => 2,);
    }
}
