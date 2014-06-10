<?php

/* @CoreHome/_topBarHelloMenu.twig */
class __TwigTemplate_6b5b9b2cf7e9549fffe8991151479247b443fe221516dacc02d886d5712add8e extends Twig_Template
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
        echo "<div id=\"topRightBar\">
    ";
        // line 2
        ob_start();
        // line 3
        echo "        ";
        if ((!twig_test_empty((isset($context["userAlias"]) ? $context["userAlias"] : $this->getContext($context, "userAlias"))))) {
            // line 4
            echo "            <strong>";
            echo twig_escape_filter($this->env, (isset($context["userAlias"]) ? $context["userAlias"] : $this->getContext($context, "userAlias")), "html", null, true);
            echo "</strong>
        ";
        } else {
            // line 6
            echo "            <strong>";
            echo twig_escape_filter($this->env, (isset($context["userLogin"]) ? $context["userLogin"] : $this->getContext($context, "userLogin")), "html", null, true);
            echo "</strong>
        ";
        }
        // line 8
        echo "    ";
        $context["helloAlias"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 9
        echo "    <span class=\"topBarElem\">";
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_HelloUser", trim((isset($context["helloAlias"]) ? $context["helloAlias"] : $this->getContext($context, "helloAlias")))));
        echo "</span>
    ";
        // line 10
        if (((isset($context["userLogin"]) ? $context["userLogin"] : $this->getContext($context, "userLogin")) != "anonymous")) {
            // line 11
            echo "        |
        ";
            // line 12
            if (array_key_exists("isAdminLayout", $context)) {
                // line 13
                echo "            <span class=\"topBarElem topBarElemActive\">";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Settings")), "html", null, true);
                echo "</span>
        ";
            } else {
                // line 15
                echo "            <span class=\"topBarElem\"><a href='index.php?module=CoreAdminHome'>";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Settings")), "html", null, true);
                echo "</a></span>
        ";
            }
            // line 17
            echo "    ";
        }
        // line 18
        echo "    | <span class=\"topBarElem\">
        ";
        // line 19
        if (((isset($context["userLogin"]) ? $context["userLogin"] : $this->getContext($context, "userLogin")) == "anonymous")) {
            // line 20
            echo "            <a href='index.php?module=";
            echo twig_escape_filter($this->env, (isset($context["loginModule"]) ? $context["loginModule"] : $this->getContext($context, "loginModule")), "html", null, true);
            echo "'>";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Login_LogIn")), "html", null, true);
            echo "</a>
        ";
        } else {
            // line 22
            echo "            <a href='index.php?module=";
            echo twig_escape_filter($this->env, (isset($context["loginModule"]) ? $context["loginModule"] : $this->getContext($context, "loginModule")), "html", null, true);
            echo "&amp;action=logout'>";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Logout")), "html", null, true);
            echo "</a>
        ";
        }
        // line 24
        echo "    </span>
</div>
";
    }

    public function getTemplateName()
    {
        return "@CoreHome/_topBarHelloMenu.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  90 => 24,  82 => 22,  74 => 20,  69 => 18,  39 => 8,  26 => 4,  63 => 9,  49 => 11,  33 => 6,  52 => 12,  48 => 15,  21 => 3,  24 => 3,  144 => 38,  138 => 36,  136 => 35,  131 => 33,  128 => 32,  121 => 31,  116 => 29,  112 => 28,  108 => 27,  104 => 26,  100 => 25,  96 => 24,  92 => 23,  87 => 22,  85 => 21,  80 => 20,  77 => 15,  71 => 14,  68 => 13,  62 => 12,  59 => 8,  44 => 8,  35 => 6,  31 => 3,  27 => 4,  23 => 3,  19 => 1,  140 => 46,  137 => 45,  133 => 37,  130 => 36,  127 => 35,  120 => 22,  118 => 21,  113 => 18,  111 => 17,  109 => 16,  107 => 15,  102 => 13,  89 => 9,  83 => 7,  75 => 48,  72 => 19,  70 => 45,  66 => 17,  60 => 15,  55 => 38,  53 => 10,  50 => 9,  41 => 11,  38 => 29,  36 => 28,  32 => 26,  30 => 7,  22 => 2,  56 => 12,  54 => 13,  51 => 10,  47 => 10,  45 => 32,  42 => 9,  40 => 5,  37 => 10,  34 => 3,  29 => 5,);
    }
}
