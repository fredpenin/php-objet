<?php

class Text{
    /** ///////////////////////
     * PROPRIETES
     *////////////////////////
    /**
     * Contenu texte
     * @var string
     */
     private $content;


    /** /////////////////////
      * CONSTRUCTEUR
      *///////////////////////
    // public function __construct(string $content)
    // {
    //     $this->set($content);
    // }

    /** /////////////////////
    * METHODES
    *///////////////////////

        /** /////////////////////
        * SETTERS / GETTERS
        *///////////////////////
    /**
    * Set contenu texte
    *
    * @param string $content Contenu texte
    *
    * @return self
    */
    public function set(string $content)
    {
    $this->content = $content;
    return $this;
    }
    /**
    * Get contenu texte
    *
    * @return string
    */
    public function get()
    {
    return $this->content;
    }
    /////////////////////////////////////////
    /////////////////////////////////////////
    /**
     * Affiche le contenu (string) de $content à l'écran
     */
    public function print(){

        return $this->content . "<br />";
    }

    /**
     * passe le texte en gras
     */
    public function bold(){
        $this->content = "<span style=\"font-weight: bold;\">". $this->content ."</span>";
        return $this;

    }

    // /**
    //  * passe le txt en italic
    //  */
    public function italic(){
        $this->content = "<span style=\"font-style: italic;\">". $this->content ."</span>";
        return $this;
    }

    // /**
    //  * passe le txt en barré
    //  */
    public function strike(){
        $this->content = "<span style=\"text-decoration: line-through;\">". $this->content ."</span>";
        return $this;
    }


    // /**
    //  * affiche le chainage des differentes fonctions
    //  */
    // public function chain(){
    //     $this->print();
    // }
}