<?php

require_once('../_helpers/strip.php');

// 1. On bloque le chargement d'entités externes (Comportement sécurisé)
// Note: true est la valeur sécurisée. (Cette fonction est obsolète sur PHP 8+ car sécurisé par défaut)
libxml_disable_entity_loader(true); 

$xml = strlen($_GET['xml']) > 0 ? $_GET['xml'] : '<root><content>No XML found</content></root>';

$document = new DOMDocument();

// 2. On supprime les drapeaux dangereux LIBXML_NOENT et LIBXML_DTDLOAD
// On charge simplement le XML.
$document->loadXML($xml, LIBXML_NONET); 

$parsedDocument = simplexml_import_dom($document);

echo $parsedDocument->content;
