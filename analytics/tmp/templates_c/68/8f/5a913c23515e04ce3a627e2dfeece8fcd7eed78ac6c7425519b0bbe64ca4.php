<?php

/* macros.twig */
class __TwigTemplate_688f5a913c23515e04ce3a627e2dfeece8fcd7eed78ac6c7425519b0bbe64ca4 extends Twig_Template
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
        // line 18
        echo "
";
    }

    // line 1
    public function getlogoHtml($_metadata = null, $_alt = "")
    {
        $context = $this->env->mergeGlobals(array(
            "metadata" => $_metadata,
            "alt" => $_alt,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "    ";
            if ($this->getAttribute((isset($context["metadata"]) ? $context["metadata"] : null), "logo", array(), "array", true, true)) {
                // line 3
                echo "        ";
                if ($this->getAttribute((isset($context["metadata"]) ? $context["metadata"] : null), "logoWidth", array(), "array", true, true)) {
                    // line 4
                    echo "            ";
                    ob_start();
                    echo "width=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["metadata"]) ? $context["metadata"] : $this->getContext($context, "metadata")), "logoWidth", array(), "array"), "html", null, true);
                    echo "\"";
                    $context["width"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 5
                    echo "        ";
                }
                // line 6
                echo "        ";
                if ($this->getAttribute((isset($context["metadata"]) ? $context["metadata"] : null), "logoHeight", array(), "array", true, true)) {
                    // line 7
                    echo "            ";
                    ob_start();
                    echo "height=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["metadata"]) ? $context["metadata"] : $this->getContext($context, "metadata")), "logoHeight", array(), "array"), "html", null, true);
                    echo "\"";
                    $context["height"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 8
                    echo "        ";
                }
                // line 9
                echo "        ";
                if ($this->getAttribute((isset($context["metadata"]) ? $context["metadata"] : null), "logoWidth", array(), "array", true, true)) {
                    // line 10
                    echo "            ";
                    ob_start();
                    echo "width=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["metadata"]) ? $context["metadata"] : $this->getContext($context, "metadata")), "logoWidth", array(), "array"), "html", null, true);
                    echo "\"";
                    $context["width"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 11
                    echo "        ";
                }
                // line 12
                echo "        ";
                if ((!twig_test_empty((isset($context["alt"]) ? $context["alt"] : $this->getContext($context, "alt"))))) {
                    // line 13
                    echo "            ";
                    ob_start();
                    echo "title='";
                    echo twig_escape_filter($this->env, (isset($context["alt"]) ? $context["alt"] : $this->getContext($context, "alt")), "html", null, true);
                    echo "' alt='";
                    echo twig_escape_filter($this->env, (isset($context["alt"]) ? $context["alt"] : $this->getContext($context, "alt")), "html", null, true);
                    echo "'";
                    $context["alt"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 14
                    echo "        ";
                }
                // line 15
                echo "        <img ";
                echo twig_escape_filter($this->env, (isset($context["alt"]) ? $context["alt"] : $this->getContext($context, "alt")), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, ((array_key_exists("width", $context)) ? (_twig_default_filter((isset($context["width"]) ? $context["width"] : $this->getContext($context, "width")), "")) : ("")), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, ((array_key_exists("height", $context)) ? (_twig_default_filter((isset($context["height"]) ? $context["height"] : $this->getContext($context, "height")), "")) : ("")), "html", null, true);
                echo " src='";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["metadata"]) ? $context["metadata"] : $this->getContext($context, "metadata")), "logo", array(), "array"), "html", null, true);
                echo "' />
    ";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 19
    public function getinlineHelp($_text = null)
    {
        $context = $this->env->mergeGlobals(array(
            "text" => $_text,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 20
            echo "    <div class=\"ui-inline-help\" >
        ";
            // line 21
            echo (isset($context["text"]) ? $context["text"] : $this->getContext($context, "text"));
            echo "
    </div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "macros.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  128 => 21,  125 => 20,  114 => 19,  93 => 15,  81 => 13,  75 => 11,  65 => 9,  62 => 8,  52 => 6,  49 => 5,  24 => 1,  172 => 47,  169 => 46,  166 => 45,  163 => 44,  160 => 43,  157 => 42,  154 => 41,  152 => 40,  147 => 38,  144 => 37,  141 => 36,  138 => 35,  135 => 34,  132 => 33,  129 => 32,  126 => 31,  123 => 30,  120 => 29,  117 => 28,  115 => 27,  113 => 26,  111 => 25,  108 => 24,  104 => 23,  100 => 21,  98 => 20,  94 => 19,  85 => 18,  68 => 10,  60 => 14,  54 => 13,  51 => 12,  48 => 11,  46 => 10,  41 => 7,  39 => 3,  29 => 4,  90 => 14,  66 => 10,  61 => 8,  57 => 6,  40 => 4,  167 => 47,  165 => 46,  149 => 39,  146 => 42,  143 => 41,  140 => 39,  136 => 37,  121 => 35,  119 => 34,  116 => 33,  99 => 32,  87 => 31,  80 => 30,  78 => 12,  76 => 24,  74 => 21,  72 => 16,  55 => 7,  47 => 16,  44 => 15,  42 => 4,  38 => 11,  36 => 2,  33 => 9,  31 => 5,  25 => 6,  23 => 3,  21 => 2,  19 => 18,);
    }
}
