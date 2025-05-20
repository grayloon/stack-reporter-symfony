<?php

namespace Grayloon\StackReporter\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    #[Route('/api/v1/stack-reporter', name: 'grayloon_stack_reporter_api_info')]
    public function info(): JsonResponse
    {

        $node_version = null;
        if (function_exists('exec')) {
            exec('node -v 2>/dev/null', $output, $return_var);
            if ($return_var === 0 && !empty($output[0])) {
                $node_version = trim(str_replace('v', '', end($output)));
            }
        }

        $data = [
            'symfony_version' => \Symfony\Component\HttpKernel\Kernel::VERSION,
            'php_version' => phpversion(),
            'node_version' => $node_version,
        ];

        return $this->json($data);
    }
}