<?php

/* @CoreHome/_dataTableCell.twig */
class __TwigTemplate_b35c8d58dacecd615303332dfbf50c3ed3ae58c0bbea028ad8506c95b381b242 extends Twig_Template
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
        ob_start();
        // line 2
        $context["tooltipIndex"] = ((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")) . "_tooltip");
        // line 3
        if ($this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getMetadata", array(0 => (isset($context["tooltipIndex"]) ? $context["tooltipIndex"] : $this->getContext($context, "tooltipIndex"))), "method")) {
            echo "<span class=\"cell-tooltip\" data-tooltip=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getMetadata", array(0 => (isset($context["tooltipIndex"]) ? $context["tooltipIndex"] : $this->getContext($context, "tooltipIndex"))), "method"), "html", null, true);
            echo "\">";
        }
        // line 4
        if ((((!$this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getIdSubDataTable", array(), "method")) && ((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")) == "label")) && $this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getMetadata", array(0 => "url"), "method"))) {
            // line 5
            echo "    <a target=\"_blank\" href='";
            if (!twig_in_filter(twig_slice($this->env, $this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getMetadata", array(0 => "url"), "method"), 0, 4), array(0 => "http", 1 => "ftp:"))) {
                echo "http://";
            }
            echo $this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getMetadata", array(0 => "url"), "method");
            echo "'>
    ";
            // line 6
            if ((!$this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getMetadata", array(0 => "logo"), "method"))) {
                // line 7
                echo "        <img class=\"link\" width=\"10\" height=\"9\" src=\"plugins/Zeitgeist/images/link.gif\"/>
    ";
            }
        }
        // line 10
        if (((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")) == "label")) {
            // line 11
            echo "    ";
            $context["piwik"] = $this->env->loadTemplate("macros.twig");
            // line 12
            echo "
    <span class='label";
            // line 13
            if ($this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getMetadata", array(0 => "is_aggregate"), "method")) {
                echo " highlighted";
            }
            echo "'
    ";
            // line 14
            if ((array_key_exists("properties", $context) && (!twig_test_empty($this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "tooltip_metadata_name"))))) {
                echo "title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getMetadata", array(0 => $this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "tooltip_metadata_name")), "method"), "html", null, true);
                echo "\"";
            }
            echo ">
        ";
            // line 15
            echo $context["piwik"]->getlogoHtml($this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getMetadata", array(), "method"), $this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getColumn", array(0 => "label"), "method"));
            echo "
        ";
            // line 16
            if ($this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getMetadata", array(0 => "html_label_prefix"), "method")) {
                echo "<span class='label-prefix'>";
                echo $this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getMetadata", array(0 => "html_label_prefix"), "method");
                echo "&nbsp;</span>";
            }
            // line 17
            if ($this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getMetadata", array(0 => "html_label_suffix"), "method")) {
                echo "<span class='label-suffix'>";
                echo $this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getMetadata", array(0 => "html_label_suffix"), "method");
                echo "</span>";
            }
        }
        // line 18
        echo "<span class=\"value\">";
        if ($this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getColumn", array(0 => (isset($context["column"]) ? $context["column"] : $this->getContext($context, "column"))), "method")) {
            echo $this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getColumn", array(0 => (isset($context["column"]) ? $context["column"] : $this->getContext($context, "column"))), "method");
        } else {
            echo "-";
        }
        echo "</span>
";
        // line 19
        if (((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")) == "label")) {
            echo "</span>";
        }
        // line 20
        if ((((!$this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getIdSubDataTable", array(), "method")) && ((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")) == "label")) && $this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getMetadata", array(0 => "url"), "method"))) {
            // line 21
            echo "    </a>
";
        }
        // line 23
        if ($this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getMetadata", array(0 => (isset($context["tooltipIndex"]) ? $context["tooltipIndex"] : $this->getContext($context, "tooltipIndex"))), "method")) {
            echo "</span>";
        }
        // line 24
        echo "
";
        // line 25
        $context["totals"] = $this->getAttribute((isset($context["dataTable"]) ? $context["dataTable"] : $this->getContext($context, "dataTable")), "getMetadata", array(0 => "totals"), "method");
        // line 26
        if (twig_in_filter((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), twig_get_array_keys_filter((isset($context["totals"]) ? $context["totals"] : $this->getContext($context, "totals"))))) {
            // line 27
            $context["labelColumn"] = twig_first($this->env, (isset($context["columns_to_display"]) ? $context["columns_to_display"] : $this->getContext($context, "columns_to_display")));
            // line 28
            echo "    ";
            $context["reportTotal"] = $this->getAttribute((isset($context["totals"]) ? $context["totals"] : $this->getContext($context, "totals")), (isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), array(), "array");
            // line 29
            echo "    ";
            if (((array_key_exists("siteSummary", $context) && (!twig_test_empty((isset($context["siteSummary"]) ? $context["siteSummary"] : $this->getContext($context, "siteSummary"))))) && $this->getAttribute((isset($context["siteSummary"]) ? $context["siteSummary"] : $this->getContext($context, "siteSummary")), "getFirstRow"))) {
                // line 30
                echo "        ";
                $context["siteTotal"] = $this->getAttribute($this->getAttribute((isset($context["siteSummary"]) ? $context["siteSummary"] : $this->getContext($context, "siteSummary")), "getFirstRow"), "getColumn", array(0 => (isset($context["column"]) ? $context["column"] : $this->getContext($context, "column"))), "method");
                // line 31
                echo "    ";
            } else {
                // line 32
                echo "        ";
                $context["siteTotal"] = 0;
                // line 33
                echo "    ";
            }
            // line 34
            echo "    ";
            $context["rowPercentage"] = call_user_func_array($this->env->getFilter('percentage')->getCallable(), array($this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getColumn", array(0 => (isset($context["column"]) ? $context["column"] : $this->getContext($context, "column"))), "method"), (isset($context["reportTotal"]) ? $context["reportTotal"] : $this->getContext($context, "reportTotal")), 1));
            // line 35
            echo "    ";
            $context["metricTitle"] = (($this->getAttribute((isset($context["translations"]) ? $context["translations"] : null), (isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), array(), "array", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["translations"]) ? $context["translations"] : null), (isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), array(), "array"), (isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")))) : ((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column"))));
            // line 36
            echo "    ";
            $context["reportLabel"] = call_user_func_array($this->env->getFilter('truncate')->getCallable(), array($this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getColumn", array(0 => (isset($context["labelColumn"]) ? $context["labelColumn"] : $this->getContext($context, "labelColumn"))), "method"), 40));
            // line 37
            echo "
    ";
            // line 38
            $context["reportRatioTooltip"] = call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ReportRatioTooltip", (isset($context["reportLabel"]) ? $context["reportLabel"] : $this->getContext($context, "reportLabel")), twig_escape_filter($this->env, (isset($context["rowPercentage"]) ? $context["rowPercentage"] : $this->getContext($context, "rowPercentage")), "html_attr"), twig_escape_filter($this->env, (isset($context["reportTotal"]) ? $context["reportTotal"] : $this->getContext($context, "reportTotal")), "html_attr"), twig_escape_filter($this->env, (isset($context["metricTitle"]) ? $context["metricTitle"] : $this->getContext($context, "metricTitle")), "html_attr"), twig_escape_filter($this->env, (($this->getAttribute((isset($context["translations"]) ? $context["translations"] : null), (isset($context["labelColumn"]) ? $context["labelColumn"] : $this->getContext($context, "labelColumn")), array(), "array", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["translations"]) ? $context["translations"] : null), (isset($context["labelColumn"]) ? $context["labelColumn"] : $this->getContext($context, "labelColumn")), array(), "array"), (isset($context["labelColumn"]) ? $context["labelColumn"] : $this->getContext($context, "labelColumn")))) : ((isset($context["labelColumn"]) ? $context["labelColumn"] : $this->getContext($context, "labelColumn")))), "html_attr")));
            // line 39
            echo "
    ";
            // line 40
            if (((isset($context["siteTotal"]) ? $context["siteTotal"] : $this->getContext($context, "siteTotal")) && ((isset($context["siteTotal"]) ? $context["siteTotal"] : $this->getContext($context, "siteTotal")) > (isset($context["reportTotal"]) ? $context["reportTotal"] : $this->getContext($context, "reportTotal"))))) {
                // line 41
                echo "        ";
                $context["totalPercentage"] = call_user_func_array($this->env->getFilter('percentage')->getCallable(), array($this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getColumn", array(0 => (isset($context["column"]) ? $context["column"] : $this->getContext($context, "column"))), "method"), (isset($context["siteTotal"]) ? $context["siteTotal"] : $this->getContext($context, "siteTotal")), 1));
                // line 42
                echo "        ";
                $context["totalRatioTooltip"] = call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_TotalRatioTooltip", (isset($context["totalPercentage"]) ? $context["totalPercentage"] : $this->getContext($context, "totalPercentage")), (isset($context["siteTotal"]) ? $context["siteTotal"] : $this->getContext($context, "siteTotal")), (isset($context["metricTitle"]) ? $context["metricTitle"] : $this->getContext($context, "metricTitle"))));
                // line 43
                echo "    ";
            } else {
                // line 44
                echo "        ";
                $context["totalRatioTooltip"] = "";
                // line 45
                echo "    ";
            }
            // line 46
            echo "
    <span class=\"ratio\" title=\"";
            // line 47
            echo (isset($context["reportRatioTooltip"]) ? $context["reportRatioTooltip"] : $this->getContext($context, "reportRatioTooltip"));
            echo " ";
            echo twig_escape_filter($this->env, (isset($context["totalRatioTooltip"]) ? $context["totalRatioTooltip"] : $this->getContext($context, "totalRatioTooltip")), "html_attr");
            echo "\">&nbsp;";
            echo twig_escape_filter($this->env, (isset($context["rowPercentage"]) ? $context["rowPercentage"] : $this->getContext($context, "rowPercentage")), "html", null, true);
            echo "</span>";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "@CoreHome/_dataTableCell.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  172 => 47,  169 => 46,  166 => 45,  163 => 44,  160 => 43,  157 => 42,  154 => 41,  152 => 40,  147 => 38,  144 => 37,  141 => 36,  138 => 35,  135 => 34,  132 => 33,  129 => 32,  126 => 31,  123 => 30,  120 => 29,  117 => 28,  115 => 27,  113 => 26,  111 => 25,  108 => 24,  104 => 23,  100 => 21,  98 => 20,  94 => 19,  85 => 18,  68 => 15,  60 => 14,  54 => 13,  51 => 12,  48 => 11,  46 => 10,  41 => 7,  39 => 6,  29 => 4,  90 => 16,  66 => 10,  61 => 8,  57 => 6,  40 => 4,  167 => 47,  165 => 46,  149 => 39,  146 => 42,  143 => 41,  140 => 39,  136 => 37,  121 => 35,  119 => 34,  116 => 33,  99 => 32,  87 => 31,  80 => 30,  78 => 17,  76 => 24,  74 => 21,  72 => 16,  55 => 5,  47 => 16,  44 => 15,  42 => 14,  38 => 11,  36 => 10,  33 => 9,  31 => 5,  25 => 6,  23 => 3,  21 => 2,  19 => 1,);
    }
}
