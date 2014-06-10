<?php

/* @CoreHome/_menu.twig */
class __TwigTemplate_3a6f39942c03619a08825fb0a4e263829d3e030abe375a009c4238ad80305d20 extends Twig_Template
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
        echo "<div class=\"Menu--dashboard\">

    <ul class=\"Menu-tabList\">
        ";
        // line 4
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["menu"]) ? $context["menu"] : $this->getContext($context, "menu")));
        foreach ($context['_seq'] as $context["level1"] => $context["level2"]) {
            // line 5
            echo "            <li id=\"";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('urlRewriteWithParameters')->getCallable(), array($this->getAttribute((isset($context["level2"]) ? $context["level2"] : $this->getContext($context, "level2")), "_url"))), "html", null, true);
            echo "\">
                <a href=\"#";
            // line 6
            echo twig_escape_filter($this->env, twig_slice($this->env, call_user_func_array($this->env->getFilter('urlRewriteWithParameters')->getCallable(), array($this->getAttribute((isset($context["level2"]) ? $context["level2"] : $this->getContext($context, "level2")), "_url"))), 1), "html", null, true);
            echo "\"
                   onclick=\"return piwikMenu.onItemClick(this);\">";
            // line 7
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array((isset($context["level1"]) ? $context["level1"] : $this->getContext($context, "level1")))), "html", null, true);
            echo "</a>
                <ul>
                ";
            // line 9
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["level2"]) ? $context["level2"] : $this->getContext($context, "level2")));
            foreach ($context['_seq'] as $context["name"] => $context["urlParameters"]) {
                // line 10
                echo "                    ";
                if ((twig_slice($this->env, (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), 0, 1) != "_")) {
                    // line 11
                    echo "                        <li>
                            <a href='#";
                    // line 12
                    echo twig_escape_filter($this->env, twig_slice($this->env, call_user_func_array($this->env->getFilter('urlRewriteWithParameters')->getCallable(), array($this->getAttribute((isset($context["urlParameters"]) ? $context["urlParameters"] : $this->getContext($context, "urlParameters")), "_url"))), 1), "html", null, true);
                    echo "'
                               onclick='return piwikMenu.onItemClick(this);'>
                                ";
                    // line 14
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array((isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")))), "html", null, true);
                    echo "
                            </a>
                        </li>
                    ";
                }
                // line 18
                echo "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['urlParameters'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 19
            echo "                </ul>
            </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['level1'], $context['level2'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "        <li id=\"Searchmenu\">
            <span piwik-quick-access></span>
        </li>
    </ul>

</div>
<div class=\"nav_sep\"></div>
";
    }

    public function getTemplateName()
    {
        return "@CoreHome/_menu.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 22,  64 => 18,  57 => 14,  46 => 10,  28 => 5,  79 => 11,  67 => 9,  58 => 8,  90 => 24,  82 => 12,  74 => 20,  69 => 18,  39 => 3,  26 => 2,  63 => 9,  49 => 11,  33 => 6,  52 => 12,  48 => 6,  21 => 3,  24 => 4,  144 => 38,  138 => 36,  136 => 35,  131 => 33,  128 => 32,  121 => 31,  116 => 29,  112 => 28,  108 => 27,  104 => 26,  100 => 25,  96 => 13,  92 => 23,  87 => 22,  85 => 21,  80 => 20,  77 => 15,  71 => 14,  68 => 13,  62 => 12,  59 => 8,  44 => 8,  35 => 6,  31 => 3,  27 => 4,  23 => 3,  19 => 1,  140 => 46,  137 => 45,  133 => 37,  130 => 36,  127 => 35,  120 => 22,  118 => 21,  113 => 18,  111 => 17,  109 => 16,  107 => 15,  102 => 13,  89 => 9,  83 => 7,  75 => 10,  72 => 19,  70 => 19,  66 => 17,  60 => 15,  55 => 7,  53 => 10,  50 => 9,  41 => 11,  38 => 29,  36 => 28,  32 => 26,  30 => 7,  22 => 2,  56 => 12,  54 => 13,  51 => 10,  47 => 10,  45 => 32,  42 => 9,  40 => 5,  37 => 7,  34 => 3,  29 => 5,);
    }
}
