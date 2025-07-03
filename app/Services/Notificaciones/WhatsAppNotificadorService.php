<?php

namespace App\Services\Notificaciones;

class WhatsAppNotificadorService implements NotificadorInterface
{
    public function enviar(string $nombre): string
    {
        return "💬 WhatsApp enviado a $nombre: Tu salario fue procesado con éxito.";
    }
}
