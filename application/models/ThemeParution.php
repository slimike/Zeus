
<?php

class Application_Model_ThemeParution {

    protected $id_themeParution;
    protected $name_themeParution;
    
    
    
    
    public function getId_themeParution() {
        return $this->id_themeParution;
    }

    public function getName_themeParution() {
        return $this->name_themeParution;
    }

    

    public function setId_themeParution($id_themeParution) {
        $this->id_themeParution = $id_themeParution;
        return $this;
    }

    public function setName_themeParution($name_themeParution) {
        $this->name_themeParution = $name_themeParution;
        return $this;
    }

   



}
