<?php
require_once(__DIR__."/../functions.php");
$whack = new Whack();
if($searchPage) { ?>
    <header>
        <div class="container" style="margin-top:0px;">
            <div class="row" style="width:100%;">
                <div class="col-sm-10">
                            <a href="/"><img height="22px" src="/img/logo.png"></a>
                            <form action="/search" method="get" style="display: inline;">
                            <input type="text" name="q" value="<?php echo htmlspecialchars($_GET['q'], ENT_QUOTES, 'UTF-8'); ?>" class="form-control" style="margin-top: 10px;max-width:350px;width:100%;display:inline; margin-left:15px;" placeholder="Search"><input type="submit" value="Search" class="btn btn-success" style="margin-left: 6px;margin-top: -2px;"></form>
                </div>

                <div class="col-sm-2 text-center">
                <?php if ($whack->getProfileID()) { ?>
                    <div class="dropdown">
                        <!-- Link or button to toggle dropdown -->
                        <a id="drop1" href="#" role="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="margin-top: 10px;width:115px;">My Account&nbsp;&nbsp;<b class="caret"></b></a>

                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                            <li><?php echo $whack->availableCreditsCount(); ?> Credits</li><!-- <li><a tabindex="-1" href="/buy">Buy Additional Credits</a></li>-->
							<li class="divider"></li>

                            <li><a tabindex="-1" href="/share">Share & Earn</a></li>
                            <li><a tabindex="-1" href="/logout">Logout</a></li>
                        </ul>
                    </div><?php } ?>
                </div>
            </div>
        </div>
    </header>
<?php } else { ?>
    <header>
        <div class="container" style="margin-top:0px;">
            <div class="row" style="width:100%;">
                <div class="col-sm-10">
                            <a href="/"><img style="margin-top: 15px;" height="22px" src="/img/logo.png"></a>                </div>

                <div class="col-sm-2 text-center">
                    <?php if ($whack->getProfileID()) { ?>
                    <div class="dropdown">
                        <!-- Link or button to toggle dropdown -->
                        <a id="drop1" href="#" role="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="margin-top: 10px;width:115px;">My Account&nbsp;&nbsp;<b class="caret"></b></a>

                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                            <li><?php echo $whack->availableCreditsCount(); ?> Credits</li><!-- <li><a tabindex="-1" href="/buy">Buy Additional Credits</a></li>-->
							<li class="divider"></li>

                            <li><a tabindex="-1" href="/share">Share & Earn</a></li>
                            <li><a tabindex="-1" href="/logout">Logout</a></li>
                        </ul>
                    </div><?php } ?>
                </div>
            </div>
        </div>
    </header>
<?php } ?>