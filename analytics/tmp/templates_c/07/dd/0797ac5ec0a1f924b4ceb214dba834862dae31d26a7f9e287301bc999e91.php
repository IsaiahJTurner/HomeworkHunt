<?php

/* @CoreHome/_logo.twig */
class __TwigTemplate_07dd0797ac5ec0a1f924b4ceb214dba834862dae31d26a7f9e287301bc999e91 extends Twig_Template
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
        echo "<span id=\"logo\">
    <a href=\"index.php\" title=\"";
        // line 2
        if ((isset($context["isCustomLogo"]) ? $context["isCustomLogo"] : $this->getContext($context, "isCustomLogo"))) {
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_PoweredBy")), "html", null, true);
            echo " ";
        }
        echo "Piwik # ";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_OpenSourceWebAnalytics")), "html", null, true);
        echo "\">
    ";
        // line 3
        if ((isset($context["hasSVGLogo"]) ? $context["hasSVGLogo"] : $this->getContext($context, "hasSVGLogo"))) {
            // line 4
            echo "        <img src='";
            echo twig_escape_filter($this->env, (isset($context["logoSVG"]) ? $context["logoSVG"] : $this->getContext($context, "logoSVG")), "html", null, true);
            echo "' alt=\"";
            if ((isset($context["isCustomLogo"]) ? $context["isCustomLogo"] : $this->getContext($context, "isCustomLogo"))) {
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_PoweredBy")), "html", null, true);
                echo " ";
            }
            echo "Piwik\" class=\"ie-hide ";
            if ((!(isset($context["isCustomLogo"]) ? $context["isCustomLogo"] : $this->getContext($context, "isCustomLogo")))) {
                echo "default-piwik-logo";
            }
            echo "\" />
        <!--[if lt IE 9]>
    ";
        }
        // line 7
        echo "        <img src='";
        echo twig_escape_filter($this->env, (isset($context["logoHeader"]) ? $context["logoHeader"] : $this->getContext($context, "logoHeader")), "html", null, true);
        echo "' alt=\"";
        if ((isset($context["isCustomLogo"]) ? $context["isCustomLogo"] : $this->getContext($context, "isCustomLogo"))) {
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_PoweredBy")), "html", null, true);
            echo " ";
        }
        echo "Piwik\" />
    ";
        // line 8
        if ((isset($context["hasSVGLogo"]) ? $context["hasSVGLogo"] : $this->getContext($context, "hasSVGLogo"))) {
            echo "<![endif]-->";
        }
        // line 9
        echo "</a>
</span>
";
    }

    public function getTemplateName()
    {
        return "@CoreHome/_logo.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 9,  49 => 7,  33 => 4,  52 => 17,  48 => 15,  21 => 3,  24 => 3,  144 => 38,  138 => 36,  136 => 35,  131 => 33,  128 => 32,  121 => 31,  116 => 29,  112 => 28,  108 => 27,  104 => 26,  100 => 25,  96 => 24,  92 => 23,  87 => 22,  85 => 21,  80 => 20,  77 => 15,  71 => 14,  68 => 13,  62 => 12,  59 => 8,  44 => 8,  35 => 6,  31 => 3,  27 => 4,  23 => 3,  19 => 1,  140 => 46,  137 => 45,  133 => 37,  130 => 36,  127 => 35,  120 => 22,  118 => 21,  113 => 18,  111 => 17,  109 => 16,  107 => 15,  102 => 13,  89 => 9,  83 => 7,  75 => 48,  72 => 47,  70 => 45,  66 => 44,  60 => 41,  55 => 38,  53 => 10,  50 => 9,  41 => 11,  38 => 29,  36 => 28,  32 => 26,  30 => 7,  22 => 2,  56 => 12,  54 => 11,  51 => 10,  47 => 33,  45 => 32,  42 => 6,  40 => 5,  37 => 10,  34 => 3,  29 => 2,);
    }
}
