<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(dirname(__FILE__) . '/dompdf/dompdf_config.inc.php');

class Pdfdom extends DOMPDF
{
    function __construct()
    {
        parent::__construct();
    }

    protected function ci()
	{
		return get_instance();
	}

	public function load_view($view, $data = array())
	{
		$html = $this->ci()->load->view($view, $data, TRUE);
		$this->load_html($html);
	}
}
