<?php

namespace Jaitec\ClickBundle\Listener;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\DependencyInjection\Container;
use Jaitec\ClickBundle\Entity\Click;

/**
 * RequestListener.
 *
 */
class JaitecClickListener
{
    protected $router;
    protected $container;
    protected $routes;
    protected $routesNames;

    public function __construct( RouterInterface $router, Container $container, $routes )
    {
        $this->router       = $router;
        $this->container    = $container;
        $this->routes       = $routes;
        $this->routesNames  = array();
        foreach($routes as $name=>$route){
            $this->routesNames[$route['route']] = $name;
        }
    }

    /**
     * This method is executed for every Http Request.
     * @param GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();

        $route = $event->getRequest()->attributes->get('_route');

        // this intercepts the click
        if( isset($this->routesNames[$route]) ){

            $routeDef = $this->routes[$this->routesNames[$route]];

            $em = $this->container->get('doctrine')->getEntityManager();

            $entityType = $routeDef['entity_type'];
            $entityName = $routeDef['entity_name'];
            if($entityName!=null){
                $entityName = $request->attributes->get($entityName);
            }
            $entityId   = $routeDef['entity_id'];
            if($entityId!=null){
                if($entityId!=intval($entityId)){
                    $entityId = $request->attributes->get($entityId);
                }
            }
            $click = $em->getRepository('JaitecClickBundle:Click')->findOneBy(
                array(
                    'entity_type'   => $entityType,
                    'entity_id'     => $entityId,
                    'entity_name'   => $entityName,
                )
            );

            if(!$click){
                $click = new Click();
                $click->setEntityType($entityType);
                $click->setEntityId  ($entityId);
                $click->setEntityName($entityName);
                $click->setClicks(1);
            }else{
                $click->setClicks(1+$click->getClicks());
            }

            $em->persist($click);
            $em->flush();

        }

    }

}
