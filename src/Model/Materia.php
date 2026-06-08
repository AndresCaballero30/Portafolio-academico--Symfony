<?php

namespace App\Model;

class Materia
{
    private string $nombre;
    private int $nota;

    public function __construct(string $nombre, int $nota)
    {
        $this->nombre = $nombre;
        $this->nota = $nota;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getNota(): int
    {
        return $this->nota;
    }

    public function setNota(int $nota): void
    {
        if ($nota < 0 || $nota > 100) {
            throw new \InvalidArgumentException("La nota debe estar entre 0 y 100.");
        }
        $this->nota = $nota;
    }

    public function getNotaFormateada(): string
    {
        return $this->nota . '/100';
    }

    public function esAprobada(int $notaMinima = 70): bool
    {
        return $this->nota >= $notaMinima;
    }
}
