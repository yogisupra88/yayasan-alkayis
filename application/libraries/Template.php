<?php

class Template
{
    var $template_Data = array();

    function set($name, $value)
    {
        $this->template_data[$name] = $value;
    }
    function load($template = '', $view = '', $view_data = array(), $return = False)
    {
        $this->CI = &get_instance();
        $this->set('contens', $this->CI->load->view($view, $view_data, TRUE));
        return $this->CI->load->view($template, $this->template_data, $return);
    }
}