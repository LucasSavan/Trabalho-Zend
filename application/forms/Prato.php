<?php

class Application_Form_Prato extends Zend_Form
{
    public function init() {

        
        $this->setMethod('post');
        $descricao = new Zend_Form_Element_Text('descricao' , array(
            'label' => 'Prato',
            'required' => true
        ));
        $descricao->setAttrib('class', 'form-group form-control');        
        $this->addElement($descricao);
        
        $categoria = new Zend_Form_Element_Select('id_categoria', array(
            'label' => "Categoria",
            'required' =>true
        ));
        $categoria->setAttrib('class', 'form-group form-control');        
        $this->addElement($categoria);
        
//        $tab = new Application_Model_DbTable_Categoria();
//        $categorias = $tab->fetchAll()->toArray();
//        
//        $options = array();
//        
//        foreach ($categorias as $item) {
//            $idcategoria = $item['idcategoria'];
//            $nomecategoria = $item['categoria'];
//            
//            $options[$idcategoria] = $nomecategoria;
//        }
        
        $categoria->setMultiOptions($this->pegarCategorias());
        
        $filtro = new Zend_Filter_Null();
        $categoria->addFilter($filtro);
        
//        $preco = new Zend_Form_Element_Text('preco', array(
//            'label' =>'Preço'
//        ));
//        //$preco->addValidator(new Zend_Validate_Regex(array('pattern' => '/^[0-9]/')));
//        $preco->setAttrib('class', 'form-group form-control');
//        
//        $this->addElement($preco);

        
        
        $botao = new Zend_Form_Element_Submit('botao', array(
            'label'=>'Salvar'
        ));
        $botao->setAttrib('class', 'btn btn-primary');
        $this->addElement($botao);
        
       
    }
    
        private function pegarCategorias(){
        $tab = new Application_Model_DbTable_Categoria();
        $categorias = $tab->fetchAll()->toArray();
        
        $options = array();
        $options[0] = "Selecione";
        foreach ($categorias as $item) {
            $idcategoria = $item['id_categoria'];
            $nomecategoria = $item['categoria'];
            
            $options[$idcategoria] = $nomecategoria;
        }
        return $options;
    }


}

