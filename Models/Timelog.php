<?php

namespace DNAFactory\Teamwork\Models;

use Carbon\Carbon;

/**
 * @property-read int $id
 * @property-read bool $billable
 * @property-read Carbon $date
 * @property-read int $seconds
 * @property-read int $timezoneOffset
 * @property-read Ticket $ticket
 * @property-read User $user
 * @property-read string $state
 * @property-read \Carbon\Carbon $createdAt
 * @property-read Customer|User $createdBy
 * @property-read \Carbon\Carbon $updatedAt
 * @property-read Customer|User $updatedBy
 */
class Timelog extends BaseModel
{
    protected function getDate(): ?Carbon
    {
        $value = $this->getRawAttribute('date');
        return is_null($value) ? null : Carbon::parse($value);
    }

    protected function getTicket(): ?BaseModel
    {
        $reference = $this->getRawAttribute('ticket');
        return $this->endpoint->retriveReference($reference);
    }

    protected function getUser(): ?BaseModel
    {
        $reference = $this->getRawAttribute('user');
        return $this->endpoint->retriveReference($reference);
    }

}