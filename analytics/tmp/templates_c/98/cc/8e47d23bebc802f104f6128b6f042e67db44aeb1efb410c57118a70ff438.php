<?php

/* @Installation/systemCheck.twig */
class __TwigTemplate_98cc8e47d23bebc802f104f6128b6f042e67db44aeb1efb410c57118a70ff438 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("@Installation/layout.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Installation/layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
<script type=\"text/javascript\">
    \$(function () {
        // client-side test for https to handle the case where the server is behind a reverse proxy
        if (document.location.protocol === 'https:') {
            \$('p.nextStep a').attr('href', \$('p.nextStep a').attr('href') + '&clientProtocol=https');
        }
    });
</script>

";
        // line 14
        if ((!(isset($context["showNextStep"]) ? $context["showNextStep"] : $this->getContext($context, "showNextStep")))) {
            // line 15
            echo "    ";
            $this->env->loadTemplate("@Installation/_systemCheckLegend.twig")->display($context);
            // line 16
            echo "    <br style=\"clear:both;\">
";
        }
        // line 18
        echo "
<h3>";
        // line 19
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SystemCheck")), "html", null, true);
        echo "</h3>
<br/>
";
        // line 21
        $this->env->loadTemplate("@Installation/_systemCheckSection.twig")->display($context);
        // line 22
        echo "
";
        // line 23
        if ((!(isset($context["showNextStep"]) ? $context["showNextStep"] : $this->getContext($context, "showNextStep")))) {
            // line 24
            echo "    <br/>
    <p>
        <img src='plugins/Zeitgeist/images/link.gif'/> &nbsp;
        <a href=\"?module=Proxy&action=redirect&url=http://piwik.org/docs/requirements/\" target=\"_blank\">";
            // line 27
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_Requirements")), "html", null, true);
            echo "</a>
    </p>
    ";
            // line 29
            $this->env->loadTemplate("@Installation/_systemCheckLegend.twig")->display($context);
        }
    }

    public function getTemplateName()
    {
        return "@Installation/systemCheck.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 29,  72 => 27,  67 => 24,  65 => 23,  62 => 22,  60 => 21,  55 => 19,  52 => 18,  48 => 16,  45 => 15,  43 => 14,  31 => 4,  28 => 3,);
    }
}
