<?php

namespace App\Foundation\ValueObjects\Responses;

use App\Foundation\Enums\ResponseStatusesEnums;
use Symfony\Component\HttpFoundation\Response;

/**
 * Concrete formatter should inherit from
 * this class
 */
abstract class ResponseValues
{
    public function __construct(
        public string|null $status = ResponseStatusesEnums::SUCCESS,
        public int|null $statusCode = null,
        public string|null $message = null,
        public mixed $data = null,
        public mixed $extra = null,
    )
    {
    }

    /**
     * ---------------------------------------------------
     * --------------------- Abstract --------------------
     * ---------------------------------------------------
     */

    /**
     * The body schema of the response should be
     * implemented in the formatter class
     *
     * @return array
     */
    abstract public function getBody(): array;

    /**
     * ---------------------------------------------------
     * ------------------- Implemented -------------------
     * ---------------------------------------------------
     */

    public function succeed(): ResponseValues
    {
        return $this->setStatus(ResponseStatusesEnums::SUCCESS);
    }

    public function fail(): ResponseValues
    {
        return $this->setStatus(ResponseStatusesEnums::ERROR);
    }

    public function setOk(): ResponseValues
    {
        return $this->setStatusCode(Response::HTTP_OK)
            ->succeed();
    }

    public function setStatusCodeAsNotFound(): ResponseValues
    {
        return $this->setStatusCode(Response::HTTP_NOT_FOUND)
            ->fail();
    }

    public function setStatusCodeAsServerError(): ResponseValues
    {
        return $this->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR)
            ->fail();
    }

    /**
     * ------------------------------------------------
     * --------------- Fluent Setters -----------------
     * ------------------------------------------------
     */

    public function setStatus(string $status): ResponseValues
    {
        $this->status = $status;
        return $this;
    }

    public function setStatusCode(?int $statusCode): ResponseValues
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function setMessage(?string $message): ResponseValues
    {
        $this->message = $message;
        return $this;
    }

    public function setData(mixed $data): ResponseValues
    {
        $this->data = $data;
        return $this;
    }

    public function setExtra(mixed $extra): ResponseValues
    {
        $this->extra = $extra;
        return $this;
    }

    /**
     * ------------------------------------------------
     * -------------------- Getters -------------------
     * ------------------------------------------------
     */

    public function getStatusCode(): ?int
    {
        return $this->statusCode;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function getData(): mixed
    {
        return $this->data;
    }

    public function getExtra(): mixed
    {
        return $this->extra;
    }
}
