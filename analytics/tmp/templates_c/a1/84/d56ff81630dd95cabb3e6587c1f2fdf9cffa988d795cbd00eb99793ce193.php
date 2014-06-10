<?php

/* @CoreHome/_notifications.twig */
class __TwigTemplate_a184d56ff81630dd95cabb3e6587c1f2fdf9cffa988d795cbd00eb99793ce193 extends Twig_Template
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
        echo "<div id=\"notificationContainer\">
    ";
        // line 2
        if (twig_length_filter($this->env, (isset($context["notifications"]) ? $context["notifications"] : $this->getContext($context, "notifications")))) {
            // line 3
            echo "        ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["notifications"]) ? $context["notifications"] : $this->getContext($context, "notifications")));
            foreach ($context['_seq'] as $context["notificationId"] => $context["n"]) {
                // line 4
                echo "
            ";
                // line 5
                echo call_user_func_array($this->env->getFilter('notification')->getCallable(), array($this->getAttribute((isset($context["n"]) ? $context["n"] : $this->getContext($context, "n")), "message"), array("id" => (isset($context["notificationId"]) ? $context["notificationId"] : $this->getContext($context, "notificationId")), "type" => $this->getAttribute((isset($context["n"]) ? $context["n"] : $this->getContext($context, "n")), "type"), "title" => $this->getAttribute((isset($context["n"]) ? $context["n"] : $this->getContext($context, "n")), "title"), "noclear" => $this->getAttribute((isset($context["n"]) ? $context["n"] : $this->getContext($context, "n")), "hasNoClear"), "context" => $this->getAttribute((isset($context["n"]) ? $context["n"] : $this->getContext($context, "n")), "context"), "raw" => $this->getAttribute((isset($context["n"]) ? $context["n"] : $this->getContext($context, "n")), "raw")), false));
                echo "

        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['notificationId'], $context['n'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 8
            echo "    ";
        }
        // line 9
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "@CoreHome/_notifications.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 17,  78 => 22,  64 => 18,  57 => 14,  46 => 10,  28 => 5,  79 => 11,  67 => 9,  58 => 8,  90 => 24,  82 => 12,  74 => 20,  69 => 8,  39 => 8,  26 => 4,  63 => 6,  49 => 12,  33 => 6,  52 => 5,  48 => 6,  21 => 2,  24 => 3,  144 => 38,  138 => 36,  136 => 35,  131 => 33,  128 => 32,  121 => 31,  116 => 29,  112 => 28,  108 => 27,  104 => 26,  100 => 25,  96 => 13,  92 => 16,  87 => 22,  85 => 21,  80 => 20,  77 => 11,  71 => 14,  68 => 13,  62 => 12,  59 => 16,  44 => 9,  35 => 6,  31 => 6,  27 => 1,  23 => 3,  19 => 1,  140 => 46,  137 => 45,  133 => 37,  130 => 36,  127 => 35,  120 => 22,  118 => 21,  113 => 18,  111 => 17,  109 => 16,  107 => 15,  102 => 13,  89 => 9,  83 => 7,  75 => 10,  72 => 19,  70 => 19,  66 => 17,  60 => 15,  55 => 15,  53 => 10,  50 => 9,  41 => 8,  38 => 2,  36 => 7,  32 => 5,  30 => 7,  22 => 2,  56 => 12,  54 => 13,  51 => 10,  47 => 10,  45 => 32,  42 => 9,  40 => 5,  37 => 7,  34 => 3,  29 => 4,);
    }
}
