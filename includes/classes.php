<?php
class MyList {
    public $empty = 'Selecione...';
    public function __construct($options,$name,$attr='required'){
        $this->options = $options;
        $this->name = $name;
        $this->attr = $attr;
    }
    public function __toString(){
        $return = '<select class="form-select" name="'.$this->name.'" '.$this->attr.'>
            <option value="">'.$this->empty.'</option>';
        foreach ($this->options as $key => $value) {
            $return .= '<option value="'.($key+1).'">'.($key+1).' - '.$value.'</option>';
        }
        $return .= '</select>';
        return $return;
    }
    static public function satisfacao($name,$attr='required'){
        return new MyList(array('Muito insatisfatória','Insatisfatória','Regular','Satisfatória','Excelente'),$name,$attr);
    }
    static public function frequencia($name,$attr='required'){
        return new MyList(array('Nunca','Raramente','Às vezes','Frequentemente','Sempre'),$name,$attr);
    }
    static public function utilidade($name,$attr='required'){
        return new MyList(array('Nada útil','Pouco útil','Razoavelmente útil','Útil','Muito útil'),$name,$attr);
    }
    static public function qualidade($name,$attr='required'){
        return new MyList(array('Muito ruim','Ruim','Neutro','Bom','Excelente'),$name,$attr);
    }
}