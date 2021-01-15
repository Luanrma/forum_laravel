<?php
namespace app\Http\Traits;

trait FormatText
{
    public static function keepTextOriginal($data)
    {
        $ordem = array("\r\n", "\n", "\r");
        $substituir = array("<br><br>", "<br>", "<br>");        
        $mensagem = nl2br($data);
        return str_replace($substituir, $ordem, $mensagem);
    }
}