<?php

/* @CoreHome/_favicon.twig */
class __TwigTemplate_a4ffe32bad31bfd03916dd4fbc7bd399526e01f85e638a58c9c1c0325d507ed0 extends Twig_Template
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
        if ((((isset($context["isCustomLogo"]) ? $context["isCustomLogo"] : $this->getContext($context, "isCustomLogo")) && array_key_exists("customFavicon", $context)) && (isset($context["customFavicon"]) ? $context["customFavicon"] : $this->getContext($context, "customFavicon")))) {
            // line 2
            echo "    <link rel=\"shortcut icon\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["customFavicon"]) ? $context["customFavicon"] : $this->getContext($context, "customFavicon")), "html", null, true);
            echo "\"/>
";
        } else {
            // line 4
            echo "    <link rel=\"shortcut icon\" href=\"plugins/CoreHome/images/favicon.ico\"/>
";
        }
    }

    public function getTemplateName()
    {
        return "@CoreHome/_favicon.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 4,  21 => 2,  364 => 158,  358 => 155,  355 => 154,  349 => 151,  346 => 150,  344 => 149,  337 => 147,  330 => 145,  323 => 143,  315 => 138,  309 => 135,  298 => 127,  291 => 123,  284 => 119,  280 => 118,  269 => 110,  265 => 109,  259 => 108,  251 => 103,  247 => 102,  241 => 99,  234 => 95,  230 => 94,  227 => 93,  221 => 91,  219 => 90,  216 => 89,  208 => 86,  205 => 85,  203 => 84,  200 => 83,  196 => 81,  185 => 79,  181 => 78,  178 => 77,  176 => 76,  173 => 75,  170 => 74,  167 => 73,  164 => 72,  158 => 67,  149 => 63,  145 => 61,  143 => 60,  140 => 59,  137 => 58,  131 => 56,  128 => 55,  126 => 54,  123 => 53,  119 => 52,  112 => 51,  103 => 48,  100 => 47,  94 => 45,  92 => 44,  85 => 39,  83 => 38,  78 => 36,  74 => 35,  56 => 19,  54 => 18,  48 => 15,  45 => 14,  40 => 12,  38 => 11,  36 => 10,  28 => 8,  19 => 1,);
    }
}
