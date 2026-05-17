<?php
if(!defined('_PS_VERSION_')){
    exit;
}

class Hello extends Module
{
    public function __construct()
    {
        $this->name = 'hello';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Patryk Kubik';
        $this->need_instance = 0;

        parent::__construct();

        $this->displayName = $this->l(
            'Hello'
        );
        $this->description = $this->l(
            'Simple module displaying welcome message.'
        );
        $this->ps_versions_compliancy = [
            'min' => '1.7.0.0',
            'max' => _PS_VERSION_,
        ];
    }

    public function hookHeader()
    {
        $this->context->controller->registerStylesheet(
            'hello-style',
            'modules/'.$this->name.'/views/css/style.css'
        );
    }

    public function install()
    {
        return parent::install()
            && $this->registerHook('displayHome')
            && $this->registerHook('header');
    }

    public function uninstall()
    {
        return parent::uninstall();
    }

    public function hookDisplayHome($params)
    {
        $customer = $this->context->customer;

        if($customer->isLogged())
        {
            $firstname = $customer->firstname;
        }else
        {
            $firstname = $this->l('Customer');
        }
        
        $isLogged = $customer->isLogged();

        $this->context->smarty->assign([
            'is_logged' => $isLogged,
            'customer_name' => $firstname,
        ]);

        return $this->display(__FILE__, 'views/templates/hook/hello.tpl');
    }
}