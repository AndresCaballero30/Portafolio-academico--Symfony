<?php

namespace App\Model;

class Habilidad
{
    private string $nombre;
    private int $nivel;

    public function __construct(string $nombre, int $nivel)
    {
        $this->nombre = $nombre;
        $this->nivel = $nivel;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getNivel(): int
    {
        return $this->nivel;
    }

    public function setNivel(int $nivel): void
    {
        if ($nivel < 0 || $nivel > 100) {
            throw new \InvalidArgumentException("El nivel debe estar entre 0 y 100.");
        }
        $this->nivel = $nivel;
    }

    public function getNivelFormateado(): string
    {
        return $this->nivel . '%';
    }

    public function esDestacada(): bool
    {
        return $this->nivel > 80;
    }
}
