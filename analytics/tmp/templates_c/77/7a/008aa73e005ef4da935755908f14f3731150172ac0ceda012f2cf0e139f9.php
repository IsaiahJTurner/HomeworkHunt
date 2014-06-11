<?php

/* @Live/indexVisitorLog.twig */
class __TwigTemplate_777a008aa73e005ef4da935755908f14f3731150172ac0ceda012f2cf0e139f9 extends Twig_Template
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
        echo "<h2 piwik-enriched-headline>";
        if ((isset($context["filterEcommerce"]) ? $context["filterEcommerce"] : $this->getContext($context, "filterEcommerce"))) {
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_EcommerceLog")), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_VisitorLog")), "html", null, true);
        }
        echo "</h2>

";
        // line 3
        echo (isset($context["visitorLog"]) ? $context["visitorLog"] : $this->getContext($context, "visitorLog"));
        echo "
";
    }

    public function getTemplateName()
    {
        return "@Live/indexVisitorLog.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 3,  19 => 1,);
    }
}
