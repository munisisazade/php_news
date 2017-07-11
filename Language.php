<?php

/**
 * This is a translation module wich can translate static words
 * User: munis
 * Date: 7/11/17
 * Time: 4:02 PM
 */
class Language
{
    private $languageArray;
    private $userLanguage;

    public function __construct($language)
    {
        $this->userLanguage = $language;
        $this->languageArray = self::userLanguage();
    }

    private function userLanguage()
    {
        $file = 'language/config/' . $this->userLanguage . '.ini';
        if(!file_exists($file))
        {
            echo "File not exsist";
        }
        return parse_ini_file($file);
    }

    public function getPageTitle()
    {
        return $this->languageArray['WEBSITE_NAME'];
    }
}
?>