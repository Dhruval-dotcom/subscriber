<?php

namespace App\Controller;

use App\Entity\Todolist;
use App\Form\ToDoType;
use App\Repository\TodolistRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ToDoListController extends AbstractController
{
    #[Route('', name: 'app_to_do')]
    public function index(Request $request, EntityManagerInterface $entityManagerInterface): Response
    {
        $form = $this->createForm(ToDoType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var ToDolist $todo */
            $todo = $form->getData();
            $entityManagerInterface->persist($todo);
            $entityManagerInterface->flush();
            return $this->redirectToRoute('app_to_do_list');
        }
        return $this->render('to_do_list/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/table', name: 'app_to_do_list')]
    public function indexTable(TodolistRepository $todolistRepository, Request $request): Response
    {
        return $this->render('to_do_list/table.html.twig', [
            'data' => $todolistRepository->findAll()
        ]);
    }

    #[Route('/edit/{id}', name: 'app_edit')]
    public function edit(Todolist $todolist, Request $request, EntityManagerInterface $entityManagerInterface): Response
    {
        $form = $this->createForm(ToDoType::class, $todolist);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var ToDoList $todolist */
            $todolist = $form->getData();
            $entityManagerInterface->persist($todolist);  
            $entityManagerInterface->flush();
            return $this->redirectToRoute('app_to_do_list');
        }
        return $this->render('to_do_list/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
