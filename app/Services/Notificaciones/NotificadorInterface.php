<?php

namespace App\Services\Notificaciones;

// INTERFAZ para cualquier tipo de notificación
interface NotificadorInterface
{
    // OBLIGA a implementar un método enviar con un string $nombre
    public function enviar(string $nombre): string;
}