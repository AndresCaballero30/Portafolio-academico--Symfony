<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PaginaController extends AbstractController
{
    #[Route('/', name: 'app_inicio')]
    public function inicio(): Response
    {
        return $this->render('pagina/inicio.html.twig', [
            'nombre'  => 'Andres Benjamin Caballero Basagoitia',
            'carrera' => 'Ingeniería de Sistemas',
        ]);
    }

    #[Route('/sobre-mi', name: 'app_sobre_mi')]
    public function sobreMi(): Response
    {
        $habilidades = [
            'PHP'      => 75,
            'HTML/CSS' => 90,
            'Laravel'  => 55,
            'Symfony'  => 40,
            'GIT'      => 70,
        ];

        return $this->render('pagina/sobre_mi.html.twig', [
            'habilidades' => $habilidades,
        ]);
    }

    #[Route('/materias', name: 'app_materias')]
    public function materias(): Response
    {
        $materias = [
            ['nombre' => 'Programación Avanzada', 'nota' => 82],
            ['nombre' => 'Base de Datos II',       'nota' => 71],
            ['nombre' => 'Redes de Computadoras',  'nota' => 68],
            ['nombre' => 'Inglés Técnico',         'nota' => 45],
        ];

        return $this->render('pagina/materias.html.twig', [
            'materias' => $materias,
        ]);
    }

    #[Route('/contacto', name: 'app_contacto')]
    public function contacto(): Response
    {
        return $this->render('pagina/contacto.html.twig');
    }
}
