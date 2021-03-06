<?php
namespace Neos\Flow\Security;

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Mvc\RequestInterface;

/**
 * @Flow\Scope("session")
 * @internal
 */
class SessionDataContainer
{
    /**
     * The current list of security tokens.
     *
     * @var array
     */
    protected $securityTokens = [];

    /**
     * The current list of CSRF tokens
     *
     * @var array
     */
    protected $csrfProtectionTokens = [];

    /**
     * A possible request that was intercepted on a security exception
     *
     * @var RequestInterface|null
     */
    protected $interceptedRequest;

    /**
     * Get the current list of security tokens.
     *
     * @return array
     */
    public function getSecurityTokens(): array
    {
        return $this->securityTokens;
    }

    /**
     * Set the current list of security tokens with their data.
     *
     * @param array $securityTokens
     */
    public function setSecurityTokens(array $securityTokens)
    {
        $this->securityTokens = $securityTokens;
    }

    /**
     * Get the current list of active CSRF tokens.
     *
     * @return array
     */
    public function getCsrfProtectionTokens(): array
    {
        return $this->csrfProtectionTokens;
    }

    /**
     * set the list of currently active CSRF tokens.
     *
     * @param array $csrfProtectionTokens
     */
    public function setCsrfProtectionTokens(array $csrfProtectionTokens)
    {
        $this->csrfProtectionTokens = $csrfProtectionTokens;
    }

    /**
     * Get a possible saved request after a security exceptoin happeened.
     *
     * @return RequestInterface
     */
    public function getInterceptedRequest():? RequestInterface
    {
        return $this->interceptedRequest;
    }

    /**
     * Save a request that triggered a security exception.
     *
     * @param RequestInterface $interceptedRequest
     */
    public function setInterceptedRequest(RequestInterface $interceptedRequest = null): void
    {
        $this->interceptedRequest = $interceptedRequest;
    }

    /**
     * Reset data in this session container.
     */
    public function reset(): void
    {
        $this->setSecurityTokens([]);
        $this->setCsrfProtectionTokens([]);
        $this->setInterceptedRequest(null);
    }
}
