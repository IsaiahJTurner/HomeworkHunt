
<?php echo exec('whoami'); ?><?php
exec("cd /thehwhack/ && git pull 2>&1", $output);
print_r($output);