<?php

class Application_Form_Categoria extends Zend_Form
{

    public function init() {
        $this->setMethod('post');        
        $val = new Zend_Validate_StringLength();
        $val->setMin(3);
        
        $categoria = new Zend_Form_Element_Text('categoria', array(
            'label' => 'Nome da categoria',
            'required' => true,
            
        ));               
        
        $categoria->addValidator($val);
        $categoria->addFilter(new Zend_Filter_StringToUpper());
        $categoria->setAttrib('class', 'form-group form-control');
        $this->addElement($categoria);
        
        $submit  = new Zend_Form_Element_Submit('submit', array(
            'label' => 'Salvar'
        ));
        $submit->setAttrib('class', 'btn btn-primary');
        $this->addElement($submit);

        
    }


}

