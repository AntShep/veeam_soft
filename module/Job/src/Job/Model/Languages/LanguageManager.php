<?php

namespace Job\Model\Languages;

/**
 * Language manager.
 *
 * Should be used for relations of short and long names of languages.
 */
class LanguageManager {

    const DEFAULT_LANG = 'en';

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