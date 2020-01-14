<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\TimesheetRepository")
 */
class Timesheet
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
     * @ORM\Column(type="integer")
     */
    private $year;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $activityCode;

    /**
     * @ORM\Column(type="string", length=1024, nullable=true)
     */
    private $note;

    /**
     * @ORM\Column(type="datetimetz")
     */
    private $lastChange;

    /**
     * @ORM\Column(type="integer")
     */
    private $planMode;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $planned = [];

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $monthlyDone = [];

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $monthlyNote = [];

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $dailyDone = [];

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $dailyNote = [];

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isDeleted;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isCompiled;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isAddedByUser;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isJustImported;

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

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getActivityCode(): ?string
    {
        return $this->activityCode;
    }

    public function setActivityCode(string $activityCode): self
    {
        $this->activityCode = $activityCode;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getLastChange(): ?\DateTimeInterface
    {
        return $this->lastChange;
    }

    public function setLastChange(\DateTimeInterface $lastChange): self
    {
        $this->lastChange = $lastChange;

        return $this;
    }

    public function getPlanMode(): ?int
    {
        return $this->planMode;
    }

    public function setPlanMode(int $planMode): self
    {
        $this->planMode = $planMode;

        return $this;
    }

    public function getPlanned(): ?array
    {
        return $this->planned;
    }

    public function setPlanned(?array $planned): self
    {
        $this->planned = $planned;

        return $this;
    }

    public function getMonthlyDone(): ?array
    {
        return $this->monthlyDone;
    }

    public function setMonthlyDone(?array $monthlyDone): self
    {
        $this->monthlyDone = $monthlyDone;

        return $this;
    }

    public function getMonthlyNote(): ?array
    {
        return $this->monthlyNote;
    }

    public function setMonthlyNote(?array $monthlyNote): self
    {
        $this->monthlyNote = $monthlyNote;

        return $this;
    }

    public function getDailyDone(): ?array
    {
        return $this->dailyDone;
    }

    public function setDailyDone(?array $dailyDone): self
    {
        $this->dailyDone = $dailyDone;

        return $this;
    }

    public function getDailyNote(): ?array
    {
        return $this->dailyNote;
    }

    public function setDailyNote(?array $dailyNote): self
    {
        $this->dailyNote = $dailyNote;

        return $this;
    }

    public function getIsDeleted(): ?bool
    {
        return $this->isDeleted;
    }

    public function setIsDeleted(?bool $isDeleted): self
    {
        $this->isDeleted = $isDeleted;

        return $this;
    }

    public function getIsCompiled(): ?bool
    {
        return $this->isCompiled;
    }

    public function setIsCompiled(?bool $isCompiled): self
    {
        $this->isCompiled = $isCompiled;

        return $this;
    }

    public function getIsAddedByUser(): ?bool
    {
        return $this->isAddedByUser;
    }

    public function setIsAddedByUser(?bool $isAddedByUser): self
    {
        $this->isAddedByUser = $isAddedByUser;

        return $this;
    }

    public function getIsJustImported(): ?bool
    {
        return $this->isJustImported;
    }

    public function setIsJustImported(?bool $isJustImported): self
    {
        $this->isJustImported = $isJustImported;

        return $this;
    }
}
