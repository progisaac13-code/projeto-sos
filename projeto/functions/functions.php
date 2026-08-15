<?php
function validar_cpf($cpf) {
    // Remove pontos, traços e outros caracteres
    $cpf = preg_replace('/[^0-9]/', '', $cpf);

    // CPF precisa ter exatamente 11 dígitos
    if (strlen($cpf) != 11) {
        return false;
    }

    // Rejeita CPFs com todos os dígitos iguais
    if (preg_match('/^(\d)\1{10}$/', $cpf)) {
        return false;
    }

    // Calcula o primeiro dígito verificador
    $soma = 0;

    for ($i = 0; $i < 9; $i++) {
        $soma += intval($cpf[$i]) * (10 - $i);
    }

    $resto = $soma % 11;

    if ($resto < 2) {
        $digito1 = 0;
    } else {
        $digito1 = 11 - $resto;
    }

    // Verifica o primeiro dígito
    if ($digito1 != intval($cpf[9])) {
        return false;
    }

    // Calcula o segundo dígito verificador
    $soma = 0;

    for ($i = 0; $i < 10; $i++) {
        $soma += intval($cpf[$i]) * (11 - $i);
    }

    $resto = $soma % 11;

    if ($resto < 2) {
        $digito2 = 0;
    } else {
        $digito2 = 11 - $resto;
    }

    // Verifica o segundo dígito
    if ($digito2 != intval($cpf[10])) {
        return false;
    }

    return true;
}
function formatarData($data) {
    if (empty($data)) {
        return '';
    }

    $data = DateTime::createFromFormat('Y-m-d', $data);

    return $data ? $data->format('d/m/Y') : '';
}