<?php
define("DOCROOT",__DIR__."/");

define("LIBS_PATH",DOCROOT."libs/");
define("DATA_PATH",DOCROOT."data/");

define("TEMPLATES_PATH",DOCROOT."templates/");

define("MODELS_PATH",DOCROOT."models/");
define("VIEWS_PATH",DOCROOT."views/");
define("CONTROLLERS_PATH",DOCROOT."controllers/");

include LIBS_PATH . "db.php";
include LIBS_PATH . "core.php";
include LIBS_PATH . "auth.php";

core_navigate();

/**
 *Вопрос, как узнать успешна ли вставка(если например в уникальное поле 2 записи одтнаковых)
 */
