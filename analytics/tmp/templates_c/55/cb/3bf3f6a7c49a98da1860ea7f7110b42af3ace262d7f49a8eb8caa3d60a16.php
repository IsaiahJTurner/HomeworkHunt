<?php

/* @CoreHome/_headerMessage.twig */
class __TwigTemplate_55cb3bf3f6a7c49a98da1860ea7f7110b42af3ace262d7f49a8eb8caa3d60a16 extends Twig_Template
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
        // line 2
        $context["test_latest_version_available"] = "3.0";
        // line 3
        $context["test_piwikUrl"] = "http://demo.piwik.org/";
        // line 4
        ob_start();
        echo twig_escape_filter($this->env, (((isset($context["piwikUrl"]) ? $context["piwikUrl"] : $this->getContext($context, "piwikUrl")) == "http://demo.piwik.org/") || ((isset($context["piwikUrl"]) ? $context["piwikUrl"] : $this->getContext($context, "piwikUrl")) == "https://demo.piwik.org/")), "html", null, true);
        $context["isPiwikDemo"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 5
        echo "
";
        // line 6
        ob_start();
        // line 7
        echo "<div id=\"updateCheckLinkContainer\">
    <span class='loadingPiwik' style=\"display:none;\"><img src='plugins/Zeitgeist/images/loading-blue.gif'/></span>
    <img class=\"icon\" src=\"plugins/Zeitgeist/images/reload.png\"/>
    <a href=\"#\" id=\"checkForUpdates\"><em>";
        // line 10
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreHome_CheckForUpdates")), "html", null, true);
        echo "</em></a>
</div>
";
        $context["updateCheck"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 13
        echo "
";
        // line 14
        if ((((isset($context["isPiwikDemo"]) ? $context["isPiwikDemo"] : $this->getContext($context, "isPiwikDemo")) || (((isset($context["latest_version_available"]) ? $context["latest_version_available"] : $this->getContext($context, "latest_version_available")) && (isset($context["hasSomeViewAccess"]) ? $context["hasSomeViewAccess"] : $this->getContext($context, "hasSomeViewAccess"))) && (!(isset($context["isUserIsAnonymous"]) ? $context["isUserIsAnonymous"] : $this->getContext($context, "isUserIsAnonymous"))))) || (((isset($context["isSuperUser"]) ? $context["isSuperUser"] : $this->getContext($context, "isSuperUser")) && array_key_exists("adminMenu", $context)) && (isset($context["adminMenu"]) ? $context["adminMenu"] : $this->getContext($context, "adminMenu"))))) {
            // line 15
            echo "<span id=\"header_message\" class=\"";
            if (((isset($context["isPiwikDemo"]) ? $context["isPiwikDemo"] : $this->getContext($context, "isPiwikDemo")) || (!(isset($context["latest_version_available"]) ? $context["latest_version_available"] : $this->getContext($context, "latest_version_available"))))) {
                echo "header_info";
            } else {
                echo "header_alert";
            }
            echo "\">
    <span class=\"header_short\">
        ";
            // line 17
            if ((isset($context["isPiwikDemo"]) ? $context["isPiwikDemo"] : $this->getContext($context, "isPiwikDemo"))) {
                // line 18
                echo "            ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_YouAreViewingDemoShortMessage")), "html", null, true);
                echo "
        ";
            } elseif ((isset($context["latest_version_available"]) ? $context["latest_version_available"] : $this->getContext($context, "latest_version_available"))) {
                // line 20
                echo "            ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_NewUpdatePiwikX", (isset($context["latest_version_available"]) ? $context["latest_version_available"] : $this->getContext($context, "latest_version_available")))), "html", null, true);
                echo "
        ";
            } elseif ((((isset($context["isSuperUser"]) ? $context["isSuperUser"] : $this->getContext($context, "isSuperUser")) && array_key_exists("adminMenu", $context)) && (isset($context["adminMenu"]) ? $context["adminMenu"] : $this->getContext($context, "adminMenu")))) {
                // line 22
                echo "            ";
                echo (isset($context["updateCheck"]) ? $context["updateCheck"] : $this->getContext($context, "updateCheck"));
                echo "
        ";
            }
            // line 24
            echo "    </span>

    <span class=\"header_full\">
        ";
            // line 27
            if ((isset($context["isPiwikDemo"]) ? $context["isPiwikDemo"] : $this->getContext($context, "isPiwikDemo"))) {
                // line 28
                echo "            ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_YouAreViewingDemoShortMessage")), "html", null, true);
                echo "
            <br />
            ";
                // line 30
                echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_DownloadFullVersion", "<a href='http://piwik.org/'>", "</a>", "<a href='http://piwik.org'>piwik.org</a>"));
                echo "
            <br/>
        ";
            }
            // line 33
            echo "        ";
            if (((isset($context["latest_version_available"]) ? $context["latest_version_available"] : $this->getContext($context, "latest_version_available")) && (isset($context["isSuperUser"]) ? $context["isSuperUser"] : $this->getContext($context, "isSuperUser")))) {
                // line 34
                echo "            ";
                echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_PiwikXIsAvailablePleaseUpdateNow", (isset($context["latest_version_available"]) ? $context["latest_version_available"] : $this->getContext($context, "latest_version_available")), "<br /><a href='index.php?module=CoreUpdater&amp;action=newVersionAvailable'>", "</a>", "<a href='?module=Proxy&amp;action=redirect&amp;url=http://piwik.org/changelog/' target='_blank'>", "</a>"));
                echo "
            <br/>
            ";
                // line 36
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_YouAreCurrentlyUsing", (isset($context["piwik_version"]) ? $context["piwik_version"] : $this->getContext($context, "piwik_version")))), "html", null, true);
                echo "
        ";
            } elseif (((((isset($context["latest_version_available"]) ? $context["latest_version_available"] : $this->getContext($context, "latest_version_available")) && (!(isset($context["isPiwikDemo"]) ? $context["isPiwikDemo"] : $this->getContext($context, "isPiwikDemo")))) && (isset($context["hasSomeViewAccess"]) ? $context["hasSomeViewAccess"] : $this->getContext($context, "hasSomeViewAccess"))) && (!(isset($context["isUserIsAnonymous"]) ? $context["isUserIsAnonymous"] : $this->getContext($context, "isUserIsAnonymous"))))) {
                // line 38
                echo "            ";
                $context["updateSubject"] = twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_NewUpdatePiwikX", (isset($context["latest_version_available"]) ? $context["latest_version_available"] : $this->getContext($context, "latest_version_available")))), "url");
                // line 39
                echo "            ";
                echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_PiwikXIsAvailablePleaseNotifyPiwikAdmin", (("<a href='?module=Proxy&action=redirect&url=http://piwik.org/' target='_blank'>Piwik</a> <a href='?module=Proxy&action=redirect&url=http://piwik.org/changelog/' target='_blank'>" . (isset($context["latest_version_available"]) ? $context["latest_version_available"] : $this->getContext($context, "latest_version_available"))) . "</a>"), (((("<a href='mailto:" . (isset($context["superUserEmails"]) ? $context["superUserEmails"] : $this->getContext($context, "superUserEmails"))) . "?subject=") . (isset($context["updateSubject"]) ? $context["updateSubject"] : $this->getContext($context, "updateSubject"))) . "'>"), "</a>"));
                echo "
        ";
            } elseif ((((isset($context["isSuperUser"]) ? $context["isSuperUser"] : $this->getContext($context, "isSuperUser")) && array_key_exists("adminMenu", $context)) && (isset($context["adminMenu"]) ? $context["adminMenu"] : $this->getContext($context, "adminMenu")))) {
                // line 41
                echo "            ";
                echo (isset($context["updateCheck"]) ? $context["updateCheck"] : $this->getContext($context, "updateCheck"));
                echo "
            <br />
            ";
                // line 43
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_YouAreCurrentlyUsing", (isset($context["piwik_version"]) ? $context["piwik_version"] : $this->getContext($context, "piwik_version")))), "html", null, true);
                echo "
        ";
            }
            // line 45
            echo "    </span>
</span>
";
        }
    }

    public function getTemplateName()
    {
        return "@CoreHome/_headerMessage.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 43,  114 => 39,  106 => 36,  43 => 13,  97 => 33,  95 => 32,  91 => 30,  88 => 30,  101 => 17,  78 => 24,  64 => 18,  57 => 14,  46 => 14,  28 => 5,  79 => 11,  67 => 18,  58 => 17,  90 => 24,  82 => 12,  74 => 20,  69 => 8,  39 => 8,  26 => 4,  63 => 6,  49 => 12,  33 => 6,  52 => 5,  48 => 15,  21 => 3,  24 => 3,  144 => 38,  138 => 36,  136 => 35,  131 => 45,  128 => 32,  121 => 31,  116 => 29,  112 => 28,  108 => 27,  104 => 36,  100 => 34,  96 => 13,  92 => 16,  87 => 22,  85 => 28,  80 => 20,  77 => 27,  71 => 14,  68 => 13,  62 => 17,  59 => 16,  44 => 9,  35 => 6,  31 => 6,  27 => 5,  23 => 4,  19 => 2,  140 => 46,  137 => 45,  133 => 37,  130 => 36,  127 => 35,  120 => 41,  118 => 21,  113 => 18,  111 => 38,  109 => 16,  107 => 15,  102 => 13,  89 => 9,  83 => 27,  75 => 10,  72 => 22,  70 => 19,  66 => 20,  60 => 18,  55 => 15,  53 => 10,  50 => 9,  41 => 8,  38 => 2,  36 => 7,  32 => 7,  30 => 6,  22 => 2,  56 => 12,  54 => 13,  51 => 10,  47 => 10,  45 => 32,  42 => 11,  40 => 12,  37 => 10,  34 => 8,  29 => 4,);
    }
}
