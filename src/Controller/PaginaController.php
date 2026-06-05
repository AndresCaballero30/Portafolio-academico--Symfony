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
            ['nombre' => 'Desarrollo Web Fullstack', 'nota' => 95],
            ['nombre' => 'Arquitectura de Software', 'nota' => 88],
            ['nombre' => 'Sistemas Operativos',     'nota' => 74],
            ['nombre' => 'Inteligencia Artificial',  'nota' => 91],
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
