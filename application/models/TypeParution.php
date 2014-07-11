
<?php

class Application_Model_TypeParution {

    protected $id_typeParution;
    protected $name_typeParution;
    protected $id_themeParution;
    protected $object_themeParution;
    public function getId_TypeParution() {
        return $this->id_typeParution;
    }

    public function getName_TyeParution() {
        return $this->name_typeParution;
    }

    public function setId_TypeParution($id_typeParution) {
        $this->id_typeParution = $id_typeParution;
        return $this;
    }

    public function setName_TypeParution($name_TyeParution) {
        $this->name_typeParution = $name_TyeParution;
        return $this;
    }
    public function getId_themeParution() {
        return $this->id_themeParution;
    }

    public function setId_themeParution($id_themeParution) {
        $this->id_themeParution = $id_themeParution;
        return $this;
    }
    
    public function getObject_themeParution() {
        return $this->object_themeParution;
    }

    public function setObject_themeParution(Application_Model_ThemeParution $object_themeParution) {
        $this->object_themeParution = $object_themeParution;
        return $this;
    }
    
    


}
