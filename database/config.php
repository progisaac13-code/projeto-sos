<?php
require_once('conexao.php');

$query = $pdo->query("SELECT * FROM sos_config;");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$text = $res[0]['text_whatsapp'] ?? 'Mensagem do WhatsApp';

DEFINE('WHATSAPP_MENSAGEM', $text);