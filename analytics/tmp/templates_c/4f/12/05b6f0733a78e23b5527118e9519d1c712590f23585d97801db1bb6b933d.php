<?php

/* @CoreVisualizations/_dataTableViz_jqplotGraph.twig */
class __TwigTemplate_4f1205b6f0733a78e23b5527118e9519d1c712590f23585d97801db1bb6b933d extends Twig_Template
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
        echo "<div class=\"jqplot-graph\">
    <div class=\"piwik-graph\" data-data=\"";
        // line 2
        echo twig_escape_filter($this->env, twig_jsonencode_filter($this->getAttribute((isset($context["visualization"]) ? $context["visualization"] : $this->getContext($context, "visualization")), "getGraphData", array(0 => (isset($context["dataTable"]) ? $context["dataTable"] : $this->getContext($context, "dataTable")), 1 => (isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties"))), "method")), "html", null, true);
        echo "\"></div>
</div>";
    }

    public function getTemplateName()
    {
        return "@CoreVisualizations/_dataTableViz_jqplotGraph.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 2,  19 => 1,);
    }
}
