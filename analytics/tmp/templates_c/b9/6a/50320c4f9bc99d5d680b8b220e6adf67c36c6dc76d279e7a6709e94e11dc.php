<?php

/* @CoreHome/_dataTableHead.twig */
class __TwigTemplate_b96a50320c4f9bc99d5d680b8b220e6adf67c36c6dc76d279e7a6709e94e11dc extends Twig_Template
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
        echo "<thead>
   <tr>
       ";
        // line 3
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "columns_to_display"));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["column"]) {
            // line 4
            echo "           <th class=\"";
            if ($this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "enable_sort")) {
                echo "sortable";
            }
            echo " ";
            if ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "first")) {
                echo "first";
            } elseif ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "last")) {
                echo "last";
            }
            echo "\" id=\"";
            echo twig_escape_filter($this->env, (isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "html", null, true);
            echo "\">
               ";
            // line 5
            if ((!twig_test_empty((($this->getAttribute($this->getAttribute((isset($context["properties"]) ? $context["properties"] : null), "metrics_documentation", array(), "any", false, true), (isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), array(), "array", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["properties"]) ? $context["properties"] : null), "metrics_documentation", array(), "any", false, true), (isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), array(), "array"))) : (""))))) {
                // line 6
                echo "                   <div class=\"columnDocumentation\">
                       <div class=\"columnDocumentationTitle\">
                           ";
                // line 8
                echo (($this->getAttribute($this->getAttribute((isset($context["properties"]) ? $context["properties"] : null), "translations", array(), "any", false, true), (isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), array(), "array", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["properties"]) ? $context["properties"] : null), "translations", array(), "any", false, true), (isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), array(), "array"), (isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")))) : ((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column"))));
                echo "
                       </div>
                       ";
                // line 10
                echo $this->getAttribute($this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "metrics_documentation"), (isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), array(), "array");
                echo "
                   </div>
               ";
            }
            // line 13
            echo "               <div id=\"thDIV\">";
            echo (($this->getAttribute($this->getAttribute((isset($context["properties"]) ? $context["properties"] : null), "translations", array(), "any", false, true), (isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), array(), "array", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["properties"]) ? $context["properties"] : null), "translations", array(), "any", false, true), (isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), array(), "array"), (isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")))) : ((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column"))));
            echo "</div>
           </th>
       ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['column'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "   </tr>
</thead>
";
    }

    public function getTemplateName()
    {
        return "@CoreHome/_dataTableHead.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  90 => 16,  66 => 10,  61 => 8,  57 => 6,  40 => 4,  167 => 47,  165 => 46,  149 => 43,  146 => 42,  143 => 41,  140 => 39,  136 => 37,  121 => 35,  119 => 34,  116 => 33,  99 => 32,  87 => 31,  80 => 30,  78 => 29,  76 => 24,  74 => 21,  72 => 13,  55 => 5,  47 => 16,  44 => 15,  42 => 14,  38 => 11,  36 => 10,  33 => 9,  31 => 8,  25 => 6,  23 => 3,  21 => 3,  19 => 1,);
    }
}
