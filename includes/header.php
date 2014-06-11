<?php
require_once(__DIR__."/../functions.php");
$whack = new Whack();
?>
    <header>
        <div class="container" style="padding-top:0">
            <div class="row" style="width:100%;">
                <div class="col-sm-3">
                            <a href="/"><img src="/img/logo-light.png"></a>
                </div>
                <div class="col-lg-4 col-sm-6">
               <?php if(isset($searchPage) && $searchPage = true) { ?>
                            <form action="/search" method="get" style="display: inline;">
                            <input type="search" name="q" value="<?php echo htmlspecialchars($_GET['q'], ENT_QUOTES, 'UTF-8'); ?>" class="search-header" placeholder="Search"><input type="submit" value="GO" class="submit"></form>
                            <?php } ?>
                </div>

                <div class="col-sm-2 col-sm-push-1 col-lg-push-4 text-center">
                <?php if ($whack->getProfileID()) { ?>
                    <div class="dropdown">
                        <!-- Link or button to toggle dropdown -->
                        <a id="drop1" href="#" role="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="margin-top: 5px;width:115px;">My Account&nbsp;&nbsp;<b class="caret"></b></a>

                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                            <li><?php echo $whack->availableCreditsCount(); ?> Credits</li><!-- <li><a tabindex="-1" href="/buy">Buy Additional Credits</a></li>-->
							<li class="divider"></li>

                            <li><a tabindex="-1" href="/share">Share & Earn</a></li>
                            <li><a tabindex="-1" href="/api/logout">Logout</a></li>
                        </ul>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </header>