<?php

namespace App\Controller;

use App\Entity\Produto;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



Class HelloController extends Controller
{

    /**
     * @return Response
     *
     * @Route ("hello_world")
     */

    public function world()
    {
        return new Response(
            "<html><body><h1>Hello World!</h1></body></html>"
        );
    }

    /**
     * @return Response
     *
     * @Route ("mostrar-mensagem")
     */
    public function mensagem()
    {
        return $this->render("hello/mensagem.html.twig", [
           'mensagem' => "Rodrigo Vasco"
        ]);
    }

    /**
     * @return Response
     *
     * @Route ("cadastrar-produto")
     */
     public function produto()
    {
        $em = $this->getDoctrine() ->getManager();

        $produto = new Produto();
        $produto->setNome("Tablet")
            ->setPreco(700.00);

        $em->persist ($produto);
        $em->flush();

        return new Response("O produto " . $produto->getId() . " foi criado!");
    }
}