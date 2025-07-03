<?php

namespace App\Services\Notificaciones;

class WhatsAppNotificador implements NotificadorInterface
{
    public function enviar(string $nombre): string
    {
        return "💬 WhatsApp enviado a $nombre: Tu salario fue procesado con éxito.";
    }
}
