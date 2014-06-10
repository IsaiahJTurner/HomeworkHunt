<?php

/* _iframeBuster.twig */
class __TwigTemplate_05ae0825cc1ca6b6f746f969fc84763bea56ad10525c4986fd0161e4d7c950e5 extends Twig_Template
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
        if ((array_key_exists("enableFrames", $context) && ((isset($context["enableFrames"]) ? $context["enableFrames"] : $this->getContext($context, "enableFrames")) == false))) {
            // line 2
            echo "    <script type=\"text/javascript\">
        \$(function () {
        \$('body').css(\"display\", \"none\");
        if (self == top) {
            var theBody = document.getElementsByTagName('body')[0];
            theBody.style.display = 'block';
        } else { top.location = self.location; }
    });
    </script>
";
        }
    }

    public function getTemplateName()
    {
        return "_iframeBuster.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 6,  24 => 3,  27 => 4,  21 => 2,  364 => 158,  358 => 155,  355 => 154,  349 => 151,  346 => 150,  344 => 149,  337 => 147,  330 => 145,  323 => 143,  315 => 138,  309 => 135,  298 => 127,  291 => 123,  284 => 119,  280 => 118,  269 => 110,  265 => 109,  259 => 108,  251 => 103,  247 => 102,  241 => 99,  234 => 95,  230 => 94,  227 => 93,  221 => 91,  219 => 90,  216 => 89,  208 => 86,  205 => 85,  203 => 84,  200 => 83,  196 => 81,  185 => 79,  181 => 78,  178 => 77,  176 => 76,  173 => 75,  170 => 74,  167 => 73,  164 => 72,  158 => 67,  149 => 63,  145 => 61,  143 => 60,  140 => 59,  137 => 58,  131 => 56,  128 => 55,  126 => 54,  123 => 53,  119 => 52,  112 => 51,  103 => 48,  100 => 47,  94 => 45,  92 => 44,  85 => 39,  83 => 38,  78 => 36,  74 => 35,  56 => 19,  54 => 18,  48 => 15,  45 => 14,  40 => 12,  38 => 11,  36 => 10,  28 => 5,  19 => 1,);
    }
}
