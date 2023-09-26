<?php

namespace Hcode;

use Rain\Tpl;

class Page {

    private $tpl;
    private $options = [];
    private $defaults = [
        "header"=>true,
        "footer"=>true,
        "data"=>[]
    ];

    public function __construct($opts = array(), $tpl_dir = "/views/")
    {

        $this->options = array_merge($this->defaults, $opts);

        $config = array(
        "tpl_dir"       => $_SERVER["DOCUMENT_ROOT"].$tpl_dir,
        "cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
        "debug"         => false // set to false to improve the speed
        );

        Tpl::configure( $config );

        $this->tpl = new Tpl;

        $this->setData($this->options["data"]);
        // verifica se for true ele carrega o header
        if ($this->options["header"] === true) $this->tpl->draw("header");

    }
    // set os dados para as paginas de conteudo do projeto
    private function setData($data = array())
    {
        foreach ($data as $key => $value) {
            $this->tpl->assign($key, $value);
         }
    }

    public function setTpl($name, $data = array(), $returnHTML = false)
    {
        $this->setData($data);
        // desenha o template
        return $this->tpl->draw($name, $returnHTML);
    }

    public function __destruct()
    {  // verifica se for true ele carrega o footer
        if ($this->options["footer"] === true) $this->tpl->draw("footer");
    }

}

?>