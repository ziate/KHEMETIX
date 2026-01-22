<?php
namespace App\Services;
class PromptLibraryService {
    public function getWPPluginPrompt($description, $specs = []) {
        return "You are an expert WordPress developer. Generate a WordPress plugin based on this description: $description. Output as JSON: { \"files\": [ { \"path\": \"string\", \"content\": \"string\" } ], \"notes\": \"string\" }";
    }
}