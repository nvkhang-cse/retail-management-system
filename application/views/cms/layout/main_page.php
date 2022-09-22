<?php
    $this->load->view('cms/layout/header',$this->data);
    $this->load->view($subview);
?>
<?php
    $this->load->view('cms/layout/footer',$this->data);
?>
