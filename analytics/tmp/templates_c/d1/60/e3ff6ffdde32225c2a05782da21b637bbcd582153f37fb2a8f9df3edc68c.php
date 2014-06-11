<?php

/* @Installation/finished.twig */
class __TwigTemplate_d160e3ff6ffdde32225c2a05782da21b637bbcd582153f37fb2a8f9df3edc68c extends Twig_Template
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
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_Congratulations"));
        echo "</h2>

";
        // line 6
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_CongratulationsHelp"));
        echo "


    <br/>
<h2>";
        // line 10
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_WelcomeToCommunity")), "html", null, true);
        echo "</h2>
<p>
";
        // line 12
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_CollaborativeProject")), "html", null, true);
        echo "
</p><p>
    ";
        // line 14
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_GetInvolved", "<a  target=\"_blank\" href=\"http://piwik.org/get-involved/\">", "</a>"));
        echo "
    ";
        // line 15
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_HelpTranslatePiwik", "<a target='_blank' href='http://piwik.org/translations/'>", "</a>"));
        echo "
</p>
    <p>";
        // line 17
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_WeHopeYouWillEnjoyPiwik")), "html", null, true);
        echo "</p>
    <p><i>";
        // line 18
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_HappyAnalysing")), "html", null, true);
        echo "</i></p>

<p class=\"nextStep\">
\t<a class=\"submit\" href=\"index.php\">";
        // line 21
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ContinueToPiwik")), "html", null, true);
        echo " &raquo;</a>
\t
</p>
";
    }

    public function getTemplateName()
    {
        return "@Installation/finished.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 21,  67 => 18,  63 => 17,  58 => 15,  54 => 14,  49 => 12,  44 => 10,  37 => 6,  31 => 4,  28 => 3,);
    }
}
