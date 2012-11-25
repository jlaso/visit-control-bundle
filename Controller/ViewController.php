<?php

namespace Jaitec\ClickBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ViewController extends Controller
{

    public function clicksShowAction( $entity_type, $entity_id, $entity_name )
    {
        $em          = $this->getDoctrine()->getEntityManager();
        $click       = $em->getRepository('JaitecClickBundle:Click')->findOneBy(
                                        array(
                                            'entity_type'   => $entity_type,
                                            'entity_id'     => $entity_id,
                                            'entity_name'   => $entity_name,
                                             )
                                        );

        $times = $this->get('translator')->trans('times');
        $time  = $this->get('translator')->trans('time');

        if(!$click){
            $clicks = 0;
            $msg    = 'any '.$times;
        }else{
            $clicks = $click->getClicks();
            if($clicks==1){
                $msg = 'one '.$time;
            }else{
                $msg = $clicks . ' ' . $times;
            }
        }

        return $this->render("JaitecClickBundle::include.html.twig",array(
            'clicks'    => $clicks,
            'msg'       => $msg,
        ));

    }

}
