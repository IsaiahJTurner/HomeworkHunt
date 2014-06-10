<?php

/* @Annotations/getEvolutionIcons.twig */
class __TwigTemplate_8fb6ca655404006fd824fa41db478e6f0dc287927dc75d91748c9f78ede308ae extends Twig_Template
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
        echo "<div class=\"evolution-annotations\">
    ";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["annotationCounts"]) ? $context["annotationCounts"] : $this->getContext($context, "annotationCounts")));
        foreach ($context['_seq'] as $context["_key"] => $context["dateCountPair"]) {
            // line 3
            echo "        ";
            $context["date"] = $this->getAttribute((isset($context["dateCountPair"]) ? $context["dateCountPair"] : $this->getContext($context, "dateCountPair")), 0, array(), "array");
            // line 4
            echo "        ";
            $context["counts"] = $this->getAttribute((isset($context["dateCountPair"]) ? $context["dateCountPair"] : $this->getContext($context, "dateCountPair")), 1, array(), "array");
            // line 5
            echo "        <span data-date=\"";
            echo twig_escape_filter($this->env, (isset($context["date"]) ? $context["date"] : $this->getContext($context, "date")), "html", null, true);
            echo "\" data-count=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["counts"]) ? $context["counts"] : $this->getContext($context, "counts")), "count"), "html", null, true);
            echo "\" data-starred=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["counts"]) ? $context["counts"] : $this->getContext($context, "counts")), "starred"), "html", null, true);
            echo "\"
              ";
            // line 6
            if (($this->getAttribute((isset($context["counts"]) ? $context["counts"] : $this->getContext($context, "counts")), "count") == 0)) {
                echo "title=\"";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Annotations_AddAnnotationsFor", (isset($context["date"]) ? $context["date"] : $this->getContext($context, "date")))), "html", null, true);
                echo "\"
              ";
            } elseif (($this->getAttribute((isset($context["counts"]) ? $context["counts"] : $this->getContext($context, "counts")), "count") == 1)) {
                // line 7
                echo "title=\"";
                echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Annotations_AnnotationOnDate", (isset($context["date"]) ? $context["date"] : $this->getContext($context, "date")), $this->getAttribute((isset($context["counts"]) ? $context["counts"] : $this->getContext($context, "counts")), "note")));
                // line 8
                echo "
";
                // line 9
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Annotations_ClickToEditOrAdd")), "html", null, true);
                echo "\"
              ";
            } else {
                // line 10
                echo "}title=\"";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Annotations_ViewAndAddAnnotations", (isset($context["date"]) ? $context["date"] : $this->getContext($context, "date")))), "html", null, true);
                echo "\"";
            }
            echo ">
            <img src=\"plugins/Zeitgeist/images/";
            // line 11
            if (($this->getAttribute((isset($context["counts"]) ? $context["counts"] : $this->getContext($context, "counts")), "starred") > 0)) {
                echo "annotations_starred.png";
            } else {
                echo "annotations.png";
            }
            echo "\" width=\"16\" height=\"16\"/>
        </span>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['dateCountPair'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "@Annotations/getEvolutionIcons.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 14,  66 => 11,  59 => 10,  54 => 9,  51 => 8,  48 => 7,  41 => 6,  32 => 5,  29 => 4,  26 => 3,  22 => 2,  19 => 1,);
    }
}
