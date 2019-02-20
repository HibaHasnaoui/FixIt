<?php

namespace DisponibiliteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;

/**
 * Mission
 *
 * @ORM\Table(name="mission")
 * @ORM\Entity(repositoryClass="DisponibiliteBundle\Repository\MissionRepository")
 */
class Mission
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="id_client", type="integer",nullable=true)
     */
    private $idClient;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_mission", type="datetime",nullable=true)
     */
    private $dateMission;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="etat", type="integer")
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="evaluation", type="string", length=255,nullable=true)
     */
    private $evaluation;

    /**
     * @var float
     *
     * @ORM\Column(name="frais", type="float",nullable=true)
     */
    private $frais;

    /**
     * @ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="missions")
     * @JoinColumn(name="id_tech", referencedColumnName="id")
     */
    private $tec;

    /**
     * @return mixed
     */
    public function getTec()
    {
        return $this->tec;
    }

    /**
     * @param mixed $user
     */
    public function setTec($tec)
    {
        $this->tec = $tec;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }




    /**
     * Get id
     *
     * @return int
     */
    public function getIdTech()
    {
        return $this->id    ;
    }

    /**
     * Set idClient
     *
     * @param integer $idClient
     *
     * @return Mission
     */
    public function setIdClient($idClient)
    {
        $this->idClient = $idClient;

        return $this;
    }

    /**
     * Get idClient
     *
     * @return int
     */
    public function getIdClient()
    {
        return $this->idClient;
    }

    /**
     * Set dateMission
     *
     * @param \DateTime $dateMission
     *
     * @return Mission
     */
    public function setDateMission($dateMission)
    {
        $this->dateMission = $dateMission;

        return $this;
    }

    /**
     * Get dateMission
     *
     * @return \DateTime
     */
    public function getDateMission()
    {
        return $this->dateMission;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Mission
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set etat
     *
     * @param integer $etat
     *
     * @return Mission
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return int
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set evaluation
     *
     * @param string $evaluation
     *
     * @return Mission
     */
    public function setEvaluation($evaluation)
    {
        $this->evaluation = $evaluation;

        return $this;
    }

    /**
     * Get evaluation
     *
     * @return string
     */
    public function getEvaluation()
    {
        return $this->evaluation;
    }

    /**
     * Set frais
     *
     * @param float $frais
     *
     * @return Mission
     */
    public function setFrais($frais)
    {
        $this->frais = $frais;

        return $this;
    }

    /**
     * Get frais
     *
     * @return float
     */
    public function getFrais()
    {
        return $this->frais;
    }


}

