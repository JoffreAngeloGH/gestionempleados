<?php

namespace App\Services\Notificaciones;

// CLASE concreta que implementa la interfaz de notificación
class SMSNotificadorService implements NotificadorInterface
{
    public function enviar(string $nombre): string
    {
        // Aquí iría la lógica real de enviar SMS
        return "📲 SMS enviado a $nombre diciendo: Tu salario ha sido procesado correctamente.";
    }
}