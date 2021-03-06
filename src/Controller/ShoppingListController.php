<?php

namespace App\Controller;

use App\Entity\ShoppingList;
use App\Form\ShoppingListType;
use App\Repository\ShoppingListRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/shopping/list")
 */
class ShoppingListController extends AbstractController
{
    /**
     * @Route("/", name="shopping_list_index", methods={"GET"})
     */
    public function index(ShoppingListRepository $shoppingListRepository): Response
    {
        return $this->render('shopping_list/list.html.twig', [
            'shopping_lists' => $shoppingListRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="shopping_list_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $shoppingList = new ShoppingList();
        $form = $this->createForm(ShoppingListType::class, $shoppingList);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($shoppingList);
            $entityManager->flush();

            return $this->redirectToRoute('shopping_list_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('shopping_list/new.html.twig', [
            'shopping_list' => $shoppingList,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="shopping_list_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, ShoppingList $shoppingList, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ShoppingListType::class, $shoppingList);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('shopping_list_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('shopping_list/edit.html.twig', [
            'shopping_list' => $shoppingList,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="shopping_list_delete", methods={"POST"})
     */
    public function delete(Request $request, ShoppingList $shoppingList, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$shoppingList->getId(), $request->request->get('_token'))) {
            $entityManager->remove($shoppingList);
            $entityManager->flush();
        }

        return $this->redirectToRoute('shopping_list_index', [], Response::HTTP_SEE_OTHER);
    }
}
