<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\EventLogRepository")
 */
class EventLog
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $userRole;

    /**
     * @ORM\Column(type="datetimetz")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $userAction;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dataVersion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dataUsername;

    /**
     * @ORM\Column(type="integer")
     */
    private $dataYear;

    /**
     * @ORM\Column(type="integer")
     */
    private $dataMonth;

    /**
     * @ORM\Column(type="string", length=1024)
     */
    private $dataDone;

    /**
     * @ORM\Column(type="string", length=1024, nullable=true)
     */
    private $dataComment;

    /**
     * @ORM\Column(type="string", length=1024, nullable=true)
     */
    private $dataExtra;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getUserRole(): ?string
    {
        return $this->userRole;
    }

    public function setUserRole(string $userRole): self
    {
        $this->userRole = $userRole;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getUserAction(): ?string
    {
        return $this->userAction;
    }

    public function setUserAction(string $userAction): self
    {
        $this->userAction = $userAction;

        return $this;
    }

    public function getDataVersion(): ?string
    {
        return $this->dataVersion;
    }

    public function setDataVersion(string $dataVersion): self
    {
        $this->dataVersion = $dataVersion;

        return $this;
    }

    public function getDataUsername(): ?string
    {
        return $this->dataUsername;
    }

    public function setDataUsername(string $dataUsername): self
    {
        $this->dataUsername = $dataUsername;

        return $this;
    }

    public function getDataYear(): ?int
    {
        return $this->dataYear;
    }

    public function setDataYear(int $dataYear): self
    {
        $this->dataYear = $dataYear;

        return $this;
    }

    public function getDataMonth(): ?int
    {
        return $this->dataMonth;
    }

    public function setDataMonth(int $dataMonth): self
    {
        $this->dataMonth = $dataMonth;

        return $this;
    }

    public function getDataDone(): ?string
    {
        return $this->dataDone;
    }

    public function setDataDone(string $dataDone): self
    {
        $this->dataDone = $dataDone;

        return $this;
    }

    public function getDataComment(): ?string
    {
        return $this->dataComment;
    }

    public function setDataComment(?string $dataComment): self
    {
        $this->dataComment = $dataComment;

        return $this;
    }

    public function getDataExtra(): ?string
    {
        return $this->dataExtra;
    }

    public function setDataExtra(?string $dataExtra): self
    {
        $this->dataExtra = $dataExtra;

        return $this;
    }
}
