<?php

/* _jsCssIncludes.twig */
class __TwigTemplate_b4d9164927b1a09f0816922c1302918e3a4d2f5315264fafa8ae7242ad22158e extends Twig_Template
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
        // line 2
        echo "    ";
        echo call_user_func_array($this->env->getFunction('includeAssets')->getCallable(), array(array("type" => "css")));
        echo "
    ";
        // line 3
        echo call_user_func_array($this->env->getFunction('includeAssets')->getCallable(), array(array("type" => "js")));
        echo "
";
        // line 5
        if ((call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_LayoutDirection")) == "rtl")) {
            // line 6
            echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"plugins/Zeitgeist/stylesheets/rtl.css\"/>
";
        }
    }

    public function getTemplateName()
    {
        return "_jsCssIncludes.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 6,  24 => 3,  27 => 4,  21 => 2,  364 => 158,  358 => 155,  355 => 154,  349 => 151,  346 => 150,  344 => 149,  337 => 147,  330 => 145,  323 => 143,  315 => 138,  309 => 135,  298 => 127,  291 => 123,  284 => 119,  280 => 118,  269 => 110,  265 => 109,  259 => 108,  251 => 103,  247 => 102,  241 => 99,  234 => 95,  230 => 94,  227 => 93,  221 => 91,  219 => 90,  216 => 89,  208 => 86,  205 => 85,  203 => 84,  200 => 83,  196 => 81,  185 => 79,  181 => 78,  178 => 77,  176 => 76,  173 => 75,  170 => 74,  167 => 73,  164 => 72,  158 => 67,  149 => 63,  145 => 61,  143 => 60,  140 => 59,  137 => 58,  131 => 56,  128 => 55,  126 => 54,  123 => 53,  119 => 52,  112 => 51,  103 => 48,  100 => 47,  94 => 45,  92 => 44,  85 => 39,  83 => 38,  78 => 36,  74 => 35,  56 => 19,  54 => 18,  48 => 15,  45 => 14,  40 => 12,  38 => 11,  36 => 10,  28 => 5,  19 => 2,);
    }
}
