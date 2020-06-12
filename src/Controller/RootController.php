<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Psr\Log\LoggerInterface;
use App\Entity\Staff;
use App\Entity\Account;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use App\Services\ExportPersonaleService;

class RootController extends AbstractController
{
    private $params;
//    private $exportPersonaleService;
    public function __construct(ParameterBagInterface $params
                                /*,ExportPersonaleService $exportPersonaleService */) {
        $this->params = $params;
//        $this->exportPersonaleService = $exportPersonaleService;
    }

    /**
     * @Route("/", name="home")
     */
    public function homeAction(LoggerInterface $appLogger)
    {
        $username = $this->get('security.token_storage')->getToken()->getUser()->getUsername();
        $appLogger->info("IN: homeAction: username='" . $username . "'");

        return $this->render('index.html.twig', [
            'controller_name' => 'HomeController',
            'username' => $username,
        ]);
    }

    public function getAllStaff() {

// search Songs of Frank Sinatra
// $headers = array('Accept' => 'application/json');
// $query = array('q' => 'Frank sinatra', 'type' => 'track');
// $response = \Unirest\Request::get('https://api.spotify.com/v1/search',$headers,$query);
// or use a plain text request
// $response = Unirest\Request::get('https://api.spotify.com/v1/search?q=Frank%20sinatra&type=track');

// Display the result



$headers = array('Accept' => 'application/json');
\Unirest\Request::auth('api', $this->params->get('api_password_staff_clear'));
$query = array();
//$response = \Unirest\Request::get('http://www3/staff/api/staff', $headers, $query);
$response = \Unirest\Request::get('https://portal.igi.cnr.it/staff/api/staff', $headers, $query);
// response->code
// response->raw_body
// response->body
// response->headers

//echo("<pre>");var_dump($response->body); exit();
//dump($response->body);
//exit();


        return($response->body);
    }

    /**
     * @Route("/showall/staff/{item}", name="showallStaff")
     */
    public function showallAction(LoggerInterface $appLogger, $item="0")
    {
	$item=intval($item);

        $username = $this->get('security.token_storage')->getToken()->getUser()->getUsername();
	$allowedUsers = preg_split('/, */', $this->params->get('users_cfo'));
//var_dump($allowedUsers);exit;
	if (in_array($username, $allowedUsers)) {
            $appLogger->info("IN: showallAction: username='" . $username . "' allowed");

            $dateNow = new \DateTime();
            $allStaff = $this->getAllStaff();

            $listToShow = $allStaff;
            //echo("<pre>");var_dump($listToShow);exit;
	    return $this->render('showall.html.twig', [
                'controller_name' => 'ShowallController',
                'list' => $listToShow,
                'username' => $this->get('security.token_storage')->getToken()->getUser()->getUsername(),
                ]);
        } else {
            $appLogger->info("IN: showallAction: username='" . $username . "' NOT allowed");
            return $this->redirectToRoute('home');
        }
    }
}