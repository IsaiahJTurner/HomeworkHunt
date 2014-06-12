<?php
require_once(__DIR__."/../functions.php");
$whack = new Whack();
?>
<header>
        <div class="container" style="padding-top:0">
            <div class="row" style="width:100%;">
                <div class="col-md-2 col-sm-3">
                    <a href="/"><img src="/img/logo-light.png"></a>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <?php  ?>

                    <form action="<?php if(isset($searchPage) && $searchPage = true) echo  "#"; else echo "/search"; ?>" method="get" style="display: inline;">
                        <input type="search" name="q" value="<?php if(isset($searchPage) && $searchPage = true) { echo htmlspecialchars($_GET['q'], ENT_QUOTES, 'UTF-8'); } ?>" class="search-header" placeholder="Search" id="search"><input type="submit" value="GO" class="submit">
                    </form>
                </div>

                <div class="col-sm-3 col-lg-push-3 text-center">
                    <div class="navigation">
                        <ul>
                            <?php if ($whack->getProfileID()) { ?><!-- Link or button to toggle dropdown -->

                            <li><a href="/account"><?php echo $whack->availableCreditsCount(); ?> Credits</a></li><!-- <li><a tabindex="-1" href="/buy">Buy Additional Credits</a></li>-->

                            <li><a href="/share">Share</a></li>
                            
                            
                            <?php } else { ?>
                            	<li><a href="/login">Login</a></li>
                            <li><a href="/register">Register</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
