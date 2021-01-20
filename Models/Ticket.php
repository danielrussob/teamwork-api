<?php

namespace DNAFactory\Teamwork\Models;

/**
 * @property-read int $id
 * @property-read string $subject
 * @property-read string $previewText
 * @property-read string $originalRecipient
 * @property-read int $responseTimeMins
 * @property-read ?int $resolutionTimeMins
 * @property-read bool $imagesHidden
 * @property-read bool $isRead
 * @property-read string $state
 * @property-read \Carbon\Carbon $createdAt
 * @property-read Customer|User $createdBy
 * @property-read \Carbon\Carbon $updatedAt
 * @property-read Customer|User $updatedBy
 * @property-read Customer $customer
 * @property-read Inbox $inbox
 * @property-read User $agent
 * @property-read array $messages
 * @property-read array $timelogs
 */
class Ticket extends BaseModel
{
    protected function getCustomer(): ?Customer
    {
        $reference = $this->getRawAttribute('customer');
        return $this->endpoint->retriveReference($reference);
    }

    protected function getInbox(): ?Inbox
    {
        $reference = $this->getRawAttribute('inbox');
        return $this->endpoint->retriveReference($reference);
    }

    protected function getAgent(): ?User
    {
        $reference = $this->getRawAttribute('agent');
        return $this->endpoint->retriveReference($reference);
    }

    /*
        protected function getContact(): ?BaseModel
        {
            $reference = $this->getRawAttribute('contact');
            return $this->endpoint->retriveReference($reference);
        }

        protected function getType(): ?BaseModel
        {
            $reference = $this->getRawAttribute('type');
            return $this->endpoint->retriveReference($reference);
        }

        protected function getStatus(): ?BaseModel
        {
            $reference = $this->getRawAttribute('status');
            return $this->endpoint->retriveReference($reference);
        }
    */

    protected function getMessages(): array
    {
        $references = $this->getRawAttribute('messages', []);
        return $this->getManyReferences($references);
    }

    protected function getTimelogs(): array
    {
        $references = $this->getRawAttribute('timelogs', []);
        return $this->getManyReferences($references);
    }
}