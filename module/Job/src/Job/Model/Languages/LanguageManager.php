<?php

namespace Job\Model\Languages;

class LanguageManager {

    static function getAll()
    {
        $languages = array(
            'en' => 'English',
            'ru' => 'Russian',
            'fr' => 'French',
            'de' => 'German',
            'it' => 'Italian',
        );
        return $languages;
    }

    static function getLanguageName($short)
    {
        $languages = LanguageManager::getAll();
        $langName = $languages[$short];
        return $langName;
    }
}