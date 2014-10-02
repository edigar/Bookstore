<h1>Nova Categoria</h1>
<br>
<?php

$form = $this->form;

$form->SetAttribute('action', $this->url('livraria-admin', array('controller'=>'categoria','action'=>'new')));

$form->prepare();
echo $this->form()->OpenTag($form);
echo $this->formHidden($form->get('id'));
echo $this->formRow($form->get('nome'));
echo $this->formSubmit($form->get('submit'));
echo $this->form()->closeTag();