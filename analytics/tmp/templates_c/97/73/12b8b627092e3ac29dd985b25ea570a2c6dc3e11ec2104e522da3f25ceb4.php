<?php

/* @Installation/_allSteps.twig */
class __TwigTemplate_977312b8b627092e3ac29dd985b25ea570a2c6dc3e11ec2104e522da3f25ceb4 extends Twig_Template
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
        echo "<ul>
    ";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["allStepsTitle"]) ? $context["allStepsTitle"] : $this->getContext($context, "allStepsTitle")));
        foreach ($context['_seq'] as $context["stepId"] => $context["stepName"]) {
            // line 3
            echo "        ";
            if (((isset($context["currentStepId"]) ? $context["currentStepId"] : $this->getContext($context, "currentStepId")) > (isset($context["stepId"]) ? $context["stepId"] : $this->getContext($context, "stepId")))) {
                // line 4
                echo "            <li class=\"pastStep\">";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array((isset($context["stepName"]) ? $context["stepName"] : $this->getContext($context, "stepName")))), "html", null, true);
                echo "</li>
        ";
            } elseif (((isset($context["currentStepId"]) ? $context["currentStepId"] : $this->getContext($context, "currentStepId")) == (isset($context["stepId"]) ? $context["stepId"] : $this->getContext($context, "stepId")))) {
                // line 6
                echo "            <li class=\"actualStep\">";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array((isset($context["stepName"]) ? $context["stepName"] : $this->getContext($context, "stepName")))), "html", null, true);
                echo "</li>
        ";
            } else {
                // line 8
                echo "            <li class=\"futureStep\">";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array((isset($context["stepName"]) ? $context["stepName"] : $this->getContext($context, "stepName")))), "html", null, true);
                echo "</li>
        ";
            }
            // line 10
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['stepId'], $context['stepName'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "</ul>
";
    }

    public function getTemplateName()
    {
        return "@Installation/_allSteps.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 11,  47 => 10,  41 => 8,  35 => 6,  29 => 4,  22 => 2,  19 => 1,  136 => 44,  126 => 58,  122 => 57,  117 => 55,  108 => 48,  102 => 46,  99 => 45,  96 => 44,  90 => 42,  87 => 41,  79 => 38,  76 => 37,  74 => 36,  69 => 33,  67 => 32,  59 => 27,  44 => 17,  40 => 15,  38 => 14,  26 => 3,  20 => 1,  85 => 37,  82 => 36,  80 => 35,  58 => 15,  52 => 23,  45 => 9,  39 => 7,  37 => 6,  31 => 4,  28 => 3,);
    }
}
