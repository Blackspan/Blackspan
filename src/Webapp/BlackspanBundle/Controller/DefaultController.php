<?php

namespace Webapp\BlackspanBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller {

	public function indexAction() {
		return $this
				->render('WebappBlackspanBundle:Default:index.html.twig',
						array());
	}
	public function maintenanceAction() {
        return $this
                ->render('WebappBlackspanBundle:Default:maintenance.html.twig',
                        array());
    }
    /**
     * Export the outstanding requests
     * 
     */
    public function exportcurAction() {
        $currentdate = new \DateTime('now');
        $em = $this->getDoctrine()->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb->select('entities')
                ->from('WebappBlackspanBundle:Request', 'entities')
                ->where('(entities.dateend) >= :dateend')
                ->setParameter('dateend', $currentdate->format('Y-m-d'))
                ->orderBy('entities.datestart', 'ASC');
        $query = $qb->getQuery();
        $entities = $query->getResult();
        $answers = $entities;
        $handle = fopen('php://memory', 'r+');
        $header = array();

        foreach ($answers as $request) {
            fputcsv($handle,
                    array($request->getDatestart()->format('d-m-Y'),
                            $request->getDateend()->format('d-m-Y'),
                            $request->getFirstname(), 
                            $request->getLastname(),
                            $request->getMail(), 
                            $request->getPartner(),
                            $request->getPartnerip(), 
                            $request->getSitedest(),
                            $request->getSiteversion(),
                            $request->getWebhosting()));
        }
        rewind($handle);
        $content = stream_get_contents($handle);
        fclose($handle);

        return new Response($content, 200,
                array('Content-Type' => 'application/force-download',
                        'Content-Disposition' => 'attachment; filename="export.csv"'));
    }
    public function exportAction() {
        $em = $this->getDoctrine()->getEntityManager();
        $answers = $em->getRepository('WebappBlackspanBundle:Request')
                ->findAll();
        $handle = fopen('php://memory', 'r+');
        $header = array();

        foreach ($answers as $request) {
            fputcsv($handle,
                    array($request->getDate()->format('d-m-Y'),
                            $request->getDateend()->format('d-m-Y'),
                            $request->getFirstname(), 
                            $request->getLastname(),
                            $request->getMail(), 
                            $request->getPartner(),
                            $request->getPartnerip(), 
                            $request->getSitedest(),
                            $request->getSiteversion(),
                            $request->getWebhosting()));
        }
        rewind($handle);
        $content = stream_get_contents($handle);
        fclose($handle);

        return new Response($content, 200,
                array('Content-Type' => 'application/force-download', 'json',
                        'Content-Disposition' => 'attachment; filename="export_all.csv"'));
    }
    
    public function helpmeAction() {
        return $this
                ->render('WebappBlackspanBundle:Default:helpme.html.twig',
                        array());
    }
}
