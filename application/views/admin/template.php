<?php

$this->load->view('theme/sb_header');
?>
<!-- Page Wrapper -->
<div id="wrapper">
    <?php
    $this->load->view('theme/sidebar');
    $this->load->view('theme/content_wrapper');
    ?>
</div>
<?php
$this->load->view('theme/sb_footer');
