<?php

if(!defined('_PS_VERSION_'))
exit;

class gradi_adsense extends Module{
    public function __construct(){
        $this->name                   = 'gradi_adsense';
        $this->tab                    = 'front_office_features';
        $this->version                = '1.0.0';
        $this->author                 = 'Juan Nicolás Malagón';
        $this->need_instance          = 0;
        $this->ps_versions_compliancy = array('min' => '1.7.x.x', 'max' => _PS_VERSION_);
        $this->bootstrap              = true;

        parent::__construct();

        $this->displayName = $this->l('Gradi Adsense');
        $this->description = $this->l('Módulo para prueba de prestashop 1.7 - Gradiweb');
        $this->confirmUninstall = $this->l('¿Estás seguro de que quieres desinstalar el módulo?');

        $this->templateFile = 'module:gradi_adsense/views/templates/hook/gradi_adsense.tpl';
    }

    public function install(){
        if (!parent::install() || 
            !Configuration::updateValue('IMAGE_GRADI_AD', '') ||
            !Configuration::updateValue('TITLE_GRADI_AD', '') ||
            !Configuration::updateValue('DESCRIPTION_GRADI_AD', '') || 
            !Configuration::updateValue('CTA_TEXT_GRADI_AD', '') ||
            !Configuration::updateValue('CTA_URL_GRADI_AD', '') ||
            !$this->registerHook('displayHome'))
            return false;
        return true;
    }

    public function uninstall(){
        $this->_clearCache('*');

        if(!parent::uninstall())
            return false;
        return true;
    }

    public function getContent(){
        $this->smarty->assign('save', false);

        if(Tools::isSubmit('submit-ad')){
            $image_ad       = Tools::getValue('bg-image');
            $title_ad       = Tools::getValue('ad-title');
            $description_ad = Tools::getValue('ad-description');
            $cta_text       = Tools::getValue('cta-text');
            $cta_url        = Tools::getValue('cta-url');

            Configuration::updateValue('IMAGE_GRADI_AD', $image_ad);
            Configuration::updateValue('TITLE_GRADI_AD', $title_ad);
            Configuration::updateValue('DESCRIPTION_GRADI_AD', $description_ad);
            Configuration::updateValue('CTA_TEXT_GRADI_AD', $cta_text);
            Configuration::updateValue('CTA_URL_GRADI_AD', $cta_url);

            $this->smarty->assign('save', true);
        };

        $image_value = Configuration::get('IMAGE_GRADI_AD');
        $title_value = Configuration::get('TITLE_GRADI_AD');
        $description_value = Configuration::get('DESCRIPTION_GRADI_AD');
        $cta_text_value = Configuration::get('CTA_TEXT_GRADI_AD');
        $cta_url_value = Configuration::get('CTA_URL_GRADI_AD');

        $this->smarty->assign('image_value', $image_value);
        $this->smarty->assign('title_value', $title_value);
        $this->smarty->assign('description_value', $description_value);
        $this->smarty->assign('cta_text_value', $cta_text_value);
        $this->smarty->assign('cta_url_value', $cta_url_value);

        return $this->display(__FILE__, 'configure.tpl');
    }

    public function hookDisplayHome($params){
        $image_value = Configuration::get('IMAGE_GRADI_AD');
        $title_value = Configuration::get('TITLE_GRADI_AD');
        $description_value = Configuration::get('DESCRIPTION_GRADI_AD');
        $cta_text_value = Configuration::get('CTA_TEXT_GRADI_AD');
        $cta_url_value = Configuration::get('CTA_URL_GRADI_AD');

        $this->context->smarty->assign('image_value', $image_value);
        $this->context->smarty->assign('title_value', $title_value);
        $this->context->smarty->assign('description_value', $description_value);
        $this->context->smarty->assign('cta_text_value', $cta_text_value);
        $this->context->smarty->assign('cta_url_value', $cta_url_value);

        return $this->display(__FILE__, 'displayHome.tpl');
    }
}