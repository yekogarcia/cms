<?php
require_once "models/gestorSlide.php";
require_once "models/gestorArticulos.php";

require_once "controllers/template.php";
require_once "controllers/gestorSlide.php";
require_once "controllers/gestorArticulos.php";
$template = new TemplateController();
$template->template(); 
