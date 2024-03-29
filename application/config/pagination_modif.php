<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Pagination Config Bootstrap 4 CSS Style
 */

$config['query_string_segment'] = 'start';

$config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination pagination-circle pg-blue justify-content-end" style="margin-top:0px">';
$config['full_tag_close'] = '</ul></nav>';

$config['first_link'] = '<span class="fa fa-backward"></span>';
$config['first_tag_open'] = '<li class="page-item">';
$config['first_tag_close'] = '</li>';

$config['last_link'] = '<span class="fa fa-forward"></span>';
$config['last_tag_open'] = '<li class="page-item">';
$config['last_tag_close'] = '</li>';

$config['next_link'] = '<span class="fa fa-chevron-right"></span>';
$config['next_tag_open'] = '<li class="page-item">';
$config['next_tag_close'] = '</li>';

$config['prev_link'] = '<span class="fa fa-chevron-left"></span>';
$config['prev_tag_open'] = '<li class="page-item">';
$config['prev_tag_close'] = '</li>';

$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
$config['cur_tag_close'] = '</a></li>';

$config['num_tag_open'] = '<li class="page-item">';
$config['num_tag_close'] = '</li>';

$config['attributes'] = array('class' => 'page-link');


/* End of file pagination.php */
/* Location: ./application/config/pagination.php */