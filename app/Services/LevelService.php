<?php

namespace App\Services;

class LevelService
{
    public static function getSkillLevel($level): string
    {
        $app_locale = app()->getLocale();

        $skills_level_table = [
            'fr' => ['Null', 'Débutant', 'Comptétent', 'Experimenté', 'Expert'],
            'en' => ['Null', 'Beginner', 'Skilled', 'Experienced', 'Expert'],
            'de' => ['Null', 'Einsteiger', 'Geübt', 'Erfahren', 'Experte'],
        ];

        return $skills_level_table[$app_locale][$level];
    }

    public static function getLanguageLevel($level): string
    {
        $app_locale = app()->getLocale();

        $languages_level_table = [
            'fr' => ['Null', 'Connaissances de base', 'Bon', 'Très bon', 'Excellent', 'Langue maternelle', 'A1', 'A2', 'B1', 'B2', 'C1', 'C2'],
            'en' => ['Null', 'Basic knowledge', 'Good', 'Very Good', 'Excellent', 'Mother tongue', 'A1', 'A2', 'B1', 'B2', 'C1', 'C2'],
            'de' => ['Null', 'Grundkenntnisse', 'Gut', 'Sehr gut', 'Hervorrangend', 'Muttersprache', 'A1', 'A2', 'B1', 'B2', 'C1', 'C2'],
        ];

        return $languages_level_table[$app_locale][$level];
    }
}
