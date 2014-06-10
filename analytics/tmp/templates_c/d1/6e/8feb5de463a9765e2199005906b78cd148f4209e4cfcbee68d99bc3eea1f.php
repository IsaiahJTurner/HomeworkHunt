<?php

/* @CoreHome/_indexContent.twig */
class __TwigTemplate_d16e8feb5de463a9765e2199005906b78cd148f4209e4cfcbee68d99bc3eea1f extends Twig_Template
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
        $context["ajax"] = $this->env->loadTemplate("ajaxMacros.twig");
        // line 2
        echo "<div class=\"pageWrap\">
    ";
        // line 3
        $this->env->loadTemplate("@CoreHome/_notifications.twig")->display($context);
        // line 4
        echo "    <div class=\"top_controls\">
        ";
        // line 5
        $this->env->loadTemplate("@CoreHome/_periodSelect.twig")->display($context);
        // line 6
        echo "        ";
        echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Template.nextToCalendar"));
        echo "
        ";
        // line 7
        $template = $this->env->resolveTemplate($context["dashboardSettingsControl"]->getTemplateFile());
        $template->display(array_merge($context, $context["dashboardSettingsControl"]->getTemplateVars()));
        // line 8
        echo "        ";
        $this->env->loadTemplate("@CoreHome/_headerMessage.twig")->display($context);
        // line 9
        echo "        ";
        echo $context["ajax"]->getrequestErrorDiv();
        echo "
    </div>

    ";
        // line 12
        echo $context["ajax"]->getloadingDiv();
        echo "

    <div id=\"content\" class=\"home\">
        ";
        // line 15
        if ((isset($context["content"]) ? $context["content"] : $this->getContext($context, "content"))) {
            echo twig_escape_filter($this->env, (isset($context["content"]) ? $context["content"] : $this->getContext($context, "content")), "html", null, true);
        }
        // line 16
        echo "    </div>
    <div class=\"clear\"></div>
</div>

<br/><br/>";
    }

    public function getTemplateName()
    {
        return "@CoreHome/_indexContent.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 22,  64 => 18,  57 => 14,  46 => 10,  28 => 5,  79 => 11,  67 => 9,  58 => 8,  90 => 24,  82 => 12,  74 => 20,  69 => 18,  39 => 8,  26 => 4,  63 => 9,  49 => 12,  33 => 6,  52 => 12,  48 => 6,  21 => 2,  24 => 3,  144 => 38,  138 => 36,  136 => 35,  131 => 33,  128 => 32,  121 => 31,  116 => 29,  112 => 28,  108 => 27,  104 => 26,  100 => 25,  96 => 13,  92 => 23,  87 => 22,  85 => 21,  80 => 20,  77 => 15,  71 => 14,  68 => 13,  62 => 12,  59 => 16,  44 => 8,  35 => 6,  31 => 6,  27 => 4,  23 => 3,  19 => 1,  140 => 46,  137 => 45,  133 => 37,  130 => 36,  127 => 35,  120 => 22,  118 => 21,  113 => 18,  111 => 17,  109 => 16,  107 => 15,  102 => 13,  89 => 9,  83 => 7,  75 => 10,  72 => 19,  70 => 19,  66 => 17,  60 => 15,  55 => 15,  53 => 10,  50 => 9,  41 => 11,  38 => 29,  36 => 7,  32 => 26,  30 => 7,  22 => 2,  56 => 12,  54 => 13,  51 => 10,  47 => 10,  45 => 32,  42 => 9,  40 => 5,  37 => 7,  34 => 3,  29 => 5,);
    }
}
