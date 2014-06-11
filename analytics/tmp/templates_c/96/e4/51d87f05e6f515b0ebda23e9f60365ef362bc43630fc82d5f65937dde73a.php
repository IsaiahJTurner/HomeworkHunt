<?php

/* @CoreHome\_uiControl.twig */
class __TwigTemplate_96e451d87f05e6f515b0ebda23e9f60365ef362bc43630fc82d5f65937dde73a extends Twig_Template
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
        echo "<div class=\"";
        echo twig_escape_filter($this->env, (isset($context["cssIdentifier"]) ? $context["cssIdentifier"] : $this->getContext($context, "cssIdentifier")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["cssClass"]) ? $context["cssClass"] : $this->getContext($context, "cssClass")), "html", null, true);
        echo "\"
     data-props=\"";
        // line 2
        echo twig_escape_filter($this->env, twig_jsonencode_filter((isset($context["clientSideProperties"]) ? $context["clientSideProperties"] : $this->getContext($context, "clientSideProperties"))), "html", null, true);
        echo "\"
     data-params=\"";
        // line 3
        echo twig_escape_filter($this->env, twig_jsonencode_filter((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : $this->getContext($context, "clientSideParameters"))), "html", null, true);
        echo "\">
     ";
        // line 4
        $template = $this->env->resolveTemplate($context["implView"]->getTemplateFile());
        $template->display(array_merge($context, $context["implView"]->getTemplateVars((isset($context["implOverride"]) ? $context["implOverride"] : $this->getContext($context, "implOverride")))));
        // line 5
        echo "</div>
<script>\$(document).ready(function () { require('";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["jsNamespace"]) ? $context["jsNamespace"] : $this->getContext($context, "jsNamespace")), "html", null, true);
        echo "').";
        echo twig_escape_filter($this->env, (isset($context["jsClass"]) ? $context["jsClass"] : $this->getContext($context, "jsClass")), "html", null, true);
        echo ".initElements(); });</script>";
    }

    public function getTemplateName()
    {
        return "@CoreHome\\_uiControl.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 6,  37 => 5,  34 => 4,  30 => 3,  26 => 2,  19 => 1,);
    }
}
