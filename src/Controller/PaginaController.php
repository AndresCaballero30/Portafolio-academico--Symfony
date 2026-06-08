<?php

namespace App\Controller;

use App\Model\Habilidad;
use App\Model\Materia;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

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
    public function sobreMi(Request $request): Response
    {
        $habilidades = [
            new Habilidad('PHP', 75),
            new Habilidad('HTML/CSS', 90),
            new Habilidad('Laravel', 55),
            new Habilidad('Symfony', 40),
            new Habilidad('GIT', 70),
        ];

        if ($request->isMethod('POST')) {
            $sugerencia = $request->request->get('sugerencia');
            if ($sugerencia) {
                $this->addFlash('success', '¡Gracias! Tomaré en cuenta aprender ' . $sugerencia . ' para mi formación.');
            }
        }

        return $this->render('pagina/sobre_mi.html.twig', [
            'habilidades' => $habilidades,
        ]);
    }

    #[Route('/materias', name: 'app_materias')]
    public function materias(Request $request): Response
    {
        $materias = [
            new Materia('Desarrollo Web Fullstack', 95),
            new Materia('Arquitectura de Software', 88),
            new Materia('Sistemas Operativos',     74),
            new Materia('Inteligencia Artificial',  91),
        ];

        $filtroNota = $request->request->get('nota_minima');

        if ($request->isMethod('POST') && $filtroNota !== null) {
            $notaMinima = (int) $filtroNota;
            
            // Lógica de negocio: Filtrar el array
            $materias = array_filter($materias, function(Materia $m) use ($notaMinima) {
                return $m->getNota() >= $notaMinima;
            });

            if (empty($materias)) {
                $this->addFlash('warning', 'No hay materias con nota mayor o igual a ' . $notaMinima);
            } else {
                $this->addFlash('success', 'Mostrando materias con nota >= ' . $notaMinima);
            }
        }

        return $this->render('pagina/materias.html.twig', [
            'materias' => $materias,
            'filtro' => $filtroNota
        ]);
    }

    #[Route('/contacto', name: 'app_contacto')]
    public function contacto(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            $nombre = $request->request->get('nombre');
            $email = $request->request->get('email');
            $mensaje = $request->request->get('mensaje');

            if ($nombre && $email && $mensaje) {
                // Simulación de envío de correo
                $this->addFlash('success', '¡Gracias ' . $nombre . '! Tu mensaje ha sido enviado correctamente.');
                return $this->redirectToRoute('app_contacto');
            } else {
                $this->addFlash('danger', 'Por favor, completa los campos requeridos.');
            }
        }

        return $this->render('pagina/contacto.html.twig');
    }
}
