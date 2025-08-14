<?php

namespace App\Service;

use OpenAI;
use OpenAI\Client;

class MetisClient
{
    /**
     * Returns an instance of the OpenAI client configured for the Metis API.
     *
     * @return Client
     */
    public static function getClient(): Client
    {
        // Create and return a new OpenAI client
        // - Sets a custom base URI for the Metis API
        // - Adds the Authorization header with the API key from environment variables
        return OpenAI::factory()
            ->withBaseUri('https://api.metisai.ir/openai/v1') // Custom Metis API endpoint
            ->withHttpHeader('Authorization', "Bearer " . env('OPENAI_API_KEY')) // API key from .env
            ->make(); // Build and return the client
    }
}
