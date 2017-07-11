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
        $file = $_SERVER['DOCUMENT_ROOT'] . '/language/config/' . $this->userLanguage . '.txt';
        if(!file_exists($file))
        {
            echo "File not exist";
        }
        $fh = fopen($file, 'r');
        $theData = fread($fh, filesize($file));
        $assoc_array = array();
        $my_array = explode("\n", $theData);
        foreach($my_array as $line)
        {
            $tmp = explode("=", $line);
            $assoc_array[$tmp[0]] = "$tmp[1]";
        }
        fclose($fh);
        return $assoc_array;
    }

    public function getWebsiteTitle()
    {
        return $this->languageArray['WEBSITE_TITLE'];
    }

    public function getWebsiteName()
    {
        return $this->languageArray['WEBSITE_NAME'];
    }

    public function getMenuTitle()
    {
        return $this->languageArray['MENU_TITLE'];
    }

    public function getMenuAbout()
    {
        return $this->languageArray['MENU_ABOUT'];
    }

    public function getContact()
    {
        return $this->languageArray['CONTACT'];
    }

    public function getAuthor()
    {
        return $this->languageArray['AUTHOR'];
    }

    public function getCopyright()
    {
        return $this->languageArray['COPYRIGHT'];
    }

    public function getContactTitle()
    {
        return $this->languageArray['CONTACT_TITLE'];
    }

    public function getContactSubTitle()
    {
        return $this->languageArray['CONTACT_SUBTITLE'];
    }

    public function getContactText()
    {
        return $this->languageArray['CONTACT_TEXT'];
    }

    public function getContactName()
    {
        return $this->languageArray['CONTACT_NAME'];
    }

    public function getContactEmail()
    {
        return $this->languageArray['CONTACT_EMAIL'];
    }

    public function getContactPhone()
    {
        return $this->languageArray['CONTACT_PHONE'];
    }

    public function getContactMessage()
    {
        return $this->languageArray['CONTACT_MESSAGE'];
    }

    public function getContactSend()
    {
        return $this->languageArray['CONTACT_SEND'];
    }
}
?>