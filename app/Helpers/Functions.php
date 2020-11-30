<?php

use Carbon\Carbon;
use DateTime;

function ukDate($datetime = null, $timestamp = false)
{
    $datetime = $datetime ? $datetime : Carbon::now();
    $format = $timestamp ? 'd/m/Y H:i' : 'd/m/Y';
    $timestamp = $timestamp ? 'Y-m-d H:i:s' : 'Y-m-d';
    return Carbon::createFromFormat($format, $datetime)->format($timestamp);
}


function brDate($datetime = null, $timestamp = false)
{
    $datetime = $datetime ? $datetime : Carbon::now();
    $timestamp = $timestamp ? 'd/m/Y H:i' : 'd/m/Y';
    return Carbon::parse($datetime)->format($timestamp);
}

function moeda($get_valor)
{
    $source = array('.', ',');
    $replace = array('', '.');
    $valor = str_replace($source, $replace, $get_valor);
    return $valor;
}

function money($get_valor)
{
    $valor = number_format($get_valor, 2, ',', '.');
    return $valor;
}

function clean($string)
{
    return preg_replace('/[^A-Za-z0-9]/', '', $string);
}

function encryptCpf($cpf)
{
    $cpf = str_replace('.', '', $cpf);
    $cpf = str_replace('-', '', $cpf);
    return bcrypt($cpf);
}
function days()
{
    $days = array(
        1 => 
        'Segunda-Feira',
        'Terça-Feira',
        'Quarta-Feira',
        'Quinta-Feira',
        'Sexta-Feira',
        'Sábado',
        'Domingo'
    );
    return $days;
}
