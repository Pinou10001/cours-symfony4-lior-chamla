<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Form\AdminBookingType;
use App\Repository\BookingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminBookingController extends AbstractController
{
    /**
     * @Route("/admin/bookings", name="admin_bookings_index")
     */
    public function index(BookingRepository $repo)
    {
        return $this->render('admin/booking/index.html.twig', [
            'bookings' => $repo->findAll(),
        ]);
    }

    /**
     * Permet d'éditer une réservation
     *
     * @Route("/admin/bookings/{id}/edit", name="admin_booking_edit")
     *
     * @return Response
     */
    public function edit(Booking $booking, Request $request, EntityManagerInterface $manager) {
        $form = $this->createForm(AdminBookingType::class, $booking);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($booking);
            $manager->flush();

            $this->addFlash('success', "La réservation n°{$booking->getId()} a bien été modifiée");

            return $this->redirectToRoute("admin_bookings_index");
        }

        return $this->render('admin/booking/edit.html.twig', [
            'form' => $form->createView(),
            'booking' => $booking
        ]);
    }
}
