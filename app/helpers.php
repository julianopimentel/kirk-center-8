<?php

function formattedMoney($value)
{
    $formattedMoney = number_format($value, 2, ',', '.');

    return $formattedMoney;
}

function translatedMonth($month)
{
    switch ($month) {
        case '01':
            $translatedMonth = 'Janeiro';
            break;
        case '02':
            $translatedMonth = 'Fevereiro';
            break;
        case '03':
            $translatedMonth = 'Março';
            break;
        case '04':
            $translatedMonth = 'Abril';
            break;
        case '05':
            $translatedMonth = 'Maio';
            break;
        case '06':
            $translatedMonth = 'Junho';
            break;
        case '07':
            $translatedMonth = 'Julho';
            break;
        case '08':
            $translatedMonth = 'Agosto';
            break;
        case '09':
            $translatedMonth = 'Setembro';
            break;
        case '10':
            $translatedMonth = 'Outubro';
            break;
        case '11':
            $translatedMonth = 'Novembro';
            break;
        case '12':
            $translatedMonth = 'Dezembro';
            break;
    }

    return $translatedMonth;
}

function contato()
{
    return 'contato@kirk.digital';
}

function telefone()
{
    return '+92 99222 8400';
}

function localidade()
{
    return 'São José, Brazil';
}

function datanormal($value){
    $dateTime1 = new DateTime($value);
    $datanormal = $dateTime1->format('d F, Y ', );
    return $datanormal;
}

function datalimpa($value){
    $dateTime1 = new DateTime($value);
    $datanormal = $dateTime1->format('d/m/Y', );
    return $datanormal;
}

function hora($value){
    $dateTime1 = new DateTime($value);
    $hora = $dateTime1->format('H:i');
    return $hora;
}

function datarecente($value){
    $dateTime1 = new DateTime($value);
    $dateTime2 = new DateTime();
    $interval = $dateTime1->diff($dateTime2);
    if ($interval->format('%y') > 0) {
        if ($dateTime2 >= $interval->format('%y')) {
            $valorhora = $interval->format('%y anos') . PHP_EOL;
        }
    }
    if ($interval->format('%m') > 0) {
        if ($dateTime2 >= $interval->format('%m')) {
            $valorhora = $interval->format('%m meses') . PHP_EOL;
        }
    } else {
        if ($interval->format('%d') > 0) {
            if ($dateTime2 >= $interval->format('%d')) {
                $valorhora = $interval->format('%d dias') . PHP_EOL;
            }
        } else {
            if ($dateTime2 >= $interval->format('%h')) {
                if ($interval->format('%h') > 0) {
                    $valorhora = $interval->format('%h horas') . ' ' . $interval->format('%i minutos') . PHP_EOL;
                } else {
                    $valorhora = $interval->format('%i minutos') . ' ' . $interval->format('%s segundos') . PHP_EOL;
                }
            }
        }
    }
    return $valorhora;
}