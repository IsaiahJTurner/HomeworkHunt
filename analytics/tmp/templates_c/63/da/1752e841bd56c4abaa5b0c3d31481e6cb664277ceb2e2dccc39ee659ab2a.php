<?php

/* @CoreVisualizations/_dataTableViz_htmlTable.twig */
class __TwigTemplate_63da1752e841bd56c4abaa5b0c3d31481e6cb664277ceb2e2dccc39ee659ab2a extends Twig_Template
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
        $context["subtablesAreDisabled"] = ((($this->getAttribute((isset($context["properties"]) ? $context["properties"] : null), "show_goals_columns", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["properties"]) ? $context["properties"] : null), "show_goals_columns"), false)) : (false)) && (($this->getAttribute((isset($context["properties"]) ? $context["properties"] : null), "disable_subtable_when_show_goals", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["properties"]) ? $context["properties"] : null), "disable_subtable_when_show_goals"), false)) : (false)));
        // line 3
        $context["showingEmbeddedSubtable"] = ((!twig_test_empty($this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "show_embedded_subtable"))) && ((array_key_exists("idSubtable", $context)) ? (_twig_default_filter((isset($context["idSubtable"]) ? $context["idSubtable"] : $this->getContext($context, "idSubtable")), false)) : (false)));
        // line 5
        if (array_key_exists("error", $context)) {
            // line 6
            echo "    ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "message"), "html", null, true);
            echo "
";
        } else {
            // line 8
            if ((!(isset($context["showingEmbeddedSubtable"]) ? $context["showingEmbeddedSubtable"] : $this->getContext($context, "showingEmbeddedSubtable")))) {
                // line 9
                echo "<table cellspacing=\"0\" class=\"dataTable\">
        ";
                // line 10
                $this->env->loadTemplate("@CoreHome/_dataTableHead.twig")->display($context);
                // line 11
                echo "
        <tbody>";
            }
            // line 14
            if (((isset($context["showingEmbeddedSubtable"]) ? $context["showingEmbeddedSubtable"] : $this->getContext($context, "showingEmbeddedSubtable")) && ($this->getAttribute((isset($context["dataTable"]) ? $context["dataTable"] : $this->getContext($context, "dataTable")), "getRowsCount", array(), "method") == 0))) {
                // line 15
                echo "            <tr>
                <td colspan=\"";
                // line 16
                echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "columns_to_display")), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreHome_CategoryNoData")), "html", null, true);
                echo "</td>
            </tr>
        ";
            } else {
                // line 19
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["dataTable"]) ? $context["dataTable"] : $this->getContext($context, "dataTable")), "getRows", array(), "method"));
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
                foreach ($context['_seq'] as $context["rowId"] => $context["row"]) {
                    // line 20
                    $context["rowHasSubtable"] = (((!(isset($context["subtablesAreDisabled"]) ? $context["subtablesAreDisabled"] : $this->getContext($context, "subtablesAreDisabled"))) && $this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getIdSubDataTable", array(), "method")) && (!(null === $this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "subtable_controller_action"))));
                    // line 21
                    $context["shouldHighlightRow"] = (((isset($context["rowId"]) ? $context["rowId"] : $this->getContext($context, "rowId")) == twig_constant("Piwik\\DataTable::ID_SUMMARY_ROW")) && $this->getAttribute((isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties")), "highlight_summary_row"));
                    // line 24
                    $context["showRow"] = ((((isset($context["subtablesAreDisabled"]) ? $context["subtablesAreDisabled"] : $this->getContext($context, "subtablesAreDisabled")) || (!(isset($context["rowHasSubtable"]) ? $context["rowHasSubtable"] : $this->getContext($context, "rowHasSubtable")))) || (!(($this->getAttribute((isset($context["properties"]) ? $context["properties"] : null), "show_expanded", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["properties"]) ? $context["properties"] : null), "show_expanded"), false)) : (false)))) || (!(($this->getAttribute((isset($context["properties"]) ? $context["properties"] : null), "replace_row_with_subtable", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["properties"]) ? $context["properties"] : null), "replace_row_with_subtable"), false)) : (false))));
                    // line 29
                    if ((isset($context["showRow"]) ? $context["showRow"] : $this->getContext($context, "showRow"))) {
                        // line 30
                        echo "                <tr ";
                        if ((isset($context["rowHasSubtable"]) ? $context["rowHasSubtable"] : $this->getContext($context, "rowHasSubtable"))) {
                            echo "id=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getIdSubDataTable", array(), "method"), "html", null, true);
                            echo "\"";
                        }
                        // line 31
                        echo "                    class=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getMetadata", array(0 => "css_class"), "method"), "html", null, true);
                        echo " ";
                        if ((isset($context["rowHasSubtable"]) ? $context["rowHasSubtable"] : $this->getContext($context, "rowHasSubtable"))) {
                            echo "subDataTable";
                        }
                        if ((isset($context["shouldHighlightRow"]) ? $context["shouldHighlightRow"] : $this->getContext($context, "shouldHighlightRow"))) {
                            echo " highlight";
                        }
                        echo "\">
                    ";
                        // line 32
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
                            // line 33
                            echo "                        <td>
                            ";
                            // line 34
                            $this->env->loadTemplate("@CoreHome/_dataTableCell.twig")->display(array_merge($context, (isset($context["properties"]) ? $context["properties"] : $this->getContext($context, "properties"))));
                            // line 35
                            echo "                        </td>
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
                        // line 37
                        echo "                </tr>
                ";
                    }
                    // line 39
                    echo "
                ";
                    // line 41
                    echo "                ";
                    if (((($this->getAttribute((isset($context["properties"]) ? $context["properties"] : null), "show_expanded", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["properties"]) ? $context["properties"] : null), "show_expanded"), false)) : (false)) && (isset($context["rowHasSubtable"]) ? $context["rowHasSubtable"] : $this->getContext($context, "rowHasSubtable")))) {
                        // line 42
                        echo "                    ";
                        $this->env->loadTemplate("@CoreVisualizations/_dataTableViz_htmlTable.twig")->display(array_merge($context, array("dataTable" => $this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getSubtable", array(), "method"), "idSubtable" => $this->getAttribute((isset($context["row"]) ? $context["row"] : $this->getContext($context, "row")), "getIdSubDataTable", array(), "method"))));
                        // line 43
                        echo "                ";
                    }
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
                unset($context['_seq'], $context['_iterated'], $context['rowId'], $context['row'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
            }
            // line 46
            if ((!(isset($context["showingEmbeddedSubtable"]) ? $context["showingEmbeddedSubtable"] : $this->getContext($context, "showingEmbeddedSubtable")))) {
                // line 47
                echo "</tbody>
    </table>";
            }
        }
    }

    public function getTemplateName()
    {
        return "@CoreVisualizations/_dataTableViz_htmlTable.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  167 => 47,  165 => 46,  149 => 43,  146 => 42,  143 => 41,  140 => 39,  136 => 37,  121 => 35,  119 => 34,  116 => 33,  99 => 32,  87 => 31,  80 => 30,  78 => 29,  76 => 24,  74 => 21,  72 => 20,  55 => 19,  47 => 16,  44 => 15,  42 => 14,  38 => 11,  36 => 10,  33 => 9,  31 => 8,  25 => 6,  23 => 5,  21 => 3,  19 => 1,);
    }
}
