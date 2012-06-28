<?php

namespace Webapp\BlackspanBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Webapp\BlackspanBundle\Entity\Request
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Webapp\BlackspanBundle\Entity\RequestRepository")
 */
class Request
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var date $datestart
     *
     * @ORM\Column(name="datestart", type="date")
     */
    private $datestart;

    /**
     * @var date $dateend
     *
     * @ORM\Column(name="dateend", type="date")
     */
    private $dateend;

    /**
     * @var integer $reference
     *
     * @ORM\Column(name="reference", type="integer")
     */
    private $reference;

    /**
     * @var text $firstname
     *
     * @ORM\Column(name="firstname", type="text")
     */
    private $firstname;

    /**
     * @var text $lastname
     *
     * @ORM\Column(name="lastname", type="text")
     */
    private $lastname;

    /**
     * @var string $mail
     *
     * @ORM\Column(name="mail", type="string", length=50)
     */
    private $mail;

    /**
     * @var string $partner
     *
     * @ORM\Column(name="partner", type="string", length=50)
     */
    private $partner;

    /**
     * @var text $partnerip
     *
     * @ORM\Column(name="partnerip", type="text")
     */
    private $partnerip;

    /**
     * @var string $sitedest
     *
     * @ORM\Column(name="sitedest", type="string", length=50)
     */
    private $sitedest;

    /**
     * @var string $siteversion
     *
     * @ORM\Column(name="siteversion", type="string", length=50)
     */
    private $siteversion;

    /**
     * @var string $webhosting
     *
     * @ORM\Column(name="webhosting", type="string", length=50)
     */
    private $webhosting;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set datestart
     *
     * @param date $datestart
     */
    public function setDatestart($datestart)
    {
        $this->datestart = $datestart;
    }

    /**
     * Get datestart
     *
     * @return date 
     */
    public function getDatestart()
    {
        return $this->datestart;
    }

    /**
     * Set dateend
     *
     * @param date $dateend
     */
    public function setDateend($dateend)
    {
        $this->dateend = $dateend;
    }

    /**
     * Get dateend
     *
     * @return date 
     */
    public function getDateend()
    {
        return $this->dateend;
    }

    /**
     * Set reference
     *
     * @param integer $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    /**
     * Get reference
     *
     * @return integer 
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set firstname
     *
     * @param text $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * Get firstname
     *
     * @return text 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param text $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * Get lastname
     *
     * @return text 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set mail
     *
     * @param string $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * Get mail
     *
     * @return string 
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set partner
     *
     * @param string $partner
     */
    public function setPartner($partner)
    {
        $this->partner = $partner;
    }

    /**
     * Get partner
     *
     * @return string 
     */
    public function getPartner()
    {
        return $this->partner;
    }

    /**
     * Set partnerip
     *
     * @param text $partnerip
     */
    public function setPartnerip($partnerip)
    {
        $this->partnerip = $partnerip;
    }

    /**
     * Get partnerip
     *
     * @return text 
     */
    public function getPartnerip()
    {
        return $this->partnerip;
    }

    /**
     * Set sitedest
     *
     * @param string $sitedest
     */
    public function setSitedest($sitedest)
    {
        $this->sitedest = $sitedest;
    }

    /**
     * Get sitedest
     *
     * @return string 
     */
    public function getSitedest()
    {
        return $this->sitedest;
    }

    /**
     * Set siteversion
     *
     * @param string $siteversion
     */
    public function setSiteversion($siteversion)
    {
        $this->siteversion = $siteversion;
    }

    /**
     * Get siteversion
     *
     * @return string 
     */
    public function getSiteversion()
    {
        return $this->siteversion;
    }

    /**
     * Set webhosting
     *
     * @param string $webhosting
     */
    public function setWebhosting($webhosting)
    {
        $this->webhosting = $webhosting;
    }

    /**
     * Get webhosting
     *
     * @return string 
     */
    public function getWebhosting()
    {
        return $this->webhosting;
    }
}