<?php

/* @Installation/welcome.twig */
class __TwigTemplate_cce47280cbd28b0d1786ac19d1245d4a8382d0cbd003327f4879f6bb787b26ff extends Twig_Template
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
        echo "<h2>";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_Welcome")), "html", null, true);
        echo "</h2>

";
        // line 6
        if ((isset($context["newInstall"]) ? $context["newInstall"] : $this->getContext($context, "newInstall"))) {
            // line 7
            echo "    ";
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_WelcomeHelp", (isset($context["totalNumberOfSteps"]) ? $context["totalNumberOfSteps"] : $this->getContext($context, "totalNumberOfSteps"))));
            echo "
";
        } else {
            // line 9
            echo "    <p>";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_ConfigurationHelp")), "html", null, true);
            echo "</p>
    <br/>
    <div class=\"error\">
        ";
            // line 12
            echo twig_escape_filter($this->env, (isset($context["errorMessage"]) ? $context["errorMessage"] : $this->getContext($context, "errorMessage")), "html", null, true);
            echo "
    </div>
";
        }
        // line 15
        echo "
<script type=\"text/javascript\">
    <!--
    \$(function () {
        // client-side test for broken tracker (e.g., mod_security rule)
        \$('p.nextStep').hide();
        \$.ajax({
            url: 'piwik.php',
            data: 'url=http://example.com',
            complete: function () {
                \$('p.nextStep').show();
            },
            error: function (req) {
                \$('p.nextStep a').attr('href', \$('p.nextStep a').attr('href') + '&trackerStatus=' + req.status);
            }
        });
    });
    //-->
</script>

";
        // line 35
        if ((!(isset($context["showNextStep"]) ? $context["showNextStep"] : $this->getContext($context, "showNextStep")))) {
            // line 36
            echo "    <p class=\"nextStep\">
        <a href=\"";
            // line 37
            echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : $this->getContext($context, "url")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_RefreshPage")), "html", null, true);
            echo " &raquo;</a>
    </p>
";
        }
    }

    public function getTemplateName()
    {
        return "@Installation/welcome.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 37,  82 => 36,  80 => 35,  58 => 15,  52 => 12,  45 => 9,  39 => 7,  37 => 6,  31 => 4,  28 => 3,);
    }
}
