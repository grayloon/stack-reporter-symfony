<?php

namespace Grayloon\StackReporter\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    #[Route('/api/v1/stack-reporter', name: 'grayloon_stack_reporter_api_info')]
    public function info(Request $request): JsonResponse
    {

        // Get the API key from the request
        $content = json_decode($request->getContent(), true);
        $providedApiKey = $content['apikey'] ?? null;
        
        // Get the configured API key
        $configuredApiKey = $this->getParameter('grayloon_stack_reporter.api_key');
        
        // Check if API key is required and valid
        if ($configuredApiKey !== null && ($providedApiKey !== $configuredApiKey)) {
            return $this->json([
                'error' => 'Invalid API key',
            ], 403);
        }

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