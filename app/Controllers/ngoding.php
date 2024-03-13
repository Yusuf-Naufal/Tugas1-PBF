<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ngoding extends BaseController {

    public function index() {
        $malasngoding = service('malasngoding'); // Load the malasngoding library
        $malasngoding->nama_saya("");
        echo "<br/>";
        $malasngoding->nama_kamu("Andi");
    }

}
